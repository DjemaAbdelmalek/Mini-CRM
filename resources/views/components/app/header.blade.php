<nav class="fixed inset-0  h-14 top-0  bg-bg-300 flex justify-between items-center px-4 transition-all duration-300 shadow-lg dark:shadow-bg-300 dark:shadow-sm"
    :class="expanded ? 'left-[256px]' : 'left-[64px]'">
    <h1 class="text-2xl font-semibold">{{ $titleOfPage }}</h1>
    <div class="hidden md:flex justify-between items-center">
        <h1>User</h1>
        <div>Drop down of that page</div>
        <a href="#" @click.prevent="toggleDarkMode()" x-text="darkMode ? '🔆' : '🌑'" class="text-2xl"></a>
    </div>
</nav>
