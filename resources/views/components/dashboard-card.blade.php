@props(['title', 'count', 'icon' => 'database', 'route' => '#'])

<a href="{{ $route }}" class="block group">
    <div
        class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 p-6 border-l-4 border-[#E5322D] hover:border-l-8">
        <div class="flex items-center justify-between">
            <!-- Icon & Title -->
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-2">
                    <div
                        class="bg-[#E5322D]/10 p-3 rounded-lg group-hover:bg-[#E5322D]/20 transition-colors duration-300">
                        <i data-lucide="{{ $icon }}" class="w-6 h-6 text-[#E5322D]"></i>
                    </div>
                    <h3 class="text-gray-600 text-sm font-medium uppercase tracking-wide">
                        {{ $title }}
                    </h3>
                </div>

                <!-- Count -->
                <div class="mt-4">
                    <p
                        class="text-4xl font-bold text-gray-800 group-hover:text-[#E5322D] transition-colors duration-300">
                        {{ number_format($count) }}
                    </p>
                </div>
            </div>

            <!-- Arrow Icon -->
            <div class="text-gray-400 group-hover:text-[#E5322D] group-hover:translate-x-1 transition-all duration-300">
                <i data-lucide="arrow-right" class="w-6 h-6"></i>
            </div>
        </div>

        <!-- Footer/Description (Optional) -->
        @if (isset($description))
            <div class="mt-4 pt-4 border-t border-gray-100">
                <p class="text-sm text-gray-500">{{ $description }}</p>
            </div>
        @endif
    </div>
</a>
