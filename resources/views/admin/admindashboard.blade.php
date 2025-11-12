<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VisionTech - Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- ✅ Alpine.js for sidebar interactivity -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans min-h-screen flex">

  <!-- ✅ SIDEBAR (Integrated here) -->
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
          <div x-show="open" class="text-gray-700">
            <span id="admin-email" class="text-sm text-gray-600"></span>
            <p class="text-xs text-gray-400 -mt-1"></p>
          </div>
        </div>
        <button @click="open = !open" class="text-gray-400 hover:text-gray-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h7" />
          </svg>
        </button>
      </div>

      <!-- Overview -->
      <nav class="mt-6">
        <p x-show="open" class="text-xs text-gray-400 px-6 mb-2 uppercase tracking-widest">Overview</p>
        <ul>
        
          <li>
           <li>
          <a href="/shopkeeper/catalog" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 text-gray-500 group-hover:text-cyan-500"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h18l-1 9H4L3 3zM3 12h18v6a3 3 0 01-3 3H6a3 3 0 01-3-3v-6z" />
            </svg>
            <span x-show="open" x-transition class="ml-3 text-sm">Products</span>
          </a>
        </li>
          <li>
            <a href="#" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
              <svg xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5 text-gray-500 group-hover:text-cyan-500"
                  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 15a2 2 0 01-2 2H5l-2 2V5a2 2 0 012-2h14a2 2 0 012 2v10z" />
              </svg>
              <span x-show="open" class="ml-3 text-sm">Messages</span>
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
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 text-gray-500 group-hover:text-cyan-500"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <span x-show="open" class="ml-3 text-sm">Settings</span>
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
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

 

    <!-- MAIN CONTAINER -->
