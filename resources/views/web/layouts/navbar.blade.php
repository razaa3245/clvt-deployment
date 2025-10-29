@vite('resources/css/app.css')
<!-- Header -->
<header class="bg-gray-800 text-white shadow-md w-full fixed top-0 left-0 z-50">
    <div class="flex items-center justify-between px-6 py-[10px]">
        <!-- Logo / Brand -->
        <div class="flex items-center space-x-2">
            <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" 
                 alt="VirtualLens Logo"  
                 class="w-7 h-7 rounded-lg shadow-lg">
            <a href="{{ route('home') }}" class="font-bold text-lg">VisionTech</a>
        </div>
    <!-- Navbar Links -->
    <nav class="flex space-x-5 text-sm">
        <a href="{{ route('home') }}" class="hover:text-gray-300">Home</a>
        <a href="aboutus.blade.php" class="hover:text-gray-300">About Us</a>
        <a href="price.blade.php" class="hover:text-gray-300">Pricing</a>
        <a href="feature.blade.php" class="hover:text-gray-300">Features</a>
        <a href="signup.blade.php" class="hover:text-gray-300">Login/Signup</a>
        <a href="signup.blade.php" class="text-red-400 hover:text-red-300 font-medium">Get Started</a>
    </nav>
</div>
</header>
