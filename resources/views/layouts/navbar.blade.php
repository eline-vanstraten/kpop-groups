<nav class="my-6 flex gap-4">
    <x-menu-link href="{{ route('homepage') }}" :active="Route::is('homepage')">Home</x-menu-link>
    <x-menu-link href="{{ route('groups.index') }}" :active="Route::is('groups.index')">Groups</x-menu-link>
    @auth
        <x-menu-link href="{{ route('favorites') }}" :active="Route::is('favorites')">Favorites</x-menu-link>
        <form method="POST" action="{{route('logout')}}">
            @csrf
            <button type="submit">Log Out</button>
        </form>

    @endauth
    @guest
        <x-menu-link href="{{route('login')}}" :active="Route::is('login')">Login</x-menu-link>
        <x-menu-link href="{{route('register')}}" :active="Route::is('register')">Register</x-menu-link>
    @endguest
</nav>
