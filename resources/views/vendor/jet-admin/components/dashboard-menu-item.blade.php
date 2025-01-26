@props(['item'])

<div x-data="{ open: false }" 
     @click.away="open = false" 
     @menu-open.window="if ($event.detail !== '{{ $item['name'] }}') { open = false; }" 
     class="relative">
    
    @php
        $route = Route::has($item['route']) ? route($item['route']) : $item['route'];
        $isActive = request()->routeIs($item['active_route'] ?? $route);
        $hasActiveSubMenu = isset($item['sub_menu']) && collect($item['sub_menu'])->contains(function ($subItem) {
            return request()->routeIs($subItem['active_route'] ?? $subItem['route']);
        });
        $isOpen = $isActive || $hasActiveSubMenu;
        $itemClasses = $isOpen ? 'bg-slate-100 dark:bg-slate-800' : 'hover:bg-slate-100 dark:hover:bg-slate-700';
        $iconClasses = $isOpen ? 'text-primary-600' : 'text-slate-700 dark:text-slate-300';
    @endphp

    <a href="{{ isset($item['sub_menu']) ? '#' : $route }}" 
       class="flex items-center gap-3 rounded-xl border border-transparent px-4 py-2.5 font-medium {{ $itemClasses }} transition dark:text-slate-100" 
       @click.prevent="if ({{ isset($item['sub_menu']) ? 'true' : 'false' }}) { open = !open; } else { window.location='{{ $route }}'; }">
        @isset($item['icon'])
            @svg('heroicon-o-' . $item['icon'], ['class' => $iconClasses . ' h-5 w-5'])
        @endisset
        <span class="grow">{{ __($item['name']) }}</span>
        @if ($isActive)
            <span class="text-primary-500">•</span>
        @endif
        @if (isset($item['sub_menu']))
            <svg class="h-5 w-5 {{ $iconClasses }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m4-4H8" />
            </svg>
        @endif
    </a>

    @if(isset($item['sub_menu']))
        <div x-show="open" x-transition class="ml-4">
            @foreach ($item['sub_menu'] as $subItem)
                <x-jet-admin::dashboard-sub-menu-item :item="$subItem" @click.stop />
            @endforeach
        </div>
    @endif
</div>