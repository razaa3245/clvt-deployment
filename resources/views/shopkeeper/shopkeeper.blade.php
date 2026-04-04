<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VisionTech – Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <!-- QR Code generator library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>

@include('layouts.auth')

<body class="bg-gradient-to-br from-slate-50 via-white to-slate-100 text-slate-800 font-sans min-h-screen flex">

<!-- ═══════════════════════════════════════════════════
     SIDEBAR
════════════════════════════════════════════════════ -->
<aside x-data="{ open: false }"
       :class="open ? 'w-64' : 'w-20'"
       class="h-screen bg-white shadow-md border-r border-gray-200 transition-all duration-300 flex flex-col justify-between sticky top-0 z-50">

  <div>
    <!-- Logo / User -->
    <div class="flex items-center justify-between p-4">
      <div class="flex items-center space-x-3">
        <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
          <span id="sidebar-email-first" class="text-cyan-600 font-bold text-lg"></span>
        </div>
        <div x-show="open" class="text-gray-700">
          <span id="sidebar-email" class="text-sm text-gray-600"></span>
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
          <a href="/shopkeeper/dashboard" class="flex items-center px-6 py-2 bg-cyan-50 text-cyan-700 border-r-4 border-cyan-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span x-show="open" x-transition class="ml-3 text-sm font-semibold">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="/shopkeeper/catalog1" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <span x-show="open" x-transition class="ml-3 text-sm">Lens Catalog</span>
          </a>
        </li>
      </ul>
    </nav>

    <!-- Subscription Plan (dynamic) -->
    <div x-show="open" class="mx-4 mt-6 bg-gradient-to-br from-cyan-50 to-blue-50 border-2 border-cyan-200 rounded-2xl p-4 shadow-sm">
      <div class="flex items-center gap-2 mb-2">
        <div class="w-8 h-8 bg-cyan-600 rounded-lg flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
          </svg>
        </div>
        <h3 class="text-sm font-semibold text-cyan-700">Current Plan</h3>
      </div>
      <p class="text-lg font-bold text-gray-900" id="sidebar-plan-name">—</p>
      <p class="text-xs text-gray-600 mt-1" id="sidebar-plan-price">Loading...</p>
      <p class="text-xs text-gray-500 mt-1" id="sidebar-plan-expiry">—</p>
      <a href="/price">
        <button class="mt-3 w-full bg-gradient-to-r from-cyan-600 to-cyan-700 hover:from-cyan-700 hover:to-cyan-800 text-white text-sm px-3 py-2 rounded-lg font-semibold transition-all hover:shadow-md">
          Update Plan
        </button>
      </a>
    </div>
  </div>

  <!-- Account Section -->
  <div class="border-t border-gray-100 py-4">
    <ul>
      
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


<!-- ═══════════════════════════════════════════════════
     MAIN CONTENT
