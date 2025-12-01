@section('title', 'Edit Tag')

<x-app-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto">

            {{-- Breadcrumb --}}
            <nav class="text-sm mb-4">
                <a href="{{ route('admin.tag.index') }}" class="text-gray-600">Tags</a>
                <span class="mx-2 text-gray-400">/</span>
                <span class="text-[#E5322D] font-semibold">Edit</span>
            </nav>

            <h1 class="text-2xl font-bold mb-6">Edit Tag</h1>

            <div class="bg-white shadow rounded p-6">
                <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-semibold mb-1">Nama Tag</label>
                        <input type="text" name="tags_name" class="w-full border p-2 rounded"
                            value="{{ $tag->tags_name }}" required>
                    </div>

                    <div class="flex gap-3">
                        <button class="px-4 py-2 bg-[#E5322D] text-white rounded hover:bg-red-700">
                            Update
                        </button>

                        <a href="{{ route('admin.tag.index') }}" class="px-4 py-2 border rounded hover:bg-gray-100">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>

</x-app-layout>
