@props(['href', 'label', 'icon' => null])

@php
    $isActive = request()->url() === $href;
@endphp

<a href="{{ $href }}"
    class="flex items-center gap-3 px-4 py-2.5 rounded-lg font-medium transition-all duration-200
        {{ $isActive ? 'bg-black text-white' : 'text-white hover:bg-black/60' }}">
    
    @if ($icon)
        <i data-lucide="{{ $icon }}"></i>
    @endif

    <span>{{ $label }}</span>
</a>