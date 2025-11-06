<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VisionTech</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-50 via-white to-slate-100 text-slate-800 font-sans min-h-screen">

  <!-- HEADER -->

  <header class="sticky top-0 z-50 bg-white/70 backdrop-blur-md border-b border-slate-200 shadow-sm flex justify-between items-center px-10 py-4">
    <div class="flex items-center gap-3">
      <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
      <h1 class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">VirtualLens</h1>
    </div>
    <nav class="flex gap-8 text-sm font-medium">
      <a href="#" class="text-slate-700 hover:text-cyan-600 hover:underline transition-all duration-300">My Optical Shop</a>
      <a href="index.blade.php" class="text-red-500 hover:text-red-400 hover:underline transition-all duration-300">Logout</a>
    </nav>
  </header>

  <!-- MAIN -->

  <main class="max-w-7xl mx-auto px-8 py-14">


<!-- STATS SECTION -->
<div class="grid md:grid-cols-2 gap-8 mb-10">

  <div class="relative bg-white rounded-2xl p-8 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300 group overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-cyan-100 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
    <p class="text-sm text-slate-500 mb-2">Total Try-Ons</p>
    <div class="flex justify-between items-center">
      <h2 class="text-5xl font-extrabold text-slate-800 tracking-tight">1,247</h2>
      <span class="text-3xl">📈</span>
    </div>
    <p class="text-green-600 text-xs mt-2 font-semibold">+12% from last month</p>
  </div>

  <div class="relative bg-white rounded-2xl p-8 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300 group overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-indigo-100 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
    <p class="text-sm text-slate-500 mb-2">Subscription</p>
    <h2 class="text-2xl font-semibold text-slate-800">Pro Plan</h2>
    <p class="text-cyan-600 text-sm mt-1">124 days remaining</p>
  </div>

</div>

<!-- MAIN CONTENT -->
<div class="grid lg:grid-cols-2 gap-10">

  <!-- QR CODE CARD -->
  <div class="bg-white rounded-3xl p-10 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300">
    <h3 class="text-xl font-bold flex items-center gap-2 mb-3 text-slate-800"> Your Shop’s QR Code</h3>
    <p class="text-slate-500 text-sm mb-6">Display this QR code for customers to instantly access your lens catalogue.</p>

    <div class="flex flex-col items-center my-6">
      <div class="w-52 h-52 border border-dashed border-cyan-400 flex items-center justify-center rounded-2xl bg-gradient-to-br from-cyan-50 to-blue-50 shadow-inner hover:scale-105 hover:shadow-cyan-200 transition-all duration-300">
        <span class="text-cyan-500 text-sm tracking-wide">QR CODE</span>
      </div>
      <p class="text-slate-500 text-xs mt-3">Scan to view lens catalogue</p>
    </div>

    <div class="flex gap-5 mt-5">
      <button class="flex-1 bg-gradient-to-r from-cyan-500 to-blue-500 text-white font-semibold py-2.5 rounded-lg shadow-md hover:scale-[1.03] hover:shadow-cyan-300 transition-all duration-300">
        Download QR
      </button>
      <button class="flex-1 border border-cyan-400 text-cyan-600 font-semibold py-2.5 rounded-lg hover:bg-cyan-50 transition-all duration-300">
        Copy Link
      </button>
    </div>

    <p class="text-slate-500 text-sm mt-6">Catalogue URL:
      <a href="#" class="text-cyan-600 hover:underline ml-1">https://virtual-lens.io/catalogue</a>
    </p>
  </div>

  <!-- SIDE PANEL -->
  <div class="flex flex-col gap-6">

    <!-- Quick Actions -->
    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300">
      <h3 class="text-xl font-bold mb-3 flex items-center gap-2 text-slate-800"> Quick Actions</h3>
      <p class="text-slate-500 text-sm mb-5">Manage your shop, upgrade plans, or preview the try-on feature in one click.</p>

      <div class="divide-y divide-slate-200">
        <button class="w-full text-left py-3 text-cyan-600 hover:text-cyan-700 hover:bg-cyan-50 transition-all duration-300 font-medium text-sm flex items-center gap-2"> Preview Try-On Experience</button>
        <a href="price.blade.php">
        <button class="w-full text-left py-3 text-cyan-600 hover:text-cyan-700 hover:bg-cyan-50 transition-all duration-300 font-medium text-sm flex items-center gap-2"> Upgrade Plan</button>
      </a>
      </div>
    </div>

    <!-- AI Insights -->
    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-3xl p-8 border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300">
      <h3 class="text-xl font-bold mb-3 flex items-center gap-2 text-slate-800"> AI Insights</h3>
      <p class="text-slate-600 text-sm mb-5">Your users prefer <span class="text-cyan-600 font-semibold">Sky Blue</span> and <span class="text-cyan-600 font-semibold">Hazel</span> lenses. Try promoting them next week!</p>
      <button class="bg-gradient-to-r from-cyan-500 to-blue-500 text-white py-2.5 px-6 rounded-lg hover:scale-105 hover:shadow-cyan-300 transition-all font-semibold shadow-md">Generate New Insights</button>
    </div>
  </div>
</div>
  </main>
  @include('web.layouts.footer')
</body>
</html>
