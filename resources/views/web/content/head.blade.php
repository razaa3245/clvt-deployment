<!-- MAIN SECTION WITH VIDEO BACKGROUND -->
<div class="relative w-full h-screen flex justify-center items-center overflow-hidden">

  <!-- Background MP4 video (only inside this section) -->
  <video autoplay muted loop playsinline
    class="absolute inset-0 w-full h-full object-cover z-0"
    id="bg-video">
    <source src="images/Background_video.mp4" type="video/mp4">
  </video>

  <!-- Dark overlay to improve text readability -->
  <div class="absolute inset-0 bg-black/40 z-0"></div>

  <div class="absolute inset-0 z-5 pointer-events-none backdrop-blur-[3.5px]"></div>

  <!-- MAIN CONTENT STARTS -->
  <main class="relative z-10 flex flex-col justify-center items-center w-full max-w-7xl px-4 md:px-10 lg:px-20 py-16 gap-8">

    <!-- Left Content -->
    <div class="flex flex-col justify-center items-center space-y-8 text-center w-full">

      <!-- Badge -->
      <div class="inline-flex items-center gap-2 text-sm font-semibold w-fit shadow-sm">
        
      </div>

      <!-- CENTERED HEADING & PARAGRAPH -->
      <div class="flex flex-col justify-center items-center space-y-6">
        <h1 class="text-4xl sm:text-5xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight drop-shadow-md">
          Transform Your Optical Shop with
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 via-cyan-200 to-blue-300 animate-gradient">
            Contact Lens Virtual Try-On
          </span>
        </h1>

        <p class="text-white text-lg md:text-xl leading-relaxed font-medium max-w-xl drop-shadow">
          Empower your customers to visualize contact lenses instantly with cutting-edge AR technology. 
          <span class="text-yellow-300 font-semibold">No installations, no complexity</span> — just scan and try.
        </p>
      </div>

      <!-- Mobile Image -->
      <div class="block md:hidden w-full flex justify-center my-6">
        <div class="relative group">
          <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-cyan-500 rounded-2xl blur opacity-25 group-hover:opacity-40 transition"></div>
          <div class="relative">
            <img src="{{ asset('images/front1.jpg') }}" alt="Virtual Try-On Demo"
              class="w-full max-w-xs sm:max-w-md h-auto rounded-2xl shadow-2xl group-hover:scale-105 transition object-cover border-4 border-white"
              style="aspect-ratio: 1/1;">
            <div class="absolute inset-0 bg-gradient-to-t from-blue-600/30 via-transparent to-transparent rounded-2xl"></div>
          </div>
        </div>
      </div>

      
      <!-- CTA Buttons -->
      <div class="flex flex-col sm:flex-row flex-wrap gap-4 pt-2 justify-center">
        <a href="/signup"
          class="group relative bg-gradient-to-r from-blue-600 to-cyan-600 text-white px-8 py-4 rounded-xl shadow-xl hover:scale-105 transition">
          Get Started
        </a>

        <a href="#"
          class="group border-2 border-white text-white hover:bg-white hover:text-blue-700 
                 px-8 py-4 rounded-xl shadow-lg transition"
          onclick="openModal('demoModal'); return false;">
          Watch Demo
        </a>
      </div>

     

    </div>

  </main>
</div>

<!-- Gradient Animation -->
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
