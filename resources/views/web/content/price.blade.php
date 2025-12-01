<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VisionTech Pricing</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-50 via-white to-slate-100 font-sans antialiased">

  <!-- Header Section -->
  <div class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-cyan-600 py-20 px-4">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse" style="animation-delay: 1s;"></div>
    
    <div class="relative max-w-5xl mx-auto text-center">
      <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full mb-6">
        <svg class="w-4 h-4 text-cyan-200" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
        </svg>
        <span class="text-white text-sm font-semibold">Simple, Transparent Pricing</span>
      </div>
      
      <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 tracking-tight leading-tight">
        Choose Your Perfect Plan
      </h1>
      <p class="text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed">
        Empower your optical shop with cutting-edge virtual try-on technology. No hidden fees, cancel anytime.
      </p>
    </div>
  </div>

  <!-- Pricing Cards Section -->
  <div class="relative -mt-16 px-4 pb-20">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-6">
        
        <!-- BASIC PLAN -->
        <div class="group relative bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden transform transition-all duration-500 hover:scale-105 hover:shadow-2xl">
          <!-- Card Header -->
          <div class="relative h-32 bg-gradient-to-br from-slate-50 to-slate-100 border-b border-gray-200">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-transparent"></div>
            <div class="relative p-8">
              <div class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg mb-4">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
              </div>
              <h3 class="text-2xl font-bold text-gray-900">Basic</h3>
            </div>
          </div>

          <!-- Card Body -->
          <div class="p-8">
            <!-- Price -->
            <div class="mb-8">
              <div class="flex items-baseline gap-2 mb-2">
                <span class="text-5xl font-extrabold text-gray-900">Rs25k</span>
                <span class="text-gray-500 font-medium">/month</span>
              </div>
              <p class="text-gray-600 text-sm">Perfect for small optical shops</p>
            </div>

            <!-- CTA Button -->
            <a href="{{ route('subscription.start', ['plan' => 'basic']) }}" class="block mb-8">
              <button class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-4 px-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                Get Started
              </button>
            </a>

            <!-- Features List -->
            <div class="space-y-4">
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-green-100 flex items-center justify-center mt-0.5">
                  <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <span class="text-gray-700 text-sm font-medium">1 month subscription</span>
              </div>
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-green-100 flex items-center justify-center mt-0.5">
                  <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <span class="text-gray-700 text-sm font-medium">Virtual try-on for unlimited customers</span>
              </div>
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-green-100 flex items-center justify-center mt-0.5">
                  <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <span class="text-gray-700 text-sm font-medium">Unique QR code</span>
              </div>
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-green-100 flex items-center justify-center mt-0.5">
                  <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <span class="text-gray-700 text-sm font-medium">Basic dashboard access</span>
              </div>
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-green-100 flex items-center justify-center mt-0.5">
                  <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <span class="text-gray-700 text-sm font-medium">Up to 50 lens SKUs</span>
              </div>
            </div>
          </div>
        </div>

        <!-- PROFESSIONAL PLAN (FEATURED) -->
        <div class="group relative bg-gradient-to-br from-blue-600 via-blue-700 to-cyan-600 rounded-3xl shadow-2xl overflow-hidden transform transition-all duration-500 hover:scale-110 hover:shadow-blue-500/50 lg:-mt-4 lg:mb-4">
          <!-- Popular Badge -->
          <div class="absolute -top-1 left-1/2 transform -translate-x-1/2 z-20">
            <div class="bg-gradient-to-r from-yellow-400 to-orange-400 text-gray-900 text-xs font-bold uppercase tracking-wider px-6 py-2 rounded-full shadow-lg flex items-center gap-2">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
              </svg>
              Most Popular
            </div>
          </div>

          <!-- Decorative Glow -->
          <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
          
          <!-- Card Header -->
          <div class="relative h-32 border-b border-white/20 bg-white/5">
            <div class="relative p-8 pt-12">
              <div class="inline-flex items-center justify-center w-14 h-14 bg-white/20 backdrop-blur-sm rounded-2xl shadow-lg mb-4">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
              </div>
              <h3 class="text-2xl font-bold text-white">Professional</h3>
            </div>
          </div>

          <!-- Card Body -->
          <div class="relative p-8">
            <!-- Price -->
            <div class="mb-8">
              <div class="flex items-baseline gap-2 mb-2">
                <span class="text-5xl font-extrabold text-white">Rs50k</span>
                <span class="text-blue-100 font-medium">/6 months</span>
              </div>
              <p class="text-blue-100 text-sm">For growing businesses</p>
            </div>

            <!-- CTA Button -->
            <a href="{{ route('subscription.start', ['plan' => 'professional']) }}" class="block mb-8">
              <button class="w-full bg-white text-blue-600 hover:bg-blue-50 font-semibold py-4 px-6 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                Get Started
              </button>
            </a>

            <!-- Features List -->
            <div class="space-y-4">
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-cyan-400/30 flex items-center justify-center mt-0.5">
                  <svg class="w-3 h-3 text-cyan-200" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <span class="text-white text-sm font-medium">6 months subscription</span>
              </div>
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-cyan-400/30 flex items-center justify-center mt-0.5">
                  <svg class="w-3 h-3 text-cyan-200" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <span class="text-white text-sm font-medium">Everything in Basic</span>
              </div>
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-cyan-400/30 flex items-center justify-center mt-0.5">
                  <svg class="w-3 h-3 text-cyan-200" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <span class="text-white text-sm font-medium">Advanced analytics</span>
              </div>
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-cyan-400/30 flex items-center justify-center mt-0.5">
                  <svg class="w-3 h-3 text-cyan-200" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <span class="text-white text-sm font-medium">Up to 200 lens SKUs</span>
              </div>
            </div>
          </div>
        </div>

        <!-- ENTERPRISE PLAN -->
        <div class="group relative bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden transform transition-all duration-500 hover:scale-105 hover:shadow-2xl">
          <!-- Card Header -->
          <div class="relative h-32 bg-gradient-to-br from-slate-50 to-slate-100 border-b border-gray-200">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-transparent"></div>
            <div class="relative p-8">
              <div class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl shadow-lg mb-4">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
              </div>
              <h3 class="text-2xl font-bold text-gray-900">Enterprise</h3>
            </div>
          </div>

          <!-- Card Body -->
          <div class="p-8">
            <!-- Price -->
            <div class="mb-8">
              <div class="flex items-baseline gap-2 mb-2">
                <span class="text-5xl font-extrabold text-gray-900">Rs100k</span>
                <span class="text-gray-500 font-medium">/year</span>
              </div>
              <p class="text-gray-600 text-sm">Unlimited access for large chains</p>
            </div>

            <!-- CTA Button -->
            <a href="{{ route('subscription.start', ['plan' => 'enterprise']) }}" class="block mb-8">
              <button class="w-full bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white font-semibold py-4 px-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                Get Started
              </button>
            </a>

            <!-- Features List -->
            <div class="space-y-4">
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-purple-100 flex items-center justify-center mt-0.5">
                  <svg class="w-3 h-3 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <span class="text-gray-700 text-sm font-medium">12 months subscription</span>
              </div>
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-purple-100 flex items-center justify-center mt-0.5">
                  <svg class="w-3 h-3 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <span class="text-gray-700 text-sm font-medium">Everything in Pro</span>
              </div>
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-purple-100 flex items-center justify-center mt-0.5">
                  <svg class="w-3 h-3 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <span class="text-gray-700 text-sm font-medium">Dedicated account manager</span>
              </div>
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-purple-100 flex items-center justify-center mt-0.5">
                  <svg class="w-3 h-3 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <span class="text-gray-700 text-sm font-medium">24/7 priority support</span>
              </div>
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-purple-100 flex items-center justify-center mt-0.5">
                  <svg class="w-3 h-3 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <span class="text-gray-700 text-sm font-medium">Unlimited lens SKUs</span>
              </div>
              <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-purple-100 flex items-center justify-center mt-0.5">
                  <svg class="w-3 h-3 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <span class="text-gray-700 text-sm font-medium">Advanced customization</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
