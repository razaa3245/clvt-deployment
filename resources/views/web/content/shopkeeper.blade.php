<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VirtualLens | Access Portal</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-gradient-to-br from-[#0f172a] via-[#1e293b] to-[#0f172a] text-gray-100 min-h-screen">

  <!-- HEADER -->

  <header class="sticky top-0 z-50 bg-gradient-to-r from-blue-900/60 to-indigo-900/40 backdrop-blur-xl border-b border-indigo-600/40 shadow-md flex justify-between items-center px-10 py-4">
    <div class="flex items-center gap-3">
      <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
      <h1 class="text-2xl font-extrabold tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">VirtualLens</h1>
    </div>
    <nav class="flex gap-8 text-sm font-medium">
      <a href="#" class="hover:text-cyan-300 transition">My Optical Shop</a>
      <a href="#" class="text-red-400 hover:text-red-300 transition">Logout</a>
    </nav>
  </header>

  <!-- MAIN -->

  <main class="max-w-7xl mx-auto px-8 py-14">

<!-- STATS SECTION -->
<div class="grid md:grid-cols-2 gap-8 mb-10">
  
  <div class="bg-gradient-to-br from-blue-700/30 to-cyan-800/30 rounded-2xl p-8 border border-cyan-500/30 shadow-xl hover:shadow-cyan-500/20 transition-all duration-300 relative overflow-hidden group">
    <div class="absolute inset-0 bg-gradient-to-tr from-cyan-600/10 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
    <p class="text-sm text-gray-400 mb-2">Total Try-Ons</p>
    <div class="flex justify-between items-center">
      <h2 class="text-5xl font-extrabold text-white tracking-tight">1,247</h2>
      <span class="text-3xl">📈</span>
    </div>
    <p class="text-green-400 text-xs mt-2 font-semibold">+12% from last month</p>
  </div>

  <div class="bg-gradient-to-br from-indigo-700/30 to-blue-800/30 rounded-2xl p-8 border border-indigo-500/30 shadow-xl hover:shadow-indigo-500/20 transition-all duration-300 relative overflow-hidden group">
    <div class="absolute inset-0 bg-gradient-to-tr from-indigo-600/10 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
    <p class="text-sm text-gray-400 mb-2">Subscription</p>
    <h2 class="text-2xl font-semibold text-white">Pro Plan</h2>
    <p class="text-cyan-300 text-sm mt-1">124 days remaining</p>
  </div>

</div>

<!-- MAIN CONTENT -->
<div class="grid lg:grid-cols-2 gap-10">
  
  <!-- QR CODE CARD -->
  <div class="bg-gradient-to-br from-slate-800/60 to-slate-900/40 rounded-3xl p-10 border border-blue-600/30 shadow-xl hover:shadow-blue-500/20 transition-all duration-300">
    <h3 class="text-xl font-bold flex items-center gap-2 mb-3">📱 Your Shop’s QR Code</h3>
    <p class="text-gray-400 text-sm mb-6">Display this futuristic QR code for instant lens access.</p>

    <div class="flex flex-col items-center my-6">
      <div class="w-52 h-52 border border-dashed border-cyan-400 flex items-center justify-center rounded-2xl bg-gradient-to-br from-blue-950/50 to-cyan-950/20 backdrop-blur-sm shadow-inner hover:scale-105 transition-all">
        <span class="text-cyan-300 text-sm tracking-wide">QR CODE</span>
      </div>
      <p class="text-gray-500 text-xs mt-3">Scan to view lens catalogue</p>
    </div>

    <div class="flex gap-5 mt-5">
      <button class="flex-1 bg-gradient-to-r from-cyan-600 to-blue-600 text-white font-semibold py-2.5 rounded-lg shadow-md hover:scale-[1.03] hover:shadow-cyan-500/30 transition-all">
        ⬇️ Download QR
      </button>
      <button class="flex-1 border border-cyan-400 text-cyan-300 font-semibold py-2.5 rounded-lg hover:bg-cyan-950/20 transition-all">
        Copy Link
      </button>
    </div>

    <p class="text-gray-400 text-sm mt-6">Catalogue URL:
      <a href="#" class="text-cyan-400 hover:underline ml-1">https://virtual-lens.io/catalogue</a>
    </p>
  </div>

  <!-- SIDE PANEL -->
  <div class="flex flex-col gap-6">
    
    <!-- Quick Actions -->
    <div class="bg-gradient-to-br from-slate-800/60 to-slate-900/40 rounded-3xl p-8 border border-cyan-500/30 shadow-xl hover:shadow-cyan-500/20 transition-all duration-300">
      <h3 class="text-xl font-bold mb-3 flex items-center gap-2">⚡ Quick Actions</h3>
      <p class="text-gray-400 text-sm mb-5">Manage your shop, upgrade plans, or preview the lens try-on in one click.</p>

      <div class="divide-y divide-gray-700/60">
        <button class="w-full text-left py-3 text-cyan-400 hover:text-cyan-200 transition font-medium text-sm flex items-center gap-2">👁️ Preview Try-On Experience</button>
        <button class="w-full text-left py-3 text-cyan-400 hover:text-cyan-200 transition font-medium text-sm flex items-center gap-2">⬆️ Upgrade Plan</button>
      </div>
    </div>

    <!-- AI Insights -->
    <div class="bg-gradient-to-br from-blue-800/40 to-cyan-900/40 rounded-3xl p-8 border border-blue-500/30 shadow-xl hover:shadow-blue-500/20 transition-all duration-300">
      <h3 class="text-xl font-bold mb-3 flex items-center gap-2">🤖 AI Insights</h3>
      <p class="text-gray-400 text-sm mb-5">Your users prefer <span class="text-cyan-300 font-semibold">Sky Blue</span> and <span class="text-cyan-300 font-semibold">Hazel</span> lenses. Try promoting those next week!</p>
      <button class="bg-gradient-to-r from-blue-600 to-cyan-600 text-white py-2.5 px-6 rounded-lg hover:scale-105 transition-all font-semibold shadow-lg">Generate New Insights</button>
    </div>
  </div>

</div>


  </main>
</body>
</html>
