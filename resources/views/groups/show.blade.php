<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
            {{--            <div class="max-w-5xl mx-auto p-6"></div>--}}
            <div class="flex-1 space-y-3">
                <h1 class="text-3xl font-bold"> {{ $group->name }}</h1>
                <p class="text-gray-600"><strong>Type:</strong> {{$group->type->type}}</p>
                <p class="text-gray-600"><strong>Agency:</strong> {{$group->agency->name}}</p>
                <p class="text-gray-600"><strong>Debut date:</strong> {{$group->debut_date}}</p>
                <p class="text-gray-600"><strong>Number of members:</strong> {{$group->number_of_members}}</p>
                <p class="text-gray-600"><strong>Name of members:</strong>: {{$group->name_of_members}}</p>
                <p class="text-gray-600">{{$group->description}}</p>

                {{--    <p>{{$group->image}}</p>--}}
                @auth
                    @can('edit-group', $group)
                        <div class="mt-4 flex gap-11">
                            <a href="{{ route('groups.edit', $group->id) }}"
                               class="px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800 transition">Edit</a>
                            <button form="delete-form"
                                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">Delete
                            </button>

                        </div>
                    @endcan


                    <form method="POST" action="{{route('groups.destroy', $group->id)}}" class="hidden"
                          id="delete-form">
                        @csrf
                        @method('DELETE')
                    </form>
                @endauth
            </div>
            <div class="flex-shrink-0 w-full md:w-1/2">
                <img src="{{asset('storage/' . $group->image)}}" alt="{{$group->name}}"
                     class="rounded-lg shadow-lg w-full object-cover">
            </div>
        </div>
    </div>
</x-app-layout>
