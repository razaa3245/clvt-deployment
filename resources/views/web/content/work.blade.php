<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<section class="bg-gradient-to-br from-[#0a1628] via-[#0b1e64] to-[#1e3a8a] py-24 font-poppins relative overflow-hidden">
  <!-- Animated Background Effects -->
  <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_50%,_rgba(59,130,246,0.2),_transparent_50%)] blur-3xl"></div>
  <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_30%,_rgba(6,182,212,0.15),_transparent_50%)] blur-3xl"></div>
  
  <!-- Floating Particles -->
  <div class="absolute top-20 left-10 w-2 h-2 bg-blue-400 rounded-full opacity-60 animate-pulse"></div>
  <div class="absolute top-40 right-20 w-3 h-3 bg-cyan-400 rounded-full opacity-40 animate-pulse" style="animation-delay: 1s;"></div>
  <div class="absolute bottom-32 left-1/4 w-2 h-2 bg-blue-300 rounded-full opacity-50 animate-pulse" style="animation-delay: 2s;"></div>

  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-center gap-12 md:gap-20 relative z-10 px-4 md:px-6">
    
    <!-- Left Section -->
    <div class="w-full lg:w-1/2 space-y-8">
      
      <!-- Section Header -->
      <div class="text-center lg:text-left">

        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-5 leading-tight">
          How It <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-cyan-400 to-blue-400 animate-gradient" style="background-size: 200% 200%;">Works</span>
        </h1>
        <p class="text-blue-100 text-lg md:text-xl mb-8 max-w-2xl leading-relaxed">
          Simple, seamless, and designed for in-store success. Here's how it enhances the shopping experience for your customers in <span class="font-semibold text-cyan-300">3 easy steps</span>.
        </p>
      </div>

      <!-- Step 1 -->
      <div class="group rounded-2xl bg-white text-left shadow-2xl p-8 md:p-10 transition-all duration-500 hover:-translate-y-2 hover:shadow-blue-500/20 hover:shadow-2xl relative overflow-hidden border border-gray-100">
        <!-- Step Number Badge -->
        <div class="absolute top-6 right-6 w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
          01
        </div>
        
        <!-- Hover Gradient Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 to-cyan-50/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        
        <div class="relative z-10">
          <!-- Icon -->
          <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl mb-5 shadow-lg group-hover:scale-110 transition-transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </div>

          <h2 class="text-2xl md:text-3xl text-gray-900 font-bold mb-4 group-hover:text-blue-600 transition-colors duration-300">
            <a href="signup.blade.php" class="hover:underline">Shop Registration</a>
          </h2>
          <p class="text-gray-600 text-base md:text-lg leading-relaxed">
            Sign up and choose your subscription plan. Get instant access to your dashboard where you can manage everything seamlessly.
          </p>
        </div>

        <!-- Progress Bar -->
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gray-100">
          <div class="h-full bg-gradient-to-r from-blue-500 to-cyan-500 w-0 group-hover:w-full transition-all duration-700"></div>
        </div>
      </div>

      <!-- Step 2 -->
      <div class="group rounded-2xl bg-white text-left shadow-2xl p-8 md:p-10 transition-all duration-500 hover:-translate-y-2 hover:shadow-cyan-500/20 hover:shadow-2xl relative overflow-hidden border border-gray-100">
        <!-- Step Number Badge -->
        <div class="absolute top-6 right-6 w-14 h-14 bg-gradient-to-br from-cyan-500 to-teal-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
          02
        </div>
        
        <!-- Hover Gradient Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-cyan-50/50 to-teal-50/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        
        <div class="relative z-10">
          <!-- Icon -->
          <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-cyan-500 to-teal-600 rounded-xl mb-5 shadow-lg group-hover:scale-110 transition-transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
            </svg>
          </div>

          <h2 class="text-2xl md:text-3xl text-gray-900 font-bold mb-4 group-hover:text-cyan-600 transition-colors duration-300">
            Generate QR Code
          </h2>
          <p class="text-gray-600 text-base md:text-lg leading-relaxed">
            Instantly generate a unique QR code for your shop. Display it for visitors to scan and explore your virtual try-on service.
          </p>
        </div>

        <!-- Progress Bar -->
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gray-100">
          <div class="h-full bg-gradient-to-r from-cyan-500 to-teal-500 w-0 group-hover:w-full transition-all duration-700"></div>
        </div>
      </div>

      <!-- Step 3 -->
      <div class="group rounded-2xl bg-white text-left shadow-2xl p-8 md:p-10 transition-all duration-500 hover:-translate-y-2 hover:shadow-purple-500/20 hover:shadow-2xl relative overflow-hidden border border-gray-100">
        <!-- Step Number Badge -->
        <div class="absolute top-6 right-6 w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
          03
        </div>
        
        <!-- Hover Gradient Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-purple-50/50 to-pink-50/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        
        <div class="relative z-10">
          <!-- Icon -->
          <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl mb-5 shadow-lg group-hover:scale-110 transition-transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
            </svg>
          </div>

          <h2 class="text-2xl md:text-3xl text-gray-900 font-bold mb-4 group-hover:text-purple-600 transition-colors duration-300">
            Customer Experience
          </h2>
          <p class="text-gray-600 text-base md:text-lg leading-relaxed">
            Customers scan the QR code to access the AR try-on feature on their devices instantly — no app downloads or installations needed.
          </p>
        </div>

        <!-- Progress Bar -->
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gray-100">
          <div class="h-full bg-gradient-to-r from-purple-500 to-pink-500 w-0 group-hover:w-full transition-all duration-700"></div>
        </div>
      </div>

      

    </div>

    <!-- Right Section (Image Area) -->
    <div class="w-full lg:w-1/2 flex justify-center items-center relative mt-12 lg:mt-0">
      <div class="relative w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-[500px] group">
        
        <!-- Main Image -->
        <div class="relative z-10">
          <img 
            src="{{ asset('images/working.jpeg') }}" 
            alt="Virtual Try-On Process" 
            class="w-full h-auto rounded-3xl shadow-2xl border-4 border-white/20 transition-all duration-700 group-hover:scale-105 group-hover:rotate-1"
          >
          
          <!-- Image Overlay -->
          <div class="absolute inset-0 bg-gradient-to-t from-blue-900/30 via-transparent to-transparent rounded-3xl"></div>
        </div>

        <!-- Glow Effects -->
        <div class="absolute -inset-4 bg-gradient-to-r from-blue-400/40 via-cyan-400/40 to-purple-400/40 blur-3xl rounded-3xl -z-10 group-hover:blur-2xl transition-all duration-700"></div>
        <div class="absolute -inset-2 bg-blue-500/20 blur-2xl rounded-3xl -z-10 animate-pulse"></div>

        <!-- Floating Badge -->
<div class="absolute -bottom-6 -right-6 bg-white rounded-2xl shadow-2xl p-5 group-hover:scale-110 transition-transform duration-300 z-50">
  <div class="flex items-center gap-3">
    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
      </svg>
    </div>
    <div>
      <p class="text-xs text-gray-500 font-semibold">Setup Time</p>
      <p class="text-lg font-bold text-gray-900">Under 5 min</p>
    </div>
  </div>
</div>

       <!-- Floating Stats -->
<div class="absolute -top-6 -left-6 bg-white rounded-2xl shadow-2xl p-4 group-hover:scale-110 transition-transform duration-300 z-50">
  <div class="flex items-center gap-2">
    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
      </svg>
    </div>
    <div>
      <p class="text-xs text-gray-500 font-semibold">Fast</p>
      <p class="text-sm font-bold text-gray-900">AR Ready</p>
    </div>
  </div>
</div>

      </div>
    </div>
  </div>
</section>

<style>
  @keyframes gradient {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
  }
  
  .animate-gradient {
    animation: gradient 3s ease infinite;
  }
</style>