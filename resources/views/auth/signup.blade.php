<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VisionTech - Login & Signup</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <style>
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-8px); }
      100% { transform: translateY(0px); }
    }
    .float { animation: float 6s ease-in-out infinite; }
  </style>
</head>

<body class="m-0 p-4 font-sans bg-gradient-to-br from-blue-50 via-cyan-50 to-white min-h-screen flex items-center justify-center overflow-y-auto">

  <!-- Outer Card -->
  <div class="bg-white/90 backdrop-blur-xl border border-gray-200 w-[420px] rounded-2xl shadow-lg p-8 text-center transition-all duration-500 hover:shadow-cyan-200/50 float mt-6 mb-6">

    <!-- Logo -->
    <div class="mb-6">
      <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" alt="VisionTech Logo"
        class="w-20 h-20 rounded-2xl mx-auto shadow-lg ring-2 ring-cyan-300/40 transition-all duration-500 hover:scale-110 hover:ring-cyan-400">
    </div>

    <h2 class="text-4xl font-extrabold mb-1 tracking-wide bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-600 text-transparent">
      VisionTech
    </h2>
    <p class="text-gray-600 mb-8 text-sm">Experience Next-Gen Optical Intelligence</p>

    <!-- Toggle Buttons -->
    <div class="flex justify-between mb-6 bg-gray-100 rounded-lg p-1 border border-gray-200">
      <button id="loginBtn" onclick="showForm('login')"
        class="w-[48%] bg-gradient-to-r from-blue-500 to-cyan-400 text-white font-semibold py-2 rounded-md shadow-md transition-all duration-300 hover:scale-105">
        Login
      </button>
      <button id="signupBtn" onclick="showForm('signup')"
        class="w-[48%] text-gray-600 font-semibold py-2 rounded-md transition-all duration-300 hover:bg-cyan-50 hover:text-cyan-700">
        Sign Up
      </button>
    </div>

    <!-- Login Form -->
    <form id="loginForm" onsubmit="handleLogin(event)">
      <input type="email" id="loginEmail" placeholder="Email" required
        class="w-full py-3 px-4 mb-4 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      <input type="password" id="loginPassword" placeholder="Password" required
        class="w-full py-3 px-4 mb-6 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      <button type="submit"
        class="w-full py-3 bg-gradient-to-r from-blue-500 to-cyan-400 text-white font-semibold rounded-md shadow-md transition-all duration-300 hover:scale-105">
        Sign In
      </button>
      <div class="mt-4">
        <a href="#" class="text-xs text-cyan-600 hover:underline">Forgot password?</a>
      </div>
    </form>

    <!-- Signup Form -->
    <form id="signupForm" class="hidden" onsubmit="handleSignup(event)">
      <input type="text" id="name" placeholder="Full Name" required
        class="w-full py-3 px-4 mb-4 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      <input type="text" id="shopname" placeholder="Shop Name" required
        class="w-full py-3 px-4 mb-4 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      <input type="text" id="retailer" placeholder="Retailer Name"
        class="w-full py-3 px-4 mb-4 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      <textarea id="address" placeholder="Address" rows="2"
        class="w-full py-3 px-4 mb-4 text-sm text-gray-800 rounded-md border border-gray-300 resize-none focus:border-cyan-400 outline-none shadow-sm"></textarea>
      <input type="tel" id="phone" placeholder="Phone Number"
        class="w-full py-3 px-4 mb-4 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      <input type="email" id="signupEmail" placeholder="Email" required
        class="w-full py-3 px-4 mb-4 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      <input type="password" id="signupPassword" placeholder="Password" required
        class="w-full py-3 px-4 mb-6 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      <button type="submit"
        class="w-full py-3 bg-gradient-to-r from-blue-500 to-cyan-400 text-white font-semibold rounded-md shadow-md transition-all duration-300 hover:scale-105">
        Sign Up
      </button>
      <div class="mt-4">
        <a href="#" onclick="showForm('login')" class="text-xs text-cyan-600 hover:underline">Already have an account? Login</a>
      </div>
    </form>

    <div id="message" class="mt-4 text-sm text-gray-600"></div>
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
        signupBtn.classList.add('bg-gradient-to-r', 'from-blue-500', 'to-cyan-400', 'text-white');
        loginBtn.classList.remove('bg-gradient-to-r', 'from-blue-500', 'to-cyan-400', 'text-white');
      } else {
        signupForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
        loginBtn.classList.add('bg-gradient-to-r', 'from-blue-500', 'to-cyan-400', 'text-white');
        signupBtn.classList.remove('bg-gradient-to-r', 'from-blue-500', 'to-cyan-400', 'text-white');
      }
    }
  </script>
</body>
</html>