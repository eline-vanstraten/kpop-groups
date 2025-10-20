<x-app-layout>
    <h1>Groups</h1>
    <a href="{{route('groups.create')}}">Create</a>

    <div>
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
            <p> Groups found: {{$groups->count()}}</p>
            <ul>
                @foreach($groups as $group)
                    <li><a href="{{ route('groups.show', $group) }}">{{ $group->name }}</a></li>
                    <p>{{ $group->image }}</p>
                    <p>{{ $group->description }}</p>
                @endforeach
            </ul>

        @endif
    </div>


</x-app-layout>

