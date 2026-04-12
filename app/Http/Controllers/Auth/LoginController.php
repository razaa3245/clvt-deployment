<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // API-based login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();

        if ($user->type === 'shopkeeper' && isset($user->is_approved) && !$user->is_approved) {
            Auth::logout();
            return response()->json([
                'message' => 'Your account is pending admin approval.'
            ], 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'role' => $user->type,
            'token' => $token,
        ], 200);
    }

    // Web-based login
    public function webLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }

        $user = Auth::user();

        if ($user->type === 'shopkeeper' && isset($user->is_approved) && !$user->is_approved) {
            Auth::logout();
            return back()->withErrors(['email' => 'Your account is pending admin approval.']);
        }

        return redirect()->intended('/');
    }

    // Logout via web
    public function webLogout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}



