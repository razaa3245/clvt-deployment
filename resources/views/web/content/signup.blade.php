<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VisionTech - Login & Signup</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <style>
    /* smooth floating animation for background or cards */
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-8px); }
      100% { transform: translateY(0px); }
    }
    .float { animation: float 6s ease-in-out infinite; }
  </style>
</head>

<body
  class="m-0 p-4 font-sans bg-gradient-to-br from-[#0f172a] via-[#1e293b] to-[#334155] min-h-screen flex items-center justify-center overflow-y-auto">

  <!-- Outer Glass Card -->
  <div
    class="bg-white/10 backdrop-blur-2xl border border-white/20 w-[420px] rounded-2xl shadow-2xl p-8 text-center transition-all duration-500 hover:shadow-cyan-500/30 float mt-6 mb-6">

    <!-- Logo -->
    <div class="mb-6">
      <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" alt="VisionTech Logo"
        class="w-20 h-20 rounded-2xl mx-auto shadow-lg ring-2 ring-cyan-400/30 transition-all duration-500 hover:scale-110 hover:ring-cyan-300">
    </div>

    <h2 class="text-white text-4xl font-extrabold mb-1 tracking-wide bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 text-transparent">
      VisionTech
    </h2>
    <p class="text-gray-300 mb-8 text-sm">Experience Next-Gen Optical Intelligence</p>

    <!-- Toggle Buttons -->
    <div class="flex justify-between mb-6 bg-white/10 rounded-lg p-1 backdrop-blur-lg border border-white/20">
      <button id="loginBtn" onclick="showForm('login')"
        class="w-[48%] bg-gradient-to-r from-blue-600 to-cyan-400 text-white font-semibold py-2 rounded-md shadow-md transition-all duration-300 hover:scale-105">
        Login
      </button>
      <button id="signupBtn" onclick="showForm('signup')"
        class="w-[48%] text-gray-300 font-semibold py-2 rounded-md transition-all duration-300 hover:bg-white/10 hover:text-white">
        Sign Up
      </button>
    </div>

    <!-- Login Form -->
    <form id="loginForm" onsubmit="handleLogin(event)" class="animate__animated animate__fadeIn">
      <input type="email" id="loginEmail" placeholder="Email" required
        class="w-full py-3 px-4 mb-4 text-sm text-gray-900 rounded-md border focus:border-cyan-400 outline-none">
      <input type="password" id="loginPassword" placeholder="Password" required
        class="w-full py-3 px-4 mb-6 text-sm text-gray-900 rounded-md border focus:border-cyan-400 outline-none">
      <button type="submit"
        class="w-full py-3 bg-gradient-to-r from-blue-600 to-cyan-400 text-white font-semibold rounded-md shadow-md transition-all duration-300 hover:scale-105">
        Sign In
      </button>
      <div class="mt-4">
        <a href="#" class="text-xs text-cyan-400 hover:underline">Forgot password?</a>
      </div>
    </form>

    <!-- Signup Form -->
    <form id="signupForm" class="hidden animate__animated animate__fadeIn" onsubmit="handleSignup(event)">
      <input type="text" id="name" placeholder="Full Name" required
        class="w-full py-3 px-4 mb-4 text-sm text-gray-900 rounded-md border focus:border-cyan-400 outline-none">
      <input type="text" id="shopname" placeholder="Shop Name" required
        class="w-full py-3 px-4 mb-4 text-sm text-gray-900 rounded-md border focus:border-cyan-400 outline-none">
      <input type="text" id="retailer" placeholder="Retailer Name"
        class="w-full py-3 px-4 mb-4 text-sm text-gray-900 rounded-md border focus:border-cyan-400 outline-none">
      <textarea id="address" placeholder="Address" rows="2"
        class="w-full py-3 px-4 mb-4 text-sm text-gray-900 rounded-md border resize-none focus:border-cyan-400 outline-none"></textarea>
      <input type="tel" id="phone" placeholder="Phone Number"
        class="w-full py-3 px-4 mb-4 text-sm text-gray-900 rounded-md border focus:border-cyan-400 outline-none">
      <input type="email" id="signupEmail" placeholder="Email" required
        class="w-full py-3 px-4 mb-4 text-sm text-gray-900 rounded-md border focus:border-cyan-400 outline-none">
      <input type="password" id="signupPassword" placeholder="Password" required
        class="w-full py-3 px-4 mb-6 text-sm text-gray-900 rounded-md border focus:border-cyan-400 outline-none">
      <button type="submit"
        class="w-full py-3 bg-gradient-to-r from-blue-600 to-cyan-400 text-white font-semibold rounded-md shadow-md transition-all duration-300 hover:scale-105">
        Sign Up
      </button>
      <div class="mt-4">
        <a href="#" onclick="showForm('login')" class="text-xs text-cyan-400 hover:underline">Already have an
          account? Login</a>
      </div>
    </form>

    <div id="message" class="mt-4 text-sm text-gray-300"></div>
  </div>

  <script>
    const apiBase = 'http://127.0.0.1:8000/api';

    async function handleLogin(e) {
      e.preventDefault();
      const email = document.getElementById('loginEmail').value;
      const password = document.getElementById('loginPassword').value;
      const msg = document.getElementById('message');
      msg.textContent = 'Logging in...';

      const res = await fetch(`${apiBase}/login`, {
        method: 'POST',
        headers: {'Content-Type': 'application/json', 'Accept': 'application/json'},
        body: JSON.stringify({ email, password })
      });

      const data = await res.json();
      msg.textContent = res.ok ? `Welcome ${data.user?.name}!` : data.message || 'Login failed.';

      if (res.ok) {
        localStorage.setItem('token', data.token);
        localStorage.setItem('user', JSON.stringify(data.user));
        window.location.href = '/adminboard';
      }
    }

    async function handleSignup(e) {
      e.preventDefault();
      const msg = document.getElementById('message');
      msg.textContent = 'Creating account...';

      const payload = {
        name: document.getElementById('name').value,
        shopname: document.getElementById('shopname').value,
        retailer: document.getElementById('retailer').value,
        address: document.getElementById('address').value,
        phone: document.getElementById('phone').value,
        email: document.getElementById('signupEmail').value,
        password: document.getElementById('signupPassword').value,
      };

      const res = await fetch(`${apiBase}/users`, {
        method: 'POST',
        headers: {'Content-Type': 'application/json', 'Accept': 'application/json'},
        body: JSON.stringify(payload)
      });

      const data = await res.json();
      if (res.ok) {
        msg.textContent = '✅ Account created! Redirecting to OTP...';
        localStorage.setItem('signupEmail', payload.email);
        setTimeout(() => window.location.href = '/otp', 1000);
      } else {
        msg.textContent = data.message || 'Signup failed.';
      }
    }

    function showForm(type) {
      const loginForm = document.getElementById('loginForm');
      const signupForm = document.getElementById('signupForm');
      const loginBtn = document.getElementById('loginBtn');
      const signupBtn = document.getElementById('signupBtn');

      if (type === 'signup') {
        loginForm.classList.add('hidden');
        signupForm.classList.remove('hidden');
        signupBtn.classList.add('bg-gradient-to-r', 'from-blue-600', 'to-cyan-400', 'text-white');
        loginBtn.classList.remove('bg-gradient-to-r', 'from-blue-600', 'to-cyan-400', 'text-white');
      } else {
        signupForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
        loginBtn.classList.add('bg-gradient-to-r', 'from-blue-600', 'to-cyan-400', 'text-white');
        signupBtn.classList.remove('bg-gradient-to-r', 'from-blue-600', 'to-cyan-400', 'text-white');
      }
    }
  </script>
</body>
</html>
