
<body style="margin:0; padding:0; font-family:'Segoe UI', sans-serif; background-color:#f5f9ff; height:100vh; display:flex; align-items:center; justify-content:center;">

  <div style="background:#fff; width:400px; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,0.1); padding:40px 30px; text-align:center;">


<div style="margin-bottom:20px;">
  <img src="https://cdn-icons-png.flaticon.com/512/709/709682.png" alt="VirtualLens Logo" width="60" style="border-radius:12px;">
</div>

<h2 style="color:#333; margin:10px 0;">Welcome to VirtualLens</h2>
<p style="color:#777; margin-bottom:25px;">Manage your optical shop with ease</p>

<!-- Toggle Buttons -->
<div style="display:flex; justify-content:space-between; margin-bottom:20px; background:#f2f4f8; border-radius:8px; padding:4px;">
  <button id="loginBtn" onclick="showForm('login')" style="width:48%; background:#fff; border:none; padding:10px 0; border-radius:6px; font-weight:600; color:#333; box-shadow:0 1px 2px rgba(0,0,0,0.1); cursor:pointer;">Login</button>
  <button id="signupBtn" onclick="showForm('signup')" style="width:48%; background:transparent; border:none; padding:10px 0; border-radius:6px; color:#777; font-weight:600; cursor:pointer;">Sign Up</button>
</div>

<!-- Login Form -->
<form id="loginForm" style="display:block;">
  <label for="email" style="display:block; text-align:left; font-size:14px; color:#555;">Email</label>
  <input type="email" id="email" name="email" placeholder="shop@example.com"
    style="width:100%; padding:10px 12px; margin:6px 0 15px 0; border:1px solid #ccc; border-radius:8px; font-size:14px; outline:none;">

  <label for="password" style="display:block; text-align:left; font-size:14px; color:#555;">Password</label>
  <input type="password" id="password" name="password" placeholder="********"
    style="width:100%; padding:10px 12px; margin:6px 0 20px 0; border:1px solid #ccc; border-radius:8px; font-size:14px; outline:none;">

  <button type="submit"
    style="width:100%; padding:10px; background:linear-gradient(90deg, #007bff, #00d4ff); border:none; color:#fff; font-weight:600; border-radius:8px; cursor:pointer; font-size:15px;">
    Sign In
  </button>

  <div style="margin-top:15px;">
    <a href="#" style="font-size:13px; color:#007bff; text-decoration:none;">Forgot password?</a>
  </div>
</form>

<!-- Sign Up Form -->
<form id="signupForm" style="display:none;">
  <label for="name" style="display:block; text-align:left; font-size:14px; color:#555;">Full Name</label>
  <input type="text" id="name" name="name" placeholder="John Doe"
    style="width:100%; padding:10px 12px; margin:6px 0 15px 0; border:1px solid #ccc; border-radius:8px; font-size:14px; outline:none;">

  <label for="shopname" style="display:block; text-align:left; font-size:14px; color:#555;">Shop Name</label>
  <input type="text" id="shopname" name="shopname" placeholder="Virtual Lens Optics"
    style="width:100%; padding:10px 12px; margin:6px 0 15px 0; border:1px solid #ccc; border-radius:8px; font-size:14px; outline:none;">

  <label for="retailer" style="display:block; text-align:left; font-size:14px; color:#555;">Retailer Name (Person)</label>
  <input type="text" id="retailer" name="retailer" placeholder="Ali Khan"
    style="width:100%; padding:10px 12px; margin:6px 0 15px 0; border:1px solid #ccc; border-radius:8px; font-size:14px; outline:none;">

  <label for="address" style="display:block; text-align:left; font-size:14px; color:#555;">Address</label>
  <textarea id="address" name="address" placeholder="Shop #12, Main Market, Lahore" rows="2"
    style="width:100%; padding:10px 12px; margin:6px 0 15px 0; border:1px solid #ccc; border-radius:8px; font-size:14px; resize:none; outline:none;"></textarea>

  <label for="phone" style="display:block; text-align:left; font-size:14px; color:#555;">Phone Number</label>
  <input type="tel" id="phone" name="phone" placeholder="+92 300 1234567"
    style="width:100%; padding:10px 12px; margin:6px 0 15px 0; border:1px solid #ccc; border-radius:8px; font-size:14px; outline:none;">

  <label for="email2" style="display:block; text-align:left; font-size:14px; color:#555;">Email</label>
  <input type="email" id="email2" name="email" placeholder="shop@example.com"
    style="width:100%; padding:10px 12px; margin:6px 0 15px 0; border:1px solid #ccc; border-radius:8px; font-size:14px; outline:none;">

  <label for="password2" style="display:block; text-align:left; font-size:14px; color:#555;">Password</label>
  <input type="password" id="password2" name="password" placeholder="********"
    style="width:100%; padding:10px 12px; margin:6px 0 20px 0; border:1px solid #ccc; border-radius:8px; font-size:14px; outline:none;">

  <button type="submit"
    style="width:100%; padding:10px; background:linear-gradient(90deg, #007bff, #00d4ff); border:none; color:#fff; font-weight:600; border-radius:8px; cursor:pointer; font-size:15px;">
    Sign Up
  </button>

  <div style="margin-top:15px;">
    <a href="#" onclick="showForm('login')" style="font-size:13px; color:#007bff; text-decoration:none;">Already have an account? Login</a>
  </div>
</form>

<div style="margin-top:20px;">
  <a href="#" style="font-size:13px; color:#888; text-decoration:none;">← Back to home</a>
</div>


  </div>

  <script>
    function showForm(form) {
      const loginForm = document.getElementById('loginForm');
      const signupForm = document.getElementById('signupForm');
      const loginBtn = document.getElementById('loginBtn');
      const signupBtn = document.getElementById('signupBtn');

      if (form === 'signup') {
        loginForm.style.display = 'none';
        signupForm.style.display = 'block';
        signupBtn.style.background = '#fff';
        signupBtn.style.color = '#333';
        signupBtn.style.boxShadow = '0 1px 2px rgba(0,0,0,0.1)';
        loginBtn.style.background = 'transparent';
        loginBtn.style.color = '#777';
        loginBtn.style.boxShadow = 'none';
      } else {
        loginForm.style.display = 'block';
        signupForm.style.display = 'none';
        loginBtn.style.background = '#fff';
        loginBtn.style.color = '#333';
        loginBtn.style.boxShadow = '0 1px 2px rgba(0,0,0,0.1)';
        signupBtn.style.background = 'transparent';
        signupBtn.style.color = '#777';
        signupBtn.style.boxShadow = 'none';
      }
    }
  </script>


