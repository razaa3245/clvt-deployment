<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VisionTech</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans min-h-screen">

  <!-- HEADER -->

  <header
    class="bg-white border-b border-gray-200 px-10 py-5 shadow-sm sticky top-0 z-50 transition-all duration-300 hover:shadow-md">
    <div class="flex items-center justify-between px-6 py-[10px]">
      <!-- Logo / Brand -->
      <div class="flex items-center gap-3">
        <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
        <a href="{{ route('home') }}"
          class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">VisionTech
        </a>


      </div>
      <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit"
          class="text-red-500 hover:text-red-400 hover:underline transition-all duration-300">Logout</button>
      </form>

  </header>

  <!-- MAIN CONTAINER -->

  <main class="max-w-7xl mx-auto p-10">
    <!-- DASHBOARD STATS -->
    <section class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-14">
      <!-- Each Card -->
      <div
        class="group bg-white border border-gray-200 rounded-2xl p-6 flex justify-between items-center shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-300">
        <div>
          <p class="text-blue-600 text-sm font-semibold">Total Shops</p>
          <h2 class="text-4xl font-extrabold mt-1 text-gray-800">523</h2>
        </div>
        <div class="text-4xl group-hover:scale-110 transition-transform duration-500"></div>
      </div>

      <div
        class="group bg-white border border-gray-200 rounded-2xl p-6 flex justify-between items-center shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-300">
        <div>
          <p class="text-blue-600 text-sm font-semibold">Active Users</p>
          <h2 class="text-4xl font-extrabold mt-1 text-gray-800">12,456</h2>
        </div>
        <div class="text-4xl group-hover:scale-110 transition-transform duration-500"></div>
      </div>

      <div
        class="group bg-white border border-gray-200 rounded-2xl p-6 flex justify-between items-center shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-300">
        <div>
          <p class="text-blue-600 text-sm font-semibold">Lens Catalog</p>
          <h2 class="text-4xl font-extrabold mt-1 text-gray-800">156</h2>
        </div>
        <div class="text-4xl group-hover:scale-110 transition-transform duration-500"></div>
      </div>

      <div
        class="group bg-white border border-gray-200 rounded-2xl p-6 flex justify-between items-center shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-300">
        <div>
          <p class="text-blue-600 text-sm font-semibold">Monthly Revenue</p>
          <h2 class="text-4xl font-extrabold mt-1 text-gray-800">$45.2K</h2>
        </div>
        <div class="text-4xl group-hover:scale-110 transition-transform duration-500"></div>
      </div>
    </section>

    <!-- PANELS -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-10">

      <!-- SHOP MANAGEMENT -->
      <div
        class="bg-white border border-gray-200 rounded-3xl p-8 shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-300">
        <h2 class="text-2xl font-bold mb-2 text-gray-800 flex items-center gap-2">
          Shop Management
        </h2>
        <p class="text-gray-500 mb-6">Manage and monitor registered optical shops</p>

        <input type="text" placeholder="Search shops..."
          class="w-full mb-6 p-3 bg-gray-100 border border-gray-300 rounded-xl placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-300" />

        <div class="space-y-4">
          <!-- Card Hover Effect -->
          <div
            class="group flex justify-between items-center p-5 bg-gray-50 border border-gray-200 rounded-2xl transition-all duration-500 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:shadow-xl hover:border-blue-400">
            <div>
              <h3 class="font-semibold text-gray-800 group-hover:text-blue-700 transition-colors">Vision Care Center
              </h3>
              <p class="text-sm text-gray-500">Pro Plan • Active</p>
            </div>
            <button
              class="px-4 py-1.5 bg-blue-600 hover:bg-blue-700 rounded-lg text-sm font-semibold text-white shadow transition-all hover:scale-105">View</button>
          </div>

          <div
            class="group flex justify-between items-center p-5 bg-gray-50 border border-gray-200 rounded-2xl transition-all duration-500 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:shadow-xl hover:border-blue-400">
            <div>
              <h3 class="font-semibold text-gray-800 group-hover:text-blue-700 transition-colors">Crystal Clear Optics
              </h3>
              <p class="text-sm text-gray-500">Basic Plan • Active</p>
            </div>
            <button
              class="px-4 py-1.5 bg-blue-600 hover:bg-blue-700 rounded-lg text-sm font-semibold text-white shadow transition-all hover:scale-105">View</button>
          </div>

          <div
            class="group flex justify-between items-center p-5 bg-gray-50 border border-gray-200 rounded-2xl transition-all duration-500 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:shadow-xl hover:border-blue-400">
            <div>
              <h3 class="font-semibold text-gray-800 group-hover:text-blue-700 transition-colors">Perfect Vision Shop
              </h3>
              <p class="text-sm text-gray-500">Pro Plus • Active</p>
            </div>
            <button
              class="px-4 py-1.5 bg-blue-600 hover:bg-blue-700 rounded-lg text-sm font-semibold text-white shadow transition-all hover:scale-105">View</button>
          </div>
        </div>
      </div>

      <!-- LENS CATALOG -->
      <div
        class="bg-white border border-gray-200 rounded-3xl p-8 shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-300">
        <h2 class="text-2xl font-bold mb-2 text-gray-800 flex items-center gap-2">
          Master Lens Catalog
        </h2>
        <p class="text-gray-500 mb-6">Add and manage lenses available across all shops</p>

        <button
          class="w-full py-3 bg-blue-600 hover:bg-blue-700 rounded-xl font-semibold text-white text-lg shadow-md hover:shadow-lg hover:scale-[1.02] transition-all duration-300 mb-6">
          <a href="catalog.blade.php">
            + Add New Lens
        </button>
        </a>
        <div class="space-y-4">
          <div
            class="group flex justify-between items-center p-5 bg-gray-50 border border-gray-200 rounded-2xl transition-all duration-500 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:shadow-xl hover:border-blue-400">
            <div class="flex items-center gap-3">
              <div class="w-6 h-6 rounded-full bg-amber-500 group-hover:scale-110 transition-transform duration-300">
              </div>
              <div>
                <h3 class="font-semibold text-gray-800 group-hover:text-blue-700 transition-colors">Natural Brown</h3>
                <p class="text-sm text-gray-500">Natural Category</p>
              </div>
            </div>
            <button
              class="text-blue-600 font-semibold hover:text-blue-700 transition-colors duration-300 hover:scale-105">Edit</button>
          </div>

          <div
            class="group flex justify-between items-center p-5 bg-gray-50 border border-gray-200 rounded-2xl transition-all duration-500 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:shadow-xl hover:border-blue-400">
            <div class="flex items-center gap-3">
              <div class="w-6 h-6 rounded-full bg-blue-600 group-hover:scale-110 transition-transform duration-300">
              </div>
              <div>
                <h3 class="font-semibold text-gray-800 group-hover:text-blue-700 transition-colors">Ocean Blue</h3>
                <p class="text-sm text-gray-500">Vibrant Category</p>
              </div>
            </div>
            <button
              class="text-blue-600 font-semibold hover:text-blue-700 transition-colors duration-300 hover:scale-105">Edit</button>
          </div>

        </div>
      </div>

    </section>
  </main>
  @include('web.layouts.footer')

</body>

</html>