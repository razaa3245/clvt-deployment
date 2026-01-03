<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VisionTech - Login & Signup</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes float {
      0% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(-8px);
      }

      100% {
        transform: translateY(0px);
      }
    }

    .float {
      animation: float 6s ease-in-out infinite;
    }

    /* Professional 3D Loader Styles */
    .loader-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(15, 23, 42, 0.95);
      backdrop-filter: blur(12px) saturate(180%);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
      opacity: 0;
      visibility: hidden;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .loader-overlay.active {
      opacity: 1;
      visibility: visible;
    }

    .loader-wrapper {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 32px;
    }

    .loader-container {
      position: relative;
      width: 200px;
      height: 200px;
      perspective: 1200px;
      transform-style: preserve-3d;
    }

    /* Outer rotating rings */
    .loader-ring {
      position: absolute;
      top: 50%;
      left: 50%;
      border-radius: 50%;
      border: 3px solid transparent;
      transform-style: preserve-3d;
    }

    .ring-1 {
      width: 180px;
      height: 180px;
      border-top-color: rgba(96, 165, 250, 0.8);
      border-right-color: rgba(96, 165, 250, 0.4);
      animation: rotate3d-1 2.5s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite;
      filter: drop-shadow(0 0 12px rgba(96, 165, 250, 0.6));
    }

    .ring-2 {
      width: 160px;
      height: 160px;
      border-bottom-color: rgba(6, 182, 212, 0.8);
      border-left-color: rgba(6, 182, 212, 0.4);
      animation: rotate3d-2 2s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite reverse;
      filter: drop-shadow(0 0 12px rgba(6, 182, 212, 0.6));
    }

    .ring-3 {
      width: 140px;
      height: 140px;
      border-top-color: rgba(59, 130, 246, 0.6);
      border-bottom-color: rgba(59, 130, 246, 0.3);
      animation: rotate3d-3 3s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite;
      filter: drop-shadow(0 0 12px rgba(59, 130, 246, 0.5));
    }

    @keyframes rotate3d-1 {
      0% {
        transform: translate(-50%, -50%) rotateX(0deg) rotateY(0deg) rotateZ(0deg);
      }
      50% {
        transform: translate(-50%, -50%) rotateX(180deg) rotateY(180deg) rotateZ(180deg);
      }
      100% {
        transform: translate(-50%, -50%) rotateX(360deg) rotateY(360deg) rotateZ(360deg);
      }
    }

    @keyframes rotate3d-2 {
      0% {
        transform: translate(-50%, -50%) rotateX(0deg) rotateY(0deg) rotateZ(0deg);
      }
      50% {
        transform: translate(-50%, -50%) rotateX(-180deg) rotateY(180deg) rotateZ(-90deg);
      }
      100% {
        transform: translate(-50%, -50%) rotateX(-360deg) rotateY(360deg) rotateZ(-180deg);
      }
    }

    @keyframes rotate3d-3 {
      0% {
        transform: translate(-50%, -50%) rotateX(0deg) rotateY(0deg) rotateZ(0deg);
      }
      50% {
        transform: translate(-50%, -50%) rotateX(90deg) rotateY(-90deg) rotateZ(270deg);
      }
      100% {
        transform: translate(-50%, -50%) rotateX(180deg) rotateY(-180deg) rotateZ(540deg);
      }
    }

    /* Center glowing orb */
    .center-orb {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: radial-gradient(circle at 30% 30%, #60a5fa, #3b82f6, #06b6d4);
      box-shadow: 
        0 0 30px rgba(96, 165, 250, 0.8),
        0 0 60px rgba(59, 130, 246, 0.6),
        0 0 90px rgba(6, 182, 212, 0.4),
        inset 0 0 20px rgba(255, 255, 255, 0.3);
      animation: orb-pulse 2s ease-in-out infinite;
    }

    @keyframes orb-pulse {
      0%, 100% {
        transform: translate(-50%, -50%) scale(1);
        box-shadow: 
          0 0 30px rgba(96, 165, 250, 0.8),
          0 0 60px rgba(59, 130, 246, 0.6),
          0 0 90px rgba(6, 182, 212, 0.4),
          inset 0 0 20px rgba(255, 255, 255, 0.3);
      }
      50% {
        transform: translate(-50%, -50%) scale(1.1);
        box-shadow: 
          0 0 40px rgba(96, 165, 250, 1),
          0 0 80px rgba(59, 130, 246, 0.8),
          0 0 120px rgba(6, 182, 212, 0.6),
          inset 0 0 30px rgba(255, 255, 255, 0.5);
      }
    }

    /* Floating particles */
    .particle {
      position: absolute;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: linear-gradient(135deg, #60a5fa, #06b6d4);
      box-shadow: 0 0 15px rgba(96, 165, 250, 0.8);
      animation: float-particle 4s ease-in-out infinite;
    }

    .particle:nth-child(1) {
      top: 10%;
      left: 20%;
      animation-delay: 0s;
      animation-duration: 3.5s;
    }

    .particle:nth-child(2) {
      top: 20%;
      right: 15%;
      animation-delay: -0.5s;
      animation-duration: 4s;
    }

    .particle:nth-child(3) {
      bottom: 15%;
      left: 15%;
      animation-delay: -1s;
      animation-duration: 3.8s;
    }

    .particle:nth-child(4) {
      bottom: 20%;
      right: 20%;
      animation-delay: -1.5s;
      animation-duration: 4.2s;
    }

    .particle:nth-child(5) {
      top: 50%;
      left: 5%;
      animation-delay: -2s;
      animation-duration: 3.6s;
    }

    .particle:nth-child(6) {
      top: 50%;
      right: 5%;
      animation-delay: -2.5s;
      animation-duration: 4.5s;
    }

    @keyframes float-particle {
      0%, 100% {
        transform: translateY(0) translateX(0) scale(1);
        opacity: 0.6;
      }
      25% {
        transform: translateY(-30px) translateX(15px) scale(1.2);
        opacity: 1;
      }
      50% {
        transform: translateY(-60px) translateX(-10px) scale(0.8);
        opacity: 0.4;
      }
      75% {
        transform: translateY(-30px) translateX(-20px) scale(1.1);
        opacity: 0.9;
      }
    }

    /* Loading text and progress */
    .loader-content {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
    }

    .loader-text {
      color: #ffffff;
      font-size: 22px;
      font-weight: 600;
      letter-spacing: 1px;
      text-shadow: 0 2px 20px rgba(96, 165, 250, 0.5);
      animation: text-glow 2s ease-in-out infinite;
    }

    @keyframes text-glow {
      0%, 100% {
        opacity: 1;
        text-shadow: 0 2px 20px rgba(96, 165, 250, 0.5);
      }
      50% {
        opacity: 0.85;
        text-shadow: 0 2px 30px rgba(96, 165, 250, 0.8);
      }
    }

    .loader-subtext {
      color: rgba(255, 255, 255, 0.6);
      font-size: 14px;
      font-weight: 400;
      letter-spacing: 0.5px;
    }

    /* Progress dots */
    .progress-dots {
      display: flex;
      gap: 8px;
      align-items: center;
      justify-content: center;
    }

    .dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: linear-gradient(135deg, #60a5fa, #06b6d4);
      animation: dot-pulse 1.4s ease-in-out infinite;
    }

    .dot:nth-child(1) {
      animation-delay: 0s;
    }

    .dot:nth-child(2) {
      animation-delay: 0.2s;
    }

    .dot:nth-child(3) {
      animation-delay: 0.4s;
    }

    @keyframes dot-pulse {
      0%, 100% {
        transform: scale(1);
        opacity: 0.5;
      }
      50% {
        transform: scale(1.5);
        opacity: 1;
        box-shadow: 0 0 12px rgba(96, 165, 250, 0.8);
      }
    }

    /* Shimmer effect */
    .shimmer {
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(
        90deg,
        transparent,
        rgba(255, 255, 255, 0.1),
        transparent
      );
      animation: shimmer 2s infinite;
    }

    @keyframes shimmer {
      0% {
        left: -100%;
      }
      100% {
        left: 100%;
      }
    }
  </style>
</head>

<body
  class="m-0 p-4 font-sans bg-gradient-to-br from-blue-50 via-cyan-50 to-white min-h-screen flex items-center justify-center overflow-y-auto">

  <!-- Professional 3D Loader Overlay -->
  <div id="loaderOverlay" class="loader-overlay">
    <div class="loader-wrapper">
      <div class="loader-container">
        <!-- Floating Particles -->
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        
        <!-- Rotating Rings -->
        <div class="loader-ring ring-1"></div>
        <div class="loader-ring ring-2"></div>
        <div class="loader-ring ring-3"></div>
        
        <!-- Center Glowing Orb -->
        <div class="center-orb">
          <div class="shimmer"></div>
        </div>
      </div>

      <!-- Loading Content -->
      <div class="loader-content">
        <div class="loader-text">Processing</div>
        <div class="progress-dots">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
        </div>
        <div class="loader-subtext">Please wait a moment</div>
      </div>
    </div>
  </div>

  <!-- Outer Card -->
  <div
    class="bg-white/90 backdrop-blur-xl border border-gray-200 w-[420px] rounded-2xl shadow-lg p-8 text-center transition-all duration-500 hover:shadow-cyan-200/50 float mt-6 mb-6">

    <!-- Logo -->
    <div class="mb-6">
      <a href="{{ url('/') }}" title="Back to Home">         
        <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" alt="VisionTech Logo"           
        class="w-20 h-20 rounded-2xl mx-auto shadow-lg ">
             </a>
    </div>

    <h2
      class="text-4xl font-extrabold mb-1 tracking-wide bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-600 text-transparent">
      VisionTech
    </h2>
    <p class="text-gray-600 mb-8 text-sm">Experience Next-Gen Optical Intelligence</p>

    <!-- Toggle Buttons -->
    <div class="flex justify-between mb-6 bg-gray-100 rounded-lg p-1 border border-gray-200">
      <button id="loginBtn" type="button" onclick="showForm('login')"
        class="w-[48%] bg-gradient-to-r from-blue-500 to-cyan-400 text-white font-semibold py-2 rounded-md shadow-md transition-all duration-300 hover:scale-105">
        Login
      </button>
      <button id="signupBtn" type="button" onclick="showForm('signup')"
        class="w-[48%] text-gray-600 font-semibold py-2 rounded-md transition-all duration-300 hover:bg-cyan-50 hover:text-cyan-700">
        Sign Up
      </button>
    </div>

    <!-- LOGIN FORM -->
    <form id="loginForm">
      <input type="email" name="email" placeholder="Email" required
        class="w-full py-3 px-4 mb-4 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      <input type="password" name="password" placeholder="Password" required
        class="w-full py-3 px-4 mb-6 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      
      <button type="submit" id="loginSubmitBtn"
        class="w-full py-3 bg-gradient-to-r from-blue-500 to-cyan-400 text-white font-semibold rounded-md shadow-md transition-all duration-300 hover:scale-105">
        Login
      </button>
      
      <div class="mt-4">
        <a href="#" onclick="showForm('signup')" class="text-xs text-cyan-600 hover:underline">Don't have an account?
          Sign Up</a>
      </div>
    </form>

    <!-- SIGNUP FORM -->
    <form id="signupForm" class="hidden">
      <input type="text" name="name" placeholder="Full Name" required
        class="w-full py-3 px-4 mb-4 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      <input type="text" name="shop_name" placeholder="Shop Name" required
        class="w-full py-3 px-4 mb-4 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      <input type="text" name="retailer_name" placeholder="Retailer Name"
        class="w-full py-3 px-4 mb-4 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      <textarea name="address" placeholder="Address" rows="2"
        class="w-full py-3 px-4 mb-4 text-sm text-gray-800 rounded-md border border-gray-300 resize-none focus:border-cyan-400 outline-none shadow-sm"></textarea>
      <input type="tel" name="phone" placeholder="Phone Number"
        class="w-full py-3 px-4 mb-4 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      <input type="email" name="email" placeholder="Email" required
        class="w-full py-3 px-4 mb-4 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      <input type="password" name="password" placeholder="Password" required
        class="w-full py-3 px-4 mb-6 text-sm text-gray-800 rounded-md border border-gray-300 focus:border-cyan-400 outline-none shadow-sm">
      
      <button type="submit" id="signupSubmitBtn"
        class="w-full py-3 bg-gradient-to-r from-blue-500 to-cyan-400 text-white font-semibold rounded-md shadow-md transition-all duration-300 hover:scale-105">
        Sign Up
      </button>
      
      <div class="mt-4">
        <a href="#" onclick="showForm('login')" class="text-xs text-cyan-600 hover:underline">Already have an account?
          Login</a>
      </div>
    </form>

    <div id="message" class="mt-4 text-sm"></div>

  </div>

  <!-- Modal Popup for Shopkeeper -->
  <div id="dashboardModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md w-full mx-4 transform transition-all">
      <div class="text-center">
        <div class="mb-4">
          <svg class="w-16 h-16 mx-auto text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-2">Login Successful!</h3>
        <p class="text-gray-600 mb-6">Would you like to go to your dashboard or continue visiting the website?</p>

        <div class="flex flex-col gap-3">
          <button onclick="goToDashboard()"
            class="w-full py-3 bg-gradient-to-r from-blue-500 to-cyan-400 text-white font-semibold rounded-lg shadow-md hover:scale-105 transition-all duration-300">
            Go to Dashboard
          </button>
          <button onclick="continueWebsite()"
            class="w-full py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition-all duration-300">
            Continue on Website
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Global variables for user session
    let userRole = null;
    let userToken = null;

    // Toggle between login and signup forms
    function showForm(type) {
      const loginForm = document.getElementById('loginForm');
      const signupForm = document.getElementById('signupForm');
      const loginBtn = document.getElementById('loginBtn');
      const signupBtn = document.getElementById('signupBtn');

      if (type === 'signup') {
        loginForm.classList.add('hidden');
        signupForm.classList.remove('hidden');
        signupBtn.classList.add('bg-gradient-to-r', 'from-blue-500', 'to-cyan-400', 'text-white');
        loginBtn.classList.remove('bg-gradient-to-r', 'from-blue-500', 'to-cyan-400', 'text-white');
      } else {
        signupForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
        loginBtn.classList.add('bg-gradient-to-r', 'from-blue-500', 'to-cyan-400', 'text-white');
        signupBtn.classList.remove('bg-gradient-to-r', 'from-blue-500', 'to-cyan-400', 'text-white');
      }
    }

    // Show/Hide  Loader
    function showLoader(show) {
      const loader = document.getElementById('loaderOverlay');
      if (show) {
        loader.classList.add('active');
      } else {
        loader.classList.remove('active');
      }
    }

    // LOGIN FORM SUBMIT (AJAX to /api/login)
    document.getElementById('loginForm').addEventListener('submit', async function (e) {
      e.preventDefault();

      // Show loader
      showLoader(true);

      const formData = new FormData(this);
      const data = {
        email: formData.get('email'),
        password: formData.get('password')
      };

      console.log('Attempting login with:', data.email);

      try {
        const response = await fetch('/api/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          },
          body: JSON.stringify(data)
        });

        const result = await response.json();
        console.log('Login API Response:', result);

        if (response.ok) {
          // Store token and user info
          userToken = result.token;
          userRole = result.user.type;
          console.log('User Role:', userRole);
          console.log('Token:', userToken ? 'Present' : 'Missing');

          localStorage.setItem('auth_token', result.token);
          localStorage.setItem('user_role', result.user.type);
          localStorage.setItem('user_info', JSON.stringify(result.user));

          console.log('Stored in localStorage:');
          console.log('   - auth_token:', localStorage.getItem('auth_token') ? 'Saved' : 'Failed');
          console.log('   - user_type:', localStorage.getItem('user_role'));
          console.log('   - user_info:', localStorage.getItem('user_info'));

          document.getElementById('message').innerHTML = '<p class="text-green-600 font-medium">Login successful!</p>';

          // Hide loader before showing modal
          showLoader(false);

          // Show modal for both shopkeeper and admin
          if (result.user.type === 'shopkeeper' || result.user.type === 'admin') {
            console.log('Showing dashboard modal for type:', result.user.type);
            showDashboardModal();
          } else {
            console.log('Regular user - redirecting to home');
            goToDashboard();
          }
        } else {
          console.error('Login failed:', result.message);
          document.getElementById('message').innerHTML = '<p class="text-red-600 font-medium">' + result.message + '</p>';
          showLoader(false);
        }
      } catch (error) {
        console.error('Login error:', error);
        document.getElementById('message').innerHTML = '<p class="text-red-600 font-medium">An error occurred. Please try again.</p>';
        showLoader(false);
      }
    });

    // SIGNUP FORM SUBMIT (AJAX to /api/register)
    document.getElementById('signupForm').addEventListener('submit', async function (e) {
      e.preventDefault();

      // Show  loader
      showLoader(true);

      const formData = new FormData(this);
      const data = {
        name: formData.get('name'),
        email: formData.get('email'),
        password: formData.get('password'),
        shop_name: formData.get('shop_name'),
        retailer_name: formData.get('retailer_name'),
        address: formData.get('address'),
        phone: formData.get('phone')
      };

      try {
        const response = await fetch('/api/register', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          },
          body: JSON.stringify(data)
        });

        const result = await response.json();

        if (response.ok) {
          document.getElementById('message').innerHTML = '<p class="text-green-600 font-medium">' + result.message + '</p>';
          showLoader(false);
          setTimeout(() => {
            showForm('login');
          }, 2000);
        } else {
          let errorMsg = result.message || 'Registration failed';
          if (result.errors) {
            errorMsg = Object.values(result.errors).flat().join(', ');
          }
          document.getElementById('message').innerHTML = '<p class="text-red-600 font-medium">' + errorMsg + '</p>';
          showLoader(false);
        }
      } catch (error) {
        console.error('Signup error:', error);
        document.getElementById('message').innerHTML = '<p class="text-red-600 font-medium">An error occurred. Please try again.</p>';
        showLoader(false);
      }
    });

    // Show the dashboard modal
    function showDashboardModal() {
      document.getElementById('dashboardModal').classList.remove('hidden');
    }

    // Go to dashboard option
    function goToDashboard() {
      if (userRole === 'shopkeeper') {
        window.location.href = '/shopkeeper/dashboard';
      } else if (userRole === 'admin') {
        window.location.href = '/admin/dashboard';
      }
    }

    // Continue on website option
    function continueWebsite() {
      document.getElementById('dashboardModal').classList.add('hidden');
      window.location.href = '/';
    }

  </script>

</body>

</html>