════════════════════════════════════════════════════ -->
<div class="flex-1 flex flex-col">

  <!-- Header -->
  <header class="sticky top-0 z-50 bg-white/70 backdrop-blur-md border-b border-slate-200 shadow-sm flex justify-between items-center px-10 py-4">
    <div class="flex items-center gap-3">
      <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
      <h1 class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">
        VisionTech
      </h1>
    </div>
    <div class="flex items-center gap-4">
      <span id="admin-email" class="text-sm text-gray-600 font-medium"></span>
    </div>
  </header>

  <!-- MAIN -->
  <main class="max-w-7xl mx-auto px-8 py-14 w-full">

    <!-- STATS -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">

      <!-- Total Try-Ons -->
      <div class="relative overflow-hidden bg-white rounded-2xl shadow-lg border border-gray-100 p-6 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
        <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-50 rounded-full -mr-16 -mt-16 opacity-50"></div>
        <div class="relative">
          <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
              </svg>
            </div>
            <span class="px-3 py-1 bg-cyan-50 text-cyan-700 text-xs font-semibold rounded-full">Live</span>
          </div>
          <h3 class="text-sm font-medium text-gray-500 mb-1">Total Try-Ons</h3>
          <p class="text-4xl font-bold text-gray-900" id="total-tryons">—</p>
          <div class="mt-4 flex items-center text-xs text-green-600 font-semibold" id="tryon-change">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
            </svg>
            Loading...
          </div>
        </div>
      </div>

      <!-- Subscription -->
      <div class="relative overflow-hidden bg-white rounded-2xl shadow-lg border border-gray-100 p-6 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
        <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-50 rounded-full -mr-16 -mt-16 opacity-50"></div>
        <div class="relative">
          <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
              </svg>
            </div>
            <span id="subscription-badge" class="px-3 py-1 bg-indigo-50 text-indigo-700 text-xs font-semibold rounded-full">—</span>
          </div>
          <h3 class="text-sm font-medium text-gray-500 mb-1">Subscription</h3>
          <p class="text-4xl font-bold text-gray-900" id="subscription-plan">—</p>
          <div class="mt-4 flex items-center text-xs text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span id="days-remaining">Loading...</span>
          </div>
        </div>
      </div>
    </div>

    <!-- QR CODE + QUICK ACTIONS -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

      <!-- QR Code Card -->
      <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-cyan-50 to-cyan-100 px-8 py-6 border-b border-gray-200">
          <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 bg-cyan-600 rounded-lg flex items-center justify-center shadow-md">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
              </svg>
            </div>
            <div>
              <h2 class="text-2xl font-bold text-gray-900">Your Shop's QR Code</h2>
              <p class="text-sm text-gray-600 mt-0.5">Display this for customers to access your lens catalogue</p>
            </div>
          </div>
        </div>

        <div class="p-8">
          <div class="flex flex-col items-center my-6">
            <!-- QR rendered here by JS -->
            <div id="qr-wrapper" class="w-64 h-64 border-2 border-dashed border-cyan-300 flex items-center justify-center rounded-2xl bg-gradient-to-br from-cyan-50 to-blue-50 shadow-inner p-4">
              <div id="qr-code-div" class="flex items-center justify-center w-full h-full"></div>
            </div>
            <!-- Fallback: server-stored image (if exists) -->
            <img id="shop-qr-img" src="" class="hidden w-64 h-64 object-contain rounded-2xl" alt="Shop QR Code">
            <p class="text-gray-500 text-xs mt-4">Scan to view lens catalogue</p>
          </div>

          <div class="flex gap-4 mt-6">
            <button onclick="downloadQR()" class="flex-1 bg-gradient-to-r from-cyan-600 to-cyan-700 hover:from-cyan-700 hover:to-cyan-800 text-white py-3 rounded-xl font-semibold transition-all hover:shadow-xl hover:-translate-y-0.5 shadow-md flex items-center justify-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
              </svg>
              Download QR
            </button>
            <button onclick="copyShopLink()" id="copy-btn" class="flex-1 border-2 border-cyan-400 text-cyan-600 font-semibold py-3 rounded-xl hover:bg-cyan-50 transition-all hover:shadow-md flex items-center justify-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
              </svg>
              Copy Link
            </button>
          </div>

          <!-- Copied toast -->
          <div id="copy-toast" class="hidden mt-3 text-center text-sm text-green-600 font-semibold">
            ✓ Link copied to clipboard!
          </div>
        </div>
      </div>

      <!-- Quick Actions Panel -->
      <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-purple-50 to-purple-100 px-8 py-6 border-b border-gray-200">
          <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center shadow-md">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
            <div>
              <h2 class="text-2xl font-bold text-gray-900">Quick Actions</h2>
              <p class="text-sm text-gray-600 mt-0.5">Manage your shop, upgrade plans, or preview try-on</p>
            </div>
          </div>
        </div>

        <div class="p-8">
          <div class="space-y-3">

            <!-- Preview Try-On -->
            <a href="/shopkeeper/catalog1" class="group flex items-center justify-between p-5 border-2 border-gray-100 rounded-xl hover:border-cyan-200 hover:bg-cyan-50/50 transition-all duration-300 hover:shadow-md">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center group-hover:bg-cyan-200 transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                </div>
                <div>
                  <h3 class="font-semibold text-gray-900 group-hover:text-cyan-700 transition-colors">Preview Try-On Experience</h3>
                  <p class="text-sm text-gray-600 mt-0.5">View how customers see your lens catalogue</p>
                </div>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 group-hover:text-cyan-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>

            <!-- Upgrade Plan -->
            <a href="/price" class="group flex items-center justify-between p-5 border-2 border-gray-100 rounded-xl hover:border-purple-200 hover:bg-purple-50/50 transition-all duration-300 hover:shadow-md">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                  </svg>
                </div>
                <div>
                  <h3 class="font-semibold text-gray-900 group-hover:text-purple-700 transition-colors">Upgrade Plan</h3>
                  <p class="text-sm text-gray-600 mt-0.5">Access premium features and tools</p>
                </div>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 group-hover:text-purple-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>

            <!-- Manage Shop Details — opens modal -->
            <button onclick="openShopModal()" class="w-full group flex items-center justify-between p-5 border-2 border-gray-100 rounded-xl hover:border-blue-200 hover:bg-blue-50/50 transition-all duration-300 hover:shadow-md text-left">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                  </svg>
                </div>
                <div>
                  <h3 class="font-semibold text-gray-900 group-hover:text-blue-700 transition-colors">Manage Shop Details</h3>
                  <p class="text-sm text-gray-600 mt-0.5">Update your shop information and settings</p>
                </div>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </button>

          </div>

          <!-- Help Card -->
          <div class="mt-6 p-5 bg-gradient-to-r from-gray-50 to-blue-50 border border-gray-200 rounded-xl">
            <div class="flex items-start gap-3">
              <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div>
                <h4 class="font-semibold text-gray-900 mb-1">Need Help?</h4>
                <p class="text-sm text-gray-600 mb-3">Contact support for assistance with your shop setup.</p>
                <a href="/contact-us" class="text-sm font-medium text-blue-600 hover:text-blue-700 hover:underline">Contact Us →</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /grid -->

  </main>
  @include('web.layouts.footer')
