@section('title', 'Edit Event')

<x-app-layout>
    <div class="py-10 max-w-4xl mx-auto">
        {{-- Breadcrumb --}}
        <nav class="text-sm mb-4">
            <a href="{{ route('admin.event.index') }}" class="text-gray-600">Data Event</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-[#E5322D] font-semibold">Tambah Data Event</span>
        </nav>
        <h1 class="text-2xl font-bold mb-6">Edit Event Baru</h1>
        <form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4 bg-white shadow p-6 rounded-lg">
            @csrf
            @method('PUT')

            <div>
                <label class="font-semibold">Nama Event</label>
                <input type="text" name="name_event" class="w-full border p-2 rounded"
                    value="{{ old('name_event', $event->name_event) }}" required placeholder="Gereja Baru">
            </div>

            <div>
                <label class="font-semibold">Link Event</label>
                <input type="text" name="link_event" class="w-full mt-1 input"
                    value="{{ old('link_event', $event->link_event) }}">
            </div>

            <div>
                <label class="font-semibold">Deskripsi</label>
                <textarea name="description_event" rows="5" class="w-full mt-1 input" required>{{ $event->description_event }}</textarea>
            </div>

            <div>
                <label class="font-semibold">Tanggal & Waktu Event</label>
                <input type="datetime-local" name="event_date" class="w-full mt-1 input"
                    value="{{ date('Y-m-d\TH:i', strtotime($event->event_date)) }}" required>
            </div>

            <div>
                <label class="font-semibold">Tempat</label>
                <input type="text" name="event_place" class="w-full mt-1 input" value="{{ $event->event_place }}"
                    required>
            </div>

            <div>
                <label class="font-semibold">Kontak</label>
                <input type="text" name="event_contact" class="w-full mt-1 input" value="{{ $event->event_contact }}"
                    required>
            </div>

            <div>
                <label class="font-semibold">Banner Event Sekarang</label><br>
                @if ($event->image_banner_event === 'default')
                    <img src="{{ asset('images/background-login.png') }}" class="h-32 rounded">
                @else
                    <img src="{{ asset('storage/' . $event->image_banner_event) }}" class="h-32 rounded">
                @endif
            </div>

            <div>
                <label class="font-semibold">Ganti Banner (opsional)</label>
                <input type="file" name="image_banner_event" class="mt-1">
            </div>

            <div>
                <label class="font-semibold">Tampilkan?</label>
                <input type="checkbox" name="is_visible" value="1" {{ $event->is_visible ? 'checked' : '' }}>
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
</x-app-layout>
