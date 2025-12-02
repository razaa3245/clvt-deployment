@include('web.layouts.navbar')

<main class="relative z-10 max-w-screen-2xl mx-auto px-10 py-24 bg-gradient-to-b from-white via-slate-50 to-cyan-50 text-slate-800 font-sans min-h-screen">

  <!-- Hero / Intro -->
  <section class="text-center mb-28">
    <h1 class="text-6xl md:text-7xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-700 via-cyan-600 to-indigo-700">
      About Vision Tech
    </h1>
    <p class="mt-6 max-w-3xl mx-auto text-lg text-slate-600 leading-relaxed">
      We are redefining the future of eyewear by merging artificial intelligence, augmented reality, 
      and modern optical technology empowering retailers and elevating the customer experience.
    </p>
  </section>

  <!-- Section 1: Who We Are -->
  <section class="grid md:grid-cols-2 gap-16 items-center mb-28">
    <div>
      <h2 class="text-4xl font-bold text-slate-900 mb-4">Who We Are</h2>
      <p class="text-slate-600 leading-relaxed mb-4">
        At <span class="font-semibold text-cyan-700">Vision Tech</span>, we create cutting-edge eyewear solutions 
        that let customers virtually try contact lenses and glasses anytime, anywhere.
      </p>
      <p class="text-slate-500">
        Our goal is simple: blend AI-powered precision with elegant user experiences to help 
        optical retailers grow smarter and serve better.
      </p>
    </div>

    <div class="relative">
      <img src="{{ asset('images/aboutus1.jpg') }}" 
           class="rounded-3xl shadow-xl border border-slate-200 hover:scale-105 hover:shadow-cyan-300 transition-all duration-700"
           alt="Our Team">
      
    </div>
  </section>

  <!-- Mission -->
  <section class="grid md:grid-cols-2 gap-16 items-center mb-28">
    <div class="order-2 md:order-1">
      <img src="{{ asset('images/aboutus2.jpg') }}" 
           class="rounded-3xl shadow-xl border border-slate-200 hover:scale-105 hover:shadow-blue-300 transition-all duration-700"
           alt="Mission">
    </div>

    <div class="order-1 md:order-2">
      <h2 class="text-4xl font-bold text-slate-900 mb-4">Our Mission</h2>
      <p class="text-slate-600 leading-relaxed mb-4">
        We aim to transform how people explore and select contact lenses through immersive virtual try-on technology, 
        making the process more personalized, simple, and enjoyable.
      </p>
      <p class="text-slate-500">
        By empowering retailers with smarter tools, we help build trust, clarity, and confidence in every customer journey.
      </p>
    </div>
  </section>

  <!-- Story -->
  <section class="grid md:grid-cols-2 gap-16 items-center mb-28">
    <div>
      <h2 class="text-4xl font-bold text-slate-900 mb-4">Our Story</h2>
      <p class="text-slate-600 leading-relaxed mb-4">
        Vision Tech began as a university concept — a small idea to connect modern optical needs 
        with next-generation AR and AI technology.
      </p>
      <p class="text-slate-500 mb-4">
        What started as an academic project quickly evolved into a full-featured virtual try-on 
        platform used by retailers seeking modern, engaging customer experiences.
      </p>
      <p class="text-slate-500">
        Today, we continue to push boundaries with innovation, computer vision, and intuitive design.
      </p>
    </div>

    <div>
      <img src="{{ asset('images/aboutus3.jpg') }}"
           class="rounded-3xl shadow-xl border border-slate-200 hover:scale-105 hover:shadow-indigo-300 transition-all duration-700"
           alt="Our Story">
    </div>
  </section>

  <!-- Stats -->
  <section class="bg-white border border-slate-200 rounded-3xl shadow-xl p-14 mb-28 text-center hover:shadow-cyan-200 transition-all duration-500">
    <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-700 mb-10">
      Vision Tech in Numbers
    </h2>

    <div class="grid md:grid-cols-3 gap-14">
      <div class="p-6">
        <h3 class="text-5xl font-bold text-blue-700">10+</h3>
        <p class="text-slate-600 mt-3">Partner Optical Stores</p>
      </div>
      <div class="p-6">
        <h3 class="text-5xl font-bold text-cyan-700">5,000+</h3>
        <p class="text-slate-600 mt-3">Virtual Try-Ons Completed</p>
      </div>
      <div class="p-6">
        <h3 class="text-5xl font-bold text-indigo-700">100%</h3>
        <p class="text-slate-600 mt-3">Client Satisfaction Rate</p>
      </div>
    </div>
  </section>

  <!-- Trusted By -->
  <section class="flex justify-center">
    <div class="bg-white border border-slate-200 rounded-3xl p-14 shadow-xl w-full md:w-4/5 lg:w-2/3 text-center hover:shadow-cyan-200 transition-all duration-500">
      <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-700 mb-10">
        Trusted By Leading Brands
      </h2>

      <div class="flex flex-wrap justify-center gap-12">
        <img src="{{ asset('images/company2.png') }}" class="w-24 opacity-60 hover:opacity-100 transition-all" alt="Brand 1">
        <img src="{{ asset('images/company3.jpg') }}" class="w-20 opacity-60 hover:opacity-100 transition-all" alt="Brand 2">
        <img src="{{ asset('images/company4.jpg') }}" class="w-24 opacity-60 hover:opacity-100 transition-all" alt="Brand 3">
        <img src="{{ asset('images/company4.png') }}" class="w-28 opacity-60 hover:opacity-100 transition-all" alt="Brand 4">
      </div>
    </div>
  </section>

</main>

@include('web.layouts.footer')