</div><!-- /main -->


<!-- ═══════════════════════════════════════════════════
     MANAGE SHOP MODAL
════════════════════════════════════════════════════ -->
<div id="shopModal" class="hidden fixed inset-0 z-[200] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden">

    <!-- Modal Header -->
    <div class="bg-gradient-to-r from-blue-50 to-cyan-50 px-8 py-5 border-b border-gray-200 flex items-center justify-between">
      <div>
        <h2 class="text-xl font-bold text-gray-900">Manage Shop Details</h2>
        <p class="text-sm text-gray-500 mt-0.5">Update your shop information</p>
      </div>
      <button onclick="closeShopModal()" class="text-gray-400 hover:text-red-500 transition-colors p-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>

    <!-- Modal Body -->
    <div class="p-8">
      <div id="shop-modal-msg" class="hidden mb-4 p-3 rounded-lg text-sm font-medium"></div>

      <div class="space-y-4">
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wide">Shop Name</label>
            <input id="field-shop-name" type="text" placeholder="e.g. VisionCare Optics"
              class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition-all" />
          </div>
          <div>
            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wide">Retailer Name</label>
            <input id="field-retailer-name" type="text" placeholder="Your name"
              class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition-all" />
          </div>
        </div>
        <div>
          <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wide">Phone Number</label>
          <input id="field-phone" type="tel" placeholder="+92 300 0000000"
            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition-all" />
        </div>
        <div>
          <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wide">Address</label>
          <input id="field-address" type="text" placeholder="Shop address"
            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition-all" />
        </div>
        <div>
          <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wide">City</label>
          <input id="field-city" type="text" placeholder="City"
            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition-all" />
        </div>
      </div>

      <div class="flex gap-3 mt-6">
        <button onclick="closeShopModal()" class="flex-1 border-2 border-gray-200 text-gray-600 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-all">
          Cancel
        </button>
        <button onclick="saveShopDetails()" id="save-shop-btn" class="flex-1 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white py-3 rounded-xl font-semibold transition-all shadow-md flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
          </svg>
          Save Changes
        </button>
      </div>
    </div>
  </div>
