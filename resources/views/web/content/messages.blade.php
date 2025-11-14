<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shopkeeper Confirmations | VirtualLens</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen flex">

<!-- ✅ SIDEBAR -->
<aside x-data="{ open: false }" 
       :class="open ? 'w-64' : 'w-20'" 
       class="h-screen bg-white shadow-md border-r border-gray-200 transition-all duration-300 flex flex-col justify-between sticky top-0">

  <div>
    <div class="flex items-center justify-between p-4">
      <div class="flex items-center space-x-3">
        <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
          <span class="text-cyan-600 font-bold text-lg">S</span>
        </div>
        <div x-show="open" class="text-gray-700" x-transition>
          <span class="ml-3 text-sm">My-Optical-Shop</span>
        </div>
      </div>
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

    <nav class="mt-6">
      <p x-show="open" class="text-xs text-gray-400 px-6 mb-2 uppercase tracking-widest" x-transition>Overview</p>
      <ul>
        <li>
          <a href="/admin/dashboard" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 text-gray-500 group-hover:text-cyan-500"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span x-show="open" x-transition class="ml-3 text-sm">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="catalog" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 text-gray-500 group-hover:text-cyan-500"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <span x-show="open" x-transition class="ml-3 text-sm">Catalog</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>

   <!-- Account Section -->
  <div class="border-t border-gray-100 py-4">
        <ul>
          <li>
            <a href="#" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 group-hover:text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <span x-show="open" class="ml-3 text-sm">Settings</span>
            </a>
          </li>
          <li>
            <button onclick="logout()" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group w-full text-left">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 group-hover:text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
              </svg>
              <span x-show="open" class="ml-3 text-sm text-red-500">Logout</span>
            </button>
          </li>
        </ul>
      </div>
</aside>

<!-- ✅ MAIN PAGE CONTENT -->
<div class="flex-1 flex flex-col">
  <header class="bg-white border-b border-gray-200 px-10 py-5 shadow-sm sticky top-0 z-50">
    <div class="flex items-center justify-between px-6 py-[10px]">
      <div class="flex items-center gap-3">
        <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
        <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">VisionTech</a>
      </div>
    </div>
  </header>

  <!-- ✅ UPDATED MESSAGES SECTION -->
  <main class="max-w-5xl mx-auto p-8" x-data="{ showDetails: false, selected: null }">
    <h1 class="text-3xl font-bold text-cyan-600 text-center mb-6">Shopkeeper Confirmations</h1>
    <p class="text-center text-gray-500 mb-10">View and manage signup confirmations from shopkeepers.</p>

    <!-- Notification List -->
    <div class="space-y-4">
      <!-- Example message -->
      <template x-for="(msg, index) in [
        {name: 'Ali Optics', email: 'alioptics@gmail.com', shop: 'Ali’s Optical Store', date: '2 hours ago'},
        {name: 'VisionPro', email: 'visionpro@mail.com', shop: 'VisionPro Eye Center', date: '1 day ago'}
      ]" :key="index">
        <div class="bg-white border border-gray-200 rounded-2xl p-5 hover:shadow-md transition flex justify-between items-center">
          <div>
            <h3 class="font-semibold text-gray-800">New Shopkeeper Signup</h3>
            <p class="text-sm text-gray-600">Shopkeeper <strong x-text="msg.name"></strong> has requested confirmation for their account.</p>
            <p class="text-xs text-gray-400 mt-1" x-text="msg.date"></p>
          </div>
          <div class="flex space-x-2">
            <button @click="selected = msg; showDetails = true" 
                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded-lg text-sm">View Details</button>
            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded-lg text-sm">Accept</button>
            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-lg text-sm">Decline</button>
          </div>
        </div>
      </template>
    </div>

    <!-- ✅ Popup Modal -->
    <div x-show="showDetails" x-cloak class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
      <div class="bg-white rounded-2xl shadow-lg w-96 p-6 relative" x-transition>
        <button @click="showDetails = false" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">&times;</button>
        <h2 class="text-xl font-bold text-cyan-600 mb-4 text-center">Shopkeeper Details</h2>
        <div class="space-y-2 text-sm">
          <p><strong class="text-gray-700">Name:</strong> <span x-text="selected.name"></span></p>
          <p><strong class="text-gray-700">Email:</strong> <span x-text="selected.email"></span></p>
          <p><strong class="text-gray-700">Shop Name:</strong> <span x-text="selected.shop"></span></p>
          <p><strong class="text-gray-700">Signup Date:</strong> <span x-text="selected.date"></span></p>
        </div>
        <div class="flex justify-end space-x-2 mt-6">
          <button @click="showDetails = false" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg text-sm">Close</button>
          <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm">Accept</button>
          <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm">Decline</button>
        </div>
      </div>
    </div>
  </main>

  @include('web.layouts.footer')
</div>
<script>
    // ========================================
    // LOGOUT
    // ========================================
    async function logout() {
      const token = localStorage.getItem('auth_token');
      
      try {
        await fetch('/api/logout', {
          method: 'POST',
          headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
          }
        });
      } catch (error) {
        console.error('Logout error:', error);
      }
      
      localStorage.removeItem('auth_token');
      localStorage.removeItem('user_role');
      localStorage.removeItem('user_info');
      
      window.location.href = '/signup';
    }
  </script>
</body>
</html>
