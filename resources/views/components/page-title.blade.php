@props(['title', 'subtitle' => null, 'icon' => null])

<div class="mb-8">
    <div class="flex items-center gap-3">
        @if ($icon)
            <i data-lucide="{{ $icon }}" class="w-7 h-7 text-[#E5322D]"></i>
        @endif

        <h1 class="text-3xl font-bold text-[#E5322D]">{{ $title }}</h1>
    </div>

    @if ($subtitle)
        <p class="text-[#E5322D] mt-1">{{ $subtitle }}</p>
    @endif
</div>
