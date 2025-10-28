<nav class="relative bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="flex space-x-4">
                <x-menu-link href="{{ route('welcome') }}" :active="Route::is('welcome')" aria-current="page">
                    Home
                </x-menu-link>
                <x-menu-link href="{{ route('groups.index') }}" :active="Route::is('groups.index')">Groups
                </x-menu-link>
                @auth
                    <x-menu-link href="{{ route('favorites') }}" :active="Route::is('favorites')">Favorites
                    </x-menu-link>
                    @can('access-dashboard')
                        <x-menu-link href="{{ route('dashboard') }}" :active="Route::is('dashboard')">Dashboard
                        </x-menu-link>
                    @endcan


            </div>

            <div class="flex space-x-4 items-center">
                <x-menu-link href="{{ route('profile.edit') }}" :active="Route::is('profile.edit')">Profile
                </x-menu-link>

                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button
                        class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white"
                        type="submit">Log Out
                    </button>
                </form>


                @endauth
                @guest
                    <x-menu-link href="{{route('login')}}" :active="Route::is('login')">Login</x-menu-link>
                    <x-menu-link href="{{route('register')}}" :active="Route::is('register')">Register
                    </x-menu-link>
                @endguest
            </div>
        </div>
    </div>
</nav>

