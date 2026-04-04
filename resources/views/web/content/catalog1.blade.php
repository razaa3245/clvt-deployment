<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lens Catalogue | VirtualLens</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 text-gray-800 font-sans min-h-screen flex">
  <aside x-data="{ open: false }" :class="open ? 'w-64' : 'w-20'"
    class="h-screen bg-white shadow-md border-r border-gray-200 transition-all duration-300 flex flex-col justify-between sticky top-0 z-50">
    <div>
      <div class="flex items-center justify-between p-4">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
            <span id="sidebar-email-first" class="text-cyan-600 font-bold text-lg"></span>
          </div>
          <div x-show="open" class="text-gray-700">
            <span id="admin-email-sidebar" class="text-sm text-gray-600"></span>
            <p class="text-xs text-gray-400 -mt-1">Shopkeeper</p>
          </div>
        </div>
        <button @click="open = !open" class="text-gray-400 hover:text-gray-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
          </svg>
        </button>
      </div>
      <nav class="mt-6">
        <ul>
          <li>
            <a href="/shopkeeper/dashboard" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 group-hover:text-cyan-500"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
              <span x-show="open" class="ml-3 text-sm">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="/shopkeeper/catalog1"
              class="flex items-center px-6 py-2 bg-cyan-50 text-cyan-700 border-r-4 border-cyan-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              <span x-show="open" class="ml-3 text-sm font-semibold">Lens Catalog</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="border-t border-gray-100 py-4">
      <button onclick="logout()" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group w-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 group-hover:text-red-500" fill="none"
          viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
        <span x-show="open" class="ml-3 text-sm text-red-500 font-medium">Logout</span>
      </button>
    </div>
  </aside>

  <div class="flex-1 flex flex-col overflow-x-hidden">
    <header class="bg-white border-b border-gray-200 px-10 py-5 shadow-sm sticky top-0 z-40">
      <div class="flex items-center justify-between">
        <h1
          class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">
          VisionTech</h1>
        <span id="admin-email" class="text-sm text-gray-600 font-medium"></span>
      </div>
    </header>

   <!-- Hero -->
<div class="bg-gradient-to-r from-cyan-50 via-blue-50 to-purple-50 border-b border-gray-200">
  <div class="max-w-7xl mx-auto px-8 py-12 text-center">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-3 font-syne">Lens Catalogue</h1>
    <p class="text-gray-500 text-lg">Browse our premium collection and try them virtually</p>
  </div>
</div>

<!-- Filter bar -->
<div class="max-w-7xl mx-auto px-8 pt-8 pb-2 flex flex-wrap items-center gap-3">
  <!-- Search -->
  <div class="relative flex-1 min-w-[200px]">
    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"
         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
    </svg>
    <input id="lens-search" type="text" placeholder="Search lenses…"
      oninput="filterLenses()"
      class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-xl bg-white
             text-gray-800 placeholder-gray-400 focus:outline-none focus:border-cyan-400
             focus:ring-1 focus:ring-cyan-300 transition-all">
  </div>
  <!-- Sort -->
  <select id="lens-sort" onchange="filterLenses()"
    class="py-2 px-3 text-sm border border-gray-200 rounded-xl bg-white text-gray-700
           focus:outline-none focus:border-cyan-400 cursor-pointer">
    <option value="default">Default order</option>
    <option value="az">Name A → Z</option>
    <option value="za">Name Z → A</option>
  </select>
  <!-- Count badge -->
  <span id="lens-count" class="text-xs text-gray-400 font-medium whitespace-nowrap"></span>
