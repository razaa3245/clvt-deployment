@extends('layouts.app')

@section('content')
<div x-data="shopkeeperApp()" x-init="init()" class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-700">Shopkeepers</h1>
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
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Phone</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <template x-for="(shopkeeper, index) in shopkeepers" :key="shopkeeper.id">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3" x-text="index + 1"></td>
                        <td class="px-6 py-3" x-text="shopkeeper.name"></td>
                        <td class="px-6 py-3" x-text="shopkeeper.email"></td>
                        <td class="px-6 py-3" x-text="shopkeeper.phone"></td>
                        <td class="px-6 py-3 text-center space-x-2">
                            <button @click="openEditModal(shopkeeper.id)" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                            <button @click="confirmDelete(shopkeeper.id)" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <!-- Form Modal -->
    <div x-show="showFormModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-60">
        <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4" x-text="isEditing ? 'Edit Shopkeeper' : 'Create Shopkeeper'"></h2>
            <form @submit.prevent="saveShopkeeper">
                <div class="grid gap-4">
                    <input type="text" x-model="form.name" placeholder="Name" class="border p-2 rounded w-full">
                    <input type="email" x-model="form.email" placeholder="Email" class="border p-2 rounded w-full">
                    <input type="text" x-model="form.phone" placeholder="Phone" class="border p-2 rounded w-full">
                </div>
                <div class="flex justify-end mt-6 space-x-2">
                    <button type="button" @click="closeModal()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded" x-text="isEditing ? 'Update' : 'Save'"></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation -->
    <div x-show="showDeleteModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-60">
        <div class="bg-white rounded-xl shadow-lg p-6 text-center w-full max-w-sm">
            <h2 class="text-lg font-semibold mb-4">Delete this Shopkeeper?</h2>
            <div class="flex justify-center space-x-3">
                <button @click="closeModal()" class="bg-gray-300 px-4 py-2 rounded">No</button>
                <button @click="deleteShopkeeper()" class="bg-red-600 text-white px-4 py-2 rounded">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
function shopkeeperApp() {
    return {
        showFormModal: false,
        showDeleteModal: false,
        isEditing: false,
        shopkeepers: [],
        form: { id: '', name: '', email: '', phone: '' },

        async init() { await this.fetchShopkeepers(); },
        async fetchShopkeepers() {
            const res = await axios.get('/api/shopkeepers');
            this.shopkeepers = res.data;
        },
        openCreateModal() {
            this.isEditing = false;
            this.form = { id: '', name: '', email: '', phone: '' };
            this.showFormModal = true;
        },
        async openEditModal(id) {
            this.isEditing = true;
            const res = await axios.get(`/api/shopkeepers/${id}`);
            this.form = res.data;
            this.showFormModal = true;
        },
        async saveShopkeeper() {
            if (this.isEditing)
                await axios.put(`/api/shopkeepers/${this.form.id}`, this.form);
            else
                await axios.post('/api/shopkeepers', this.form);
            this.showFormModal = false;
            await this.fetchShopkeepers();
        },
        confirmDelete(id) {
            this.form.id = id;
            this.showDeleteModal = true;
        },
        async deleteShopkeeper() {
            await axios.delete(`/api/shopkeepers/${this.form.id}`);
            this.showDeleteModal = false;
            await this.fetchShopkeepers();
        },
        closeModal() {
            this.showFormModal = false;
            this.showDeleteModal = false;
        }
    }
}
</script>
@endsection