</div>


<!-- ═══════════════════════════════════════════════════
     ALL JAVASCRIPT
════════════════════════════════════════════════════ -->
<script>
// ─────────────────────────────────────────────
// STATE
// ─────────────────────────────────────────────
let dashboardData   = null;
let shopCatalogLink = '';
let qrCodeInstance  = null;

// ─────────────────────────────────────────────
// BOOT
// ─────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', function () {
  const token    = localStorage.getItem('auth_token');
  const role     = localStorage.getItem('user_role');
  const userInfo = JSON.parse(localStorage.getItem('user_info') || '{}');

  // Auth guard
  if (!token || role !== 'shopkeeper') {
    alert('Please login as a shopkeeper to access this page');
    window.location.href = '/signup';
    return;
  }

  // Populate header/sidebar with user info immediately
  if (userInfo.email) {
    document.getElementById('admin-email').textContent        = userInfo.email;
    document.getElementById('sidebar-email').textContent      = userInfo.email;
    document.getElementById('sidebar-email-first').textContent = userInfo.email.charAt(0).toUpperCase();
  }

  loadDashboardData(token);
});


// ─────────────────────────────────────────────
// API: LOAD DASHBOARD
// ─────────────────────────────────────────────
async function loadDashboardData(token) {
  try {
    const response = await fetch('/api/shopkeeper/dashboard', {
      method: 'GET',
      headers: {
        'Authorization': 'Bearer ' + token,
        'Accept': 'application/json'
      }
    });

    const result = await response.json();

    if (response.ok && result.success) {
      dashboardData = result.data;
      updateDashboardUI(result.data);
    } else {
      showToast('Failed to load dashboard: ' + (result.message || 'Unknown error'), 'error');
    }
  } catch (error) {
    console.error('Dashboard load error:', error);
    showToast('Could not connect to server. Please refresh.', 'error');
  }
}


