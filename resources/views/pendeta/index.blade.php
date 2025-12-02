@section('title', 'Halaman Manajemen Pendeta')

<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto">
        {{-- Card Tambah Baru --}}
        <div class="flex">
            <a href="{{ route('admin.pendeta.create') }}">
                <x-card-base icon="user-plus" label="Data Pendeta Baru" />
            </a>
        </div>

        <div class="bg-white shadow rounded p-5 mt-5">
            <div class="flex justify-between items-center mb-5">
                <p class="text-xl font-semibold text-gray-700">Daftar Tag Artikel</p>
            </div>
            <table class="w-full border-collapse rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 border">Nama Pendeta</th>
                        <th class="p-3 border w-40">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendetas as $pendeta)
                        <tr>
                            <td class="p-3 border">{{ $pendeta->name_pendeta }}</td>
                            <td class="p-3 flex justify-center gap-3">
                                <a href="{{ route('admin.pendeta.edit', $pendeta->id) }}"
                                    class="px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form action="{{ route('admin.pendeta.destroy', $pendeta->id) }}" method="POST"
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
            {{ $pendetas->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
