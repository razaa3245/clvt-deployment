@include('web.layouts.header')
@include('web.layouts.navbar')

<body class="font-sans bg-gradient-to-br from-[#f3f8ff] via-[#eef4ff] to-[#e3f2fd] min-h-screen py-20">

  <div class="container mx-auto px-6 mt-20">
    <div class="text-center mb-12">
      <h1 class="text-4xl font-extrabold text-gray-800 mb-3">Need Help? Contact Us Now!</h1>
      <p class="text-gray-600 max-w-2xl mx-auto">
        Thank you for your interest. Please fill out the form and we will get back to you promptly regarding your request.
      </p>
    </div>

    <div class="flex flex-col lg:flex-row justify-center items-center gap-12">

      <!-- Left Contact Form -->
      <div class="w-full max-w-md bg-gradient-to-b from-blue-600 to-blue-500 rounded-[2rem] p-10 shadow-2xl text-white hover:shadow-blue-300/50 hover:-translate-y-2 transition-all duration-500">
        <h2 class="text-xl font-semibold mb-6 text-center">Please fill this form</h2>

        <form action="#" method="POST" class="space-y-5">
          @csrf
          <input type="text" name="name" placeholder="Full Name" class="w-full px-4 py-3 rounded-lg bg-white text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
          <input type="email" name="email" placeholder="Email Address" class="w-full px-4 py-3 rounded-lg bg-white text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
          <input type="tel" name="phone" placeholder="Phone Number" class="w-full px-4 py-3 rounded-lg bg-white text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
          
          <select name="service" class="w-full px-4 py-3 rounded-lg bg-white text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            <option value="">Service You Want</option>
            <option value="lens_fitting">Lens Fitting</option>
            <option value="virtual_tryon">Virtual Try-On</option>
            <option value="subscription">Subscription Support</option>
          </select>

          <textarea name="message" rows="3" placeholder="Message" class="w-full px-4 py-3 rounded-lg bg-white text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>

          <button type="submit" class="w-full bg-white text-blue-600 font-semibold py-3 rounded-lg shadow-md hover:bg-blue-50 hover:shadow-lg transition-all duration-300">
            Send Message
          </button>
        </form>
      </div>

      <!-- Right Contact Info -->
      <div class="w-full max-w-md bg-white border border-gray-200 rounded-2xl shadow-lg hover:shadow-xl hover:-translate-y-2 transition-all duration-500 p-10">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">We are available <span class="text-blue-600">24/7</span></h3>
        <p class="text-gray-600 mb-6">
          We’re always here to help. Reach out anytime for support or inquiries.
        </p>

        <ul class="space-y-4 text-gray-700">
          <li class="flex items-center gap-3 hover:text-blue-600 transition-all duration-300">
            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
              <path d="M2 3.5A1.5 1.5 0 013.5 2h13A1.5 1.5 0 0118 3.5v13a1.5 1.5 0 01-1.5 1.5h-13A1.5 1.5 0 012 16.5v-13zM10 4a6 6 0 100 12A6 6 0 0010 4zm0 1.5a4.5 4.5 0 110 9 4.5 4.5 0 010-9z" />
            </svg>
            +92 325 2703679
          </li>

          <li class="flex items-center gap-3 hover:text-blue-600 transition-all duration-300">
            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
              <path d="M2.94 6.94A1.5 1.5 0 014.5 6h11a1.5 1.5 0 011.56.94L10 11.382 2.94 6.94zM18 8.618V14.5A1.5 1.5 0 0116.5 16h-13A1.5 1.5 0 012 14.5V8.618l7.5 4.44a1.5 1.5 0 001.5 0L18 8.618z" />
            </svg>
            muhammadshoaib10808@gmail.com
          </li>

          <li class="flex items-center gap-3 hover:text-blue-600 transition-all duration-300">
            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 2a6 6 0 016 6c0 4.418-6 10-6 10S4 12.418 4 8a6 6 0 016-6zm0 3a3 3 0 100 6 3 3 0 000-6z" clip-rule="evenodd" />
            </svg>
             Danish Optics,Satellite Town,Rawalpindi,Pakistan
          </li>
        </ul>

        <!-- Social Links -->
        <div class="flex gap-5 mt-6">
          <a href="#" class="text-blue-600 hover:text-blue-700 hover:scale-110 transition-transform duration-300">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="text-blue-600 hover:text-blue-700 hover:scale-110 transition-transform duration-300">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="text-blue-600 hover:text-blue-700 hover:scale-110 transition-transform duration-300">
            <i class="fab fa-linkedin-in"></i>
          </a>
        </div>
      </div>

    </div>
  </div>

@include('web.layouts.footer')
</body>
