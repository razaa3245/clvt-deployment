<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VisionTech - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50">
    <!-- SIDEBAR -->
    <aside x-data="{ open: false }" 
           :class="open ? 'w-64' : 'w-20'" 
           class="h-screen bg-white shadow-md border-r border-gray-200 transition-all duration-300 flex flex-col justify-between fixed top-0 left-0 z-50">

      <!-- Top Section -->
      <div>
        <!-- Logo -->
        <div class="flex items-center justify-between p-4">
          <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
              <span class="text-cyan-600 font-bold text-lg">V</span>
            </div>
            <div x-show="open" class="text-gray-700">
              <span id="sidebar-email" class="text-sm text-gray-600"></span>
              <div><p class="text-xs text-gray-400 -mt-1">Admin</p></div>
              
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
              <a href="/catalog" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 group-hover:text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <span x-show="open" x-transition class="ml-3 text-sm">Lens Catalog</span>
              </a>
            </li>
            <li>
              <a href="messages" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 group-hover:text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15a2 2 0 01-2 2H5l-2 2V5a2 2 0 012-2h14a2 2 0 012 2v10z" />
                </svg>
                <span x-show="open" class="ml-3 text-sm">Notifications</span>
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

    <!-- MAIN CONTENT -->
    <div class="ml-20 transition-all duration-300">
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

        <!-- Loading Spinner -->
        <div id="loading-spinner" class="flex justify-center items-center py-20">
          <div class="animate-spin rounded-full h-16 w-16 border-b-2 border-blue-600"></div>
          <p class="ml-4 text-gray-600">Loading dashboard data...</p>
        </div>

        <!-- Main Content -->
        <div id="dashboard-content" class="container mx-auto px-4 py-8 hidden">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="group bg-white rounded-2xl shadow p-6 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-600 text-sm font-semibold">Total Shops</p>
                            <p class="text-3xl font-bold mt-1" id="totalShops">0</p>
                        </div>
                        <div class="text-4xl group-hover:scale-110 transition-transform duration-500">🏪</div>
                    </div>
                </div>
                
                <div class="group bg-white rounded-2xl shadow p-6 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-600 text-sm font-semibold">Active Users</p>
                            <p class="text-3xl font-bold mt-1" id="activeUsers">2</p>
                        </div>
                        <div class="text-4xl group-hover:scale-110 transition-transform duration-500">👥</div>
                    </div>
                </div>
                
                <div class="group bg-white rounded-2xl shadow p-6 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-600 text-sm font-semibold">Lens Catalog</p>
                            <p class="text-3xl font-bold mt-1" id="totalLenses">0</p>
                        </div>
                        <div class="text-4xl group-hover:scale-110 transition-transform duration-500">👁️</div>
                    </div>
                </div>
                
                <div class="group bg-white rounded-2xl shadow p-6 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-600 text-sm font-semibold">Total Value</p>
                            <p class="text-3xl font-bold mt-1" id="totalValue">$0</p>
                        </div>
                        <div class="text-4xl group-hover:scale-110 transition-transform duration-500">💰</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Shop Management -->
                <div class="bg-white rounded-3xl shadow p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                    <div class="flex items-center mb-4">
                        <span class="text-2xl mr-3">🏪</span>
                        <h2 class="text-2xl font-bold">Shop Management</h2>
                    </div>
                    <p class="text-gray-600 mb-4">Manage and monitor registered optical shops</p>
                    <input type="text" id="shop-search" placeholder="Search shops..." class="w-full px-4 py-2 border border-gray-300 rounded-lg mb-4 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all">
                    <div id="shopsList" class="space-y-4 max-h-96 overflow-y-auto">
                        <p class="text-center text-gray-400 py-8">Loading shops...</p>
                    </div>
                </div>

                <!-- Master Lens Catalog -->
                <div class="bg-white rounded-3xl shadow p-8 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <span class="text-2xl mr-3">👁️</span>
                            <h2 class="text-2xl font-bold">Master Lens Catalog</h2>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Add and manage lenses available across all shops</p>
                    
                    <button onclick="openAddLensModal()" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-all hover:scale-[1.02] shadow-md mb-4">
                        + Add New Lens
                    </button>

                    <!-- Lenses List -->
                    <div id="lensesList" class="space-y-4 max-h-96 overflow-y-auto">
                        <p class="text-center text-gray-400 py-8">Loading lenses...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Lens Modal -->
    <div id="lensModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-8 max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <h3 id="modalTitle" class="text-2xl font-bold mb-6">Add New Lens</h3>
            <form id="lensForm" enctype="multipart/form-data">
                <input type="hidden" id="lensId" name="lens_id">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lens Name *</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Brand</label>
                        <input type="text" id="brand" name="brand" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                        <input type="text" id="color" name="color" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="e.g., Blue, Brown, Gray">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Type *</label>
                        <input type="text" id="type" name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="e.g., Daily, Monthly, Colored">
                    </div>
                    
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                        <input type="file" id="image" name="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        <p class="text-xs text-gray-500 mt-1">Upload a lens image (optional)</p>
                        <div id="imagePreview" class="mt-2 hidden">
                            <img id="previewImg" src="" alt="Preview" class="w-20 h-20 rounded-full object-cover border-2 border-gray-300">
                        </div>
                    </div>
                </div>
                
                <div class="flex gap-4 mt-6">
                    <button type="submit" id="submitBtn" class="flex-1 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-all">
                        Save Lens
                    </button>
                    <button type="button" onclick="closeLensModal()" class="flex-1 bg-gray-300 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-400 transition-all">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
        let allLenses = [];

        // ========================================
        // AUTHENTICATION & INITIALIZATION
        // ========================================
        document.addEventListener('DOMContentLoaded', function() {
            const token = localStorage.getItem('auth_token');
            const role = localStorage.getItem('user_role');
            const userInfo = JSON.parse(localStorage.getItem('user_info') || '{}');
            
            console.log('🔐 Checking authentication...');
            console.log('Token:', token ? 'Present' : 'Missing');
            console.log('Role:', role);
            
            if (!token || role !== 'admin') {
                console.error('❌ Unauthorized access');
                alert('Please login as an admin to access this page');
                window.location.href = '/signup';
                return;
            }
            
            console.log('✅ Admin authenticated:', userInfo.name || userInfo.email);
            
            if (userInfo.email) {
                document.getElementById('admin-email').textContent = userInfo.email;
                document.getElementById('sidebar-email').textContent = userInfo.email;
            }
            
            loadDashboardData(token);
            setupImagePreview();
            setupFormSubmission();
            setupShopSearch();
        });

        // ========================================
        // LOAD DASHBOARD DATA
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
                    
                    document.getElementById('loading-spinner').classList.add('hidden');
                    document.getElementById('dashboard-content').classList.remove('hidden');
                    
                    updateDashboardUI(result.data);
                } else {
                    console.error('❌ Failed to load dashboard:', result.message);
                    alert('Failed to load dashboard data: ' + (result.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('🚨 Dashboard load error:', error);
                document.getElementById('loading-spinner').innerHTML = 
                    '<p class="text-red-600">Failed to load dashboard. Please refresh the page.</p>';
            }
        }

        // ========================================
        // UPDATE DASHBOARD UI
        // ========================================
        function updateDashboardUI(data) {
            console.log('🎨 Updating dashboard UI with data:', data);
            
            if (data.stats) {
                updateStats(data.stats);
            }
            
            if (data.recent_shops) {
                updateShopsList(data.recent_shops);
            }
            
            loadLenses();
        }

        // ========================================
        // UPDATE STATISTICS
        // ========================================
        function updateStats(stats) {
            console.log('📊 Updating stats:', stats);
            
            document.getElementById('totalShops').textContent = stats.total_shops || 0;
            document.getElementById('activeUsers').textContent = (stats.active_users || 0).toLocaleString();
            document.getElementById('totalLenses').textContent = stats.lens_catalog || 0;
            
            const revenue = stats.monthly_revenue || 0;
            document.getElementById('totalValue').textContent = '$' + (revenue / 1000).toFixed(1) + 'K';
        }

        // ========================================
        // LOAD LENSES
        // ========================================
        async function loadLenses() {
            try {
                const token = localStorage.getItem('auth_token');
                const response = await fetch('/api/lenses', {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();
                
                if (data.success) {
                    allLenses = data.data;
                    displayLenses(allLenses);
                    updateLensCount();
                }
            } catch (error) {
                console.error('Error loading lenses:', error);
                document.getElementById('lensesList').innerHTML = '<p class="text-center text-red-400 py-8">Error loading lenses</p>';
            }
        }

        // ========================================
        // DISPLAY LENSES
        // ========================================
        function displayLenses(lenses) {
            const lensesList = document.getElementById('lensesList');
            
            if (!lenses || lenses.length === 0) {
                lensesList.innerHTML = '<p class="text-center text-gray-400 py-8">No lenses found</p>';
                return;
            }
            
            lensesList.innerHTML = '';
            lenses.forEach(lens => {
                const lensId = lens.lens_id || lens.id;
                
                const imageHtml = lens.image 
                    ? `<img src="${lens.image}" alt="${lens.name}" class="w-12 h-12 rounded-full object-cover border-2 border-gray-200">`
                    : `<div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center text-white font-bold">${lens.name.charAt(0).toUpperCase()}</div>`;
                
                const lensHTML = `
                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-all">
                        <div class="flex items-center gap-4">
                            ${imageHtml}
                            <div>
                                <h3 class="font-semibold text-gray-900">${lens.name}</h3>
                                <p class="text-sm text-gray-600">${lens.brand || 'Generic'} • ${lens.type || 'Colored'}</p>
                                <p class="text-xs text-gray-500">Color: ${lens.color || 'Grey'}</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <button onclick="editLens(${lensId})" class="text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">Edit</button>
                            <button onclick="deleteLens(${lensId})" class="text-red-600 hover:text-red-800 font-medium text-sm transition-colors">Delete</button>
                        </div>
                    </div>
                `;
                lensesList.innerHTML += lensHTML;
            });
        }

        // ========================================
        // UPDATE LENS COUNT
        // ========================================
        function updateLensCount() {
            const totalLensesEl = document.getElementById('totalLenses');
            const totalValueEl = document.getElementById('totalValue');
            
            if (totalLensesEl) {
                totalLensesEl.textContent = allLenses.length;
            }
            
            if (totalValueEl) {
                const totalValue = allLenses.reduce((sum, lens) => {
                    const price = parseFloat(lens.price || 0);
                    return sum + price;
                }, 0);
                totalValueEl.textContent = '$' + (totalValue / 1000).toFixed(1) + 'K';
            }
        }

        // ========================================
        // UPDATE SHOPS LIST
        // ========================================
        function updateShopsList(shops) {
            console.log('🏪 Updating shops list:', shops);
            
            const shopsList = document.getElementById('shopsList');
            
            if (!shops || shops.length === 0) {
                shopsList.innerHTML = '<p class="text-center text-gray-400 py-8">No shops found</p>';
                return;
            }
            
            shopsList.innerHTML = '';
            shops.forEach(shop => {
                const shopHTML = `
                    <div class="group flex justify-between items-center p-5 bg-gray-50 border border-gray-200 rounded-2xl transition-all duration-500 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:shadow-xl hover:border-blue-400">
                        <div>
                            <h3 class="font-semibold text-gray-800 group-hover:text-blue-700 transition-colors">${shop.name}</h3>
                            <p class="text-sm text-gray-600">${shop.email}</p>
                            <p class="text-xs text-gray-400 mt-1">${shop.status || 'Active'}</p>
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
        // SHOP SEARCH
        // ========================================
        function setupShopSearch() {
            const searchInput = document.getElementById('shop-search');
            if (searchInput) {
                searchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.toLowerCase();
                    const shopItems = document.querySelectorAll('#shopsList > div');
                    
                    shopItems.forEach(item => {
                        const shopName = item.querySelector('h3').textContent.toLowerCase();
                        if (shopName.includes(searchTerm)) {
                            item.style.display = 'flex';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            }
        }

        // ========================================
        // MODAL FUNCTIONS
        // ========================================
        function openAddLensModal() {
            document.getElementById('modalTitle').textContent = 'Add New Lens';
            document.getElementById('lensForm').reset();
            document.getElementById('lensId').value = '';
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('lensModal').classList.remove('hidden');
        }

        function closeLensModal() {
            document.getElementById('lensModal').classList.add('hidden');
            document.getElementById('imagePreview').classList.add('hidden');
        }

        function editLens(id) {
            const lens = allLenses.find(l => l.id === id || l.lens_id === id);
            if (!lens) {
                console.error('Lens not found with id:', id);
                return;
            }
            
            document.getElementById('modalTitle').textContent = 'Edit Lens';
            document.getElementById('lensId').value = lens.id || lens.lens_id;
            
            document.getElementById('name').value = lens.name || '';
            document.getElementById('brand').value = lens.brand || '';
            document.getElementById('color').value = lens.color || '';
            document.getElementById('type').value = lens.type || '';
            
            const imagePreview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');
            
            if (lens.image && previewImg && imagePreview) {
                const imageUrl = lens.image.startsWith('http') 
                    ? lens.image 
                    : '/storage/' + lens.image;
                previewImg.src = imageUrl;
                imagePreview.classList.remove('hidden');
            } else if (imagePreview) {
                imagePreview.classList.add('hidden');
            }
            
            document.getElementById('lensModal').classList.remove('hidden');
        }

        // ========================================
        // DELETE LENS
        // ========================================
        async function deleteLens(id) {
            if (!confirm('Are you sure you want to delete this lens?')) return;

            const token = localStorage.getItem('auth_token');
            let csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            
            if (!csrfToken) {
                const cookies = document.cookie.split(';');
                for (let cookie of cookies) {
                    const [name, value] = cookie.trim().split('=');
                    if (name === 'XSRF-TOKEN') {
                        csrfToken = decodeURIComponent(value);
                        break;
                    }
                }
            }
            
            console.log('Deleting lens ID:', id);
            
            const endpoints = [
                `/admin/lenses/${id}`,
                `/api/admin/lenses/${id}`,
                `/lenses/${id}`,
            ];
            
            try {
                let lastError = null;
                
                for (const endpoint of endpoints) {
                    console.log(`Trying endpoint: ${endpoint}`);
                    
                    try {
                        const headers = {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        };
                        
                        if (csrfToken) {
                            headers['X-CSRF-TOKEN'] = csrfToken;
                        }
                        
                        if (token) {
                            headers['Authorization'] = 'Bearer ' + token;
                        }
                        
                        let response = await fetch(endpoint, {
                            method: 'DELETE',
                            headers: headers
                        });
                        
                        console.log(`DELETE response: ${response.status} ${response.statusText}`);
                        
                        if (response.status === 404 || response.status === 405) {
                            console.log('Trying POST with _method=DELETE');
                            
                            const formData = new FormData();
                            formData.append('_method', 'DELETE');
                            
                            const postHeaders = { ...headers };
                            delete postHeaders['Content-Type'];
                            
                            response = await fetch(endpoint, {
                                method: 'POST',
                                headers: postHeaders,
                                body: formData
                            });
                            
                            console.log(`POST response: ${response.status} ${response.statusText}`);
                        }
                        
                        if (response.ok) {
                            const contentType = response.headers.get('content-type');
                            let data;
                            
                            if (contentType && contentType.includes('application/json')) {
                                data = await response.json();
                            } else {
                                const text = await response.text();
                                try {
                                    data = JSON.parse(text);
                                } catch (e) {
                                    data = { success: true };
                                }
                            }
                            
                            if (data.success !== false) {
                                console.log('✓ Lens deleted successfully via', endpoint);
                                alert('Lens deleted successfully');
                                await loadLenses();
                                return;
                            }
                        }
                        
                        const errorText = await response.text();
                        lastError = { endpoint, status: response.status, body: errorText };
                        console.error('Failed:', lastError);
                        
                    } catch (fetchError) {
                        console.error(`Network error for ${endpoint}:`, fetchError);
                        lastError = { endpoint, error: fetchError.message };
                    }
                }
                
                console.error('All endpoints failed. Last error:', lastError);
                alert('Failed to delete lens. Error: ' + (lastError.body || lastError.error || 'Unknown error'));
                
            } catch (error) {
                console.error('Unexpected error:', error);
                alert('Error deleting lens: ' + error.message);
            }
        }

        // ========================================
        // IMAGE PREVIEW
        // ========================================
        function setupImagePreview() {
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');
            
            if (imageInput && imagePreview && previewImg) {
                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        if (!file.type.startsWith('image/')) {
                            alert('Please select a valid image file');
                            this.value = '';
                            imagePreview.classList.add('hidden');
                            return;
                        }
                        
                        if (file.size > 2 * 1024 * 1024) {
                            alert('Image size must be less than 2MB');
                            this.value = '';
                            imagePreview.classList.add('hidden');
                            return;
                        }
                        
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewImg.src = e.target.result;
                            imagePreview.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file);
                    } else {
                        imagePreview.classList.add('hidden');
                    }
                });
            }
        }

        // ========================================
        // FORM SUBMISSION
        // ========================================
        function setupFormSubmission() {
            const lensForm = document.getElementById('lensForm');
            
            if (lensForm) {
                lensForm.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    
                    const token = localStorage.getItem('auth_token');
                    let csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    
                    if (!csrfToken) {
                        const cookies = document.cookie.split(';');
                        for (let cookie of cookies) {
                            const [name, value] = cookie.trim().split('=');
                            if (name === 'XSRF-TOKEN') {
                                csrfToken = decodeURIComponent(value);
                                break;
                            }
                        }
                    }
                    
                    const submitBtn = document.getElementById('submitBtn');
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.textContent = 'Saving...';
                    }
                    
                    const formData = new FormData(this);
                    const lensId = document.getElementById('lensId')?.value;
                    
                    let url, method;
                    if (lensId) {
                        url = `/admin/lenses/${lensId}`;
                        method = 'POST';
                        formData.append('_method', 'PUT');
                    } else {
                        url = '/admin/lenses';
                        method = 'POST';
                    }
                    
                    const alternativeUrls = [
                        url,
                        url.replace('/admin/', '/api/admin/'),
                        url.replace('/admin/', '/')
                    ];

                    try {
                        let lastError = null;
                        
                        for (const tryUrl of alternativeUrls) {
                            console.log(`Trying to save to: ${tryUrl}`);
                            
                            const headers = {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            };
                            
                            if (csrfToken) {
                                headers['X-CSRF-TOKEN'] = csrfToken;
                            }
                            
                            if (token) {
                                headers['Authorization'] = 'Bearer ' + token;
                            }
                            
                            try {
                                const response = await fetch(tryUrl, {
                                    method: method,
                                    headers: headers,
                                    body: formData
                                });
                                
                                console.log(`Response: ${response.status} ${response.statusText}`);
                                
                                if (response.ok) {
                                    const contentType = response.headers.get('content-type');
                                    let data;
                                    
                                    if (contentType && contentType.includes('application/json')) {
                                        data = await response.json();
                                    } else {
                                        const text = await response.text();
                                        try {
                                            data = JSON.parse(text);
                                        } catch (e) {
                                            data = { success: true };
                                        }
                                    }
                                    
                                    if (data.success !== false) {
                                        console.log('✓ Lens saved successfully');
                                        alert(lensId ? 'Lens updated successfully' : 'Lens added successfully');
                                        closeLensModal();
                                        await loadLenses();
                                        return;
                                    } else {
                                        const errorMsg = data.errors 
                                            ? Object.values(data.errors).flat().join(', ')
                                            : data.message || 'Unknown error';
                                        alert('Error: ' + errorMsg);
                                        return;
                                    }
                                }
                                
                                const errorText = await response.text();
                                lastError = { url: tryUrl, status: response.status, body: errorText };
                                console.error('Failed:', lastError);
                                
                            } catch (fetchError) {
                                console.error(`Network error for ${tryUrl}:`, fetchError);
                                lastError = { url: tryUrl, error: fetchError.message };
                            }
                        }
                        
                        alert('Error saving lens: ' + (lastError.body || lastError.error || 'Unknown error'));
                        
                    } catch (error) {
                        console.error('Error:', error);
                        alert('Error saving lens: ' + error.message);
                    } finally {
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.textContent = 'Save Lens';
                        }
                    }
                });
            }
        }

        // ========================================
        // VIEW SHOP
        // ========================================
        function viewShop(shopId) {
            console.log('👀 Viewing shop:', shopId);
            alert('Viewing shop ID: ' + shopId);
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
</body>
</html>