@props(['href', 'label', 'icon' => null])

<a href="{{ $href }}"
    class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-white font-medium
           hover:bg-black transition-all duration-200">

    {{-- Lucide Icons --}}
    @if ($icon)
        <i data-lucide={{ $icon }}></i>
    @endif

    <span>{{ $label }}</span>
</a>
