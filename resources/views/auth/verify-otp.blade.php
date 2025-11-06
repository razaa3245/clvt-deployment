<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Verify OTP - VisionTech</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex justify-center items-center min-h-screen">
  <div class="bg-gray-800 p-8 rounded-xl shadow-xl text-center w-96">
    <h1 class="text-white text-2xl font-semibold mb-4">Verify Your Email</h1>
    <p class="text-gray-400 mb-6">Enter the OTP sent to your email</p>

    <form id="otpForm" onsubmit="verifyOtp(event)">
      <input type="text" id="otp" placeholder="Enter OTP" required
        class="w-full mb-6 py-3 px-4 rounded-md text-gray-900 outline-none">
      <button type="submit"
        class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 transition">Verify</button>
    </form>

    <button onclick="resendOtp()" class="mt-4 text-cyan-400 text-sm hover:underline">Resend OTP</button>
    <div id="message" class="text-gray-300 mt-3"></div>
  </div>

  <script>
    const apiBase = 'http://127.0.0.1:8000/api';
    const email = localStorage.getItem('signupEmail');

    if (!email) {
      alert('No email found. Please sign up again.');
      window.location.href = '/';
    }

    async function verifyOtp(e) {
      e.preventDefault();
      const otp = document.getElementById('otp').value;
      const msg = document.getElementById('message');
      msg.textContent = 'Verifying...';

      const res = await fetch(`${apiBase}/verify-otp`, {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ email, otp })
      });
      const data = await res.json();

      if (res.ok) {
        msg.textContent = '✅ Verified! Redirecting...';
        localStorage.removeItem('signupEmail');
        setTimeout(() => window.location.href = '/adminboard', 1200);
      } else {
        msg.textContent = data.error || 'Invalid OTP.';
      }
    }

    async function resendOtp() {
      const msg = document.getElementById('message');
      msg.textContent = 'Sending new OTP...';
      const res = await fetch(`${apiBase}/resend-otp`, {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ email })
      });
      const data = await res.json();
      msg.textContent = res.ok ? 'OTP resent successfully!' : data.error || 'Failed to resend OTP.';
    }
  </script>
</body>
</html>
