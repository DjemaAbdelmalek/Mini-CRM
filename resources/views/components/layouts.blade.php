<!DOCTYPE html>
<html lang="en">

<head>
    <x-head :title="$title" />
    @livewireStyles
</head>

<body
    class="bg-bg-100  text-text-100 min-h-screen flex scrollbar-thin [&::-webkit-scrollbar]:w-2
  [&::-webkit-scrollbar-track]:rounded-full
  [&::-webkit-scrollbar-track]:bg-gray-100
  [&::-webkit-scrollbar-thumb]:rounded-full
  [&::-webkit-scrollbar-thumb]:bg-gray-300
  dark:[&::-webkit-scrollbar-track]:bg-neutral-700
  dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
    x-data="{
        expanded: false,
        openSectionSideBar: false,
        darkMode: JSON.parse(localStorage.getItem('darkMode')) || false,
        toggleDarkMode() {
            this.darkMode = !this.darkMode;
            localStorage.setItem('darkMode', JSON.stringify(this.darkMode));
        }
    }" x-bind:class="{ 'dark': darkMode }">
    <x-app.sidebar />
    <div class="flex flex-col flex-1 min-h-screen transition-all duration-300" :class="expanded ? 'ml-64' : 'ml-16'">
        <x-app.header :titleOfPage="$title" />
        <div class="flex flex-1 transition-all duration-300 mt-14 bg-bg-100">
            {{ $slot }}
        </div>
    </div>


    @livewireScripts
</body>

</html>
