@section('title', 'Edit Artikel')

<x-app-layout>
    <div class="py-10 max-w-5xl mx-auto">

        {{-- Breadcrumb --}}
        <nav class="text-sm mb-4">
            <a href="{{ route('admin.article.index') }}" class="text-gray-600 hover:underline">
                Articles
            </a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-[#E5322D] font-semibold">Edit</span>
        </nav>

        <h1 class="text-2xl font-bold mb-6">Edit Artikel</h1>

        <div class="bg-white shadow p-6 rounded">
            <form action="{{ route('admin.article.update', $article->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">

                @csrf
                @method('PUT')

                {{-- Judul --}}
                <div>
                    <label class="font-semibold">Judul</label>
                    <input type="text" name="article_title" class="w-full border p-2 rounded"
                        value="{{ old('article_title', $article->article_title) }}" required>
                </div>

                {{-- Excerpt --}}
                <div>
                    <label class="font-semibold">Excerpt</label>
                    <textarea name="article_excerpt" class="w-full border p-2 rounded" required>{{ old('article_excerpt', $article->article_excerpt) }}</textarea>
                </div>

                {{-- Konten --}}
                <div>
                    <label class="font-semibold">Konten</label>
                    <input id="article_content" type="hidden" name="article_content"
                        value="{{ old('article_content', $article->article_content) }}">
                    <trix-editor input="article_content"></trix-editor>
                </div>

                {{-- Gambar --}}
                <div>
                    <label class="font-semibold">Gambar Artikel</label>
                    <input type="file" name="article_image" class="w-full border p-2 rounded">

                    @if ($article->article_image)
                        <p class="text-sm text-gray-600 mt-2">Gambar Saat Ini:</p>
                        <img src="{{ asset('storage/' . $article->article_image) }}" class="w-48 rounded shadow mt-1">
                    @endif
                </div>

                {{-- Tags --}}
                <div>
                    <label class="font-semibold">Tags</label>
                    <div class="grid grid-cols-2 gap-2 mt-2">
                        @foreach ($tags as $tag)
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                    {{ in_array($tag->id, $article->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                                {{ $tag->tags_name }}
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Visibility --}}
                <div>
                    <label class="font-semibold block mb-1">Visibility</label>
                    <select name="is_visible" class="border p-2 rounded">
                        <option value="1" {{ $article->is_visible ? 'selected' : '' }}>Visible</option>
                        <option value="0" {{ !$article->is_visible ? 'selected' : '' }}>Hidden</option>
                    </select>
                </div>

                {{-- Action Buttons --}}
                <div class="flex gap-3">
                    <button class="px-4 py-2 bg-[#E5322D] text-white rounded hover:bg-red-700">
                        Update
                    </button>

                    <a href="{{ route('admin.article.index') }}" class="px-4 py-2 border rounded hover:bg-gray-100">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
