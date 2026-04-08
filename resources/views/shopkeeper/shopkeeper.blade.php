<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VisionTech – Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <!-- QR Code generator library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>

@include('layouts.auth')

<style>
  /* ── Layout ── */
  html, body { height: 100%; margin: 0; }

  /* Desktop: sidebar on left, content fills rest */
  .app-shell {
    display: flex;
    min-height: 100vh;
  }

  /* ── Sidebar ── */
  #app-sidebar {
    width: 80px;
    min-height: 100vh;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: sticky;
    top: 0;
    flex-shrink: 0;
    transition: width 0.3s ease;
    background: #0B1437;
    border-right: 1px solid rgba(255,255,255,0.08);
    box-shadow: 4px 0 24px rgba(0,0,0,0.18);
    z-index: 50;
    overflow: hidden;
  }
  #app-sidebar.expanded { width: 256px; }

  /* Mobile: bottom tab bar */
  @media (max-width: 768px) {
    .app-shell { flex-direction: column; }

    #app-sidebar {
      position: fixed !important;
      top: auto !important;
      bottom: 0 !important;
      left: 0; right: 0;
      width: 100% !important;
      min-height: unset !important;
      height: auto !important;
      flex-direction: row !important;
      justify-content: space-around !important;
      align-items: center !important;
      padding: 0 !important;
      border-right: none !important;
      border-top: 1px solid rgba(255,255,255,0.1) !important;
      box-shadow: 0 -4px 20px rgba(0,0,0,0.25) !important;
      z-index: 100;
    }
    #sidebar-top-section { display: none !important; }
    #sidebar-bottom-section { display: none !important; }
    #sidebar-mobile-nav { display: flex !important; }
    #app-main { padding-bottom: 72px !important; }
    header { padding: 10px 16px !important; }
    main { padding: 16px !important; }
    .stats-grid { grid-template-columns: 1fr !important; gap: 12px !important; }
    .bottom-grid { grid-template-columns: 1fr !important; gap: 16px !important; }
  }

  @media (min-width: 769px) {
    #sidebar-mobile-nav { display: none !important; }
  }

  /* Sidebar nav link */
  .sidebar-link {
    display: flex;
    align-items: center;
    padding: 10px 16px;
    border-radius: 12px;
    margin: 2px 4px;
    font-size: 13px;
    text-decoration: none;
    border-right: 3px solid transparent;
    transition: background 0.2s, color 0.2s;
    white-space: nowrap;
    color: rgba(255,255,255,0.55);
    cursor: pointer;
    background: transparent;
    border: none;
    width: calc(100% - 8px);
    text-align: left;
  }
  .sidebar-link:hover { background: rgba(255,255,255,0.07); color: rgba(255,255,255,0.9); }
  .sidebar-link.active { background: rgba(59,130,246,0.15); color: #fff; border-right: 3px solid #3B82F6; }
  .sidebar-link svg { flex-shrink: 0; }
  .sidebar-link .link-label { margin-left: 12px; overflow: hidden; transition: opacity 0.2s, max-width 0.3s; }
  #app-sidebar:not(.expanded) .link-label { opacity: 0; max-width: 0; pointer-events: none; }
  #app-sidebar.expanded .link-label { opacity: 1; max-width: 160px; }

  /* Plan card hidden when collapsed */
  #app-sidebar:not(.expanded) #sidebar-plan-card { display: none; }

  /* Main content */
  #app-main {
    flex: 1;
    display: flex;
    flex-direction: column;
    overflow-x: hidden;
    min-width: 0;
  }

  /* Responsive main padding */
  @media (max-width: 640px) {
    .main-padding { padding: 12px !important; }
    .card-padding { padding: 16px !important; }
    .qr-buttons { flex-direction: column !important; }
    .modal-grid { grid-template-columns: 1fr !important; }
  }
</style>

<body style="background:#F0F4FD;font-family:'Plus Jakarta Sans',sans-serif;color:#1E293B;margin:0;">
<div class="app-shell">

<!-- ═══════════════════════════════════════════════════
     SIDEBAR (desktop collapsible + mobile bottom bar)
