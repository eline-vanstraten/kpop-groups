<x-app-layout>
    <h1>Groups</h1>
    <a href="{{route('groups.create')}}">Create</a>
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

