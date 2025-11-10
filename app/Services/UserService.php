<?php

namespace App\Services;

use App\Models\User;
use App\Models\Shopkeeper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;
use Illuminate\Support\Str;
use Exception;
class UserService
{
    public function all()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::findOrFail($id);
    }

    public function registerUser(array $data)
    {
        // Start database transaction
        DB::beginTransaction();
        
        try {
            // Generate OTP
            $otp = rand(100000, 999999);
            
            // Create user
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'type'        => 'shopkeeper', // Default role
            'is_approved' => false,
                'password' => Hash::make($data['password']),
                'otp' => $otp,
                'otp_expires_at' => now()->addMinutes(10),
                'remember_token' => Str::random(60),
            ]);

            // If user is shopkeeper, create shopkeeper record
            
            //if (isset($data['type']) && $data['type'] === 'shopkeeper') {
                $shopkeeper = Shopkeeper::create([
                    'user_id' => 1,  // Link to user
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'] ?? null,
                    'shop_name' => $data['shop_name'] ?? null,
                    'address' => $data['address'] ?? null,
                    'retailer_name' => $data['retailer_name'] ?? null,

                ]);
            //}

            // Send OTP email
            Mail::to($user->email)->send(new SendOtpMail($user, $otp));

            // If everything successful, commit transaction
            DB::commit();
            
            return $user;
            
        } catch (Exception $e) {
            // Rollback transaction on error
            DB::rollBack();
            
            // Log error for debugging
            \Log::error('User registration failed: ' . $e->getMessage(), [
                'email' => $data['email'] ?? 'unknown',
                'trace' => $e->getTraceAsString()
            ]);
            
            // Re-throw exception to be handled by controller
            throw new Exception('User registration failed: ' . $e->getMessage());
        }
    }


    public function resendOtp($email)
    {
        $user = User::where('email', $email)->first();
        $otp = rand(100000, 999999);

        $user->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        Mail::to($user->email)->send(new SendOtpMail($user, $otp));
    }

    public function verifyOtp($email, $otp)
    {
        $user = User::where('email', $email)
            ->where('otp', $otp)
            ->where('otp_expires_at', '>', now())
            ->first();

        if (!$user) return false;

        $user->update([
            'email_verified_at' => now(),
            'otp' => null,
            'otp_expires_at' => null,
        ]);

        return true;
    }

    public function update($id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        return User::findOrFail($id)->delete();
    }
}
