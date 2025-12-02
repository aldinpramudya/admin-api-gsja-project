@section('title', 'Halaman User Manajemen')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
             <x-page-title title="Manajemen Data Akun" subtitle="Halaman Manajemen Data Akun Website Admin"
                icon="user-round-pen" />
            {{-- Card Tambah Baru --}}
            <div class="flex">
                <a href="{{ route('admin.user.create') }}">
                    <x-card-base icon="user-plus" label="Akun Baru" />
                </a>
            </div>
            {{-- Table Menampilkan --}}
            <div class="bg-white shadow-lg rounded-xl p-6 border border-gray-200 mt-5">
                <div class="flex justify-between items-center mb-5">
                    <p class="text-xl font-semibold text-gray-700">Daftar User</p>
                </div>
                {{-- FILTER --}}
                <form method="GET" class="mb-4 flex items-center gap-3">
                    <label class="font-medium text-gray-700">Filter Role:</label>
                    <select name="role_id" onchange="this.form.submit()"
                        class="w-[200px] border rounded-lg p-2 bg-white text-gray-700">
                        <option value="all">Semua Role</option>

                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ request('role_id') == $role->id ? 'selected' : '' }}>
                                {{ $role->display_name }}
                            </option>
                        @endforeach
                    </select>
                </form>
                {{-- FILTER END --}}
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-100 text-left text-gray-700 uppercase text-sm">
                                <th class="p-4 font-semibold">Nama</th>
                                <th class="p-4 font-semibold">Email</th>
                                <th class="p-4 font-semibold">Role</th>
                                <th class="p-4 font-semibold text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-800">
                            @foreach ($users as $user)
                                <tr class="border-b hover:bg-gray-50 transition">
                                    <td class="p-4">{{ $user->name }}</td>
                                    <td class="p-4">{{ $user->email }}</td>
                                    <td class="p-4">
                                        <span class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg text-sm">
                                            {{ $user->role->display_name ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="p-4 flex justify-center gap-3">

                                        {{-- EDIT BUTTON --}}
                                        <a href="{{ route('admin.user.show', $user->id) }}"
                                            class="px-3 py-1.5 rounded bg-yellow-500 text-white font-medium
                                           hover:bg-yellow-600 transition">
                                            Edit
                                        </a>

                                        {{-- DELETE BUTTON --}}
                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                            @csrf @method('DELETE')
                                            <button
                                                class="px-3 py-1.5 rounded bg-red-600 text-white font-medium
                                               hover:bg-red-700 transition">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- PAGINATION --}}
                <div class="mt-6">
                    {{ $users->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
