@section('title', 'Edit Pendapatan Pendeta')

<x-app-layout>
    <div class="py-10 max-w-5xl mx-auto">
        {{-- Breadcrumb --}}
        <nav class="text-sm mb-4">
            <a href="{{ route('bendahara.pendeta.index') }}" class="text-gray-600 hover:underline">
                Data Pendeta
            </a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-[#E5322D] font-semibold">Edit Data Pendapatan Pendeta</span>
        </nav>

        <h1 class="text-2xl font-bold mb-6">Edit Data Pendeta</h1>

        <div class="bg-white shadow p-6 rounded">
            <form action="{{ route('bendahara.pendeta.update', $pendeta->id) }}" method="POST"
                enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="font-semibold">Nama Pendeta Baru</label>
                    <input readonly type="text" name="name_pendeta" class="w-full border p-2 rounded bg-slate-500"
                        value="{{ old('name_pendeta', $pendeta->name_pendeta) }}" required>
                </div>

                <div>
                    <label class="font-semibold">Gambar Artikel</label>
                    <input type="file" name="images_pendeta"
                        class="w-full border p-2 rounded bg-slate-500 cursor-not-allowed pointer-events-none">

                    @if ($pendeta->image_pendeta)
                        <p class="text-sm text-gray-600 mt-2">Gambar Saat Ini:</p>
                        <img src="{{ asset('storage/' . $pendeta->image_pendeta) }}" class="w-48 rounded shadow mt-1">
                    @endif
                </div>

                <div>
                    <label class="font-semibold">Pendapatan Pendeta</label>
                    <input type="text" id="salary-input" name="salary" class="border p-2 rounded w-full"
                        value="{{ old('salary', $pendeta->salary) }}" oninput="formatRupiah(this)">
                </div>

                {{-- Action Buttons --}}
                <div class="flex gap-3">
                    <button class="px-4 py-2 bg-[#E5322D] text-white rounded hover:bg-red-700">
                        Update
                    </button>
                    <a href="{{ route('bendahara.pendeta.index') }}" class="px-4 py-2 border rounded hover:bg-gray-100">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
