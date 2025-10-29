<body class="m-0 p-0 font-sans bg-[#f5f9ff] min-h-screen flex items-center justify-center">

  <div class="bg-white w-[400px] rounded-xl shadow-xl px-8 py-10 text-center">
    <!-- Logo -->
    <div class="mb-5">
      <img src="https://cdn-icons-png.flaticon.com/512/709/709682.png" alt="VirtualLens Logo" width="60" class="rounded-xl mx-auto">
    </div>

    <h2 class="text-gray-800 my-2 text-2xl font-semibold">Welcome to VirtualLens</h2>
    <p class="text-gray-500 mb-6">Manage your optical shop with ease</p>

    <!-- Toggle Buttons -->
    <div class="flex justify-between mb-6 bg-gray-100 rounded-lg p-1.5">
      <button id="loginBtn" onclick="showForm('login')"
        class="w-[48%] bg-white font-semibold text-gray-800 py-2 rounded-md shadow transition"
      >
        Login
      </button>
      <button id="signupBtn" onclick="showForm('signup')"
        class="w-[48%] bg-transparent font-semibold text-gray-500 py-2 rounded-md transition"
      >
        Sign Up
      </button>
    </div>

    <!-- Login Form -->
    <form id="loginForm" class="block">
      <label for="email" class="block text-left text-sm text-gray-600">Email</label>
      <input type="email" id="email" name="email" placeholder="shop@example.com"
        class="w-full py-2 px-3 mt-1 mb-4 border border-gray-300 rounded-md text-sm outline-none focus:ring-2 focus:ring-blue-200"
      >

      <label for="password" class="block text-left text-sm text-gray-600">Password</label>
      <input type="password" id="password" name="password" placeholder="********"
        class="w-full py-2 px-3 mt-1 mb-5 border border-gray-300 rounded-md text-sm outline-none focus:ring-2 focus:ring-blue-200"
      >

      <button type="submit"
        class="w-full py-2 bg-gradient-to-r from-blue-600 to-cyan-400 border-none text-white font-semibold rounded-md cursor-pointer text-base transition">
        Sign In
      </button>

      <div class="mt-4">
        <a href="#" class="text-xs text-blue-600 hover:underline">Forgot password?</a>
      </div>
    </form>

    <!-- Sign Up Form -->
    <form id="signupForm" class="hidden">
      <label for="name" class="block text-left text-sm text-gray-600">Full Name</label>
      <input type="text" id="name" name="name" placeholder="John Doe"
        class="w-full py-2 px-3 mt-1 mb-4 border border-gray-300 rounded-md text-sm outline-none focus:ring-2 focus:ring-blue-200">

      <label for="shopname" class="block text-left text-sm text-gray-600">Shop Name</label>
      <input type="text" id="shopname" name="shopname" placeholder="Virtual Lens Optics"
        class="w-full py-2 px-3 mt-1 mb-4 border border-gray-300 rounded-md text-sm outline-none focus:ring-2 focus:ring-blue-200">

      <label for="retailer" class="block text-left text-sm text-gray-600">Retailer Name (Person)</label>
      <input type="text" id="retailer" name="retailer" placeholder="Ali Khan"
        class="w-full py-2 px-3 mt-1 mb-4 border border-gray-300 rounded-md text-sm outline-none focus:ring-2 focus:ring-blue-200">

      <label for="address" class="block text-left text-sm text-gray-600">Address</label>
      <textarea id="address" name="address" placeholder="Shop #12, Main Market, Lahore" rows="2"
        class="w-full py-2 px-3 mt-1 mb-4 border border-gray-300 rounded-md text-sm outline-none resize-none focus:ring-2 focus:ring-blue-200"></textarea>

      <label for="phone" class="block text-left text-sm text-gray-600">Phone Number</label>
      <input type="tel" id="phone" name="phone" placeholder="+92 300 1234567"
        class="w-full py-2 px-3 mt-1 mb-4 border border-gray-300 rounded-md text-sm outline-none focus:ring-2 focus:ring-blue-200">

      <label for="email2" class="block text-left text-sm text-gray-600">Email</label>
      <input type="email" id="email2" name="email" placeholder="shop@example.com"
        class="w-full py-2 px-3 mt-1 mb-4 border border-gray-300 rounded-md text-sm outline-none focus:ring-2 focus:ring-blue-200">

      <label for="password2" class="block text-left text-sm text-gray-600">Password</label>
      <input type="password" id="password2" name="password" placeholder="********"
        class="w-full py-2 px-3 mt-1 mb-5 border border-gray-300 rounded-md text-sm outline-none focus:ring-2 focus:ring-blue-200">

      <button type="submit"
        class="w-full py-2 bg-gradient-to-r from-blue-600 to-cyan-400 border-none text-white font-semibold rounded-md cursor-pointer text-base transition">
        Sign Up
      </button>

      <div class="mt-4">
        <a href="#" onclick="showForm('login')" class="text-xs text-blue-600 hover:underline">Already have an account? Login</a>
      </div>
    </form>

    <div class="mt-6">
      <a href="#" class="text-xs text-gray-400 hover:underline">← Back to home</a>
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
        signupBtn.classList.add('bg-white', 'text-gray-800', 'shadow');
        signupBtn.classList.remove('bg-transparent', 'text-gray-500');
        loginBtn.classList.add('bg-transparent', 'text-gray-500');
        loginBtn.classList.remove('bg-white', 'text-gray-800', 'shadow');
      } else {
        loginForm.classList.remove('hidden');
        signupForm.classList.add('hidden');
        loginBtn.classList.add('bg-white', 'text-gray-800', 'shadow');
        loginBtn.classList.remove('bg-transparent', 'text-gray-500');
        signupBtn.classList.add('bg-transparent', 'text-gray-500');
        signupBtn.classList.remove('bg-white', 'text-gray-800', 'shadow');
      }
    }
  </script>
</body>
