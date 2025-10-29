<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VirtualLens | Access Portal</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="m-0 p-4 font-sans bg-gradient-to-br from-[#0f172a] via-[#1e293b] to-[#334155] min-h-screen flex items-center justify-center overflow-y-auto">

  <div class="bg-white/10 backdrop-blur-xl border border-white/20 w-[420px] rounded-2xl shadow-2xl p-8 text-center transition-all duration-300 mt-6 mb-6">
    <!-- Logo -->
    <div class="mb-6">
      <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" alt="VirtualLens Logo" width="70" class="rounded-xl mx-auto shadow-lg">
    </div>


<h2 class="text-white text-3xl font-semibold mb-2 tracking-wide">VirtualLens</h2>
<p class="text-gray-300 mb-6 text-sm">Experience next-gen optical management</p>

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
<form id="loginForm" class="block">
  <input type="email" id="email" placeholder="Email"
    class="w-full py-3 px-4 mb-4 text-sm text-gray-900 rounded-md border border-transparent focus:border-blue-400 outline-none transition duration-300">
  <input type="password" id="password" placeholder="Password"
    class="w-full py-3 px-4 mb-6 text-sm text-gray-900 rounded-md border border-transparent focus:border-blue-400 outline-none transition duration-300">
  <button type="submit"
    class="w-full py-3 bg-gradient-to-r from-blue-600 to-cyan-400 text-white font-semibold rounded-md cursor-pointer text-base transition duration-300 hover:scale-105 hover:shadow-lg">
    Sign In
  </button>
  <div class="mt-4">
    <a href="#" class="text-xs text-cyan-400 hover:underline">Forgot password?</a>
  </div>
</form>

<!-- Sign Up Form -->
<form id="signupForm" class="hidden">
  <input type="text" id="name" placeholder="Full Name"
    class="w-full py-3 px-4 mb-4 text-sm text-gray-900 rounded-md border border-transparent focus:border-blue-400 outline-none transition duration-300">
  <input type="text" id="shopname" placeholder="Shop Name"
    class="w-full py-3 px-4 mb-4 text-sm text-gray-900 rounded-md border border-transparent focus:border-blue-400 outline-none transition duration-300">
  <input type="text" id="retailer" placeholder="Retailer Name"
    class="w-full py-3 px-4 mb-4 text-sm text-gray-900 rounded-md border border-transparent focus:border-blue-400 outline-none transition duration-300">
  <textarea id="address" placeholder="Address" rows="2"
    class="w-full py-3 px-4 mb-4 text-sm text-gray-900 rounded-md border border-transparent resize-none focus:border-blue-400 outline-none transition duration-300"></textarea>
  <input type="tel" id="phone" placeholder="Phone Number"
    class="w-full py-3 px-4 mb-4 text-sm text-gray-900 rounded-md border border-transparent focus:border-blue-400 outline-none transition duration-300">
  <input type="email" id="email2" placeholder="Email"
    class="w-full py-3 px-4 mb-4 text-sm text-gray-900 rounded-md border border-transparent focus:border-blue-400 outline-none transition duration-300">
  <input type="password" id="password2" placeholder="Password"
    class="w-full py-3 px-4 mb-6 text-sm text-gray-900 rounded-md border border-transparent focus:border-blue-400 outline-none transition duration-300">
  <button type="submit"
    class="w-full py-3 bg-gradient-to-r from-blue-600 to-cyan-400 text-white font-semibold rounded-md cursor-pointer text-base transition duration-300 hover:scale-105 hover:shadow-lg">
    Sign Up
  </button>

  <div class="mt-4">
    <a href="#" onclick="showForm('login')" class="text-xs text-cyan-400 hover:underline">Already have an account? Login</a>
  </div>
</form>

<div class="mt-6">
  <a href="#" class="text-xs text-gray-400 hover:text-cyan-400 transition">← Back to home</a>
</div>


  </div>

  <script>
    function showForm(form) {
      const loginForm = document.getElementById('loginForm');
      const signupForm = document.getElementById('signupForm');
      const loginBtn = document.getElementById('loginBtn');
      const signupBtn = document.getElementById('signupBtn');

      if (form === 'signup') {
        loginForm.classList.add('hidden');
        signupForm.classList.remove('hidden');
        signupBtn.classList.add('bg-gradient-to-r', 'from-blue-600', 'to-cyan-400', 'text-white', 'shadow-md');
        loginBtn.classList.remove('bg-gradient-to-r', 'from-blue-600', 'to-cyan-400', 'text-white', 'shadow-md');
        loginBtn.classList.add('text-gray-300', 'hover:bg-white/10');
      } else {
        signupForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
        loginBtn.classList.add('bg-gradient-to-r', 'from-blue-600', 'to-cyan-400', 'text-white', 'shadow-md');
        signupBtn.classList.remove('bg-gradient-to-r', 'from-blue-600', 'to-cyan-400', 'text-white', 'shadow-md');
        signupBtn.classList.add('text-gray-300', 'hover:bg-white/10');
      }
      // Scroll back to top to prevent cutoff
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  </script>

</body>
</html>
