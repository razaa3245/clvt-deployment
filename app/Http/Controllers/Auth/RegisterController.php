<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // ✅ Validate incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // ✅ Create a new user (default type: shopkeeper)
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'type' => 'shopkeeper',   // Default role
            'is_approved' => false,   // Admin must approve
        ]);

        // ✅ Optionally, create token (if you want auto-login)
        // $token = $user->createToken('auth_token')->plainTextToken;

        // ✅ Return clean JSON response
        return response()->json([
            'message' => 'Registration successful! Your account is pending admin approval.',
            'user' => $user,
            // 'token' => $token, // Uncomment if you decide to auto-login users
        ], 201);
    }
}
