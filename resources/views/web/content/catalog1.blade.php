<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lens Catalogue | VirtualLens</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen flex">
  <!-- SIDEBAR -->
  <aside x-data="{ open: false }" 
         :class="open ? 'w-64' : 'w-20'" 
         class="h-screen bg-white shadow-md border-r border-gray-200 transition-all duration-300 flex flex-col justify-between sticky top-0">

    <!-- Top Section -->
    <div>
      <!-- Logo -->
      <div class="flex items-center justify-between p-4">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
            <span class="text-cyan-600 font-bold text-lg">S</span>
          </div>
          <div x-show="open" class="text-gray-700">
            <span id="admin-email-sidebar" class="text-sm text-gray-600"></span>
            <p class="text-xs text-gray-400 -mt-1"></p>
          </div>
        </div>
        <button @click="open = !open" class="text-gray-400 hover:text-gray-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h7" />
          </svg>
        </button>
      </div>

      <!-- Overview -->
      <nav class="mt-6">
        <p x-show="open" class="text-xs text-gray-400 px-6 mb-2 uppercase tracking-widest">Overview</p>
        <ul>
         <li>
            <a href="/shopkeeper/dashboard" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
              <svg xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5 text-gray-500 group-hover:text-cyan-500"
                  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
              </svg>
              <span x-show="open" x-transition class="ml-3 text-sm">Dashboard</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- PREMIUM PLAN SECTION ADDED HERE -->
      <div x-show="open" class="mx-4 mt-6 bg-cyan-50 border border-cyan-200 rounded-2xl p-4 shadow-sm text-center">
        <h3 class="text-sm font-semibold text-cyan-700">Current Plan</h3>
        <p class="text-lg font-bold text-gray-800 mt-1">Premium <span class="text-sm text-gray-500">12.99 USD</span></p>
        <p class="text-xs text-gray-500 mt-1">12 November 2025</p>
        <button class="mt-3 w-full bg-cyan-600 hover:bg-cyan-700 text-white text-sm px-3 py-2 rounded-lg">
          Update Plan
        </button>
      </div>
      <!-- END OF ADDED SECTION -->
    </div>

   <!-- Account Section -->
      <div class="border-t border-gray-100 py-4">
        <ul>
          <li>
            <a href="#" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 group-hover:text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <span x-show="open" class="ml-3 text-sm">Settings</span>
            </a>
          </li>
          <li>
            <button onclick="logout()" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group w-full text-left">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 group-hover:text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
              </svg>
              <span x-show="open" class="ml-3 text-sm text-red-500">Logout</span>
            </button>
          </li>
        </ul>
      </div>
    </aside>


  <!-- MAIN PAGE CONTENT -->
  <div class="flex-1 flex flex-col">

    <!-- HEADER -->
    <header class="bg-white border-b border-gray-200 px-10 py-5 shadow-sm sticky top-0 z-50 transition-all duration-300 hover:shadow-md">
      <div class="flex items-center justify-between px-6 py-[10px]">
        <div class="flex items-center gap-3">
          <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
          <a href="#" class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">VisionTech</a>
        </div>
        
        <div class="flex items-center gap-4">
          <span id="admin-email" class="text-sm text-gray-600"></span>
        </div>
      </div>
    </header>

    <!-- Header -->
    <div class="max-w-7xl mx-auto py-6 px-4">
      <h1 class="text-3xl font-bold text-center text-cyan-600 mt-4">Lens Catalogue</h1>
      <p class="text-center text-gray-500 mt-1">Browse our collection of premium colored contact lenses</p>
    </div>

    <!-- Filter Buttons -->
    <div class="flex justify-center space-x-3 mt-4">
      <button onclick="filterLenses('all')" id="filter-all" class="px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700">All</button>
      <button onclick="filterLenses('natural')" id="filter-natural" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Natural</button>
      <button onclick="filterLenses('vibrant')" id="filter-vibrant" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Vibrant</button>
    </div>

    <!-- Loading State -->
    <div id="loading" class="max-w-7xl mx-auto mt-8 text-center">
      <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-cyan-600"></div>
      <p class="mt-4 text-gray-500">Loading lenses...</p>
    </div>

    <!-- Lens Cards Container -->
    <div id="lens-container" class="max-w-7xl mx-auto mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4" style="display: none;">
      <!-- Lens cards will be dynamically inserted here -->
    </div>

    <!-- No Lenses Message -->
    <div id="no-lenses" class="max-w-7xl mx-auto mt-8 text-center" style="display: none;">
      <div class="bg-white rounded-2xl shadow-md p-8">
        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
        </svg>
        <h3 class="mt-4 text-lg font-semibold text-gray-800">No lenses found</h3>
        <p class="mt-2 text-sm text-gray-500">There are no lenses in the catalogue yet.</p>
      </div>
    </div>

    <!-- Features Section -->
    <div class="max-w-7xl mx-auto mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 text-center px-4">
      <div class="bg-white rounded-2xl shadow p-6">
        <div class="text-cyan-600 text-3xl mb-2">👁️</div>
        <h4 class="font-semibold text-gray-800 mb-1">Virtual Try-On</h4>
        <p class="text-sm text-gray-500">See how each lens looks on you before buying</p>
      </div>
      <div class="bg-white rounded-2xl shadow p-6">
        <div class="text-cyan-600 text-3xl mb-2">✨</div>
        <h4 class="font-semibold text-gray-800 mb-1">Premium Quality</h4>
        <p class="text-sm text-gray-500">FDA approved, comfortable daily wear lenses</p>
      </div>
      <div class="bg-white rounded-2xl shadow p-6">
        <div class="text-cyan-600 text-3xl mb-2">↩️</div>
        <h4 class="font-semibold text-gray-800 mb-1">Easy Returns</h4>
        <p class="text-sm text-gray-500">30-day return policy on all unopened products</p>
      </div>
    </div>

    <!-- Footer CTA -->
    <div class="max-w-4xl mx-auto bg-cyan-50 text-center mt-12 mb-8 p-8 rounded-2xl">
      <h2 class="text-2xl font-bold text-cyan-700 mb-2">Ready to Manage Your Lenses?</h2>
      <p class="text-gray-600 mb-4">You can click simply and go to your Dashboard</p>
      <button onclick="window.location.href='/shopkeeper/dashboard'" class="bg-cyan-600 hover:bg-cyan-700 text-white px-6 py-3 rounded-lg font-semibold">Go To Dashboard</button>
    </div>

  </div>

  <script>
    let allLenses = [];
    let currentFilter = 'all';

    // Check authentication
    function checkAuth() {
      const token = localStorage.getItem('token');
      const adminEmail = localStorage.getItem('adminEmail');
      
      // For testing - comment these lines if you want to test without auth
      // if (!token || !adminEmail) {
      //   window.location.href = '/login';
      //   return false;
      // }
      
      // Display admin email
      if (adminEmail) {
        document.getElementById('admin-email').textContent = adminEmail;
        document.getElementById('admin-email-sidebar').textContent = adminEmail;
      } else {
        document.getElementById('admin-email').textContent = 'Admin';
        document.getElementById('admin-email-sidebar').textContent = 'Admin';
      }
      return true;
    }

    // Logout function
    function logout() {
      localStorage.removeItem('token');
      localStorage.removeItem('adminEmail');
      window.location.href = '/login';
    }

    // Fetch lenses from database
    async function fetchLenses() {
      const token = localStorage.getItem('token');
      
      // Try different possible API endpoints
      const possibleEndpoints = [
        'http://127.0.0.1:8000/api/lenses',
        'http://localhost:8000/api/lenses',
        '/api/lenses',
        'http://127.0.0.1:8000/api/admin/lenses',
      ];

      console.log('🔍 Starting to fetch lenses...');
      console.log('Token:', token ? 'Present ✓' : 'Missing ✗');

      for (let endpoint of possibleEndpoints) {
        try {
          console.log(`📡 Trying endpoint: ${endpoint}`);
          
          const headers = {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          };
          
          // Add token if available
          if (token) {
            headers['Authorization'] = `Bearer ${token}`;
          }

          const response = await fetch(endpoint, {
            method: 'GET',
            headers: headers
          });

          console.log(`Response status: ${response.status}`);

          if (response.ok) {
            const data = await response.json();
            console.log('✅ Success! Data received:', data);
            
            // Handle different response structures
            if (Array.isArray(data)) {
              allLenses = data;
            } else if (data.data && Array.isArray(data.data)) {
              allLenses = data.data;
            } else if (data.lenses && Array.isArray(data.lenses)) {
              allLenses = data.lenses;
            } else {
              console.log('Unexpected data structure:', data);
              allLenses = [];
            }
            
            console.log(`📦 Total lenses found: ${allLenses.length}`);
            displayLenses(allLenses);
            return; // Success, exit the function
          } else {
            const errorText = await response.text();
            console.log(`❌ Failed with status ${response.status}:`, errorText);
            
            if (response.status === 401) {
              console.log('⚠️ Authentication failed');
              // Uncomment below to redirect to login
              // logout();
              // return;
            }
          }
        } catch (error) {
          console.error(`❌ Error with endpoint ${endpoint}:`, error);
        }
      }

      // If we get here, all endpoints failed
      console.error('❌ All endpoints failed');
      document.getElementById('loading').style.display = 'none';
      document.getElementById('no-lenses').style.display = 'block';
      document.getElementById('no-lenses').innerHTML = `
        <div class="bg-white rounded-2xl shadow-md p-8">
          <svg class="mx-auto h-16 w-16 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
          <h3 class="mt-4 text-lg font-semibold text-gray-800">Failed to load lenses</h3>
          <p class="mt-2 text-sm text-gray-500">Check the browser console for error details.</p>
          <button onclick="fetchLenses()" class="mt-4 bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded-lg text-sm">Retry</button>
        </div>
      `;
    }

    // Display lenses
    function displayLenses(lenses) {
      const container = document.getElementById('lens-container');
      const loading = document.getElementById('loading');
      const noLenses = document.getElementById('no-lenses');

      console.log('📺 Displaying lenses:', lenses);
      loading.style.display = 'none';

      if (!lenses || lenses.length === 0) {
        console.log('⚠️ No lenses to display');
        container.style.display = 'none';
        noLenses.style.display = 'block';
        noLenses.innerHTML = `
          <div class="bg-white rounded-2xl shadow-md p-8">
            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
            </svg>
            <h3 class="mt-4 text-lg font-semibold text-gray-800">No lenses found</h3>
            <p class="mt-2 text-sm text-gray-500">There are no lenses in the catalogue yet.</p>
            <button onclick="window.location.href='/admin/add-lens'" class="mt-4 bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded-lg text-sm">Add New Lens</button>
          </div>
        `;
        return;
      }

      console.log(`✅ Displaying ${lenses.length} lenses`);
      noLenses.style.display = 'none';
      container.style.display = 'grid';
      container.innerHTML = '';

      lenses.forEach((lens, index) => {
        console.log(`Creating card for lens ${index + 1}:`, lens);
        const card = createLensCard(lens);
        container.innerHTML += card;
      });
    }

    // Create lens card HTML
    function createLensCard(lens) {
      console.log('🎨 Creating card for lens:', lens);
      
      // Handle different possible field names from database
      const id = lens.id || lens.lens_id;
      const name = lens.name || lens.lens_name || 'Unnamed Lens';
      const category = lens.category || lens.type || 'Natural';
      const rating = parseFloat(lens.rating || lens.stars || 4.5);
      const reviews = parseInt(lens.reviews || lens.review_count || 100);
      const price = parseFloat(lens.price || 45);
      const color = lens.color || lens.hex_color || lens.colour || '#8B4513';
      const isPopular = lens.is_popular || lens.popular || rating >= 4.5;

      console.log(`Card data - ID: ${id}, Name: ${name}, Price: ${price}, Color: ${color}`);

      return `
        <div class="bg-white rounded-2xl shadow-md p-5 text-center hover:shadow-lg transition">
          <div class="flex justify-between items-center mb-3">
            <h3 class="text-lg font-semibold text-gray-800">${name}</h3>
            ${isPopular ? '<span class="bg-cyan-100 text-cyan-700 text-xs px-2 py-1 rounded-full font-medium">Popular</span>' : ''}
          </div>
          <div class="w-20 h-20 mx-auto rounded-full border-4 border-gray-100" style="background-color: ${color}"></div>
          <p class="mt-3 text-sm text-gray-500">${category} • Premium Quality</p>
          <div class="flex justify-center items-center mt-2 text-yellow-500 text-sm">
            ⭐ ${rating.toFixed(1)} <span class="text-gray-400 ml-1">(${reviews}+ reviews)</span>
          </div>
          <p class="text-xl font-bold mt-3">${price} <span class="text-sm font-normal text-gray-500">per pair</span></p>

          <div class="flex justify-center mt-4">
            <button class="bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">Try This Lens</button>
          </div>
        </div>
      `;
    }

    // Filter lenses
    function filterLenses(filter) {
      currentFilter = filter;
      
      // Update button styles
      document.querySelectorAll('[id^="filter-"]').forEach(btn => {
        btn.className = 'px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300';
      });
      document.getElementById(`filter-${filter}`).className = 'px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700';

      // Filter and display
      if (filter === 'all') {
        displayLenses(allLenses);
      } else {
        const filtered = allLenses.filter(lens => 
          lens.category && lens.category.toLowerCase() === filter.toLowerCase()
        );
        displayLenses(filtered);
      }
    }

    // Update lens
    function updateLens(id) {
      window.location.href = `/admin/update-lens/${id}`;
    }

    // Delete lens
    async function deleteLens(id, name) {
      if (!confirm(`Are you sure you want to delete "${name}"?`)) {
        return;
      }

      const token = localStorage.getItem('token');

      try {
        const response = await fetch(`http://127.0.0.1:8000/api/lenses/${id}`, {
          method: 'DELETE',
          headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json'
          }
        });

        if (!response.ok) {
          throw new Error('Failed to delete lens');
        }

        alert('Lens deleted successfully!');
        fetchLenses(); // Refresh the list
      } catch (error) {
        console.error('Error deleting lens:', error);
        alert('Failed to delete lens. Please try again.');
      }
    }

    // Initialize on page load
    window.onload = function() {
      if (checkAuth()) {
        fetchLenses();
      }
    };



     // ========================================
        // LOGOUT
        // ========================================
        async function logout() {
            console.log('🚪 Logging out...');
            
            const token = localStorage.getItem('auth_token');
            
            try {
                await fetch('/api/logout', {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });
                
                console.log('✅ Logout successful');
            } catch (error) {
                console.error('⚠️ Logout error:', error);
            }
            
            localStorage.removeItem('auth_token');
            localStorage.removeItem('user_role');
            localStorage.removeItem('user_info');
            
            console.log('🧹 Local storage cleared');
            window.location.href = '/signup';
        }
  </script>
</body>
</html>