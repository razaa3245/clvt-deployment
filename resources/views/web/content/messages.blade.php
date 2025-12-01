<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VisionTech - Shopkeeper Approvals</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
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
            <p class="text-xs text-gray-400 -mt-1">Admin</p>
          </div>
                </div>
                <button @click="open = !open" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="w-5 h-5" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="mt-6">
                <p x-show="open" class="text-xs text-gray-400 px-6 mb-2 uppercase tracking-widest" x-transition>Overview</p>
                <ul>
                    <li>
                        <a href="/admin/dashboard" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span x-show="open" x-transition class="ml-3 text-sm">Dashboard</span>
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
                        <a href="/shopkeeper-approvals" class="flex items-center px-6 py-2 bg-cyan-50 text-cyan-700 group border-r-4 border-cyan-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span x-show="open" x-transition class="ml-3 text-sm font-semibold">Approvals</span>
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
                    <span class="px-4 py-2 bg-cyan-50 text-cyan-700 rounded-lg font-semibold text-sm">
                        <span x-data="shopkeeperApp()" x-text="shopkeepers.length"></span> Pending
                    </span>
                </div>
            </div>
        </header>

        <!-- Page Header with Gradient -->
        <div class="bg-gradient-to-r from-cyan-50 to-blue-100 px-10 py-8 border-b border-gray-200">
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-14 h-14 bg-cyan-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Shopkeeper Approvals</h1>
                        <p class="text-gray-600 mt-1">Review and manage pending shopkeeper registration requests</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- MAIN SECTION -->
        <main class="container mx-auto px-10 py-8" x-data="shopkeeperApp()">
            
            <!-- Statistics Bar -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="relative overflow-hidden bg-white rounded-2xl shadow-lg border border-gray-100 p-6 transition-all hover:shadow-xl">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-cyan-50 rounded-full -mr-12 -mt-12 opacity-50"></div>
                    <div class="relative flex items-center gap-4">
                        <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Pending Requests</p>
                            <p class="text-3xl font-bold text-gray-900" x-text="shopkeepers.length">0</p>
                        </div>
                    </div>
                </div>

                <div class="relative overflow-hidden bg-white rounded-2xl shadow-lg border border-gray-100 p-6 transition-all hover:shadow-xl">
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

                <div class="relative overflow-hidden bg-white rounded-2xl shadow-lg border border-gray-100 p-6 transition-all hover:shadow-xl">
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
                <div class="animate-spin rounded-full h-16 w-16 border-b-2 border-cyan-600"></div>
                <p class="ml-4 text-gray-600 text-lg">Loading confirmations...</p>
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
                    <div class="group relative overflow-hidden bg-white border-2 border-gray-100 rounded-2xl p-6 hover:border-cyan-200 hover:shadow-xl transition-all duration-300">
                        <!-- Background Decoration -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-50 rounded-full -mr-16 -mt-16 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        
                        <div class="relative flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                            <!-- Left Section: Info -->
                            <div class="flex-1 flex items-start gap-4">
                                <!-- Avatar -->
                                <div class="w-14 h-14 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-md flex-shrink-0">
                                    <span x-text="shopkeeper.shop_name.charAt(0).toUpperCase()"></span>
                                </div>
                                
                                <!-- Details -->
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <h3 class="font-bold text-gray-900 text-lg" x-text="shopkeeper.shop_name"></h3>
                                        <span class="px-3 py-1 bg-amber-100 text-amber-700 text-xs font-semibold rounded-full">Pending</span>
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
                                        class="flex-1 lg:flex-none bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-xl text-sm font-semibold transition-all hover:shadow-lg hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View
                                </button>
                                <button @click="approveShopkeeper(shopkeeper.id)" 
                                        class="flex-1 lg:flex-none bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-3 rounded-xl text-sm font-semibold transition-all hover:shadow-lg hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Accept
                                </button>
                                <button @click="declineShopkeeper(shopkeeper.id)" 
                                        class="flex-1 lg:flex-none bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-xl text-sm font-semibold transition-all hover:shadow-lg hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Decline
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
                <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl relative transform transition-all"
                     @click.stop
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95">
                    
                    <!-- Modal Header -->
                    <div class="bg-gradient-to-r from-cyan-50 to-blue-100 px-8 py-6 border-b border-gray-200 rounded-t-2xl">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-cyan-600 rounded-lg flex items-center justify-center shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">Shopkeeper Details</h2>
                            </div>
                            <button @click="showDetails = false" 
                                    class="text-gray-400 hover:text-gray-600 transition-colors p-2 hover:bg-white/50 rounded-lg">
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
                                    <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                        <span x-text="selectedShopkeeper.shop_name.charAt(0).toUpperCase()"></span>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900" x-text="selectedShopkeeper.shop_name"></h3>
                                        <p class="text-sm text-gray-500">Registration Request</p>
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
                            <button @click="approveShopkeeper(selectedShopkeeper.id); showDetails = false" 
                                    class="flex-1 bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white px-6 py-3 rounded-xl font-bold transition-all hover:shadow-xl hover:-translate-y-0.5 flex items-center justify-center gap-2 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Accept Request
                            </button>
                            <button @click="declineShopkeeper(selectedShopkeeper.id); showDetails = false" 
                                    class="flex-1 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-3 rounded-xl font-bold transition-all hover:shadow-xl hover:-translate-y-0.5 flex items-center justify-center gap-2 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Decline Request
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Custom Styles -->
    <style>
        [x-cloak] { 
            display: none !important; 
        }

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

        /* Smooth transitions */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Animation for cards */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .group:hover {
            animation: none;
        }
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
                    this.loadPendingShopkeepers();
                    setInterval(() => this.loadPendingShopkeepers(), 30000);
                },

                async loadPendingShopkeepers() {
                    try {
                        const response = await fetch('{{ route("shopkeeper.approvals.getPending") }}', {
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': this.csrfToken
                            }
                        });

                        const result = await response.json();

                        if (result.success) {
                            this.shopkeepers = result.data;
                        } else {
                            console.error(result.message);
                        }
                    } catch (error) {
                        console.error('Error loading shopkeepers:', error);
                    } finally {
                        this.loading = false;
                    }
                },

                viewDetails(shopkeeper) {
                    this.selectedShopkeeper = shopkeeper;
                    this.showDetails = true;
                },

                async approveShopkeeper(id) {
                    if (!confirm('Are you sure you want to approve this shopkeeper?')) return;

                    try {
                        const response = await fetch(`{{ url('/shopkeeper-approvals/approve') }}/${id}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': this.csrfToken
                            }
                        });

                        const result = await response.json();

                        if (result.success) {
                            // remove the notification immediately (no blocking alert)
                            this.shopkeepers = this.shopkeepers.filter(s => s.id !== id);
                        } else {
                            // show failure as a simple alert so admin knows what went wrong
                            alert(result.message);
                        }
                    } catch (error) {
                        alert('Failed to approve shopkeeper');
                        console.error('Error:', error);
                    }
                },

                async declineShopkeeper(id) {
                    if (!confirm('Are you sure you want to decline and permanently remove this shopkeeper? This action cannot be undone.')) return;

                    try {
                        const response = await fetch(`{{ url('/shopkeeper-approvals/decline') }}/${id}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': this.csrfToken
                            }
                        });

                        const result = await response.json();

                        if (result.success) {
                            // remove the notification immediately (no blocking alert)
                            this.shopkeepers = this.shopkeepers.filter(s => s.id !== id);
                        } else {
                            alert(result.message);
                        }
                    } catch (error) {
                        alert('Failed to decline shopkeeper');
                        console.error('Error:', error);
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