<main class="max-w-7xl mx-auto p-10">
    
    <!-- Loading Spinner (shows while fetching data) -->
    <div id="loading-spinner" class="flex justify-center items-center py-20">
      <div class="animate-spin rounded-full h-16 w-16 border-b-2 border-blue-600"></div>
      <p class="ml-4 text-gray-600">Loading dashboard data...</p>
    </div>

    <!-- Dashboard Content (hidden initially, shown after data loads) -->
    <div id="dashboard-content" class="hidden">
      
      <!-- DASHBOARD STATS -->
      <section class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-14">
        <!-- Total Shops Card -->
        <div class="group bg-white border border-gray-200 rounded-2xl p-6 flex justify-between items-center shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-300">
          <div>
            <p class="text-blue-600 text-sm font-semibold">Total Shops</p>
            <h2 id="stat-total-shops" class="text-4xl font-extrabold mt-1 text-gray-800">...</h2>
          </div>
          <div class="text-4xl group-hover:scale-110 transition-transform duration-500">🏪</div>
        </div>

        <!-- Active Users Card -->
        <div class="group bg-white border border-gray-200 rounded-2xl p-6 flex justify-between items-center shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-300">
          <div>
            <p class="text-blue-600 text-sm font-semibold">Active Users</p>
            <h2 id="stat-active-users" class="text-4xl font-extrabold mt-1 text-gray-800">...</h2>
          </div>
          <div class="text-4xl group-hover:scale-110 transition-transform duration-500">👥</div>
        </div>

        <!-- Lens Catalog Card -->
        <div class="group bg-white border border-gray-200 rounded-2xl p-6 flex justify-between items-center shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-300">
          <div>
            <p class="text-blue-600 text-sm font-semibold">Lens Catalog</p>
            <h2 id="stat-lens-catalog" class="text-4xl font-extrabold mt-1 text-gray-800">...</h2>
          </div>
          <div class="text-4xl group-hover:scale-110 transition-transform duration-500">👁️</div>
        </div>

        <!-- Monthly Revenue Card -->
        <div class="group bg-white border border-gray-200 rounded-2xl p-6 flex justify-between items-center shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-300">
          <div>
            <p class="text-blue-600 text-sm font-semibold">Monthly Revenue</p>
            <h2 id="stat-monthly-revenue" class="text-4xl font-extrabold mt-1 text-gray-800">...</h2>
          </div>
          <div class="text-4xl group-hover:scale-110 transition-transform duration-500">💰</div>
        </div>
      </section>

      <!-- PANELS -->
      <section class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        <!-- SHOP MANAGEMENT -->
        <div class="bg-white border border-gray-200 rounded-3xl p-8 shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-300">
          <h2 class="text-2xl font-bold mb-2 text-gray-800 flex items-center gap-2">
            🏪 Shop Management
          </h2>
          <p class="text-gray-500 mb-6">Manage and monitor registered optical shops</p>

          <input type="text" id="shop-search" placeholder="Search shops..." 
            class="w-full mb-6 p-3 bg-gray-100 border border-gray-300 rounded-xl placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-300" />

          <!-- Shops List (Dynamic) -->
          <div id="shops-list" class="space-y-4">
            <p class="text-gray-400 text-center py-4">Loading shops...</p>
          </div>
        </div>

        <!-- LENS CATALOG -->
        <div class="bg-white border border-gray-200 rounded-3xl p-8 shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-300">
          <h2 class="text-2xl font-bold mb-2 text-gray-800 flex items-center gap-2">
            👁️ Master Lens Catalog
          </h2>
          <p class="text-gray-500 mb-6">Add and manage lenses available across all shops</p>

          <a href="{{ route('catalog') }}">
            <button class="w-full py-3 bg-blue-600 hover:bg-blue-700 rounded-xl font-semibold text-white text-lg shadow-md hover:shadow-lg hover:scale-[1.02] transition-all duration-300 mb-6">
              + Add New Lens
            </button>
          </a>

          <!-- Lenses List (Dynamic) -->
          <div id="lenses-list" class="space-y-4">
            <p class="text-gray-400 text-center py-4">Loading lenses...</p>
          </div>
        </div>

      </section>
    </div>

  </main>

  @include('web.layouts.footer')

  <script>
    // ========================================
    // STEP 1: Authentication Check on Page Load
    // ========================================
    document.addEventListener('DOMContentLoaded', function() {
        const token = localStorage.getItem('auth_token');
        const role = localStorage.getItem('user_role');
        const userInfo = JSON.parse(localStorage.getItem('user_info') || '{}');
        
        console.log('🔐 Checking authentication...');
        console.log('Token:', token ? 'Present' : 'Missing');
        console.log('Role:', role);
        
        // Check if user is authenticated and is an admin
        if (!token || role !== 'admin') {
            console.error('❌ Unauthorized access');
            alert('Please login as an admin to access this page');
            window.location.href = '/signup';
            return;
        }
        
        console.log('✅ Admin authenticated:', userInfo.name || userInfo.email);
        
        // Display admin email in header
        if (userInfo.email) {
            document.getElementById('admin-email').textContent = userInfo.email;
        }
        
        // Load dashboard data from API
        loadDashboardData(token);
    });

    // ========================================
    // STEP 2: Fetch Dashboard Data from API
    // ========================================
    async function loadDashboardData(token) {
        console.log('📡 Fetching dashboard data from API...');
        
        try {
            const response = await fetch('/api/admin/dashboard', {
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            console.log('📥 API Response Status:', response.status);

            const result = await response.json();
            console.log('📦 API Response Data:', result);
            
            if (response.ok && result.success) {
                console.log('✅ Dashboard data loaded successfully');
                
                // Hide loading spinner
                document.getElementById('loading-spinner').classList.add('hidden');
                
                // Show dashboard content
                document.getElementById('dashboard-content').classList.remove('hidden');
                
                // Update UI with fetched data
                updateDashboardUI(result.data);
            } else {
                console.error('❌ Failed to load dashboard:', result.message);
                alert('Failed to load dashboard data: ' + (result.message || 'Unknown error'));
                window.location.href = '/signup';
            }
        } catch (error) {
            console.error('🚨 Dashboard load error:', error);
            alert('Error loading dashboard. Please check your connection and try again.');
            document.getElementById('loading-spinner').innerHTML = 
                '<p class="text-red-600">Failed to load dashboard. Please refresh the page.</p>';
        }
    }

    // ========================================
    // STEP 3: Update Dashboard UI with Data
    // ========================================
    function updateDashboardUI(data) {
        console.log('🎨 Updating dashboard UI with data:', data);
        
        // Update Statistics Cards
        updateStats(data.stats);
        
        // Update Shops List
        updateShopsList(data.recent_shops);
        
        // Update Lenses List
        updateLensesList(data.lenses);
    }

    // ========================================
    // STEP 4: Update Statistics Cards
    // ========================================
    function updateStats(stats) {
        console.log('📊 Updating stats:', stats);
        
        // Update Total Shops
        document.getElementById('stat-total-shops').textContent = stats.total_shops || 0;
        
        // Update Active Users (with comma formatting)
        document.getElementById('stat-active-users').textContent = 
            (stats.active_users || 0).toLocaleString();
        
        // Update Lens Catalog
        document.getElementById('stat-lens-catalog').textContent = stats.lens_catalog || 0;
        
        // Update Monthly Revenue (format as $XX.XK)
        const revenue = stats.monthly_revenue || 0;
        document.getElementById('stat-monthly-revenue').textContent = 
            '$' + (revenue / 1000).toFixed(1) + 'K';
    }

    // ========================================
    // STEP 5: Update Shops List
    // ========================================
    function updateShopsList(shops) {
        console.log('🏪 Updating shops list:', shops);
        
        const shopsList = document.getElementById('shops-list');
        
        if (!shops || shops.length === 0) {
            shopsList.innerHTML = '<p class="text-gray-400 text-center py-4">No shops found</p>';
            return;
        }
        
        // Clear loading message
        shopsList.innerHTML = '';
        
        // Render each shop
        shops.forEach(shop => {
            const shopHTML = `
                <div class="group flex justify-between items-center p-5 bg-gray-50 border border-gray-200 rounded-2xl transition-all duration-500 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:shadow-xl hover:border-blue-400">
                    <div>
                        <h3 class="font-semibold text-gray-800 group-hover:text-blue-700 transition-colors">${shop.name}</h3>
                        <p class="text-sm text-gray-500">${shop.plan || 'Pro Plan'} • ${shop.status || 'Active'}</p>
                        <p class="text-xs text-gray-400 mt-1">${shop.email || ''}</p>
                    </div>
                    <button onclick="viewShop(${shop.id})" class="px-4 py-1.5 bg-blue-600 hover:bg-blue-700 rounded-lg text-sm font-semibold text-white shadow transition-all hover:scale-105">
                        View
                    </button>
                </div>
            `;
            shopsList.innerHTML += shopHTML;
        });
    }

    // ========================================
    // STEP 6: Update Lenses List
    // ========================================
    function updateLensesList(lenses) {
        console.log('👁️ Updating lenses list:', lenses);
        
        const lensesList = document.getElementById('lenses-list');
        
        if (!lenses || lenses.length === 0) {
            lensesList.innerHTML = '<p class="text-gray-400 text-center py-4">No lenses found</p>';
            return;
        }
        
        // Clear loading message
        lensesList.innerHTML = '';
        
        // Render each lens
        lenses.forEach(lens => {
            const lensHTML = `
                <div class="group flex justify-between items-center p-5 bg-gray-50 border border-gray-200 rounded-2xl transition-all duration-500 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:shadow-xl hover:border-blue-400">
                    <div class="flex items-center gap-3">
                        <div class="w-6 h-6 rounded-full group-hover:scale-110 transition-transform duration-300" 
                             style="background-color: ${lens.color || '#888'}"></div>
                        <div>
                            <h3 class="font-semibold text-gray-800 group-hover:text-blue-700 transition-colors">${lens.name}</h3>
                            <p class="text-sm text-gray-500">${lens.category || 'Natural'} Category</p>
                        </div>
                    </div>
                    <button onclick="editLens('${lens.name}')" class="text-blue-600 font-semibold hover:text-blue-700 transition-colors duration-300 hover:scale-105">
                        Edit
                    </button>
                </div>
            `;
            lensesList.innerHTML += lensHTML;
        });
    }

    // ========================================
    // STEP 7: Shop Search Functionality
    // ========================================
    document.getElementById('shop-search').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const shopItems = document.querySelectorAll('#shops-list > div');
        
        shopItems.forEach(item => {
            const shopName = item.querySelector('h3').textContent.toLowerCase();
            if (shopName.includes(searchTerm)) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // ========================================
    // STEP 8: View Shop Details
    // ========================================
    function viewShop(shopId) {
        console.log('👀 Viewing shop:', shopId);
        // Add your shop details logic here
        alert('Viewing shop ID: ' + shopId);
        // You can redirect to a shop details page or open a modal
        // window.location.href = '/admin/shops/' + shopId;
    }

    // ========================================
    // STEP 9: Edit Lens
    // ========================================
    function editLens(lensName) {
        console.log('✏️ Editing lens:', lensName);
        // Add your lens edit logic here
        alert('Editing lens: ' + lensName);
        // You can redirect to an edit page or open a modal
        // window.location.href = '/admin/lenses/edit/' + lensName;
    }

    // ========================================
    // STEP 10: Logout Function
    // ========================================
    async function logout() {
        console.log('🚪 Logging out...');
        
        const token = localStorage.getItem('auth_token');
        
        try {
            const response = await fetch('/api/logout', {
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
        
        // Clear local storage
        localStorage.removeItem('auth_token');
        localStorage.removeItem('user_role');
        localStorage.removeItem('user_info');
        
        console.log('🧹 Local storage cleared');
        
        // Redirect to login page
        window.location.href = '/signup';
    }
  </script>

</body>
</html>