════════════════════════════════════════════════════ -->
<aside id="app-sidebar">

  <!-- TOP: user avatar + toggle -->
  <div id="sidebar-top-section">
    <div style="display:flex;align-items:center;justify-content:space-between;padding:16px;border-bottom:1px solid rgba(255,255,255,0.08);">
      <div style="display:flex;align-items:center;gap:12px;">
        <div style="width:40px;height:40px;border-radius:12px;background:linear-gradient(135deg,#3B82F6,#06B6D4);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <span id="sidebar-email-first" style="color:#fff;font-weight:700;font-size:15px;"></span>
        </div>
        <div class="link-label" style="max-width:140px;">
          <span id="sidebar-email" style="color:#fff;font-size:12px;font-weight:600;display:block;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:130px;"></span>
          <p style="color:rgba(255,255,255,.4);font-size:11px;margin:2px 0 0;">Shopkeeper</p>
        </div>
      </div>
      <button onclick="toggleSidebar()" style="background:transparent;border:none;cursor:pointer;padding:6px;border-radius:8px;color:rgba(255,255,255,.5);" onmouseover="this.style.background='rgba(255,255,255,.1)'" onmouseout="this.style.background='transparent'">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
        </svg>
      </button>
    </div>

    <!-- Nav -->
    <nav style="margin-top:20px;">
      <p class="link-label" style="font-size:10px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:0 12px 8px;color:rgba(255,255,255,.3);display:block;max-width:unset;opacity:1;">Overview</p>
      <a href="/shopkeeper/dashboard" class="sidebar-link active">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        <span class="link-label">Dashboard</span>
      </a>
      <a href="/shopkeeper/catalog1" class="sidebar-link">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
        </svg>
        <span class="link-label">Lens Catalog</span>
      </a>
    </nav>

    <!-- Plan card (visible when expanded) -->
    <div id="sidebar-plan-card" style="margin:20px 12px 0;border-radius:16px;padding:16px;background:rgba(59,130,246,.12);border:1px solid rgba(59,130,246,.25);">
      <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
        <div style="width:32px;height:32px;border-radius:8px;background:rgba(59,130,246,.6);display:flex;align-items:center;justify-content:center;">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#fff">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
          </svg>
        </div>
        <span style="color:rgba(255,255,255,.9);font-size:13px;font-weight:600;">Current Plan</span>
      </div>
      <p style="color:#fff;font-size:17px;font-weight:800;margin:0;" id="sidebar-plan-name">—</p>
      <p style="color:rgba(255,255,255,.55);font-size:11px;margin:4px 0 2px;" id="sidebar-plan-price">Loading...</p>
      <p style="color:rgba(255,255,255,.4);font-size:11px;margin:0 0 10px;" id="sidebar-plan-expiry">—</p>
      <a href="/price">
        <button style="width:100%;background:linear-gradient(135deg,#3B82F6,#2563EB);color:#fff;border:none;border-radius:8px;padding:8px;font-size:13px;font-weight:600;cursor:pointer;" onmouseover="this.style.boxShadow='0 4px 14px rgba(59,130,246,.5)'" onmouseout="this.style.boxShadow=''">Update Plan</button>
      </a>
    </div>
  </div>

  <!-- BOTTOM: logout -->
  <div id="sidebar-bottom-section" style="padding:12px 8px;border-top:1px solid rgba(255,255,255,.08);">
    <button onclick="logout()" class="sidebar-link" style="color:rgba(239,68,68,.75);" onmouseover="this.style.background='rgba(239,68,68,.08)'" onmouseout="this.style.background='transparent'">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
      </svg>
      <span class="link-label">Logout</span>
    </button>
  </div>

  <!-- MOBILE bottom nav tabs -->
  <div id="sidebar-mobile-nav" style="display:none;width:100%;align-items:center;justify-content:space-around;padding:8px 0;">
    <a href="/shopkeeper/dashboard" style="display:flex;flex-direction:column;align-items:center;gap:4px;text-decoration:none;padding:6px 20px;border-radius:12px;background:rgba(59,130,246,.2);">
      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#fff">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
      </svg>
      <span style="color:#fff;font-size:10px;font-weight:600;">Dashboard</span>
    </a>
    <a href="/shopkeeper/catalog1" style="display:flex;flex-direction:column;align-items:center;gap:4px;text-decoration:none;padding:6px 20px;border-radius:12px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="rgba(255,255,255,.6)">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
      </svg>
      <span style="color:rgba(255,255,255,.6);font-size:10px;font-weight:500;">Catalog</span>
    </a>
    <button onclick="logout()" style="display:flex;flex-direction:column;align-items:center;gap:4px;background:transparent;border:none;cursor:pointer;padding:6px 20px;border-radius:12px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="rgba(239,68,68,.8)">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
      </svg>
      <span style="color:rgba(239,68,68,.8);font-size:10px;font-weight:500;">Logout</span>
    </button>
  </div>

