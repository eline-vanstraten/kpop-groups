<x-app-layout>
    <div class="max-w-5xl mx-auto p-6"></div>
    <h1> {{ $group->name }}</h1>
    <p>{{$group->type->type}}</p>
    <p>{{$group->agency->name}}</p>
    <p>{{$group->debut_date}}</p>
    <p>{{$group->number_of_members}}</p>
    <p>{{$group->name_of_members}}</p>
    <p>{{$group->description}}</p>
    <img src="{{asset('storage/' . $group->image)}}" alt="{{$group->name}}">
    {{--    <p>{{$group->image}}</p>--}}
    @auth
        @can('edit-group', $group)
            <div>
                <button form="delete-form">Delete</button>
                <a href="{{ route('groups.edit', $group->id) }}">Edit</a>
            </div>
        @endcan


        <form method="POST" action="{{route('groups.destroy', $group->id)}}" class="hidden" id="delete-form">
            @csrf
            @method('DELETE')
        </form>
    @endauth

</x-app-layout>
