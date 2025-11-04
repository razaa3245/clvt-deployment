@vite('resources/css/app.css')

<!-- Header -->
<header class="bg-white border-b border-gray-200 px-10 py-5 shadow-sm sticky top-0 z-50 transition-all duration-300 hover:shadow-md">
  <div class="flex items-center justify-between px-6 py-[10px]">

    <!-- Left: Logo / Brand -->
    <div class="flex items-center gap-3">
      <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
      <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">
        VisionTech
      </a>
    </div>

    <!-- Center: Navbar Links -->
    <nav class="flex justify-center flex-1 space-x-8 text-sm text-center">
      <a href="{{ route('home') }}" class="hover:text-gray-600 transition">Home</a>
      <a href="price.blade.php" class="hover:text-gray-600 transition">Pricing</a>
      <a href="contact.blade.php" class="hover:text-gray-600 transition">Contact Us</a>
      <a href="aboutus.blade.php" class="hover:text-gray-600 transition">About Us</a>
      <a href="signup.blade.php" class="hover:text-gray-600 transition">Login/Signup</a>
      <a href="shopkeeper.blade.php" class="text-red-400 hover:text-red-300 font-medium">Get Started</a>
    </nav>

    <!-- Right: Empty (for balance or future icons/buttons) -->
    <div class="w-8"></div>

  </div>
</header>
