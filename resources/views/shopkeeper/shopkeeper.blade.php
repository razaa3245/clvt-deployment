<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VisionTech</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
@include('layouts.auth')

<body class="bg-gradient-to-br from-slate-50 via-white to-slate-100 text-slate-800 font-sans min-h-screen flex">

<!-- SIDEBAR -->
  <aside x-data="{ open: false }"
         :class="open ? 'w-64' : 'w-20'"
         class="h-screen bg-white shadow-md border-r border-gray-200 transition-all duration-300 flex flex-col justify-between sticky top-0 z-50">

    <!-- Top Section -->
    <div>
      <!-- Logo -->
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
        <p class="text-xs text-gray-600 mt-1">Rs.25,000/month</p>
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



  <!-- ✅ MAIN CONTENT (Unchanged) -->
  <div class="flex-1 flex flex-col">
    <header
      class="sticky top-0 z-50 bg-white/70 backdrop-blur-md border-b border-slate-200 shadow-sm flex justify-between items-center px-10 py-4">
      <div class="flex items-center gap-3">
        <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
        <h1
          class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">
          VisionTech</h1>
      </div>
      <nav class="flex gap-8 text-sm font-medium">

       <div class="flex items-center gap-4">
          <span id="admin-email" class="text-sm text-gray-600"></span>
        </div>
      </nav>
    </header>

    <!-- MAIN -->

    <main class="max-w-7xl mx-auto px-8 py-14">


  <!-- STATS SECTION -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
  <!-- Total Try-Ons Card -->
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
      <p class="text-4xl font-bold text-gray-900" id="total-tryons">1,247</p>
      <div class="mt-4 flex items-center text-xs text-green-600 font-semibold">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
        </svg>
        +12% from last month
      </div>
    </div>
  </div>

  <!-- Subscription Card -->
  <div class="relative overflow-hidden bg-white rounded-2xl shadow-lg border border-gray-100 p-6 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
    <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-50 rounded-full -mr-16 -mt-16 opacity-50"></div>
    <div class="relative">
      <div class="flex items-center justify-between mb-3">
        <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
          </svg>
        </div>
        <span class="px-3 py-1 bg-indigo-50 text-indigo-700 text-xs font-semibold rounded-full">Active</span>
      </div>
      <h3 class="text-sm font-medium text-gray-500 mb-1">Subscription</h3>
      <p class="text-4xl font-bold text-gray-900" id="subscription-plan">Pro Plan</p>
      <div class="mt-4 flex items-center text-xs text-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span id="days-remaining">124  days remaining</span> 
      </div>
    </div>
  </div>
</div>

<!-- QR CODE CARD -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
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
          <p class="text-sm text-gray-600 mt-0.5">Display this QR code for customers to access your lens catalogue</p>
        </div>
      </div>
    </div>
    
    <div class="p-8">
      <div class="flex flex-col items-center my-6">
        <div class="w-64 h-64 border-2 border-dashed border-cyan-300 flex items-center justify-center rounded-2xl bg-gradient-to-br from-cyan-50 to-blue-50 shadow-inner p-4">
          <img id="shop-qr-img" src="" class="w-full h-full object-contain" alt="Shop QR Code">
        </div>
        <p class="text-gray-500 text-xs mt-4">Scan to view lens catalogue</p>
      </div>

      <div class="flex gap-4 mt-6">
        <button class="flex-1 bg-gradient-to-r from-cyan-600 to-cyan-700 hover:from-cyan-700 hover:to-cyan-800 text-white py-3 rounded-xl font-semibold transition-all hover:shadow-xl hover:-translate-y-0.5 shadow-md flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
          </svg>
          Download QR
        </button>
        <button class="flex-1 border-2 border-cyan-400 text-cyan-600 font-semibold py-3 rounded-xl hover:bg-cyan-50 transition-all hover:shadow-md flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
          </svg>
          Copy Link
        </button>
      </div>

      <div class="mt-6 p-4 bg-gray-50 rounded-xl border border-gray-200">
        <p class="text-xs text-gray-500 mb-1">Catalogue URL:</p>
        <a href="https://virtual-lens.io/catalogue" class="text-cyan-600 hover:text-cyan-700 hover:underline text-sm font-medium break-all">
          https://virtual-lens.io/catalogue
        </a>
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
          <p class="text-sm text-gray-600 mt-0.5">Manage your shop, upgrade plans, or preview try-on features</p>
        </div>
      </div>
    </div>
    
    <div class="p-8">
      <div class="space-y-3">
        <!-- Preview Try-On Experience -->
        <a href="/model1" class="group flex items-center justify-between p-5 border-2 border-gray-100 rounded-xl hover:border-cyan-200 hover:bg-cyan-50/50 transition-all duration-300 hover:shadow-md">
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

        <!-- Manage Shop -->
        <a href="#" class="group flex items-center justify-between p-5 border-2 border-gray-100 rounded-xl hover:border-blue-200 hover:bg-blue-50/50 transition-all duration-300 hover:shadow-md">
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
        </a>
      </div>

      <!-- Additional Info Card -->
      <div class="mt-6 p-5 bg-gradient-to-r from-gray-50 to-blue-50 border border-gray-200 rounded-xl">
        <div class="flex items-start gap-3">
          <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div>
            <h4 class="font-semibold text-gray-900 mb-1">Need Help?</h4>
            <p class="text-sm text-gray-600 mb-3">Check our documentation or contact support for assistance with your shop setup.</p>
            <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-700 hover:underline">
              View Documentation →
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      <script>
        // ========================================
        // STEP 1: Authentication Check on Page Load
        // ========================================
        document.addEventListener('DOMContentLoaded', function () {
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
        // AUTHENTICATION & INITIALIZATION
        // ========================================
        document.addEventListener('DOMContentLoaded', function() {
    const token = localStorage.getItem('auth_token');
    const role = localStorage.getItem('user_role');
    const userInfo = JSON.parse(localStorage.getItem('user_info') || '{}');
    
    
    console.log('✅ Admin authenticated:', userInfo.name || userInfo.email);
    
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
        // STEP 3: Update Dashboard UI with Data
        // ========================================
        function updateDashboardUI(data) {
          console.log('🎨 Updating dashboard UI with data:', data);

          // Update stats if you have IDs in your HTML
          // Example: If you add id="total-tryons" to the 1,247 element
          // document.getElementById('total-tryons').textContent = data.stats.total_tryons.toLocaleString();

          console.log('Total Try-Ons:', data.stats.total_tryons);
          console.log('Qr code:', data.qr_code ? data.qr_code.qr_image : null);
          // Show QR image (try storage link first, then public path)
          try {
            const qrPath = data.qr_code?.qr_image || '';
            const imgEl = document.getElementById('shop-qr-img');

            if (!imgEl) return;

            if (!qrPath) {
              imgEl.src = '';
              imgEl.alt = 'No QR available';
              return;
            }

            // Prefer the storage symlinked path (public/storage/...)
            imgEl.src = '/storage/' + qrPath;

            // If loading from /storage/... fails, fall back to direct public path
            imgEl.onerror = function () {
              this.onerror = null;
              this.src = '/' + qrPath;
            };
          } catch (e) {
            console.error('Error setting QR image:', e);
          }
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
                <h3 style="color: #333; margin-bottom: 15px; font-size: 20px;">⚠ ${message}</h3>
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
            localStorage.removeItem('auth_token');

            console.log('✅ Logout successful');
          } catch (error) {
            console.error('⚠ Logout error:', error);
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
            console.error('⚠ Logout error:', error);
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