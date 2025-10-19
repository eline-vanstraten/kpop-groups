<x-app-layout>
    <h1>Groups</h1>
    <a href="{{route('groups.create')}}">Create</a>

    <form action="{{route('groups.index')}}" method="GET">
        <div>
            <label for="search" class="visually-hidden">Search term</label>
            <input type="text" name="search" id="search" value="{{request('search')}}" class="form-control"
                   placeholder="Search term">
        </div>
        <div>
            <button type="submit" class="btn btn-success text-black">Find!</button>
        </div>
    </form>

    @if($groups->count())
        <ul>
            @foreach($groups as $group)
                <li><a href="{{ route('groups.show', $group) }}">{{ $group->name }}</a></li>
                <p>{{ $group->description }}</p>
            @endforeach
        </ul>
        {{--    @else--}}
        {{--        <p>No groups found</p>--}}
    @endif



    {{--    <ul>--}}
    {{--        @foreach($groups as $group)--}}
    {{--            <li><a href="{{ route('groups.show', $group) }}">{{ $group->name }}</a></li>--}}
    {{--            <p>{{ $group->debut_date }}</p>--}}
    {{--            <p>{{ $group->number_of_members }}</p>--}}
    {{--            <p>{{ $group->name_of_members }}</p>--}}
    {{--            <p>{{ $group->description }}</p>--}}
    {{--            <p>{{ $group->image }}</p>--}}
    {{--        @endforeach--}}
    {{--    </ul>--}}


</x-app-layout>

