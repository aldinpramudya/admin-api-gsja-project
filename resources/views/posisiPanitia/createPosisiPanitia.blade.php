@section('title', 'Buat Posisi Panitia Baru')

<x-app-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto">
            {{-- Breadcrumb --}}
            <nav class="text-sm mb-4">
                <a href="{{ route('admin.susunanPanitia.index') }}" class="text-gray-600">Menu Susunan Panitia</a>
                <span class="mx-2 text-gray-400">/</span>
                <a href="{{ route('admin.posisiPanitia.index') }}" class="text-gray-600">Posisi Panitia</a>
                <span class="mx-2 text-gray-400">/</span>
                <span class="text-[#E5322D] font-semibold">Tambah Posisi Panitia</span>
            </nav>

            <h1 class="text-2xl font-bold mb-6">Tambah Posisi Panitia</h1>

            <div class="bg-white shadow rounded p-6">
                <form action="{{ route('admin.posisiPanitia.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block font-semibold mb-1">Nama Posisi Panitia</label>
                        <input type="text" name="name_position" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="flex gap-3">
                        <button class="px-4 py-2 bg-[#E5322D] text-white rounded hover:bg-red-700">
                            Simpan
                        </button>

                        <a href="{{ route('admin.posisiPanitia.index') }}" class="px-4 py-2 border rounded hover:bg-gray-100">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>

</x-app-layout>