<body class="bg-gradient-to-br from-slate-50 via-white to-slate-100 font-sans antialiased">

  <!-- All Plans Include Section -->
  <div class="relative py-24 px-4 overflow-hidden">
    <!-- Background Decoration -->
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-blue-50/30 to-transparent"></div>
    
    <div class="relative max-w-7xl mx-auto">
      <!-- Section Header -->
      <div class="text-center mb-16">
        <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-2 rounded-full mb-6">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
          </svg>
          <span class="text-sm font-semibold">Complete Package</span>
        </div>
        <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
          All Plans Include
        </h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          Every plan comes with our complete suite of powerful features to transform your optical business
        </p>
      </div>

      <!-- Features Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        
        <!-- Feature 1: Virtual Try-On -->
        <div class="group relative bg-white rounded-2xl p-8 shadow-lg border border-gray-200 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
          <!-- Icon Container -->
          <div class="relative mb-6">
            <div class="absolute inset-0 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-2xl blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-500"></div>
            <div class="relative w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
              </svg>
            </div>
          </div>
          
          <!-- Content -->
          <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-300">
            Virtual Try-On Technology
          </h3>
          <p class="text-gray-600 text-sm leading-relaxed">
            Advanced AR-powered virtual try-on for realistic lens previews that help customers visualize their perfect look
          </p>
          
          <!-- Hover Line -->
          <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-cyan-500 to-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 rounded-b-2xl"></div>
        </div>

        <!-- Feature 2: QR Code -->
        <div class="group relative bg-white rounded-2xl p-8 shadow-lg border border-gray-200 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
          <!-- Icon Container -->
          <div class="relative mb-6">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-400 to-pink-500 rounded-2xl blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-500"></div>
            <div class="relative w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
              </svg>
            </div>
          </div>
          
          <!-- Content -->
          <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-purple-600 transition-colors duration-300">
            QR Code Generation
          </h3>
          <p class="text-gray-600 text-sm leading-relaxed">
            Instant QR code generation for seamless customer access via mobile devices, making try-ons effortless
          </p>
          
          <!-- Hover Line -->
          <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-purple-500 to-pink-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 rounded-b-2xl"></div>
        </div>

        <!-- Feature 3: Dashboard -->
        <div class="group relative bg-white rounded-2xl p-8 shadow-lg border border-gray-200 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
          <!-- Icon Container -->
          <div class="relative mb-6">
            <div class="absolute inset-0 bg-gradient-to-br from-orange-400 to-red-500 rounded-2xl blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-500"></div>
            <div class="relative w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
              </svg>
            </div>
          </div>
          
          <!-- Content -->
          <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-orange-600 transition-colors duration-300">
            Shop Dashboard
          </h3>
          <p class="text-gray-600 text-sm leading-relaxed">
            Comprehensive dashboard to manage your entire optical shop operations from a single, intuitive interface
          </p>
          
          <!-- Hover Line -->
          <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-orange-500 to-red-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 rounded-b-2xl"></div>
        </div>

        <!-- Feature 4: Updates -->
        <div class="group relative bg-white rounded-2xl p-8 shadow-lg border border-gray-200 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
          <!-- Icon Container -->
          <div class="relative mb-6">
            <div class="absolute inset-0 bg-gradient-to-br from-green-400 to-emerald-500 rounded-2xl blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-500"></div>
            <div class="relative w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
              </svg>
            </div>
          </div>
          
          <!-- Content -->
          <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition-colors duration-300">
            Regular Updates
          </h3>
          <p class="text-gray-600 text-sm leading-relaxed">
            Continuous platform improvements and new features to keep your shop at the cutting edge of technology
          </p>
          
          <!-- Hover Line -->
          <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-green-500 to-emerald-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 rounded-b-2xl"></div>
        </div>

      </div>

      <!-- Trust Badge Section -->
      <div class="mt-20 bg-gradient-to-br from-blue-600 to-cyan-600 rounded-3xl p-12 shadow-2xl relative overflow-hidden">
        <!-- Decorative Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-cyan-400 rounded-full mix-blend-overlay filter blur-3xl opacity-20"></div>
        
        <div class="relative grid grid-cols-1 md:grid-cols-3 gap-8 text-center text-white">
          <div>
            <div class="text-5xl font-extrabold mb-2">500+</div>
            <p class="text-blue-100 text-sm font-medium">Optical Shops Using VisionTech</p>
          </div>
          <div>
            <div class="text-5xl font-extrabold mb-2">99.9%</div>
            <p class="text-blue-100 text-sm font-medium">Customer Satisfaction Rate</p>
          </div>
          <div>
            <div class="text-5xl font-extrabold mb-2">24/7</div>
            <p class="text-blue-100 text-sm font-medium">Dedicated Support Available</p>
          </div>
        </div>
      </div>

      <!-- CTA Section -->
      <div class="mt-16 text-center">
        <h3 class="text-3xl font-bold text-gray-900 mb-4">
          Ready to Transform Your Optical Shop?
        </h3>
        <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto">
          Join hundreds of optical shops already using VisionTech to enhance customer experience
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
          <a href="#pricing" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-semibold px-8 py-4 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
            <span>Choose Your Plan</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
          </a>
          <a href="#contact" class="inline-flex items-center gap-2 bg-white border-2 border-gray-300 hover:border-blue-600 text-gray-900 hover:text-blue-600 font-semibold px-8 py-4 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
            <span>Contact Sales</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>