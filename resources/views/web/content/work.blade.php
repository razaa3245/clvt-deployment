<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<section class="bg-gradient-to-br from-[#d0e8ff] to-[#a8d0ff] py-20 font-poppins">
  <div class="text-center mb-16">
    <h1 class="text-5xl font-extrabold text-slate-800 mb-2">
      How It Works
    </h1>
    <p class="text-[#64748b] text-lg">
      Simple, seamless, and designed for in-store success
    </p>
  </div>

  <div class="flex flex-wrap items-center justify-center max-w-5xl mx-auto gap-16">
    <!-- Left Section -->
    <div class="flex-1 min-w-[320px]">
      <div class="mb-12">
        <h2 class="text-2xl text-blue-800 font-bold mb-2">
          <a href="#signup.blade.php" class="hover:underline">
            Shop Register
          </a>
        </h2>
        <p class="text-slate-600 text-base leading-relaxed">
          Sign up and choose your subscription plan. Get instant access to your dashboard.
        </p>
      </div>

      <div class="mb-12">
        <h2 class="text-2xl text-blue-800 font-bold mb-2">
          Generate QR Code
        </h2>
        <p class="text-slate-600 text-base leading-relaxed">
          Instantly create a QR code for your customers to scan and explore your virtual try-on.
        </p>
      </div>

      <div>
        <h2 class="text-2xl text-blue-800 font-bold mb-2">
          Customer Scan
        </h2>
        <p class="text-slate-600 text-base leading-relaxed">
          Customers scan the QR code to access the AR try-on feature on their devices — no installs needed.
        </p>
      </div>
    </div>

    <!-- Right Section (Image) -->
    <div class="flex-1 min-w-[320px] flex justify-center items-center">
      <img 
        src="{{ asset('images/image.jpg') }}"
        alt="Virtual Try-On"
        class="max-w-[400px] w-full h-auto rounded-3xl shadow-xl transition-transform duration-400 hover:scale-105"
      >
    </div>
  </div>
</section>
