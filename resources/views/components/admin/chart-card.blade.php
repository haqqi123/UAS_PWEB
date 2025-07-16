@props(['title', 'chartId', 'height' => '300px'])

<div class="bg-white rounded-2xl shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-xl font-semibold text-gray-800">{{ $title }}</h4>
        {{ $actions ?? '' }}
    </div>

    <div class="relative" style="height: {{ $height }}">
        <canvas id="{{ $chartId }}"></canvas>
    </div>

    @if (isset($footer))
        <div class="mt-6 pt-4 border-t border-gray-100">
            {{ $footer }}
        </div>
    @endif
</div>
