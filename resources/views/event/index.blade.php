@section('title', 'Halaman Manajemen Event')

<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto">
        <x-page-title title="Event" subtitle="Halaman Manajemen Event-Event" icon="calendar-heart" />
        <div class="flex">
            <a href="{{ route('admin.event.create') }}">
                <x-card-base icon="calendar-plus" label="Data Gereja Baru" />
            </a>
        </div>
        <div class="bg-white shadow rounded-lg overflow-hidden mt-5">
            <div class="flex justify-between items-center mb-5">
                <p class="text-xl font-semibold text-gray-700">Daftar Event</p>
            </div>
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-4 py-3">Nama Event</th>
                        <th class="px-4 py-3">Tanggal Event</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr class="border-b">
                            <td class="px-4 py-3">{{ $event->name_event }}</td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y H:i') }}</td>
                            <td class="p-3 flex justify-center gap-3">

                                <a href="{{ route('admin.event.edit', $event->id) }}"
                                    class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Hapus event ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-4 py-3">
                {{ $events->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
