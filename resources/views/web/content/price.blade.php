@include('web.layouts.header')
@include('web.layouts.navbar')

<body style="font-family: 'Segoe UI', sans-serif; background-color: #f8fbff; margin: 0; padding: 40px;">

  <h1 style="text-align:center; font-size:28px; color:#333; margin-bottom:10px;">Simple, Transparent Pricing</h1>
  <p style="text-align:center; font-size:16px; color:#666; margin-bottom:40px;">
    Choose the plan that fits your optical shop’s needs. No hidden fees, cancel anytime.
  </p>

  <div style="display:flex; justify-content:center; flex-wrap:wrap; gap:20px;">


<!-- Basic Plan -->
<div style="width:280px; background:#fff; border:2px solid #dce3f0; border-radius:10px; padding:25px; text-align:center; transition:all 0.3s ease; box-shadow:0 0 0 rgba(0,0,0,0);" 
  onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.1)'; this.style.border='2px solid #007bff';" 
  onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0 0 rgba(0,0,0,0)'; this.style.border='2px solid #dce3f0';">

  <h2 style="font-size:22px; color:#333;">Basic</h2>
  <p style="font-size:26px; color:#007bff; margin:10px 0;">$29 <span style="font-size:14px; color:#777;">/ month</span></p>
  <p style="color:#666; margin-bottom:20px;">Perfect for small optical shops</p>

  <button style="background:#007bff; color:#fff; border:none; border-radius:6px; padding:10px 20px; font-weight:600; cursor:pointer; width:100%; transition:background 0.3s;"
    onmouseover="this.style.background='#005fcc';" 
    onmouseout="this.style.background='#007bff';">
    <a href="shopkeeper.blade.php">
    Get Started</button>
    </a>
  <ul style="list-style:none; padding:0; text-align:left; margin-top:20px; color:#555; font-size:14px; line-height:1.8;">
    <li>✔️ 1 month subscription</li>
    <li>✔️ Virtual try-on for unlimited customers</li>
    <li>✔️ Unique QR code</li>
    <li>✔️ Basic dashboard access</li>
    <li>✔️ Email support</li>
    <li>✔️ Up to 50 lens SKUs</li>
  </ul>
</div>

<!-- Pro Plan -->
<div style="width:280px; background:#fff; border:2px solid #00bfff; border-radius:10px; padding:25px; text-align:center; position:relative; transition:all 0.3s ease;"
  onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 8px 25px rgba(0,0,0,0.15)'; this.style.border='2px solid #007bff';"
  onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0 0 rgba(0,0,0,0)'; this.style.border='2px solid #00bfff';">

  <div style="position:absolute; top:-12px; left:50%; transform:translateX(-50%); background:linear-gradient(90deg, #007bff, #00d4ff); color:#fff; padding:4px 16px; border-radius:12px; font-size:12px; font-weight:600;">
    Most Popular
  </div>

  <h2 style="font-size:22px; color:#333; margin-top:20px;">Pro</h2>
  <p style="font-size:26px; color:#007bff; margin:10px 0;">$149 <span style="font-size:14px; color:#777;">/ 6 months</span></p>
  <p style="color:#666; margin-bottom:20px;">Most popular for growing businesses</p>

  <button style="background:linear-gradient(90deg, #007bff, #00d4ff); color:#fff; border:none; border-radius:6px; padding:10px 20px; font-weight:600; cursor:pointer; width:100%; transition:opacity 0.3s;"
    onmouseover="this.style.opacity='0.8';" 
    onmouseout="this.style.opacity='1';">Get Started</button>

  <ul style="list-style:none; padding:0; text-align:left; margin-top:20px; color:#555; font-size:14px; line-height:1.8;">
    <li>✔️ 6 months subscription</li>
    <li>✔️ Everything in Basic</li>
    <li>✔️ Advanced analytics</li>
    <li>✔️ Priority email support</li>
    <li>✔️ Up to 200 lens SKUs</li>
    <li>✔️ Custom branding options</li>
  </ul>
</div>

<!-- Pro Plus Plan -->
<div style="width:280px; background:#fff; border:2px solid #dce3f0; border-radius:10px; padding:25px; text-align:center; transition:all 0.3s ease;"
  onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.1)'; this.style.border='2px solid #007bff';"
  onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0 0 rgba(0,0,0,0)'; this.style.border='2px solid #dce3f0';">

  <h2 style="font-size:22px; color:#333;">Pro Plus</h2>
  <p style="font-size:26px; color:#007bff; margin:10px 0;">$249 <span style="font-size:14px; color:#777;">/ 12 months</span></p>
  <p style="color:#666; margin-bottom:20px;">Best value for established shops</p>

  <button style="background:#007bff; color:#fff; border:none; border-radius:6px; padding:10px 20px; font-weight:600; cursor:pointer; width:100%; transition:background 0.3s;"
    onmouseover="this.style.background='#005fcc';" 
    onmouseout="this.style.background='#007bff';">Get Started</button>

  <ul style="list-style:none; padding:0; text-align:left; margin-top:20px; color:#555; font-size:14px; line-height:1.8;">
    <li>✔️ 12 months subscription</li>
    <li>✔️ Everything in Pro</li>
    <li>✔️ Dedicated account manager</li>
    <li>✔️ 24/7 priority support</li>
    <li>✔️ Unlimited lens SKUs</li>
    <li>✔️ Advanced customization</li>
    <li>✔️ API access</li>
  </ul>
</div>


  </div>

  <p style="text-align:center; margin-top:40px; font-size:14px; color:#777;">
    All plans include a 14-day free trial. No credit card required.<br>
    <a href="#" style="color:#007bff; text-decoration:none;">Need a custom plan for multiple locations? Contact our sales team</a>
  </p>

</body>