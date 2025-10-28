
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f5f7fb;">

  <!-- HEADER -->

  <header style="padding: 20px 40px; background-color: #ffffff; border-bottom: 1px solid #e6e8ec; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 10;">
    <div style="font-size: 26px; font-weight: bold; color: #007bff; letter-spacing: 0.5px;">VirtualLens</div>
    <nav style="display: flex; gap: 25px;">
      <a href="#" style="text-decoration: none; color: #333; font-size: 15px;" onmouseover="this.style.color='#007bff'" onmouseout="this.style.color='#333'">My Optical Shop</a>
      <a href="#" style="text-decoration: none; color: #dc3545; font-size: 15px;" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">Logout</a>
    </nav>
  </header>

  <!-- MAIN CONTENT -->

  <main style="padding: 40px; max-width: 1250px; margin: auto;">

<!-- STATS CARDS -->
<div style="display: flex; flex-wrap: wrap; gap: 25px; margin-bottom: 40px;">
  
  <!-- CARD -->
  <div style="flex: 1 1 250px; background-color: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.05); transition: 0.3s;" 
       onmouseover="this.style.boxShadow='0 6px 16px rgba(0,0,0,0.1)'" onmouseout="this.style.boxShadow='0 2px 6px rgba(0,0,0,0.05)'">
    <div style="font-size: 15px; color: #6c757d; margin-bottom: 10px;">Total Try Ons</div>
    <div style="display: flex; justify-content: space-between; align-items: center;">
      <span style="font-size: 36px; font-weight: bold; color: #333;">1,247</span>
      <div style="font-size: 22px;">📈</div>
    </div>
    <div style="font-size: 13px; color: #28a745; margin-top: 6px;">+12% from last month</div>
  </div>

</div>

 <div style="flex: 1 1 250px; background-color: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.05); border-left: 6px solid #007bff; transition: 0.3s;" 
       onmouseover="this.style.boxShadow='0 6px 16px rgba(0,0,0,0.1)'" onmouseout="this.style.boxShadow='0 2px 6px rgba(0,0,0,0.05)'">
    <div style="font-size: 15px; color: #6c757d; margin-bottom: 10px;">Subscription</div>
    <div style="font-size: 26px; font-weight: bold; color: #333;">Pro Plan</div>
    <div style="font-size: 13px; color: #007bff; margin-top: 6px;">124 days remaining</div>
  </div>

<!-- LOWER SECTION -->
<div style="display: flex; flex-wrap: wrap; gap: 25px;">

  <!-- QR CARD -->
  <div style="flex: 2 1 500px; background-color: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.05); transition:0.3s;"
       onmouseover="this.style.boxShadow='0 6px 16px rgba(0,0,0,0.1)'" onmouseout="this.style.boxShadow='0 2px 6px rgba(0,0,0,0.05)'">
    <div style="font-size: 18px; font-weight: bold; color: #333; margin-bottom: 10px;">📱 Your Shop's QR Code</div>
    <p style="font-size: 14px; color: #6c757d;">Display this QR code in your shop for customers to scan.</p>
    <div style="text-align: center; margin: 30px 0;">
      <div style="width: 200px; height: 200px; border: 1px solid #ddd; padding: 10px; margin: auto;">QR CODE</div>
      <p style="font-size: 13px; color: #6c757d; margin-top: 10px;">Scan to view lens catalogue</p>
    </div>
    <div style="display: flex; gap: 10px;">
      <button style="flex:1; padding:12px; border:none; border-radius:6px; background-color:#007bff; color:white; font-weight:bold; cursor:pointer;"
              onmouseover="this.style.backgroundColor='#0056b3'" onmouseout="this.style.backgroundColor='#007bff'">⬇️ Download QR</button>
      <button style="flex:1; padding:12px; border:1px solid #007bff; border-radius:6px; background-color:#fff; color:#007bff; font-weight:bold; cursor:pointer;"
              onmouseover="this.style.backgroundColor='#e7f1ff'" onmouseout="this.style.backgroundColor='#fff'">Copy Link</button>
    </div>
    <p style="font-size: 13px; color: #6c757d; margin-top: 15px;">Catalogue URL: <span style="color:#007bff;">https://example.com/catalogue</span></p>
  </div>

  <!-- SIDE PANEL -->
  <div style="flex: 1 1 300px; display: flex; flex-direction: column; gap: 25px;">

    <!-- Quick Actions -->
    <div style="background-color:#fff; padding:25px; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.05); transition:0.3s;"
         onmouseover="this.style.boxShadow='0 6px 16px rgba(0,0,0,0.1)'" onmouseout="this.style.boxShadow='0 2px 6px rgba(0,0,0,0.05)'">
      <div style="font-size:17px; font-weight:bold; margin-bottom:10px; color:#333;">⚡ Quick Actions</div>
      <p style="font-size:14px; color:#6c757d;">Manage your shop and lens catalog easily.</p>
      <div style="margin-top:10px;">
        <div style="padding:10px 0; border-bottom:1px solid #eee; color:#007bff; font-size:14px; cursor:pointer;"
             onmouseover="this.style.color='#0056b3'" onmouseout="this.style.color='#007bff'">👁️ Preview Try-On Experience</div>
       
        <div style="padding:10px 0; color:#007bff; font-size:14px; cursor:pointer;"
             onmouseover="this.style.color='#0056b3'" onmouseout="this.style.color='#007bff'">⬆️ Upgrade Plan</div>
      </div>
    </div>

    

  </main>

