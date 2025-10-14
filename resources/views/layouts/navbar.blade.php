<nav class="my-6 flex gap-4">
    <x-nav-link href="{{ route('homepage') }}" :active="Route::is('homepage')">Home</x-nav-link>
    <x-nav-link href="{{ route('groups.index') }}" :active="Route::is('groups.index')">Groups</x-nav-link>
    <x-nav-link href="{{ route('favorites') }}" :active="Route::is('favorites')">Favorites</x-nav-link>
</nav>
