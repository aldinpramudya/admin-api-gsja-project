@section('title', 'Buat User Baru')

<x-app-layout>
    <div class="max-w-6xl mx-auto px-6 py-10">

        {{-- Breadcrumbs --}}
        <nav class="text-sm mb-6">
            <ol class="flex items-center text-gray-600">
                <li>
                    <a href="{{ route('admin.user.index') }}" class="hover:text-[#E5322D] transition">
                        Manajemen User
                    </a>
                </li>
                <li class="mx-2">/</li>
                <li class="text-[#E5322D] font-semibold">Buat User Baru</li>
            </ol>
        </nav>

        {{-- Card --}}
        <div class="bg-white shadow-lg rounded-xl p-8 border border-gray-200">

            <h1 class="text-3xl font-bold text-gray-800 mb-6">
                Buat User Baru
            </h1>

            <form action="{{ route('admin.user.store') }}" method="POST" class="space-y-5">
                @csrf

                {{-- NAME --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Nama</label>
                    <input type="text" name="name"
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-[#E5322D] focus:outline-none"
                        required>
                </div>

                {{-- EMAIL --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-[#E5322D] focus:outline-none"
                        required>
                </div>

                {{-- PASSWORD --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-[#E5322D] focus:outline-none"
                        required>
                </div>

                {{-- ROLE --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Role</label>
                    <select name="role_id"
                        class="w-full border rounded-lg p-3 bg-white focus:ring-2 focus:ring-[#E5322D] focus:outline-none">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- BUTTONS --}}
                <div class="flex items-center gap-3 pt-4">

                    {{-- SAVE --}}
                    <button type="submit"
                        class="px-6 py-3 bg-[#E5322D] text-white font-semibold rounded-lg 
                               hover:bg-red-700 transition">
                        Simpan User
                    </button>

                    {{-- CANCEL --}}
                    <a href="{{ route('admin.user.index') }}"
                        class="px-6 py-3 border border-gray-400 text-gray-700 font-semibold rounded-lg 
                               hover:bg-gray-100 transition">
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>
</x-app-layout>
