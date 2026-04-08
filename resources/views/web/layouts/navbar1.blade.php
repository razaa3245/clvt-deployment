@vite('resources/css/app.css')

<header class="bg-white border-b border-gray-200 px-5 py-3 shadow-sm sticky top-0 z-50">
  <div class="max-w-7xl mx-auto flex items-center justify-between flex-wrap">
    <!-- Logo -->
    <div class="flex items-center gap-3">
      <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo" />
      <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">VisionTech</a>
    </div>

    <!-- Hamburger Button -->
    <button id="nav-toggle" class="md:hidden p-2 rounded text-gray-700 focus:outline-none">
      <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>

    <!-- Main Links (Desktop) -->
    <nav id="nav-links" class="hidden md:flex flex-1 items-center">
      <a href="{{ url('/shopkeeper/catalog1') }}" class="ml-auto text-red-400 hover:text-red-300 font-medium">Go Back</a>
    </nav>
  </div>

  <!-- Mobile menu dropdown -->
  <div id="mobile-menu" class="md:hidden hidden px-4 pt-2 pb-4 space-y-2 bg-white rounded shadow text-center">
    <a href="{{ route('home') }}" class="block py-2 hover:text-gray-600">Home</a>
    <a href="{{ url('price') }}" class="block py-2 hover:text-gray-600">Pricing</a>
    <a href="{{ url('contact') }}" class="block py-2 hover:text-gray-600">Contact Us</a>
    <a href="{{ url('aboutus') }}" class="block py-2 hover:text-gray-600">About Us</a>
    <a href="{{ url('signup') }}" class="block py-2 hover:text-gray-600">Login/Signup</a>
    <a href="{{ url('shopkeeper') }}" class="block py-2 text-red-400 hover:text-red-300 font-medium">Get Started</a>
  </div>

  <script>
    // Hamburger toggle menu script
    const toggle = document.getElementById('nav-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    toggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>
</header>


