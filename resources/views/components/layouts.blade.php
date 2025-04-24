<!DOCTYPE html>
<html lang="en">

<head>
    <x-head :title="$title" />
</head>

<body
    class="bg-bg-100 text-text-100 h-screen flex scrollbar-thin [&::-webkit-scrollbar]:w-2
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

    <div class="transition-all duration-300 min-h-screen flex flex-col overflow-y-auto"
        :class="expanded ? 'ml-64' : 'ml-16'">
        <x-app.header :titleOfPage="$title" />
        <div class="flex-1 mt-14  bg-bg-100 flex flex-col flex-start justify-start">
            {{ $slot }}
        </div>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
