<meta name="viewport" content="width=device-width, initial-scale=1.0">
@include('web.layouts.navbar')

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


<style>
  /* Only things Tailwind cannot express */
  .font-dm { font-family: 'Syne', sans-serif; }
  /* .font-dm now maps to Tailwind font-sans (same stack as contact page) */
  .font-dm   { font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; }

  @keyframes pulse-dot  { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.4;transform:scale(.65)} }
  @keyframes slide-bar  { 0%{left:-100%} 100%{left:100%} }
  @keyframes float-orb  { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-20px)} }

  .animate-pulse-dot  { animation: pulse-dot 2s ease-in-out infinite; }
  .animate-slide-bar  { animation: slide-bar 2.4s ease-in-out infinite; }
  .animate-float-orb  { animation: float-orb 8s ease-in-out infinite; }

  /* Grid texture overlay */
  .grid-texture::before {
    content:''; position:fixed; inset:0; pointer-events:none; z-index:0;
    background-image:
      linear-gradient(rgba(59,130,246,.08) 1px, transparent 1px),
      linear-gradient(90deg, rgba(59,130,246,.08) 1px, transparent 1px);
    background-size:60px 60px;
  }

  /* Gradient text */
  .gradient-text {
    background: linear-gradient(90deg,#1D7AE8,#0891B2);
    -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
  }
  .gradient-text-dark {
    background: linear-gradient(135deg,#1e3a5f 30%,#1D7AE8);
    -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
  }

  /* Reveal animation */
  .reveal { opacity:0; transform:translateY(28px); transition:opacity .8s ease, transform .8s ease; }
  .reveal.visible { opacity:1; transform:translateY(0); }
  .reveal-d1 { transition-delay:.1s; }
  .reveal-d2 { transition-delay:.2s; }
  .reveal-d3 { transition-delay:.35s; }

  /* Scroll indicator bar */
  .scroll-bar { position:relative; overflow:hidden; width:60px; height:1px; background:rgba(59,130,246,.2); }
  .scroll-bar::after {
    content:''; position:absolute; top:0; left:-100%; width:100%; height:100%;
    background:#1D7AE8;
    animation: slide-bar 2.4s ease-in-out infinite;
  }

  /* Top highlight line on stat cells */
  .stat-highlight::before {
    content:''; position:absolute; top:0; left:50%; transform:translateX(-50%);
    width:40%; height:2px;
    background:linear-gradient(90deg,transparent,#1D7AE8,transparent);
  }

  /* Team card glow top */
  .team-glow::after {
    content:''; position:absolute; inset:0; pointer-events:none;
    background:radial-gradient(ellipse at 50% 0%,rgba(29,122,232,.06),transparent 60%);
  }

  /* Avatar gradient ring */
  .avatar-ring {
    padding:2px; border-radius:9999px;
    background:linear-gradient(135deg,#1D7AE8,#0891B2);
  }

  /* Orb blur helpers */
  .orb { position:absolute; border-radius:9999px; filter:blur(80px); pointer-events:none; }
</style>

<div class="font-dm bg-gradient-to-b from-slate-100 via-slate-200 to-blue-100 text-gray-900 overflow-x-hidden grid-texture">

  {{-- ===== HERO ===== --}}
  <section class="relative min-h-screen flex items-center px-6 sm:px-[8vw] pt-32 sm:pt-40 pb-20 sm:pb-32 overflow-hidden">

    {{-- Orbs --}}
    <div class="orb w-72 sm:w-[600px] h-72 sm:h-[600px] bg-blue-300/30 -top-24 -right-24 animate-float-orb"></div>
    <div class="orb w-56 sm:w-[400px] h-56 sm:h-[400px] bg-cyan-300/20 bottom-0 left-[10%] sm:left-[20%]" style="filter:blur(100px)"></div>

    <div class="relative z-10 max-w-4xl">

      {{-- Eyebrow badge --}}
      <div class="inline-flex items-center gap-3 border border-blue-200 rounded-full px-4 py-1.5 mb-10 bg-blue-50 backdrop-blur-sm">
        <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse-dot"></span>
        <span class="font-dm text-[10px] font-semibold tracking-[.2em] uppercase text-blue-600">Eyewear Reimagined</span>
      </div>

      {{-- Headline --}}
      <h1 class="font-dm font-extrabold leading-none tracking-tight text-[clamp(3rem,7vw,6.5rem)] mb-8 text-gray-900">
        We Build the<br>
        <span class="gradient-text">Future of Vision</span>
      </h1>

      {{-- Sub --}}
      <p class="font-dm font-light text-lg leading-relaxed text-gray-500 max-w-lg mb-12">
        Vision Tech merges artificial intelligence, augmented reality, and modern optical
        technology — empowering retailers and elevating every customer's experience.
      </p>

      {{-- CTAs --}}
      <div class="flex flex-wrap items-center gap-5">
        <a href="/signup" class="inline-flex items-center gap-2.5 bg-blue-600 hover:bg-blue-500 transition-colors text-white font-medium text-sm px-7 py-3.5 rounded-lg">
          See Our Technology
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
        <a href="#team" class="inline-flex items-center gap-2 border border-gray-300 hover:border-blue-400 text-gray-600 hover:text-blue-600 transition text-sm px-7 py-3.5 rounded-lg">
          Meet the Team
        </a>
      </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 sm:bottom-12 left-6 sm:left-[8vw] flex items-center gap-3 z-10">
      <div class="scroll-bar"></div>
      <span class="text-[10px] tracking-[.15em] uppercase text-gray-400">Scroll to explore</span>
    </div>
  </section>


  {{-- ===== WHO WE ARE ===== --}}
  <section class="relative z-10 px-6 sm:px-[8vw] py-20 sm:py-32 reveal">
    <div class="grid md:grid-cols-2 gap-12 sm:gap-20 items-center">

      <div>
        <span class="block font-dm text-[10px] font-semibold tracking-[.2em] uppercase text-blue-600 mb-5">Who We Are</span>
        <h2 class="font-dm font-bold leading-tight tracking-tight text-[clamp(2rem,4vw,3.25rem)] mb-6 text-gray-900">
          Optical Intelligence<br>at Scale
        </h2>
        <p class="font-dm font-light text-base leading-[1.9] text-gray-500 mb-4">
          At <span class="font-medium text-blue-600">Vision Tech</span>, we create cutting-edge eyewear solutions
          at the intersection of precision engineering and elegant user experience.
        </p>
        <p class="font-dm font-light text-base leading-[1.9] text-gray-500">
          We partner with optical retailers to deploy AI-powered try-on systems that reduce returns,
          increase conversions, and build lasting customer confidence.
        </p>
      </div>

      <div class="relative">
        <img src="{{ asset('images/aboutus1.jpg') }}" alt="Vision Tech team"
             class="w-full aspect-[4/3] object-cover rounded-2xl">
        <div class="absolute -bottom-4 sm:-bottom-6 -right-2 sm:-right-6 bg-slate-100 border border-blue-100 rounded-xl px-4 sm:px-6 py-3 sm:py-5 shadow-lg backdrop-blur-xl">
          <p class="font-dm font-extrabold text-3xl text-blue-600">98%</p>
          <p class="font-dm text-xs text-gray-400 mt-1">Placement accuracy</p>
        </div>
      </div>
    </div>
  </section>


  {{-- ===== MISSION ===== --}}
  <section class="relative z-10 px-6 sm:px-[8vw] py-20 sm:py-32 bg-slate-100/80 reveal">
    <div class="grid md:grid-cols-2 gap-12 sm:gap-20 items-center">

      <img src="{{ asset('images/aboutus2.jpg') }}" alt="AR Try-On"
           class="w-full aspect-[4/3] object-cover rounded-2xl">

      <div>
        <span class="block font-dm text-[10px] font-semibold tracking-[.2em] uppercase text-blue-600 mb-5">Our Mission</span>
        <h2 class="font-dm font-bold leading-tight tracking-tight text-[clamp(2rem,4vw,3.25rem)] mb-6 text-gray-900">
          Transform How the<br>World Sees Lenses
        </h2>
        <p class="font-dm font-light text-base leading-[1.9] text-gray-500">
          We exist to make choosing contact lenses as intuitive and confidence-inspiring as
          trying them in-store — from anywhere, on any device, in real time.
        </p>
        <div class="inline-flex items-center gap-2.5 mt-7 px-5 py-2.5 rounded-full border border-blue-200 bg-blue-50 text-blue-600 text-sm">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
          AR try-on in under 3 seconds
        </div>
      </div>
    </div>
  </section>


  {{-- ===== STORY ===== --}}
  <section class="relative z-10 px-6 sm:px-[8vw] py-20 sm:py-32 reveal">
    <div class="grid md:grid-cols-2 gap-12 sm:gap-20 items-start">

      <div>
        <span class="block font-dm text-[10px] font-semibold tracking-[.2em] uppercase text-blue-600 mb-5">Our Story</span>
        <h2 class="font-dm font-bold leading-tight tracking-tight text-[clamp(2rem,4vw,3.25rem)] mb-14 text-gray-900">
          From University Lab<br>to SaaS Platform
        </h2>

        {{-- Timeline --}}
        <div class="relative pl-10 border-l"
             style="border-image:linear-gradient(to bottom,#1D7AE8,#0891B2,transparent) 1">
          @foreach([
            ['2025','The Spark','A final-year university project exploring AR and computer vision for optical retail. The idea clicked.'],
            ['2025','Implementations','learn AI & AR, starts implementation. Contact with real users, real feedback, rapid iteration.'],
            ['2026','Platform Launch','Launched the full SaaS platform with AI eye tracking, real-time rendering, and a retailer dashboard.'],
            ['Now','Scaling Up','Ready for the market, Multiple try-ons, and a growing team pushing the frontier.'],
          ] as [$year,$title,$body])
          <div class="relative mb-10 last:mb-0">
            <span class="absolute -left-[2.65rem] top-1.5 w-2.5 h-2.5 rounded-full bg-blue-500 border-2 border-white ring-4 ring-blue-200"></span>
            <p class="font-dm text-[10px] font-semibold tracking-[.15em] uppercase text-blue-600 mb-1">{{ $year }}</p>
            <h3 class="font-dm font-bold text-lg mb-1.5 text-gray-800">{{ $title }}</h3>
            <p class="font-dm font-light text-sm leading-relaxed text-gray-500">{{ $body }}</p>
          </div>
          @endforeach
        </div>
      </div>

      <img src="{{ asset('images/aboutus3.jpg') }}" alt="Our story"
           class="w-full aspect-[4/3] md:aspect-[3/4] object-cover rounded-2xl block">
    </div>
  </section>


  {{-- ===== TECHNOLOGY ===== --}}
  <section class="relative z-10 px-6 sm:px-[8vw] py-20 sm:py-32 bg-slate-100/80 reveal">

    <div class="text-center mb-12 sm:mb-16">
      <span class="block font-dm text-[10px] font-semibold tracking-[.2em] uppercase text-blue-600 mb-4">Core Technology</span>
      <h2 class="font-dm font-bold leading-tight tracking-tight text-[clamp(2rem,4vw,3.25rem)] text-gray-900">
        Powered by Advanced Intelligence
      </h2>
      <p class="font-dm font-light text-gray-500 mt-4 text-base max-w-xl mx-auto">
        Three breakthroughs working in concert to deliver the most realistic contact lens try-on ever built.
      </p>
    </div>

    <div class="grid sm:grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-gray-100 border border-gray-100 rounded-2xl overflow-hidden shadow-sm">
      @foreach([
        ['ai','#1D7AE8','AI Eye Tracking','Sub-millimeter precision facial landmark detection that adapts to every eye shape, gaze angle, and lighting condition in real time.','MediaPipe · TensorFlow'],
        ['ar','#0891B2','Real-Time AR','60fps live camera try-on with zero perceptible lag. Works in ambient, daylight, and artificial lighting — no special hardware required.','WebGL · WebRTC'],
        ['cv','#2563EB','Computer Vision','Photorealistic lens rendering that accurately simulates color, light transmission, and iris blending for any contact lens SKU.','OpenCV · GLSL Shaders'],
      ] as [$type,$color,$title,$desc,$stack])
      <div class="bg-white hover:bg-blue-50/60 transition-colors p-8 sm:p-10 flex flex-col gap-6">
        <div class="w-12 h-12 rounded-xl flex items-center justify-center bg-blue-50">
          @if($type==='ai')
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="{{ $color }}" stroke-width="1.5"><circle cx="12" cy="12" r="3"/><circle cx="12" cy="12" r="8"/><path d="M12 4v2M12 18v2M4 12H2M22 12h-2"/></svg>
          @elseif($type==='ar')
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="{{ $color }}" stroke-width="1.5"><path d="M2 12l10-9 10 9"/><rect x="6" y="12" width="12" height="9" rx="1"/></svg>
          @else
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="{{ $color }}" stroke-width="1.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          @endif
        </div>
        <div>
          <h3 class="font-dm font-bold text-lg mb-2 text-gray-900">{{ $title }}</h3>
          <p class="font-dm font-light text-sm leading-relaxed text-gray-500">{{ $desc }}</p>
        </div>
        <span class="mt-auto inline-block font-dm text-[10px] tracking-widest uppercase border border-blue-100 text-blue-500 rounded-full px-3 py-1 self-start bg-blue-50">{{ $stack }}</span>
      </div>
      @endforeach
    </div>
  </section>


  {{-- ===== STATS ===== --}}
  <section class="relative z-10 px-6 sm:px-[8vw] py-20 sm:py-32 overflow-hidden reveal">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50/80 to-slate-50/80 pointer-events-none"></div>

    <div class="relative z-10 text-center mb-10 sm:mb-14">
      <span class="block font-dm text-[10px] font-semibold tracking-[.2em] uppercase text-blue-600 mb-4">Traction</span>
      <h2 class="font-dm font-bold text-[clamp(1.5rem,3vw,2.25rem)] tracking-tight text-gray-900">Growing Every Month</h2>
      <div class="w-14 h-px mx-auto mt-5" style="background:linear-gradient(90deg,transparent,#1D7AE8,transparent)"></div>
    </div>

    <div class="relative z-10 grid sm:grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x border border-gray-200 rounded-2xl overflow-hidden divide-gray-200 shadow-sm bg-slate-50">
      @foreach([
        ['counter','10','Partner Stores','Across the region'],
        ['counter','5000','Total Try-Ons','And growing daily'],
        ['','100%','Client Satisfaction','Verified by partners'],
      ] as [$cls,$val,$label,$sub])
      <div class="stat-highlight relative text-center px-6 sm:px-10 py-12 sm:py-16">
        <p class="font-dm font-extrabold text-[3.5rem] leading-none gradient-text-dark mb-3 {{ $cls }}" @if($cls==='counter') data-target="{{ $val }}" @endif>
          {{ $cls==='counter' ? '0' : $val }}
        </p>
        <p class="font-dm text-sm tracking-wide text-gray-400 uppercase">{{ $label }}</p>
        <p class="font-dm text-xs text-blue-500 mt-1.5">{{ $sub }}</p>
      </div>
      @endforeach
    </div>
  </section>


  {{-- ===== TEAM ===== --}}
  <section class="relative z-10 px-6 sm:px-[8vw] py-20 sm:py-32 bg-slate-100/80 reveal" id="team">

    <div class="text-center mb-12 sm:mb-16">
      <span class="block font-dm text-[10px] font-semibold tracking-[.2em] uppercase text-blue-600 mb-4">The People</span>
      <h2 class="font-dm font-bold leading-tight tracking-tight text-[clamp(2rem,4vw,3.25rem)] text-gray-900">Meet the Team</h2>
      <p class="font-dm font-light text-gray-500 mt-4 text-base">Small, focused, and obsessively detail-oriented.</p>
    </div>

    <div class="grid sm:grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-gray-100 border border-gray-100 rounded-2xl overflow-hidden shadow-sm">
      @foreach([
        ['hunain.png','Hunain','Co-Founder & CEO','Visionary behind Vision Tech. Obsessed with bridging emerging tech and real-world retail problems.','in','tw','reveal-d1'],
        ['shoaib.png','Shoaib','Lead Engineer','Architects the AI and AR pipelines. Believes in shipping working software, not polished demos.','gh','in','reveal-d2'],
        ['pic3.png','Designer','Product Designer','Crafts every interaction from the lens selector to the retailer dashboard with precision and empathy.','be','in','reveal-d3'],
      ] as [$img,$name,$role,$bio,$s1,$s2,$delay])
      <div class="team-glow relative bg-slate-50 hover:bg-blue-50/50 transition-colors duration-300 flex flex-col items-center text-center px-8 py-12 reveal {{ $delay }}">
        <div class="avatar-ring mb-6 flex-shrink-0">
          <img src="{{ asset('images/'.$img) }}" alt="{{ $name }}"
               class="w-28 h-28 rounded-full object-cover block">
        </div>
        <h3 class="font-dm font-bold text-xl mb-1 text-gray-900">{{ $name }}</h3>
        <p class="font-dm text-[10px] font-medium tracking-[.12em] uppercase text-blue-600 mb-4">{{ $role }}</p>
        <p class="font-dm font-light text-sm leading-relaxed text-gray-500">{{ $bio }}</p>
      </div>
      @endforeach
    </div>
  </section>


  {{-- ===== CTA STRIP ===== --}}
  <section class="relative z-10 px-6 sm:px-[8vw] py-20 sm:py-28 text-center overflow-hidden reveal">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-indigo-600 pointer-events-none"></div>
    <div class="orb w-72 sm:w-[500px] h-72 sm:h-[500px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white/10" style="filter:blur(100px)"></div>

    <div class="relative z-10">
      <span class="block font-dm text-[10px] font-semibold tracking-[.2em] uppercase text-blue-200 mb-4">Get Started</span>
      <h2 class="font-dm font-bold leading-tight tracking-tight text-[clamp(1.5rem,3vw,2.5rem)] mb-3 text-white">
        Ready to transform your store?
      </h2>
      <div class="w-14 h-px mx-auto my-5 bg-white/30"></div>
      <p class="font-dm font-light text-white/75 mb-10 text-base">Join the retailers already using Vision Tech to sell smarter.</p>
      <div class="flex flex-wrap gap-4 justify-center">
        <a href="#" class="inline-flex items-center gap-2.5 bg-white hover:bg-blue-50 transition-colors text-blue-700 font-medium text-sm px-8 py-3.5 rounded-lg shadow-lg">
          Contact Sales
           <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
        <a href="/price" class="inline-flex items-center gap-2 border border-white/40 hover:border-white text-white/80 hover:text-white transition text-sm px-8 py-3.5 rounded-lg">
          View Pricing
        </a>
      </div>
    </div>
  </section>

</div>{{-- end .font-dm --}}


<script>
/* Scroll reveal */
const obs = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

/* Counters — trigger on scroll */
function runCounter(el) {
  const target = +el.dataset.target;
  const dur = 1800, step = 16;
  const inc = target / (dur / step);
  let cur = 0;
  const t = setInterval(() => {
    cur += inc;
    if (cur >= target) { clearInterval(t); el.textContent = target.toLocaleString() + '+'; }
    else { el.textContent = Math.floor(cur).toLocaleString(); }
  }, step);
}
const cObs = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { runCounter(e.target); cObs.unobserve(e.target); } });
}, { threshold: 0.5 });
document.querySelectorAll('.counter').forEach(c => cObs.observe(c));
</script>

@include('web.layouts.footer')