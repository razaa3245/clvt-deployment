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
<body class="bg-gradient-to-br from-gray-50 to-gray-100">
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
              <span id="sidebar-email-first" class="text-sm text-gray-600"></span>
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
                        <a href="/admin/dashboard" class="flex items-center px-6 py-2 bg-cyan-50 text-cyan-700 group border-r-4 border-cyan-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span x-show="open" x-transition class="ml-3 text-sm font-semibold">Dashboard</span>
                        </a>
                    </li>
            <li>
              <a href="/catalog" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <span x-show="open" x-transition class="ml-3 text-sm">Lens Catalog</span>
              </a>
            </li>
            <li>
              <a href="messages" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                <span x-show="open" class="ml-3 text-sm">Approvals</span>
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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <!-- Total Shops Card -->
                <div class="relative overflow-hidden bg-white rounded-2xl shadow-lg border border-gray-100 p-6 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full -mr-16 -mt-16 opacity-50"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-semibold rounded-full">Live</span>
                        </div>
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Total Shops</h3>
                        <p class="text-4xl font-bold text-gray-900" id="totalShops">0</p>
                        <div class="mt-4 flex items-center text-xs text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            Registered locations
                        </div>
                    </div>
                </div>

                <!-- Active Users Card -->
                <div class="relative overflow-hidden bg-white rounded-2xl shadow-lg border border-gray-100 p-6 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-50 rounded-full -mr-16 -mt-16 opacity-50"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-full">Active</span>
                        </div>
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Active Users</h3>
                        <p class="text-4xl font-bold text-gray-900" id="activeUsers">2</p>
                        <div class="mt-4 flex items-center text-xs text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Online now
                        </div>
                    </div>
                </div>

                <!-- Lens Catalog Card -->
                <div class="relative overflow-hidden bg-white rounded-2xl shadow-lg border border-gray-100 p-6 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-purple-50 rounded-full -mr-16 -mt-16 opacity-50"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <span class="px-3 py-1 bg-purple-50 text-purple-700 text-xs font-semibold rounded-full">Catalog</span>
                        </div>
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Lens Catalog</h3>
                        <p class="text-4xl font-bold text-gray-900" id="totalLenses">0</p>
                        <div class="mt-4 flex items-center text-xs text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            Products available
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Sections -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Shop Management -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 px-8 py-6 border-b border-gray-200">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Shop Management</h2>
                                <p class="text-sm text-gray-600 mt-0.5">Manage and monitor registered optical shops</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-8">
                        <div class="relative mb-6">
                            <input type="text" id="shop-search" placeholder="Search shops by name or email..." class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        
                        <div id="shopsList" class="space-y-3 max-h-96 overflow-y-auto pr-2 custom-scrollbar">
                            <p class="text-center text-gray-400 py-12 text-sm">Loading shops...</p>
                        </div>
                    </div>
                </div>

                <!-- Master Lens Catalog -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-50 to-purple-100 px-8 py-6 border-b border-gray-200">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-900">Master Lens Catalog</h2>
                                    <p class="text-sm text-gray-600 mt-0.5">Add and manage lenses available across all shops</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-8">
                        <button onclick="openAddLensModal()" class="w-full bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white py-4 rounded-xl font-semibold transition-all hover:shadow-xl hover:-translate-y-0.5 shadow-md flex items-center justify-center gap-2 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add New Lens
                        </button>

                        <div id="lensesList" class="space-y-3 max-h-96 overflow-y-auto pr-2 custom-scrollbar">
                            <p class="text-center text-gray-400 py-12 text-sm">Loading lenses...</p>
                        </div>
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

    <style>
        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>

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
    
    console.log('Checking authentication...');
    console.log('Token:', token ? 'Present' : 'Missing');
    console.log('Role:', role);
    
    if (!token || role !== 'admin') {
        console.error(' Unauthorized access');
        alert('Please login as an admin to access this page');
        window.location.href = '/signup';
        return;
    }
    
    console.log(' Admin authenticated:', userInfo.name || userInfo.email);
    
    if (userInfo.email) {
        const email = userInfo.email;
        const firstLetter = email.charAt(0).toUpperCase();   // first letter only

        document.getElementById('admin-email').textContent = email;

        // ORIGINAL full-email line (kept)
        document.getElementById('sidebar-email').textContent = email;

        // NEW separate line showing only first letter
        document.getElementById('sidebar-email-first').textContent = firstLetter;
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
            console.log(' Fetching dashboard data from API...');
            
            try {
                const response = await fetch('/api/admin/dashboard', {
                    method: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });

                console.log(' API Response Status:', response.status);

                const result = await response.json();
                console.log(' API Response Data:', result);
                
                if (response.ok && result.success) {
                    console.log(' Dashboard data loaded successfully');
                    
                    document.getElementById('loading-spinner').classList.add('hidden');
                    document.getElementById('dashboard-content').classList.remove('hidden');
                    
                    updateDashboardUI(result.data);
                } else {
                    console.error(' Failed to load dashboard:', result.message);
                    alert('Failed to load dashboard data: ' + (result.message || 'Unknown error'));
                }
            } catch (error) {
                console.error(' Error fetching dashboard data:', error);
                alert('An error occurred while loading dashboard data. Please try again later.');
            }
        }
            // ========================================
    // UPDATE DASHBOARD UI
    // ========================================
    function updateDashboardUI(data) {
        console.log(' Updating dashboard UI with data:', data);
        
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
        console.log(' Updating stats:', stats);
        
        document.getElementById('totalShops').textContent = stats.total_shops || 0;
        document.getElementById('activeUsers').textContent = (stats.active_users || 0).toLocaleString();
        document.getElementById('totalLenses').textContent = stats.lens_catalog || 0;
        
        const revenue = stats.monthly_revenue || 0;
        const totalValueEl = document.getElementById('totalValue');
        if (totalValueEl) {
            totalValueEl.textContent = '$' + (revenue / 1000).toFixed(1) + 'K';
        }
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
            lensesList.innerHTML = '<p class="text-center text-gray-400 py-12 text-sm">No lenses found</p>';
            return;
        }
        
        lensesList.innerHTML = '';
        lenses.forEach(lens => {
            const lensId = lens.lens_id || lens.id;
            
            // Ensure we render lens images correctly — if stored path doesn't start with http, prefix with /storage/
            const imageUrl = lens.image ? (lens.image.startsWith('http') ? lens.image : '/storage/' + lens.image) : null;
            const imageHtml = imageUrl 
                ? `<img src="${imageUrl}" alt="${lens.name}" class="w-14 h-14 rounded-xl object-cover border-2 border-gray-200 shadow-sm">`
                : `<div class="w-14 h-14 rounded-xl bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center text-white font-bold text-lg shadow-md">${lens.name.charAt(0).toUpperCase()}</div>`;
            
            const lensHTML = `
                <div class="group flex items-center justify-between p-4 border-2 border-gray-100 rounded-xl hover:border-purple-200 hover:bg-purple-50/50 transition-all duration-300 hover:shadow-md">
                    <div class="flex items-center gap-4">
                        ${imageHtml}
                        <div>
                            <h3 class="font-semibold text-gray-900 group-hover:text-purple-700 transition-colors">${lens.name}</h3>
                            <p class="text-sm text-gray-600 mt-0.5">${lens.brand || 'Generic'} • ${lens.type || 'Colored'}</p>
                            <span class="inline-block mt-1.5 px-2.5 py-0.5 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">
                                ${lens.color || 'Grey'}
                            </span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="editLens(${lensId})" class="px-4 py-2 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-lg font-medium text-sm transition-all hover:shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                        <button onclick="deleteLens(${lensId})" class="px-4 py-2 bg-red-50 text-red-700 hover:bg-red-100 rounded-lg font-medium text-sm transition-all hover:shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
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
            console.log(' Updating shops list:', shops);
            
            const shopsList = document.getElementById('shopsList');
            
            if (!shops || shops.length === 0) {
                shopsList.innerHTML = '<p class="text-center text-gray-400 py-12 text-sm">No shops found</p>';
                return;
            }
            
            shopsList.innerHTML = '';
            shops.forEach(shop => {
                const shopHTML = `
                    <div class="group flex justify-between items-center p-5 bg-gradient-to-r from-gray-50 to-blue-50 border-2 border-gray-100 rounded-xl transition-all duration-300 hover:border-blue-300 hover:shadow-lg hover:-translate-y-0.5">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-md">
                                ${shop.name.charAt(0).toUpperCase()}
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 group-hover:text-blue-700 transition-colors text-base">${shop.name}</h3>
                                <p class="text-sm text-gray-600 mt-0.5">${shop.email}</p>
                                <span class="inline-block mt-1.5 px-2.5 py-0.5 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-full">
                                    ${shop.status || 'Active'}
                                </span>
                            </div>
                        </div>
                        <button onclick="viewShop(${shop.id})" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 rounded-lg text-sm font-semibold text-white shadow-md transition-all hover:shadow-lg hover:-translate-y-0.5">
                            View Details
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
            console.log(' Viewing shop:', shopId);
            alert('Viewing shop ID: ' + shopId);
        }

        // ========================================
        // LOGOUT
        // ========================================
        async function logout() {
            console.log(' Logging out...');
            
            const token = localStorage.getItem('auth_token');
            
            try {
                await fetch('/api/logout', {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });
                
                console.log(' Logout successful');
            } catch (error) {
                console.error('Logout error:', error);
            }
            
            localStorage.removeItem('auth_token');
            localStorage.removeItem('user_role');
            localStorage.removeItem('user_info');
            
            console.log('Local storage cleared');
            window.location.href = '/signup';
        }


        
    </script>
    <div class="pl-[5%]">
    @include('web.layouts.footer')
</div>
</body>
</html>