@props(['total'])
@php
    $colorClass = '';
    if ($total > 0 && $total <= 1) {
        $colorClass = 'bg-red-600';
    } elseif ($total > 1 && $total <= 2) {
        $colorClass = 'bg-yellow-500';
    } elseif ($total > 2 && $total <= 3) {
        $colorClass = 'bg-orange-600';
    } elseif ($total > 3 && $total <= 4) {
        $colorClass = 'bg-green-400';
    } elseif ($total > 4) {
        $colorClass = 'bg-green-700';
    }
@endphp
<div class="p-2 w-full font-bold rounded-lg border border-gray-200 bg-white dark:bg-gray-800 shadow-lg">
    <p class="w-full px-4 py-2 mb-4 text-black">
        {{ $title }}
    </p>
    <h1 class="text-5xl font-bold {{ $colorClass }} text-white">
        {{ $content }}
    </h1>
</div>
