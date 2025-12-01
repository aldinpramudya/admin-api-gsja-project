@section('title', 'Buat Artikel Baru')

<x-app-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto">
            {{-- Breadcrumb --}}
            <nav class="text-sm mb-4">
                <a href="{{ route('admin.article.index') }}" class="text-gray-600">Tags</a>
                <span class="mx-2 text-gray-400">/</span>
                <span class="text-[#E5322D] font-semibold">Tambah</span>
            </nav>

            <h1 class="text-2xl font-bold mb-6">Tambah Artikel</h1>

            <div class="bg-white shadow p-6 rounded">
                <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-5">
                    @csrf

                    <div>
                        <label class="font-semibold">Judul</label>
                        <input type="text" name="article_title" class="w-full border p-2 rounded" required>
                    </div>

                    <div>
                        <label class="font-semibold">Excerpt</label>
                        <textarea name="article_excerpt" class="w-full border p-2 rounded" required></textarea>
                    </div>

                    <div>
                        <label class="font-semibold">Konten</label>
                        <input id="article_content" type="hidden" name="article_content">
                        <trix-editor input="article_content"></trix-editor>
                    </div>

                    <div>
                        <label class="font-semibold">Gambar</label>
                        <input type="file" name="article_image" class="w-full border p-2 rounded">
                    </div>

                    <div>
                        <label class="font-semibold">Tags</label>
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            @foreach ($tags as $tag)
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                                    {{ $tag->tags_name }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <label class="font-semibold block mb-1">Visibility</label>
                        <select name="is_visible" class="border p-2 rounded">
                            <option value="1">Visible</option>
                            <option value="0">Hidden</option>
                        </select>
                    </div>

                    <div class="flex gap-3">
                        <button class="px-4 py-2 bg-[#E5322D] text-white rounded hover:bg-red-700">
                            Simpan
                        </button>

                        <a href="{{ route('admin.article.index') }}" class="px-4 py-2 border rounded hover:bg-gray-100">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
