<x-app-layout>
    <h1> {{ $group->name }}</h1>
    <p>{{$group->type->type}}</p>
    <p>{{$group->debut_date}}</p>
    <p>{{$group->number_of_members}}</p>
    <p>{{$group->name_of_members}}</p>
    <p>{{$group->description}}</p>
    <p>{{$group->image}}</p>
    <a href="{{ route('groups.edit', $group->id) }}">Edit</a>
</x-app-layout>
