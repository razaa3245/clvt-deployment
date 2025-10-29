@include('web.layouts.header')
@include('web.layouts.navbar')

<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>About Us</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body { font-family: 'Poppins', sans-serif; margin: 0; padding: 0; background: #e8f4fb; }
    .elementor-background-overlay {
      background: linear-gradient(135deg, #d0e8ff, #a8d0ff);
      position: absolute; width: 100%; height: 100%; z-index: 0; top: 0; left: 0;}
    .elementor-container {
      max-width: 1200px; margin: 0 auto;
      position: relative; z-index: 1; padding: 80px 20px 0 20px;
    }
    .section-title { font-size: 48px; font-weight: 800; color: #1e293b; margin-bottom: 10px; text-align: center; }
    .section-desc { color: #64748b; font-size: 18px; text-align: center; margin-bottom: 60px; }
    /* About Card Section */
    .about-section {
      display: flex; flex-wrap: wrap; justify-content: center; gap: 40px; margin-bottom: 60px;
    }
    .about-card {
      background: #fff; border-radius: 20px; box-shadow: 0 8px 30px rgba(30,40,55,0.10);
      padding: 30px 28px; flex: 1 1 300px; min-width: 290px; max-width: 380px;
    }
    .about-card h2 { font-size: 24px; color: #1e40af; margin-bottom: 12px;}
    .about-card p { color: #475569; font-size: 16px; line-height: 1.6;}
    /* Trusted By Section */
    .trusted-section { text-align: center; margin: 40px 0; }
    .trusted-section h2 { color:#1e40af; font-size: 28px; margin-bottom: 18px;}
    .trusted-logos {
      display: flex; gap: 28px; justify-content: center; flex-wrap: wrap; margin-bottom: 20px;
    }
    .trusted-logos img {
      height: 40px; background: #f4f8fb; border-radius: 8px; padding: 6px;
    }
    /* Feature/Progress Section */
    .ar-feature-section {
      background: #f9fafd; border-radius: 26px; margin: 56px auto;
      padding: 42px 10% 40px 10%; box-shadow: 0 6px 32px rgba(44,62,80,.09); max-width: 1100px;
    }
    .ar-feature-flex {
      display: flex; flex-wrap: wrap; gap: 44px; align-items: center; justify-content: space-between;
    }
    .ar-feature-illustration {
      flex: 1 1 290px; min-width: 260px; max-width: 380px;
    }
    .ar-feature-illustration img {
      width: 100%; border-radius: 24px;
    }
    .ar-feature-content {
      flex: 2 1 400px; min-width: 320px;
    }
    .ar-feature-content h2 {
      color: #16233d; font-size: 2rem; font-weight: 700; margin-bottom: 14px;
    }
    .ar-feature-content p {
      color: #5a6d8f; font-size: 17px;
    }
    .ar-feature-content ul {
      color: #333852; font-size: 15px; margin: 20px 0 24px 0; padding-left: 1.2em;
    }
    .ar-feature-progress-title {
      color: #1e266d; font-weight: 600; margin-bottom: 2px;
    }
    .ar-progress-label { font-size: 14px;}
    .ar-progress-bar-outer {
      background: #e9edfd; border-radius: 8px; overflow: hidden; margin: 2px 0;
    }
    .ar-progress-bar-inner-blue {
      height: 8px; background: linear-gradient(90deg, #305fff 60%, #4ac6f9 100%);
    }
    .ar-progress-bar-outer-pink { background: #fce4ec; }
    .ar-progress-bar-inner-pink {
      height: 8px; background: linear-gradient(90deg, #e50057 60%, #ffa8b2 100%);
    }
    @media (max-width: 900px){
      .about-section, .ar-feature-flex { flex-direction: column; align-items: center; }
      .about-card, .ar-feature-illustration, .ar-feature-content { max-width: 97vw; }
    }
  </style>
</head>
<body>
  <!-- Gradient background overlay -->
  <div class="elementor-background-overlay"></div>
  <div class="elementor-container">
    <!-- Page Title -->
    <h1 class="section-title">About Us</h1>
    <p class="section-desc">
      Empowering retailers with advanced AR and virtual try-on technology for a seamless, modern shopping experience.
    </p>
    <!-- Our Vision / Mission / Why Section -->
    <div class="about-section">
      <div class="about-card">
        <h2>Our Vision</h2>
        <p>
          Transform eyewear shopping by merging the best of real-world and digital experiences through next-generation AR solutions.
        </p>
      </div>
      <div class="about-card">
        <h2>Our Mission</h2>
        <p>
          Deliver powerful, intuitive, and accessible virtual try-on tools that enable retailers and customers to connect, engage, and discover with confidence.
        </p>
      </div>
      <div class="about-card">
        <h2>Why Choose Us?</h2>
        <p>
          Fast, simple integration, instant AR try-on via QR code, and trusted by leading stores across the region.
        </p>
      </div>
    </div>
    <!-- Trusted By Section -->
    <div class="trusted-section">
      <h2>Trusted By</h2>
      <div class="trusted-logos">
        <img src="logo1.svg" alt="Brand 1">
        <img src="logo2.svg" alt="Brand 2">
        <img src="logo3.svg" alt="Brand 3">
        <img src="logo4.svg" alt="Brand 4">
      </div>
    </div>
  </div>
  <!-- AR Feature and Progress Section -->
  <section class="ar-feature-section">
    <div class="ar-feature-flex">
      <!-- Left Illustration (change src to your asset if desired) -->
      <div class="ar-feature-illustration">
        <img src="https://static.vecteezy.com/system/resources/previews/003/099/226/large_2x/augmented-reality-virtual-wear-glasses-using-ar-technology-app-user-experience-cartoon-scene-flat-illustration-vector.jpg" alt="Virtual Try-On Visual">
      </div>
      <!-- Right Content -->
      <div class="ar-feature-content">
        <h2>Experience Seamless AR Try-On</h2>
        <p>
          Leverage state-of-the-art computer vision to let your customers try-on eyewear and lenses instantly from any device—no app install required, no technical hurdles. Just scan, try, and enjoy!
        </p>
        <ul>
          <li>Real-time AR eyewear and contact lens rendering</li>
          <li>Shop QR codes for fast device access</li>
          <li>Intuitive experience on all camera-enabled devices</li>
          <li>No external SDKs—proprietary, lightning-fast computer vision</li>
        </ul>
        <div style="margin-top: 22px;">
          <p class="ar-feature-progress-title">Integration Progress</p>
          <div style="margin-bottom: 8px;">
            <span class="ar-progress-label">Webcam-Based Try-On</span>
            <div class="ar-progress-bar-outer">
              <div class="ar-progress-bar-inner-blue" style="width: 92%;"></div>
            </div>
          </div>
          <div style="margin-bottom: 8px;">
            <span class="ar-progress-label">Shop Dashboard Tools</span>
            <div class="ar-progress-bar-outer">
              <div class="ar-progress-bar-inner-blue" style="width: 75%;"></div>
            </div>
          </div>
          <div style="margin-bottom: 8px;">
            <span class="ar-progress-label">Smart Lens/Glasses Fitting</span>
            <div class="ar-progress-bar-outer ar-progress-bar-outer-pink">
              <div class="ar-progress-bar-inner-pink" style="width: 60%;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
