@section('title', 'Dashboard Main')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- TITLE SECTION --}}
            <x-page-title title="Dashboard" subtitle="Selamat datang kembali, {{ $user->name }}"
                icon="layout-dashboard" />

            <!-- User Info Card -->
            <div class="bg-gradient-to-r from-[#E5322D] to-red-600 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold mb-2">Selamat Datang, {{ $user->name }}!</h3>
                            <p class="text-red-100">Anda Login Sebagai <span
                                    class="font-semibold">{{ $user->role_name }}</span></p>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-red-100">Username</div>
                            <div class="text-xl font-bold">{{ $user->name }}</div>
                        </div>
                    </div>

                    <!-- Role Badge -->
                    <div class="mt-4 pt-4 border-t border-red-400">
                        <div class="flex items-center gap-4">
                            <div>
                                <span class="px-4 py-2 bg-white text-[#E5322D] rounded-full font-semibold text-sm">
                                    {{ $user->role_name }}
                                </span>
                            </div>
                            <div class="text-sm text-red-100">
                                @if ($user->isSuperAdmin())
                                    <p>✓ Anda dapat mengakses fitur manajemen konten dan akun-akun admin</p>
                                @elseif($user->isAdmin())
                                    <p>✓ Anda dapat mengakses fitur manajemen konten</p>
                                @elseif($user->isBendahara())
                                    <p>✓ Anda dapat mengakses fitur perubahan gaji data pendeta</p>
                                @elseif($user->isPendeta())
                                    <p>✓ Anda dapat melihat informasi terkait pendeta anda</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Cards Section - Hanya tampil jika ada cards -->
            @if (!empty($cards))
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Overview</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($cards as $card)
                        <x-dashboard-card :title="$card['title']" :count="$card['count']" :icon="$card['icon']" :route="$card['route']" />
                    @endforeach
                </div>
            @endif

            <!-- Optional: Tambahkan pesan khusus untuk Pendeta -->
            @if ($user->isPendeta())
                <div class="mt-6">
                    <div class="bg-white rounded-lg shadow-md p-8 text-center">
                        <div class="mb-4">
                            <i data-lucide="heart" class="w-16 h-16 text-[#E5322D] mx-auto"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">
                            Selamat melayani, {{ $user->name }}
                        </h3>
                        <p class="text-gray-600">
                            Tuhan memberkati pelayanan Anda hari ini
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
