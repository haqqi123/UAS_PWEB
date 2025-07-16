@props(['title', 'value', 'icon', 'color' => 'primary', 'percentage' => null, 'isIncrease' => true])

<div class="bg-white rounded-2xl shadow-md p-6 transform transition-all duration-300 hover:-translate-y-1">
    <div class="flex justify-between items-start">
        <div>
            <h4 class="text-gray-600 mb-2">{{ $title }}</h4>
            <p class="text-3xl font-bold text-gray-800">{{ $value }}</p>

            @if ($percentage !== null)
                <div class="mt-2 flex items-center">
                    <span class="{{ $isIncrease ? 'text-green-600' : 'text-red-600' }} text-sm font-medium">
                        <i class="fas fa-{{ $isIncrease ? 'arrow-up' : 'arrow-down' }} mr-1"></i>
                        {{ $percentage }}%
                    </span>
                    <span class="text-gray-500 text-sm ml-1">dari bulan lalu</span>
                </div>
            @endif
        </div>

        <div class="w-14 h-14 bg-{{ $color }}/10 rounded-full flex items-center justify-center">
            <i class="{{ $icon }} text-{{ $color }} text-2xl"></i>
        </div>
    </div>
</div>
