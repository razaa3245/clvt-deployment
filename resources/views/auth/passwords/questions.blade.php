<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LensPilot - Reset Password</title>
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

    .carousel-slide img {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: 0;
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

    /* ── FORM HEADER ── */
    .form-header { margin-bottom: 26px; }
    .form-title {
      font-family: 'Sora', sans-serif; font-size: 28px; font-weight: 700;
      color: #fff; letter-spacing: -0.5px; line-height: 1.2; margin-bottom: 7px;
    }
    .form-subtitle { font-size: 13.5px; color: rgba(255,255,255,0.50); }

    /* ── FIELDS ── */
    .field { position: relative; margin-bottom: 11px; }
    .field input {
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
    .field input::placeholder { color: rgba(255,255,255,0.36); }
    .field input:focus {
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

    /* ── MESSAGES ── */
    .msg { font-size: 13px; margin-top: 8px; }
    .msg.error { color: var(--error); }

    .form-footer {
      margin-top: 20px;
      font-size: 13px;
      color: var(--muted);
    }

    .form-footer a {
      color: var(--link);
      text-decoration: none;
    }

    .form-footer a:hover { text-decoration: underline; }

    /* ── RESPONSIVE ── */
    @media (max-width: 780px) {
      .auth-wrapper { justify-content: center; padding: 16px; }
      .auth-card { flex-direction: column; min-height: auto; max-width: 440px; }
      .left-panel  { flex: 0 0 auto; }
      .carousel-slide { min-height: 210px; }
      .right-panel { padding: 26px 20px; }
    }
/* ══ RIGHT PANEL ══ */
    .right-panel {
      flex: 1; padding: 42px 38px; overflow-y: auto;
      display: flex; flex-direction: column; justify-content: center;
      background: rgba(255,255,255,0.08);
      border-left: 1px solid rgba(255,255,255,0.14);
    }

    /* ── FORM ── */
    .form-header h1 {
      font-family: 'Sora', sans-serif; font-size: 28px; font-weight: 700;
      color: #fff; margin-bottom: 8px; letter-spacing: -0.5px;
    }
    .form-subtitle {
      font-size: 14px; color: var(--muted); margin-bottom: 32px; line-height: 1.5;
    }

    .form-group { margin-bottom: 20px; }
    .form-label {
      display: block; font-size: 13px; font-weight: 500;
      color: var(--text); margin-bottom: 6px;
    }
    .form-input {
      width: 100%; padding: 14px 16px;
      background: rgba(255,255,255,0.08);
      border: 1px solid rgba(255,255,255,0.20);
      border-radius: 12px; color: var(--text);
      font-family: 'DM Sans', sans-serif; font-size: 14px;
      backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
      transition: border-color 0.2s, background 0.2s;
    }
    .form-input:focus {
      outline: none; border-color: var(--accent);
      background: rgba(255,255,255,0.12);
    }
    .form-input::placeholder { color: var(--muted); }

    .btn-primary {
      width: 100%; padding: 14px 16px;
      background: var(--accent);
      border: none; border-radius: 12px;
      color: #fff; font-family: 'DM Sans', sans-serif;
      font-size: 14px; font-weight: 600; cursor: pointer;
      transition: background 0.2s, transform 0.1s;
    }
    .btn-primary:hover { background: var(--accent2); }
    .btn-primary:active { transform: scale(0.98); }

    .form-footer {
      text-align: center; margin-top: 24px;
      font-size: 13px; color: var(--muted);
    }
    .form-footer a {
      color: var(--link); text-decoration: none;
      transition: color 0.2s;
    }
    .form-footer a:hover { color: #fff; }

    /* ── MESSAGES ── */
    .msg {
      padding: 12px 16px; border-radius: 8px; margin-bottom: 16px;
      font-size: 13px; font-weight: 500;
    }
    .msg.error { background: rgba(255,100,100,0.15); color: var(--error); border: 1px solid rgba(255,100,100,0.3); }
    .msg.success { background: rgba(80,220,160,0.15); color: var(--success); border: 1px solid rgba(80,220,160,0.3); }

    /* ── RESPONSIVE ── */
    @media (max-width: 768px) {
      .auth-wrapper { padding: 16px; justify-content: center; }
      .auth-card { max-width: 100%; min-height: auto; flex-direction: column; }
      .left-panel { flex: 0 0 200px; }
      .right-panel { padding: 32px 24px; }
    }

  </style>
</head>

<body>

<div class="auth-wrapper">
  <div class="auth-card">

    <div class="left-panel">
      <div class="carousel-track" id="carouselTrack">

        <!-- ── Slide 1 ── -->
        <div class="carousel-slide slide-1">
          <img src="{{ asset('images/c1.jpg') }}" alt="Secure" class="slide-bg">
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
              <a href="{{ route('home') }}" class="back-btn">
                Back to website
                <svg width="11" height="11" viewBox="0 0 14 14" fill="none">
                  <path d="M3 7H11M11 7L7.5 3.5M11 7L7.5 10.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>
            </div>
          </div>
          <div class="slide-bottom">
            <div class="slide-caption">
              <h2>Secure Your Account</h2>
              <p>Choose a strong password to keep your account safe.</p>
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
          <img src="{{ asset('images/c2.png') }}" alt="Protected" class="slide-bg">
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
              <a href="{{ route('home') }}" class="back-btn">
                Back to website
                <svg width="11" height="11" viewBox="0 0 14 14" fill="none"><path d="M3 7H11M11 7L7.5 3.5M11 7L7.5 10.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
            </div>
          </div>
          <div class="slide-bottom">
            <div class="slide-caption">
              <h2>Stay Protected</h2>
              <p>Security starts with a strong password and careful verification.</p>
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
          <img src="{{ asset('images/c3.png') }}" alt="Data Security" class="slide-bg">
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
              <a href="{{ route('home') }}" class="back-btn">
                Back to website
                <svg width="11" height="11" viewBox="0 0 14 14" fill="none"><path d="M3 7H11M11 7L7.5 3.5M11 7L7.5 10.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
            </div>
          </div>
          <div class="slide-bottom">
            <div class="slide-caption">
              <h2>Your Data Matters</h2>
              <p>Protect your account and keep your credentials secure.</p>
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

      </div>
    </div>

      <!-- RIGHT PANEL -->
      <div class="right-panel">
        <div class="form-header">
          <h1>Security Questions</h1>
          <p class="form-subtitle">Please answer your security questions to reset your password.</p>
        </div>

        <form method="POST" action="{{ route('password.questions.verify') }}">
          @csrf

          <div class="form-group">
            <label for="answer1" class="form-label">{{ $user->security_question1 }}</label>
            <input id="answer1" name="answer1" type="text" required class="form-input" placeholder="Enter your answer">
          </div>
          <div class="form-group">
            <label for="answer2" class="form-label">{{ $user->security_question2 }}</label>
            <input id="answer2" name="answer2" type="text" required class="form-input" placeholder="Enter your answer">
          </div>
          <div class="form-group">
            <label for="answer3" class="form-label">{{ $user->security_question3 }}</label>
            <input id="answer3" name="answer3" type="text" required class="form-input" placeholder="Enter your answer">
          </div>

          @if ($errors->any())
            <div class="msg error">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <button type="submit" class="btn-primary">Verify Answers</button>

          <div class="form-footer">
            Remember your password? <a href="{{ route('login') }}">Log in</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>



