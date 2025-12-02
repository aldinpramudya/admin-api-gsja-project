@section('title', 'Buat Data Panitia Baru')

<x-app-layout>
    <div class="py-10 max-w-4xl mx-auto">
        {{-- Breadcrumb --}}
        <nav class="text-sm mb-4">
            <a href="{{ route('admin.susunanPanitia.index') }}" class="text-gray-600">Menu Susunan Panitia</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-[#E5322D] font-semibold">Tambah Data Panitia</span>
        </nav>
        <h1 class="text-2xl font-bold mb-6">Tambah Data Panitia</h1>
        <div class="bg-white shadow p-6 rounded">
            <form action="{{ route('admin.susunanPanitia.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf
                <div>
                    <label class="font-semibold">Nama Panitia Baru</label>
                    <input type="text" name="name_panitia" class="w-full border p-2 rounded" required
                        placeholder="Anggota Panitia Baru">
                </div>
                <div>
                    <label class="font-semibold">Gambar Panitia Baru</label>
                    <input type="file" name="image_panitia" class="w-full border p-2 rounded" required>
                </div>
                <div class="flex flex-col">
                    <label class="font-semibold">Data Posisi Panitia</label>
                    <select name="name_position_id">
                        <option selected disabled>Pilih Posisi Panitia</option>
                        @foreach ($posisi as $data)
                            <option value={{ $data->id }}>{{ $data->name_position }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex gap-3">
                    <button class="px-4 py-2 bg-[#E5322D] text-white rounded hover:bg-red-700">
                        Simpan
                    </button>

                    <a href="{{ route('admin.susunanPanitia.index') }}" class="px-4 py-2 border rounded hover:bg-gray-100">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
