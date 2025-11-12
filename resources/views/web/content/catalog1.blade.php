<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lens Catalogue | VirtualLens</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- ✅ Added Alpine.js for sidebar toggle functionality -->
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen flex">
<!-- ✅ SIDEBAR -->
<aside x-data="{ open: false }" 
       :class="open ? 'w-64' : 'w-20'" 
       class="h-screen bg-white shadow-md border-r border-gray-200 transition-all duration-300 flex flex-col justify-between sticky top-0">

  <!-- Top Section -->
  <div>
    <!-- Logo -->
    <div class="flex items-center justify-between p-4">
      <div class="flex items-center space-x-3">
        <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
          <span class="text-cyan-600 font-bold text-lg">S</span>
        </div>
        <div x-show="open" class="text-gray-700" x-transition>
          <span class="ml-3 text-sm">My-Optical-Shop</span>
        </div>
      </div>
      <!-- ✅ Toggle Button -->
      <button @click="open = !open" class="text-gray-400 hover:text-gray-600 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" 
             class="w-6 h-6 transition-transform duration-300" 
             :class="open ? 'rotate-0' : 'rotate-180'" 
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h7" />
        </svg>
      </button>
    </div>

    <!-- Navigation -->
    <nav class="mt-6">
      <p x-show="open" class="text-xs text-gray-400 px-6 mb-2 uppercase tracking-widest" x-transition>Overview</p>
      <ul>
        <li>
          <a href="/shopkeeper/dashboard" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 text-gray-500 group-hover:text-cyan-500"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span x-show="open" x-transition class="ml-3 text-sm">Dashboard</span>
          </a>
        </li>
      
       </ul>
       

  <!-- Account Section -->
  <div class="border-t border-gray-100 py-4">
    <!-- ✅ Subscription Card -->
    <div x-show="open" x-transition class="px-4 mb-4">
      <div class="bg-gray-50 rounded-2xl p-4 shadow-sm border border-gray-200 text-center">
        <div class="flex justify-center mb-2">
          <div class="w-8 h-8 bg-white border border-gray-200 rounded-full flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.219 0 4.309.508 6.121 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </div>
        </div>
        <p class="text-xs text-gray-400 uppercase">Current Plan</p>
        <div class="flex justify-between items-center mt-1 mb-2 text-sm">
          <span class="font-semibold text-gray-800">Premium</span>
          <span class="text-gray-700">12.99 <span class="text-xs">USD</span></span>
        </div>
        <p class="text-xs text-gray-400 mb-3">12 November 2025</p>
        <button class="w-full text-sm border border-gray-300 rounded-lg py-2 hover:bg-gray-100 transition">
          Update Plan
        </button>
      </div>
    </div>

    <ul>
      <li>
        <a href="#" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
          <svg xmlns="http://www.w3.org/2000/svg"
              class="w-5 h-5 text-gray-500 group-hover:text-cyan-500"
              fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
          <span x-show="open" x-transition class="ml-3 text-sm">Settings</span>
        </a>
      </li>
      <li>
        <a href="{{ route('signup') }}" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
          <svg xmlns="http://www.w3.org/2000/svg"
              class="w-5 h-5 text-gray-500 group-hover:text-cyan-500"
              fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7" />
          </svg>
          <button onclick="logout()" class="text-red-500 hover:text-red-400 hover:underline transition-all duration-300">
            Logout
          </button>
        </a>
      </li>
    </ul>
  </div>
