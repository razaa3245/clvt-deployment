<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>LensPilot - Lens Catalog</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#F0F4FD]" style="font-family:'Plus Jakarta Sans',sans-serif;">
  
  <!-- SIDEBAR -->
  <aside x-data="{ open: false }" 
         :class="open ? 'w-64' : 'w-20'" 
         class="h-screen shadow-xl transition-all duration-300 flex flex-col justify-between fixed top-0 left-0 z-50" style="background:#0B1437;border-right:1px solid rgba(255,255,255,0.08);">

    <!-- Top Section -->
    <div>
      <!-- Logo -->
      <div class="flex items-center justify-between p-4 border-b" style="border-color:rgba(255,255,255,0.08);">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" style="background:linear-gradient(135deg,#3B82F6,#06B6D4);">
                        <span id="sidebar-email-first" class="text-white font-bold text-base"></span>
                    </div>
          <div x-show="open" class="overflow-hidden">
            <span id="sidebar-email" class="text-white text-xs font-semibold block truncate max-w-[140px]"></span>
            <p class="text-xs mt-0.5" style="color:rgba(255,255,255,.4);">Admin</p>
          </div>
        </div>
        <button @click="open = !open" class="p-1.5 rounded-lg flex-shrink-0 transition-colors" style="color:rgba(255,255,255,.5);" onmouseover="this.style.background='rgba(255,255,255,.1)'" onmouseout="this.style.background='transparent'">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
          </svg>
        </button>
      </div>

      <!-- Navigation -->
      <nav class="mt-6">
        <p x-show="open" class="text-xs font-semibold tracking-widest uppercase px-3 mb-2" style="color:rgba(255,255,255,.3);">Overview</p>
        <ul>
          <li>
            <a href="/admin/dashboard" class="flex items-center px-4 py-2.5 rounded-xl mx-1 text-sm border-r-4 transition-all" style="color:rgba(255,255,255,.55);border-right-color:transparent;" onmouseover="this.style.background='rgba(255,255,255,.07)';this.style.color='rgba(255,255,255,.9)'" onmouseout="this.style.background='transparent';this.style.color='rgba(255,255,255,.55)'">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
              <span x-show="open" x-transition class="ml-3 text-sm">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="/catalog" class="flex items-center px-4 py-2.5 rounded-xl mx-1 text-sm font-semibold border-r-4 transition-all" style="background:rgba(59,130,246,.15);color:#fff;border-right-color:#3B82F6;">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              <span x-show="open" x-transition class="ml-3 text-sm font-semibold">Lens Catalog</span>
            </a>
          </li>
          <li>
            <a href="/shopkeeper/catalog2" class="flex items-center px-4 py-2.5 rounded-xl mx-1 text-sm border-r-4 transition-all" style="color:rgba(255,255,255,.55);border-right-color:transparent;" onmouseover="this.style.background='rgba(255,255,255,.07)';this.style.color='rgba(255,255,255,.9)'" onmouseout="this.style.background='transparent';this.style.color='rgba(255,255,255,.55)'">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
     stroke="currentColor" width="24" height="24">

  <rect x="3" y="7" width="18" height="13" rx="2" stroke-width="2"/>
  <circle cx="12" cy="13" r="3" stroke-width="2"/>

  <!-- Top camera bump -->
  <path stroke-width="2" d="M8 7l2-2h4l2 2"/>
</svg>
              <span x-show="open" class="ml-3 text-sm">Lens TryOn</span>
            </a>
          </li>
          <li>
            <a href="/admin/messages" class="flex items-center px-4 py-2.5 rounded-xl mx-1 text-sm border-r-4 transition-all" style="color:rgba(255,255,255,.55);border-right-color:transparent;" onmouseover="this.style.background='rgba(255,255,255,.07)';this.style.color='rgba(255,255,255,.9)'" onmouseout="this.style.background='transparent';this.style.color='rgba(255,255,255,.55)'">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
              <span x-show="open" class="ml-3 text-sm">Approvals</span>
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
            <span x-show="open" class="ml-3 whitespace-nowrap">Logout</span>
          </button>
        </li>
      </ul>
    </div>
  </aside>

  <!-- MAIN CONTENT -->
  <div class="ml-20 transition-all duration-300" style="font-family:'Plus Jakarta Sans',sans-serif;">
    
    <!-- HEADER -->
    <header class="bg-white border-b sticky top-0 z-40" style="border-color:#E8EDF6;padding:14px 32px;">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
          <h1 class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">LensPilot</h1>
          <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full" style="background:#EFF6FF;color:#3B82F6;">Admin Console</span>
        </div>
        
        <div class="flex items-center gap-4">
          <span id="admin-email" class="text-sm text-gray-600"></span>
        </div>
      </div>
    </header>

    <!-- Page Header with Gradient -->
    <div class="px-8 py-8 border-b" style="background:linear-gradient(135deg,#0B1437 0%,#192566 100%);border-color:rgba(255,255,255,.1);">
      <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-4 mb-4">
          <div class="w-12 h-12 rounded-2xl flex items-center justify-center" style="background:rgba(139,92,246,.25);border:1px solid rgba(139,92,246,.3);">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </div>
          <div>
            <h1 class="text-2xl font-bold text-white">Lens Catalogue</h1>
            <p class="text-sm mt-0.5" style="color:rgba(255,255,255,.5);">Browse and manage your premium colored contact lenses</p>
          </div>
        </div>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap gap-3 mt-6">
          <button onclick="filterLenses('all')" id="filter-all" class="px-5 py-2.5 text-white rounded-xl font-semibold text-sm transition-all" style="background:#3B82F6;border:1.5px solid #3B82F6;box-shadow:0 4px 14px rgba(59,130,246,.3);">
            All Lenses
          </button>
          <button onclick="filterLenses('daily')" id="filter-daily" class="px-5 py-2.5 text-sm font-semibold rounded-xl transition-all" style="background:#fff;color:#64748B;border:1.5px solid #E8EDF6;" onmouseover="this.style.borderColor='#3B82F6';this.style.color='#3B82F6'" onmouseout="this.style.borderColor='#E8EDF6';this.style.color='#64748B'">
            Daily Wear
          </button>
          <button onclick="filterLenses('monthly')" id="filter-monthly" class="px-5 py-2.5 text-sm font-semibold rounded-xl transition-all" style="background:#fff;color:#64748B;border:1.5px solid #E8EDF6;" onmouseover="this.style.borderColor='#3B82F6';this.style.color='#3B82F6'" onmouseout="this.style.borderColor='#E8EDF6';this.style.color='#64748B'">
            Monthly
          </button>
          <button onclick="filterLenses('yearly')" id="filter-yearly" class="px-5 py-2.5 text-sm font-semibold rounded-xl transition-all" style="background:#fff;color:#64748B;border:1.5px solid #E8EDF6;" onmouseover="this.style.borderColor='#3B82F6';this.style.color='#3B82F6'" onmouseout="this.style.borderColor='#E8EDF6';this.style.color='#64748B'">
            Yearly
          </button>
        </div>
      </div>
    </div>

    <!-- Loading Spinner -->
    <div id="loading-spinner" class="flex justify-center items-center py-20">
      <div style="width:36px;height:36px;border:3px solid #E2E8F0;border-top-color:#8B5CF6;border-radius:50%;animation:spin .75s linear infinite;"></div>
      <p class="ml-3 text-sm font-medium" style="color:#94A3B8;">Loading lenses...</p>
    </div>

    <!-- Main Content Container -->
    <div class="container mx-auto px-10 py-8">
      
      <!-- Statistics Bar -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8" id="stats-section">
        <div class="p-6 transition-all hover:shadow-xl hover:-translate-y-1" style="background:#fff;border:1px solid #E8EDF6;border-radius:16px;">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
              </svg>
            </div>
            <div>
              <p class="text-sm text-gray-500 font-medium">Total Lenses</p>
              <p class="text-3xl font-bold text-gray-900" id="total-lenses-count">0</p>
            </div>
          </div>
        </div>

        <div class="p-6 transition-all hover:shadow-xl hover:-translate-y-1" style="background:#fff;border:1px solid #E8EDF6;border-radius:16px;">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
              </svg>
            </div>
            <div>
              <p class="text-sm text-gray-500 font-medium">Categories</p>
              <p class="text-3xl font-bold text-gray-900">3</p>
            </div>
          </div>
        </div>

        <div class="p-6 transition-all hover:shadow-xl hover:-translate-y-1" style="background:#fff;border:1px solid #E8EDF6;border-radius:16px;">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
              </svg>
            </div>
            <div>
              <p class="text-sm text-gray-500 font-medium">Premium Quality</p>
              <p class="text-3xl font-bold text-gray-900">100%</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Lens Cards Container -->
      <div id="lenses-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 hidden">
        <!-- Lenses will be dynamically loaded here -->
      </div>

      <!-- No Lenses Message -->
      <div id="no-lenses" class="hidden text-center py-20">
        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
          </svg>
        </div>
        <p class="text-gray-500 text-lg font-medium">No lenses found</p>
        <p class="text-gray-400 text-sm mt-2">Try adjusting your filters or add new lenses</p>
      </div>
    </div>

   
   

    <!-- Footer CTA -->
    <div class="container mx-auto px-10 pb-12">
      <div class="rounded-2xl p-10 text-center text-white flex flex-col md:flex-row items-center justify-between gap-6" style="background:linear-gradient(135deg,#0B1437 0%,#192566 100%);">
        <h2 class="text-3xl font-bold mb-3">Ready to Manage Your Lenses?</h2>
        <p class="text-purple-100 mb-6 text-lg">Update or delete lens details easily using the management options</p>
        <button onclick="window.location.href='/admin/dashboard'" class="text-sm font-semibold px-6 py-3 rounded-xl transition-all" style="background:#3B82F6;color:#fff;border:none;cursor:pointer;box-shadow:0 4px 14px rgba(59,130,246,.3);" onmouseover="this.style.boxShadow='0 6px 20px rgba(59,130,246,.45)'" onmouseout="this.style.boxShadow='0 4px 14px rgba(59,130,246,.3)'">
          Go to Dashboard
        </button>
      </div>
    </div>
  </div>

  <!-- Edit Lens Modal -->
  <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-3xl w-full mx-4 max-h-[90vh] overflow-y-auto">
      <!-- Modal Header -->
      <div class="px-8 py-5 border-b sticky top-0 z-10" style="background:linear-gradient(135deg,#0B1437,#192566);border-color:rgba(255,255,255,.1);">
        <div class="flex items-center justify-between">
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background:rgba(139,92,246,.3);border:1px solid rgba(139,92,246,.4);">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
            </div>
            <h3 class="text-lg font-bold text-white">Edit Lens Details</h3>
          </div>
          <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Modal Body -->
      <form id="editForm" class="p-8">
        <input type="hidden" id="edit-lens-id">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Lens Name -->
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
              Lens Name <span class="text-red-500">*</span>
            </label>
            <input type="text" id="edit-name" required 
                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all"
                   placeholder="Enter lens name">
          </div>
          
          <!-- Brand -->
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Brand</label>
            <input type="text" id="edit-brand" 
                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all"
                   placeholder="Enter brand name">
          </div>
          
          <!-- Color -->
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Color</label>
            <input type="text" id="edit-color" 
                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all"
                   placeholder="e.g., Blue, Brown, Gray">
          </div>
          
          <!-- Type -->
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
              Type <span class="text-red-500">*</span>
            </label>
            <input type="text" id="edit-type" required 
                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all"
                   placeholder="e.g., Daily, Monthly">
          </div>
          
          <!-- Image Upload -->
          <div class="col-span-2">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Lens Image</label>
            <div class="relative">
              <input type="file" id="edit-image" accept="image/*" 
                     class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 cursor-pointer">
            </div>
            <p class="text-xs text-gray-500 mt-2 flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              Upload a new image or keep existing one (Max 2MB, JPG/PNG)
            </p>
            
            <!-- Image Preview -->
            <div id="edit-image-preview" class="mt-4 hidden">
              <p class="text-sm font-medium text-gray-700 mb-2">Preview:</p>
              <div class="inline-block p-2 border-2 border-gray-200 rounded-xl bg-gray-50">
                <img id="edit-preview-img" src="" alt="Preview" class="w-24 h-24 rounded-lg object-cover">
              </div>
            </div>
          </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex gap-4 mt-8 pt-6 border-t border-gray-200">
          <button type="submit" 
                  class="flex-1 text-white py-3 rounded-xl font-semibold text-sm flex items-center justify-center gap-2 transition-all" style="background:linear-gradient(135deg,#3B82F6,#2563EB);box-shadow:0 4px 14px rgba(59,130,246,.3);">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Update Lens
          </button>
          <button type="button" onclick="closeEditModal()" 
                  class="flex-1 py-3 rounded-xl font-semibold text-sm transition-all" style="background:#F1F5F9;color:#475569;border:none;cursor:pointer;" onmouseover="this.style.background='#E2E8F0'" onmouseout="this.style.background='#F1F5F9'">
            Cancel
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Custom Styles -->
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

    /* Smooth transitions for all interactive elements */
    button, a, input, select {
      transition: all 0.3s ease;
    }

    /* Card hover effect enhancement */
    .lens-card {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .lens-card:hover {
      transform: translateY(-4px);
    }

    /* Loading animation */
    @keyframes pulse {
      0%, 100% {
        opacity: 1;
      }
      50% {
        opacity: 0.5;
      }
    }

    .animate-pulse {
      animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }
  </style>

 
  <script>
    let allLenses = [];
    let currentFilter = 'all';

    // ========================================
    // INITIALIZATION
    // ========================================
    document.addEventListener('DOMContentLoaded', function() {
      const token = localStorage.getItem('auth_token');
      const userInfo = JSON.parse(localStorage.getItem('user_info') || '{}');
      const email = userInfo.email;
      const firstLetter = email.charAt(0).toUpperCase();   
      
      if (userInfo.email) {
        document.getElementById('admin-email').textContent = userInfo.email;
        document.getElementById('sidebar-email').textContent = userInfo.email;
        // NEW separate line showing only first letter
        document.getElementById('sidebar-email-first').textContent = firstLetter;
      }
      
      loadLenses();
      setupImagePreview();
      setupEditForm();
    });

    // ========================================
    // LOAD LENSES FROM API
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
          document.getElementById('loading-spinner').classList.add('hidden');
          document.getElementById('lenses-container').classList.remove('hidden');
          document.getElementById('total-lenses-count').textContent = allLenses.length;
          displayLenses(allLenses);
        } else {
          showNoLenses();
        }
      } catch (error) {
        console.error('Error loading lenses:', error);
        showNoLenses();
      }
    }

    // ========================================
    // DISPLAY LENSES
    // ========================================
    function displayLenses(lenses) {
      const container = document.getElementById('lenses-container');
      const noLensesDiv = document.getElementById('no-lenses');
      
      if (!lenses || lenses.length === 0) {
        container.classList.add('hidden');
        noLensesDiv.classList.remove('hidden');
        return;
      }
      
      container.classList.remove('hidden');
      noLensesDiv.classList.add('hidden');
      container.innerHTML = '';
      
      lenses.forEach(lens => {
        const lensId = lens.lens_id || lens.id;
        
        // Determine image source; if stored path is not a full URL, prefix with /storage/
        let imageHtml;
        if (lens.image) {
          const imageUrl = lens.image.startsWith('http') || lens.image.startsWith('/')
            ? lens.image
            : '/storage/' + lens.image;

          imageHtml = `<div class="w-28 h-28 mx-auto rounded-full border-4 border-purple-100 overflow-hidden shadow-lg mb-4">
            <img src="${imageUrl}" alt="${lens.name}" class="w-full h-full object-cover">
          </div>`;
        } else {
          // Create colored circle based on lens color
          const colorMap = {
            'brown': '#8B4513',
            'blue': '#4169E1',
            'green': '#228B22',
            'gray': '#808080',
            'grey': '#808080',
            'hazel': '#8E7618',
            'violet': '#8B00FF',
            'black': '#000000'
          };
          
          const lensColor = lens.color ? lens.color.toLowerCase() : 'gray';
          const bgColor = colorMap[lensColor] || '#808080';
          
          imageHtml = `<div class="w-28 h-28 mx-auto rounded-full border-4 border-purple-100 shadow-lg mb-4" style="background: linear-gradient(135deg, ${bgColor} 0%, ${bgColor}dd 100%);"></div>`;
        }
        
        // Generate random rating and price
        const rating = (4.0 + Math.random() * 1).toFixed(1);
        const reviews = Math.floor(80 + Math.random() * 150);
        const price = Math.floor(35 + Math.random() * 30);
        
        const lensCard = `
          <div class="lens-card relative overflow-hidden bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-6 text-center hover:border-purple-300 hover:shadow-2xl" data-type="${(lens.type || '').toLowerCase()}">
            <!-- Top Badge -->
            <div class="absolute top-4 right-4">
              <span class="bg-gradient-to-r from-purple-600 to-purple-700 text-white text-xs px-3 py-1.5 rounded-full font-bold shadow-md">New</span>
            </div>

            <!-- Lens Image -->
            ${imageHtml}
            
            <!-- Lens Info -->
            <h3 class="text-lg font-bold text-gray-900 mb-2 min-h-[56px] flex items-center justify-center">${lens.name}</h3>
            <p class="text-sm text-gray-600 mb-3">
              <span class="font-semibold">${lens.brand || 'Premium'}</span> • ${lens.type || 'Colored'}
            </p>

            <!-- Color Badge -->
            <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-gray-100 rounded-full mb-4">
              <div class="w-3 h-3 rounded-full" style="background-color: ${getColorHex(lens.color || 'Gray')}"></div>
              <span class="text-xs font-semibold text-gray-700">${lens.color || 'Gray'}</span>
            </div>
            
            
            
           

            <!-- Action Buttons -->
            <div class="flex gap-2">
              <button onclick="openEditModal(${lensId})" 
                      class="flex-1 bg-blue-500 hover:bg-blue-600 text-white px-4 py-3 rounded-xl font-semibold transition-all hover:shadow-lg flex items-center justify-center gap-2 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
              </button>
              <button onclick="deleteLens(${lensId})" 
                      class="flex-1 bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-xl font-semibold transition-all hover:shadow-lg flex items-center justify-center gap-2 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Delete
              </button>
            </div>
          </div>
        `;
        
        container.innerHTML += lensCard;
      });
    }

    // Helper function to get color hex
    function getColorHex(colorName) {
      const colorMap = {
        'brown': '#8B4513',
        'blue': '#4169E1',
        'green': '#228B22',
        'gray': '#808080',
        'grey': '#808080',
        'hazel': '#8E7618',
        'violet': '#8B00FF',
        'black': '#000000',
        'amber': '#FFBF00'
      };
      return colorMap[colorName.toLowerCase()] || '#808080';
    }

    // ========================================
    // FILTER LENSES
    // ========================================
    function filterLenses(filter) {
      currentFilter = filter;
      
      // Update button styles
      document.querySelectorAll('[id^="filter-"]').forEach(btn => {
        btn.classList.remove('bg-purple-600', 'text-white', 'shadow-md');
        btn.classList.add('bg-white', 'text-gray-700', 'border-2', 'border-gray-200');
      });
      
      const activeBtn = document.getElementById('filter-' + filter);
      activeBtn.classList.remove('bg-white', 'text-gray-700', 'border-2', 'border-gray-200');
      activeBtn.classList.add('bg-purple-600', 'text-white', 'shadow-md');
      
      // Filter lenses
      if (filter === 'all') {
        displayLenses(allLenses);
      } else {
        const filtered = allLenses.filter(lens => {
          const type = (lens.type || '').toLowerCase();
          return type.includes(filter);
        });
        displayLenses(filtered);
      }
    }

    // Continue with remaining functions (openEditModal, deleteLens, etc.)...
    
    // ========================================
    // EDIT LENS MODAL
    // ========================================
    function openEditModal(id) {
      const lens = allLenses.find(l => l.id === id || l.lens_id === id);
      if (!lens) {
        console.error('Lens not found with id:', id);
        return;
      }
      
      document.getElementById('edit-lens-id').value = lens.id || lens.lens_id;
      document.getElementById('edit-name').value = lens.name || '';
      document.getElementById('edit-brand').value = lens.brand || '';
      document.getElementById('edit-color').value = lens.color || '';
      document.getElementById('edit-type').value = lens.type || '';
      
      const imagePreview = document.getElementById('edit-image-preview');
      const previewImg = document.getElementById('edit-preview-img');
      
      if (lens.image && previewImg && imagePreview) {
        const imageUrl = lens.image.startsWith('http') ? lens.image : '/storage/' + lens.image;
        previewImg.src = imageUrl;
        imagePreview.classList.remove('hidden');
      } else if (imagePreview) {
        imagePreview.classList.add('hidden');
      }
      
      document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
      document.getElementById('editModal').classList.add('hidden');
      document.getElementById('edit-image-preview').classList.add('hidden');
    }

    // ========================================
    // DELETE LENS (keeping your existing code)
    // ========================================
    async function deleteLens(id) {
      if (!confirm('Are you sure you want to delete this lens? This action cannot be undone.')) return;

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
      
      const endpoints = [
        `/admin/lenses/${id}`,
        `/api/admin/lenses/${id}`,
        `/lenses/${id}`,
      ];
      
      try {
        let lastError = null;
        
        for (const endpoint of endpoints) {
          try {
            const headers = {
              'Accept': 'application/json',
              'X-Requested-With': 'XMLHttpRequest'
            };
            
            if (csrfToken) headers['X-CSRF-TOKEN'] = csrfToken;
            if (token) headers['Authorization'] = 'Bearer ' + token;
            
            let response = await fetch(endpoint, {
              method: 'DELETE',
              headers: headers
            });
            
            if (response.status === 404 || response.status === 405) {
              const formData = new FormData();
              formData.append('_method', 'DELETE');
              
              const postHeaders = { ...headers };
              delete postHeaders['Content-Type'];
              
              response = await fetch(endpoint, {
                method: 'POST',
                headers: postHeaders,
                body: formData
              });
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
                alert('Lens deleted successfully');
                await loadLenses();
                return;
              }
            }
            
            const errorText = await response.text();
            lastError = { endpoint, status: response.status, body: errorText };
            
          } catch (fetchError) {
            lastError = { endpoint, error: fetchError.message };
          }
        }
        
        alert('Failed to delete lens. Error: ' + (lastError.body || lastError.error || 'Unknown error'));
        
      } catch (error) {
        alert('Error deleting lens: ' + error.message);
      }
    }

    // ========================================
    // IMAGE PREVIEW & FORM SETUP
    // ========================================
    function setupImagePreview() {
      const imageInput = document.getElementById('edit-image');
      const imagePreview = document.getElementById('edit-image-preview');
      const previewImg = document.getElementById('edit-preview-img');
      
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
          }
        });
      }
    }

    function setupEditForm() {
      const editForm = document.getElementById('editForm');
      
      if (editForm) {
        editForm.addEventListener('submit', async function(e) {
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
          
          const lensId = document.getElementById('edit-lens-id').value;
          
          const formData = new FormData();
          formData.append('_method', 'PUT');
          formData.append('name', document.getElementById('edit-name').value);
          formData.append('brand', document.getElementById('edit-brand').value);
          formData.append('color', document.getElementById('edit-color').value);
          formData.append('type', document.getElementById('edit-type').value);
          
          const imageFile = document.getElementById('edit-image').files[0];
          if (imageFile) {
            formData.append('image', imageFile);
          }
          
          const alternativeUrls = [
            `/admin/lenses/${lensId}`,
            `/api/admin/lenses/${lensId}`,
            `/lenses/${lensId}`,
          ];

          try {
            let lastError = null;
            
            for (const tryUrl of alternativeUrls) {
              const headers = {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
              };
              
              if (csrfToken) headers['X-CSRF-TOKEN'] = csrfToken;
              if (token) headers['Authorization'] = 'Bearer ' + token;
              
              try {
                const response = await fetch(tryUrl, {
                  method: 'POST',
                  headers: headers,
                  body: formData
                });
                
                if (response.ok) {
                  const contentType = response.headers.get('content-type');
                  const responseText = await response.text();
                  let data;
                  
                  try {
                    data = JSON.parse(responseText);
                  } catch (e) {
                    data = { success: true };
                  }
                  
                  if (data.success !== false) {
                    alert('Lens updated successfully');
                    closeEditModal();
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
                
              } catch (fetchError) {
                lastError = { url: tryUrl, error: fetchError.message };
              }
            }
            
            alert('Error updating lens: ' + (lastError.body || lastError.error || 'Unknown error'));
            
          } catch (error) {
            alert('Error updating lens: ' + error.message);
          }
        });
      }
    }

    function showNoLenses() {
      document.getElementById('loading-spinner').classList.add('hidden');
      document.getElementById('lenses-container').classList.add('hidden');
      document.getElementById('no-lenses').classList.remove('hidden');
    }

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
  <div class="pl-[5%]">
    @include('web.layouts.footer')
</div>
</body>
</html>