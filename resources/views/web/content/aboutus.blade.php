@include('web.layouts.navbar')

<main class="relative z-10 max-w-7xl mx-auto px-6 py-20 bg-gradient-to-br from-white via-slate-50 to-cyan-50 text-slate-800 font-sans min-h-screen overflow-x-hidden">

  <!-- About Us Intro -->
  <section class="grid md:grid-cols-2 gap-16 items-center mb-24">
    <div>
      <h1 class="text-5xl md:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-700 via-gray-700 to-gray-900 mb-6">
        About Us
      </h1>
      <p class="text-lg text-slate-600 leading-relaxed mb-6">
        At <span class="font-semibold text-cyan-700">Vision tech</span>, we’re redefining the eyewear experience through innovation, technology, and vision. 
        Our platform merges AI and AR to empower optical retailers and enhance how people explore, try, and choose eyewear.
      </p>
      <p class="text-slate-500">
        We believe in blending craftsmanship with digital intelligence — not coding products, but crafting experiences.
      </p>
    </div>
    <div class="relative">
      <img src="{{ asset('images/team1.jpg') }}" alt="Our Team" 
           class="rounded-3xl border border-slate-200 shadow-lg hover:shadow-cyan-300 hover:scale-105 transition-transform duration-700">
    </div>
  </section>

  <!-- Our Mission -->
  <section class="grid md:grid-cols-2 gap-16 items-center mb-24">
    <div class="order-2 md:order-1">
      <img src="{{ asset('images/mission.jpg') }}" alt="Mission Image" 
           class="rounded-3xl border border-slate-200 shadow-lg hover:shadow-blue-300 hover:scale-105 transition-transform duration-700">
    </div>
    <div class="order-1 md:order-2">
      <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 via-blue-700 to-indigo-700 mb-4">
        Our Mission: Helping Vision Grow Smarter
      </h2>
      <p class="text-slate-600 leading-relaxed">
        We aim to revolutionize how people experience eyewear. By empowering optical retailers with AI and AR solutions, 
        we help them provide customers with personalized, seamless, and engaging try-on experiences.
      </p>
      <p class="text-slate-500 mt-4">
        When technology meets vision, we create not just clarity — but confidence.
      </p>
    </div>
  </section>

  <!-- Our Story -->
  <section class="grid md:grid-cols-2 gap-16 items-center mb-24">
    <div>
      <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-700 via-gray-700 to-cyan-800 mb-4">
        Our Story
      </h2>
      <p class="text-slate-600 leading-relaxed">
        Founded by a passionate team of innovators and vision enthusiasts, Vision tech began with a mission: 
        to merge modern optical needs with next-generation technology.
      </p>
      <p class="text-slate-500 mt-4">
        What started as a small idea in a university project evolved into a powerful platform 
        enabling optical shops to connect, visualize, and customize eyewear experiences 
        with advanced augmented reality.
      </p>
      <p class="text-slate-500 mt-4">
        Today, Vision Tech continues to push boundaries — combining human creativity, computer vision, and seamless retail experience.
      </p>
    </div>
    <div>
      <img src="{{ asset('images/story.jpg') }}" alt="Our Story" 
           class="rounded-3xl border border-slate-200 shadow-lg hover:shadow-indigo-300 hover:scale-105 transition-transform duration-700">
    </div>
  </section>

  <!-- By the Numbers -->
  <section class="bg-white border border-slate-200 rounded-3xl shadow-md p-10 mb-24 text-center hover:shadow-cyan-200 hover:-translate-y-2 transition-all duration-500">
    <h2 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-700 mb-8">
      Vision Tech By the Numbers
    </h2>
    <div class="grid md:grid-cols-3 gap-10">
      <div>
        <h3 class="text-4xl font-bold text-blue-700">10+</h3>
        <p class="text-slate-600 mt-2">Partner Optical Shops</p>
      </div>
      <div>
        <h3 class="text-4xl font-bold text-cyan-700">5,000+</h3>
        <p class="text-slate-600 mt-2">Virtual Try-Ons</p>
      </div>
      <div>
        <h3 class="text-4xl font-bold text-indigo-700">100%</h3>
        <p class="text-slate-600 mt-2">Client Satisfaction</p>
      </div>
    </div>
  </section>

  <!-- Trusted By -->
  <section class="mt-24 flex justify-center">
    <div class="text-center bg-white border border-slate-200 rounded-3xl p-10 shadow-md hover:shadow-cyan-200 hover:-translate-y-2 transition-all duration-500 w-full md:w-3/4 lg:w-2/3">
      <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-700 mb-6">Trusted By</h2>
      <div class="flex flex-wrap justify-center gap-10">
        <img src="{{ asset('images/company2.png') }}" class="w-24 opacity-70 hover:opacity-100 transition" alt="Nike">
        <img src="{{ asset('images/company3.jpg') }}" class="w-16 opacity-70 hover:opacity-100 transition" alt="Apple">
        <img src="{{ asset('images/company4.jpg') }}" class="w-24 opacity-70 hover:opacity-100 transition" alt="Microsoft">
        <img src="{{ asset('images/company4.png') }}" class="w-28 opacity-70 hover:opacity-100 transition" alt="Google">
      </div>
    </div>
  </section>

</main>

@include('web.layouts.footer')
