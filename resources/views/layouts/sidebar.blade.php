<div class="w-64 h-screen bg-white border-r shadow-sm p-5 flex flex-col">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Menu</h2>

    {{-- Super Admin --}}
    @if (auth()->user()->isSuperAdmin())
        <div class="space-y-2 mb-6">
            <p class="text-xs text-gray-500 font-semibold uppercase">Super Admin</p>
            <x-sidebar-link :href="route('admin.dashboard')" label="Dashboard" />
        </div>
    @endif

    {{-- Admin --}}
    @if (auth()->user()->isAdmin())
        <div class="space-y-2 mb-6">
            <p class="text-xs text-gray-500 font-semibold uppercase">Admin</p>
            <x-sidebar-link :href="route('admin.dashboard')" label="Dashboard" />
        </div>
    @endif

    {{-- Bendahara --}}
    @if (auth()->user()->isBendahara())
        <div class="space-y-2 mb-6">
            <p class="text-xs text-gray-500 font-semibold uppercase">Bendahara</p>
            <x-sidebar-link :href="route('bendahara.dashboard')" label="Dashboard" />
        </div>
    @endif

    {{-- Pendeta --}}
    @if (auth()->user()->isPendeta())
        <div class="space-y-2 mb-6">
            <p class="text-xs text-gray-500 font-semibold uppercase">Pendeta</p>
            <x-sidebar-link :href="route('pendeta.dashboard')" label="Dashboard" />
        </div>
    @endif
</div>