</aside>


<!-- ═══════════════════════════════════════════════════
     MAIN CONTENT
════════════════════════════════════════════════════ -->
<div id="app-main" style="flex:1;display:flex;flex-direction:column;overflow-x:hidden;min-width:0;font-family:'Plus Jakarta Sans',sans-serif;">

  <!-- Header -->
  <header style="position:sticky;top:0;z-index:40;background:#fff;display:flex;justify-content:space-between;align-items:center;padding:14px 28px;border-bottom:1px solid #E8EDF6;">
    <div class="flex items-center gap-3">
      <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
      <h1 class="text-xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">VisionTech</h1>
      <span class="ml-2 px-2.5 py-0.5 text-xs font-semibold rounded-full" style="background:#EFF6FF;color:#3B82F6;">Shopkeeper</span>
    </div>
    <div class="flex items-center gap-4">
      <span id="admin-email" class="text-sm font-medium" style="color:#64748B;"></span>
    </div>
  </header>

  <!-- MAIN -->
  <main style="max-width:1280px;margin:0 auto;padding:32px 28px;width:100%;box-sizing:border-box;">

    <!-- STATS -->
    <div class="stats-grid" style="display:grid;grid-template-columns:repeat(2,1fr);gap:20px;margin-bottom:32px;">

      <!-- Total Try-Ons -->
      <div class="relative overflow-hidden p-6 transition-all duration-300 hover:-translate-y-1" style="background:#fff;border:1px solid #E8EDF6;border-radius:16px;" >
        <div class="absolute top-0 right-0 w-28 h-28 -mr-14 -mt-14 rounded-full" style="background:linear-gradient(135deg,#EFF6FF,#DBEAFE);opacity:.9;"></div>
        <div class="relative">
          <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:#EFF6FF;">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" style="color:#3B82F6;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
              </svg>
            </div>
            <span class="px-3 py-1 text-xs font-semibold rounded-full" style="background:#EFF6FF;color:#3B82F6;">Live</span>
          </div>
          <h3 class="text-sm font-medium mb-1" style="color:#64748B;">Total Try-Ons</h3>
          <p class="text-4xl font-bold" style="color:#0B1437;" id="total-tryons">—</p>
          <div class="mt-4 flex items-center text-xs text-green-600 font-semibold" id="tryon-change">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
            </svg>
            Loading...
          </div>
        </div>
      </div>

      <!-- Subscription -->
      <div class="relative overflow-hidden p-6 transition-all duration-300 hover:-translate-y-1" style="background:#fff;border:1px solid #E8EDF6;border-radius:16px;">
        <div class="absolute top-0 right-0 w-28 h-28 -mr-14 -mt-14 rounded-full" style="background:linear-gradient(135deg,#F5F3FF,#EDE9FE);opacity:.9;"></div>
        <div class="relative">
          <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:#F5F3FF;">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" style="color:#8B5CF6;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
              </svg>
            </div>
            <span id="subscription-badge" class="px-3 py-1 bg-indigo-50 text-indigo-700 text-xs font-semibold rounded-full">—</span>
          </div>
          <h3 class="text-sm font-medium mb-1" style="color:#64748B;">Subscription</h3>
          <p class="text-4xl font-bold" style="color:#0B1437;" id="subscription-plan">—</p>
          <div class="mt-4 flex items-center text-xs text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span id="days-remaining">Loading...</span>
          </div>
        </div>
      </div>
    </div>

    <!-- QR CODE + QUICK ACTIONS -->
    <div class="bottom-grid" style="display:grid;grid-template-columns:repeat(2,1fr);gap:28px;">

      <!-- QR Code Card -->
      <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="px-7 py-5 border-b" style="background:linear-gradient(135deg,#EFF6FF,#DBEAFE);border-color:#E8EDF6;">
          <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center shadow-md" style="background:#3B82F6;">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
              </svg>
            </div>
            <div>
              <h2 class="text-lg font-bold" style="color:#0B1437;">Your Shop's QR Code</h2>
              <p class="text-xs mt-0.5" style="color:#64748B;">Display this for customers to access your lens catalogue</p>
            </div>
          </div>
        </div>

        <div class="p-8">
          <div class="flex flex-col items-center my-6">
            <!-- QR rendered here by JS -->
            <div id="qr-wrapper" class="w-64 h-64 flex items-center justify-center rounded-2xl p-4" style="border:2px dashed #BFDBFE;background:linear-gradient(135deg,#EFF6FF,#DBEAFE);">
              <div id="qr-code-div" class="flex items-center justify-center w-full h-full"></div>
            </div>
            <!-- Fallback: server-stored image (if exists) -->
            <img id="shop-qr-img" src="" class="hidden w-64 h-64 object-contain rounded-2xl" alt="Shop QR Code">
            <p class="text-gray-500 text-xs mt-4">Scan to view lens catalogue</p>
          </div>

          <div class="qr-buttons" style="display:flex;gap:14px;margin-top:20px;">
            <button onclick="downloadQR()" class="flex-1 text-white py-3 rounded-xl font-semibold transition-all flex items-center justify-center gap-2 text-sm" style="background:linear-gradient(135deg,#3B82F6,#2563EB);box-shadow:0 4px 14px rgba(59,130,246,.3);" onmouseover="this.style.boxShadow='0 6px 20px rgba(59,130,246,.45)'" onmouseout="this.style.boxShadow='0 4px 14px rgba(59,130,246,.3)'">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
              </svg>
              Download QR
            </button>
            <button onclick="copyShopLink()" id="copy-btn" class="flex-1 font-semibold py-3 rounded-xl transition-all flex items-center justify-center gap-2 text-sm" style="border:1.5px solid #BFDBFE;color:#3B82F6;background:#fff;" onmouseover="this.style.background='#EFF6FF'" onmouseout="this.style.background='#fff'">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
              </svg>
              Copy Link
            </button>
          </div>

          <!-- Copied toast -->
          <div id="copy-toast" class="hidden mt-3 text-center text-sm text-green-600 font-semibold">
            ✓ Link copied to clipboard!
          </div>
        </div>
      </div>

      <!-- Quick Actions Panel -->
      <div class="overflow-hidden" style="background:#fff;border:1px solid #E8EDF6;border-radius:20px;">
        <div class="px-7 py-5 border-b" style="background:linear-gradient(135deg,#F5F3FF,#EDE9FE);border-color:#E8EDF6;">
          <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center shadow-md" style="background:#8B5CF6;">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
            <div>
              <h2 class="text-lg font-bold" style="color:#0B1437;">Quick Actions</h2>
              <p class="text-xs mt-0.5" style="color:#64748B;">Manage your shop, upgrade plans, or preview try-on</p>
            </div>
          </div>
        </div>

        <div class="p-8">
          <div class="space-y-3">

            <!-- Preview Try-On -->
            <a href="/shopkeeper/catalog1" class="group flex items-center justify-between p-4 rounded-xl transition-all duration-300" style="border:1px solid #E8EDF6;" onmouseover="this.style.borderColor='#BFDBFE';this.style.background='#EFF6FF'" onmouseout="this.style.borderColor='#E8EDF6';this.style.background='transparent'">
              <div class="flex items-center gap-4">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center transition-colors flex-shrink-0" style="background:#EFF6FF;">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" style="color:#3B82F6;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                </div>
                <div>
                  <h3 class="font-semibold text-sm transition-colors" style="color:#0B1437;">Preview Try-On Experience</h3>
                  <p class="text-xs mt-0.5" style="color:#64748B;">View how customers see your lens catalogue</p>
                </div>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 group-hover:text-cyan-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>

            <!-- Upgrade Plan -->
            <a href="/price" class="group flex items-center justify-between p-4 rounded-xl transition-all duration-300" style="border:1px solid #E8EDF6;" onmouseover="this.style.borderColor='#DDD6FE';this.style.background='#F5F3FF'" onmouseout="this.style.borderColor='#E8EDF6';this.style.background='transparent'">
              <div class="flex items-center gap-4">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center transition-colors flex-shrink-0" style="background:#F5F3FF;">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" style="color:#8B5CF6;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                  </svg>
                </div>
                <div>
                  <h3 class="font-semibold text-sm transition-colors" style="color:#0B1437;">Upgrade Plan</h3>
                  <p class="text-xs mt-0.5" style="color:#64748B;">Access premium features and tools</p>
                </div>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 group-hover:text-purple-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>

            <!-- Manage Shop Details — opens modal -->
            <button onclick="openShopModal()" class="w-full group flex items-center justify-between p-4 rounded-xl transition-all duration-300 text-left" style="border:1px solid #E8EDF6;" onmouseover="this.style.borderColor='#BFDBFE';this.style.background='#EFF6FF'" onmouseout="this.style.borderColor='#E8EDF6';this.style.background='transparent'">
              <div class="flex items-center gap-4">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center transition-colors flex-shrink-0" style="background:#EFF6FF;">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" style="color:#3B82F6;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                  </svg>
                </div>
                <div>
                  <h3 class="font-semibold text-sm transition-colors" style="color:#0B1437;">Manage Shop Details</h3>
                  <p class="text-xs mt-0.5" style="color:#64748B;">Update your shop information and settings</p>
                </div>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </button>

          </div>

          <!-- Help Card -->
          <div class="mt-5 p-4 rounded-xl" style="background:linear-gradient(135deg,#F8FAFF,#EEF2FF);border:1px solid #E0E7FF;">
            <div class="flex items-start gap-3">
              <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" style="background:#EFF6FF;">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div>
                <h4 class="font-semibold text-gray-900 mb-1">Need Help?</h4>
                <p class="text-sm text-gray-600 mb-3">Contact support for assistance with your shop setup.</p>
                <a href="/contact-us" class="text-sm font-medium text-blue-600 hover:text-blue-700 hover:underline">Contact Us →</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /grid -->

  </main>
  @include('web.layouts.footer')
