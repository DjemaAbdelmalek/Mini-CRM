<div @mouseenter="expanded = true, openSectionSideBar = true" @mouseleave="expanded = false,openSectionSideBar = false"
    class="fixed top-0 left-0 h-screen bg-bg-100 text-text-100 transition-all duration-300 border-r-1 border-bg-300
     overflow-y-auto scrollbar-thin [&::-webkit-scrollbar]:w-1
  [&::-webkit-scrollbar-track]:rounded-full
  [&::-webkit-scrollbar-track]:bg-gray-100
  [&::-webkit-scrollbar-thumb]:rounded-full
  [&::-webkit-scrollbar-thumb]:bg-gray-300
  dark:[&::-webkit-scrollbar-track]:bg-neutral-700
  dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
    :class="expanded ? 'w-64' : 'w-16'">
    <div class="flex flex-col items-start mt-10 space-y-6 ">
        <!-- Home -->
        <div class="flex flex-col items-start w-full">

            <x-sidebar.section icon="fas fa-home" title="Admin">
                <a href="/users" class="block w-full px-2 py-1 pl-6 bg-bg-200 hover:bg-bg-300">Users</a>
                <a href="/clients" class="block w-full px-2 py-1 pl-6 bg-bg-200 hover:bg-bg-300">Clients</a>
                <a href="/roles" class="block w-full px-2 py-1 pl-6 bg-bg-200 hover:bg-bg-300">Roles</a>
            </x-sidebar.section>
            <x-sidebar.section icon="fas fa-chart-line" title="Dashboard">
                <a href="/users" class="block w-full px-2 py-1 pl-6 bg-bg-200 hover:bg-bg-300">Users</a>
                <a href="/clients" class="block w-full px-2 py-1 pl-6 bg-bg-200 hover:bg-bg-300">Clients</a>
                <a href="/analytics" class="block w-full px-2 py-1 pl-6 bg-bg-200 hover:bg-bg-300">Analytics</a>
            </x-sidebar.section>
            <x-sidebar.section icon="fas fa-cog" title="settings">
                <a href="/users" class="block w-full px-2 py-1 pl-6 bg-bg-200 hover:bg-bg-300">Users</a>
                <a href="/clients" class="block w-full px-2 py-1 pl-6 bg-bg-200 hover:bg-bg-300">Clients</a>
                <a href="/analytics" class="block w-full px-2 py-1 pl-6 bg-bg-200 hover:bg-bg-300">Analytics</a>
            </x-sidebar.section>
        </div>
        <div class="flex flex-col items-center pb-4 mt-auto ml-4">
            <a href="#" @click.prevent="toggleDarkMode()" x-text="darkMode ? '🔆' : '🌑'"
                class="text-xl sm:hidden"></a>
        </div>
    </div>
</div>
