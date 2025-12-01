@section('title', 'Halaman Manajemen Artikel')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            {{-- Card Tambah Baru --}}
            <div class="flex">
                <a href="{{ route('admin.article.create') }}">
                    <x-card-base icon="file-plus-corner" label="Artikel Baru" />
                </a>
            </div>

            {{-- Table --}}
            <div class="bg-white shadow p-5 rounded">
                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 border">Judul</th>
                            <th class="p-3 border">Tags</th>
                            <th class="p-3 border">Visibility</th>
                            <th class="p-3 border w-40">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $a)
                            <tr>
                                <td class="p-3 border">{{ $a->article_title }}</td>

                                <td class="p-3 border flex justify-center gap-3">
                                    @foreach ($a->tags as $tag)
                                        <span class="text-xs bg-gray-200 px-2 py-1 rounded">
                                            {{ $tag->tags_name }}
                                        </span>
                                    @endforeach
                                </td>

                                <td class="p-3 border">
                                    {{ $a->is_visible ? 'Visible' : 'Hidden' }}
                                </td>

                                <td class="p-3 flex justify-center gap-3">
                                    <a href="{{ route('admin.article.edit', $a->id) }}"
                                        class="px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.article.destroy', $a->id) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Hapus artikel?')">
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
            </div>
        </div>
    </div>
</x-app-layout>