</div><!-- /app-main -->
</div><!-- /app-shell -->


<!-- ═══════════════════════════════════════════════════
     MANAGE SHOP MODAL
════════════════════════════════════════════════════ -->
<div id="shopModal" class="hidden fixed inset-0 z-[200] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden">

    <!-- Modal Header -->
    <div class="px-8 py-5 border-b flex items-center justify-between" style="background:linear-gradient(135deg,#0B1437,#192566);border-color:rgba(255,255,255,.1);">
      <div>
        <h2 class="text-lg font-bold text-white">Manage Shop Details</h2>
        <p class="text-xs mt-0.5" style="color:rgba(255,255,255,.5);">Update your shop information</p>
      </div>
      <button onclick="closeShopModal()" class="p-1.5 rounded-lg transition-colors" style="color:rgba(255,255,255,.6);" onmouseover="this.style.background='rgba(255,255,255,.15)'" onmouseout="this.style.background='transparent'">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>

    <!-- Modal Body -->
    <div class="p-8">
      <div id="shop-modal-msg" class="hidden mb-4 p-3 rounded-lg text-sm font-medium"></div>

      <div class="space-y-4">
        <div class="modal-grid" style="display:grid;grid-template-columns:repeat(2,1fr);gap:16px;">
          <div>
            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wide">Shop Name</label>
            <input id="field-shop-name" type="text" placeholder="e.g. VisionCare Optics"
              class="w-full rounded-xl px-4 py-3 text-sm transition-all" style="border:1.5px solid #E2E8F0;outline:none;font-family:'Plus Jakarta Sans',sans-serif;color:#0B1437;" onfocus="this.style.borderColor='#3B82F6';this.style.boxShadow='0 0 0 3px rgba(59,130,246,.1)'" onblur="this.style.borderColor='#E2E8F0';this.style.boxShadow='none'" />
          </div>
          <div>
            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wide">Retailer Name</label>
            <input id="field-retailer-name" type="text" placeholder="Your name"
              class="w-full rounded-xl px-4 py-3 text-sm transition-all" style="border:1.5px solid #E2E8F0;outline:none;font-family:'Plus Jakarta Sans',sans-serif;color:#0B1437;" onfocus="this.style.borderColor='#3B82F6';this.style.boxShadow='0 0 0 3px rgba(59,130,246,.1)'" onblur="this.style.borderColor='#E2E8F0';this.style.boxShadow='none'" />
          </div>
        </div>
        <div>
          <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wide">Phone Number</label>
          <input id="field-phone" type="tel" placeholder="+92 300 0000000"
            class="w-full rounded-xl px-4 py-3 text-sm transition-all" style="border:1.5px solid #E2E8F0;outline:none;font-family:'Plus Jakarta Sans',sans-serif;color:#0B1437;" onfocus="this.style.borderColor='#3B82F6';this.style.boxShadow='0 0 0 3px rgba(59,130,246,.1)'" onblur="this.style.borderColor='#E2E8F0';this.style.boxShadow='none'" />
        </div>
        <div>
          <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wide">Address</label>
          <input id="field-address" type="text" placeholder="Shop address"
            class="w-full rounded-xl px-4 py-3 text-sm transition-all" style="border:1.5px solid #E2E8F0;outline:none;font-family:'Plus Jakarta Sans',sans-serif;color:#0B1437;" onfocus="this.style.borderColor='#3B82F6';this.style.boxShadow='0 0 0 3px rgba(59,130,246,.1)'" onblur="this.style.borderColor='#E2E8F0';this.style.boxShadow='none'" />
        </div>
        <div>
          <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wide">City</label>
          <input id="field-city" type="text" placeholder="City"
            class="w-full rounded-xl px-4 py-3 text-sm transition-all" style="border:1.5px solid #E2E8F0;outline:none;font-family:'Plus Jakarta Sans',sans-serif;color:#0B1437;" onfocus="this.style.borderColor='#3B82F6';this.style.boxShadow='0 0 0 3px rgba(59,130,246,.1)'" onblur="this.style.borderColor='#E2E8F0';this.style.boxShadow='none'" />
        </div>
      </div>

      <div class="flex gap-3 mt-6">
        <button onclick="closeShopModal()" class="flex-1 py-3 rounded-xl font-semibold transition-all text-sm" style="border:1.5px solid #E2E8F0;color:#475569;background:#F1F5F9;cursor:pointer;" onmouseover="this.style.background='#E2E8F0'" onmouseout="this.style.background='#F1F5F9'">
          Cancel
        </button>
        <button onclick="saveShopDetails()" id="save-shop-btn" class="flex-1 text-white py-3 rounded-xl font-semibold transition-all flex items-center justify-center gap-2 text-sm" style="background:linear-gradient(135deg,#3B82F6,#2563EB);box-shadow:0 4px 14px rgba(59,130,246,.3);" onmouseover="this.style.boxShadow='0 6px 20px rgba(59,130,246,.45)'" onmouseout="this.style.boxShadow='0 4px 14px rgba(59,130,246,.3)'">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
          </svg>
          Save Changes
        </button>
      </div>
    </div>
  </div>
