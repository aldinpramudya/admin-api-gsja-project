@section('title', 'Edit Profile Gereja')

<x-app-layout>
    <div class="py-10 max-w-5xl mx-auto">
        {{-- Breadcrumb --}}
        <nav class="text-sm mb-4">
            <a href="{{ route('admin.gereja.index') }}" class="text-gray-600 hover:underline">
                Data Pendeta
            </a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-[#E5322D] font-semibold">Edit Data Gereja</span>
        </nav>

        <h1 class="text-2xl font-bold mb-6">Edit Data Gereja</h1>
        <div class="bg-white shadow p-6 rounded">
            <form action="{{ route('admin.gereja.update', $gereja->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label class="font-semibold">Nama Data Gereja</label>
                    <input type="text" name="name_gereja" class="w-full border p-2 rounded"
                        value="{{ old('name_gereja', $gereja->name_gereja) }}" required placeholder="Gereja Baru">
                </div>
                <div>
                    <label class="font-semibold">Alamat Data Gereja</label>
                    <input type="text" name="address_gereja" class="w-full border p-2 rounded" required
                        placeholder="Jalan Baru No. 12" value="{{ old('address_gereja', $gereja->address_gereja) }}">
                </div>
                <div>
                    <label class="font-semibold">Nomor Handphone Data Gereja</label>
                    <input type="text" name="numberphone_gereja" class="w-full border p-2 rounded"
                        value="{{ old('numberphone_gereja', $gereja->numberphone_gereja) }}"
                        placeholder="Cth : 0859362231">
                </div>
                <div>
                    <label class="font-semibold">Email Data Gereja </label>
                    <input type="text" name="email_gereja" class="w-full border p-2 rounded"
                        value="{{ old('email_gereja', $gereja->email_gereja) }}" placeholder="gereja@gmail.com">
                </div>
                <div class="flex flex-col">
                    <label class="font-semibold">Data Pendeta Yang Melayani</label>
                    <select name="pendeta_id">
                        <option value="{{ old('pendeta_id', $gereja->pendeta_id) }}">
                            {{ $gereja->pendeta->name_pendeta }}</option>
                        @foreach ($pendetas as $pendeta)
                            <option value={{ $pendeta->id }}>{{ $pendeta->name_pendeta }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="font-semibold">Gambar Gereja</label>
                    <input type="file" name="image_gereja" class="w-full border p-2 rounded">

                    @if ($gereja->image_gereja)
                        <p class="text-sm text-gray-600 mt-2">Gambar Saat Ini:</p>
                        <img src="{{ asset('storage/' . $gereja->image_gereja) }}" class="w-48 rounded shadow mt-1">
                    @endif
                </div>
                <div class="flex gap-3">
                    <button class="px-4 py-2 bg-[#E5322D] text-white rounded hover:bg-red-700">
                        Simpan
                    </button>

                    <a href="{{ route('admin.gereja.index') }}" class="px-4 py-2 border rounded hover:bg-gray-100">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
