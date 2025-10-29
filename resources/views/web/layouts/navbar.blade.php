@vite('resources/css/app.css')
<!-- Header -->
<header class="bg-gray-800! text-white shadow-md w-full fixed top-0 left-0 z-50">
    <div class="flex items-center justify-between px-6 py-3">
        <!-- Logo / Brand -->
        <!-- <h1 class="text-xl text-white font-semibold tracking-wide">VisionTech</h1> -->
         <a href="{{ route('home') }}"><span class="font-bold">VisionTech</span></a>
        <!-- Navbar Links -->
        <nav class="flex space-x-6">
            <a href="{{ route('home') }}"class=" hover:text-gray-300">Home</a>
            <a href="aboutus.blade.php" class=" hover:text-gray-300">About us</a>
            <a href="price.blade.php" class="hover:text-gray-300">Pricing</a>
            <a href="feature.blade.php" class="hover:text-gray-300">features</a>
            <a href="signup.blade.php" class="hover:text-gray-300">Login/signup</a>
            <a href="signup.blade.php" class="text-red-400 hover:text-red-300">Get Started</a>
        </nav>
    </div>
</header>