</aside>

  <!-- ✅ MAIN PAGE CONTENT -->
  <div class="flex-1 flex flex-col">

    <!-- HEADER -->
    <header class="bg-white border-b border-gray-200 px-10 py-5 shadow-sm sticky top-0 z-50 transition-all duration-300 hover:shadow-md">
      <div class="flex items-center justify-between px-6 py-[10px]">
        <!-- Logo / Brand -->
        <div class="flex items-center gap-3">
          <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
          <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">VisionTech</a>
        </div>
        
        <div class="flex items-center gap-4">
          <!-- Display admin email -->
          <span id="admin-email" class="text-sm text-gray-600"></span>
          <!-- Logout Button -->
         
        </div>
      </div>
    </header>
  <div class="max-w-7xl mx-auto py-6 px-4">
    <h1 class="text-3xl font-bold text-center text-cyan-600 mt-4">Lens Catalogue</h1>
    <p class="text-center text-gray-500 mt-1">Browse our collection of premium colored contact lenses</p>
  </div>

  <!-- Filter Buttons -->
  <div class="flex justify-center space-x-3 mt-4">
    <button class="px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700">All</button>
    <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Natural</button>
    <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Vibrant</button>
  </div>

  <!-- Lens Cards (Static) -->
  <div class="max-w-7xl mx-auto mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4">
    
    <!-- Lens Card 1 -->
    <div class="bg-white rounded-2xl shadow-md p-5 text-center hover:shadow-lg transition">
      <div class="flex justify-between items-center mb-3">
        <h3 class="text-lg font-semibold text-gray-800">Natural Brown</h3>
        <span class="bg-cyan-100 text-cyan-700 text-xs px-2 py-1 rounded-full font-medium">Popular</span>
      </div>
      <div class="w-20 h-20 mx-auto rounded-full border-4 border-gray-100" style="background-color: #8B4513;"></div>
      <p class="mt-3 text-sm text-gray-500">Natural • Premium Quality</p>
      <div class="flex justify-center items-center mt-2 text-yellow-500 text-sm">
        ⭐ 4.3 <span class="text-gray-400 ml-1">(120 reviews)</span>
      </div>
      <p class="text-xl font-bold mt-3">$45 <span class="text-sm font-normal text-gray-500">per pair</span></p>
      <div class="flex justify-center space-x-2 mt-4">
        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm">Try this Lens</button>
      </div>
    </div>

    <!-- Lens Card 2 -->
    <div class="bg-white rounded-2xl shadow-md p-5 text-center hover:shadow-lg transition">
      <div class="flex justify-between items-center mb-3">
        <h3 class="text-lg font-semibold text-gray-800">Ocean Blue</h3>
        <span class="bg-cyan-100 text-cyan-700 text-xs px-2 py-1 rounded-full font-medium">Popular</span>
      </div>
      <div class="w-20 h-20 mx-auto rounded-full border-4 border-gray-100" style="background-color: #1E90FF;"></div>
      <p class="mt-3 text-sm text-gray-500">Vibrant • Premium Quality</p>
      <div class="flex justify-center items-center mt-2 text-yellow-500 text-sm">
        ⭐ 4.9 <span class="text-gray-400 ml-1">(120 reviews)</span>
      </div>
      <p class="text-xl font-bold mt-3">$52 <span class="text-sm font-normal text-gray-500">per pair</span></p>
      <div class="flex justify-center space-x-2 mt-4">
        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm">Try this Lens</button>
      </div>
    </div>

    <!-- Lens Card 3 -->
    <div class="bg-white rounded-2xl shadow-md p-5 text-center hover:shadow-lg transition">
      <div class="flex justify-between items-center mb-3">
        <h3 class="text-lg font-semibold text-gray-800">Emerald Green</h3>
        <span class="bg-cyan-100 text-cyan-700 text-xs px-2 py-1 rounded-full font-medium">New</span>
      </div>
      <div class="w-20 h-20 mx-auto rounded-full border-4 border-gray-100" style="background-color: #228B22;"></div>
      <p class="mt-3 text-sm text-gray-500">Natural • Premium Comfort</p>
      <div class="flex justify-center items-center mt-2 text-yellow-500 text-sm">
        ⭐ 4.6 <span class="text-gray-400 ml-1">(80 reviews)</span>
      </div>
      <p class="text-xl font-bold mt-3">$48 <span class="text-sm font-normal text-gray-500">per pair</span></p>
      <div class="flex justify-center space-x-2 mt-4">
        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm">Try this Lens</button>
      </div>
    </div>
  </div>

  <!-- Features Section -->
  <div class="max-w-7xl mx-auto mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 text-center px-4">
    <div class="bg-white rounded-2xl shadow p-6">
      <h4 class="font-semibold text-gray-800 mb-1">Virtual Try-On</h4>
      <p class="text-sm text-gray-500">See how each lens looks on you before buying</p>
    </div>
    <div class="bg-white rounded-2xl shadow p-6">
      <h4 class="font-semibold text-gray-800 mb-1">Premium Quality</h4>
      <p class="text-sm text-gray-500">FDA approved, comfortable daily wear lenses</p>
    </div>
    <div class="bg-white rounded-2xl shadow p-6">
      <h4 class="font-semibold text-gray-800 mb-1">Easy Returns</h4>
      <p class="text-sm text-gray-500">30-day return policy on all unopened products</p>
    </div>
  </div>

  <!-- Footer CTA -->
  <div class="max-w-4xl mx-auto bg-cyan-50 text-center mt-12 p-8 rounded-2xl">
    <h2 class="text-2xl font-bold text-cyan-700 mb-2">Ready to Manage Your Lenses?</h2>
    <p class="text-gray-600 mb-4">You can update or delete lens details easily using the options above.</p>
    <button class="bg-cyan-600 hover:bg-cyan-700 text-white px-6 py-3 rounded-lg font-semibold">
      Preview Try On
    </button>
  </div>
  @include('web.layouts.footer')
</body>
</html>
