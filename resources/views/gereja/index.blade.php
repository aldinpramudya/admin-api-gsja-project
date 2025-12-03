@section('title', 'Halaman Manajemen Profil Gereja')

<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto">
        <x-page-title title="Profil Gereja-Gereja" subtitle="Halaman Manajemen Profil Gereja-Gereja Wilayah"
                icon="church" />
        {{-- Card Tambah Baru --}}
        <div class="flex">
            <a href="{{ route('admin.gereja.create') }}">
                <x-card-base icon="house-plus" label="Data Gereja Baru" />
            </a>
        </div>
        <div class="bg-white shadow rounded p-5 mt-5">
            <div class="flex justify-between items-center mb-5">
                <p class="text-xl font-semibold text-gray-700">Daftar Tag Artikel</p>
            </div>
            <table class="w-full border-collapse rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 border">Nama Gereja</th>
                        <th class="p-3 border">Alamat Gereja</th>
                        <th class="p-3 border">No Telepon Gereja</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gerejas as $gereja)
                        <tr>
                            <td class="p-3 border">{{ $gereja->name_gereja }}</td>
                            <td class="p-3 border">{{ $gereja->address_gereja }}</td>
                            <td class="p-3 border">{{ $gereja->numberphone_gereja }}</td>
                            <td class="p-3 flex justify-center gap-3">
                                <a href="{{ route('admin.gereja.edit', $gereja->id) }}"
                                    class="px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form action="{{ route('admin.gereja.destroy', $gereja->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Hapus Data Pendeta ini?')">
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
        </div>
        <div class="mt-6">
            {{ $gerejas->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
