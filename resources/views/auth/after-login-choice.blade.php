<!-- resources/views/auth/after-login-choice.blade.php -->
<div class="text-center mt-36">
  <h2 class="text-3xl font-bold mb-8">Welcome, {{ Auth::user()->name }}</h2>
  <p class="mb-10 text-gray-600">Where would you like to go next?</p>
  <a href="{{ route('adminboard') }}">
    <button class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 mr-4">Go to Dashboard</button>
  </a>
  <a href="{{ route('home') }}">
    <button class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg shadow hover:bg-gray-300">Continue Browsing Website</button>
  </a>
</div>