</div>


<!-- ═══════════════════════════════════════════════════
     ALL JAVASCRIPT
════════════════════════════════════════════════════ -->
<script>
// ─────────────────────────────────────────────
// SIDEBAR TOGGLE
// ─────────────────────────────────────────────
function toggleSidebar() {
  document.getElementById('app-sidebar').classList.toggle('expanded');
}

// ─────────────────────────────────────────────
// STATE
// ─────────────────────────────────────────────
let dashboardData   = null;
let shopCatalogLink = '';
let qrCodeInstance  = null;

// ─────────────────────────────────────────────
// BOOT
// ─────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', function () {
  const token    = localStorage.getItem('auth_token');
  const role     = localStorage.getItem('user_role');
  const userInfo = JSON.parse(localStorage.getItem('user_info') || '{}');

  // Auth guard
  if (!token || role !== 'shopkeeper') {
    alert('Please login as a shopkeeper to access this page');
    window.location.href = '/signup';
    return;
  }

  // Populate header/sidebar with user info immediately
  if (userInfo.email) {
    document.getElementById('admin-email').textContent        = userInfo.email;
    document.getElementById('sidebar-email').textContent      = userInfo.email;
    document.getElementById('sidebar-email-first').textContent = userInfo.email.charAt(0).toUpperCase();
  }

  loadDashboardData(token);
});


