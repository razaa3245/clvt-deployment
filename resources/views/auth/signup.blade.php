
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
  </style>
</head>

<body
  class="m-0 p-4 font-sans bg-gradient-to-br from-blue-50 via-cyan-50 to-white min-h-screen flex items-center justify-center overflow-y-auto">

  <!-- Outer Card -->
  <div
    class="bg-white/90 backdrop-blur-xl border border-gray-200 w-[420px] rounded-2xl shadow-lg p-8 text-center transition-all duration-500 hover:shadow-cyan-200/50 float mt-6 mb-6">

    <!-- Logo -->
    <div class="mb-6">
      <a href="{{ url('/') }}" title="Back to Home">
        <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" alt="VisionTech Logo"
          class="w-20 h-20 rounded-2xl mx-auto shadow-lg ring-2 ring-cyan-300/40 logo-hover">
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
      <button type="submit"
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
      <button type="submit"
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

    // LOGIN FORM SUBMIT (AJAX to /api/login)
document.getElementById('loginForm').addEventListener('submit', async function (e) {
  e.preventDefault();

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

      console.log('Login successful!');
      console.log('User Role:', userRole);
      console.log('Token:', userToken ? 'Present' : 'Missing');

      localStorage.setItem('auth_token', result.token);
      localStorage.setItem('user_role', result.user.type);
      localStorage.setItem('user_info', JSON.stringify(result.user));

      // Verify localStorage
      console.log('Stored in localStorage:');
      console.log('   - auth_token:', localStorage.getItem('auth_token') ? 'Saved' : 'Failed');
      console.log('   - user_type:', localStorage.getItem('user_role'));
      console.log('   - user_info:', localStorage.getItem('user_info'));

      document.getElementById('message').innerHTML = '<p class="text-green-600 font-medium">Login successful!</p>';

      // Show modal for both shopkeeper and admin
      if (result.user.type === 'shopkeeper' || result.user.type === 'admin') {
        console.log('Showing dashboard modal for type:', result.type);
        showDashboardModal();
      } else {
        console.log('👥 Regular user - redirecting to home');
        // For other roles, redirect to home
        goToDashboard();

        // setTimeout(() => {
        //   window.location.href = '/';
        // }, 1000);
      }
    } else {
      console.error('Login failed:', result.message);
      document.getElementById('message').innerHTML = '<p class="text-red-600 font-medium">' + result.message + '</p>';
    }
  } catch (error) {
    console.error('🚨 Login error:', error);
    document.getElementById('message').innerHTML = '<p class="text-red-600 font-medium">An error occurred. Please try again.</p>';
  }
});




    // SIGNUP FORM SUBMIT (AJAX to /api/register)
    document.getElementById('signupForm').addEventListener('submit', async function (e) {
      e.preventDefault();

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
          setTimeout(() => {
            showForm('login');
          }, 2000);
        } else {
          let errorMsg = result.message || 'Registration failed';
          if (result.errors) {
            errorMsg = Object.values(result.errors).flat().join(', ');
          }
          document.getElementById('message').innerHTML = '<p class="text-red-600 font-medium">' + errorMsg + '</p>';
        }
      } catch (error) {
        console.error('Signup error:', error);
        document.getElementById('message').innerHTML = '<p class="text-red-600 font-medium">An error occurred. Please try again.</p>';
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
