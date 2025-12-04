@section('title', 'Halaman Manajemen Susunan Panitia')

<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto">
        <x-page-title title="Manajemen Panitia" subtitle="Halaman Manajemen Panitia Organisasi Wilayah"
            icon="users-round" />
        {{-- Card Tambah Baru --}}
        <div class="flex space-x-3">
            <a href="{{ route('admin.susunanPanitia.create') }}">
                <x-card-base icon="user-plus" label="Tambah Anggota Panitia Baru" />
            </a>
            <a href="{{ route('admin.posisiPanitia.index') }}">
                <x-card-base icon="id-card" label="Data Role Panitia" />
            </a>
        </div>

        <div class="bg-white shadow rounded p-5 mt-5">
            <div class="flex justify-between items-center mb-5">
                <p class="text-xl font-semibold text-gray-700">Daftar Susunan Panitia</p>
            </div>
            <table class="w-full border-collapse rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 border">Nama Panitia</th>
                        <th class="p-3 border">Posisi Panitia</th>
                        <th class="p-3 border w-40">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($panitia as $data)
                        <tr>
                            <td class="p-3 border"> {{ $data->name_panitia }}</td>
                            <td class="p-3 border"> {{ $data->posisiPanitia->name_position }}</td>
                            <td class="p-3 flex justify-center gap-3">
                                <a href="{{ route('admin.susunanPanitia.edit', $data->id) }}"
                                    class="px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form action="{{ route('admin.susunanPanitia.destroy', $data->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Hapus Panitia ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-4 py-3">
                {{ $panitia->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
