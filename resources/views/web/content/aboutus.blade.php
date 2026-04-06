@include('web.layouts.navbar')

<main class="relative z-10 max-w-screen-2xl mx-auto px-6 md:px-12 py-24 
bg-gradient-to-b from-white via-slate-50 to-blue-100 
text-slate-800 font-sans min-h-screen overflow-hidden">

  <!-- Particles -->
  <div id="particles" class="absolute inset-0 pointer-events-none"></div>

  <!-- Hero -->
  <section class="text-center mb-32 reveal">
    <h1 class="text-6xl md:text-7xl font-extrabold tracking-tight 
    text-transparent bg-clip-text bg-gradient-to-r from-blue-700 via-cyan-600 to-indigo-700">
      About Vision Tech
    </h1>

    <p class="mt-6 max-w-3xl mx-auto text-lg text-slate-600 leading-relaxed">
      We are redefining the future of eyewear by merging artificial intelligence, augmented reality, 
      and modern optical technology empowering retailers and elevating the customer experience.
    </p>
  </section>

  <!-- Who We Are -->
  <section class="grid md:grid-cols-2 gap-16 items-center mb-32 reveal">
    <div>
      <h2 class="text-4xl font-bold mb-4">Who We Are</h2>
      <p class="text-slate-600 mb-4">
        At <span class="font-semibold text-cyan-700">Vision Tech</span>, we create cutting-edge eyewear solutions.
      </p>
      <p class="text-slate-500">
        We blend AI precision with elegant UX to help retailers grow smarter.
      </p>
    </div>

    <img src="{{ asset('images/aboutus1.jpg') }}" 
         class="rounded-3xl shadow-xl transform transition duration-500 hover:scale-105 hover:-translate-y-2 hover:shadow-2xl">
  </section>

  <!-- Mission -->
  <section class="grid md:grid-cols-2 gap-16 items-center mb-32 reveal bg-white/70 backdrop-blur-sm p-10 rounded-3xl shadow-lg">
    <div class="order-2 md:order-1">
      <img src="{{ asset('images/aboutus2.jpg') }}" 
           class="rounded-3xl shadow-xl transform transition duration-500 hover:scale-105 hover:-translate-y-2 hover:shadow-2xl">
    </div>

    <div class="order-1 md:order-2">
      <h2 class="text-4xl font-bold mb-4">Our Mission</h2>
      <p class="text-slate-600">
        Transform how people explore contact lenses through immersive AR try-on technology.
      </p>
    </div>
  </section>

  <!-- Story -->
  <section class="grid md:grid-cols-2 gap-16 items-center mb-32 reveal">
    <div>
      <h2 class="text-4xl font-bold mb-4">Our Story</h2>
      <p class="text-slate-600">
        Started as a university idea and evolved into a full SaaS platform.
      </p>
    </div>

    <img src="{{ asset('images/aboutus3.jpg') }}"
         class="rounded-3xl shadow-xl transform transition duration-500 hover:scale-105 hover:-translate-y-2 hover:shadow-2xl">
  </section>

  <!-- ================= GEN-Z SECTION ================= -->
  <section class="mb-32">

    <!-- TECHNOLOGY -->
    <div class="text-center mb-20 reveal">
      <h2 class="text-4xl font-extrabold mb-12 
      bg-gradient-to-r from-blue-600 via-cyan-500 to-indigo-600 text-transparent bg-clip-text">
        Powered by Advanced Technology
      </h2>

      <div class="grid md:grid-cols-3 gap-10">
        <div class="group p-[1px] rounded-3xl bg-gradient-to-r from-blue-500 via-cyan-500 to-indigo-500">
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 transition group-hover:scale-105">
            <h3 class="text-xl font-bold text-blue-600 mb-3">AI Eye Tracking</h3>
            <p class="text-slate-600">Accurate lens placement.</p>
          </div>
        </div>

        <div class="group p-[1px] rounded-3xl bg-gradient-to-r from-cyan-500 to-indigo-500">
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 transition group-hover:scale-105">
            <h3 class="text-xl font-bold text-cyan-600 mb-3">Real-Time AR</h3>
            <p class="text-slate-600">Live camera try-on.</p>
          </div>
        </div>

        <div class="group p-[1px] rounded-3xl bg-gradient-to-r from-indigo-500 to-blue-500">
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 transition group-hover:scale-105">
            <h3 class="text-xl font-bold text-indigo-600 mb-3">Computer Vision</h3>
            <p class="text-slate-600">Realistic rendering.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- STATS -->
    <div class="grid md:grid-cols-3 gap-10 mb-24 text-center reveal">
      <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-10 rounded-3xl shadow-xl">
        <h3 class="text-5xl font-extrabold counter" data-target="10">0</h3>
        <p class="mt-3">Partner Stores</p>
      </div>

      <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 text-white p-10 rounded-3xl shadow-xl">
        <h3 class="text-5xl font-extrabold counter" data-target="5000">0</h3>
        <p class="mt-3">Try-Ons</p>
      </div>

      <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 text-white p-10 rounded-3xl shadow-xl">
        <h3 class="text-5xl font-extrabold">100%</h3>
        <p class="mt-3">Satisfaction</p>
      </div>
    </div>

    <!-- TEAM -->
    <div class="text-center reveal">
      <h2 class="text-4xl font-extrabold mb-16">Meet the Team</h2>

      <div class="grid md:grid-cols-3 gap-12">

        <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition">
          <img src="{{ asset('images/hunain.png') }}" 
               class="w-32 h-32 mx-auto rounded-full mb-4 transition group-hover:scale-110">
          <h3 class="font-bold">Founder</h3>
        </div>

        <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition">
          <img src="{{ asset('images/shoaib.png') }}" 
               class="w-32 h-32 mx-auto rounded-full mb-4 transition group-hover:scale-110">
          <h3 class="font-bold">Developer</h3>
        </div>

        <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition">
          <img src="{{ asset('images/pic3.png') }}" 
               class="w-32 h-32 mx-auto rounded-full mb-4 transition group-hover:scale-110">
          <h3 class="font-bold">Designer</h3>
        </div>

      </div>
    </div>

  </section>

</main>

<!-- JS (ONLY ONCE) -->
<script>
/* Reveal */
const reveals = document.querySelectorAll(".reveal");
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add("opacity-100","translate-y-0");
    }
  });
});
reveals.forEach(el => {
  el.classList.add("opacity-0","translate-y-10","transition","duration-700");
  observer.observe(el);
});

/* Particles */
const container = document.getElementById("particles");
for (let i = 0; i < 30; i++) {
  let dot = document.createElement("div");
  dot.className = "absolute w-2 h-2 bg-blue-500/50 rounded-full";
  dot.style.left = Math.random() * 100 + "%";
  dot.style.animation = `float ${5 + Math.random()*5}s linear infinite`;
  container.appendChild(dot);
}

/* Counter */
document.querySelectorAll(".counter").forEach(counter => {
  let update = () => {
    let target = +counter.dataset.target;
    let count = +counter.innerText;
    let inc = target / 100;
    if (count < target) {
      counter.innerText = Math.ceil(count + inc);
      setTimeout(update, 20);
    } else {
      counter.innerText = target + "+";
    }
  };
  update();
});
</script>

<style>
@keyframes float {
  0% { transform: translateY(100vh); opacity:0.3; }
  50% { opacity:1; }
  100% { transform: translateY(-10vh); opacity:0.2; }
}
</style>

@include('web.layouts.footer')