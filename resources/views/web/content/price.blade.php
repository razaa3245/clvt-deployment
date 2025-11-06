@include('web.layouts.header')
@include('web.layouts.navbar')

<body class="font-sans bg-gradient-to-br from-[#f3f8ff] via-[#eef4ff] to-[#e3f2fd] min-h-screen py-20">

  <div class="text-center mb-16 mt-24">
    <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight mb-3">Simple, Transparent Pricing</h1>
    <p class="text-gray-600 text-lg">Choose the plan that fits your optical shop’s needs. No hidden fees, cancel anytime.</p>
  </div>

  <div class="flex justify-center flex-wrap gap-10 px-6">

    <!-- BASIC PLAN -->
    <div class="group relative w-80 bg-white border border-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl hover:-translate-y-2 transition-all duration-500">
      <div class="relative z-10 text-center">
        <h2 class="text-2xl font-bold text-gray-800">Basic</h2>
        <p class="text-4xl font-extrabold text-blue-600 mt-3">$29.99<span class="text-sm text-gray-500 font-medium"> / 1 month</span></p>
        <p class="text-gray-500 mt-2 mb-6">Perfect for small optical shops</p>

        <a href="{{ route('subscription.start', ['plan' => 'basic']) }}">
          <button class="w-full bg-blue-600 text-white py-2.5 rounded-lg font-semibold shadow-md hover:bg-blue-700 transition-all duration-300">
            Get Started
          </button>
        </a>

        <ul class="mt-6 text-left text-gray-600 space-y-2 text-sm">
          <li> 1 month subscription</li>
      <li> Virtual try-on for unlimited customers</li>
      <li> Unique QR code</li>
      <li> Basic dashboard access</li>
      <li> Email support</li>
      <li> Up to 50 lens SKUs</li>
        </ul>
      </div>
    </div>

    <!-- PRO PLAN -->
    <div class="group relative w-80 bg-gradient-to-b from-blue-600 to-blue-500 text-white rounded-2xl p-8 shadow-2xl hover:shadow-blue-300/60 hover:-translate-y-3 transition-all duration-500">
      <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-white text-blue-600 text-xs font-bold uppercase tracking-wide px-4 py-1 rounded-full shadow-md">
        Most Popular
      </div>

      <div class="relative z-10 text-center">
        <h2 class="text-2xl font-bold">Professional</h2>
        <p class="text-4xl font-extrabold mt-3">$79.99<span class="text-sm font-medium opacity-80"> / 6 Months</span></p>
        <p class="opacity-80 mt-2 mb-6">For growing businesses</p>

        <a href="signup.blade.php">
          <button class="w-full bg-white text-blue-600 py-2.5 rounded-lg font-semibold shadow-md hover:bg-blue-50 transition-all duration-300">
            Get Started
          </button>
        </a>

        <ul class="mt-6 text-left space-y-2 text-sm opacity-90">
          <li> 6 months subscription</li>
          <li> Everything in Basic</li>
          <li> Advanced analytics</li>
          <li> Priority email support</li>
          <li> Custom branding options</li>
          <li> Up to 200 lens SKUs</li>
        </ul>
      </div>
    </div>

    <!-- ENTERPRISE PLAN -->
    <div class="group relative w-80 bg-white border border-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl hover:-translate-y-2 transition-all duration-500">
      <div class="relative z-10 text-center">
        <h2 class="text-2xl font-bold text-gray-800">Enterprise</h2>
        <p class="text-4xl font-extrabold text-blue-600 mt-3">$199.99<span class="text-sm text-gray-500 font-medium"> / 12 Months</span></p>
        <p class="text-gray-500 mt-2 mb-6">Unlimited access for large chains</p>

        <a href="signup.blade.php">
          <button class="w-full bg-blue-600 text-white py-2.5 rounded-lg font-semibold shadow-md hover:bg-blue-700 transition-all duration-300">
            Get Started
          </button>
        </a>

        <ul class="mt-6 text-left text-gray-600 space-y-2 text-sm">
          <li> 12 months subscription</li>
          <li> Everything in Pro</li>
          <li> Dedicated account manager</li>
          <li> 24/7 priority support</li>
          <li> Unlimited lens SKUs</li>
          <li> Advanced customization</li>
          <li> API access</li>
        </ul>
      </div>
    </div>

  </div>

  <!-- ALL PLANS INCLUDE -->
  <div class="mt-20 text-center">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">All Plans Include</h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-5xl mx-auto text-gray-700 text-sm">
      <div class="flex items-start space-x-3">
        <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15 4.293 10.879a1 1 0 011.414-1.414L8.414 12.172l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
        <span><strong>Virtual Try-On Technology</strong><br>Advanced AR for realistic lens previews</span>
      </div>

      <div class="flex items-start space-x-3">
        <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15 4.293 10.879a1 1 0 011.414-1.414L8.414 12.172l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
        <span><strong>QR Code Generation</strong><br>Easy customer access via mobile</span>
      </div>

      <div class="flex items-start space-x-3">
        <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15 4.293 10.879a1 1 0 011.414-1.414L8.414 12.172l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
        <span><strong>Shop Dashboard</strong><br>Manage everything in one place</span>
      </div>

      <div class="flex items-start space-x-3">
        <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15 4.293 10.879a1 1 0 011.414-1.414L8.414 12.172l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
        <span><strong>Regular Updates</strong><br>Always get the latest features</span>
      </div>
    </div>
@include('web.layouts.footer')
    

</body>
