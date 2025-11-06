<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lens Catalogue | VirtualLens</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Header -->
  <div class="max-w-7xl mx-auto py-6 px-4">
    <a href="adminboard.blade.php" class="text-blue-500 hover:underline text-sm">&larr; Back to home</a>
    <h1 class="text-3xl font-bold text-center text-cyan-600 mt-4">Lens Catalogue</h1>
    <p class="text-center text-gray-500 mt-1">Browse our collection of premium colored contact lenses</p>
  </div>

  <!-- Filter Buttons -->
  <div class="flex justify-center space-x-3 mt-4">
    <button class="px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700">All</button>
    <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Natural</button>
    <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Vibrant</button>
  </div>

  <!-- Lens Cards -->
  <div class="max-w-7xl mx-auto mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4">
    <!-- Example Card -->
    <div class="bg-white rounded-2xl shadow-md p-5 text-center hover:shadow-lg transition">
      <div class="flex justify-between items-center mb-3">
        <h3 class="text-lg font-semibold text-gray-800">Natural Brown</h3>
        <span class="bg-cyan-100 text-cyan-700 text-xs px-2 py-1 rounded-full font-medium">Popular</span>
      </div>
      <div class="w-20 h-20 mx-auto rounded-full bg-[#8B4513] border-4 border-gray-100"></div>
      <p class="mt-3 text-sm text-gray-500">Natural • Premium Quality</p>
      <div class="flex justify-center items-center mt-2 text-yellow-500 text-sm">
        ⭐ 4.3 <span class="text-gray-400 ml-1">(120+ reviews)</span>
      </div>
      <p class="text-xl font-bold mt-3">$45 <span class="text-sm font-normal text-gray-500">per pair</span></p>

      <!-- New Buttons -->
      <div class="flex justify-center space-x-2 mt-4">
        <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg text-sm">Update Lens</button>
        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm">Delete Lens</button>
      </div>
    </div>

    <!-- Duplicate this card for each lens with different data -->
    <div class="bg-white rounded-2xl shadow-md p-5 text-center hover:shadow-lg transition">
      <div class="flex justify-between items-center mb-3">
        <h3 class="text-lg font-semibold text-gray-800">Ocean Blue</h3>
        <span class="bg-cyan-100 text-cyan-700 text-xs px-2 py-1 rounded-full font-medium">Popular</span>
      </div>
      <div class="w-20 h-20 mx-auto rounded-full bg-blue-500 border-4 border-gray-100"></div>
      <p class="mt-3 text-sm text-gray-500">Vibrant • Premium Quality</p>
      <div class="flex justify-center items-center mt-2 text-yellow-500 text-sm">
        ⭐ 4.9 <span class="text-gray-400 ml-1">(120+ reviews)</span>
      </div>
      <p class="text-xl font-bold mt-3">$52 <span class="text-sm font-normal text-gray-500">per pair</span></p>

      <div class="flex justify-center space-x-2 mt-4">
        <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg text-sm">Update Lens</button>
        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm">Delete Lens</button>
      </div>
    </div>

    <!-- Add more lenses here similarly -->
  </div>

  <!-- Features Section -->
  <div class="max-w-7xl mx-auto mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 text-center px-4">
    <div class="bg-white rounded-2xl shadow p-6">
      <div class="text-cyan-600 text-3xl mb-2"></div>
      <h4 class="font-semibold text-gray-800 mb-1">Virtual Try-On</h4>
      <p class="text-sm text-gray-500">See how each lens looks on you before buying</p>
    </div>
    <div class="bg-white rounded-2xl shadow p-6">
      <div class="text-cyan-600 text-3xl mb-2"></div>
      <h4 class="font-semibold text-gray-800 mb-1">Premium Quality</h4>
      <p class="text-sm text-gray-500">FDA approved, comfortable daily wear lenses</p>
    </div>
    <div class="bg-white rounded-2xl shadow p-6">
      <div class="text-cyan-600 text-3xl mb-2"></div>
      <h4 class="font-semibold text-gray-800 mb-1">Easy Returns</h4>
      <p class="text-sm text-gray-500">30-day return policy on all unopened products</p>
    </div>
  </div>

  <!-- Footer CTA -->
  <div class="max-w-4xl mx-auto bg-cyan-50 text-center mt-12 p-8 rounded-2xl">
    <h2 class="text-2xl font-bold text-cyan-700 mb-2">Ready to Manage Your Lenses?</h2>
    <p class="text-gray-600 mb-4">You can update or delete lens details easily using the options above.</p>
    <button class="bg-cyan-600 hover:bg-cyan-700 text-white px-6 py-3 rounded-lg font-semibold">Add New Lens</button>
  </div>
@include('web.layouts.footer')
  
</body>
</html>
