@section('title', 'Buat Data Event Baru')

<x-app-layout>
    <div class="py-10 max-w-4xl mx-auto">
        {{-- Breadcrumb --}}
        <nav class="text-sm mb-4">
            <a href="{{ route('admin.event.index') }}" class="text-gray-600">Data Event</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-[#E5322D] font-semibold">Tambah Data Event</span>
        </nav>
        <h1 class="text-2xl font-bold mb-6">Tambah Data Event Baru</h1>
        <div class="bg-white shadow p-6 rounded">
            <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4 bg-white shadow p-6 rounded-lg">
                @csrf

                <div>
                    <label class="font-semibold">Nama Event</label>
                    <input type="text" name="name_event" class="w-full mt-1 input" required>
                </div>

                <div>
                    <label class="font-semibold">Link Event</label>
                    <input type="text" name="link_event" class="w-full mt-1 input">
                </div>

                <div>
                    <label class="font-semibold">Deskripsi</label>
                    <textarea name="description_event" rows="5" class="w-full mt-1 input" required></textarea>
                </div>

                <div>
                    <label class="font-semibold">Tanggal & Waktu Event</label>
                    <input type="datetime-local" name="event_date" class="w-full mt-1 input" required>
                </div>

                <div>
                    <label class="font-semibold">Tempat</label>
                    <input type="text" name="event_place" class="w-full mt-1 input" required>
                </div>

                <div>
                    <label class="font-semibold">Kontak</label>
                    <input type="text" name="event_contact" class="w-full mt-1 input" required>
                </div>

                <div>
                    <label class="font-semibold">Banner Event (opsional)</label>
                    <input type="file" name="image_banner_event" class="mt-1">
                </div>

                <div>
                    <label class="font-semibold">Tampilkan?</label>
                    <input type="checkbox" name="is_visible" value="1" checked>
                </div>

                <div class="flex gap-3">
                    <button class="px-4 py-2 bg-[#E5322D] text-white rounded hover:bg-red-700">
                        Simpan
                    </button>

                    <a href="{{ route('admin.event.index') }}" class="px-4 py-2 border rounded hover:bg-gray-100">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
