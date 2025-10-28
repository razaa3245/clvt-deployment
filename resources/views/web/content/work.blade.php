<section style="background: linear-gradient(135deg, #f9fafb, #eef6ff); padding: 80px 0; font-family: 'Poppins', sans-serif;">
  <div style="text-align: center; margin-bottom: 60px;">
    <h1 style="font-size: 48px; font-weight: 800; color: #1e293b; margin-bottom: 10px;">
      How It Works
    </h1>
    <p style="color: #64748b; font-size: 18px;">
      Simple, seamless, and designed for in-store success
    </p>
  </div>

  <div style="display: flex; align-items: center; justify-content: center; max-width: 1200px; margin: 0 auto; gap: 60px; flex-wrap: wrap;">
    
    <!-- Left Section -->
    <div style="flex: 1; min-width: 320px;">
      
      <div style="margin-bottom: 50px;">
        <h2 style="font-size: 28px; color: #1e40af; font-weight: 700; margin-bottom: 10px;">
          <a href="#signup.blade.php">
          Shop Register
          </a>
        </h2>
        <p style="color: #475569; font-size: 16px; line-height: 1.6;">
          Sign up and choose your subscription plan. Get instant access to your dashboard.
        </p>
      </div>

      <div style="margin-bottom: 50px;">
        <h2 style="font-size: 28px; color: #1e40af; font-weight: 700; margin-bottom: 10px;">
          Generate QR Code
        </h2>
        <p style="color: #475569; font-size: 16px; line-height: 1.6;">
          Instantly create a QR code for your customers to scan and explore your virtual try-on.
        </p>
      </div>

      <div>
        <h2 style="font-size: 28px; color: #1e40af; font-weight: 700; margin-bottom: 10px;">
          Customer Scan
        </h2>
        <p style="color: #475569; font-size: 16px; line-height: 1.6;">
          Customers scan the QR code to access the AR try-on feature on their devices — no installs needed.
        </p>
      </div>

    </div>

    <!-- Right Section (Image) -->
    <div style="flex: 1; min-width: 320px; display: flex; justify-content: center; align-items: center;">
      <img 
        src="{{ asset('images/image.jpg') }}" 
        alt="Virtual Try-On"
        style="max-width: 400px; width: 100%; height: auto; border-radius: 25px; box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15); transition: transform 0.4s ease;"
        onmouseover="this.style.transform='scale(1.05)'" 
        onmouseout="this.style.transform='scale(1)'"
      >
    </div>

  </div>
</section>
