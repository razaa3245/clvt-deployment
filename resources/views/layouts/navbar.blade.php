@vite('resources/css/app.css')

<header class="bg-white border-b border-gray-200 px-6 py-4 shadow-sm sticky top-0 z-50">
    <div class="flex items-center justify-between max-w-7xl mx-auto">

        <!-- Logo / Brand -->
        <div class="flex items-center gap-3">
            <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-10 h-10 rounded-lg" alt="Logo">
            <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">
                VisionTech
            </a>
        </div>

        <!-- Navbar Links (Desktop) -->
        <nav class="hidden md:flex items-center space-x-6 text-sm font-medium text-gray-700">
            <a href="#" class="hover:text-blue-600 transition">Home</a>
            <a href="#" class="hover:text-blue-600 transition">Pricing</a>
            <a href="#" class="hover:text-blue-600 transition">Contact Us</a>
            <a href="#" class="hover:text-blue-600 transition">About Us</a>
            <a href="#" class="text-red-500 hover:text-red-400 font-semibold transition">Get Started</a>

            <!-- User Dropdown -->
            <div x-data="{ open: false }" class="relative ml-4">
                <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
                    <img src="https://i.pravatar.cc/40" class="w-8 h-8 rounded-full" alt="User">
                    <span class="hidden md:block text-gray-700 font-medium">John Doe</span>
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md py-2 z-50">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a>
                    <form method="POST" action="#">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Mobile Hamburger -->
        <div class="md:hidden">
            <button @click="mobileMenu = !mobileMenu" x-data="{ mobileMenu: false }" class="text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Mobile Menu -->
            <div x-show="mobileMenu" x-transition class="mt-2 space-y-2 px-4 py-2 bg-white shadow-lg rounded-md">
                <a href="{{ route('home') }}" class="b
