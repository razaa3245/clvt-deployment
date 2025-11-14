<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Master Lens Catalog - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50">
    <!-- SIDEBAR -->
    <aside x-data="{ open: false }" 
           :class="open ? 'w-64' : 'w-20'" 
           class="h-screen bg-white shadow-md border-r border-gray-200 transition-all duration-300 flex flex-col justify-between fixed top-0 left-0 z-50">

      <!-- Top Section -->
      <div>
        <!-- Logo -->
        <div class="flex items-center justify-between p-4">
          <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
              <span class="text-cyan-600 font-bold text-lg">V</span>
            </div>
            <div x-show="open" class="text-gray-700">
              <span id="sidebar-email" class="text-sm text-gray-600"></span>
              <p class="text-xs text-gray-400 -mt-1">Admin</p>
            </div>
          </div>
          <button @click="open = !open" class="text-gray-400 hover:text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
          </button>
        </div>

        <!-- Navigation -->
        <nav class="mt-6">
          <p x-show="open" class="text-xs text-gray-400 px-6 mb-2 uppercase tracking-widest">Overview</p>
          <ul>
            <li>
              <a href="/admin/dashboard" class="flex items-center px-6 py-2 hover:bg-cyan-50 text-gray-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 group-hover:text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span x-show="open" x-transition class="ml-3 text-sm">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="/catalog" class="flex items-center px-6 py-2 bg-cyan-50 text-cyan-600 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <span x-show="open" x-transition class="ml-3 text-sm font-semibold">Lens Catalog</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>

      <!-- Account Section -->
      <div class="border-t border-gray-100 py-4">
        <ul>
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

    <!-- MAIN CONTENT -->
    <div class="ml-20 transition-all duration-300">
        <!-- HEADER -->
        <header class="bg-white border-b border-gray-200 px-10 py-5 shadow-sm sticky top-0 z-40">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
              <img src="https://cdn-icons-gif.flaticon.com/10606/10606611.gif" class="w-8 h-8 rounded-lg" alt="Logo">
              <h1 class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">VisionTech</h1>
            </div>
            <div class="flex items-center gap-4">
              <span id="admin-email" class="text-sm text-gray-600"></span>
            </div>
          </div>
        </header>

        <div class="container mx-auto px-4 py-8">
            <!-- Statistics Cards -->
            <!-- (No changes here) -->

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Shop Management -->
                <!-- (No changes here) -->

                <!-- ✅ Master Lens Catalog (Alpine.js version) -->
                <div x-data="lensCatalogV2()" x-init="fetchLenses()" class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <span class="text-2xl mr-3">👁️</span>
                            <h2 class="text-2xl font-bold">Master Lens Catalog</h2>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Add and manage lenses available across all shops</p>
                    
                    <button @click="openModal()" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition mb-4">
                        + Add New Lens
                    </button>

                    <template x-if="lenses.length === 0">
                        <p class="text-center text-gray-400 py-8">No lenses found</p>
                    </template>

                    <div class="space-y-4 max-h-96 overflow-y-auto">
                        <template x-for="lens in lenses" :key="lens.id">
                            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                                <div class="flex items-center">
                                    <template x-if="lens.image_url">
                                        <img :src="lens.image_url" :alt="lens.name" class="w-12 h-12 rounded-full object-cover mr-4">
                                    </template>
                                    <template x-if="!lens.image_url">
                                        <div class="w-12 h-12 rounded-full mr-4 bg-gradient-to-br from-blue-400 to-purple-500"></div>
                                    </template>
                                    <div>
                                        <h3 class="font-semibold" x-text="lens.name"></h3>
                                        <p class="text-sm text-gray-600" x-text="`${lens.brand || 'No Brand'} • ${lens.type}`"></p>
                                        <p class="text-sm text-gray-600" x-text="`Color: ${lens.color || 'N/A'} • $${lens.price || 0}`"></p>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button @click="editLens(lens)" class="text-blue-600 hover:text-blue-800">Edit</button>
                                    <button @click="deleteLens(lens.id)" class="text-red-600 hover:text-red-800">Delete</button>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Alpine.js Lens Modal -->
                    <div x-show="showModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50" x-transition>
                        <div class="bg-white rounded-lg p-8 max-w-2xl w-full mx-4" @click.away="closeModal()">
                            <h3 class="text-2xl font-bold mb-6" x-text="editMode ? 'Edit Lens' : 'Add New Lens'"></h3>
                            <form @submit.prevent="saveLens">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Lens Name *</label>
                                        <input type="text" x-model="form.name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Brand</label>
                                        <input type="text" x-model="form.brand" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                                        <input type="text" x-model="form.color" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Type *</label>
                                        <input type="text" x-model="form.type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                                    </div>
                                </div>

                                <div class="flex gap-4 mt-6">
                                    <button type="submit" class="flex-1 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">
                                        Save Lens
                                    </button>
                                    <button type="button" @click="closeModal()" class="flex-1 bg-gray-300 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-400">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ✅ END Alpine.js Master Catalog -->
            </div>
        </div>
    </div>

    <!-- Keep all your original JS, modal, and functions below -->
    <script>
        function lensCatalogV2() {
            return {
                lenses: [],
                showModal: false,
                editMode: false,
                form: { id: null, name: '', brand: '', color: '', type: '', price: 0 },
                async fetchLenses() {
                    try {
                        const token = localStorage.getItem('auth_token');
                        const res = await fetch('/api/lenses', {
                            headers: { 'Authorization': 'Bearer ' + token }
                        });
                        const data = await res.json();
                        if (data.success) this.lenses = data.data;
                    } catch (e) { console.error(e); }
                },
                openModal() {
                    this.form = { id: null, name: '', brand: '', color: '', type: '', price: 0 };
                    this.editMode = false;
                    this.showModal = true;
                },
                closeModal() { this.showModal = false; },
                editLens(lens) {
                    this.form = { ...lens };
                    this.editMode = true;
                    this.showModal = true;
                },
                async saveLens() {
                    const token = localStorage.getItem('auth_token');
                    const url = this.editMode ? `/api/admin/lenses/${this.form.id}` : '/api/admin/lenses';
                    const method = this.editMode ? 'PUT' : 'POST';
                    try {
                        const res = await fetch(url, {
                            method,
                            headers: {
                                'Content-Type': 'application/json',
                                'Authorization': 'Bearer ' + token,
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify(this.form)
                        });
                        const data = await res.json();
                        if (data.success) {
                            this.fetchLenses();
                            this.closeModal();
                        } else alert('Error saving lens');
                    } catch (e) { console.error(e); }
                },
                async deleteLens(id) {
                    if (!confirm('Delete this lens?')) return;
                    const token = localStorage.getItem('auth_token');
                    try {
                        await fetch(`/api/admin/lenses/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'Authorization': 'Bearer ' + token,
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        });
                        this.fetchLenses();
                    } catch (e) { console.error(e); }
                }
            };
        }
    </script>

    <!-- Existing original JS scripts here (unchanged) -->
    <!-- ... (all your previous JS from your original code remains) -->
</body>
</html>
