@include('web.layouts.header')
@include('web.layouts.navbar')

<div class="font-sans bg-gradient-to-b from-white via-slate-50 to-blue-50 min-h-screen py-20 relative overflow-hidden">

  <!-- Particles -->
  <div id="particles"></div>
  <div id="cursor-glow"></div>

  <div class="container mx-auto px-6 mt-20">

    <!-- HERO -->
    <div class="text-center mb-20 reveal">
      <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 mb-4 tracking-tight">
        Let’s Build Something Amazing Together
      </h1>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
        Whether you're an optical business or an individual user, our team is ready to help you 
        integrate and experience next-generation AR lens technology.
      </p>
    </div>

    <!-- MAIN GRID -->
    <div class="grid lg:grid-cols-2 gap-12 max-w-6xl mx-auto">

      <!-- FORM -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-10 shadow-2xl border border-white/50 reveal">

        <h2 class="text-2xl font-bold text-gray-900 mb-2">Send us a message</h2>
        <p class="text-gray-600 mb-8">We typically respond within a few hours.</p>

        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
          @csrf

          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
            <input type="text" name="name" placeholder="Your Name"
              class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:bg-white transition outline-none">
          </div>

          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
            <input type="email" name="email" placeholder="you@example.com"
              class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:bg-white transition outline-none">
          </div>

          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
            <input type="tel" name="phone"
              class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:bg-white transition outline-none">
          </div>

          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Service</label>
            <select name="service"
              class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:bg-white transition outline-none">
              <option value="">Select a service</option>
              <option value="lens_fitting">Lens Fitting</option>
              <option value="virtual_tryon">Virtual Try-On</option>
              <option value="subscription">Subscription Support</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
            <textarea name="message" rows="4"
              class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:bg-white transition outline-none"></textarea>
          </div>

          <button type="submit"
            class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-4 rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition">
            Send Message
          </button>
        </form>
      </div>

      <!-- RIGHT SIDE -->
      <div class="space-y-8">

        <!-- INFO CARD -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-xl border border-white/50 reveal">

          <h3 class="text-xl font-bold text-gray-900 mb-6">Contact Information</h3>

          <div class="space-y-5">

            <div class="flex items-center gap-4">
              <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                📞
              </div>
              <div>
                <p class="text-sm text-gray-500">Phone</p>
                <p class="font-medium text-gray-900">+92 325 2703679</p>
              </div>
            </div>

            <div class="flex items-center gap-4">
              <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                ✉️
              </div>
              <div>
                <p class="text-sm text-gray-500">Email</p>
                <p class="font-medium text-gray-900 break-all">muhammadshoaib10808@gmail.com</p>
              </div>
            </div>

            <div class="flex items-center gap-4">
              <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                📍
              </div>
              <div>
                <p class="text-sm text-gray-500">Address</p>
                <p class="font-medium text-gray-900">Danish Optics, Rawalpindi</p>
              </div>
            </div>

          </div>
        </div>

        <!-- Social Links Card -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 hover:shadow-2xl transition-all duration-300">
          <h3 class="text-xl font-bold text-gray-900 mb-6">Connect With Us</h3>
          <div class="flex gap-4">
            <a href="#" class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white hover:scale-110 transition-all duration-300 shadow-sm hover:shadow-md">
              <i class="fab fa-facebook-f text-lg"></i>
            </a>
            <a href="#" class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white hover:scale-110 transition-all duration-300 shadow-sm hover:shadow-md">
              <i class="fab fa-twitter text-lg"></i>
            </a>
            <a href="#" class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white hover:scale-110 transition-all duration-300 shadow-sm hover:shadow-md">
              <i class="fab fa-linkedin-in text-lg"></i>
            </a>
            <a href="#" class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white hover:scale-110 transition-all duration-300 shadow-sm hover:shadow-md">
              <i class="fab fa-instagram text-lg"></i>
            </a>
          </div>
        </div>

      </div>

    </div>
  </div>

  <!-- SUCCESS ALERT -->
  @if(session('success'))
  <script>
    alert("{{ session('success') }}");
  </script>
  @endif

</div>


<script>
const container = document.getElementById("particles");
for (let i = 0; i < 25; i++) {
  let dot = document.createElement("div");
  dot.className = "particle";
  dot.style.left = Math.random() * 100 + "%";
  dot.style.animationDuration = (5 + Math.random() * 5) + "s";
  dot.style.width = dot.style.height = (4 + Math.random() * 4) + "px";
  dot.style.opacity = 0.3 + Math.random();
  container.appendChild(dot);
}
</script>

<style>
#particles {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

/* Particle */
.particle {
  position: absolute;
  width: 6px;
  height: 6px;
  background: rgba(37, 99, 235, 0.6); /* darker blue */
  border-radius: 50%;
  animation: float linear infinite;
  
  /* Glow effect */
  box-shadow: 0 0 8px rgba(37, 99, 235, 0.6);
}

/* Animation */
@keyframes float {
  from {
    transform: translateY(100vh) scale(1);
    opacity: 0.3;
  }
  50% {
    opacity: 1;
    transform: translateY(50vh) scale(1.2);
  }
  to {
    transform: translateY(-10vh) scale(0.8);
    opacity: 0.2;
  }
}
</style>

@include('web.layouts.footer')
</body>
