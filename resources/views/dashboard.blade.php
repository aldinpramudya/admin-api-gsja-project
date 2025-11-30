@section('title', 'Dashboard Main')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- User Info Card -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold mb-2">Welcome back, {{ $user->name }}!</h3>
                            <p class="text-blue-100">You are logged in as <span
                                    class="font-semibold">{{ $user->role_name }}</span></p>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-blue-100">Username</div>
                            <div class="text-xl font-bold">{{ $user->username }}</div>
                        </div>
                    </div>

                    <!-- Role Badge -->
                    <div class="mt-4 pt-4 border-t border-blue-400">
                        <div class="flex items-center gap-4">
                            <div>
                                <span class="px-4 py-2 bg-white text-blue-600 rounded-full font-semibold text-sm">
                                    {{ $user->role_name }}
                                </span>
                            </div>
                            <div class="text-sm text-blue-100">
                                @if ($user->isSuperAdmin())
                                    <p>✓ Full access to all features</p>
                                @elseif($user->isAdmin())
                                    <p>✓ Manage content and users</p>
                                @elseif($user->isBendahara())
                                    <p>✓ Financial management access</p>
                                @elseif($user->isPendeta())
                                    <p>✓ Ministry content access</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
