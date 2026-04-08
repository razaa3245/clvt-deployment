<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VisionTech - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        body { background: #F0F4FD; }

        /* Sidebar */
        aside { background: #0B1437; }
        .nav-active  { background: rgba(59,130,246,0.15); color: #fff; border-right-color: #3B82F6; }
        .nav-idle    { color: rgba(255,255,255,0.55); border-right-color: transparent; }
        .nav-idle:hover { background: rgba(255,255,255,0.07); color: rgba(255,255,255,0.9); }
        .nav-logout  { color: rgba(239,68,68,0.75); border-right-color: transparent; }
        .nav-logout:hover { background: rgba(239,68,68,0.08); }
        .sidebar-border { border-color: rgba(255,255,255,0.08); }

        /* Spinner */
        @keyframes spin { to { transform:rotate(360deg); } }
        .vt-spin { width:36px;height:36px;border:3px solid #E2E8F0;border-top-color:#3B82F6;border-radius:50%;animation:spin .75s linear infinite; }

        /* Stat cards */
        .stat-card { background:#fff;border:1px solid #E8EDF6;border-radius:16px;overflow:hidden;transition:box-shadow .2s,transform .2s; }
        .stat-card:hover { box-shadow:0 8px 32px rgba(59,130,246,0.1);transform:translateY(-2px); }

        /* Panels */
        .panel { background:#fff;border:1px solid #E8EDF6;border-radius:20px;overflow:hidden; }

        /* Search */
        #shop-search { background:#F8FAFF;border:1.5px solid #E8EDF6;border-radius:12px;outline:none;transition:border-color .2s;font-family:'Plus Jakarta Sans',sans-serif;color:#0B1437; }
        #shop-search:focus { border-color:#3B82F6; }

        /* Add-lens button */
        #add-lens-btn { background:linear-gradient(135deg,#3B82F6,#2563EB);border-radius:12px;box-shadow:0 4px 14px rgba(59,130,246,.3);transition:box-shadow .2s,transform .15s; }
        #add-lens-btn:hover { box-shadow:0 6px 20px rgba(59,130,246,.45);transform:translateY(-1px); }

        /* Modal tab */
        .modal-tab { padding:10px 14px;font-size:12px;font-weight:500;color:#94a3b8;border-bottom:2px solid transparent;margin-bottom:-1px;background:none;border-top:none;border-left:none;border-right:none;cursor:pointer; }
        .active-tab { color:#3b5fe2 !important;border-bottom-color:#3b5fe2 !important; }

        /* Scrollbar */
        .custom-scrollbar::-webkit-scrollbar { width:6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background:#f1f1f1;border-radius:10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background:#cbd5e1;border-radius:10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background:#94a3b8; }

        /* Lens modal input */
        .mi { border:1.5px solid #E2E8F0;border-radius:10px;transition:border-color .2s;font-family:'Plus Jakarta Sans',sans-serif;color:#0B1437; }
        .mi:focus { border-color:#3B82F6;outline:none;box-shadow:0 0 0 3px rgba(59,130,246,.1); }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <aside x-data="{ open: false }" :class="open ? 'w-64' : 'w-20'"
        class="h-screen shadow-xl transition-all duration-300 flex flex-col justify-between fixed top-0 left-0 z-50 border-r sidebar-border">
        <div>
            <div class="flex items-center justify-between p-4 border-b sidebar-border">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0"
                         style="background:linear-gradient(135deg,#3B82F6,#06B6D4);">
                        <span id="sidebar-email-first" class="text-white font-bold text-base"></span>
                    </div>
                    <div x-show="open" class="overflow-hidden">
                        <span id="sidebar-email" class="text-white text-xs font-semibold block truncate max-w-[140px]"></span>
                        <p class="text-xs mt-0.5" style="color:rgba(255,255,255,.4);">Admin</p>
                    </div>
                </div>
                <button @click="open = !open" class="p-1.5 rounded-lg flex-shrink-0 transition-colors"
                        style="color:rgba(255,255,255,.5);"
                        onmouseover="this.style.background='rgba(255,255,255,.1)'"
                        onmouseout="this.style.background='transparent'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>
            </div>
            <nav class="mt-4 px-2">
                <p x-show="open" class="text-xs font-semibold tracking-widest uppercase px-3 mb-2" style="color:rgba(255,255,255,.3);">Overview</p>
                <ul class="space-y-1">
                    <li>
                        <a href="/admin/dashboard" class="nav-active flex items-center px-4 py-2.5 rounded-xl mx-1 text-sm font-semibold border-r-4 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span x-show="open" x-transition class="ml-3 whitespace-nowrap">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/catalog" class="nav-idle flex items-center px-4 py-2.5 rounded-xl mx-1 text-sm border-r-4 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span x-show="open" x-transition class="ml-3 whitespace-nowrap">Lens Catalog</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/messages" class="nav-idle flex items-center px-4 py-2.5 rounded-xl mx-1 text-sm border-r-4 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span x-show="open" class="ml-3 whitespace-nowrap">Approvals</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="border-t sidebar-border py-3 px-2">
            <ul>
                <li>
                    <button onclick="logout()" class="nav-logout flex items-center px-4 py-2.5 rounded-xl mx-1 w-full text-left text-sm border-r-4 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span x-show="open" class="ml-3 whitespace-nowrap">Logout</span>
                    </button>
                </li>
            </ul>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="ml-20 transition-all duration-300">
        <header class="bg-white border-b px-8 py-4 shadow-sm sticky top-0 z-40" style="border-color:#E8EDF6;">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
                    <h1 class="text-xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">VisionTech</h1>
                    <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full" style="background:#EFF6FF;color:#3B82F6;">Admin Console</span>
                </div>
                <span id="admin-email" class="text-sm font-medium" style="color:#64748B;"></span>
            </div>
        </header>

        <!-- Loading Spinner -->
        <div id="loading-spinner" class="flex justify-center items-center py-32 gap-4">
            <div class="vt-spin"></div>
            <p class="text-sm font-medium" style="color:#94A3B8;">Loading dashboard data...</p>
        </div>

        <!-- Main Content -->
        <div id="dashboard-content" class="container mx-auto px-6 py-8 hidden">

            <div class="mb-7">
                <h2 class="text-2xl font-bold" style="color:#0B1437;">Overview</h2>
                <p class="text-sm mt-0.5" style="color:#94A3B8;">Real-time platform metrics</p>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Shops -->
                <div class="stat-card relative overflow-hidden p-6">
                    <div class="absolute top-0 right-0 w-28 h-28 -mr-14 -mt-14 rounded-full" style="background:linear-gradient(135deg,#EFF6FF,#DBEAFE);opacity:.9;"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:#EFF6FF;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" style="color:#3B82F6;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full" style="background:#EFF6FF;color:#3B82F6;">Live</span>
                        </div>
                        <h3 class="text-sm font-medium mb-1" style="color:#64748B;">Total Shops</h3>
                        <p class="text-4xl font-bold" style="color:#0B1437;" id="totalShops">—</p>
                        <p class="mt-4 text-xs" style="color:#94A3B8;">Registered locations</p>
                    </div>
                </div>

                <!-- Active Users -->
                <div class="stat-card relative overflow-hidden p-6">
                    <div class="absolute top-0 right-0 w-28 h-28 -mr-14 -mt-14 rounded-full" style="background:linear-gradient(135deg,#ECFDF5,#D1FAE5);opacity:.9;"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:#ECFDF5;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" style="color:#10B981;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full" style="background:#ECFDF5;color:#10B981;">Active</span>
                        </div>
                        <h3 class="text-sm font-medium mb-1" style="color:#64748B;">Active Shopkeepers</h3>
                        <p class="text-4xl font-bold" style="color:#0B1437;" id="activeUsers">—</p>
                        <p class="mt-4 text-xs" style="color:#94A3B8;">Approved accounts</p>
                    </div>
                </div>

                <!-- Lens Catalog -->
                <div class="stat-card relative overflow-hidden p-6">
                    <div class="absolute top-0 right-0 w-28 h-28 -mr-14 -mt-14 rounded-full" style="background:linear-gradient(135deg,#F5F3FF,#EDE9FE);opacity:.9;"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:#F5F3FF;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" style="color:#8B5CF6;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full" style="background:#F5F3FF;color:#8B5CF6;">Catalog</span>
                        </div>
                        <h3 class="text-sm font-medium mb-1" style="color:#64748B;">Lens Catalog</h3>
                        <p class="text-4xl font-bold" style="color:#0B1437;" id="totalLenses">—</p>
                        <p class="mt-4 text-xs" style="color:#94A3B8;">Products available</p>
                    </div>
                </div>
            </div>

            <!-- Shop Management + Lens Catalog -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- Shop Management -->
                <div class="panel">
                    <div class="px-7 py-5 border-b" style="background:linear-gradient(135deg,#EFF6FF,#DBEAFE);border-color:#E8EDF6;">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center shadow-md" style="background:#3B82F6;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold" style="color:#0B1437;">Shop Management</h2>
                                <p class="text-xs mt-0.5" style="color:#64748B;">Manage registered optical shops</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="relative mb-5">
                            <input type="text" id="shop-search" placeholder="Search shops by name or email..."
                                class="w-full pl-11 pr-4 py-3 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3.5 top-1/2 transform -translate-y-1/2 w-4 h-4" style="color:#94A3B8;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <div id="shopsList" class="space-y-3 max-h-96 overflow-y-auto pr-2 custom-scrollbar">
                            <p class="text-center text-gray-400 py-12 text-sm">Loading shops...</p>
                        </div>
                    </div>
                </div>

                <!-- Master Lens Catalog -->
                <div class="panel">
                    <div class="px-7 py-5 border-b" style="background:linear-gradient(135deg,#F5F3FF,#EDE9FE);border-color:#E8EDF6;">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center shadow-md" style="background:#8B5CF6;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold" style="color:#0B1437;">Master Lens Catalog</h2>
                                <p class="text-xs mt-0.5" style="color:#64748B;">Add and manage lenses for all shops</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <button id="add-lens-btn" onclick="openAddLensModal()"
                            class="w-full text-white py-3.5 font-semibold flex items-center justify-center gap-2 mb-5 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                            </svg>
                            + Add New Lens
                        </button>
                        <div id="lensesList" class="space-y-3 max-h-96 overflow-y-auto pr-2 custom-scrollbar">
                            <p class="text-center text-gray-400 py-12 text-sm">Loading lenses...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /dashboard-content -->
    </div><!-- /main -->

    <!-- Add/Edit Lens Modal -->
    <div id="lensModal" class="hidden fixed inset-0 flex items-center justify-center z-50" style="background:rgba(11,20,55,.65);backdrop-filter:blur(4px);">
        <div class="bg-white rounded-2xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">

            <div class="flex items-center justify-between px-8 py-5 border-b" style="background:linear-gradient(135deg,#0B1437,#192566);border-color:rgba(255,255,255,.1);">
                <div>
                    <h3 id="modalTitle" class="text-lg font-bold text-white">Add New Lens</h3>
                    <p class="text-xs mt-0.5" style="color:rgba(255,255,255,.5);">Fill in the details below</p>
                </div>
                <button onclick="closeLensModal()" class="w-8 h-8 rounded-full flex items-center justify-center"
                        style="color:rgba(255,255,255,.7);background:rgba(255,255,255,.1);"
                        onmouseover="this.style.background='rgba(255,255,255,.2)'"
                        onmouseout="this.style.background='rgba(255,255,255,.1)'">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="p-8">
                <div id="lens-form-msg" class="hidden mb-4 p-3 rounded-lg text-sm font-medium"></div>

                <form id="lensForm" enctype="multipart/form-data">
                    <input type="hidden" id="lensId" name="lens_id">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold mb-1.5" style="color:#475569;">Lens Name *</label>
                            <input type="text" id="lensName" name="name" required
                                class="mi w-full px-4 py-2.5 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold mb-1.5" style="color:#475569;">Brand</label>
                            <input type="text" id="lensBrand" name="brand"
                                class="mi w-full px-4 py-2.5 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold mb-1.5" style="color:#475569;">Color</label>
                            <input type="text" id="lensColor" name="color" placeholder="e.g., Blue, Brown, Gray"
                                class="mi w-full px-4 py-2.5 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold mb-1.5" style="color:#475569;">Type *</label>
                            <select id="lensType" name="type" required
                                class="mi w-full px-4 py-2.5 text-sm">
                                <option value="">Select Type</option>
                                <option value="daily">Daily</option>
                                <option value="monthly">Monthly</option>
                                <option value="yearly">Yearly</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-xs font-semibold mb-1.5" style="color:#475569;">Description</label>
                            <textarea id="lensDescription" name="description" rows="2"
                                class="mi w-full px-4 py-2.5 text-sm resize-none"></textarea>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-xs font-semibold mb-1.5" style="color:#475569;">Lens Image</label>
                            <input type="file" id="lensImage" name="image" accept="image/*"
                                class="mi w-full px-4 py-2 text-sm">
                            <p class="text-xs mt-1" style="color:#94A3B8;">JPEG/PNG/GIF, max 2MB (optional)</p>
                            <div id="imagePreview" class="mt-3 hidden">
                                <img id="previewImg" src="" alt="Preview"
                                    class="w-20 h-20 rounded-full object-cover border-2 border-purple-300 shadow">
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-4 mt-6">
                        <button type="submit" id="submitBtn"
                            class="flex-1 text-white py-3 rounded-xl font-semibold transition-all shadow-md"
                            style="background:linear-gradient(135deg,#3B82F6,#2563EB);"
                            onmouseover="this.style.boxShadow='0 6px 20px rgba(59,130,246,.45)'"
                            onmouseout="this.style.boxShadow=''">
                            Save Lens
                        </button>
                        <button type="button" onclick="closeLensModal()"
                            class="flex-1 py-3 rounded-xl font-semibold transition-all"
                            style="background:#F1F5F9;color:#475569;border:none;cursor:pointer;"
                            onmouseover="this.style.background='#E2E8F0'" onmouseout="this.style.background='#F1F5F9'">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Shop Modal — original HTML completely preserved -->
    <div id="shopModal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4"
         style="background: rgba(15,23,42,0.5);"
         onclick="handleModalBackdrop(event)">

        <div id="shopModalBox" class="bg-white rounded-2xl w-full max-w-lg overflow-hidden border border-slate-200">

            {{-- Hero header with gradient (matches VisionTech blue→purple) --}}
            <div style="background: linear-gradient(135deg, #3b5fe2 0%, #7c3aed 100%); padding: 20px 22px 16px;">
                <div class="flex items-start justify-between">
                    <div id="modalAvatar"
                         style="width:52px;height:52px;border-radius:12px;background:rgba(255,255,255,0.2);
                                border:2px solid rgba(255,255,255,0.3);display:flex;align-items:center;
                                justify-content:center;font-size:22px;font-weight:600;color:#fff;">
                        ?
                    </div>
                    <button onclick="closeShopModal()"
                            style="width:28px;height:28px;border-radius:50%;background:rgba(255,255,255,0.15);
                                   border:none;color:#fff;cursor:pointer;font-size:14px;">✕</button>
                </div>
                <p id="modalName"  class="text-white font-semibold text-lg mt-2">—</p>
                <p id="modalEmail" style="font-size:12px;color:rgba(255,255,255,0.75);margin-top:2px;">—</p>
                <div class="flex gap-2 mt-2">
                    <span id="modalStatusBadge"
                          style="font-size:10px;padding:3px 10px;border-radius:20px;font-weight:500;
                                 background:rgba(255,255,255,0.2);color:#fff;
                                 border:1px solid rgba(255,255,255,0.3);">—</span>
                </div>
            </div>

            {{-- Tabs --}}
            <div class="flex border-b border-slate-100 px-5">
                <button onclick="switchTab('info')"  id="tab-info"  class="modal-tab active-tab">Shop info</button>
                <button onclick="switchTab('plan')"  id="tab-plan"  class="modal-tab">Plan</button>
                <button onclick="switchTab('dates')" id="tab-dates" class="modal-tab">Timestamps</button>
            </div>

            {{-- Loading spinner --}}
            <div id="modalSpinner" class="flex items-center justify-center gap-2 py-10 text-slate-400 text-sm">
                <svg class="animate-spin w-4 h-4 text-indigo-500" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
                </svg>
                Fetching details…
            </div>

            {{-- Tab panels --}}
            <div id="modalContent" class="hidden px-5 py-4 max-h-64 overflow-y-auto space-y-4">

                {{-- Info tab --}}
                <div id="panel-info">
                    <p class="text-[10px] font-semibold tracking-widest text-slate-400 uppercase mb-2">Identity</p>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="bg-slate-50 rounded-lg p-3">
                            <p class="text-[10px] text-slate-400 font-medium">Full name</p>
                            <p id="dName" class="text-sm font-medium text-slate-800 mt-0.5">—</p>
                        </div>
                        <div class="bg-slate-50 rounded-lg p-3">
                            <p class="text-[10px] text-slate-400 font-medium">Retailer name</p>
                            <p id="dRetailer" class="text-sm font-medium text-slate-800 mt-0.5">—</p>
                        </div>
                        <div class="bg-slate-50 rounded-lg p-3 col-span-2">
                            <p class="text-[10px] text-slate-400 font-medium">Email address</p>
                            <p id="dEmail" class="text-sm font-medium text-slate-800 mt-0.5">—</p>
                        </div>
                        <div class="bg-slate-50 rounded-lg p-3">
                            <p class="text-[10px] text-slate-400 font-medium">Phone</p>
                            <p id="dPhone" class="text-sm font-medium text-slate-800 mt-0.5">—</p>
                        </div>
                        <div class="bg-slate-50 rounded-lg p-3">
                            <p class="text-[10px] text-slate-400 font-medium">Status</p>
                            <p id="dStatus" class="text-sm font-medium text-slate-800 mt-0.5">—</p>
                        </div>
                    </div>
                    <p class="text-[10px] font-semibold tracking-widest text-slate-400 uppercase mt-4 mb-2">Shop</p>
                    <div class="grid grid-cols-1 gap-2">
                        <div class="bg-slate-50 rounded-lg p-3">
                            <p class="text-[10px] text-slate-400 font-medium">Shop name</p>
                            <p id="dShop" class="text-sm font-medium text-slate-800 mt-0.5">—</p>
                        </div>
                        <div class="bg-slate-50 rounded-lg p-3">
                            <p class="text-[10px] text-slate-400 font-medium">Address</p>
                            <p id="dAddress" class="text-sm font-medium text-slate-800 mt-0.5">—</p>
                        </div>
                    </div>
                </div>

                {{-- Plan tab --}}
                <div id="panel-plan" class="hidden">
                    <p class="text-[10px] font-semibold tracking-widest text-slate-400 uppercase mb-2">Subscription</p>
                    <div style="background:linear-gradient(135deg,#ede9fe,#dbeafe);border-radius:10px;padding:14px 16px;"
                         class="flex items-center justify-between">
                        <div>
                            <p id="dPlanName" class="text-sm font-semibold text-indigo-600">—</p>
                            <p class="text-xs text-slate-500 mt-0.5">Optical shop subscription</p>
                        </div>
                        <span id="dPlanStatus"
                              class="bg-indigo-600 text-white text-[10px] px-3 py-1 rounded-full font-medium">—</span>
                    </div>
                </div>

                {{-- Timestamps tab --}}
                <div id="panel-dates" class="hidden">
                    <p class="text-[10px] font-semibold tracking-widest text-slate-400 uppercase mb-2">Record info</p>
                    <div class="space-y-2">
                        <div class="bg-slate-50 rounded-lg p-3">
                            <p class="text-[10px] text-slate-400 font-medium">Created at</p>
                            <p id="dCreated" class="text-xs font-mono text-slate-600 mt-0.5">—</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div id="modalFooter" class="hidden px-5 py-3 border-t border-slate-100 flex justify-end gap-2"
                 style="background:#fafbff;">
                <button onclick="closeShopModal()"
                        class="text-slate-500 text-xs font-medium px-4 py-2 rounded-lg border border-slate-200 hover:bg-slate-50">
                    Close
                </button>
                
            </div>
        </div>
    </div>
</div>

    <style>
        .modal-tab {
    padding: 10px 14px; font-size: 12px; font-weight: 500;
    color: #94a3b8; border-bottom: 2px solid transparent;
    margin-bottom: -1px; background: none; border-top: none;
    border-left: none; border-right: none; cursor: pointer;
}
.active-tab { color: #3b5fe2 !important; border-bottom-color: #3b5fe2 !important; }

        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>

    <script>
    // ─────────────────────────────────────────────────────
    // CONFIG — all API endpoints in one place
    // ─────────────────────────────────────────────────────
    const API = {
        lenses:    '/api/lenses',           // GET  — public, no auth needed
        adminLens: '/api/admin/lenses',     // POST — requires token
        dashboard: '/api/admin/dashboard',  // GET  — requires token
    };

    let allLenses = [];

    // ─────────────────────────────────────────────────────
    // BOOT
    // ─────────────────────────────────────────────────────
    document.addEventListener('DOMContentLoaded', function () {
        const token    = localStorage.getItem('auth_token');
        const role     = localStorage.getItem('user_role');
        const userInfo = JSON.parse(localStorage.getItem('user_info') || '{}');

        if (!token || role !== 'admin') {
            alert('Please login as an admin to access this page');
            window.location.href = '/signup';
            return;
        }

        if (userInfo.email) {
            const e = userInfo.email;
            document.getElementById('admin-email').textContent         = e;
            document.getElementById('sidebar-email').textContent       = e;
            document.getElementById('sidebar-email-first').textContent = e.charAt(0).toUpperCase();
        }

        loadDashboardData(token);
        setupImagePreview();
        setupFormSubmission();
        setupShopSearch();
    });

    // ─────────────────────────────────────────────────────
    // DASHBOARD DATA
    // ─────────────────────────────────────────────────────
    async function loadDashboardData(token) {
        try {
            const response = await fetch(API.dashboard, {
                headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
            });
            const result = await response.json();

            if (response.ok && result.success) {
                document.getElementById('loading-spinner').classList.add('hidden');
                document.getElementById('dashboard-content').classList.remove('hidden');
                updateStats(result.data.stats);
                updateShopsList(result.data.recent_shops);
            } else {
                showError('Failed to load dashboard: ' + (result.message || 'Unknown error'));
            }
        } catch (err) {
            showError('Could not connect to server.');
            console.error(err);
        }

        // Always load lenses separately (public endpoint, always works)
        loadLenses();
    }

    function updateStats(stats) {
        document.getElementById('totalShops').textContent  = stats.total_shops  ?? 0;
        document.getElementById('activeUsers').textContent = stats.active_users ?? 0;
        document.getElementById('totalLenses').textContent = stats.lens_catalog ?? 0;
    }

    // ─────────────────────────────────────────────────────
    // LENSES  — uses PUBLIC /api/lenses (apiIndex returns JSON)
    // ─────────────────────────────────────────────────────
    async function loadLenses() {
        try {
            const token    = localStorage.getItem('auth_token');
            const response = await fetch(API.lenses, {
                headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
            });
            const data = await response.json();

            // apiIndex() returns { success: true, data: [...] }
            if (data.success) {
                allLenses = data.data;
                displayLenses(allLenses);
                document.getElementById('totalLenses').textContent = allLenses.length;
            } else {
                document.getElementById('lensesList').innerHTML =
                    '<p class="text-center text-red-400 py-8 text-sm">Failed to load lenses.</p>';
            }
        } catch (err) {
            console.error('Lens load error:', err);
            document.getElementById('lensesList').innerHTML =
                '<p class="text-center text-red-400 py-8 text-sm">Error loading lenses.</p>';
        }
    }

    function displayLenses(lenses) {
        const list = document.getElementById('lensesList');
        if (!lenses || lenses.length === 0) {
            list.innerHTML = '<p class="text-center text-gray-400 py-12 text-sm">No lenses in catalog yet.</p>';
            return;
        }
        list.innerHTML = lenses.map(lens => {
            const id  = lens.id;
            const img = lens.image
                ? (lens.image.startsWith('http') ? lens.image : '/storage/' + lens.image)
                : null;
            const imgHtml = img
                ? `<img src="${img}" alt="${lens.name}" class="w-14 h-14 rounded-xl object-cover border-2 border-gray-200 shadow-sm">`
                : `<div class="w-14 h-14 rounded-xl bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center text-white font-bold text-lg shadow-md">${lens.name.charAt(0).toUpperCase()}</div>`;

            return `
            <div class="group flex items-center justify-between p-4 border-2 border-gray-100 rounded-xl hover:border-purple-200 hover:bg-purple-50/50 transition-all duration-300 hover:shadow-md">
                <div class="flex items-center gap-4">
                    ${imgHtml}
                    <div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-purple-700 transition-colors">${lens.name}</h3>
                        <p class="text-sm text-gray-500 mt-0.5">${lens.brand || 'Generic'} · ${lens.type || '—'}</p>
                        <span class="inline-block mt-1.5 px-2.5 py-0.5 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">${lens.color || 'No color'}</span>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button onclick="editLens(${id})" title="Edit"
                        class="p-2 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-lg transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                    <button onclick="deleteLens(${id})" title="Delete"
                        class="p-2 bg-red-50 text-red-700 hover:bg-red-100 rounded-lg transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
            </div>`;
        }).join('');
    }

    // ─────────────────────────────────────────────────────
    // MODAL
    // ─────────────────────────────────────────────────────
    function openAddLensModal() {
        document.getElementById('modalTitle').textContent = 'Add New Lens';
        document.getElementById('lensForm').reset();
        document.getElementById('lensId').value = '';
        document.getElementById('imagePreview').classList.add('hidden');
        document.getElementById('lens-form-msg').classList.add('hidden');
        document.getElementById('lensModal').classList.remove('hidden');
    }

    function closeLensModal() {
        document.getElementById('lensModal').classList.add('hidden');
    }

    function editLens(id) {
        const lens = allLenses.find(l => l.id === id);
        if (!lens) return;

        document.getElementById('modalTitle').textContent  = 'Edit Lens';
        document.getElementById('lensId').value            = lens.id;
        document.getElementById('lensName').value          = lens.name        || '';
        document.getElementById('lensBrand').value         = lens.brand       || '';
        document.getElementById('lensColor').value         = lens.color       || '';
        document.getElementById('lensType').value          = lens.type        || '';
        document.getElementById('lensDescription').value   = lens.description || '';
        document.getElementById('lens-form-msg').classList.add('hidden');

        if (lens.image) {
            const url = lens.image.startsWith('http') ? lens.image : '/storage/' + lens.image;
            document.getElementById('previewImg').src = url;
            document.getElementById('imagePreview').classList.remove('hidden');
        } else {
            document.getElementById('imagePreview').classList.add('hidden');
        }

        document.getElementById('lensModal').classList.remove('hidden');
    }

    // ─────────────────────────────────────────────────────
    // FORM SUBMISSION  — POST to /api/admin/lenses
    // ─────────────────────────────────────────────────────
    function setupFormSubmission() {
        document.getElementById('lensForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const token     = localStorage.getItem('auth_token');
            const submitBtn = document.getElementById('submitBtn');
            const lensId    = document.getElementById('lensId').value;
            const formData  = new FormData(e.target);

            submitBtn.disabled    = true;
            submitBtn.textContent = 'Saving...';

            // For updates, append _method=PUT for Laravel method spoofing
            const endpoint = lensId
                ? `${API.adminLens}/${lensId}`
                : API.adminLens;

            if (lensId) formData.append('_method', 'PUT');

            try {
                const response = await fetch(endpoint, {
                    method:  'POST',   // Always POST with FormData (file uploads)
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept':        'application/json'
                        // NOTE: Do NOT set Content-Type — browser sets it with boundary for FormData
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    showFormMsg('✓ Lens ' + (lensId ? 'updated' : 'added') + ' successfully!', 'success');
                    setTimeout(() => {
                        closeLensModal();
                        loadLenses();   // Refresh list
                    }, 800);
                } else {
                    const errMsg = result.errors
                        ? Object.values(result.errors).flat().join(' | ')
                        : (result.message || 'Unknown error');
                    showFormMsg('Error: ' + errMsg, 'error');
                }
            } catch (err) {
                showFormMsg('Connection error. Please try again.', 'error');
                console.error(err);
            } finally {
                submitBtn.disabled    = false;
                submitBtn.textContent = 'Save Lens';
            }
        });
    }

    function showFormMsg(msg, type) {
        const el      = document.getElementById('lens-form-msg');
        el.textContent = msg;
        el.className   = type === 'success'
            ? 'mb-4 p-3 rounded-lg text-sm font-medium bg-green-50 text-green-700 border border-green-200'
            : 'mb-4 p-3 rounded-lg text-sm font-medium bg-red-50 text-red-700 border border-red-200';
        el.classList.remove('hidden');
    }

    // ─────────────────────────────────────────────────────
    // DELETE
    // ─────────────────────────────────────────────────────
    async function deleteLens(id) {
        if (!confirm('Delete this lens? This cannot be undone.')) return;

        const token = localStorage.getItem('auth_token');
        try {
            const response = await fetch(`${API.adminLens}/${id}`, {
                method:  'DELETE',
                headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
            });
            const result = await response.json();

            if (response.ok && result.success) {
                showToast('Lens deleted successfully');
                loadLenses();
            } else {
                showToast('Failed to delete: ' + (result.message || 'Unknown error'), 'error');
            }
        } catch (err) {
            showToast('Connection error.', 'error');
        }
    }

    // ─────────────────────────────────────────────────────
    // SHOPS LIST
    // ─────────────────────────────────────────────────────
    function updateShopsList(shops) {
        const list = document.getElementById('shopsList');
        if (!shops || shops.length === 0) {
            list.innerHTML = '<p class="text-center text-gray-400 py-12 text-sm">No shops registered yet.</p>';
            return;
        }
        list.innerHTML = shops.map(shop => `
            <div class="group flex justify-between items-center p-5 bg-gradient-to-r from-gray-50 to-blue-50 border-2 border-gray-100 rounded-xl transition-all duration-300 hover:border-blue-300 hover:shadow-lg hover:-translate-y-0.5">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-md">
                        ${shop.name.charAt(0).toUpperCase()}
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-blue-700 transition-colors">${shop.name}</h3>
                        <p class="text-sm text-gray-600 mt-0.5">${shop.email}</p>
                        <span class="inline-block mt-1.5 px-2.5 py-0.5 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-full">${shop.status || 'Active'}</span>
                    </div>
                </div>
                <button onclick="viewShop(${shop.id})"
                    class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 rounded-lg text-sm font-semibold text-white shadow-md transition-all hover:shadow-lg">
                    View Details
                </button>
            </div>`
        ).join('');
    }

    function setupShopSearch() {
        document.getElementById('shop-search').addEventListener('input', function () {
            const term = this.value.toLowerCase();
            document.querySelectorAll('#shopsList > div').forEach(item => {
                const name = item.querySelector('h3')?.textContent.toLowerCase() || '';
                item.style.display = name.includes(term) ? 'flex' : 'none';
            });
        });
    }
///////////////////Shop  details displaying///////////////////////
    // ─── JS: place in your <script> or app.js ───────────────────────────

function viewShop(id) {
    // Show modal & spinner
    document.getElementById('shopModal').classList.remove('hidden');
    document.getElementById('modalSpinner').classList.remove('hidden');
    document.getElementById('modalContent').classList.add('hidden');
    document.getElementById('modalFooter').classList.add('hidden');
    switchTab('info'); // reset to first tab

    fetch('/shopkeeper-approvals/details/' + id)
        .then(r => r.json())
        .then(result => {
            if (!result.success) { alert(result.message); closeShopModal(); return; }

            const s = result.data;

            // Hero
            document.getElementById('modalAvatar').textContent    = s.name?.charAt(0).toUpperCase() || '?';
            document.getElementById('modalName').textContent       = s.name        || '—';
            document.getElementById('modalEmail').textContent      = s.email       || '—';
            document.getElementById('modalStatusBadge').textContent = s.plan_status || 'Unknown';

            // Info tab
            document.getElementById('dName').textContent      = s.name          || '—';
            document.getElementById('dRetailer').textContent  = s.retailer_name  || '—';
            document.getElementById('dEmail').textContent     = s.email          || '—';
            document.getElementById('dPhone').textContent     = s.phone_number   || '—';
            document.getElementById('dStatus').textContent    = s.plan_status    || '—';
            document.getElementById('dShop').textContent      = s.shop_name      || '—';
            document.getElementById('dAddress').textContent   = s.address        || '—';

            // Plan tab
            document.getElementById('dPlanName').textContent   = s.plan_name   || '—';
            document.getElementById('dPlanStatus').textContent = s.plan_status || '—';

            // Timestamps tab
            document.getElementById('dCreated').textContent = s.created_at || '—';

            // Show content
            document.getElementById('modalSpinner').classList.add('hidden');
            document.getElementById('modalContent').classList.remove('hidden');
            document.getElementById('modalFooter').classList.remove('hidden');
        })
        .catch(err => {
            console.error(err);
            alert('Error fetching shop details');
            closeShopModal();
        });
}

function closeShopModal() {
    document.getElementById('shopModal').classList.add('hidden');
}

function handleModalBackdrop(e) {
    if (e.target === document.getElementById('shopModal')) closeShopModal();
}

function switchTab(name) {
    ['info', 'plan', 'dates'].forEach(t => {
        document.getElementById('panel-' + t)?.classList.add('hidden');
        document.getElementById('tab-' + t)?.classList.remove('active-tab');
    });
    document.getElementById('panel-' + name)?.classList.remove('hidden');
    document.getElementById('tab-' + name)?.classList.add('active-tab');
}   
// ─────────────────────────────────────────────────────
    // IMAGE PREVIEW
    // ─────────────────────────────────────────────────────
    function setupImagePreview() {
        document.getElementById('lensImage').addEventListener('change', function () {
            const file = this.files[0];
            if (!file) { document.getElementById('imagePreview').classList.add('hidden'); return; }
            if (!file.type.startsWith('image/')) { alert('Please select a valid image file'); this.value = ''; return; }
            if (file.size > 2 * 1024 * 1024) { alert('Image must be less than 2MB'); this.value = ''; return; }
            const reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        });
    }

    // ─────────────────────────────────────────────────────
    // TOAST + ERROR HELPERS
    // ─────────────────────────────────────────────────────
    function showToast(msg, type = 'success') {
        const t = document.createElement('div');
        t.className = `fixed bottom-6 right-6 z-[9999] px-5 py-3 rounded-xl shadow-xl text-sm font-semibold ${
            type === 'error' ? 'bg-red-600 text-white' : 'bg-gray-900 text-white'}`;
        t.textContent = msg;
        document.body.appendChild(t);
        setTimeout(() => t.remove(), 3500);
    }

    function showError(msg) {
        document.getElementById('loading-spinner').classList.add('hidden');
        document.getElementById('dashboard-content').classList.remove('hidden');
        showToast(msg, 'error');
    }

    // ─────────────────────────────────────────────────────
    // LOGOUT
    // ─────────────────────────────────────────────────────
    async function logout() {
        const token = localStorage.getItem('auth_token');
        try {
            await fetch('/api/logout', {
                method: 'POST',
                headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
            });
        } catch (e) {}
        localStorage.clear();
        window.location.href = '/signup';
    }
    </script>

    <div class="pl-[5%]">
        @include('web.layouts.footer')
    </div>
</body>
</html>