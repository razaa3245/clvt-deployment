<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lens Catalogue | VirtualLens</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 text-gray-800 font-sans min-h-screen flex">
  <!-- SIDEBAR -->
  <aside x-data="{ open: false }"
         :class="open ? 'w-64' : 'w-20'"
         class="h-screen bg-white shadow-md border-r border-gray-200 transition-all duration-300 flex flex-col justify-between sticky top-0 z-50">

    <!-- Top Section -->
    <div>
      <!-- Logo -->
      <div class="flex items-center justify-between p-4">
        <div class="flex items-center space-x-3">
          <div  class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
            <span id="sidebar-email-first"class="text-cyan-600 font-bold text-lg"></span>
          </div>
          <div x-show="open" class="text-gray-700">
            <span id="admin-email-sidebar" class="text-sm text-gray-600"></span>
            <p class="text-xs text-gray-400 -mt-1">Shopkeeper</p>
          </div>
        </div>
        <button @click="open = !open" class="text-gray-400 hover:text-gray-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
          </svg>
        </button>
      </div>

      <!-- Navigation -->
      <nav class="mt-6">
        <p x-show="open" class="text-xs text-gray-400 px-6 mb-2 uppercase tracking-widest">Overview</p>
        <ul>
          <li>
            <a href="/shopkeeper/dashboard" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 group-hover:text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
              <span x-show="open" x-transition class="ml-3 text-sm">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="/shopkeeper/catalog1" class="flex items-center px-6 py-2 bg-cyan-50 text-cyan-700 border-r-4 border-cyan-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              <span x-show="open" x-transition class="ml-3 text-sm font-semibold">Lens Catalog</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- Premium Plan Section -->
      <div x-show="open" class="mx-4 mt-6 bg-gradient-to-br from-cyan-50 to-blue-50 border-2 border-cyan-200 rounded-2xl p-4 shadow-sm">
        <div class="flex items-center gap-2 mb-2">
          <div class="w-8 h-8 bg-cyan-600 rounded-lg flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
            </svg>
          </div>
          <h3 class="text-sm font-semibold text-cyan-700">Current Plan</h3>
        </div>
        <p class="text-lg font-bold text-gray-900">Basic</p>
        <p class="text-xs text-gray-600 mt-1">Rs 25,000 /month</p>
        <p class="text-xs text-gray-500 mt-1">Expires: Nov 12, 2025</p>
        <button class="mt-3 w-full bg-gradient-to-r from-cyan-600 to-cyan-700 hover:from-cyan-700 hover:to-cyan-800 text-white text-sm px-3 py-2 rounded-lg font-semibold transition-all hover:shadow-md">
          Update Plan
        </button>
      </div>
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

  <!-- MAIN CONTENT -->
  <div class="flex-1 flex flex-col overflow-x-hidden">
    <!-- HEADER -->
    <header class="bg-white border-b border-gray-200 px-10 py-5 shadow-sm sticky top-0 z-40 transition-all duration-300 hover:shadow-md">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
          <h1 class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">VisionTech</h1>
        </div>
        
        <div class="flex items-center gap-4">
          <span id="admin-email" class="text-sm text-gray-600"></span>
        </div>
      </div>
    </header>

    <!-- Page Header -->
    <div class="bg-gradient-to-r from-cyan-50 via-blue-50 to-purple-50 border-b border-gray-200">
      <div class="max-w-7xl mx-auto px-8 py-12">
        <div class="text-center">
          <div class="inline-flex items-center gap-2 bg-white px-4 py-2 rounded-full shadow-sm mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <span class="text-sm font-semibold text-gray-700">Premium Lens Collection</span>
          </div>
          <h1 class="text-4xl font-extrabold text-gray-900 mb-3">Lens Catalogue</h1>
          <p class="text-gray-600 text-lg max-w-2xl mx-auto">Browse our collection of premium colored contact lenses and try them virtually</p>
        </div>
      </div>
    </div>

    <!-- Filter Section -->
    <div class="bg-white border-b border-gray-200 sticky top-[73px] z-30 shadow-sm">
      <div class="max-w-7xl mx-auto px-8 py-6">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
          <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
            <span class="text-sm font-semibold text-gray-700">Filter by Category:</span>
          </div>
          
          <div class="flex flex-wrap gap-3">
            <button onclick="filterLenses('all')" id="filter-all" class="px-6 py-2.5 bg-gradient-to-r from-cyan-600 to-cyan-700 text-white rounded-xl font-semibold shadow-md hover:shadow-lg transition-all hover:-translate-y-0.5">
              All Lenses
            </button>
            <button onclick="filterLenses('natural')" id="filter-natural" class="px-6 py-2.5 bg-white border-2 border-gray-200 text-gray-700 rounded-xl font-semibold hover:border-cyan-300 hover:bg-cyan-50 transition-all">
              Natural
            </button>
            <button onclick="filterLenses('vibrant')" id="filter-vibrant" class="px-6 py-2.5 bg-white border-2 border-gray-200 text-gray-700 rounded-xl font-semibold hover:border-cyan-300 hover:bg-cyan-50 transition-all">
              Vibrant
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Loading State -->
    <div id="loading" class="flex-1 flex flex-col items-center justify-center py-20">
      <div class="relative">
        <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-cyan-600"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
      </div>
      <p class="mt-6 text-gray-600 font-medium">Loading lenses...</p>
      <p class="mt-2 text-sm text-gray-500">Please wait while we fetch the catalogue</p>
    </div>
    <!-- Lens Cards Container -->
    <div id="lens-container" class="max-w-7xl mx-auto px-8 py-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" style="display: none;">
      <!-- Lens cards will be dynamically inserted here -->
    </div>

    <!-- No Lenses Message -->
    <div id="no-lenses" class="flex-1 flex items-center justify-center py-20" style="display: none;">
      <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-12 max-w-md text-center">
        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
          <svg class="w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-2">No lenses found</h3>
        <p class="text-gray-600 mb-6">There are no lenses in the catalogue yet.</p>
        <button onclick="window.location.href='/shopkeeper/dashboard'" class="bg-gradient-to-r from-cyan-600 to-cyan-700 hover:from-cyan-700 hover:to-cyan-800 text-white px-6 py-3 rounded-xl font-semibold shadow-md transition-all hover:shadow-lg">
          Go to Dashboard
        </button>
      </div>
    </div>

    <!-- Features Section -->
    <div class="bg-gradient-to-r from-gray-50 to-blue-50 py-16 mt-auto">
      <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-900 mb-3">Why Choose Our Lenses?</h2>
          <p class="text-gray-600">Experience premium quality with every pair</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Feature 1 -->
          <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 hover:shadow-xl transition-all hover:-translate-y-1">
            <div class="w-14 h-14 bg-gradient-to-br from-cyan-100 to-cyan-200 rounded-xl flex items-center justify-center mb-6">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </div>
            <h4 class="text-xl font-bold text-gray-900 mb-3">Virtual Try-On</h4>
            <p class="text-gray-600">See how each lens looks on you before buying with our advanced AR technology</p>
          </div>

          <!-- Feature 2 -->
          <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 hover:shadow-xl transition-all hover:-translate-y-1">
            <div class="w-14 h-14 bg-gradient-to-br from-purple-100 to-purple-200 rounded-xl flex items-center justify-center mb-6">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h4 class="text-xl font-bold text-gray-900 mb-3">Premium Quality</h4>
            <p class="text-gray-600">FDA approved, comfortable daily wear lenses made with the highest standards</p>
          </div>

          <!-- Feature 3 -->
          <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 hover:shadow-xl transition-all hover:-translate-y-1">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center mb-6">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
              </svg>
            </div>
            <h4 class="text-xl font-bold text-gray-900 mb-3">Easy Returns</h4>
            <p class="text-gray-600">30-day return policy on all unopened products with hassle-free process</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer CTA -->
    <div class="bg-gradient-to-r from-cyan-600 via-blue-600 to-purple-600 py-16">
      <div class="max-w-4xl mx-auto px-8 text-center">
        <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-10 border border-white/20">
          <h2 class="text-3xl font-bold text-white mb-4">Ready to Manage Your Lenses?</h2>
          <p class="text-white/90 text-lg mb-8">Access your dashboard to add, edit, or remove lenses from your catalogue</p>
          <button onclick="window.location.href='/shopkeeper/dashboard'" class="bg-white hover:bg-gray-100 text-cyan-600 px-8 py-4 rounded-xl font-bold text-lg shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 inline-flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Go To Dashboard
          </button>
        </div>
      </div>
    </div>
    <div >
    @include('web.layouts.footer')
