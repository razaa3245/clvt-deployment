<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <span id="sidebar-email" class="text-sm text-gray-600"></span>
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
            <a href="/admin/dashboard" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
              <svg xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5 text-gray-500 group-hover:text-cyan-500"
                  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
              <span x-show="open" x-transition class="ml-3 text-sm">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="/messages" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
              <svg xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5 text-gray-500 group-hover:text-cyan-500"
                  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 15a2 2 0 01-2 2H5l-2 2V5a2 2 0 012-2h14a2 2 0 012 2v10z" />
              </svg>
              <span x-show="open" class="ml-3 text-sm">Notifications</span>
            </a>
          </li>
        </ul>
      </nav>
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
        <!-- Logo / Brand -->
        <div class="flex items-center gap-3">
          <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
          <a href="/" class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">VisionTech</a>
        </div>
        
        <div class="flex items-center gap-4">
          <!-- Display admin email -->
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

    <!-- Loading Spinner -->
    <div id="loading-spinner" class="flex justify-center items-center py-20">
      <div class="animate-spin rounded-full h-16 w-16 border-b-2 border-cyan-600"></div>
      <p class="ml-4 text-gray-600">Loading lenses...</p>
    </div>

    <!-- Lens Cards Container -->
    <div id="lenses-container" class="max-w-7xl mx-auto mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4 hidden">
      <!-- Lenses will be dynamically loaded here -->
    </div>

    <!-- No Lenses Message -->
    <div id="no-lenses" class="hidden text-center py-20">
      <p class="text-gray-500 text-lg">No lenses found</p>
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
        <div class="text-cyan-600 text-3xl mb-2">🔄</div>
        <h4 class="font-semibold text-gray-800 mb-1">Easy Returns</h4>
        <p class="text-sm text-gray-500">30-day return policy on all unopened products</p>
      </div>
    </div>

    <!-- Footer CTA -->
    <div class="max-w-4xl mx-auto bg-cyan-50 text-center mt-12 mb-12 p-8 rounded-2xl">
      <h2 class="text-2xl font-bold text-cyan-700 mb-2">Ready to Manage Your Lenses?</h2>
      <p class="text-gray-600 mb-4">You can update or delete lens details easily using the options above.</p>
      <button onclick="window.location.href='/admin/dashboard'" class="bg-cyan-600 hover:bg-cyan-700 text-white px-6 py-3 rounded-lg font-semibold">Go to Dashboard</button>
    </div>
  </div>

  <!-- Edit Lens Modal -->
  <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-8 max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
      <h3 class="text-2xl font-bold mb-6">Edit Lens</h3>
      <form id="editForm">
        <input type="hidden" id="edit-lens-id">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Lens Name *</label>
            <input type="text" id="edit-name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:outline-none">
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Brand</label>
            <input type="text" id="edit-brand" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:outline-none">
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Color</label>
            <input type="text" id="edit-color" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:outline-none">
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Type *</label>
            <input type="text" id="edit-type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:outline-none">
          </div>
          
          <div class="col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
            <input type="file" id="edit-image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            <div id="edit-image-preview" class="mt-2 hidden">
              <img id="edit-preview-img" src="" alt="Preview" class="w-20 h-20 rounded-full object-cover border-2 border-gray-300">
            </div>
          </div>
        </div>
        
        <div class="flex gap-4 mt-6">
          <button type="submit" class="flex-1 bg-cyan-600 text-white py-3 rounded-lg font-semibold hover:bg-cyan-700 transition-all">
            Update Lens
          </button>
          <button type="button" onclick="closeEditModal()" class="flex-1 bg-gray-300 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-400 transition-all">
            Cancel
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    let allLenses = [];
    let currentFilter = 'all';

    // ========================================
    // INITIALIZATION
    // ========================================
    document.addEventListener('DOMContentLoaded', function() {
      const token = localStorage.getItem('auth_token');
      const userInfo = JSON.parse(localStorage.getItem('user_info') || '{}');
      
      if (userInfo.email) {
        document.getElementById('admin-email').textContent = userInfo.email;
        document.getElementById('sidebar-email').textContent = userInfo.email;
      }
      
      loadLenses();
      setupImagePreview();
      setupEditForm();
    });

    // ========================================
    // LOAD LENSES FROM API
    // ========================================
    async function loadLenses() {
      try {
        const token = localStorage.getItem('auth_token');
        const response = await fetch('/api/lenses', {
          headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
          }
        });
        
        const data = await response.json();
        
        if (data.success) {
          allLenses = data.data;
          document.getElementById('loading-spinner').classList.add('hidden');
          document.getElementById('lenses-container').classList.remove('hidden');
          displayLenses(allLenses);
        } else {
          showNoLenses();
        }
      } catch (error) {
        console.error('Error loading lenses:', error);
        showNoLenses();
      }
    }

    // ========================================
    // DISPLAY LENSES
    // ========================================
    function displayLenses(lenses) {
      const container = document.getElementById('lenses-container');
      const noLensesDiv = document.getElementById('no-lenses');
      
      if (!lenses || lenses.length === 0) {
        container.classList.add('hidden');
        noLensesDiv.classList.remove('hidden');
        return;
      }
      
      container.classList.remove('hidden');
      noLensesDiv.classList.add('hidden');
      container.innerHTML = '';
      
      lenses.forEach(lens => {
        const lensId = lens.lens_id || lens.id;
        
        // Determine image source
        let imageHtml;
        if (lens.image) {
          imageHtml = `<div class="w-20 h-20 mx-auto rounded-full border-4 border-gray-100 overflow-hidden">
            <img src="${lens.image}" alt="${lens.name}" class="w-full h-full object-cover">
          </div>`;
        } else {
          // Create colored circle based on lens color
          const colorMap = {
            'brown': '#8B4513',
            'blue': '#4169E1',
            'green': '#228B22',
            'gray': '#808080',
            'grey': '#808080',
            'hazel': '#8E7618',
            'violet': '#8B00FF',
            'black': '#000000'
          };
          
          const lensColor = lens.color ? lens.color.toLowerCase() : 'gray';
          const bgColor = colorMap[lensColor] || '#808080';
          
          imageHtml = `<div class="w-20 h-20 mx-auto rounded-full border-4 border-gray-100" style="background-color: ${bgColor};"></div>`;
        }
        
        // Generate random rating (for display purposes)
        const rating = (4.0 + Math.random() * 1).toFixed(1);
        const reviews = Math.floor(80 + Math.random() * 150);
        
        // Generate random price (for display purposes)
        const price = Math.floor(35 + Math.random() * 30);
        
        const lensCard = `
          <div class="bg-white rounded-2xl shadow-md p-5 text-center hover:shadow-lg transition" data-type="${(lens.type || '').toLowerCase()}">
            <div class="flex justify-between items-center mb-3">
              <h3 class="text-lg font-semibold text-gray-800">${lens.name}</h3>
              <span class="bg-cyan-100 text-cyan-700 text-xs px-2 py-1 rounded-full font-medium">New</span>
            </div>
            ${imageHtml}
            <p class="mt-3 text-sm text-gray-500">${lens.brand || 'Premium'} • ${lens.type || 'Colored'}</p>
            <div class="flex justify-center items-center mt-2 text-yellow-500 text-sm">
              ⭐ ${rating} <span class="text-gray-400 ml-1">(${reviews}+ reviews)</span>
            </div>
            <p class="text-xl font-bold mt-3">$${price} <span class="text-sm font-normal text-gray-500">per pair</span></p>

            <div class="flex justify-center space-x-2 mt-4">
              <button onclick="openEditModal(${lensId})" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg text-sm transition-all">Update Lens</button>
              <button onclick="deleteLens(${lensId})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm transition-all">Delete Lens</button>
            </div>
          </div>
        `;
        
        container.innerHTML += lensCard;
      });
    }

    // ========================================
    // FILTER LENSES
    // ========================================
    function filterLenses(filter) {
      currentFilter = filter;
      
      // Update button styles
      document.querySelectorAll('[id^="filter-"]').forEach(btn => {
        btn.classList.remove('bg-cyan-600', 'text-white');
        btn.classList.add('bg-gray-200', 'text-gray-800');
      });
      document.getElementById('filter-' + filter).classList.remove('bg-gray-200', 'text-gray-800');
      document.getElementById('filter-' + filter).classList.add('bg-cyan-600', 'text-white');
      
      // Filter lenses
      if (filter === 'all') {
        displayLenses(allLenses);
      } else {
        const filtered = allLenses.filter(lens => {
          const type = (lens.type || '').toLowerCase();
          return type.includes(filter);
        });
        displayLenses(filtered);
      }
    }

    // ========================================
    // EDIT LENS MODAL
    // ========================================
    function openEditModal(id) {
      const lens = allLenses.find(l => l.id === id || l.lens_id === id);
      if (!lens) {
        console.error('Lens not found with id:', id);
        return;
      }
      
      document.getElementById('edit-lens-id').value = lens.id || lens.lens_id;
      document.getElementById('edit-name').value = lens.name || '';
      document.getElementById('edit-brand').value = lens.brand || '';
      document.getElementById('edit-color').value = lens.color || '';
      document.getElementById('edit-type').value = lens.type || '';
      
      const imagePreview = document.getElementById('edit-image-preview');
      const previewImg = document.getElementById('edit-preview-img');
      
      if (lens.image && previewImg && imagePreview) {
        const imageUrl = lens.image.startsWith('http') 
          ? lens.image 
          : '/storage/' + lens.image;
        previewImg.src = imageUrl;
        imagePreview.classList.remove('hidden');
      } else if (imagePreview) {
        imagePreview.classList.add('hidden');
      }
      
      document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
      document.getElementById('editModal').classList.add('hidden');
      document.getElementById('edit-image-preview').classList.add('hidden');
    }

    // ========================================
    // DELETE LENS
    // ========================================
    async function deleteLens(id) {
      if (!confirm('Are you sure you want to delete this lens?')) return;

      const token = localStorage.getItem('auth_token');
      let csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
      
      if (!csrfToken) {
        const cookies = document.cookie.split(';');
        for (let cookie of cookies) {
          const [name, value] = cookie.trim().split('=');
          if (name === 'XSRF-TOKEN') {
            csrfToken = decodeURIComponent(value);
            break;
          }
        }
      }
      
      console.log('Deleting lens ID:', id);
      
      const endpoints = [
        `/admin/lenses/${id}`,
        `/api/admin/lenses/${id}`,
        `/lenses/${id}`,
      ];
      
      try {
        let lastError = null;
        
        for (const endpoint of endpoints) {
          console.log(`Trying endpoint: ${endpoint}`);
          
          try {
            const headers = {
              'Accept': 'application/json',
              'X-Requested-With': 'XMLHttpRequest'
            };
            
            if (csrfToken) {
              headers['X-CSRF-TOKEN'] = csrfToken;
            }
            
            if (token) {
              headers['Authorization'] = 'Bearer ' + token;
            }
            
            let response = await fetch(endpoint, {
              method: 'DELETE',
              headers: headers
            });
            
            console.log(`DELETE response: ${response.status} ${response.statusText}`);
            
            if (response.status === 404 || response.status === 405) {
              console.log('Trying POST with _method=DELETE');
              
              const formData = new FormData();
              formData.append('_method', 'DELETE');
              
              const postHeaders = { ...headers };
              delete postHeaders['Content-Type'];
              
              response = await fetch(endpoint, {
                method: 'POST',
                headers: postHeaders,
                body: formData
              });
              
              console.log(`POST response: ${response.status} ${response.statusText}`);
            }
            
            if (response.ok) {
              const contentType = response.headers.get('content-type');
              let data;
              
              if (contentType && contentType.includes('application/json')) {
                data = await response.json();
              } else {
                const text = await response.text();
                try {
                  data = JSON.parse(text);
                } catch (e) {
                  data = { success: true };
                }
              }
              
              if (data.success !== false) {
                console.log('✓ Lens deleted successfully via', endpoint);
                alert('Lens deleted successfully');
                await loadLenses();
                return;
              }
            }
            
            const errorText = await response.text();
            lastError = { endpoint, status: response.status, body: errorText };
            console.error('Failed:', lastError);
            
          } catch (fetchError) {
            console.error(`Network error for ${endpoint}:`, fetchError);
            lastError = { endpoint, error: fetchError.message };
          }
        }
        
        console.error('All endpoints failed. Last error:', lastError);
        alert('Failed to delete lens. Error: ' + (lastError.body || lastError.error || 'Unknown error'));
        
      } catch (error) {
        console.error('Unexpected error:', error);
        alert('Error deleting lens: ' + error.message);
      }
    }

    // ========================================
    // IMAGE PREVIEW
    // ========================================
    function setupImagePreview() {
      const imageInput = document.getElementById('edit-image');
      const imagePreview = document.getElementById('edit-image-preview');
      const previewImg = document.getElementById('edit-preview-img');
      
      if (imageInput && imagePreview && previewImg) {
        imageInput.addEventListener('change', function(e) {
          const file = e.target.files[0];
          if (file) {
            if (!file.type.startsWith('image/')) {
              alert('Please select a valid image file');
              this.value = '';
              imagePreview.classList.add('hidden');
              return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
              previewImg.src = e.target.result;
              imagePreview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
          }
        });
      }
    }

    // ========================================
    // EDIT FORM SUBMISSION
    // ========================================
    function setupEditForm() {
      const editForm = document.getElementById('editForm');
      
      if (editForm) {
        editForm.addEventListener('submit', async function(e) {
          e.preventDefault();
          
          const token = localStorage.getItem('auth_token');
          let csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
          
          if (!csrfToken) {
            const cookies = document.cookie.split(';');
            for (let cookie of cookies) {
              const [name, value] = cookie.trim().split('=');
              if (name === 'XSRF-TOKEN') {
                csrfToken = decodeURIComponent(value);
                break;
              }
            }
          }
          
          const lensId = document.getElementById('edit-lens-id').value;
          console.log('Updating lens ID:', lensId);
          
          const formData = new FormData();
          formData.append('_method', 'PUT');
          formData.append('name', document.getElementById('edit-name').value);
          formData.append('brand', document.getElementById('edit-brand').value);
          formData.append('color', document.getElementById('edit-color').value);
          formData.append('type', document.getElementById('edit-type').value);
          
          const imageFile = document.getElementById('edit-image').files[0];
          if (imageFile) {
            formData.append('image', imageFile);
          }
          
          // Log form data for debugging
          console.log('Form data being sent:');
          for (let pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
          }
          
          const alternativeUrls = [
            `/admin/lenses/${lensId}`,
            `/api/admin/lenses/${lensId}`,
            `/lenses/${lensId}`,
          ];

          try {
            let lastError = null;
            
            for (const tryUrl of alternativeUrls) {
              console.log(`\nTrying to update at: ${tryUrl}`);
              
              const headers = {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
              };
              
              if (csrfToken) {
                headers['X-CSRF-TOKEN'] = csrfToken;
                console.log('CSRF Token added');
              }
              
              if (token) {
                headers['Authorization'] = 'Bearer ' + token;
                console.log('Auth token added');
              }
              
              try {
                const response = await fetch(tryUrl, {
                  method: 'POST',
                  headers: headers,
                  body: formData
                });
                
                console.log(`Response: ${response.status} ${response.statusText}`);
                
                // Try to read response body
                const contentType = response.headers.get('content-type');
                let responseText = await response.text();
                console.log('Response body:', responseText);
                
                if (response.ok) {
                  let data;
                  
                  if (contentType && contentType.includes('application/json')) {
                    try {
                      data = JSON.parse(responseText);
                    } catch (e) {
                      console.warn('Failed to parse JSON, treating as success');
                      data = { success: true };
                    }
                  } else {
                    try {
                      data = JSON.parse(responseText);
                    } catch (e) {
                      console.warn('Non-JSON response, treating as success');
                      data = { success: true };
                    }
                  }
                  
                  console.log('Parsed data:', data);
                  
                  if (data.success !== false) {
                    console.log('✓ Lens updated successfully via', tryUrl);
                    alert('Lens updated successfully');
                    closeEditModal();
                    await loadLenses();
                    return;
                  } else {
                    const errorMsg = data.errors 
                      ? Object.values(data.errors).flat().join(', ')
                      : data.message || 'Unknown error';
                    console.error('Update failed with error:', errorMsg);
                    alert('Error: ' + errorMsg);
                    return;
                  }
                } else {
                  // Response not OK
                  lastError = { url: tryUrl, status: response.status, body: responseText };
                  console.error('Failed with status', response.status, ':', responseText);
                }
                
              } catch (fetchError) {
                console.error(`Network error for ${tryUrl}:`, fetchError);
                lastError = { url: tryUrl, error: fetchError.message };
              }
            }
            
            // All endpoints failed
            console.error('All endpoints failed. Last error:', lastError);
            const errorMessage = lastError.body || lastError.error || 'Unknown error';
            alert('Error updating lens: ' + errorMessage + '\n\nPlease check the console for more details.');
            
          } catch (error) {
            console.error('Unexpected error:', error);
            alert('Error updating lens: ' + error.message);
          }
        });
      }
    }

    // ========================================
    // SHOW NO LENSES MESSAGE
    // ========================================
    function showNoLenses() {
      document.getElementById('loading-spinner').classList.add('hidden');
      document.getElementById('lenses-container').classList.add('hidden');
      document.getElementById('no-lenses').classList.remove('hidden');
    }

    // ========================================
    // LOGOUT
    // ========================================
    async function logout() {
      const token = localStorage.getItem('auth_token');
      
      try {
        await fetch('/api/logout', {
          method: 'POST',
          headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
          }
        });
      } catch (error) {
        console.error('Logout error:', error);
      }
      
      localStorage.removeItem('auth_token');
      localStorage.removeItem('user_role');
      localStorage.removeItem('user_info');
      
      window.location.href = '/signup';
    }
  </script>
</body>
</html>