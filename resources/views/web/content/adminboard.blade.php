<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VirtualLens Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-[#0f172a] via-[#1e293b] to-[#0f172a] min-h-screen font-sans text-gray-100 selection:bg-cyan-500/30">

  <!-- NAVBAR -->
  <header class="backdrop-blur-xl bg-white/5 border-b border-cyan-500/20 px-10 py-5 flex justify-between items-center shadow-lg sticky top-0 z-50">
    <div class="flex items-center gap-3">
      <img src="https://cdn-icons-png.flaticon.com/512/7391/7391510.png" alt="Logo" class="w-10 h-10 drop-shadow-md">
      <h1 class="text-3xl font-extrabold bg-gradient-to-r from-cyan-400 via-blue-400 to-purple-400 bg-clip-text text-transparent tracking-wide">
        VirtualLens<span class="text-gray-300 font-medium"> Admin</span>
      </h1>
    </div>
    <a href="#" class="text-gray-400 hover:text-cyan-400 text-sm font-semibold tracking-wide transition-all">Logout</a>
  </header>

  <!-- MAIN CONTENT -->
  <main class="p-10">

    <!-- DASHBOARD STATS -->
    <section class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
      <div class="bg-gradient-to-br from-cyan-900/40 to-blue-900/20 border border-cyan-500/30 backdrop-blur-xl rounded-2xl p-6 flex justify-between items-center shadow-lg hover:scale-[1.02] hover:shadow-cyan-500/20 transition-all">
        <div>
          <p class="text-cyan-300 text-sm font-medium">Total Shops</p>
          <h2 class="text-4xl font-extrabold mt-1 text-white">523</h2>
        </div>
        <div class="text-4xl">🏪</div>
      </div>

      <div class="bg-gradient-to-br from-indigo-900/40 to-blue-900/20 border border-indigo-400/30 backdrop-blur-xl rounded-2xl p-6 flex justify-between items-center shadow-lg hover:scale-[1.02] hover:shadow-indigo-400/20 transition-all">
        <div>
          <p class="text-indigo-300 text-sm font-medium">Active Users</p>
          <h2 class="text-4xl font-extrabold mt-1 text-white">12,456</h2>
        </div>
        <div class="text-4xl">👥</div>
      </div>

      <div class="bg-gradient-to-br from-blue-900/40 to-cyan-800/30 border border-blue-500/30 backdrop-blur-xl rounded-2xl p-6 flex justify-between items-center shadow-lg hover:scale-[1.02] hover:shadow-blue-500/20 transition-all">
        <div>
          <p class="text-blue-300 text-sm font-medium">Lens Catalog</p>
          <h2 class="text-4xl font-extrabold mt-1 text-white">156</h2>
        </div>
        <div class="text-4xl">📦</div>
      </div>

      <div class="bg-gradient-to-br from-purple-900/40 to-cyan-900/20 border border-purple-400/30 backdrop-blur-xl rounded-2xl p-6 flex justify-between items-center shadow-lg hover:scale-[1.02] hover:shadow-purple-400/20 transition-all">
        <div>
          <p class="text-purple-300 text-sm font-medium">Monthly Revenue</p>
          <h2 class="text-4xl font-extrabold mt-1 text-white">$45.2K</h2>
        </div>
        <div class="text-4xl">💰</div>
      </div>
    </section>

    <!-- MANAGEMENT PANELS -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-10 max-w-7xl mx-auto">

      <!-- SHOP MANAGEMENT -->
      <div class="rounded-3xl bg-white/5 border border-white/10 backdrop-blur-xl p-8 shadow-2xl transition duration-300 hover:shadow-cyan-500/10 relative overflow-hidden group">
        <h2 class="text-2xl font-bold mb-2 flex items-center gap-2">🏪 Shop Management</h2>
        <p class="text-gray-400 mb-6">Manage and monitor registered optical shops</p>

        <!-- Search -->
        <input type="text" placeholder="Search shops..."
          class="w-full mb-6 p-3 bg-slate-800/40 border border-slate-700/50 rounded-xl placeholder-gray-400 focus:ring-2 focus:ring-cyan-400 focus:outline-none transition-all duration-300" />

        <!-- Shop List -->
        <div class="space-y-4">
          <div class="group flex justify-between items-center p-5 bg-slate-800/40 border border-slate-700/50 rounded-2xl hover:border-cyan-400/50 hover:bg-slate-800/70 hover:scale-[1.02] transition-all duration-300">
            <div>
              <h3 class="font-semibold text-white group-hover:text-cyan-400 transition-colors">Vision Care Center</h3>
              <p class="text-sm text-gray-400">Pro Plan • Active</p>
            </div>
            <button
              class="px-4 py-1.5 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-lg text-sm font-semibold text-white shadow-md hover:shadow-cyan-500/30 transition-all duration-300 group-hover:scale-105">
              View
            </button>
          </div>

          <div class="group flex justify-between items-center p-5 bg-slate-800/40 border border-slate-700/50 rounded-2xl hover:border-cyan-400/50 hover:bg-slate-800/70 hover:scale-[1.02] transition-all duration-300">
            <div>
              <h3 class="font-semibold text-white group-hover:text-cyan-400 transition-colors">Crystal Clear Optics</h3>
              <p class="text-sm text-gray-400">Basic Plan • Active</p>
            </div>
            <button
              class="px-4 py-1.5 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-lg text-sm font-semibold text-white shadow-md hover:shadow-cyan-500/30 transition-all duration-300 group-hover:scale-105">
              View
            </button>
          </div>

          <div class="group flex justify-between items-center p-5 bg-slate-800/40 border border-slate-700/50 rounded-2xl hover:border-cyan-400/50 hover:bg-slate-800/70 hover:scale-[1.02] transition-all duration-300">
            <div>
              <h3 class="font-semibold text-white group-hover:text-cyan-400 transition-colors">Perfect Vision Shop</h3>
              <p class="text-sm text-gray-400">Pro Plus • Active</p>
            </div>
            <button
              class="px-4 py-1.5 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-lg text-sm font-semibold text-white shadow-md hover:shadow-cyan-500/30 transition-all duration-300 group-hover:scale-105">
              View
            </button>
          </div>
        </div>
      </div>

      <!-- MASTER LENS CATALOG -->
      <div class="rounded-3xl bg-white/5 border border-white/10 backdrop-blur-xl p-8 shadow-2xl transition duration-300 hover:shadow-cyan-500/10 relative overflow-hidden group">
        <h2 class="text-2xl font-bold mb-2 flex items-center gap-2">👁️ Master Lens Catalog</h2>
        <p class="text-gray-400 mb-6">Add and manage lenses available across all shops</p>

        <!-- Add New -->
        <button
          class="w-full py-3 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-xl font-semibold text-white text-lg shadow-md hover:shadow-cyan-500/30 hover:scale-[1.02] transition-all duration-300 mb-6">
          + Add New Lens
        </button>

        <!-- Lens List -->
        <div class="space-y-4">
          <div
            class="group flex justify-between items-center p-5 bg-slate-800/40 border border-slate-700/50 rounded-2xl hover:border-cyan-400/50 hover:bg-slate-800/70 hover:scale-[1.02] transition-all duration-300">
            <div class="flex items-center gap-3">
              <div class="w-6 h-6 rounded-full bg-amber-600 shadow-inner shadow-amber-400/50 group-hover:scale-110 transition-transform"></div>
              <div>
                <h3 class="font-semibold text-white group-hover:text-cyan-400 transition-colors">Natural Brown</h3>
                <p class="text-sm text-gray-400">Natural Category</p>
              </div>
            </div>
            <button class="text-blue-400 font-semibold hover:text-cyan-300 transition-colors">Edit</button>
          </div>

          <div
            class="group flex justify-between items-center p-5 bg-slate-800/40 border border-slate-700/50 rounded-2xl hover:border-cyan-400/50 hover:bg-slate-800/70 hover:scale-[1.02] transition-all duration-300">
            <div class="flex items-center gap-3">
              <div class="w-6 h-6 rounded-full bg-blue-600 shadow-inner shadow-blue-400/50 group-hover:scale-110 transition-transform"></div>
              <div>
                <h3 class="font-semibold text-white group-hover:text-cyan-400 transition-colors">Ocean Blue</h3>
                <p class="text-sm text-gray-400">Vibrant Category</p>
              </div>
            </div>
            <button class="text-blue-400 font-semibold hover:text-cyan-300 transition-colors">Edit</button>
          </div>
        </div>
      </div>

    </section>

  </main>
</body>
</html>
