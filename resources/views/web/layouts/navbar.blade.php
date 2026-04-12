@vite('resources/css/app.css')

<header id="navbar" class="fixed top-0 left-0 w-full z-50 px-4 transition-all duration-500">
  <div id="navContainer"
       class="max-w-7xl mx-auto flex items-center justify-between flex-wrap
              rounded-2xl px-6 py-3 mt-4
              bg-white/80 backdrop-blur-xl backdrop-saturate-150
              border border-white/60
              shadow-[0_4px_20px_rgba(0,0,0,0.08)]
              transition-all duration-500 relative overflow-hidden">

    <!-- Dynamic glow layer -->
    <div id="navGlow"
         class="absolute inset-0 opacity-0 pointer-events-none
                bg-gradient-to-r from-blue-400/20 via-cyan-300/20 to-purple-400/20 blur-2xl transition-opacity duration-500">
    </div>

    <!-- Logo -->
    <div class="flex items-center gap-3 relative z-10">
      <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif"
           class="w-9 h-9 rounded-xl shadow-lg" />
      
      <a href="{{ route('home') }}"
         class="text-2xl font-extrabold tracking-tight
                bg-gradient-to-r from-blue-600 to-cyan-500
                bg-clip-text text-transparent">
        LensPilot
      </a>
    </div>

    <!-- Hamburger -->
    <button id="nav-toggle"
            class="md:hidden p-2 rounded-lg
                   bg-gray-100
                   border border-gray-200
                   text-gray-700 hover:text-gray-900
                   hover:bg-gray-200 transition relative z-10">
      <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>

    <!-- Desktop Nav -->
    <nav class="hidden md:flex flex-1 justify-center items-center gap-10 text-sm relative z-10">

      <a href="{{ route('home') }}" class="nav-link">Home</a>
      <a href="{{ url('price2') }}" class="nav-link">Pricing</a>
      <a href="{{ url('contact') }}" class="nav-link">Contact</a>
      <a href="{{ url('aboutus') }}" class="nav-link">About</a>
      <a href="{{ url('signup') }}" class="nav-link">Login</a>

      <a href="{{ url('signup') }}"
         class="px-4 py-2 rounded-full
                bg-gradient-to-r from-blue-500 to-cyan-400
                text-white font-semibold
                shadow-lg shadow-cyan-500/30
                hover:scale-105 hover:shadow-cyan-400/50 transition">
        Get Started
      </a>
    </nav>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu"
       class="hidden mt-3 mx-4 p-4 space-y-3
              bg-white/95 backdrop-blur-2xl backdrop-saturate-200
              border border-gray-200 rounded-2xl shadow-xl">

    <a href="{{ route('home') }}" class="block text-gray-700 hover:text-blue-600 transition font-medium">Home</a>
    <a href="{{ url('price') }}" class="block text-gray-700 hover:text-blue-600 transition font-medium">Pricing</a>
    <a href="{{ url('contact') }}" class="block text-gray-700 hover:text-blue-600 transition font-medium">Contact</a>
    <a href="{{ url('aboutus') }}" class="block text-gray-700 hover:text-blue-600 transition font-medium">About</a>
    <a href="{{ url('signup') }}" class="block text-gray-700 hover:text-blue-600 transition font-medium">Login</a>

    <a href="{{ url('signup') }}"
       class="block text-center py-2 rounded-full
              bg-gradient-to-r from-blue-500 to-cyan-400 text-white font-semibold">
      Get Started
    </a>
  </div>

  <!-- Script -->
  <script>
    const navbar    = document.getElementById('navbar');
    const navContainer = document.getElementById('navContainer');
    const navGlow   = document.getElementById('navGlow');
    const toggle    = document.getElementById('nav-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    // Mobile toggle
    toggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });

    // Detect if the page has a dark hero behind the navbar
    // A page is "dark-hero" when its first section has a dark background
    const firstSection = document.querySelector('body > *:not(header), main > section:first-child, .hero, [data-dark-hero]');
    const pageHasDarkHero = firstSection && (
      getComputedStyle(firstSection).backgroundColor.includes('rgb(0') ||
      firstSection.classList.toString().includes('from-blue-6') ||
      firstSection.classList.toString().includes('from-slate-9') ||
      firstSection.dataset?.darkHero === 'true'
    );

    // Apply correct initial link colors
    function setNavTheme(isDark) {
      document.querySelectorAll('.nav-link').forEach(el => {
        if (isDark) {
          el.classList.remove('text-gray-700', 'hover:text-gray-900');
          el.classList.add('text-white/80', 'hover:text-white');
          // underline accent
          el.classList.add('after:bg-gradient-to-r','after:from-blue-400','after:to-cyan-300');
        } else {
          el.classList.remove('text-white/80', 'hover:text-white');
          el.classList.add('text-gray-700', 'hover:text-gray-900');
          el.classList.add('after:bg-gradient-to-r','after:from-blue-600','after:to-cyan-500');
        }
      });

      // hamburger icon
      if (isDark) {
        toggle.classList.remove('bg-gray-100','border-gray-200','text-gray-700');
        toggle.classList.add('bg-white/10','border-white/20','text-white/80');
      } else {
        toggle.classList.remove('bg-white/10','border-white/20','text-white/80');
        toggle.classList.add('bg-gray-100','border-gray-200','text-gray-700');
      }
    }

    // Nav link base styles
    document.querySelectorAll('.nav-link').forEach(el => {
      el.classList.add(
        "relative","transition",
        "after:content-['']","after:absolute","after:left-0","after:-bottom-1",
        "after:w-0","after:h-[2px]",
        "after:transition-all","hover:after:w-full"
      );
    });

    // Scroll handler
    window.addEventListener('scroll', () => {
      const scrolled = window.scrollY > 50;

      if (scrolled) {
        // Scrolled: dark glass navbar
        navContainer.classList.remove('bg-white/80','border-white/60','shadow-[0_4px_20px_rgba(0,0,0,0.08)]');
        navContainer.classList.add('bg-white/15','backdrop-blur-2xl','border-white/20','shadow-[0_10px_40px_rgba(0,0,0,0.3)]');
        navGlow.style.opacity = '0.5';
        setNavTheme(true);
      } else {
        // Top of page: light clean navbar
        navContainer.classList.add('bg-white/80','border-white/60','shadow-[0_4px_20px_rgba(0,0,0,0.08)]');
        navContainer.classList.remove('bg-white/15','border-white/20','shadow-[0_10px_40px_rgba(0,0,0,0.3)]');
        navGlow.style.opacity = '0';
        setNavTheme(false);
      }
    });

    // Initialize at top of page — light theme
    setNavTheme(false);
  </script>
</header>