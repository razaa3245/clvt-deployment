<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UserRequest;
use App\Services\UserService;


class AuthController extends Controller
{
    
    protected UserService $userService;
public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function register(UserRequest $request)
    {
        $user = $this->userService->registerUser($request->validated());


        return response()->json([
            'message' => 'Registration successful! Your account is pending admin approval.',
            'user'    => $user,
        ], 201);
    }

    /**
     * Login existing user
     */
   public function login(Request $request)
{
    $validated = $request->validate([
        'email'    => 'required|email',
        'password' => 'required|string',
    ]);

    // Find user
    $user = User::where('email', $validated['email'])->first();

    // Check credentials
    if (!$user || !Hash::check($validated['password'], $user->password)) {
        return response()->json([
            'message' => 'Invalid credentials.'
        ], 401);
    }

    // Check approval for shopkeepers
    if ($user->type === 'shopkeeper' && !$user->is_approved) {
        return response()->json([
            'message' => 'Your account is pending admin approval.'
        ], 403);
    }

    // Check subscription BEFORE login
    if ($user->type === 'shopkeeper') {

        $shopkeeper = \App\Models\Shopkeeper::where('user_id', $user->id)->first();

        if ($shopkeeper) {

            if ($shopkeeper->plan_status === 'expired' || $shopkeeper->plan_status === 'none') {

                // If expired, check if plan_expiry time is still remaining
                if ($shopkeeper->plan_status === 'expired' && !empty($shopkeeper->plan_expiry)) {
                    $expiry = \Carbon\Carbon::parse($shopkeeper->plan_expiry);
                    // If expiry is still in the future, account is seized
                    if ($expiry->isFuture()) {
                        return response()->json([
                            'message' => 'Your account is seized.'
                        ], 403);
                    } else {
                        // Expiry time has passed, redirect to subscription page
                        return response()->json([
                            'message' => 'Your subscription has expired.',
                            'redirect_to' => url('/price')
                        ], 403);
                    }
                } else {
                    // If status is 'none' or expired without plan_expiry, redirect
                    return response()->json([
                        'message' => $shopkeeper->plan_status === 'expired'
                            ? 'Your subscription has expired.'
                            : 'Please select a subscription plan.',
                        'redirect_to' => url('/price')
                    ], 403);
                }
            }
        }
    }

    // If subscription is valid → allow login
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'Login successful.',
        'user'    => $user,
        'role'    => $user->type,
        'token'   => $token,
    ], 200);
}
    /**
     * Logout current user
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully.'
        ], 200);
    }

    /**
     * Get current authenticated user
     */
    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}
