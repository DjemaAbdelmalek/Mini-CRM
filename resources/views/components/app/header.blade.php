<nav class="fixed inset-0 top-0 z-50 flex items-center justify-between px-4 transition-all duration-300 shadow-lg h-14 bg-bg-300 dark:shadow-bg-300 dark:shadow-sm"
    :class="expanded ? 'md:left-[256px] left-100' : 'left-[64px]'">
    <h1 class="text-2xl font-semibold">{{ $titleOfPage }}</h1>
    <div class="items-center justify-between hidden space-x-10 md:flex">
        @if (request()->is('/'))
            <div x-data="{ menu: false }" class="relative w-40 border-2 rounded-lg cursor-pointer border-bg-200">
                <div class="flex items-center justify-center h-8 space-x-2" @mouseenter="menu = true"
                    @mouseleave="menu = false">
                    <i class=" fas fa-home"></i>
                    <span>Accueil</span>
                </div>
                <div x-show="menu" @mouseenter="menu = true" @mouseleave="menu = false"
                    class="absolute left-0 flex flex-col w-full space-y-2 border-2 bg-bg-200 top-8 border-bg-200">
                    <a href="/" class="w-full"> Accueil </a>
                </div>
            </div>
        @endif
        @if (request()->is(['zones', 'clients', 'roles', 'users']))
            <div x-data="{ menu: false }" class="relative w-40 border-2 rounded-lg cursor-pointer border-bg-200">
                <div class="flex items-center justify-center h-8 space-x-2" @mouseenter="menu = true"
                    @mouseleave="menu = false">
                    <i class=" fas fa-cog"></i>
                    <span>Admin</span>
                </div>
                <div x-show="menu" @mouseenter="menu = true" @mouseleave="menu = false"
                    class="absolute left-0 flex flex-col w-full space-y-2 border-2 shadow-lg bg-bg-200 top-8 border-bg-200">
                    <a href={{ route('zones') }} class="block w-full px-2 py-1 pl-6 bg-bg-200 hover:bg-bg-300">Zones</a>
                    <a href={{ route('roles') }} class="block w-full px-2 py-1 pl-6 bg-bg-200 hover:bg-bg-300">Roles</a>
                    <a href={{ route('users') }} class="block w-full px-2 py-1 pl-6 bg-bg-200 hover:bg-bg-300">Users</a>
                    <a href={{ route('clients') }}
                        class="block w-full px-2 py-1 pl-6 bg-bg-200 hover:bg-bg-300">Clients</a>
                </div>
            </div>
        @endif
        <a href="#" @click.prevent="toggleDarkMode()" x-text="darkMode ? '🔆' : '🌑'" class="text-2xl"></a>
    </div>
</nav>
