<main class="flex-1 grid grid-cols-1 md:grid-cols-12 gap-8 px-4 md:px-10 lg:px-20 py-16 items-center min-h-[580px] bg-gradient-to-br from-gray-50 to-blue-50/30">
  <!-- Left Content -->
  <div class="col-span-1 md:col-span-6 flex flex-col justify-center h-full space-y-8 relative">
    <!-- Badge -->
    <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold w-fit shadow-sm">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
      </svg>
      <span>Next-Gen Technology</span>
    </div>

    <h1 class="text-4xl sm:text-5xl md:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight">
      Transform Your Optical Shop with
      <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-cyan-500 to-blue-600 animate-gradient">Virtual Try-On</span>
    </h1>

    <!-- IMAGE: Top for mobile, hidden on desktop -->
    <div class="block md:hidden w-full flex justify-center my-6">
      <div class="relative group">
        <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-cyan-500 rounded-2xl blur opacity-25 group-hover:opacity-40 transition duration-500"></div>
        <div class="relative">
          <img src="{{ asset('images/front1.jpg') }}" alt="Virtual Try-On Demo"
            class="w-full max-w-xs sm:max-w-md h-auto rounded-2xl shadow-2xl group-hover:scale-105 transition-all duration-500 object-cover object-center border-4 border-white"
            style="aspect-ratio: 1/1;">
          <div class="absolute inset-0 bg-gradient-to-t from-blue-600/30 via-transparent to-transparent rounded-2xl"></div>
        </div>
      </div>
    </div>

    <p class="text-gray-600 text-lg md:text-xl leading-relaxed font-medium max-w-xl">
      Empower your customers to visualize contact lenses instantly with cutting-edge AR technology. 
      <span class="text-blue-600 font-semibold">No installations, no complexity</span> — just scan and try.
    </p>

    <!-- Feature Highlights -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 py-4">
      <div class="flex items-center gap-3">
        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <span class="text-gray-700 font-medium">Instant Setup</span>
      </div>
      <div class="flex items-center gap-3">
        <div class="flex-shrink-0 w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <span class="text-gray-700 font-medium">Real-Time Preview</span>
      </div>
      <div class="flex items-center gap-3">
        <div class="flex-shrink-0 w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <span class="text-gray-700 font-medium">QR CODE Availability</span>
      </div>
      <div class="flex items-center gap-3">
        <div class="flex-shrink-0 w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <span class="text-gray-700 font-medium">Cloud Based</span>
      </div>
    </div>

    <!-- CTA Buttons -->
    <div class="flex flex-col sm:flex-row flex-wrap gap-4 pt-2">
      <a href="/signup"
        class="group relative bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 transition-all duration-300 text-white px-8 py-4 rounded-xl shadow-xl hover:shadow-2xl text-center font-bold hover:-translate-y-1 transform overflow-hidden">
        <span class="relative z-10 flex items-center justify-center gap-2">
          Get Started
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
          </svg>
        </span>
        <div class="absolute inset-0 bg-gradient-to-r from-cyan-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
      </a>

      <a href="#"
        class="group border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300 px-8 py-4 rounded-xl text-center font-bold hover:shadow-xl hover:-translate-y-1 transform flex items-center justify-center gap-2"
        onclick="openModal('demoModal'); return false;">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Watch Demo
      </a>
    </div>

    <!-- Trust Indicators -->
    <div class="flex flex-wrap items-center gap-6 pt-4 text-sm text-gray-500">
      
      <div class="flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
        </svg>
        <span class="font-medium text-gray-700">Trusted by 1000+ shops</span>
      </div>
    </div>

  </div>

  <!-- Right Image: hidden on mobile, visible (normal) on desktop -->
  <div class="col-span-1 md:col-span-6 justify-center items-center h-full hidden md:flex">
    <div class="relative group">
      <!-- Glow Effect -->
      <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 via-cyan-500 to-purple-600 rounded-2xl blur-xl opacity-25 group-hover:opacity-40 transition duration-500"></div>
      
      <!-- Main Image Container -->
      <div class="relative">
        <img src="{{ asset('images/img1.jpeg') }}" alt="Virtual Try-On Experience"
          class="w-full max-w-xs sm:max-w-md md:max-w-lg lg:max-w-[450px] h-auto rounded-2xl shadow-2xl group-hover:scale-105 transition-all duration-500 object-cover object-center border-4 border-white"
          style="aspect-ratio: 1/1;">
        
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-blue-600/30 via-transparent to-transparent rounded-2xl"></div>
        
        <!-- Floating Badge -->
        <div class="absolute -bottom-4 -right-4 bg-white rounded-xl shadow-2xl p-4 group-hover:scale-110 transition-transform duration-300">
          <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-cyan-500 rounded-lg flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </div>
            <div>
              <p class="text-xs text-gray-500 font-medium">AR Technology</p>
              <p class="text-sm font-bold text-gray-900">Live Preview</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<style>
  @keyframes gradient {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
  }
  
  .animate-gradient {
    background-size: 200% 200%;
    animation: gradient 3s ease infinite;
  }
</style>