<?php

namespace App\Services;

use App\Mail\SendOtpMail;
use App\Models\QrCode;
use App\Models\Shopkeeper;
use App\Models\User;
use Exception;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;
use Illuminate\Support\Facades\Http;
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

        // QR content (secure: no plain password)
        $qrContent = "Shopkeeper Email: {$data['email']}";

        // Generate and store QR image
        $fileName = 'qr_' . uniqid() . '.png';
        $filePath = 'qr_codes/' . $fileName;

        // Prefer Endroid QR library if available, otherwise fall back to Google Charts API
        $qrImage = null;
        if (class_exists('Endroid\\QrCode\\Builder\\Builder')) {
            try {
                // Endroid QR code builder (if installed)
                $result = \Endroid\QrCode\Builder\Builder::create()
                    ->data($qrContent)
                    ->size(300)
                    ->build();

                $qrImage = $result->getString();
            } catch (\Exception $e) {
                Log::warning('Endroid QR generation failed, falling back to Google Charts: ' . $e->getMessage());
            }
        }

        if (empty($qrImage)) {
            // Fallback: use Google Charts API to generate QR code image
            try {
                $qrUrl = 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=' . urlencode($qrContent);
                $response = Http::get($qrUrl);
                if ($response->ok()) {
                    $qrImage = $response->body();
                } else {
                    throw new Exception('Google Charts returned status ' . $response->status());
                }
            } catch (\Exception $e) {
                Log::error('QR generation fallback failed: ' . $e->getMessage());
                // As a last resort, generate a tiny placeholder image (1x1 PNG)
                $qrImage = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8Xw8AAoMBg5mQ6QAAAABJRU5ErkJggg==');
            }
        }

        Storage::disk('public')->put($filePath, $qrImage);

        // Save QR image path to database
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
