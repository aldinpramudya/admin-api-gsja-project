@props(['icon' => null, 'label' => ''])

<div
    class="w-[173px] h-[173px] shadow-xl flex flex-col items-center justify-center 
           bg-[#E5322D] text-white rounded-xl p-6 
           transition-all duration-200 cursor-pointer
           hover:bg-[#c42824] hover:-translate-y-1 hover:shadow-xl select-none">

    {{-- Icon --}}
    @if ($icon)
        <i data-lucide={{ $icon }}></i>
    @endif

    {{-- Label --}}
    <p class="text-lg font-semibold text-center">
        {{ $label }}
    </p>
</div>
