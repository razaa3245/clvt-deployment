<!-- resources/views/auth/after-login-choice.blade.php
<div class="text-center mt-36">
  <h2 class="text-3xl font-bold mb-8">Welcome, {{ Auth::user()->name }}</h2>
  <p class="mb-10 text-gray-600">Where would you like to go next?</p>
  <a href="{{ route('adminboard') }}">
    <button class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 mr-4">Go to Dashboard</button>
  </a>
  <a href="{{ route('home') }}">
    <button class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg shadow hover:bg-gray-300">Continue Browsing Website</button>
  </a>
</div> -->

<!-- Popup Overlay -->
<div id="welcome-popup" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
  <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 text-center border border-gray-200">
    <h2 class="text-3xl font-extrabold mb-4 bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-600 text-transparent">
      Welcome, {{ Auth::user()->name }}
    </h2>
    <p class="mb-8 text-gray-600 text-base font-medium">Where would you like to go next?</p>
    <div class="flex justify-center gap-4 mb-6">
      <a href="{{ route('adminboard') }}">
        <button class="bg-blue-600 text-white px-5 py-3 rounded-xl font-semibold shadow hover:bg-blue-700 transition-all">Go to Dashboard</button>
      </a>
      <a href="{{ route('home') }}">
        <button class="bg-gray-200 text-gray-700 px-5 py-3 rounded-xl font-semibold shadow hover:bg-gray-300 transition-all">Continue Browsing Website</button>
      </a>
    </div>
    <button onclick="closeWelcomePopup()" class="text-xs text-gray-500 hover:text-blue-500 py-1">Close</button>
  </div>
</div>

<script>
function closeWelcomePopup() {
  const popup = document.getElementById('welcome-popup');
  if (popup) popup.style.display = 'none';
}
</script>

