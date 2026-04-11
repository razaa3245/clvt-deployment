<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LensPilot - Login & Signup</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --accent:  rgba(140,100,255,0.92);
      --accent2: rgba(160,120,255,1);
      --text:    rgba(255,255,255,0.95);
      --muted:   rgba(255,255,255,0.50);
      --link:    rgba(200,175,255,0.95);
      --error:   rgba(255,100,100,0.9);
      --success: rgba(80,220,160,0.9);
    }

    html, body {
      height: 100%; min-height: 100vh;
      font-family: 'DM Sans', sans-serif;
      color: var(--text); margin: 0; padding: 0;
      background-image: url("{{ asset('images/back2.png') }}");
      background-size: cover; background-position: center;
      background-attachment: fixed; background-repeat: no-repeat;
      background-color: #0a0a0a;
    }

    body::before {
      content: ''; position: fixed; inset: 0;
      background: rgba(0,0,0,0.35);
      z-index: 0; pointer-events: none;
    }

    /* ── WRAPPER: card flush to the right ── */
    .auth-wrapper {
      width: 100%; min-height: 100vh;
      display: flex; align-items: center;
      justify-content: flex-end;
      padding: 24px 200px 24px 24px;
      position: relative; z-index: 1;
    }

    /* ── CARD ── */
    .auth-card {
      display: flex; width: 100%; max-width: 900px; min-height: 580px;
      background: rgba(255,255,255,0.07);
      backdrop-filter: blur(44px) saturate(200%) brightness(1.1);
      -webkit-backdrop-filter: blur(44px) saturate(200%) brightness(1.1);
      border-radius: 28px; overflow: hidden;
      border: 1px solid rgba(255,255,255,0.22);
      box-shadow: 0 2px 0 0 rgba(255,255,255,0.20) inset,
                  0 40px 80px rgba(0,0,0,0.60), 0 8px 32px rgba(0,0,0,0.35);
      position: relative; z-index: 1;
    }
    .auth-card::after {
      content: ""; position: absolute; top: 0; left: 0; right: 0; height: 1px;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.55) 30%, rgba(255,255,255,0.55) 70%, transparent);
      z-index: 10; pointer-events: none;
    }

    /* ══ LEFT PANEL — carousel ══ */
    .left-panel { position: relative; flex: 0 0 42%; overflow: hidden; }

    .carousel-track {
      display: flex; width: 100%; height: 100%;
      transition: transform 0.55s cubic-bezier(0.65,0,0.35,1);
    }

    .carousel-slide {
      flex: 0 0 100%; min-height: 580px;
      position: relative; display: flex; flex-direction: column;
      justify-content: space-between; padding: 28px;
    }
    /* ── NEW CAROUSEL IMAGE STYLE ── */
.carousel-slide img.slide-bg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 0; /* Sits behind the text content */
}

/* Ensure the overlay sits ON TOP of the image but BELOW the text */
.carousel-slide::before {
  z-index: 1; 
}

