<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VisionTech</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gradient-to-br from-slate-50 via-white to-slate-100 text-slate-800 font-sans min-h-screen flex">

  <!-- SIDEBAR -->
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
            <span id="admin-email-sidebar" class="text-sm text-gray-600"></span>
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
            <a href="/shopkeeper/catalog1" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
              <svg xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5 text-gray-500 group-hover:text-cyan-500"
                  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              <span x-show="open" class="ml-3 text-sm">Lens Catalog</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- PREMIUM PLAN SECTION ADDED HERE -->
      <div x-show="open" class="mx-4 mt-6 bg-cyan-50 border border-cyan-200 rounded-2xl p-4 shadow-sm text-center">
        <h3 class="text-sm font-semibold text-cyan-700">Current Plan</h3>
        <p class="text-lg font-bold text-gray-800 mt-1">Premium <span class="text-sm text-gray-500">12.99 USD</span></p>
        <p class="text-xs text-gray-500 mt-1">12 November 2025</p>
        <button class="mt-3 w-full bg-cyan-600 hover:bg-cyan-700 text-white text-sm px-3 py-2 rounded-lg">
          Update Plan
        </button>
      </div>
      <!-- END OF ADDED SECTION -->
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


  <!-- ✅ MAIN CONTENT (Unchanged) -->
  <div class="flex-1 flex flex-col">
    <header class="sticky top-0 z-50 bg-white/70 backdrop-blur-md border-b border-slate-200 shadow-sm flex justify-between items-center px-10 py-4">
      <div class="flex items-center gap-3">
        <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
        <h1 class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">VisionTech</h1>
      </div>
      <nav class="flex gap-8 text-sm font-medium">
        
        
      </nav>
    </header>

    <!-- MAIN -->

  <main class="max-w-7xl mx-auto px-8 py-14">


<!-- STATS SECTION -->
<div class="grid md:grid-cols-2 gap-8 mb-10">

  <div class="relative bg-white rounded-2xl p-8 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300 group overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-cyan-100 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
    <p class="text-sm text-slate-500 mb-2">Total Try-Ons</p>
    <div class="flex justify-between items-center">
      <h2 class="text-5xl font-extrabold text-slate-800 tracking-tight">1,247</h2>
      <span class="text-3xl">📈</span>
    </div>
    <p class="text-green-600 text-xs mt-2 font-semibold">+12% from last month</p>
  </div>

  <div class="relative bg-white rounded-2xl p-8 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300 group overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-indigo-100 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
    <p class="text-sm text-slate-500 mb-2">Subscription</p>
    <h2 class="text-2xl font-semibold text-slate-800">Pro Plan</h2>
    <p class="text-cyan-600 text-sm mt-1">124 days remaining</p>
  </div>

</div>

<!-- MAIN CONTENT -->
<div class="grid lg:grid-cols-2 gap-10">

  <!-- QR CODE CARD -->
  <div class="bg-white rounded-3xl p-10 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300">
    <h3 class="text-xl font-bold flex items-center gap-2 mb-3 text-slate-800"> Your Shop’s QR Code</h3>
    <p class="text-slate-500 text-sm mb-6">Display this QR code for customers to instantly access your lens catalogue.</p>

    <div class="flex flex-col items-center my-6">
      <div class="w-52 h-52 border border-dashed border-cyan-400 flex items-center justify-center rounded-2xl bg-gradient-to-br from-cyan-50 to-blue-50 shadow-inner hover:scale-105 hover:shadow-cyan-200 transition-all duration-300">
        <span class="text-cyan-500 text-sm tracking-wide">QR CODE</span>
      </div>
      <p class="text-slate-500 text-xs mt-3">Scan to view lens catalogue</p>
    </div>

    <div class="flex gap-5 mt-5">
      <button class="flex-1 bg-gradient-to-r from-cyan-500 to-blue-500 text-white font-semibold py-2.5 rounded-lg shadow-md hover:scale-[1.03] hover:shadow-cyan-300 transition-all duration-300">
        Download QR
      </button>
      <button class="flex-1 border border-cyan-400 text-cyan-600 font-semibold py-2.5 rounded-lg hover:bg-cyan-50 transition-all duration-300">
        Copy Link
      </button>
    </div>

    <p class="text-slate-500 text-sm mt-6">Catalogue URL:
      <a href="#" class="text-cyan-600 hover:underline ml-1">https://virtual-lens.io/catalogue</a>
    </p>
  </div>

  <!-- SIDE PANEL -->
  <div class="flex flex-col gap-6">

    <!-- Quick Actions -->
    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300">
      <h3 class="text-xl font-bold mb-3 flex items-center gap-2 text-slate-800"> Quick Actions</h3>
      <p class="text-slate-500 text-sm mb-5">Manage your shop, upgrade plans, or preview the try-on feature in one click.</p>

      <div class="divide-y divide-slate-200">
        <button class="w-full text-left py-3 text-cyan-600 hover:text-cyan-700 hover:bg-cyan-50 transition-all duration-300 font-medium text-sm flex items-center gap-2"> Preview Try-On Experience</button>
        <a href="/price">
        <button class="w-full text-left py-3 text-cyan-600 hover:text-cyan-700 hover:bg-cyan-50 transition-all duration-300 font-medium text-sm flex items-center gap-2"> Upgrade Plan</button>
      </a>
      </div>
    </div>

    <!-- AI Insights -->
    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-3xl p-8 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300">
      <h3 class="text-xl font-bold mb-3 flex items-center gap-2 text-slate-800"> AI Insights</h3>
      <p class="text-slate-600 text-sm mb-5">Your users prefer <span class="text-cyan-600 font-semibold">Sky Blue</span> and <span class="text-cyan-600 font-semibold">Hazel</span> lenses. Try promoting them next week!</p>
      <button class="bg-gradient-to-r from-cyan-500 to-blue-500 text-white py-2.5 px-6 rounded-lg hover:scale-105 hover:shadow-cyan-300 transition-all font-semibold shadow-md">Generate New Insights</button>
    </div>
  </div>
