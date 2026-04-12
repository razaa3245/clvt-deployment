<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LensPilot - Shopkeeper Activation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-[#F0F4FD]" style="font-family:'Plus Jakarta Sans',sans-serif;">

    <!-- SIDEBAR (Desktop & Tablet) -->
    <aside x-data x-init="$store.sidebar = { open: false }" 
           :class="$store.sidebar.open ? 'w-64' : 'w-20'" 
           class="desktop-sidebar h-screen shadow-xl transition-all duration-300 flex flex-col justify-between fixed top-0 left-0 z-50" style="background:#0B1437;border-right:1px solid rgba(255,255,255,0.08);">
        
        <!-- Top Section -->
        <div>
            <!-- Logo -->
            <div class="flex items-center justify-between p-4 border-b" style="border-color:rgba(255,255,255,0.08);">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" style="background:linear-gradient(135deg,#3B82F6,#06B6D4);">
                        <span id="sidebar-email-first" class="text-white font-bold text-base"></span>
                    </div>
                     <div x-show="$store.sidebar.open" class="overflow-hidden">
            <span id="sidebar-email" class="text-white text-xs font-semibold block truncate max-w-[140px]"></span>
            <p class="text-xs mt-0.5" style="color:rgba(255,255,255,.4);">Admin</p>
          </div>
                </div>
                <button @click="$store.sidebar.open = !$store.sidebar.open" class="p-1.5 rounded-lg flex-shrink-0 transition-colors" style="color:rgba(255,255,255,.5);" onmouseover="this.style.background='rgba(255,255,255,.1)'" onmouseout="this.style.background='transparent'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="mt-6">
                <p x-show="$store.sidebar.open" class="text-xs font-semibold tracking-widest uppercase px-3 mb-2" x-transition style="color:rgba(255,255,255,.3);">Overview</p>
                <ul>
                    <li>
                        <a href="/admin/dashboard" class="flex items-center px-4 py-2.5 rounded-xl mx-1 text-sm border-r-4 transition-all" style="color:rgba(255,255,255,.55);border-right-color:transparent;" onmouseover="this.style.background='rgba(255,255,255,.07)';this.style.color='rgba(255,255,255,.9)'" onmouseout="this.style.background='transparent';this.style.color='rgba(255,255,255,.55)'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span x-show="$store.sidebar.open" x-transition class="ml-3 text-sm">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/catalog" class="flex items-center px-4 py-2.5 rounded-xl mx-1 text-sm border-r-4 transition-all" style="color:rgba(255,255,255,.55);border-right-color:transparent;" onmouseover="this.style.background='rgba(255,255,255,.07)';this.style.color='rgba(255,255,255,.9)'" onmouseout="this.style.background='transparent';this.style.color='rgba(255,255,255,.55)'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span x-show="$store.sidebar.open" x-transition class="ml-3 text-sm">Lens Catalog</span>
                        </a>
                    </li>
                    <li>
                        <a href="/shopkeeper/catalog2" class="flex items-center px-4 py-2.5 rounded-xl mx-1 text-sm border-r-4 transition-all" style="color:rgba(255,255,255,.55);border-right-color:transparent;" onmouseover="this.style.background='rgba(255,255,255,.07)';this.style.color='rgba(255,255,255,.9)'" onmouseout="this.style.background='transparent';this.style.color='rgba(255,255,255,.55)'">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24" height="24">
                              <rect x="3" y="7" width="18" height="13" rx="2" stroke-width="2"/>
                              <circle cx="12" cy="13" r="3" stroke-width="2"/>
                              <path stroke-width="2" d="M8 7l2-2h4l2 2"/>
                            </svg>
                            <span x-show="$store.sidebar.open" x-transition class="ml-3 text-sm">Lens TryOn</span>
                        </a>
                    </li>
                    <li>
                        <a href="/shopkeeper-approvals" class="flex items-center px-4 py-2.5 rounded-xl mx-1 text-sm font-semibold border-r-4 transition-all" style="background:rgba(59,130,246,.15);color:#fff;border-right-color:#3B82F6;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span x-show="$store.sidebar.open" x-transition class="ml-3 text-sm font-semibold">Approvals</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Account Section -->
        <div class="py-3 px-2 border-t" style="border-color:rgba(255,255,255,.08);">
            <ul>
                <li>
                    <button onclick="logout()" class="flex items-center px-4 py-2.5 rounded-xl mx-1 w-full text-left text-sm border-r-4 transition-all" style="color:rgba(239,68,68,.75);border-right-color:transparent;" onmouseover="this.style.background='rgba(239,68,68,.08)'" onmouseout="this.style.background='transparent'">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span x-show="$store.sidebar.open" class="ml-3 whitespace-nowrap">Logout</span>
                    </button>
                </li>
            </ul>
        </div>
    </aside>

    <!-- MOBILE BOTTOM NAVIGATION -->
    <nav id="mobile-bottom-nav" role="navigation" aria-label="Mobile navigation">
        <div class="nav-items">
            <a href="/admin/dashboard" class="mob-nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>
            <a href="/catalog" class="mob-nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                Catalog
            </a>
            <a href="/shopkeeper/catalog2" class="mob-nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <rect x="3" y="7" width="18" height="13" rx="2" stroke-width="2"/>
                    <circle cx="12" cy="13" r="3" stroke-width="2"/>
                    <path stroke-width="2" d="M8 7l2-2h4l2 2"/>
                </svg>
                Try-On
            </a>
            <a href="/admin/messages" class="mob-nav-item active">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Approvals
            </a>
            <button onclick="logout()" class="mob-nav-item logout-item">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </button>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div x-data :class="$store.sidebar && $store.sidebar.open ? 'ml-64' : 'ml-20'" class="main-content-wrapper transition-all duration-300" style="font-family:'Plus Jakarta Sans',sans-serif;">
        <!-- HEADER -->
        <header class="bg-white border-b sticky top-0 z-40" style="border-color:#E8EDF6;padding:14px 32px;">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
                    <h1 class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">LensPilot</h1>
                    <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full" style="background:#EFF6FF;color:#3B82F6;">Admin Console</span>
                </div>
                
                <div class="flex items-center gap-4">
                    <span class="px-3 py-1.5 rounded-lg text-xs font-bold" style="background:#F0F4FD;color:#0B1437;">
                        <span x-data="shopkeeperApp()" x-text="shopkeepers.length"></span> Shopkeepers
                    </span>
                </div>
            </div>
        </header>

        <!-- Page Header with Gradient -->
        <div class="px-8 py-8 border-b" style="background:linear-gradient(135deg,#0B1437 0%,#192566 100%);border-color:rgba(255,255,255,.1);">
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center" style="background:rgba(59,130,246,.2);border:1px solid rgba(59,130,246,.3);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">Shopkeeper Approvals</h1>
                        <p class="text-sm mt-0.5" style="color:rgba(255,255,255,.5);">Review and manage registered shopkeepers</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- MAIN SECTION -->
        <main class="container mx-auto px-10 py-8" x-data="shopkeeperApp()">
            
            <!-- Statistics Bar -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="relative overflow-hidden p-6 transition-all hover:shadow-xl hover:-translate-y-1" style="background:#fff;border:1px solid #E8EDF6;border-radius:16px;">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-cyan-50 rounded-full -mr-12 -mt-12 opacity-50"></div>
                    <div class="relative flex items-center gap-4">
                        <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Registered Shopkeepers</p>
                            <p class="text-3xl font-bold text-gray-900" x-text="shopkeepers.length">0</p>
                        </div>
                    </div>
                </div>

                <div class="relative overflow-hidden p-6 transition-all hover:shadow-xl hover:-translate-y-1" style="background:#fff;border:1px solid #E8EDF6;border-radius:16px;">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-emerald-50 rounded-full -mr-12 -mt-12 opacity-50"></div>
                    <div class="relative flex items-center gap-4">
                        <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Auto-Refresh</p>
                            <p class="text-lg font-bold text-gray-900">Every 30s</p>
                        </div>
                    </div>
                </div>

                <div class="relative overflow-hidden p-6 transition-all hover:shadow-xl hover:-translate-y-1" style="background:#fff;border:1px solid #E8EDF6;border-radius:16px;">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-full -mr-12 -mt-12 opacity-50"></div>
                    <div class="relative flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Quick Actions</p>
                            <p class="text-lg font-bold text-gray-900">Enabled</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Loading State -->
            <div x-show="loading" class="flex justify-center items-center py-20">
                <div style="width:36px;height:36px;border:3px solid #E2E8F0;border-top-color:#3B82F6;border-radius:50%;animation:spin .75s linear infinite;"></div>
                <p class="ml-3 text-sm font-medium" style="color:#94A3B8;">Loading confirmations...</p>
            </div>

            <!-- Empty State -->
            <div x-show="!loading && shopkeepers.length === 0" class="bg-white rounded-2xl shadow-lg border border-gray-100 p-16 text-center">
                <div class="w-24 h-24 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">All Clear!</h3>
                <p class="text-gray-500 text-lg">No pending confirmations at the moment.</p>
                <p class="text-gray-400 text-sm mt-2">All shopkeeper signups have been processed.</p>
            </div>

            <!-- Shopkeeper List -->
            <div x-show="!loading && shopkeepers.length > 0" class="space-y-4">
                <template x-for="shopkeeper in shopkeepers" :key="shopkeeper.id">
                    <div class="group relative overflow-hidden p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5" style="background:#fff;border:1px solid #E8EDF6;border-radius:16px;">
                        <!-- Background Decoration -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-50 rounded-full -mr-16 -mt-16 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        
                        <div class="relative flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                            <!-- Left Section: Info -->
                            <div class="flex-1 flex items-start gap-4">
                                <!-- Avatar -->
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center text-white font-bold text-lg flex-shrink-0" style="background:linear-gradient(135deg,#3B82F6,#2563EB);">
                                    <span x-text="shopkeeper.shop_name.charAt(0).toUpperCase()"></span>
                                </div>
                                
                                <!-- Details -->
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <h3 class="font-bold text-gray-900 text-lg" x-text="shopkeeper.shop_name"></h3>
                                        <span 
:class="shopkeeper.is_approved ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700'"
class="px-3 py-1 text-xs font-semibold rounded-full">

<span x-text="shopkeeper.is_approved ? 'Approved' : 'Pending'"></span>
</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-2">
                                        <strong class="text-cyan-600" x-text="shopkeeper.name"></strong> has requested confirmation for their account.
                                    </p>
                                    <div class="flex flex-wrap gap-3 text-xs text-gray-500">
                                        <span class="flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            <span x-text="shopkeeper.email"></span>
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span x-text="shopkeeper.time_ago"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Section: Actions -->
                            <div class="flex flex-wrap lg:flex-nowrap gap-2 w-full lg:w-auto">
                                <button @click="viewDetails(shopkeeper)" 
                                        class="flex-1 lg:flex-none text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition-all flex items-center justify-center gap-2" style="background:#3B82F6;border:none;" onmouseover="this.style.boxShadow='0 4px 14px rgba(59,130,246,.4)'" onmouseout="this.style.boxShadow=''">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View
                                </button>
                                <button @click="deleteShopkeeper(shopkeeper.id)"
                                        class="flex-1 lg:flex-none text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition-all flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600"
                                        style="border:none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Delete
                                </button>
                                 <!-- ACTIVE / DEACTIVE -->
        <button @click="toggleStatus(shopkeeper.id)"
            :class="shopkeeper.is_active ? 'bg-yellow-500 hover:bg-yellow-600' : 'bg-green-500 hover:bg-green-600'"
            class="text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition-all">

            <span x-text="shopkeeper.is_active ? 'Deactivate' : 'Activate'"></span>
        </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

           <!-- Details Modal -->
            <div x-show="showDetails" 
                 x-cloak 
                 @click.self="showDetails = false"
                 class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl relative transform transition-all" style="font-family:'Plus Jakarta Sans',sans-serif;"
                     @click.stop
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95">
                    
                    <!-- Modal Header -->
                    <div class="px-8 py-5 border-b rounded-t-2xl" style="background:linear-gradient(135deg,#0B1437,#192566);border-color:rgba(255,255,255,.1);">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background:rgba(59,130,246,.3);border:1px solid rgba(59,130,246,.4);">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <h2 class="text-lg font-bold text-white">Shopkeeper Details</h2>
                            </div>
                            <button @click="showDetails = false" 
                                    class="p-2 rounded-lg transition-colors" style="color:rgba(255,255,255,.7);" onmouseover="this.style.background='rgba(255,255,255,.15)'" onmouseout="this.style.background='transparent'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Modal Body -->
                    <div class="p-8 max-h-[60vh] overflow-y-auto custom-scrollbar">
                        <template x-if="selectedShopkeeper">
                            <div class="space-y-5">
                                <!-- Avatar Section -->
                                <div class="flex items-center gap-4 pb-5 border-b-2 border-gray-100">
                                    <div class="w-14 h-14 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg" style="background:linear-gradient(135deg,#3B82F6,#2563EB);">
                                        <span x-text="selectedShopkeeper.shop_name.charAt(0).toUpperCase()"></span>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900" x-text="selectedShopkeeper.shop_name"></h3>
                                        <p class="text-sm text-gray-500">Shopkeeper Details</p>
                                    </div>
                                </div>

                                <!-- Details Grid -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <!-- Full Name -->
                                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                        <div class="flex items-center gap-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Full Name</p>
                                        </div>
                                        <p class="text-sm font-semibold text-gray-900" x-text="selectedShopkeeper.name"></p>
                                    </div>

                                    <!-- Shop Name -->
                                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                        <div class="flex items-center gap-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                            <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Shop Name</p>
                                        </div>
                                        <p class="text-sm font-semibold text-gray-900" x-text="selectedShopkeeper.shop_name"></p>
                                    </div>

                                    <!-- Retailer Name -->
                                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                        <div class="flex items-center gap-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Retailer Name</p>
                                        </div>
                                        <p class="text-sm font-semibold text-gray-900" x-text="selectedShopkeeper.retailer_name"></p>
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                        <div class="flex items-center gap-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Phone Number</p>
                                        </div>
                                        <p class="text-sm font-semibold text-gray-900" x-text="selectedShopkeeper.phone_number"></p>
                                    </div>

                                    <!-- Email -->
                                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 md:col-span-2">
                                        <div class="flex items-center gap-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Email Address</p>
                                        </div>
                                        <p class="text-sm font-semibold text-gray-900" x-text="selectedShopkeeper.email"></p>
                                    </div>

                                    <!-- Address -->
                                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 md:col-span-2">
                                        <div class="flex items-center gap-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Address</p>
                                        </div>
                                        <p class="text-sm font-semibold text-gray-900" x-text="selectedShopkeeper.address"></p>
                                    </div>

                                    <!-- Signup Date -->
                                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 md:col-span-2">
                                        <div class="flex items-center gap-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Signup Date</p>
                                        </div>
                                        <p class="text-sm font-semibold text-gray-900" x-text="selectedShopkeeper.created_at"></p>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Modal Footer -->
                    <div class="border-t border-gray-200 px-8 py-6 bg-gray-50 rounded-b-2xl">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <button @click="showDetails = false" 
                                    class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-xl font-semibold transition-all hover:shadow-md text-sm">
                                Close
                            </button>
                             
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Custom Styles -->
    <style>
        /* ── Mobile Bottom Navigation ── */
        #mobile-bottom-nav {
            display: none;
            position: fixed;
            bottom: 0; left: 0; right: 0;
            z-index: 100;
            background: #0B1437;
            border-top: 1px solid rgba(255,255,255,0.08);
            padding: 8px 0 max(8px, env(safe-area-inset-bottom));
            box-shadow: 0 -4px 24px rgba(11,20,55,0.18);
        }
        #mobile-bottom-nav .nav-items {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        #mobile-bottom-nav .mob-nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3px;
            padding: 6px 10px;
            border-radius: 12px;
            text-decoration: none;
            transition: background 0.2s;
            color: rgba(255,255,255,0.5);
            font-size: 10px;
            font-weight: 500;
            cursor: pointer;
            background: none;
            border: none;
            min-width: 52px;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        #mobile-bottom-nav .mob-nav-item svg { width: 22px; height: 22px; flex-shrink: 0; }
        #mobile-bottom-nav .mob-nav-item.active { color: #3B82F6; background: rgba(59,130,246,0.12); }
        #mobile-bottom-nav .mob-nav-item:not(.active):hover { background: rgba(255,255,255,0.07); color: rgba(255,255,255,0.85); }
        #mobile-bottom-nav .mob-nav-item.logout-item { color: rgba(239,68,68,0.75); }
        #mobile-bottom-nav .mob-nav-item.logout-item:hover { background: rgba(239,68,68,0.08); }

        /* ── Responsive Breakpoints ── */
        @media (max-width: 767px) {
            aside.desktop-sidebar { display: none !important; }
            #mobile-bottom-nav { display: block; }
            .main-content-wrapper { margin-left: 0 !important; padding-bottom: 80px; }
            header { padding-left: 16px !important; padding-right: 16px !important; }
            .container.mx-auto { padding-left: 16px !important; padding-right: 16px !important; }
            .px-8, .px-10 { padding-left: 16px !important; padding-right: 16px !important; }
            .py-8 { padding-top: 24px !important; padding-bottom: 24px !important; }
            /* Stats grid single col on mobile */
            .grid.md\:grid-cols-3 { grid-template-columns: 1fr !important; }
            /* Shopkeeper action buttons full width on mobile */
            .flex-wrap.lg\:flex-nowrap { flex-wrap: wrap !important; }
        }
        @media (min-width: 768px) and (max-width: 1023px) {
            .main-content-wrapper { margin-left: 5rem !important; }
            #mobile-bottom-nav { display: none !important; }
            .grid.md\:grid-cols-3 { grid-template-columns: repeat(2, 1fr) !important; }
        }
        @media (min-width: 1024px) {
            #mobile-bottom-nav { display: none !important; }
        }

        [x-cloak] { display: none !important; }
        @keyframes spin { to { transform: rotate(360deg); } }

        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        * { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .group:hover { animation: none; }
    </style>



    <!-- JavaScript -->
    <script>
         // ========================================
    // INITIALIZATION
    // ========================================
    document.addEventListener('DOMContentLoaded', function() {
      const token = localStorage.getItem('auth_token');
      const userInfo = JSON.parse(localStorage.getItem('user_info') || '{}');
      const email = userInfo.email;
      const firstLetter = email.charAt(0).toUpperCase();   
      
      if (userInfo.email) {
        
        document.getElementById('sidebar-email').textContent = userInfo.email;
        // NEW separate line showing only first letter
        document.getElementById('sidebar-email-first').textContent = firstLetter;
      }
      
      loadLenses();
      setupImagePreview();
      setupEditForm();
    });
        function shopkeeperApp() {
    return {
        shopkeepers: [],
        loading: true,
        showDetails: false,
        selectedShopkeeper: null,
        csrfToken: document.querySelector('meta[name="csrf-token"]').content,

        init() {
            this.loadShopkeepers();
            setInterval(() => this.loadShopkeepers(), 30000);
        },

        async loadShopkeepers() {
            try {
                const response = await fetch('/shopkeepers/all');
                const result = await response.json();

                if (result.success) {
                    this.shopkeepers = result.data;
                }
            } catch (error) {
                console.error(error);
            } finally {
                this.loading = false;
            }
        },

        async toggleStatus(id) {
            try {
                const response = await fetch(`/shopkeepers/toggle/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': this.csrfToken
                    }
                });

                const result = await response.json();

                if (result.success) {
                    this.loadShopkeepers();
                }
            } catch (error) {
                console.error(error);
            }
        },

        viewDetails(shopkeeper) {
            this.selectedShopkeeper = shopkeeper;
            this.showDetails = true;
        },

        async approveShopkeeper(id) {
            await fetch(`/shopkeeper-approvals/approve/${id}`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': this.csrfToken }
            });
            this.loadShopkeepers();
        },

        async declineShopkeeper(id) {
            await fetch(`/shopkeeper-approvals/decline/${id}`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': this.csrfToken }
            });
            this.loadShopkeepers();
        },

        async deleteShopkeeper(id) {
            try {
                const response = await fetch(`/shopkeepers/delete/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': this.csrfToken
                    }
                });

                const result = await response.json();

                if (result.success) {
                    this.loadShopkeepers();
                }
            } catch (error) {
                console.error(error);
            }
        }
    }
        }


        function logout() {
            const token = localStorage.getItem('auth_token');
            
            if (token) {
                fetch('/api/logout', {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                }).catch(error => console.error('Logout error:', error));
            }
            
            localStorage.removeItem('auth_token');
            localStorage.removeItem('user_role');
            localStorage.removeItem('user_info');
            
            window.location.href = '/signup';
        }
    </script>
</body>
</html>