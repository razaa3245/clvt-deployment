<div class="flex bg-gradient-to-br from-white via-blue-50 to-blue-100 min-h-screen">
  <main class="flex-1 grid grid-cols-12 items-center gap-5 px-20">
    <!-- Left Content -->
    <div class="col-span-12 md:col-span-6 space-y-6">
      <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight">
        Transform Your Optical Shop with 
        <span class="text-blue-600">Virtual Try-On</span>
      </h1>

      <p class="text-gray-600 text-lg leading-relaxed">
        Empower your customers to visualize contact lenses instantly. 
        No installations, no complexity — just scan and try.
      </p>

      <div class="flex flex-wrap gap-4 mt-6">
        <button type="button"
          class="bg-blue-600 hover:bg-blue-700 transition-all duration-300 text-white px-8 py-3 rounded-xl shadow-lg hover:shadow-xl">
          <a href="shopkeeper.blade.php">
          Start Free Trial
          </a>
        </button>
        <!-- Watch Demo Button -->
<a href="#"
   class="border-2 border-blue-600 text-blue-600 hover:bg-blue-50 transition-all duration-300 px-8 py-3 rounded-xl inline-block text-center"
   onclick="openModal('demoModal'); return false;">
   Watch Demo
</a>

<!-- Demo Video Modal -->
<div id="demoModal" class="modal"
     style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
            background:rgba(0,0,0,0.6); justify-content:center; align-items:center;
            z-index:1000;">
  <div class="modal-content"
       style="background:#fff; padding:20px; border-radius:12px; max-width:800px; width:90%;
              position:relative; box-shadow:0 10px 30px rgba(0,0,0,0.2);">
    
    <!-- Close Button -->
    <button class="close-btn" onclick="closeModal('demoModal')"
            style="position:absolute; top:10px; right:15px; background:none; border:none; 
                   font-size:24px; color:#333; cursor:pointer;">&times;</button>

    <!-- Header -->
    <div class="modal-header" style="text-align:center; margin-bottom:10px;">
      <h3 style="font-size:1.75rem; font-weight:700; color:#111;">Watch Product Demo</h3>
    </div>

    <!-- Video Container -->
    <div class="video-container"
         style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden; border-radius:10px;">
      <iframe id="demoVideo"
              src="https://www.youtube.com/embed/LZymeRtax3Q?enablejsapi=1"
              title="Demo Video"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
              style="position:absolute; top:0; left:0; width:100%; height:100%; border:0;">
      </iframe>
    </div>

    <!-- Description -->
    <p style="margin-top:1rem; color:#555; font-size:0.9rem; text-align:center;">
      See how our virtual try-on technology transforms the eyewear shopping experience.
    </p>
  </div>
</div>
      </div>

      <div class="flex gap-10 mt-10 text-gray-800">
        <div class="text-center">
          <h2 class="text-4xl font-bold text-blue-700">500+</h2>
          <p class="text-gray-600 font-medium">Active Shops</p>
        </div>
        <div class="text-center">
          <h2 class="text-4xl font-bold text-blue-700">50k+</h2>
          <p class="text-gray-600 font-medium">Try-Ons Daily</p>
        </div>
        <div class="text-center">
          <h2 class="text-4xl font-bold text-blue-700">98%</h2>
          <p class="text-gray-600 font-medium">Satisfaction</p>
        </div>
      </div>
    </div>

    <!-- Right Image -->
    <div class="col-span-12 md:col-span-6 flex justify-center items-center">
  <img 
    src="{{asset(path: 'images/img1.jpeg') }}" 
    alt=""
    style="width: 450px; height: 450px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); transition: transform 0.3s ease;"
    class="hover:scale-105"
  >
</div>

  </main>
</div>
<script>
  // Open modal
  function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.style.display = 'flex';
      document.body.style.overflow = 'hidden';
    }
  }

  // Close modal + stop YouTube video
  function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.style.display = 'none';
      document.body.style.overflow = '';

      // Pause video when modal closes
      const iframe = modal.querySelector('iframe');
      if (iframe) {
        iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
      }
    }
  }

  // Close when clicking outside
  document.addEventListener('click', function(e) {
    if (e.target.classList.contains('modal')) {
      closeModal(e.target.id);
    }
  });

  // Close on Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      document.querySelectorAll('.modal').forEach(modal => {
        if (modal.style.display === 'flex') closeModal(modal.id);
      });
    }
  });
</script>