</div>
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
    
    // Check if user is authenticated and is a shopkeeper
    if (!token || role !== 'shopkeeper') {
        console.error('❌ Unauthorized access');
        alert('Please login as a shopkeeper to access this page');
        window.location.href = '/signup';
        return;
    }
    
    console.log('✅ Shopkeeper authenticated:', userInfo.name || userInfo.email);
    
    // Load dashboard data from API
    loadDashboardData(token);
});

// ========================================
// STEP 2: Fetch Dashboard Data from API
// ========================================
async function loadDashboardData(token) {
    console.log('📡 Fetching shopkeeper dashboard data from API...');
    console.log('🔗 URL: /api/shopkeeper/dashboard')
    
    try {
        const response = await fetch('/api/shopkeeper/dashboard', {
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
            updateDashboardUI(result.data);
        } else {
            console.error('❌ Failed to load dashboard:', result.message);
            alert('Failed to load dashboard: ' + (result.message || 'Unknown error'));
            
            // Show error modal
            showErrorModal('Failed to load dashboard');
        }
    } catch (error) {
        console.error('🚨 Dashboard load error:', error);
        showErrorModal('Failed to load dashboard');
    }
}

// ========================================
// STEP 3: Update Dashboard UI with Data
// ========================================
function updateDashboardUI(data) {
    console.log('🎨 Updating dashboard UI with data:', data);
    
    // Update stats if you have IDs in your HTML
    // Example: If you add id="total-tryons" to the 1,247 element
    // document.getElementById('total-tryons').textContent = data.stats.total_tryons.toLocaleString();
    
    console.log('Total Try-Ons:', data.stats.total_tryons);
    console.log('Subscription:', data.stats.subscription_plan);
    console.log('Days Remaining:', data.stats.days_remaining);
}

// ========================================
// STEP 4: Show Error Modal
// ========================================
function showErrorModal(message) {
    // Create a simple error modal
    const modal = document.createElement('div');
    modal.innerHTML = `
        <div style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; z-index: 9999;">
            <div style="background: white; padding: 30px; border-radius: 10px; max-width: 400px; text-align: center;">
                <h3 style="color: #333; margin-bottom: 15px; font-size: 20px;">⚠️ ${message}</h3>
                <p style="color: #666; margin-bottom: 20px;">Please try again or contact support.</p>
                <button onclick="window.location.href='/signup'" style="background: #3b82f6; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                    Back to Login
                </button>
            </div>
        </div>
    `;
    document.body.appendChild(modal);
}

// ========================================
// STEP 5: Logout Function
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



 // ========================================
        // LOGOUT
        // ========================================
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
            
            console.log('🧹 Local storage cleared');
            window.location.href = '/signup';
        }
</script>

</main>
    @include('web.layouts.footer')
  </div>

</body>
</html>
