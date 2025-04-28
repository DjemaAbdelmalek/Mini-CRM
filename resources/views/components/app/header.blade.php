<nav class="fixed inset-0 top-0 flex items-center justify-between px-4 transition-all duration-300 shadow-lg h-14 bg-bg-300 dark:shadow-bg-300 dark:shadow-sm"
    :class="expanded ? 'md:left-[256px] left-100' : 'left-[64px]'">
    <h1 class="text-2xl font-semibold">{{ $titleOfPage }}</h1>
    <div class="items-center justify-between hidden md:flex">
        <h1>User</h1>
        <div>Drop down of that page</div>
        <a href="#" @click.prevent="toggleDarkMode()" x-text="darkMode ? '🔆' : '🌑'" class="text-2xl"></a>
    </div>
</nav>
