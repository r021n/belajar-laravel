<x-app>

    <x-slot name="sidebar">
        <x-partials.sidebar :menus="
        [
            ['title' => 'Dashboard', 'link' => '/dashboard'],
            ['title' => 'Profile', 'link' => '/profile'],
            ['title' => 'Settings', 'link' => '/settings'],
        ]
        "></x-partials.sidebar>
    </x-slot>

    <x-slot name="main">
        <div class="bg-blue-500 text-white py-16 px-8 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold">Welcome to laravel 11</h1>
            <p class="text-xl mt-6">This is a simple example of laravel 11</p>
        </div>
    </x-slot>

</x-app>
