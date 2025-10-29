<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us | VirtualLens</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-tr from-cyan-500 via-blue-700 to-purple-800 text-white font-poppins min-h-screen overflow-x-hidden relative">

  <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>

  <main class="relative z-10 max-w-7xl mx-auto px-6 py-20">

<!-- Title -->
<div class="text-center mb-20">
  <h1 class="text-5xl md:text-6xl font-extrabold bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-500 bg-clip-text text-transparent">About Us</h1>
  <p class="mt-4 text-lg text-gray-200 max-w-2xl mx-auto">
    Empowering retailers with futuristic AR and AI technologies for next-gen eyewear experiences.
  </p>
</div>

<!-- About Cards -->
<div class="grid md:grid-cols-3 gap-10">
  <div class="bg-white/10 backdrop-blur-lg border border-white/20 p-8 rounded-3xl shadow-xl hover:scale-105 transition-all duration-500">
    <h2 class="text-2xl font-bold mb-4 text-cyan-300">Our Vision</h2>
    <p class="text-gray-200 leading-relaxed">
      Redefine eyewear shopping by blending real and virtual worlds through immersive AR experiences.
    </p>
  </div>

  <div class="bg-white/10 backdrop-blur-lg border border-white/20 p-8 rounded-3xl shadow-xl hover:scale-105 transition-all duration-500">
    <h2 class="text-2xl font-bold mb-4 text-blue-400">Our Mission</h2>
    <p class="text-gray-200 leading-relaxed">
      Build a seamless, intelligent platform that connects customers and retailers through AR try-ons.
    </p>
  </div>

  <div class="bg-white/10 backdrop-blur-lg border border-white/20 p-8 rounded-3xl shadow-xl hover:scale-105 transition-all duration-500">
    <h2 class="text-2xl font-bold mb-4 text-purple-400">Why Choose Us?</h2>
    <p class="text-gray-200 leading-relaxed">
      Trusted by top optical brands — fast, secure, and elegant AR integration with stunning visuals.
    </p>
  </div>
</div>

<!-- Trusted By -->
<div class="mt-20 text-center">
  <h2 class="text-3xl font-bold text-cyan-400 mb-6">Trusted By</h2>
  <div class="flex flex-wrap justify-center gap-10">
    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" class="w-24 opacity-80 hover:opacity-100 transition" alt="Nike">
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Apple_logo_black.svg" class="w-16 opacity-80 hover:opacity-100 transition" alt="Apple">
    <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" class="w-24 opacity-80 hover:opacity-100 transition" alt="Microsoft">
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/02/Google_2015_logo.svg" class="w-28 opacity-80 hover:opacity-100 transition" alt="Google">
  </div>
</div>

<!-- AR Feature -->
<section class="mt-24 grid md:grid-cols-2 gap-16 items-center">
  <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl p-8 shadow-lg hover:scale-105 transition-all duration-500">
    <h2 class="text-3xl font-bold mb-4 text-blue-400">Immersive AR Experience</h2>
    <p class="text-gray-200 mb-6 leading-relaxed">
      Our proprietary AR technology lets users virtually try lenses in real time — accurate, fast, and app-free. 
      Customers can instantly preview eyewear and share their look with one tap.
    </p>
    <ul class="text-gray-300 space-y-3">
      <li>⚡ Real-time rendering with precision tracking</li>
      <li>📱 Mobile-first try-on experience</li>
      <li>🧠 AI-powered face adaptation</li>
      <li>🚀 Fast QR scan-to-try integration</li>
    </ul>
  </div>
  <div class="relative">
    <img src="{{ asset('images/img1.jpeg') }}" height="370" width="770"
         alt="AR Illustration" 
         class="rounded-3xl border border-cyan-400/30 shadow-lg hover:scale-105 transition-transform duration-700">
  </div>
</section>

<!-- Team Section -->
<section class="mt-32 text-center">
  <h2 class="text-4xl font-extrabold mb-6 bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text text-transparent">Meet the Team</h2>
  <p class="text-gray-300 mb-12">The creators behind VirtualLens — where vision meets innovation.</p>

  <div class="grid md:grid-cols-3 gap-10 justify-items-center">
    <div class="relative group w-72 h-96 rounded-3xl overflow-hidden bg-white/10 backdrop-blur-lg border border-white/20 shadow-lg hover:scale-105 transition-all duration-500">
      <img src="public/images/image.jpg" class="w-full h-full object-cover opacity-70 group-hover:opacity-90 transition" alt="Team Member">
      <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent flex flex-col justify-end p-6">
        <h3 class="text-xl font-bold text-cyan-300">Syed Hunain Ahmed</h3>
        <p class="text-gray-300 text-sm">Lead AR Engineer</p>
      </div>
    </div>

    <div class="relative group w-72 h-96 rounded-3xl overflow-hidden bg-white/10 backdrop-blur-lg border border-white/20 shadow-lg hover:scale-105 transition-all duration-500">
      <img src="https://images.unsplash.com/photo-1544725176-7c40e5a2c9f9" class="w-full h-full object-cover opacity-70 group-hover:opacity-90 transition" alt="Team Member">
      <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent flex flex-col justify-end p-6">
        <h3 class="text-xl font-bold text-blue-300">Muhammad Shoaib Akhtar</h3>
        <p class="text-gray-300 text-sm">Frontend  Designer</p>
      </div>
    </div>

    <div class="relative group w-72 h-96 rounded-3xl overflow-hidden bg-white/10 backdrop-blur-lg border border-white/20 shadow-lg hover:scale-105 transition-all duration-500">
      <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d" class="w-full h-full object-cover opacity-70 group-hover:opacity-90 transition" alt="Team Member">
      <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent flex flex-col justify-end p-6">
        <h3 class="text-xl font-bold text-purple-300">Muhammad Ahmed Raza</h3>
        <p class="text-gray-300 text-sm">AI/Computer Vision Specialist</p>
      </div>
    </div>
  </div>
</section>


  </main>
</body>
</html>
