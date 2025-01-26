@props(['item'])

@php
    $route = Route::has($item['route']) ? route($item['route']) : $item['route'];
    $isActive = request()->routeIs($item['active_route'] ?? $item['route']);
    $itemClasses = $isActive ? 'bg-slate-200 dark:bg-slate-700' : 'hover:bg-slate-100 dark:hover:bg-slate-600';
    $iconClasses = $isActive ? 'text-primary-600' : 'text-slate-700 dark:text-slate-300';
@endphp

<a href="{{ $route }}" class="flex items-center gap-2 rounded-lg px-4 py-2 {{ $itemClasses }} transition" @click.stop>
    @isset($item['icon'])
        @svg('heroicon-o-' . $item['icon'], ['class' => $iconClasses . ' h-4 w-4'])
    @endisset
    <span class="grow">{{ __($item['name']) }}</span>
    @if ($isActive)
        <span class="text-primary-500">•</span>
    @endif
</a>