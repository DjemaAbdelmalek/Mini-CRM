@props(['icon', 'title'])

<div x-data="{ open: false }" class="w-full">
    <div @click="open = !open" class="flex items-center w-full px-4 py-3 space-x-2 cursor-pointer hover:bg-bg-200"
        :class="open ? 'bg-bg-200' : ''">
        <i class="{{ $icon }}"></i>
        <span x-show="expanded" class="transition-opacity duration-300 whitespace-nowrap">
            {{ $title }} </span>
        <svg x-show="open" class="w-4 h-4 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
        </svg>
        <svg x-show="!open && expanded" class="w-4 h-4 ml-auto rotate-180" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
        </svg>
    </div>
    <div x-show="openSectionSideBar && open" x-transition
        class="w-full space-y-1 transition-opacity duration-300 bg-bg-200">
        {{ $slot }}
    </div>
</div>