</div>

    <div id="loading" class="flex-1 flex flex-col items-center justify-center py-20">
      <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-cyan-600"></div>
      <p class="mt-4 text-gray-600">Loading lenses...</p>
    </div>

    <div id="lens-container"
      class="max-w-7xl mx-auto px-8 py-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"
      style="display: none;"></div>

    <div id="no-lenses" class="flex-1 flex items-center justify-center py-20" style="display: none;">
      <p class="text-gray-500 text-xl font-medium">No lenses found in the catalogue.</p>
    </div>

    @include('web.layouts.footer')
  </div>

  <!-- Try-On Modal -->
  <div id="tryOnModal"
    class="hidden fixed inset-0 z-[100] flex items-center justify-center bg-black/80 backdrop-blur-sm p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full overflow-hidden relative p-6">
      <button onclick="closeModal()"
        class="absolute top-4 right-4 bg-gray-200 hover:bg-red-500 hover:text-white p-2 rounded-full transition-all font-bold z-20">✕</button>

      <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Virtual Try-On</h3>

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
            class="flex-1 bg-gradient-to-r from-cyan-600 to-blue-600 text-white py-3 rounded-xl font-bold shadow-lg hover:opacity-90 transition-all">
            Apply Lens (Photo)
          </button>
          <button onclick="resetCamera()"
            class="flex-1 border-2 border-gray-200 text-gray-600 py-3 rounded-xl font-bold hover:bg-gray-50 transition-all">
            Retake
          </button>
        </div>
        <button id="live-toggle-btn" onclick="toggleLiveMode()"
          class="w-full bg-yellow-500 text-white py-3 rounded-xl font-bold shadow-md hover:bg-yellow-600 transition-all">
          ▶ Start Live AR
        </button>
      </div>
    </div>
  </div>

  <!-- {{-- 
  Replace ONLY the <script>...</script> block in your catalog1.blade.php with this.
  Everything else (HTML, sidebar, modal) stays the same.
--}}

