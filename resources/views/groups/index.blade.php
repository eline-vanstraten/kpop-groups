<x-app-layout>
    <h1>Groups</h1>
    <a href="{{route('groups.create')}}">Create</a>

    {{--    <form action="{{route('groups.index')}}" method="GET">--}}
    {{--        <input type="text" name="search">--}}
    {{--        <button type="submit">Search</button>--}}
    {{--    </form>--}}
    {{--    @if($groups->isNotEmpty())--}}
    {{--        @foreach($groups as $group)--}}
    {{--            <div>--}}
    {{--                <p>{{$group->name}}</p>--}}
    {{--            </div>--}}
    {{--        @endforeach--}}
    {{--    @else--}}
    {{--        <div>--}}
    {{--            <h2>No groups found</h2>--}}
    {{--        </div>--}}
    {{--    @endif--}}


    <ul>
        @foreach($groups as $group)
            <li><a href="{{ route('groups.show', $group) }}">{{ $group->name }}</a></li>
            <p>{{ $group->debut_date }}</p>
            <p>{{ $group->number_of_members }}</p>
            <p>{{ $group->name_of_members }}</p>
            <p>{{ $group->description }}</p>
            <p>{{ $group->image }}</p>
        @endforeach
    </ul>


</x-app-layout>

