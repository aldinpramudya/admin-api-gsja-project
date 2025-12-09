<div class="w-80 tablet:flex tablet:w-80 h-screen bg-[#E5322D] border-r shadow-sm p-5 flex-col fixed top-0 left-0 z-50 transition-transform duration-300 ease-in-out -translate-x-full tablet:translate-x-0 overflow-y-auto"
    id="sidebar">

    {{-- Tombol Back (Mobile Only) --}}
    <div class="text-white flex justify-end tablet:hidden" onclick="toggleSidebar()">
        <i data-lucide="x"></i>
    </div>
    {{-- Tombol Back End (Mobile Only) --}}

    <div class="flex items-center justify-center py-6 border-b border-white/20">
        <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="w-24 h-24 object-contain">
    </div>

    {{-- Super Admin --}}
    @if (auth()->user()->isSuperAdmin())
        <div class="space-y-2 mb-6 mt-5">
            <p class="text-xs text-white font-semibold uppercase">Home</p>
            <x-sidebar-link :href="route('admin.dashboard')" label="Dashboard" icon="layout-panel-left" />
            <div class="space-y-2">
                <p class="text-xs text-white font-semibold uppercase">Konten</p>
                <x-sidebar-link :href="route('admin.article.index')" label="Artikel" icon="newspaper" />
                <x-sidebar-link :href="route('admin.tag.index')" label="Tag Artikel" icon="bookmark-check" />
                <x-sidebar-link :href="route('admin.gereja.index')" label="Profil Gereja" icon="church" />
                <x-sidebar-link :href="route('admin.event.index')" label="Event" icon="calendar-heart" />
                <x-sidebar-link :href="route('admin.susunanPanitia.index')" label="Panitia" icon="users-round" />
            </div>
            <div class="space-y-2">
                <p class="text-xs text-white font-semibold uppercase">Manajemen</p>
                <x-sidebar-link :href="route('admin.pendeta.index')" label="Pendeta" icon="file-user" />
                <x-sidebar-link :href="route('admin.user.index')" label="Akun" icon="user-round-pen" />
            </div>
        </div>
    @endif

    {{-- Admin --}}
    @if (auth()->user()->isAdmin())
        <div class="space-y-2 mb-6 mt-5">
            <p class="text-xs text-white font-semibold uppercase">Home</p>
            <x-sidebar-link :href="route('admin.dashboard')" label="Dashboard" icon="layout-panel-left" />
            <div class="space-y-2">
                <p class="text-xs text-white font-semibold uppercase">Konten</p>
                <x-sidebar-link :href="route('admin.article.index')" label="Artikel" icon="newspaper" />
                <x-sidebar-link :href="route('admin.tag.index')" label="Tag Artikel" icon="bookmark-check" />
                <x-sidebar-link :href="route('admin.gereja.index')" label="Profil Gereja" icon="church" />
                <x-sidebar-link :href="route('admin.event.index')" label="Event" icon="calendar-heart" />
                <x-sidebar-link :href="route('admin.susunanPanitia.index')" label="Panitia" icon="users-round" />
            </div>
            <div class="space-y-2">
                <p class="text-xs text-white font-semibold uppercase">Manajemen</p>
                <x-sidebar-link :href="route('admin.pendeta.index')" label="Pendeta" icon="file-user" />
            </div>
        </div>
    @endif

    {{-- Bendahara --}}
    @if (auth()->user()->isBendahara())
        <div class="space-y-2 mb-6 mt-5">
            <p class="text-xs text-white font-semibold uppercase">Home</p>
            <x-sidebar-link :href="route('bendahara.dashboard')" label="Dashboard" icon="layout-panel-left" />
            <div class="space-y-2">
                <p class="text-xs text-white font-semibold uppercase">Manajemen</p>
                <x-sidebar-link :href="route('bendahara.pendeta.index')" label="Pendeta" icon="file-user" />
            </div>
        </div>
    @endif

    {{-- Pendeta --}}
    @if (auth()->user()->isPendeta())
        <div class="space-y-2 mb-6 mt-5">
            <p class="text-xs text-white font-semibold uppercase">Home</p>
            <x-sidebar-link :href="route('pendeta.dashboard')" label="Dashboard" />
        </div>
    @endif
</div>