// ─────────────────────────────────────────────
// API: LOAD DASHBOARD
// ─────────────────────────────────────────────
async function loadDashboardData(token) {
  try {
    const response = await fetch('/api/shopkeeper/dashboard', {
      method: 'GET',
      headers: {
        'Authorization': 'Bearer ' + token,
        'Accept': 'application/json'
      }
    });

    const result = await response.json();

    if (response.ok && result.success) {
      dashboardData = result.data;
      updateDashboardUI(result.data);
    } else {
      showToast('Failed to load dashboard: ' + (result.message || 'Unknown error'), 'error');
    }
  } catch (error) {
    console.error('Dashboard load error:', error);
    showToast('Could not connect to server. Please refresh.', 'error');
  }
}


// ─────────────────────────────────────────────
// UI: UPDATE ALL DASHBOARD ELEMENTS
// ─────────────────────────────────────────────
function updateDashboardUI(data) {
  const stats = data.stats || {};
  const shop  = data.shop  || {};
  const qr    = data.qr_code || {};

  // ── Stats cards ──────────────────────────────
  document.getElementById('total-tryons').textContent =
    (stats.total_tryons ?? 0).toLocaleString();

  const planName = stats.subscription_plan || 'No Plan';
  document.getElementById('subscription-plan').textContent = planName;

  const daysLeft = stats.days_remaining ?? 0;
  const daysEl   = document.getElementById('days-remaining');
  daysEl.textContent = daysLeft > 0 ? `${daysLeft} days remaining` : 'Plan expired';
  daysEl.className   = daysLeft > 0
    ? 'text-xs text-gray-500'
    : 'text-xs text-red-500 font-semibold';

  const badge      = document.getElementById('subscription-badge');
  const planStatus = stats.plan_status || 'none';
  const isActive   = planStatus === 'active' && daysLeft > 0;
  const isExpired  = planStatus === 'expired' || (planStatus === 'active' && daysLeft === 0);

  badge.textContent = isActive ? 'Active' : isExpired ? 'Expired' : 'No Plan';
  badge.className   = isActive
    ? 'px-3 py-1 bg-indigo-50 text-indigo-700 text-xs font-semibold rounded-full'
    : isExpired
      ? 'px-3 py-1 bg-red-50 text-red-600 text-xs font-semibold rounded-full'
      : 'px-3 py-1 bg-gray-100 text-gray-500 text-xs font-semibold rounded-full';

  // Tryon change indicator
  const changePct = stats.tryon_change_pct;
  if (changePct !== undefined && changePct !== null) {
    document.getElementById('tryon-change').innerHTML = changePct >= 0
      ? `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>+${changePct}% from last month`
      : `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17H5m0 0v-8m0 8l8-8 4 4 6-6"/></svg>${changePct}% from last month`;
  } else {
    document.getElementById('tryon-change').textContent = 'No data yet';
  }

  // ── Sidebar plan ─────────────────────────────
  document.getElementById('sidebar-plan-name').textContent   = planName;
  document.getElementById('sidebar-plan-price').textContent  = stats.plan_price  || '—';
  document.getElementById('sidebar-plan-expiry').textContent = stats.plan_expiry  ? 'Expires: ' + stats.plan_expiry : '—';

  // ── QR Code ──────────────────────────────────
  shopCatalogLink = qr.catalog_url || (window.location.origin + '/shopkeeper/catalog1');

  if (qr.qr_image) {
    // Use server-stored image if provided
    const img = document.getElementById('shop-qr-img');
    img.src = '/storage/' + qr.qr_image;
    img.onerror = () => { img.onerror = null; generateQRCode(shopCatalogLink); };
    img.classList.remove('hidden');
    document.getElementById('qr-wrapper').classList.add('hidden');
  } else {
    // Generate QR client-side
    generateQRCode(shopCatalogLink);
  }

  // ── Pre-fill shop modal ───────────────────────
  if (shop) {
    document.getElementById('field-shop-name').value     = shop.shop_name     || '';
    document.getElementById('field-retailer-name').value = shop.retailer_name || '';
    document.getElementById('field-phone').value          = shop.phone          || '';
    document.getElementById('field-address').value        = shop.address        || '';
    document.getElementById('field-city').value           = shop.city           || '';
  }
}


