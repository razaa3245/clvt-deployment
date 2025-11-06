@extends('layouts.app')

@section('content')
<div x-data="tryOnApp()" x-init="init()" class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-700">Try-On Records</h1>
        <button @click="openCreateModal()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Create New
        </button>
    </div>

    <!-- Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">#</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Shop</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Lens</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Customer</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Try-On Time</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <template x-for="(tryon, index) in tryOns" :key="tryon.id">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3" x-text="index + 1"></td>
                        <td class="px-6 py-3" x-text="tryon.shop?.name ?? 'N/A'"></td>
                        <td class="px-6 py-3" x-text="tryon.lens?.name ?? 'N/A'"></td>
                        <td class="px-6 py-3" x-text="tryon.customer?.name ?? 'N/A'"></td>
                        <td class="px-6 py-3" x-text="tryon.tryon_time"></td>
                        <td class="px-6 py-3 text-center space-x-2">
                            <button @click="openViewModal(tryon.id)" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">View</button>
                            <button @click="openEditModal(tryon.id)" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                            <button @click="confirmDelete(tryon.id)" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <!-- Form Modal -->
    <div x-show="showFormModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-60">
        <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4" x-text="isEditing ? 'Edit Try-On' : 'Create Try-On'"></h2>
            <form @submit.prevent="saveTryOn">
                <div class="grid gap-4">
                    <select x-model="form.shop_id" class="border p-2 rounded w-full">
                        <option value="">Select Shop</option>
                        <template x-for="shop in shops" :key="shop.id">
                            <option :value="shop.id" x-text="shop.name"></option>
                        </template>
                    </select>

                    <select x-model="form.lens_id" class="border p-2 rounded w-full">
                        <option value="">Select Lens</option>
                        <template x-for="lens in lenses" :key="lens.id">
                            <option :value="lens.id" x-text="lens.name"></option>
                        </template>
                    </select>

                    <select x-model="form.customer_id" class="border p-2 rounded w-full">
                        <option value="">Select Customer</option>
                        <template x-for="cust in customers" :key="cust.id">
                            <option :value="cust.id" x-text="cust.name"></option>
                        </template>
                    </select>

                    <input type="datetime-local" x-model="form.tryon_time" class="border p-2 rounded w-full">
                </div>
                <div class="flex justify-end mt-6 space-x-2">
                    <button type="button" @click="closeModal()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded" x-text="isEditing ? 'Update' : 'Save'"></button>
                </div>
            </form>
        </div>
    </div>

    <!-- View Modal -->
    <div x-show="showViewModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-60">
        <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4">View Try-On Record</h2>
            <p><strong>Shop:</strong> <span x-text="selected.shop"></span></p>
            <p><strong>Lens:</strong> <span x-text="selected.lens"></span></p>
            <p><strong>Customer:</strong> <span x-text="selected.customer"></span></p>
            <p><strong>Time:</strong> <span x-text="selected.time"></span></p>
            <div class="flex justify-end mt-4">
                <button @click="closeModal()" class="px-4 py-2 bg-blue-500 text-white rounded">Close</button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation -->
    <div x-show="showDeleteModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-60">
        <div class="bg-white rounded-xl shadow-lg p-6 text-center w-full max-w-sm">
            <h2 class="text-lg font-semibold mb-4">Delete this Try-On record?</h2>
            <div class="flex justify-center space-x-3">
                <button @click="closeModal()" class="bg-gray-300 px-4 py-2 rounded">No</button>
                <button @click="deleteTryOn()" class="bg-red-600 text-white px-4 py-2 rounded">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
function tryOnApp() {
    return {
        showFormModal: false,
        showViewModal: false,
        showDeleteModal: false,
        isEditing: false,
        tryOns: [],
        shops: [],
        lenses: [],
        customers: [],
        form: { id: '', shop_id: '', lens_id: '', customer_id: '', tryon_time: '' },
        selected: { shop: '', lens: '', customer: '', time: '' },

        async init() { await this.fetchAllData(); },
        async fetchAllData() {
            const [tryonRes, shopRes, lensRes, custRes] = await Promise.all([
                axios.get('/api/tryons'),
                axios.get('/api/shopkeepers'),
                axios.get('/api/lenses'),
                axios.get('/api/customers'),
            ]);
            this.tryOns = tryonRes.data;
            this.shops = shopRes.data;
            this.lenses = lensRes.data;
            this.customers = custRes.data;
        },
        openCreateModal() {
            this.isEditing = false;
            this.form = { id: '', shop_id: '', lens_id: '', customer_id: '', tryon_time: '' };
            this.showFormModal = true;
        },
        async openEditModal(id) {
            this.isEditing = true;
            const res = await axios.get(`/api/tryons/${id}`);
            this.form = res.data;
            this.showFormModal = true;
        },
        async openViewModal(id) {
            const res = await axios.get(`/api/tryons/${id}`);
            this.selected = {
                shop: res.data.shop?.name ?? 'N/A',
                lens: res.data.lens?.name ?? 'N/A',
                customer: res.data.customer?.name ?? 'N/A',
                time: res.data.tryon_time,
            };
            this.showViewModal = true;
        },
        confirmDelete(id) {
            this.form.id = id;
            this.showDeleteModal = true;
        },
        async saveTryOn() {
            if (this.isEditing) await axios.put(`/api/tryons/${this.form.id}`, this.form);
            else await axios.post('/api/tryons', this.form);
            this.showFormModal = false;
            await this.fetchAllData();
        },
        async deleteTryOn() {
            await axios.delete(`/api/tryons/${this.form.id}`);
            this.showDeleteModal = false;
            await this.fetchAllData();
        },
        closeModal() {
            this.showFormModal = false;
            this.showViewModal = false;
            this.showDeleteModal = false;
        }
    }
}
</script>
@endsection