</div>
  </div>

  <script>
    let allLenses = [];
    let currentFilter = 'all';
    let user = null;

    const userInfo = localStorage.getItem('user_info');
    if (userInfo) {
      user = JSON.parse(userInfo);
      console.log('User Info:', user.name);
    } else {
      console.log('No user info found');
    }

    // Check authentication
    function checkAuth() {
      const token = localStorage.getItem('token');
      const adminEmail = localStorage.getItem('adminEmail');
      const userEmail = user  ;
      if (adminEmail) {
const email = userInfo.email;
        const firstLetter = email.charAt(0).toUpperCase();   // first letter only
        document.getElementById('admin-email').textContent = adminEmail;
        document.getElementById('admin-email-sidebar').textContent = adminEmail;
        // NEW separate line showing only first letter
        document.getElementById('sidebar-email-first').textContent = firstLetter;
      } else {
        document.getElementById('admin-email').textContent = userEmail ? user.email : 'Guest';
        document.getElementById('admin-email-sidebar').textContent = user ? user.email : 'Guest';
        
         document.getElementById('sidebar-email-first').textContent = user? user.email.charAt(0).toUpperCase() : 'G';
      }
      return true;
    }

    // Logout function
    async function logout() {
      console.log('🚪 Logging out...');
      const token = localStorage.getItem('auth_token');

      try {
        await fetch('/api/logout', {
          method: 'POST',
          headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
          }
        });
        console.log('✅ Logout successful');
      } catch (error) {
        console.error('⚠️ Logout error:', error);
      }

      localStorage.removeItem('auth_token');
      localStorage.removeItem('user_role');
      localStorage.removeItem('user_info');
      localStorage.removeItem('token');
      localStorage.removeItem('adminEmail');

      console.log('🧹 Local storage cleared');
      window.location.href = '/signup';
    }

    // Fetch lenses from database
    async function fetchLenses() {
      const token = localStorage.getItem('token');
      const possibleEndpoints = [
        'http://127.0.0.1:8000/api/lenses',
        'http://localhost:8000/api/lenses',
        '/api/lenses',
        'http://127.0.0.1:8000/api/admin/lenses',
      ];

      console.log('🔍 Starting to fetch lenses...');
      console.log('Token:', token ? 'Present ✓' : 'Missing ✗');

      for (let endpoint of possibleEndpoints) {
        try {
          console.log(`📡 Trying endpoint: ${endpoint}`);

          const headers = {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          };

          if (token) {
            headers['Authorization'] = `Bearer ${token}`;
          }

          const response = await fetch(endpoint, {
            method: 'GET',
            headers: headers
          });

          console.log(`Response status: ${response.status}`);

          if (response.ok) {
            const data = await response.json();
            console.log('✅ Success! Data received:', data);

            if (Array.isArray(data)) {
              allLenses = data;
            } else if (data.data && Array.isArray(data.data)) {
              allLenses = data.data;
            } else if (data.lenses && Array.isArray(data.lenses)) {
              allLenses = data.lenses;
            } else {
              console.log('Unexpected data structure:', data);
              allLenses = [];
            }

            console.log(`📦 Total lenses found: ${allLenses.length}`);
            displayLenses(allLenses);
            return;
          } else {
            const errorText = await response.text();
            console.log(`❌ Failed with status ${response.status}:`, errorText);
          }
        } catch (error) {
          console.error(`❌ Error with endpoint ${endpoint}:`, error);
        }
      }

      console.error('❌ All endpoints failed');
      document.getElementById('loading').style.display = 'none';
      document.getElementById('no-lenses').style.display = 'flex';
      document.getElementById('no-lenses').innerHTML = `
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-12 max-w-md text-center">
          <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
          </div>
          <h3 class="text-2xl font-bold text-gray-900 mb-2">Failed to load lenses</h3>
          <p class="text-gray-600 mb-6">Check the browser console for error details.</p>
          <button onclick="fetchLenses()" class="bg-gradient-to-r from-cyan-600 to-cyan-700 hover:from-cyan-700 hover:to-cyan-800 text-white px-6 py-3 rounded-xl font-semibold shadow-md transition-all">
            Retry
          </button>
        </div>
      `;
    }

    // Display lenses
    function displayLenses(lenses) {
      const container = document.getElementById('lens-container');
      const loading = document.getElementById('loading');
      const noLenses = document.getElementById('no-lenses');

      console.log('📺 Displaying lenses:', lenses);
      loading.style.display = 'none';

      if (!lenses || lenses.length === 0) {
        console.log('⚠️ No lenses to display');
        container.style.display = 'none';
        noLenses.style.display = 'flex';
        return;
      }

      console.log(`✅ Displaying ${lenses.length} lenses`);
      noLenses.style.display = 'none';
      container.style.display = 'grid';
      container.innerHTML = '';

      lenses.forEach((lens, index) => {
        console.log(`Creating card for lens ${index + 1}:`, lens);
        const card = createLensCard(lens);
        container.innerHTML += card;
      });
    }

    // Create lens card HTML
    function createLensCard(lens) {
      console.log('🎨 Creating card for lens:', lens);

      const id = lens.id || lens.lens_id;
      const name = lens.name || lens.lens_name || 'Unnamed Lens';
      const category = lens.category || lens.type || 'Natural';
      const rating = parseFloat(lens.rating || lens.stars || 4.5);
      const reviews = parseInt(lens.reviews || lens.review_count || 100);
      const price = parseFloat(lens.price || 45);
      const color = lens.color || lens.hex_color || lens.colour || '#8B4513';
      const isPopular = lens.is_popular || lens.popular || rating >= 4.5;

      console.log(`Card data - ID: ${id}, Name: ${name}, Price: ${price}, Color: ${color}`);

      return `
        <div class="group bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
          <!-- Card Header -->
          <div class="relative bg-gradient-to-br from-gray-50 to-blue-50 p-6">
            ${isPopular ? '<span class="absolute top-4 right-4 bg-gradient-to-r from-yellow-400 to-orange-400 text-white text-xs px-3 py-1 rounded-full font-bold shadow-md">⭐ Popular</span>' : ''}
            
            <!-- Lens Color Display -->
            <div class="w-24 h-24 mx-auto rounded-full border-4 border-white shadow-lg relative" style="background-color: ${color}">
              <div class="absolute inset-0 rounded-full bg-gradient-to-br from-white/20 to-transparent"></div>
            </div>
          </div>

          <!-- Card Body -->
          <div class="p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-cyan-600 transition-colors">${name}</h3>
            
            <div class="flex items-center gap-2 mb-3">
              <span class="px-3 py-1 bg-gray-100 text-gray-700 text-xs font-semibold rounded-full">${category}</span>
              <span class="text-xs text-gray-500">Premium Quality</span>
            </div>

            <!-- Rating -->
            <div class="flex items-center gap-2 mb-4">
              <div class="flex items-center gap-1">
                ${[1,2,3,4,5].map(i => `<svg class="w-4 h-4 ${i <= Math.floor(rating) ? 'text-yellow-400' : 'text-gray-300'}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>`).join('')}
              </div>
              <span class="text-sm font-semibold text-gray-700">${rating.toFixed(1)}</span>
              <span class="text-xs text-gray-500">(${reviews}+ reviews)</span>
            </div>

            <!-- Price -->
            <div class="flex items-baseline gap-2 mb-4">
              <span class="text-2xl font-bold text-gray-900">$${price}</span>
              <span class="text-sm text-gray-500">per pair</span>
            </div>

            <!-- CTA Button -->
            <button class="w-full bg-gradient-to-r from-cyan-600 to-cyan-700 hover:from-cyan-700 hover:to-cyan-800 text-white py-3 rounded-xl font-semibold shadow-md transition-all hover:shadow-lg hover:-translate-y-0.5 flex items-center justify-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              Try This Lens
            </button>
          </div>
        </div>
      `;
    }

    // Filter lenses
    function filterLenses(filter) {
      currentFilter = filter;

      // Update button styles
      const buttons = {
        'all': document.getElementById('filter-all'),
        'natural': document.getElementById('filter-natural'),
        'vibrant': document.getElementById('filter-vibrant')
      };

      Object.keys(buttons).forEach(key => {
        if (key === filter) {
          buttons[key].className = 'px-6 py-2.5 bg-gradient-to-r from-cyan-600 to-cyan-700 text-white rounded-xl font-semibold shadow-md hover:shadow-lg transition-all hover:-translate-y-0.5';
        } else {
          buttons[key].className = 'px-6 py-2.5 bg-white border-2 border-gray-200 text-gray-700 rounded-xl font-semibold hover:border-cyan-300 hover:bg-cyan-50 transition-all';
        }
      });

      // Filter and display
      if (filter === 'all') {
        displayLenses(allLenses);
      } else {
        const filtered = allLenses.filter(lens =>
          lens.category && lens.category.toLowerCase() === filter.toLowerCase()
        );
        displayLenses(filtered);
      }
    }

    // Initialize on page load
    window.onload = function() {
      if (checkAuth()) {
        fetchLenses();
      }
    };
  </script>
  
</body>

</html>
