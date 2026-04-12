@extends('layouts.app')

@section('content')
<div x-data="qrApp()" x-init="init()" class="max-w-7xl mx-auto p-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-700">QR Codes</h1>
        <button @click="openCreateModal()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">+ Create New</button>
    </div>

    <!-- Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">#</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Code</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Lens</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Created</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <template x-for="(code, index) in qrcodes" :key="code.id">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3" x-text="index + 1"></td>
                        <td class="px-6 py-3" x-text="code.code"></td>
                        <td class="px-6 py-3" x-text="code.lens?.name ?? 'N/A'"></td>
                        <td class="px-6 py-3" x-text="new Date(code.created_at).toLocaleString()"></td>
                        <td class="px-6 py-3 text-center space-x-2">
                            <button @click="openEditModal(code.id)" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                            <button @click="confirmDelete(code.id)" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <!-- Form Modal -->
    <div x-show="showFormModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-60">
        <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4" x-text="isEditing ? 'Edit QR Code' : 'Create QR Code'"></h2>
            <form @submit.prevent="saveQr">
                <div class="grid gap-4">
                    <input type="text" x-model="form.code" placeholder="Code" class="border p-2 rounded w-full" required>
                    <select x-model="form.lens_id" class="border p-2 rounded w-full" required>
                        <option value="">Select Lens</option>
                        <template x-for="lens in lenses" :key="lens.id">
                            <option :value="lens.id" x-text="lens.name"></option>
                        </template>
                    </select>
                </div>
                <div class="flex justify-end mt-6 space-x-2">
                    <button type="button" @click="closeModal()" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded" x-text="isEditing ? 'Update' : 'Save'"></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-show="showDeleteModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-60">
        <div class="bg-white rounded-xl shadow-lg p-6 text-center w-full max-w-sm">
            <h2 class="text-lg font-semibold mb-4">Delete this QR Code?</h2>
            <div class="flex justify-center space-x-3">
                <button @click="closeModal()" class="bg-gray-300 px-4 py-2 rounded">No</button>
                <button @click="deleteQr()" class="bg-red-600 text-white px-4 py-2 rounded">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
function qrApp() {
    return {
        showFormModal: false,
        showDeleteModal: false,
        isEditing: false,
        qrcodes: [],
        lenses: [],
        form: { id: '', code: '', lens_id: '' },

        async init() {
            await this.fetchData();
        },
        async fetchData() {
            const [qrRes, lensRes] = await Promise.all([
                axios.get('/api/qrcodes'),
                axios.get('/api/lenses')
            ]);
            this.qrcodes = qrRes.data;
            this.lenses = lensRes.data;
        },
        openCreateModal() {
            this.isEditing = false;
            this.form = { id: '', code: '', lens_id: '' };
            this.showFormModal = true;
        },
        async openEditModal(id) {
            this.isEditing = true;
            const res = await axios.get(`/api/qrcodes/${id}`);
            this.form = { ...res.data, lens_id: res.data.lens_id || '' };
            this.showFormModal = true;
        },
        async saveQr() {
            if (this.isEditing) await axios.put(`/api/qrcodes/${this.form.id}`, this.form);
            else await axios.post('/api/qrcodes', this.form);
            this.showFormModal = false;
            await this.fetchData();
        },
        confirmDelete(id) {
            this.form.id = id;
            this.showDeleteModal = true;
        },
        async deleteQr() {
            await axios.delete(`/api/qrcodes/${this.form.id}`);
            this.showDeleteModal = false;
            await this.fetchData();
        },
        closeModal() {
            this.showFormModal = false;
            this.showDeleteModal = false;
        }
    }
}
</script>
@endsection
