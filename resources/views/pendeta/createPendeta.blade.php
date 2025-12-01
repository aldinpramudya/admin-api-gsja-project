@section('title', 'Buat Data Pendeta Baru')

<x-app-layout>
    <div class="py-10 max-w-4xl mx-auto">
        {{-- Breadcrumb --}}
        <nav class="text-sm mb-4">
            <a href="{{ route('admin.pendeta.index') }}" class="text-gray-600">Data Pendeta</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-[#E5322D] font-semibold">Tambah Data Pendeta</span>
        </nav>

        <h1 class="text-2xl font-bold mb-6">Tambah Data Pendeta</h1>

        <div class="bg-white shadow p-6 rounded">
            <form action="{{ route('admin.pendeta.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf
                <div>
                    <label class="font-semibold">Nama Pendeta Baru</label>
                    <input type="text" name="name_pendeta" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="font-semibold">Gambar</label>
                    <input type="file" name="image_pendeta" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <input hidden type="text" name="salary" value="0">
                </div>
                <div class="flex gap-3">
                    <button class="px-4 py-2 bg-[#E5322D] text-white rounded hover:bg-red-700">
                        Simpan
                    </button>

                    <a href="{{ route('admin.pendeta.index') }}" class="px-4 py-2 border rounded hover:bg-gray-100">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
