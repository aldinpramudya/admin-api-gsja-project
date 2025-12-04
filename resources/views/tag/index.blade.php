@section('title', 'Halaman Tag Artikel')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <x-page-title title="Tag Artikel" subtitle="Halaman Manajemen Tag Artikel" icon="bookmark-check" />
            {{-- Card Tambah Baru --}}
            <div class="flex">
                <a href="{{ route('admin.tag.create') }}">
                    <x-card-base icon="bookmark-plus" label="Tag Baru" />
                </a>
            </div>

            <div class="bg-white shadow rounded p-5 mt-5">
                <div class="flex justify-between items-center mb-5">
                    <p class="text-xl font-semibold text-gray-700">Daftar Tag Artikel</p>
                </div>
                <table class="w-full border-collapse rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 border">Nama Tag</th>
                            <th class="p-3 border">Jumlah Artikel</th>
                            <th class="p-3 border w-40">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td class="p-3 border">{{ $tag->tags_name }}</td>
                                <td class="p-3 border">{{ $tag->articles_count }}</td>
                                <td class="p-3 flex justify-center gap-3">
                                    <a href="{{ route('admin.tag.edit', $tag->id) }}"
                                        class="px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.tag.destroy', $tag->id) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Hapus tag ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-4 py-3">
                    {{ $tags->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
