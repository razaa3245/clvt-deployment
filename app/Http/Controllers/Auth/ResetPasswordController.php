<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with([
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    public function showResetFormAfterVerification()
    {
        $email = session('verified_email');
        if (!$email) {
            return redirect()->route('password.request');
        }

        return view('auth.passwords.reset_verified', compact('email'));
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function resetVerified(Request $request)
    {
        $email = session('verified_email');
        if (!$email) {
            return redirect()->route('password.request');
        }

        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect()->route('password.request');
        }

        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        event(new PasswordReset($user));

        session()->forget(['reset_email', 'verified_email']);

        return redirect()->route('login')->with('status', 'Password has been reset successfully.');
    }
}
