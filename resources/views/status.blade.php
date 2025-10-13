@auth
    <p>Je bent ingelogd</p>
    <a href="{{route('favorites')}}">Favorieten</a>
@endauth

@guest
    <p>Je bent uitgelogd</p>
@endguest