// ─────────────────────────────────────────────
// QR CODE: GENERATE CLIENT-SIDE
// ─────────────────────────────────────────────
function generateQRCode(url) {
  const container = document.getElementById('qr-code-div');
  container.innerHTML = ''; // clear any previous

  qrCodeInstance = new QRCode(container, {
    text:          url,
    width:         220,
    height:        220,
    colorDark:     '#0e7490',   // cyan-700
    colorLight:    '#f0fdff',
    correctLevel:  QRCode.CorrectLevel.H
  });
}


// ─────────────────────────────────────────────
// QR: DOWNLOAD
// ─────────────────────────────────────────────
function downloadQR() {
  // Try canvas first (generated QR)
  const canvas = document.querySelector('#qr-code-div canvas');
  if (canvas) {
    const link      = document.createElement('a');
    link.download   = 'shop-qr-code.png';
    link.href       = canvas.toDataURL('image/png');
    link.click();
    return;
  }

  // Fallback: server image
  const img = document.getElementById('shop-qr-img');
  if (img && img.src) {
    const link    = document.createElement('a');
    link.download = 'shop-qr-code.png';
    link.href     = img.src;
    link.click();
  }
}


// ─────────────────────────────────────────────
// QR: COPY LINK
// ─────────────────────────────────────────────
function copyShopLink() {
  const link = shopCatalogLink || (window.location.origin + '/shopkeeper/catalog1');

  navigator.clipboard.writeText(link).then(() => {
    const toast = document.getElementById('copy-toast');
    const btn   = document.getElementById('copy-btn');
    toast.classList.remove('hidden');
    btn.classList.add('bg-green-50', 'border-green-400', 'text-green-600');
    setTimeout(() => {
      toast.classList.add('hidden');
      btn.classList.remove('bg-green-50', 'border-green-400', 'text-green-600');
    }, 2500);
  }).catch(() => {
    // Fallback for older browsers
    const ta    = document.createElement('textarea');
    ta.value    = link;
    document.body.appendChild(ta);
    ta.select();
    document.execCommand('copy');
    document.body.removeChild(ta);
    document.getElementById('copy-toast').classList.remove('hidden');
    setTimeout(() => document.getElementById('copy-toast').classList.add('hidden'), 2500);
  });
}


