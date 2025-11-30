@props(['href', 'label'])

<a href="{{ $href }}"
    class="block px-4 py-2.5 rounded-lg text-gray-700 font-medium
           hover:bg-[var(--main-color)] hover:text-white transition-all duration-200">
    {{ $label }}
</a>
