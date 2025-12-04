@section('title', 'Halaman Manajemen Susunan Panitia')

<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto">
        <x-page-title title="Manajemen Role Atau Posisi Panitia"
            subtitle="Halaman Manajemen Posisi Panitia Organisasi Wilayah" icon="users-round" />
        {{-- Breadcrumb --}}
        <nav class="text-sm mb-4">
            <a href="{{ route('admin.susunanPanitia.index') }}" class="text-gray-600">Menu Susunan Panitia</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-[#E5322D] font-semibold">Posisi Panitia</span>
        </nav>

        <div class="flex space-x-3">
            <a href="{{ route('admin.posisiPanitia.create') }}">
                <x-card-base icon="plus" label="Tambah Role Panitia Baru" />
            </a>
        </div>

        <div class="bg-white shadow rounded p-5 mt-5">
            <div class="flex justify-between items-center mb-5">
                <p class="text-xl font-semibold text-gray-700">Daftar Posisi Panitia</p>
            </div>
            <table class="w-full border-collapse rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 border">Nama Posisi</th>
                        <th class="p-3 border w-40">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posisiPanitias as $posisi)
                        <tr>
                            <td class="p-3 border">{{ $posisi->name_position }}</td>
                            <td class="p-3 flex justify-center gap-3">
                                <a href="{{ route('admin.posisiPanitia.edit', $posisi->id) }}"
                                    class="px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form action="{{ route('admin.posisiPanitia.destroy', $posisi->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Hapus Posisi Panitia ini?')">
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
                {{ $posisiPanitias->links('pagination::tailwind') }}
            </div>
        </div>
</x-app-layout>