// ─────────────────────────────────────────────
// SHOP MODAL: OPEN / CLOSE
// ─────────────────────────────────────────────
function openShopModal() {
  document.getElementById('shopModal').classList.remove('hidden');
  document.getElementById('shop-modal-msg').classList.add('hidden');
}

function closeShopModal() {
  document.getElementById('shopModal').classList.add('hidden');
}

// Close modal on backdrop click
document.getElementById('shopModal').addEventListener('click', function (e) {
  if (e.target === this) closeShopModal();
});


// ─────────────────────────────────────────────
// SHOP MODAL: SAVE DETAILS
// ─────────────────────────────────────────────
async function saveShopDetails() {
  const token  = localStorage.getItem('auth_token');
  const btn    = document.getElementById('save-shop-btn');
  const msgEl  = document.getElementById('shop-modal-msg');

  const payload = {
    shop_name:     document.getElementById('field-shop-name').value.trim(),
    retailer_name: document.getElementById('field-retailer-name').value.trim(),
    phone:         document.getElementById('field-phone').value.trim(),
    address:       document.getElementById('field-address').value.trim(),
    city:          document.getElementById('field-city').value.trim(),
  };

  if (!payload.shop_name) {
    showModalMsg('Shop name is required.', 'error');
    return;
  }

  btn.disabled     = true;
  btn.innerHTML    = '<svg class="animate-spin w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>Saving...';

  try {
    const response = await fetch('/api/shopkeeper/update-shop', {
      method: 'POST',
      headers: {
        'Authorization': 'Bearer ' + token,
        'Accept':        'application/json',
        'Content-Type':  'application/json'
      },
      body: JSON.stringify(payload)
    });

    const result = await response.json();

    if (response.ok && result.success) {
      showModalMsg('✓ Shop details updated successfully!', 'success');
      // Update sidebar plan name if shop name changed
      setTimeout(() => closeShopModal(), 1500);
    } else {
      showModalMsg(result.message || 'Failed to update shop details.', 'error');
    }
  } catch (err) {
    showModalMsg('Connection error. Please try again.', 'error');
  } finally {
    btn.disabled  = false;
    btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Save Changes';
  }
}

function showModalMsg(msg, type) {
  const el = document.getElementById('shop-modal-msg');
  el.textContent  = msg;
  el.className    = type === 'success'
    ? 'mb-4 p-3 rounded-lg text-sm font-medium bg-green-50 text-green-700 border border-green-200'
    : 'mb-4 p-3 rounded-lg text-sm font-medium bg-red-50 text-red-700 border border-red-200';
  el.classList.remove('hidden');
}


// ─────────────────────────────────────────────
// TOAST HELPER
// ─────────────────────────────────────────────
function showToast(message, type = 'info') {
  const toast = document.createElement('div');
  toast.className = `fixed bottom-6 right-6 z-[9999] px-5 py-3 rounded-xl shadow-xl text-sm font-semibold transition-all ${
    type === 'error' ? 'bg-red-600 text-white' : 'bg-gray-900 text-white'
  }`;
  toast.textContent = message;
  document.body.appendChild(toast);
  setTimeout(() => toast.remove(), 4000);
}


// ─────────────────────────────────────────────
// LOGOUT
// ─────────────────────────────────────────────
async function logout() {
  const token = localStorage.getItem('auth_token');
  try {
    await fetch('/api/logout', {
      method: 'POST',
      headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
    });
  } catch (e) {}
  localStorage.removeItem('auth_token');
  localStorage.removeItem('user_role');
  localStorage.removeItem('user_info');
  window.location.href = '/signup';
}
</script>

</body>
</html>