<script>
  // ─────────────────────────────────────────
  // CONFIG
  // ─────────────────────────────────────────
  const FASTAPI_HTTP = "http://127.0.0.1:8001";
  const FASTAPI_WS   = "ws://127.0.0.1:8001";

  // OPTIMIZATION: Send smaller frames from browser
  // 480x360 matches what server processes — no wasted pixels
  const SEND_WIDTH  = 480;
  const SEND_HEIGHT = 360;

  // ─────────────────────────────────────────
  // STATE
  // ─────────────────────────────────────────
  let allLenses     = [];
  let currentLensId = null;
  let videoStream   = null;
  let isLiveMode    = false;
  let ws            = null;
  let wsReady       = false;
  let frameInFlight = false;

  // Reuse one canvas forever — no garbage collection per frame
  const sendCanvas  = document.createElement('canvas');
  sendCanvas.width  = SEND_WIDTH;
  sendCanvas.height = SEND_HEIGHT;
  const sendCtx     = sendCanvas.getContext('2d');

  // ─────────────────────────────────────────
  // UI INIT
  // ─────────────────────────────────────────
  function initUI() {
    const userInfo = JSON.parse(localStorage.getItem('user_info') || '{}');
    const email    = localStorage.getItem('adminEmail') || userInfo.email || 'Guest';
    document.getElementById('admin-email').textContent         = email;
    document.getElementById('admin-email-sidebar').textContent = email;
    document.getElementById('sidebar-email-first').textContent = email.charAt(0).toUpperCase();
  }

  // ─────────────────────────────────────────
  // LENS CATALOGUE
  // ─────────────────────────────────────────
  async function fetchLenses() {
    try {
      const res  = await fetch('/api/lenses');
      const data = await res.json();
      allLenses  = Array.isArray(data) ? data : (data.data || []);
      displayLenses(allLenses);
    } catch (err) {
      console.error("Fetch error:", err);
      document.getElementById('loading').style.display   = 'none';
      document.getElementById('no-lenses').style.display = 'flex';
    }
  }

  function displayLenses(lenses) {
    const container = document.getElementById('lens-container');
    document.getElementById('loading').style.display = 'none';
    if (!lenses.length) {
      document.getElementById('no-lenses').style.display = 'flex';
      container.style.display = 'none';
      return;
    }
    document.getElementById('no-lenses').style.display = 'none';
    container.style.display = 'grid';
    container.innerHTML = lenses.map(createLensCard).join('');
  }

  function createLensCard(lens) {
    const imageUrl = lens.image
      ? (lens.image.startsWith('http') ? lens.image : '/storage/' + lens.image)
      : null;
    return `
      <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden p-6 hover:shadow-2xl transition-all">
        <div class="w-24 h-24 mx-auto rounded-full border-4 border-white shadow-md mb-4 overflow-hidden"
             style="background-color: ${lens.color || '#8B4513'}">
          ${imageUrl ? `<img src="${imageUrl}" class="w-full h-full object-cover">` : ''}
        </div>
        <h3 class="text-lg font-bold text-center mb-4 text-gray-900">${lens.name || 'Premium Lens'}</h3>
        <button onclick="openTryOnModal('${lens.id}')"
          class="w-full bg-cyan-600 hover:bg-cyan-700 text-white py-3 rounded-xl font-bold transition-all shadow-md">
          Try This Lens
        </button>
      </div>`;
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
    } catch (err) {
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
    document.getElementById('ar-result').classList.add('hidden');
    document.getElementById('webcam').classList.remove('hidden');
    document.getElementById('status-msg').innerText = "Align your face and click apply";
  }

  // ─────────────────────────────────────────
  // WEBSOCKET HELPERS
  // ─────────────────────────────────────────
  function setWsStatus(text, color) {
    const el = document.getElementById('ws-status');
    if (!el) return;
    el.textContent = text;
    el.className   = `absolute top-3 right-3 z-30 text-xs font-bold px-3 py-1 rounded-full ${color}`;
    el.classList.remove('hidden');
  }

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
        if (data.error) {
          console.warn("[WS] Server:", data.error);
          frameInFlight = false;
          return;
        }
        if (data.frame && isLiveMode) {
          const resultImg = document.getElementById('ar-result');
          // OPTIMIZATION: reuse same img src — avoids DOM thrash
          resultImg.src = "data:image/jpeg;base64," + data.frame;
          resultImg.classList.remove('hidden');
          document.getElementById('webcam').classList.add('hidden');
        }
        frameInFlight = false;
        // Request next frame immediately after receiving response
        if (isLiveMode) requestAnimationFrame(sendWsFrame);
      };

      ws.onerror = (e) => {
        setWsStatus('● Error', 'bg-red-500 text-white');
        reject(e);
      };

      ws.onclose = () => {
        wsReady = false;
        if (isLiveMode) setWsStatus('● Disconnected', 'bg-gray-400 text-white');
      };
    });
  }

  function sendWsFrame() {
    if (!isLiveMode || !wsReady || frameInFlight) return;
    if (!ws || ws.readyState !== WebSocket.OPEN) return;

    const video = document.getElementById('webcam');
    if (!video || video.readyState < 2) return;

    frameInFlight = true;

    // Draw at reduced size — matches server processing resolution
    sendCtx.drawImage(video, 0, 0, SEND_WIDTH, SEND_HEIGHT);

    // JPEG quality 0.7 — good enough for AR, ~40% smaller than 1.0
    const frameB64 = sendCanvas.toDataURL('image/jpeg', 0.7).split(',')[1];

    ws.send(JSON.stringify({ lens_id: currentLensId, frame: frameB64 }));
  }

  // ─────────────────────────────────────────
  // LIVE AR TOGGLE
  // ─────────────────────────────────────────
  async function toggleLiveMode() {
    if (isLiveMode) { stopLiveMode(); return; }

    isLiveMode = true;
    const btn  = document.getElementById('live-toggle-btn');
    btn.innerText = "⏹ Stop Live AR";
    btn.classList.replace('bg-yellow-500', 'bg-red-500');

    const badge = document.getElementById('live-badge');
    if (badge) badge.classList.remove('hidden');

    document.getElementById('status-msg').innerText = "Connecting...";

    try {
      await openWebSocket();
      document.getElementById('status-msg').innerText = "Live AR running!";
      requestAnimationFrame(sendWsFrame);
    } catch (err) {
      document.getElementById('status-msg').innerText = "Could not connect to AR server.";
      stopLiveMode();
    }
  }

  function stopLiveMode() {
    isLiveMode    = false;
    frameInFlight = false;

    const btn = document.getElementById('live-toggle-btn');
    if (btn) {
      btn.innerText = "▶ Start Live AR";
      btn.classList.replace('bg-red-500', 'bg-yellow-500');
    }

    const badge = document.getElementById('live-badge');
    if (badge) badge.classList.add('hidden');

    const wsStatus = document.getElementById('ws-status');
    if (wsStatus) wsStatus.classList.add('hidden');

    if (ws) { ws.close(); ws = null; wsReady = false; }
  }

  // ─────────────────────────────────────────
  // PHOTO MODE
  // ─────────────────────────────────────────
  document.getElementById('capture-btn').onclick = async () => {
    stopLiveMode();
    const video   = document.getElementById('webcam');
    const spinner = document.getElementById('loading-spinner');
    const status  = document.getElementById('status-msg');

    const photoCanvas    = document.createElement('canvas');
    photoCanvas.width    = video.videoWidth;
    photoCanvas.height   = video.videoHeight;
    photoCanvas.getContext('2d').drawImage(video, 0, 0);

    spinner.classList.remove('hidden');
    status.innerText = "Applying lens via AI...";

    photoCanvas.toBlob(async (blob) => {
      const formData = new FormData();
      formData.append("image",   blob, "capture.png");
      formData.append("lens_id", currentLensId);
      try {
        const response = await fetch(`${FASTAPI_HTTP}/apply-lens`, {
          method: "POST", body: formData
        });
        if (response.ok) {
          const resultImg = document.getElementById('ar-result');
          resultImg.src   = URL.createObjectURL(await response.blob());
          resultImg.classList.remove('hidden');
          document.getElementById('webcam').classList.add('hidden');
          status.innerText = "✓ Lens applied!";
        } else {
          status.innerText = "⚠ Face not detected. Try again.";
        }
      } catch (err) {
        status.innerText = "⚠ AI server not running.";
      } finally {
        spinner.classList.add('hidden');
      }
    }, 'image/png', 1.0);
  };

  function logout() { localStorage.clear(); window.location.href = '/signup'; }
  window.onload = () => { initUI(); fetchLenses(); };