.slide-top, .slide-bottom {
  z-index: 2; /* Keeps text and buttons on top */
}
    /* Slide background colours */
    .slide-1 { background: linear-gradient(145deg, #12033a 0%, #2e1065 55%, #3b0764 100%); }
    .slide-2 { background: linear-gradient(145deg, #03122a 0%, #0c2d6b 55%, #1a3a7a 100%); }
    .slide-3 { background: linear-gradient(145deg, #1a0520 0%, #5b1545 55%, #7c1560 100%); }

    /* Subtle overlay on each slide */
    .carousel-slide::before {
      content: ''; position: absolute; inset: 0; z-index: 1; pointer-events: none;
      background: linear-gradient(to bottom, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.40) 100%);
    }

    .slide-top, .slide-bottom { position: relative; z-index: 2; }

    /* ── ANIMATED LOGO ── */
    .logo { display: flex; align-items: center; gap: 10px; text-decoration: none; }

    .logo-mark { width: 38px; height: 38px; position: relative; flex-shrink: 0; }
    .logo-mark svg { width: 100%; height: 100%; overflow: visible; }

    .ring-spin {
      transform-origin: 19px 19px;
      animation: ringRotate 5s linear infinite;
    }
    @keyframes ringRotate { to { transform: rotate(360deg); } }

    .dot-pulse { animation: dotGlow 2.2s ease-in-out infinite; }
    @keyframes dotGlow {
      0%,100% { opacity: 0.65; transform: scale(1); }
      50%      { opacity: 1;    transform: scale(1.35); }
    }

    .logo-text {
      font-family: 'Sora', sans-serif; font-size: 17px;
      font-weight: 700; color: #fff; letter-spacing: -0.2px;
    }

    /* ── BACK BTN — right of logo ── */
    .logo-row {
      display: flex; align-items: center;
      justify-content: space-between; gap: 8px;
    }
    .back-btn {
      display: inline-flex; align-items: center; gap: 5px;
      background: rgba(255,255,255,0.10);
      border: 1px solid rgba(255,255,255,0.20);
      color: rgba(255,255,255,0.85);
      font-family: 'DM Sans', sans-serif; font-size: 11.5px; font-weight: 500;
      padding: 6px 12px; border-radius: 100px;
      text-decoration: none; cursor: pointer; white-space: nowrap;
      backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
      transition: background 0.2s, color 0.2s; flex-shrink: 0;
    }
    .back-btn:hover { background: rgba(255,255,255,0.18); color: #fff; }

    /* ── CAPTION ── */
    .slide-caption h2 {
      font-family: 'Sora', sans-serif; font-size: 23px; font-weight: 600;
      color: #fff; line-height: 1.3; letter-spacing: -0.3px;
    }
    .slide-caption p {
      font-size: 13px; color: rgba(255,255,255,0.52);
      margin-top: 7px; line-height: 1.55;
    }

    /* ── DOTS + ARROWS ── */
    .carousel-nav {
      display: flex; align-items: center; gap: 8px; margin-top: 18px;
    }
    .dot {
      height: 3px; border-radius: 2px;
      background: rgba(255,255,255,0.30); cursor: pointer;
      transition: background 0.3s, width 0.3s;
    }
    .dot.active { background: #fff; width: 26px !important; }
    .dot:not(.active) { width: 11px; }

    .nav-arrows { margin-left: auto; display: flex; gap: 6px; }
    .arr-btn {
      width: 26px; height: 26px; border-radius: 50%;
      border: 1px solid rgba(255,255,255,0.24);
      background: rgba(255,255,255,0.08);
      color: rgba(255,255,255,0.72); display: flex;
      align-items: center; justify-content: center;
      cursor: pointer; transition: background 0.2s, color 0.2s; flex-shrink: 0;
    }
    .arr-btn:hover { background: rgba(255,255,255,0.20); color: #fff; }

    /* ══ RIGHT PANEL ══ */
    .right-panel {
      flex: 1; padding: 42px 38px; overflow-y: auto;
      display: flex; flex-direction: column; justify-content: center;
      background: rgba(255,255,255,0.08);
      border-left: 1px solid rgba(255,255,255,0.14);
    }

    /* ── TABS ── */
    .tab-bar {
      display: flex; margin-bottom: 26px;
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255,255,255,0.14);
      border-radius: 13px; padding: 4px;
    }
    .tab-btn {
      flex: 1; padding: 9px; border: none;
      background: transparent; color: rgba(255,255,255,0.48);
      font-family: 'DM Sans', sans-serif; font-size: 13px; font-weight: 500;
      cursor: pointer; border-radius: 9px;
      transition: background 0.2s, color 0.2s;
    }
    .tab-btn.active { background: var(--accent); color: #fff; box-shadow: 0 2px 8px rgba(124,92,252,0.4); }

    /* ── FORM HEADER ── */
    .form-header { margin-bottom: 26px; }
    .form-title {
      font-family: 'Sora', sans-serif; font-size: 28px; font-weight: 700;
      color: #fff; letter-spacing: -0.5px; line-height: 1.2; margin-bottom: 7px;
    }
    .form-subtitle { font-size: 13.5px; color: rgba(255,255,255,0.50); }
    .form-subtitle a { color: var(--link); text-decoration: none; font-weight: 500; }
    .form-subtitle a:hover { text-decoration: underline; }

    /* ── FIELDS ── */
    .field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 11px; }
    .field { position: relative; margin-bottom: 11px; }
    .field input, .field textarea {
      width: 100%;
      background: rgba(255,255,255,0.10);
      backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,0.24); border-radius: 11px;
      color: #fff; box-shadow: 0 1px 0 rgba(255,255,255,0.12) inset;
      font-family: 'DM Sans', sans-serif; font-size: 13.5px;
      padding: 12px 15px; outline: none;
      transition: border-color 0.2s, background 0.2s, box-shadow 0.2s;
      -webkit-appearance: none;
    }
    .field textarea { resize: none; line-height: 1.5; }
    .field input::placeholder, .field textarea::placeholder { color: rgba(255,255,255,0.36); }
    .field input:focus, .field textarea:focus {
      border-color: rgba(180,140,255,0.8);
      background: rgba(255,255,255,0.15);
      box-shadow: 0 0 0 3px rgba(160,120,255,0.20), 0 1px 0 rgba(255,255,255,0.15) inset;
    }
    .field.password-field input { padding-right: 42px; }
    .toggle-pw {
      position: absolute; right: 13px; top: 50%;
      transform: translateY(-50%); background: none; border: none;
      cursor: pointer; color: rgba(255,255,255,0.40);
      display: flex; align-items: center; padding: 0; transition: color 0.2s;
    }
    .toggle-pw:hover { color: rgba(255,255,255,0.9); }

    /* ── CHECKBOX ── */
    .checkbox-label {
      display: flex; align-items: center; gap: 9px;
      font-size: 12.5px; color: rgba(255,255,255,0.50);
      cursor: pointer; margin-bottom: 17px; user-select: none;
    }
    .checkbox-label input[type="checkbox"] {
      appearance: none; -webkit-appearance: none;
      width: 17px; height: 17px; min-width: 17px; border-radius: 5px;
      border: 1.5px solid rgba(255,255,255,0.28);
      background: rgba(255,255,255,0.10); cursor: pointer;
      position: relative; transition: background 0.2s, border-color 0.2s;
    }
    .checkbox-label input[type="checkbox"]:checked { background: var(--accent); border-color: var(--accent); }
    .checkbox-label input[type="checkbox"]:checked::after {
      content: ''; position: absolute; inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg width='11' height='8' viewBox='0 0 11 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 4L4 7L10 1' stroke='white' stroke-width='1.8' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
      background-repeat: no-repeat; background-position: center;
    }
    .checkbox-label a { color: var(--link); text-decoration: none; }
    .checkbox-label a:hover { text-decoration: underline; }

    /* ── PRIMARY BUTTON ── */
    .btn-primary {
      width: 100%; padding: 13px; border-radius: 11px; border: none;
      background: var(--accent); color: #fff;
      font-family: 'Sora', sans-serif; font-size: 14px; font-weight: 600;
      cursor: pointer; box-shadow: 0 4px 20px rgba(124,92,252,0.35);
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
      letter-spacing: 0.1px;
    }
    .btn-primary:hover { background: var(--accent2); transform: translateY(-1px); box-shadow: 0 8px 28px rgba(124,92,252,0.45); }
    .btn-primary:active { transform: translateY(0); }

    /* ── DIVIDER ── */
    .divider { display: flex; align-items: center; gap: 11px; margin: 16px 0; color: rgba(255,255,255,0.38); font-size: 12px; }
    .divider::before, .divider::after { content: ''; flex: 1; height: 1px; background: rgba(255,255,255,0.16); }

    /* ── SOCIAL ── */
    .social-row { display: grid; grid-template-columns: 1fr 1fr; gap: 9px; }
    .btn-social {
      display: flex; align-items: center; justify-content: center; gap: 8px;
      padding: 10px 13px; border-radius: 11px;
      border: 1px solid rgba(255,255,255,0.20);
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
      color: rgba(255,255,255,0.88); box-shadow: 0 1px 0 rgba(255,255,255,0.10) inset;
      font-family: 'DM Sans', sans-serif; font-size: 13px; font-weight: 500;
      cursor: pointer; transition: background 0.2s, border-color 0.2s;
    }
    .btn-social:hover { background: rgba(255,255,255,0.15); border-color: rgba(255,255,255,0.34); }
    .btn-social svg { flex-shrink: 0; }

    /* ── MESSAGES ── */
    #message { font-size: 13px; margin-top: 8px; min-height: 18px; }
    .msg-error { color: var(--error); } .msg-success { color: var(--success); }
    .alert { margin-top: 8px; padding: 9px 13px; border-radius: 9px; font-size: 13px; }
    .alert-success { background: rgba(78,204,163,0.10); color: var(--success); border: 1px solid rgba(78,204,163,0.22); }
    .alert-error   { background: rgba(255,107,107,0.10); color: var(--error);   border: 1px solid rgba(255,107,107,0.22); }

    /* ── LOADER ── */
    .loader-overlay {
      position: fixed; inset: 0; background: rgba(10,10,20,0.65);
      backdrop-filter: blur(12px); display: flex; align-items: center; justify-content: center;
      z-index: 9999; opacity: 0; visibility: hidden;
      transition: opacity 0.3s, visibility 0.3s;
    }
    .loader-overlay.active { opacity: 1; visibility: visible; }
    .loader-ring-wrap { position: relative; width: 68px; height: 68px; }
    .l-ring { position: absolute; inset: 0; border-radius: 50%; border: 3px solid transparent; }
    .l-ring-1 { border-top-color: var(--accent); animation: spin 1s linear infinite; }
    .l-ring-2 { inset: 8px; border-top-color: rgba(124,92,252,0.4); animation: spin 0.7s linear infinite reverse; }
    @keyframes spin { to { transform: rotate(360deg); } }

    /* ── MODAL ── */
    #dashboardModal {
      position: fixed; inset: 0; background: rgba(0,0,0,0.60);
      display: flex; align-items: center; justify-content: center;
      z-index: 9998; backdrop-filter: blur(6px);
    }
    #dashboardModal.hidden { display: none; }
    .modal-box {
      background: rgba(255,255,255,0.09);
      backdrop-filter: blur(50px) saturate(200%); -webkit-backdrop-filter: blur(50px) saturate(200%);
      border: 1px solid rgba(255,255,255,0.22);
      box-shadow: 0 2px 0 rgba(255,255,255,0.18) inset, 0 32px 80px rgba(0,0,0,0.55);
      border-radius: 24px; padding: 38px 34px; max-width: 400px; width: 100%; text-align: center;
    }
    .modal-icon { width: 58px; height: 58px; background: rgba(80,220,160,0.12); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 18px; }
    .modal-box h3 { font-family: 'Sora', sans-serif; font-size: 21px; font-weight: 700; color: #fff; margin-bottom: 9px; }
    .modal-box p  { font-size: 13.5px; color: rgba(255,255,255,0.56); margin-bottom: 26px; }
    .modal-actions { display: flex; flex-direction: column; gap: 9px; }
    .modal-btn-secondary {
      padding: 12px; border-radius: 11px;
      border: 1px solid rgba(255,255,255,0.20); background: rgba(255,255,255,0.07);
      color: rgba(255,255,255,0.58); font-family: 'DM Sans', sans-serif; font-size: 13.5px; font-weight: 500;
      cursor: pointer; transition: background 0.2s, color 0.2s;
    }
    .modal-btn-secondary:hover { background: rgba(255,255,255,0.14); color: #fff; }

    /* ── RESPONSIVE ── */
    @media (max-width: 780px) {
      .auth-wrapper { justify-content: center; padding: 16px; }
      .auth-card { flex-direction: column; min-height: auto; max-width: 440px; }
      .left-panel  { flex: 0 0 auto; }
      .carousel-slide { min-height: 210px; }
      .right-panel { padding: 26px 20px; }
      .field-row { grid-template-columns: 1fr; }
    }

    .hidden { display: none !important; }
  </style>
</head>

<body>
  <!-- LOADER -->
  <div class="loader-overlay" id="loaderOverlay">
    <div style="display:flex;flex-direction:column;align-items:center;gap:18px;">
      <div class="loader-ring-wrap">
        <div class="l-ring l-ring-1"></div>
        <div class="l-ring l-ring-2"></div>
      </div>
      <span style="color:rgba(255,255,255,0.6);font-size:13px;letter-spacing:0.5px;">Please wait…</span>
    </div>
  </div>

  <div class="auth-wrapper">
    <div class="auth-card">

      <!-- ══ LEFT PANEL ══ -->
      <div class="left-panel">
        <div class="carousel-track" id="carouselTrack">

          <!-- ── Slide 1 ── -->
          <div class="carousel-slide slide-1">
            <img src="{{ asset('images/c1.jpg') }}" alt="Capturing Moments" class="slide-bg">
            <div class="slide-top">
              <div class="logo-row">
                <a href="/" class="logo">
                  <div class="logo-mark">
                    <svg viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <!-- spinning dashed ring with orbiting dot -->
                      <g class="ring-spin">
                        <circle cx="19" cy="19" r="15.5" stroke="rgba(255,255,255,0.55)" stroke-width="1.3" stroke-dasharray="5 3.5" stroke-linecap="round"/>
                        <circle cx="19" cy="3.5" r="2.2" fill="white" opacity="0.95"/>
                      </g>
                      <!-- static hexagon frame -->
                      <path d="M19 8L27.5 13V23L19 28L10.5 23V13L19 8Z"
                            stroke="rgba(255,255,255,0.85)" stroke-width="1.4"
                            stroke-linejoin="round" fill="rgba(255,255,255,0.07)"/>
                      <!-- pulsing center dot -->
                      <circle class="dot-pulse" cx="19" cy="19" r="3.2" fill="white" opacity="0.95"/>
                    </svg>
                  </div>
                  <span class="logo-text">LensPilot</span>
                </a>
                <a href="/" class="back-btn">
                  Back to website
                  <svg width="11" height="11" viewBox="0 0 14 14" fill="none">
                    <path d="M3 7H11M11 7L7.5 3.5M11 7L7.5 10.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </a>
              </div>
            </div>
            <div class="slide-bottom">
              <div class="slide-caption">
                <h2>Capturing Moments,<br>Creating Memories</h2>
                <p>Store and relive every precious moment with crystal clarity.</p>
              </div>
              <div class="carousel-nav">
                <div class="dot active" data-index="0"></div>
                <div class="dot" data-index="1"></div>
                <div class="dot" data-index="2"></div>
                <div class="nav-arrows">
                  <button class="arr-btn" id="prevBtn">
                    <svg width="11" height="11" viewBox="0 0 14 14" fill="none"><path d="M9 3L5 7L9 11" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </button>
                  <button class="arr-btn" id="nextBtn">
                    <svg width="11" height="11" viewBox="0 0 14 14" fill="none"><path d="M5 3L9 7L5 11" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- ── Slide 2 ── -->
          <div class="carousel-slide slide-2">
            <img src="{{ asset('images/c2.png') }}" alt="Capturing Moments" class="slide-bg">
            <div class="slide-top">
              <div class="logo-row">
                <a href="/" class="logo">
                  <div class="logo-mark">
                    <svg viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g class="ring-spin">
                        <circle cx="19" cy="19" r="15.5" stroke="rgba(255,255,255,0.55)" stroke-width="1.3" stroke-dasharray="5 3.5" stroke-linecap="round"/>
                        <circle cx="19" cy="3.5" r="2.2" fill="white" opacity="0.95"/>
                      </g>
                      <path d="M19 8L27.5 13V23L19 28L10.5 23V13L19 8Z" stroke="rgba(255,255,255,0.85)" stroke-width="1.4" stroke-linejoin="round" fill="rgba(255,255,255,0.07)"/>
                      <circle class="dot-pulse" cx="19" cy="19" r="3.2" fill="white" opacity="0.95"/>
                    </svg>
                  </div>
                  <span class="logo-text">LensPilot</span>
                </a>
                <a href="/" class="back-btn">
                  Back to website
                  <svg width="11" height="11" viewBox="0 0 14 14" fill="none"><path d="M3 7H11M11 7L7.5 3.5M11 7L7.5 10.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
              </div>
            </div>
            <div class="slide-bottom">
              <div class="slide-caption">
                <h2>Smart Way of Selection,<br>Zero Hassle</h2>
                <p>Try lenses in real-time and choose the best for you.</p>
              </div>
              <div class="carousel-nav">
                <div class="dot" data-index="0"></div>
                <div class="dot active" data-index="1"></div>
                <div class="dot" data-index="2"></div>
                <div class="nav-arrows">
                  <button class="arr-btn" id="prevBtn2">
                    <svg width="11" height="11" viewBox="0 0 14 14" fill="none"><path d="M9 3L5 7L9 11" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </button>
                  <button class="arr-btn" id="nextBtn2">
                    <svg width="11" height="11" viewBox="0 0 14 14" fill="none"><path d="M5 3L9 7L5 11" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- ── Slide 3 ── -->
          <div class="carousel-slide slide-3">
            <img src="{{ asset('images/c3.png') }}" alt="Capturing Moments" class="slide-bg">
            <div class="slide-top">
              <div class="logo-row">
                <a href="/" class="logo">
                  <div class="logo-mark">
                    <svg viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g class="ring-spin">
                        <circle cx="19" cy="19" r="15.5" stroke="rgba(255,255,255,0.55)" stroke-width="1.3" stroke-dasharray="5 3.5" stroke-linecap="round"/>
                        <circle cx="19" cy="3.5" r="2.2" fill="white" opacity="0.95"/>
                      </g>
                      <path d="M19 8L27.5 13V23L19 28L10.5 23V13L19 8Z" stroke="rgba(255,255,255,0.85)" stroke-width="1.4" stroke-linejoin="round" fill="rgba(255,255,255,0.07)"/>
                      <circle class="dot-pulse" cx="19" cy="19" r="3.2" fill="white" opacity="0.95"/>
                    </svg>
                  </div>
                  <span class="logo-text">LensPilot</span>
                </a>
                <a href="/" class="back-btn">
                  Back to website
                  <svg width="11" height="11" viewBox="0 0 14 14" fill="none"><path d="M3 7H11M11 7L7.5 3.5M11 7L7.5 10.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
              </div>
            </div>
            <div class="slide-bottom">
              <div class="slide-caption">
                <h2>Grow Faster,<br>Sell Smarter</h2>
                <p>Powerful analytics that turn your data into profitable decisions.</p>
              </div>
              <div class="carousel-nav">
                <div class="dot" data-index="0"></div>
                <div class="dot" data-index="1"></div>
                <div class="dot active" data-index="2"></div>
                <div class="nav-arrows">
                  <button class="arr-btn" id="prevBtn3">
                    <svg width="11" height="11" viewBox="0 0 14 14" fill="none"><path d="M9 3L5 7L9 11" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </button>
                  <button class="arr-btn" id="nextBtn3">
                    <svg width="11" height="11" viewBox="0 0 14 14" fill="none"><path d="M5 3L9 7L5 11" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </button>
                </div>
              </div>
            </div>
          </div>

        </div><!-- /carousel-track -->
      </div><!-- /left-panel -->

      <!-- ══ RIGHT PANEL ══ -->
      <div class="right-panel">

        <div class="tab-bar">
          <button class="tab-btn active" id="loginTab" onclick="showForm('login')">Login</button>
          <button class="tab-btn"        id="signupTab" onclick="showForm('signup')">Create Account</button>
        </div>

        <!-- LOGIN -->
        <div id="loginSection">
          <div class="form-header">
            <h1 class="form-title">Welcome back</h1>
            <p class="form-subtitle">Don't have an account? <a href="#" onclick="showForm('signup')">Sign up</a></p>
          </div>
          <form id="loginForm">
            <div class="field">
              <input type="email" name="email" placeholder="Email address" required>
            </div>
            <div class="field password-field">
              <input type="password" name="password" id="loginPassword" placeholder="Enter your password" required>
              <button type="button" class="toggle-pw" onclick="togglePw('loginPassword',this)">
                <svg width="17" height="17" viewBox="0 0 18 18" fill="none"><path d="M1.5 9C1.5 9 4 3.75 9 3.75C14 3.75 16.5 9 16.5 9C16.5 9 14 14.25 9 14.25C4 14.25 1.5 9 1.5 9Z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/><circle cx="9" cy="9" r="2.25" stroke="currentColor" stroke-width="1.4"/></svg>
              </button>
            </div>
            <label class="checkbox-label">
              <input type="checkbox" checked> Remember me on this device
            </label>
            <button type="submit" class="btn-primary" id="loginSubmitBtn">Login</button>
          </form>
          <p class="form-subtitle">Forgot your password? <a href="{{ route('password.request') }}">Reset it here</a></p>
        </div>

        <!-- SIGNUP -->
        <div id="signupSection" class="hidden">
          <div class="form-header">
            <h1 class="form-title">Create an account</h1>
            <p class="form-subtitle">Already have an account? <a href="#" onclick="showForm('login')">Log in</a></p>
          </div>
          <form id="signupForm" method="POST" action="{{ route('signup.prepare') }}">
            @csrf
            <div class="field-row">
              <div class="field"><input type="text" name="name" placeholder="Full name" required></div>
              <div class="field"><input type="text" name="shop_name" placeholder="Shop name" required></div>
            </div>
            <div class="field"><input type="text" name="retailer_name" placeholder="Retailer name" required></div>
            <div class="field"><textarea name="address" placeholder="Address" rows="2"></textarea></div>
            <div class="field-row">
              <div class="field"><input type="tel" name="phone" placeholder="Phone number"></div>
              <div class="field"><input type="email" name="email" placeholder="Email address" required></div>
            </div>
            <div class="field password-field">
              <input type="password" name="password" id="signupPassword" placeholder="Create a password" required>
              <button type="button" class="toggle-pw" onclick="togglePw('signupPassword',this)">
                <svg width="17" height="17" viewBox="0 0 18 18" fill="none"><path d="M1.5 9C1.5 9 4 3.75 9 3.75C14 3.75 16.5 9 16.5 9C16.5 9 14 14.25 9 14.25C4 14.25 1.5 9 1.5 9Z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/><circle cx="9" cy="9" r="2.25" stroke="currentColor" stroke-width="1.4"/></svg>
              </button>
            </div>
            <div class="field">
              <input type="text" name="security_question1" placeholder="Security Question 1 (e.g., Mother's maiden name?)" required>
            </div>
            <div class="field">
              <input type="text" name="security_answer1" placeholder="Answer to Question 1" required>
            </div>
            <div class="field">
              <input type="text" name="security_question2" placeholder="Security Question 2 (e.g., First pet's name?)" required>
            </div>
            <div class="field">
              <input type="text" name="security_answer2" placeholder="Answer to Question 2" required>
            </div>
            <div class="field">
              <input type="text" name="security_question3" placeholder="Security Question 3 (e.g., Favorite color?)" required>
            </div>
            <div class="field">
              <input type="text" name="security_answer3" placeholder="Answer to Question 3" required>
            </div>
            <label class="checkbox-label">
              <input type="checkbox" required> I agree to the <a href="#">Terms &amp; Conditions</a>
            </label>
            <button type="submit" class="btn-primary" id="signupSubmitBtn">Create account</button>
          </form>
          
        </div>

        <div id="message"></div>

        @if (session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
          <div class="alert alert-error">{{ session('error') }}</div>
        @endif

      </div><!-- /right-panel -->
    </div><!-- /auth-card -->
  </div><!-- /auth-wrapper -->

  <!-- SUCCESS MODAL -->
  <div id="dashboardModal" class="hidden">
    <div class="modal-box">
      <div class="modal-icon">
        <svg width="24" height="24" viewBox="0 0 26 26" fill="none"><path d="M5 13L10.5 18.5L21 8" stroke="#4ecca3" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </div>
      <h3>Login Successful!</h3>
      <p>Would you like to go to your dashboard or continue visiting the website?</p>
      <div class="modal-actions">
        <button class="btn-primary" onclick="goToDashboard()">Go to Dashboard</button>
        <button class="modal-btn-secondary" onclick="continueWebsite()">Continue on Website</button>
      </div>
    </div>
  </div>

  <script>
    /* ══════════ CAROUSEL ══════════ */
    const SLIDES = 3;
    let cur = 0, autoTimer;

    /* ══════════ UPDATED CAROUSEL LOGIC ══════════ */
function goToSlide(n) {
  cur = ((n % SLIDES) + SLIDES) % SLIDES;
  
  // Move the track
  document.getElementById('carouselTrack').style.transform = `translateX(-${cur * 100}%)`;
  
  // Update Dots across all slides
  document.querySelectorAll('.dot').forEach((dot, index) => {
    // Since you have dots repeated in each slide, we match based on data-index
    if (parseInt(dot.dataset.index) === cur) {
      dot.classList.add('active');
    } else {
      dot.classList.remove('active');
    }
  });
}

    // Wire up ALL prev/next buttons across all slides
    document.querySelectorAll('[id^="prevBtn"]').forEach(btn => btn.addEventListener('click', () => { goToSlide(cur - 1); resetAuto(); }));
    document.querySelectorAll('[id^="nextBtn"]').forEach(btn => btn.addEventListener('click', () => { goToSlide(cur + 1); resetAuto(); }));

    // Wire up ALL dots (they call goToSlide via data-index)
    document.querySelectorAll('.dot[data-index]').forEach(dot => {
      dot.addEventListener('click', () => { goToSlide(parseInt(dot.dataset.index)); resetAuto(); });
    });

    function resetAuto() {
      clearInterval(autoTimer);
      autoTimer = setInterval(() => goToSlide(cur + 1), 4800);
    }
    resetAuto();

    /* ══════════ TABS ══════════ */
    function showForm(type) {
      const s = type === 'signup';
      document.getElementById('loginSection').classList.toggle('hidden', s);
      document.getElementById('signupSection').classList.toggle('hidden', !s);
      document.getElementById('loginTab').classList.toggle('active', !s);
      document.getElementById('signupTab').classList.toggle('active', s);
      document.getElementById('message').innerHTML = '';
    }

    /* ══════════ PASSWORD TOGGLE ══════════ */
    function togglePw(id, btn) {
      const inp = document.getElementById(id);
      const show = inp.type === 'password';
      inp.type = show ? 'text' : 'password';
      btn.innerHTML = show
        ? `<svg width="17" height="17" viewBox="0 0 18 18" fill="none"><path d="M2 2L16 16M7.5 7.68A2.25 2.25 0 0 0 10.32 10.5M4.09 4.2C2.67 5.3 1.5 7 1.5 9c0 0 2.5 5.25 7.5 5.25a8.1 8.1 0 0 0 3.84-.97M7 3.82A8.1 8.1 0 0 1 9 3.75c5 0 7.5 5.25 7.5 5.25s-.6 1.24-1.7 2.4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>`
        : `<svg width="17" height="17" viewBox="0 0 18 18" fill="none"><path d="M1.5 9C1.5 9 4 3.75 9 3.75C14 3.75 16.5 9 16.5 9C16.5 9 14 14.25 9 14.25C4 14.25 1.5 9 1.5 9Z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/><circle cx="9" cy="9" r="2.25" stroke="currentColor" stroke-width="1.4"/></svg>`;
    }

    /* ══════════ LOADER ══════════ */
    function showLoader(show) { document.getElementById('loaderOverlay').classList.toggle('active', show); }
    function setMsg(html, t) { document.getElementById('message').innerHTML = `<span class="msg-${t}">${html}</span>`; }

    /* ══════════ LOGIN ══════════ */
    document.getElementById('loginForm').addEventListener('submit', async function(e) {
      e.preventDefault(); showLoader(true);
      const fd = new FormData(this);
      try {
        const res = await fetch('/api/login', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
          body: JSON.stringify({ email: fd.get('email'), password: fd.get('password') })
        });
        const result = await res.json();
        if (res.ok) {
          window.userToken = result.token; window.userRole = result.user.type;
          localStorage.setItem('auth_token', result.token);
          localStorage.setItem('user_role',  result.user.type);
          localStorage.setItem('user_info',  JSON.stringify(result.user));
          setMsg('Login successful!', 'success'); showLoader(false);
          if (['shopkeeper','admin'].includes(result.user.type)) {
            document.getElementById('dashboardModal').classList.remove('hidden');
          } else { goToDashboard(); }
        } else {
          setMsg(result.message || 'Login failed. Please try again.', 'error');
          const expired = res.status === 403 && result.message?.toLowerCase().includes('expired');
          if (expired && result.redirect_to) setTimeout(() => window.location.href = result.redirect_to, 1200);
          showLoader(false);
        }
      } catch { setMsg('An error occurred. Please try again.', 'error'); showLoader(false); }
    });

    document.getElementById('signupForm').addEventListener('submit', function() { showLoader(true); });

    function goToDashboard() {
      window.location.href = { shopkeeper: '/shopkeeper/dashboard', admin: '/admin/dashboard' }[window.userRole] || '/';
    }
    function continueWebsite() {
      document.getElementById('dashboardModal').classList.add('hidden');
      window.location.href = '/';
    }
  </script>

</body>
</html>