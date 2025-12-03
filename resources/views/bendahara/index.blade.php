@section('title', 'Halaman Manajemen Salary Pendeta')

<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto">
        <x-page-title title="Manajemen Data Pendapatan Pendeta"
            subtitle="Halaman Manajemen Data Pendapatan Pendeta Wilayah" icon="file-user" />
        <div class="bg-white shadow rounded p-5 mt-5">
            <div class="flex justify-between items-center mb-5">
                <p class="text-xl font-semibold text-gray-700">Daftar Tag Artikel</p>
            </div>
            <table class="w-full border-collapse rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 border">Nama Pendeta</th>
                        <th class="p-3 border">Jumlah Pendapatan</th>
                        <th class="p-3 border w-40">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendetas as $pendeta)
                        <tr>
                            <td class="p-3 border">{{ $pendeta->name_pendeta }}</td>
                            <td class="p-3 border"> Rp {{ number_format($pendeta->salary, 0, ',', '.') }}</td>
                            <td class="p-3 flex justify-center gap-3">
                                <a href="{{ route('bendahara.pendeta.edit', $pendeta->id) }}"
                                    class="px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                    Edit
                                </a>
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