</script> -->

  {{--
  Replace ONLY the
  <script>...</script> block in catalog1.blade.php
  The HTML/modal structure stays exactly the same.

  IMPORTANT: Your modal HTML needs one small change.
  The video and ar-result img must be stacked, not swapped.
  Change your modal display div to this:

  <div class="relative bg-slate-100 rounded-xl overflow-hidden aspect-square shadow-inner border-4 border-cyan-100">
    <video id="webcam" autoplay playsinline muted class="w-full h-full object-cover scale-x-[-1]"></video>
    <canvas id="ar-overlay" class="w-full h-full object-cover absolute top-0 left-0 z-10 pointer-events-none"></canvas>
    <div id="loading-spinner" class="hidden absolute inset-0 bg-black/40 z-20 flex items-center justify-center">
      <div class="animate-spin rounded-full h-12 w-12 border-4 border-white border-t-cyan-500"></div>
    </div>
    <div id="live-badge"
      class="hidden absolute top-3 left-3 z-30 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full animate-pulse">
      ● LIVE AR</div>
    <div id="ws-status" class="hidden absolute top-3 right-3 z-30 text-xs font-bold px-3 py-1 rounded-full"></div>
    <div id="fps-counter"
      class="hidden absolute bottom-3 left-3 z-30 bg-black/50 text-green-400 text-xs font-mono px-2 py-1 rounded">0 FPS
    </div>
  </div>

  NOTE: ar-result img is REMOVED. We now use a <canvas> overlay instead.
    Remove the old <img id="ar-result"> line entirely.
    --}}

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
      // UI
      // ─────────────────────────────────────────
      function initUI() {
        const info = JSON.parse(localStorage.getItem('user_info') || '{}');
        const email = localStorage.getItem('adminEmail') || info.email || 'Guest';
        document.getElementById('admin-email').textContent = email;
        document.getElementById('admin-email-sidebar').textContent = email;
        document.getElementById('sidebar-email-first').textContent = email.charAt(0).toUpperCase();
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

  const palettes = [
    'linear-gradient(135deg,#ecfeff,#cffafe,#f0fdfa)',
    'linear-gradient(135deg,#fdf4ff,#f5d0fe,#eff6ff)',
    'linear-gradient(135deg,#fffbeb,#fde68a,#f5f3ff)',
    'linear-gradient(135deg,#ecfdf5,#a7f3d0,#ecfeff)',
  ];

  c.innerHTML = list.map((l, i) => {
    const img = l.image
      ? (l.image.startsWith('http') ? l.image : '/storage/' + l.image)
      : null;

    const swatchColor = l.color || '#06b6d4';
    const palette = palettes[i % palettes.length];

    const imageHtml = img
      ? `<img src="${img}" alt="${l.name || 'Lens'}"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">`
      : `<div class="w-full h-full flex items-center justify-center"
              style="background:${swatchColor}">
           <svg width="32" height="32" viewBox="0 0 24 24" fill="none"
                stroke="rgba(255,255,255,0.9)" stroke-width="1.6">
             <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
             <circle cx="12" cy="12" r="3"/>
           </svg>
         </div>`;

    return `
    <div class="group relative bg-white rounded-3xl border border-slate-200/60 overflow-hidden flex flex-col
                transition-all duration-300
                shadow-[0_4px_12px_rgba(0,0,0,0.05)]
                hover:shadow-[0_25px_50px_rgba(6,182,212,0.18)]
                hover:-translate-y-1">

      <!-- Top Visual -->
      <div class="relative h-48 overflow-hidden" style="background:${palette}">
        <div class="absolute inset-0 bg-gradient-to-t from-white/20 to-transparent"></div>

        <!-- Decorative Blobs -->
        <div class="absolute -top-10 -right-10 w-32 h-32 rounded-full bg-cyan-500/10 blur-2xl"></div>
        <div class="absolute -bottom-8 left-6 w-20 h-20 rounded-full bg-cyan-300/20 blur-xl"></div>

        <!-- Badge -->
        <span class="absolute top-4 left-4 z-10 bg-white/90 backdrop-blur-md
                     text-cyan-700 text-[10px] font-semibold tracking-widest uppercase
                     px-3 py-1 rounded-full border border-cyan-200 shadow-sm">
          Virtual Try-On
        </span>

        <!-- Lens Image -->
        <div class="absolute left-1/2 -translate-x-1/2 -bottom-10 z-20
                    w-24 h-24 rounded-full border-[5px] border-white
                    overflow-hidden bg-slate-100
                    shadow-[0_8px_30px_rgba(6,182,212,0.25)]">
          ${imageHtml}
        </div>
      </div>

      <!-- Content -->
      <div class="flex flex-col items-center pt-14 pb-6 px-6 gap-2 flex-1 text-center">

        <p class="text-[10px] font-semibold tracking-widest uppercase text-slate-400">
          Premium Collection
        </p>

        <h3 class="text-[16px] font-bold text-slate-900 leading-snug">
          ${l.name || 'Unnamed Lens'}
        </h3>

        <!-- Divider -->
        <div class="w-10 h-[2px] rounded-full bg-gradient-to-r from-cyan-400 to-cyan-600 mt-1 mb-3"></div>

        <!-- CTA Button -->
        <button onclick="openTryOnModal('${l.id}')"
          class="relative mt-auto w-full flex items-center justify-center gap-2
                 bg-gradient-to-r from-cyan-500 to-cyan-700
                 hover:from-cyan-600 hover:to-cyan-800
                 text-white text-[13px] font-semibold tracking-wide
                 py-3 px-5 rounded-xl
                 shadow-md hover:shadow-lg
                 transition-all duration-200
                 active:scale-[0.97] group">

          <svg class="w-4 h-4 opacity-90 transition-transform group-hover:scale-110"
               viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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