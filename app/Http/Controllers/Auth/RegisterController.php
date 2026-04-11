<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shopkeeper;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(UserRequest $request)
    {
        // ✅ Validate incoming data
        $validated = $request->validated();

        //  Create a new user (default type: shopkeeper)
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'type' => 'shopkeeper',   // Default role
            'is_approved' => false,   // Admin must approve
            'security_question1' => $validated['security_question1'] ?? null,
            'security_answer1' => isset($validated['security_answer1']) ? Hash::make($validated['security_answer1']) : null,
            'security_question2' => $validated['security_question2'] ?? null,
            'security_answer2' => isset($validated['security_answer2']) ? Hash::make($validated['security_answer2']) : null,
            'security_question3' => $validated['security_question3'] ?? null,
            'security_answer3' => isset($validated['security_answer3']) ? Hash::make($validated['security_answer3']) : null,
        ]);

        // ✅ Create a corresponding shopkeeper record with the supplied data
        Shopkeeper::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'shop_name' => $validated['shop_name'] ?? null,
            'address' => $validated['address'] ?? null,
            'city' => $validated['city'] ?? null,
            'status' => 'active',
            'retailer_name' => $validated['retailer_name'] ?? null,
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

    public function prepare(UserRequest $request)
    {
        // Save signup data in session so we can continue to plan selection and payment
        $signupData = $request->validated();
        session(['signup_data' => $signupData]);

        \Log::info('Signup prepare called', ['data' => $signupData]);

        try {
            // Ensure a corresponding user + shopkeeper record exists (to persist data even if payment is delayed)
            $user = User::firstOrNew(['email' => $signupData['email']]);
            $user->name = $signupData['name'];
            $user->type = 'shopkeeper';
            $user->is_approved = false;
            $user->security_question1 = $signupData['security_question1'];
            $user->security_answer1 = Hash::make($signupData['security_answer1']);
            $user->security_question2 = $signupData['security_question2'];
            $user->security_answer2 = Hash::make($signupData['security_answer2']);
            $user->security_question3 = $signupData['security_question3'];
            $user->security_answer3 = Hash::make($signupData['security_answer3']);

            if (! $user->exists) {
                $user->password = Hash::make($signupData['password']);
            }

            $user->save();

            \Log::info('User saved', ['user_id' => $user->id, 'email' => $user->email]);

            Shopkeeper::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'name' => $signupData['name'],
                    'email' => $signupData['email'],
                    'phone' => $signupData['phone'] ?? null,
                    'shop_name' => $signupData['shop_name'] ?? null,
                    'address' => $signupData['address'] ?? null,
                    'status' => 'active',
                    'retailer_name' => $signupData['retailer_name'] ?? null,
                ]
            );

            \Log::info('Shopkeeper saved', ['user_id' => $user->id]);

            // Redirect user to plan selection page
            return redirect()->route('price');
        } catch (\Exception $e) {
            \Log::error('Signup prepare failed', ['error' => $e->getMessage(), 'data' => $signupData]);
            return back()->with('error', 'Signup failed: ' . $e->getMessage());
        }
    }
}
