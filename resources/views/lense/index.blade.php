@extends('layouts.app')

@section('content')
<div x-data="lensApp()" x-init="init()" class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-700">Lenses</h1>
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
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Brand</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Type</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Price</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <template x-for="(lens, index) in lenses" :key="lens.id">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3" x-text="index + 1"></td>
                        <td class="px-6 py-3" x-text="lens.name"></td>
                        <td class="px-6 py-3" x-text="lens.brand"></td>
                        <td class="px-6 py-3" x-text="lens.type"></td>
                        <td class="px-6 py-3" x-text="lens.price"></td>
                        <td class="px-6 py-3 text-center space-x-2">
                            <button @click="openEditModal(lens.id)" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                            <button @click="confirmDelete(lens.id)" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <!-- Form Modal -->
    <div x-show="showFormModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-60">
        <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4" x-text="isEditing ? 'Edit Lens' : 'Create Lens'"></h2>
            <form @submit.prevent="saveLens">
                <div class="grid gap-4">
                    <input type="text" x-model="form.name" placeholder="Name" class="border p-2 rounded w-full">
                    <input type="text" x-model="form.brand" placeholder="Brand" class="border p-2 rounded w-full">
                    <input type="text" x-model="form.type" placeholder="Type" class="border p-2 rounded w-full">
                    <input type="number" x-model="form.price" placeholder="Price" class="border p-2 rounded w-full">
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
            <h2 class="text-lg font-semibold mb-4">Delete this lens?</h2>
            <div class="flex justify-center space-x-3">
                <button @click="closeModal()" class="bg-gray-300 px-4 py-2 rounded">No</button>
                <button @click="deleteLens()" class="bg-red-600 text-white px-4 py-2 rounded">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
function lensApp() {
    return {
        showFormModal: false,
        showDeleteModal: false,
        isEditing: false,
        lenses: [],
        form: { id: '', name: '', brand: '', type: '', price: '' },

        async init() { await this.fetchLenses(); },
        async fetchLenses() {
            const res = await axios.get('/api/lenses');
            this.lenses = res.data;
        },
        openCreateModal() {
            this.isEditing = false;
            this.form = { name: '', brand: '', type: '', price: '' };
            this.showFormModal = true;
        },
        async openEditModal(id) {
            this.isEditing = true;
            const res = await axios.get(`/api/lenses/${id}`);
            this.form = res.data;
            this.showFormModal = true;
        },
        async saveLens() {
            if (this.isEditing)
                await axios.put(`/api/lenses/${this.form.id}`, this.form);
            else
                await axios.post('/api/lenses', this.form);
            this.showFormModal = false;
            await this.fetchLenses();
        },
        confirmDelete(id) { this.form.id = id; this.showDeleteModal = true; },
        async deleteLens() {
            await axios.delete(`/api/lenses/${this.form.id}`);
            this.showDeleteModal = false;
            await this.fetchLenses();
        },
        closeModal() { this.showFormModal = false; this.showDeleteModal = false; }
    }
}
</script>
@endsection