// ─────────────────────────────────────────────
// UI: UPDATE ALL DASHBOARD ELEMENTS
// ─────────────────────────────────────────────
function updateDashboardUI(data) {
  const stats = data.stats || {};
  const shop  = data.shop  || {};
  const qr    = data.qr_code || {};

  // ── Stats cards ──────────────────────────────
  document.getElementById('total-tryons').textContent =
    (stats.total_tryons ?? 0).toLocaleString();

  const planName = stats.subscription_plan || 'No Plan';
  document.getElementById('subscription-plan').textContent = planName;

  const daysLeft = stats.days_remaining ?? 0;
  const daysEl   = document.getElementById('days-remaining');
  daysEl.textContent = daysLeft > 0 ? `${daysLeft} days remaining` : 'Plan expired';
  daysEl.className   = daysLeft > 0
    ? 'text-xs text-gray-500'
    : 'text-xs text-red-500 font-semibold';

  const badge      = document.getElementById('subscription-badge');
  const planStatus = stats.plan_status || 'none';
  const isActive   = planStatus === 'active' && daysLeft > 0;
  const isExpired  = planStatus === 'expired' || (planStatus === 'active' && daysLeft === 0);

  badge.textContent = isActive ? 'Active' : isExpired ? 'Expired' : 'No Plan';
  badge.className   = isActive
    ? 'px-3 py-1 bg-indigo-50 text-indigo-700 text-xs font-semibold rounded-full'
    : isExpired
      ? 'px-3 py-1 bg-red-50 text-red-600 text-xs font-semibold rounded-full'
      : 'px-3 py-1 bg-gray-100 text-gray-500 text-xs font-semibold rounded-full';

  // Tryon change indicator
  const changePct = stats.tryon_change_pct;
  if (changePct !== undefined && changePct !== null) {
    document.getElementById('tryon-change').innerHTML = changePct >= 0
      ? `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>+${changePct}% from last month`
      : `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17H5m0 0v-8m0 8l8-8 4 4 6-6"/></svg>${changePct}% from last month`;
  } else {
    document.getElementById('tryon-change').textContent = 'No data yet';
  }

  // ── Sidebar plan ─────────────────────────────
  document.getElementById('sidebar-plan-name').textContent   = planName;
  document.getElementById('sidebar-plan-price').textContent  = stats.plan_price  || '—';
  document.getElementById('sidebar-plan-expiry').textContent = stats.plan_expiry  ? 'Expires: ' + stats.plan_expiry : '—';

  // ── QR Code ──────────────────────────────────
  shopCatalogLink = qr.catalog_url || (window.location.origin + '/shopkeeper/catalog1');

  if (qr.qr_image) {
    // Use server-stored image if provided
    const img = document.getElementById('shop-qr-img');
    img.src = '/storage/' + qr.qr_image;
    img.onerror = () => { img.onerror = null; generateQRCode(shopCatalogLink); };
    img.classList.remove('hidden');
    document.getElementById('qr-wrapper').classList.add('hidden');
  } else {
    // Generate QR client-side
    generateQRCode(shopCatalogLink);
  }

  // ── Pre-fill shop modal ───────────────────────
  if (shop) {
    document.getElementById('field-shop-name').value     = shop.shop_name     || '';
    document.getElementById('field-retailer-name').value = shop.retailer_name || '';
    document.getElementById('field-phone').value          = shop.phone          || '';
    document.getElementById('field-address').value        = shop.address        || '';
    document.getElementById('field-city').value           = shop.city           || '';
  }
}


// ─────────────────────────────────────────────
// QR CODE: GENERATE CLIENT-SIDE
// ─────────────────────────────────────────────
function generateQRCode(url) {
  const container = document.getElementById('qr-code-div');
  container.innerHTML = ''; // clear any previous

  qrCodeInstance = new QRCode(container, {
    text:          url,
    width:         220,
    height:        220,
    colorDark:     '#0e7490',   // cyan-700
    colorLight:    '#f0fdff',
    correctLevel:  QRCode.CorrectLevel.H
  });
}


// ─────────────────────────────────────────────
// QR: DOWNLOAD
// ─────────────────────────────────────────────
function downloadQR() {
  // Try canvas first (generated QR)
  const canvas = document.querySelector('#qr-code-div canvas');
  if (canvas) {
    const link      = document.createElement('a');
    link.download   = 'shop-qr-code.png';
    link.href       = canvas.toDataURL('image/png');
    link.click();
    return;
  }

  // Fallback: server image
  const img = document.getElementById('shop-qr-img');
  if (img && img.src) {
    const link    = document.createElement('a');
    link.download = 'shop-qr-code.png';
    link.href     = img.src;
    link.click();
  }
}


// ─────────────────────────────────────────────
// QR: COPY LINK
// ─────────────────────────────────────────────
function copyShopLink() {
  const link = shopCatalogLink || (window.location.origin + '/shopkeeper/catalog1');

  navigator.clipboard.writeText(link).then(() => {
    const toast = document.getElementById('copy-toast');
    const btn   = document.getElementById('copy-btn');
    toast.classList.remove('hidden');
    btn.classList.add('bg-green-50', 'border-green-400', 'text-green-600');
    setTimeout(() => {
      toast.classList.add('hidden');
      btn.classList.remove('bg-green-50', 'border-green-400', 'text-green-600');
    }, 2500);
  }).catch(() => {
    // Fallback for older browsers
    const ta    = document.createElement('textarea');
    ta.value    = link;
    document.body.appendChild(ta);
    ta.select();
    document.execCommand('copy');
    document.body.removeChild(ta);
    document.getElementById('copy-toast').classList.remove('hidden');
    setTimeout(() => document.getElementById('copy-toast').classList.add('hidden'), 2500);
  });
}


