<?php

namespace App\Services;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

use App\Mail\SendOtpMail;
use App\Models\QrCode;
use App\Models\Shopkeeper;
use App\Models\User;
use Exception;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
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
        DB::beginTransaction();

        try {
            // Generate OTP
            $otp = rand(100000, 999999);

            // Create user
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'type' => 'shopkeeper',
                'is_approved' => false,
                'password' => Hash::make($data['password']),
                'otp' => $otp,
                'otp_expires_at' => now()->addMinutes(10),
                'remember_token' => Str::random(60),
            ]);

            // Create shopkeeper record
            $shopkeeper = Shopkeeper::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? null,
                'shop_name' => $data['shop_name'] ?? null,
                'address' => $data['address'] ?? null,
                'retailer_name' => $data['retailer_name'] ?? null,
            ]);

            $qrContent = "Shopkeeper Email: {$data['email']}";

            $result = Builder::create()
                ->writer(new PngWriter())
                ->data($qrContent)
                ->size(300)
                ->build();

            // Save QR code to storage
            $fileName = 'qr_' . uniqid() . '.png';
            $filePath = 'qr_codes/' . $fileName;

            Storage::disk('public')->put($filePath, $result->getString());

            // Save path to DB
            // store using `shop_id` column to match project conventions
            QrCode::create([
                'shop_id' => $shopkeeper->id,
                'qr_image' => $filePath,
            ]);

            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('User registration failed: ' . $e->getMessage(), [
                'email' => $data['email'] ?? 'unknown',
                'trace' => $e->getTraceAsString()
            ]);
            throw new \Exception('User registration failed: ' . $e->getMessage());
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
