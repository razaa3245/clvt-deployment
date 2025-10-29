@include('web.layouts.header')
@include('web.layouts.navbar')

<body class="font-sans bg-gradient-to-br from-[#e8f0ff] via-[#f9fbff] to-[#e3f2fd] min-h-screen py-20">

  <div class="text-center mb-16 mt-24">
    <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight mb-3">Simple, Transparent Pricing</h1>
    <p class="text-gray-600 text-lg">Choose the plan that fits your optical shop’s needs. No hidden fees, cancel anytime.</p>
  </div>

  <div class="flex justify-center flex-wrap gap-10 px-6">


<!-- BASIC PLAN -->
<div class="group relative w-80 bg-white/40 backdrop-blur-xl border border-blue-200 rounded-2xl p-8 shadow-lg hover:shadow-blue-200/60 hover:-translate-y-3 transition-all duration-500">
  <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-white/50 to-blue-50/20 opacity-60 group-hover:opacity-80 transition-all duration-500"></div>
  <div class="relative z-10 text-center">
    <h2 class="text-2xl font-bold text-gray-800">Basic</h2>
    <p class="text-4xl font-extrabold text-blue-600 mt-3">$29<span class="text-sm text-gray-500 font-medium"> / month</span></p>
    <p class="text-gray-500 mt-2 mb-6">Perfect for small optical shops</p>

    <a href="shopkeeper.blade.php">
      <button class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-2.5 rounded-lg font-semibold shadow-md hover:shadow-lg hover:from-indigo-600 hover:to-blue-600 transition-all duration-300">
        Get Started
      </button>
    </a>

    <ul class="mt-6 text-left text-gray-600 space-y-2 text-sm">
      <li>✨ 1 month subscription</li>
      <li>👁️ Virtual try-on for unlimited customers</li>
      <li>🔗 Unique QR code</li>
      <li>📊 Basic dashboard access</li>
      <li>📧 Email support</li>
      <li>🪞 Up to 50 lens SKUs</li>
    </ul>
  </div>
</div>

<!-- PRO PLAN -->
<div class="group relative w-80 bg-gradient-to-br from-blue-50 via-white to-cyan-50 backdrop-blur-xl border border-cyan-300 rounded-2xl p-8 shadow-2xl hover:shadow-cyan-300/60 hover:-translate-y-4 transition-all duration-500">
  <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-blue-600 to-cyan-400 text-white text-xs font-bold uppercase tracking-wide px-4 py-1 rounded-full shadow-md">
    Most Popular
  </div>

  <div class="relative z-10 text-center">
    <h2 class="text-2xl font-bold text-gray-800">Pro</h2>
    <p class="text-4xl font-extrabold text-blue-600 mt-3">$149<span class="text-sm text-gray-500 font-medium"> / 6 months</span></p>
    <p class="text-gray-500 mt-2 mb-6">Most popular for growing businesses</p>

    <button class="w-full bg-gradient-to-r from-blue-600 to-cyan-400 text-white py-2.5 rounded-lg font-semibold shadow-lg hover:shadow-cyan-400/60 transition-all duration-300">
      Get Started
    </button>

    <ul class="mt-6 text-left text-gray-600 space-y-2 text-sm">
      <li>🚀 6 months subscription</li>
      <li>📈 Everything in Basic</li>
      <li>🧠 Advanced analytics</li>
      <li>⚡ Priority email support</li>
      <li>🎨 Custom branding options</li>
      <li>💾 Up to 200 lens SKUs</li>
    </ul>
  </div>

  <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-blue-100/30 to-cyan-100/20 blur-3xl opacity-40 group-hover:opacity-70 transition-all duration-500"></div>
</div>

<!-- PRO PLUS PLAN -->
<div class="group relative w-80 bg-white/40 backdrop-blur-xl border border-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-indigo-300/60 hover:-translate-y-3 transition-all duration-500">
  <div class="relative z-10 text-center">
    <h2 class="text-2xl font-bold text-gray-800">Pro Plus</h2>
    <p class="text-4xl font-extrabold text-blue-600 mt-3">$249<span class="text-sm text-gray-500 font-medium"> / 12 months</span></p>
    <p class="text-gray-500 mt-2 mb-6">Best value for established shops</p>

    <button class="w-full bg-gradient-to-r from-indigo-600 to-blue-600 text-white py-2.5 rounded-lg font-semibold shadow-md hover:shadow-indigo-400/50 transition-all duration-300">
      Get Started
    </button>

    <ul class="mt-6 text-left text-gray-600 space-y-2 text-sm">
      <li>🌟 12 months subscription</li>
      <li>💡 Everything in Pro</li>
      <li>👤 Dedicated account manager</li>
      <li>⏰ 24/7 priority support</li>
      <li>🔓 Unlimited lens SKUs</li>
      <li>🎯 Advanced customization</li>
      <li>🔗 API access</li>
    </ul>
  </div>
</div>


  </div>

  <div class="text-center mt-16 text-gray-600 text-sm">
    All plans include a <span class="text-blue-600 font-semibold">14-day free trial</span>. No credit card required.<br>
    <a href="#" class="text-blue-600 hover:underline mt-2 inline-block">Need a custom plan for multiple locations? Contact our sales team</a>
  </div>

</body>