// ─────────────────────────────────────────────
// SHOP MODAL: OPEN / CLOSE
// ─────────────────────────────────────────────
function openShopModal() {
  document.getElementById('shopModal').classList.remove('hidden');
  document.getElementById('shop-modal-msg').classList.add('hidden');
}

function closeShopModal() {
  document.getElementById('shopModal').classList.add('hidden');
}

// Close modal on backdrop click
document.getElementById('shopModal').addEventListener('click', function (e) {
  if (e.target === this) closeShopModal();
});


// ─────────────────────────────────────────────
// SHOP MODAL: SAVE DETAILS
// ─────────────────────────────────────────────
async function saveShopDetails() {
  const token  = localStorage.getItem('auth_token');
  const btn    = document.getElementById('save-shop-btn');
  const msgEl  = document.getElementById('shop-modal-msg');

  const payload = {
    shop_name:     document.getElementById('field-shop-name').value.trim(),
    retailer_name: document.getElementById('field-retailer-name').value.trim(),
    phone:         document.getElementById('field-phone').value.trim(),
    address:       document.getElementById('field-address').value.trim(),
    city:          document.getElementById('field-city').value.trim(),
  };

  if (!payload.shop_name) {
    showModalMsg('Shop name is required.', 'error');
    return;
  }

  btn.disabled     = true;
  btn.innerHTML    = '<svg class="animate-spin w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>Saving...';

  try {
    const response = await fetch('/api/shopkeeper/update-shop', {
      method: 'POST',
      headers: {
        'Authorization': 'Bearer ' + token,
        'Accept':        'application/json',
        'Content-Type':  'application/json'
      },
      body: JSON.stringify(payload)
    });

    const result = await response.json();

    if (response.ok && result.success) {
      showModalMsg('✓ Shop details updated successfully!', 'success');
      // Update sidebar plan name if shop name changed
      setTimeout(() => closeShopModal(), 1500);
    } else {
      showModalMsg(result.message || 'Failed to update shop details.', 'error');
    }
  } catch (err) {
    showModalMsg('Connection error. Please try again.', 'error');
  } finally {
    btn.disabled  = false;
    btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Save Changes';
  }
}

function showModalMsg(msg, type) {
  const el = document.getElementById('shop-modal-msg');
  el.textContent  = msg;
  el.className    = type === 'success'
    ? 'mb-4 p-3 rounded-lg text-sm font-medium bg-green-50 text-green-700 border border-green-200'
    : 'mb-4 p-3 rounded-lg text-sm font-medium bg-red-50 text-red-700 border border-red-200';
  el.classList.remove('hidden');
}


// ─────────────────────────────────────────────
// TOAST HELPER
// ─────────────────────────────────────────────
function showToast(message, type = 'info') {
  const toast = document.createElement('div');
  toast.className = `fixed bottom-6 right-6 z-[9999] px-5 py-3 rounded-xl shadow-xl text-sm font-semibold transition-all ${
    type === 'error' ? 'bg-red-600 text-white' : 'bg-gray-900 text-white'
  }`;
  toast.textContent = message;
  document.body.appendChild(toast);
  setTimeout(() => toast.remove(), 4000);
}


// ─────────────────────────────────────────────
// LOGOUT
// ─────────────────────────────────────────────
async function logout() {
  const token = localStorage.getItem('auth_token');
  try {
    await fetch('/api/logout', {
      method: 'POST',
      headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
    });
  } catch (e) {}
  localStorage.removeItem('auth_token');
  localStorage.removeItem('user_role');
  localStorage.removeItem('user_info');
  window.location.href = '/signup';
}
</script>

</body>
</html>