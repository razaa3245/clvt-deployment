<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;
use Illuminate\Support\Str;

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
        $otp = rand(100000, 999999);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
            'remember_token' => Str::random(60),
        ]);

        Mail::to($user->email)->send(new SendOtpMail($user, $otp));

        return $user;
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
