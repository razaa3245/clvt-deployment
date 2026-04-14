<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lens Catalogue | VirtualLens</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<style>
  @keyframes spin { to { transform: rotate(360deg); } }

  /* ════ SHARED SIDEBAR STYLES ════ */
  .app-shell { display:flex; min-height:100vh; }

  .vt-sidebar {
    width: 80px;
    min-height: 100vh;
    height: 100%;
    position: sticky;
    top: 0;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background: #0B1437;
    border-right: 1px solid rgba(255,255,255,0.08);
    box-shadow: 4px 0 24px rgba(0,0,0,0.15);
    z-index: 50;
    overflow: hidden;
    transition: width 0.3s cubic-bezier(.4,0,.2,1);
  }
  .vt-sidebar.open { width: 260px; }

  .vt-nav-link {
    display: flex;
    align-items: center;
    padding: 10px 16px;
    margin: 2px 8px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 500;
    text-decoration: none;
    color: rgba(255,255,255,.55);
    transition: background .18s, color .18s;
    white-space: nowrap;
    overflow: hidden;
    border: none;
    background: transparent;
    cursor: pointer;
    width: calc(100% - 16px);
    text-align: left;
  }
  .vt-nav-link:hover { background: rgba(255,255,255,.07); color: rgba(255,255,255,.9); }
  .vt-nav-link.active { background: rgba(59,130,246,.18); color: #fff; font-weight: 700; box-shadow: inset 3px 0 0 #3B82F6; }
  .vt-nav-link svg { flex-shrink: 0; width: 20px; height: 20px; }
  .vt-nav-label { margin-left: 12px; overflow: hidden; max-width: 0; opacity: 0; transition: max-width .3s, opacity .2s; }
  .vt-sidebar.open .vt-nav-label { max-width: 180px; opacity: 1; }
  .vt-plan-card { display: none; }
  .vt-sidebar.open .vt-plan-card { display: block; }
  .vt-section-label { display:none; }
  .vt-sidebar.open .vt-section-label { display:block; }
  .vt-user-info { display:none; overflow:hidden; }
  .vt-sidebar.open .vt-user-info { display:block; }

  /* Collapsed sidebar: tighter padding so avatar + hamburger never merge */
  .vt-sidebar:not(.open) .vt-header-row { padding: 10px 6px !important; gap: 4px !important; }

  /* ── Mobile Bottom Navigation ── */
  #mobile-bottom-nav {
    display: none;
    position: fixed;
    bottom: 0; left: 0; right: 0;
    z-index: 100;
    background: #0B1437;
    border-top: 1px solid rgba(255,255,255,0.08);
    padding: 8px 0 max(8px, env(safe-area-inset-bottom));
    box-shadow: 0 -4px 24px rgba(11,20,55,0.18);
  }
  #mobile-bottom-nav .nav-items {
    display: flex;
    justify-content: space-around;
    align-items: center;
  }
  #mobile-bottom-nav .mob-nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 3px;
    padding: 6px 10px;
    border-radius: 12px;
    text-decoration: none;
    transition: background 0.2s;
    color: rgba(255,255,255,0.5);
    font-size: 10px;
    font-weight: 500;
    cursor: pointer;
    background: none;
    border: none;
    min-width: 52px;
    font-family: 'Plus Jakarta Sans', sans-serif;
  }
  #mobile-bottom-nav .mob-nav-item svg {
    width: 22px; height: 22px;
    flex-shrink: 0;
  }
  #mobile-bottom-nav .mob-nav-item.active { color: #3B82F6; background: rgba(59,130,246,0.12); }
  #mobile-bottom-nav .mob-nav-item:not(.active):hover { background: rgba(255,255,255,0.07); color: rgba(255,255,255,0.85); }
  #mobile-bottom-nav .mob-nav-item.logout-item { color: rgba(239,68,68,0.75); }
  #mobile-bottom-nav .mob-nav-item.logout-item:hover { background: rgba(239,68,68,0.08); }

  /* Responsive */
  @media (max-width: 767px) {
    .vt-sidebar { display: none !important; }
    #mobile-bottom-nav { display: block; }
    .vt-main { padding-bottom: 80px !important; margin-left: 0 !important; }
  }
  @media (min-width: 768px) and (max-width: 1023px) {
    #mobile-bottom-nav { display: none !important; }
    .vt-main { margin-left: 80px; }
  }
  @media (min-width: 1024px) {
    #mobile-bottom-nav { display: none !important; }
  }

  /* ── Responsive header ── */
  @media (max-width: 640px) {
    header { padding: 12px 16px !important; }
    header h1 { font-size: 15px !important; }
    .hero-inner { padding: 28px 16px !important; }
    .hero-inner h1 { font-size: 22px !important; }
    .filter-bar { padding: 16px 12px 4px !important; gap: 8px !important; }
  }

  /* ── Cards grid ── */
  #lens-container {
    grid-template-columns: repeat(4, 1fr) !important;
    padding: 32px !important;
    max-width: 1280px;
    margin: 0 auto;
    box-sizing: border-box;
    width: 100%;
  }
  @media (max-width: 1200px) { #lens-container { grid-template-columns: repeat(3, 1fr) !important; } }
  @media (max-width: 900px)  { #lens-container { grid-template-columns: repeat(2, 1fr) !important; padding: 20px 16px !important; } }
  @media (max-width: 520px)  { #lens-container { grid-template-columns: 1fr !important; padding: 16px 12px !important; } }

  /* ── Modal responsive ── */
  @media (max-width: 480px) {
    #tryOnModal > div { padding: 16px !important; }
    #tryOnModal .flex.gap-4 { flex-direction: column !important; }
  }
</style>
</head>

<body class="min-h-screen" style="background:#F0F4FD;font-family:'Plus Jakarta Sans',sans-serif;color:#1E293B;margin:0;">
<div class="app-shell">

<!-- ══════════════════════════════════════
     SIDEBAR — Catalog (active: Lens Catalog)
══════════════════════════════════════ -->
<aside id="vt-sidebar" class="vt-sidebar">

  <div class="vt-sidebar-desktop" style="display:flex;flex-direction:column;flex:1;overflow:hidden;">
    <!-- User row + toggle — avatar left, hamburger right, always in one row -->
    <div class="vt-header-row" style="display:flex;align-items:center;justify-content:space-between;padding:14px;border-bottom:1px solid rgba(255,255,255,.08);gap:8px;">
      <div style="display:flex;align-items:center;gap:10px;min-width:0;">
        <div style="width:40px;height:40px;border-radius:12px;background:linear-gradient(135deg,#3B82F6,#06B6D4);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <span id="sidebar-email-first" style="color:#fff;font-weight:800;font-size:15px;"></span>
        </div>
        <div class="vt-user-info">
          <span id="admin-email-sidebar" style="color:#fff;font-size:12px;font-weight:600;display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:150px;"></span>
          <p style="color:rgba(255,255,255,.4);font-size:11px;margin:2px 0 0;">Admin</p>
        </div>
      </div>
      <button onclick="vtToggleSidebar()" style="background:transparent;border:none;cursor:pointer;padding:6px;border-radius:8px;flex-shrink:0;display:flex;align-items:center;justify-content:center;" onmouseover="this.style.background='rgba(255,255,255,.1)'" onmouseout="this.style.background='transparent'">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="rgba(255,255,255,.5)">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
        </svg>
      </button>
    </div>

    <!-- Nav -->
    <nav style="margin-top:16px;flex:1;">
      <p class="vt-section-label" style="font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;padding:0 20px 8px;color:rgba(255,255,255,.28);">Overview</p>
      <a href="/admin/dashboard" class="vt-nav-link">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        <span class="vt-nav-label">Dashboard</span>
      </a>
      <a href="/catalog" class="vt-nav-link">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
        <span class="vt-nav-label">Lens Catalog</span>
      </a>
      <a href="/shopkeeper/catalog2" class="vt-nav-link active">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
     stroke="currentColor" width="24" height="24">

  <rect x="3" y="7" width="18" height="13" rx="2" stroke-width="2"/>
  <circle cx="12" cy="13" r="3" stroke-width="2"/>

  <!-- Top camera bump -->
  <path stroke-width="2" d="M8 7l2-2h4l2 2"/>
</svg>
        <span class="vt-nav-label">Lens TryOn</span>
      </a>
      <a href="/admin/messages" class="vt-nav-link ">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span class="vt-nav-label">Approvals</span>
      </a>
    </nav>

    
  </div>

  <!-- Logout desktop -->
  <div class="vt-sidebar-desktop" style="padding:10px 8px;border-top:1px solid rgba(255,255,255,.08);">
    <button onclick="logout()" class="vt-nav-link" style="color:rgba(239,68,68,.8);" onmouseover="this.style.background='rgba(239,68,68,.08)'" onmouseout="this.style.background='transparent'">
      <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
      <span class="vt-nav-label">Logout</span>
    </button>
  </div>

</aside>

<!-- MOBILE BOTTOM NAVIGATION -->
<nav id="mobile-bottom-nav" role="navigation" aria-label="Mobile navigation">
  <div class="nav-items">
    <a href="/admin/dashboard" class="mob-nav-item">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
      </svg>
      Dashboard
    </a>
    <a href="/catalog" class="mob-nav-item">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
      </svg>
      Catalog
    </a>
    <a href="/shopkeeper/catalog2" class="mob-nav-item active">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <rect x="3" y="7" width="18" height="13" rx="2" stroke-width="2"/>
        <circle cx="12" cy="13" r="3" stroke-width="2"/>
        <path stroke-width="2" d="M8 7l2-2h4l2 2"/>
      </svg>
      Try-On
    </a>
    <a href="/admin/messages" class="mob-nav-item">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      Approvals
    </a>
    <button onclick="logout()" class="mob-nav-item logout-item">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
      </svg>
      Logout
    </button>
  </div>
</nav>

  <div class="vt-main" style="flex:1;display:flex;flex-direction:column;overflow-x:hidden;font-family:'Plus Jakarta Sans',sans-serif;">
    <header class="vt-header" style="position:sticky;top:0;z-index:40;background:#fff;display:flex;justify-content:space-between;align-items:center;padding:14px 24px;border-bottom:1px solid #E8EDF6;flex-wrap:wrap;gap:8px;">
      <div style="display:flex;align-items:center;gap:10px;">
        <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" style="width:32px;height:32px;border-radius:8px;" alt="Logo">
        <h1 class="text-xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">LensPilot</h1>
        <span style="background:#EFF6FF;color:#3B82F6;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;">Admin Console</span>
      </div>
      <span id="admin-email" class="email-label" style="font-size:13px;font-weight:500;color:#64748B;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:200px;"></span>
    </header>

   <!-- Hero -->
<div class="border-b" style="background:linear-gradient(135deg,#0B1437 0%,#192566 100%);border-color:rgba(255,255,255,.1);">
  <div class="hero-inner max-w-7xl mx-auto px-8 py-12 text-center">
    <h1 class="text-3xl font-extrabold mb-3 text-white">Lens Catalogue</h1>
    <p class="text-base" style="color:rgba(255,255,255,.55);">Browse our premium collection and try them virtually</p>
  </div>
</div>

<!-- Filter bar -->
<div class="filter-bar max-w-7xl mx-auto px-8 pt-8 pb-2 flex flex-wrap items-center gap-3">
  <!-- Search -->
  <div class="relative flex-1 min-w-[200px]">
    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"
         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
    </svg>
    <input id="lens-search" type="text" placeholder="Search lenses…"
      oninput="filterLenses()"
      class="w-full pl-9 pr-4 py-2 text-sm rounded-xl transition-all" style="border:1.5px solid #E2E8F0;background:#fff;color:#0B1437;outline:none;font-family:'Plus Jakarta Sans',sans-serif;" onfocus="this.style.borderColor='#3B82F6'" onblur="this.style.borderColor='#E2E8F0'">
  </div>
  <!-- Sort -->
  <select id="lens-sort" onchange="filterLenses()"
    class="py-2 px-3 text-sm rounded-xl cursor-pointer" style="border:1.5px solid #E2E8F0;background:#fff;color:#475569;outline:none;font-family:'Plus Jakarta Sans',sans-serif;">
    <option value="default">Default order</option>
    <option value="freshkon">Freshkon</option>
    <option value="freshlook">Freshlook</option>
    <option value="bella">Bella</option>
  </select>
  <!-- Count badge -->
  <span id="lens-count" class="text-xs text-gray-400 font-medium whitespace-nowrap"></span>
</div>

    <div id="loading" class="flex-1 flex flex-col items-center justify-center py-20">
      <div style="width:36px;height:36px;border:3px solid #E2E8F0;border-top-color:#3B82F6;border-radius:50%;animation:spin .75s linear infinite;"></div>
      <p class="mt-3 text-sm font-medium" style="color:#94A3B8;">Loading lenses...</p>
    </div>

    <div id="lens-container"
      class="max-w-7xl mx-auto px-8 py-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"
      style="display: none;"></div>

    <div id="no-lenses" class="flex-1 flex items-center justify-center py-20" style="display: none;">
      <p class="text-gray-500 text-xl font-medium">No lenses found in the catalogue.</p>
    </div>

    @include('web.layouts.footer')
    </div><!-- /vt-main -->
</div><!-- /app-shell -->

  <!-- Try-On Modal -->
  <div id="tryOnModal"
    class="hidden fixed inset-0 z-[100] flex items-center justify-center bg-black/80 backdrop-blur-sm p-4">
    <div class="rounded-2xl shadow-2xl max-w-lg w-full overflow-hidden relative p-6" style="background:#fff;font-family:'Plus Jakarta Sans',sans-serif;">
      <button onclick="closeModal()"
        class="absolute top-4 right-4 p-2 rounded-full transition-all font-bold z-20 text-sm" style="background:#F1F5F9;color:#64748B;" onmouseover="this.style.background='#EF4444';this.style.color='#fff'" onmouseout="this.style.background='#F1F5F9';this.style.color='#64748B'">✕</button>

      <h3 class="text-lg font-bold mb-4 text-center" style="color:#0B1437;">Virtual Try-On</h3>

      <!-- Video + AR Result display -->
      <div class="relative bg-slate-100 rounded-xl overflow-hidden aspect-square shadow-inner border-4 border-cyan-100">
        <video id="webcam" autoplay playsinline muted class="w-full h-full object-cover scale-x-[-1]"></video>
        <canvas id="ar-overlay"
          class="w-full h-full object-cover absolute top-0 left-0 z-10 pointer-events-none"></canvas>
        <div id="loading-spinner" class="hidden absolute inset-0 bg-black/40 z-20 flex items-center justify-center">
          <div class="animate-spin rounded-full h-12 w-12 border-4 border-white border-t-cyan-500"></div>
        </div>
        <div id="live-badge"
          class="hidden absolute top-3 left-3 z-30 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full animate-pulse">
          ● LIVE AR</div>
        <div id="ws-status" class="hidden absolute top-3 right-3 z-30 text-xs font-bold px-3 py-1 rounded-full"></div>
        <div id="fps-counter"
          class="hidden absolute bottom-3 left-3 z-30 bg-black/50 text-green-400 text-xs font-mono px-2 py-1 rounded">0
          FPS</div>
      </div>

      <p id="status-msg" class="text-sm text-gray-500 mt-4 text-center font-medium italic">Align your face and click
        apply</p>

      <div class="flex flex-col gap-3 mt-6">
        <div class="flex gap-4">
          <button id="capture-btn"
            class="flex-1 text-white py-3 rounded-xl font-semibold shadow-lg transition-all text-sm" style="background:linear-gradient(135deg,#3B82F6,#2563EB);" onmouseover="this.style.opacity='.9'" onmouseout="this.style.opacity='1'">
            Apply Lens (Photo)
          </button>
          <button onclick="resetCamera()"
            class="flex-1 py-3 rounded-xl font-semibold transition-all text-sm" style="border:1.5px solid #E2E8F0;color:#475569;" onmouseover="this.style.background='#F1F5F9'" onmouseout="this.style.background='transparent'">
            Retake
          </button>
        </div>
        <button id="live-toggle-btn" onclick="toggleLiveMode()"
          class="w-full text-white py-3 rounded-xl font-semibold shadow-md transition-all text-sm" style="background:#F59E0B;" onmouseover="this.style.background='#D97706'" onmouseout="this.style.background='#F59E0B'">
          ▶ Start Live AR
        </button>
      </div>
    </div>
  </div>


    <script>
      const FASTAPI_HTTP = "http://127.0.0.1:8001";
      const FASTAPI_WS = "ws://127.0.0.1:8001";
      const SEND_W = 640, SEND_H = 480;

      let allLenses = [];
      let currentLensId = null;
      let videoStream = null;
      let isLiveMode = false;
      let ws = null, wsReady = false, frameInFlight = false;

      // Reusable canvases — no GC
      const sendCanvas = document.createElement('canvas');
      sendCanvas.width = SEND_W; sendCanvas.height = SEND_H;
      const sendCtx = sendCanvas.getContext('2d');

      // FPS tracking
      let fpsFrames = 0, fpsLast = performance.now();

      // ─────────────────────────────────────────
      // SIDEBAR TOGGLE
      // ─────────────────────────────────────────
      function vtToggleSidebar() {
        document.getElementById('vt-sidebar').classList.toggle('open');
      }

      // ─────────────────────────────────────────
      // UI
      // ─────────────────────────────────────────
      function initUI() {
        const info = JSON.parse(localStorage.getItem('user_info') || '{}');
        const email = localStorage.getItem('adminEmail') || info.email || 'Guest';
        document.getElementById('admin-email').textContent = email;
        document.getElementById('admin-email-sidebar').textContent = email;
        document.getElementById('sidebar-email-first').textContent = email.charAt(0).toUpperCase();

        // Load plan info into sidebar
        const token = localStorage.getItem('auth_token');
        if (token) {
          fetch('/api/shopkeeper/dashboard', { headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' } })
            .then(r => r.json()).then(result => {
              if (result.success && result.data && result.data.stats) {
                const s = result.data.stats;
                const pn = document.getElementById('sidebar-plan-name');
                const pp = document.getElementById('sidebar-plan-price');
                const pe = document.getElementById('sidebar-plan-expiry');
                if (pn) pn.textContent = s.subscription_plan || '—';
                if (pp) pp.textContent = s.plan_price || '';
                if (pe) pe.textContent = s.plan_expiry ? 'Expires: ' + s.plan_expiry : '—';
              }
            }).catch(() => {});
        }
      }

      async function fetchLenses() {
        try {
          const res = await fetch('/api/lenses');
          const data = await res.json();
          allLenses = Array.isArray(data) ? data : (data.data || []);
          displayLenses(allLenses);
        } catch {
          document.getElementById('loading').style.display = 'none';
          document.getElementById('no-lenses').style.display = 'flex';
        }
      }

function displayLenses(lenses) {
  allLenses = lenses;
  filterLenses();
}

function filterLenses() {
  const q    = (document.getElementById('lens-search')?.value || '').trim().toLowerCase();
  const sort = document.getElementById('lens-sort')?.value || 'default';

  let list = allLenses.filter(l =>
    !q || (l.name || '').toLowerCase().includes(q)
  );

  if (sort === 'az') list = [...list].sort((a, b) => (a.name || '').localeCompare(b.name || ''));
  if (sort === 'za') list = [...list].sort((a, b) => (b.name || '').localeCompare(a.name || ''));
  if (['freshkon', 'freshlook', 'bella'].includes(sort)) {
    list = list.filter(l => (l.brand || '').toLowerCase() === sort);
  }

  const c = document.getElementById('lens-container');
  document.getElementById('loading').style.display = 'none';

  const count = document.getElementById('lens-count');
  if (count) count.textContent = `${list.length} lens${list.length !== 1 ? 'es' : ''}`;

  if (!list.length) {
    document.getElementById('no-lenses').style.display = 'flex';
    c.style.display = 'none';
    return;
  }

  document.getElementById('no-lenses').style.display = 'none';
  c.style.display = 'grid';

  c.innerHTML = list.map((l, i) => {
    const img = l.image
      ? (l.image.startsWith('http') ? l.image : '/storage/' + l.image)
      : null;

    const imageHtml = img
      ? `<img src="${img}" alt="${l.name || 'Lens'}"
              style="width:100%;height:100%;object-fit:contain;transition:transform .5s ease;"
              onmouseover="this.style.transform='scale(1.06)'"
              onmouseout="this.style.transform='scale(1)'">`
      : `<div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;">
           <svg width="56" height="56" viewBox="0 0 24 24" fill="none"
                stroke="#cbd5e1" stroke-width="1.4">
             <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
             <circle cx="12" cy="12" r="3"/>
           </svg>
         </div>`;

    return `
    <div class="group" style="
      background:#fff;
      border-radius:20px;
      overflow:hidden;
      display:flex;
      flex-direction:column;
      box-shadow:0 2px 16px rgba(0,0,0,0.07);
      transition:transform .3s ease, box-shadow .3s ease;
      border:1px solid rgba(0,0,0,0.06);
    "
    onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 20px 50px rgba(0,0,0,0.13)'"
    onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 16px rgba(0,0,0,0.07)'">

      <!-- Image Panel — clean white, no background color -->
      <div style="
        position:relative;
        background:#fff;
        height:210px;
        display:flex;
        align-items:center;
        justify-content:center;
        overflow:hidden;
        border-bottom:1px solid #f1f5f9;
        padding:16px;
      ">
        <!-- Badge -->
        <span style="
          position:absolute;top:12px;left:12px;z-index:10;
          background:#f8fafc;
          color:#0891b2;
          font-size:9px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;
          padding:4px 10px;border-radius:20px;
          border:1px solid #e2e8f0;
          box-shadow:0 1px 4px rgba(0,0,0,0.05);
        ">Virtual Try-On</span>

        <!-- Full lens image -->
        <div style="width:100%;height:100%;position:relative;z-index:5;display:flex;align-items:center;justify-content:center;">
          ${imageHtml}
        </div>
      </div>

      <!-- Thin divider -->
      <div style="height:2px;background:linear-gradient(90deg,transparent,#06b6d4,transparent);"></div>

      <!-- Content -->
      <div style="display:flex;flex-direction:column;align-items:center;padding:18px 20px 20px;gap:6px;flex:1;text-align:center;">

        <p style="font-size:9px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#94a3b8;margin:0;">
          Premium Collection
        </p>

        <h3 style="font-size:16px;font-weight:800;color:#0f172a;margin:0;line-height:1.3;">
          ${l.name || 'Unnamed Lens'}
        </h3>

        <div style="width:32px;height:2.5px;border-radius:99px;background:#06b6d4;margin:4px 0 10px;"></div>

        <!-- CTA -->
        <button onclick="openTryOnModal('${l.id}')"
          style="
            width:100%;display:flex;align-items:center;justify-content:center;gap:8px;
            background:linear-gradient(135deg,#0891b2,#0e7490);
            color:#fff;font-size:13px;font-weight:700;letter-spacing:.03em;
            padding:12px 16px;border-radius:12px;border:none;cursor:pointer;
            box-shadow:0 4px 14px rgba(8,145,178,0.35);
            transition:opacity .2s,transform .15s;
            margin-top:auto;
          "
          onmouseover="this.style.opacity='.88';this.style.transform='scale(1.02)'"
          onmouseout="this.style.opacity='1';this.style.transform='scale(1)'">

          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
            <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            <circle cx="12" cy="12" r="3"/>
          </svg>
          Try This Lens
        </button>
      </div>
    </div>`;
  }).join('');
}

      // ─────────────────────────────────────────
      // MODAL
      // ─────────────────────────────────────────
      async function openTryOnModal(lensId) {
        currentLensId = lensId;
        document.getElementById('tryOnModal').classList.remove('hidden');
        resetCamera();
        try {
          videoStream = await navigator.mediaDevices.getUserMedia({
            video: { width: { ideal: 640 }, height: { ideal: 480 }, frameRate: { ideal: 30 } },
            audio: false
          });
          document.getElementById('webcam').srcObject = videoStream;
        } catch {
          alert("Camera access denied!");
          closeModal();
        }
      }

      function closeModal() {
        stopLiveMode();
        if (videoStream) videoStream.getTracks().forEach(t => t.stop());
        document.getElementById('tryOnModal').classList.add('hidden');
      }

      function resetCamera() {
        stopLiveMode();
        // Clear the AR overlay canvas
        const overlay = document.getElementById('ar-overlay');
        if (overlay) overlay.getContext('2d').clearRect(0, 0, overlay.width, overlay.height);
        document.getElementById('status-msg').innerText = "Align your face and click apply";
      }

      // ─────────────────────────────────────────
      // WEBSOCKET
      // ─────────────────────────────────────────
      function setWsStatus(text, color) {
        const el = document.getElementById('ws-status');
        if (!el) return;
        el.textContent = text;
        el.className = `absolute top-3 right-3 z-30 text-xs font-bold px-3 py-1 rounded-full ${color}`;
        el.classList.remove('hidden');
      }

      function updateFPS() {
        fpsFrames++;
        const now = performance.now();
        const diff = now - fpsLast;
        if (diff >= 1000) {
          const fps = Math.round(fpsFrames * 1000 / diff);
          const el = document.getElementById('fps-counter');
          if (el) {
            el.textContent = `${fps} FPS`;
            el.style.color = fps >= 15 ? '#4ade80' : fps >= 8 ? '#facc15' : '#f87171';
          }
          fpsFrames = 0;
          fpsLast = now;
        }
      }

      // Processed frame image object — reused, never recreated
      const processedImg = new Image();
      let hasResult = false;

      processedImg.onload = () => {
        // When server result arrives, draw it onto the overlay canvas
        const overlay = document.getElementById('ar-overlay');
        if (!overlay || !isLiveMode) return;
        overlay.width = overlay.offsetWidth;
        overlay.height = overlay.offsetHeight;
        const ctx = overlay.getContext('2d');
        // Draw result — server already mirrored it to match webcam
        ctx.drawImage(processedImg, 0, 0, overlay.width, overlay.height);
        hasResult = true;
        updateFPS();
      };

      function openWebSocket() {
        return new Promise((resolve, reject) => {
          ws = new WebSocket(`${FASTAPI_WS}/ws/live-ar`);

          ws.onopen = () => {
            wsReady = true;
            setWsStatus('● Connected', 'bg-green-500 text-white');
            resolve();
          };

          ws.onmessage = (event) => {
            const data = JSON.parse(event.data);
            if (data.error) { console.warn("[WS]", data.error); frameInFlight = false; return; }
            if (data.frame && isLiveMode) {
              // Load result into reused Image object — triggers onload above
              processedImg.src = "data:image/jpeg;base64," + data.frame;
            }
            // Immediately send next frame — no waiting
            frameInFlight = false;
            if (isLiveMode) sendWsFrame();
          };

          ws.onerror = (e) => { setWsStatus('● Error', 'bg-red-500 text-white'); reject(e); };
          ws.onclose = () => { wsReady = false; };
        });
      }

      function sendWsFrame() {
        if (!isLiveMode || !wsReady || frameInFlight) return;
        if (!ws || ws.readyState !== WebSocket.OPEN) return;
        const video = document.getElementById('webcam');
        if (!video || video.readyState < 2) {
          // Video not ready yet — retry in 100ms
          setTimeout(sendWsFrame, 100); return;
        }
        frameInFlight = true;
        sendCtx.drawImage(video, 0, 0, SEND_W, SEND_H);
        const b64 = sendCanvas.toDataURL('image/jpeg', 0.92).split(',')[1];
        ws.send(JSON.stringify({ lens_id: currentLensId, frame: b64 }));
      }

      // ─────────────────────────────────────────
      // LIVE AR TOGGLE
      // ─────────────────────────────────────────
      async function toggleLiveMode() {
        if (isLiveMode) { stopLiveMode(); return; }

        isLiveMode = true;
        hasResult = false;
        const btn = document.getElementById('live-toggle-btn');
        btn.innerText = "⏹ Stop Live AR";
        btn.classList.replace('bg-yellow-500', 'bg-red-500');

        const badge = document.getElementById('live-badge');
        if (badge) badge.classList.remove('hidden');

        const fpsel = document.getElementById('fps-counter');
        if (fpsel) fpsel.classList.remove('hidden');

        document.getElementById('status-msg').innerText = "Connecting...";

        try {
          await openWebSocket();
          document.getElementById('status-msg').innerText = "Live AR running!";
          // Kick off first frame
          sendWsFrame();
        } catch {
          document.getElementById('status-msg').innerText = "Could not connect to AR server.";
          stopLiveMode();
        }
      }

      function stopLiveMode() {
        isLiveMode = false; frameInFlight = false; hasResult = false;
        fpsFrames = 0;

        const btn = document.getElementById('live-toggle-btn');
        if (btn) { btn.innerText = "▶ Start Live AR"; btn.classList.replace('bg-red-500', 'bg-yellow-500'); }

        ['live-badge', 'ws-status', 'fps-counter'].forEach(id => {
          const el = document.getElementById(id);
          if (el) el.classList.add('hidden');
        });

        // Clear overlay
        const overlay = document.getElementById('ar-overlay');
        if (overlay) overlay.getContext('2d').clearRect(0, 0, overlay.width, overlay.height);

        if (ws) { ws.close(); ws = null; wsReady = false; }
      }

      // ─────────────────────────────────────────
      // PHOTO MODE
      // ─────────────────────────────────────────
      document.getElementById('capture-btn').onclick = async () => {
        stopLiveMode();
        const video = document.getElementById('webcam');
        const spinner = document.getElementById('loading-spinner');
        const status = document.getElementById('status-msg');

        const pc = document.createElement('canvas');
        pc.width = video.videoWidth; pc.height = video.videoHeight;
        pc.getContext('2d').drawImage(video, 0, 0);

        spinner.classList.remove('hidden');
        status.innerText = "Applying lens via AI...";

        pc.toBlob(async (blob) => {
          const fd = new FormData();
          fd.append("image", blob, "capture.png");
          fd.append("lens_id", currentLensId);
          try {
            const res = await fetch(`${FASTAPI_HTTP}/apply-lens`, { method: "POST", body: fd });
            if (res.ok) {
              // For photo mode: draw result onto the overlay canvas at full size
              const url = URL.createObjectURL(await res.blob());
              const overlay = document.getElementById('ar-overlay');
              const tempImg = new Image();
              tempImg.onload = () => {
                overlay.width = overlay.offsetWidth;
                overlay.height = overlay.offsetHeight;
                overlay.getContext('2d').drawImage(tempImg, 0, 0, overlay.width, overlay.height);
                URL.revokeObjectURL(url);
              };
              tempImg.src = url;
              status.innerText = "✓ Lens applied!";
            } else {
              status.innerText = "⚠ Face not detected. Try again.";
            }
          } catch {
            status.innerText = "⚠ AI server not running.";
          } finally {
            spinner.classList.add('hidden');
          }
        }, 'image/png', 1.0);
      };

      function logout() { localStorage.clear(); window.location.href = '/signup'; }
      window.onload = () => { initUI(); fetchLenses(); };
    </script>
</body>

</html>