<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No account found with this email address.']);
        }

        if (!$user->security_question1 || !$user->security_answer1) {
            return back()->withErrors(['email' => 'Security questions not set for this account. Please contact support.']);
        }

        // Store email in session for next step
        session(['reset_email' => $request->email]);

        return redirect()->route('password.questions');
    }
}
