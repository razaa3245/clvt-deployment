<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email</title>
</head>
<body style="font-family: Arial, sans-serif;">
    <h2>Hello {{ $user->name }},</h2>
    <p>Your OTP for email verification is:</p>
    <h1 style="color:#2563eb;">{{ $otp }}</h1>
    <p>This code will expire in 10 minutes.</p>
    <p>Thank you,<br>VisionTech Team</p>
</body>
</html>
