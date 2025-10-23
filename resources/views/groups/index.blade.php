<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">


        <div class="max-w-6xl mx-auto p-6 ">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Groups</h1>
        </div>
        <div class="flex items-center justify-between mb-6">
            <div>
                <form action="{{route('groups.index')}}" method="GET"
                      class="flex flex-wrap gap-4 mb-8 bg-white p-4 rounded-lg shadow-sm">
                    <div class="flex-grow">
                        <label for="search" class="visually-hidden">Search term</label>
                        <input type="text" name="search" id="search" value="{{request('search')}}"
                               class="form-control rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                               placeholder="Search groups...">

                        <select name="agency_id"
                                class="rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">All agencies</option>
                            @foreach($agencies as $agency)
                                {{--Kijkt of variabele gelijk is aan id, zo ja zet die op selected in de dropdown, zo niet doet die niets--}}
                                <option value="{{$agency->id}}" {{$agencyId == $agency->id ? 'selected' : ''}}>
                                    {{$agency->name}}
                                </option>
                            @endforeach
                        </select>

                        <select name="type_id"
                                class="rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">All types</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}" {{$typeId == $type->id ? 'selected' : ''}}>
                                    {{$type->type}}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Find!
                        </button>
                    </div>
                </form>
                <div class="mb-6">
                    @auth
                        <a href="{{route('groups.create')}}"
                           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Create</a>
                    @endauth
                </div>
                <p class="text-gray-600 mb-4"> Groups found: {{$groups->count()}}</p>

                <div class="grid grid-cols-3 gap-6">
                    @if($groups->count())
                        @foreach($groups as $group)
                            <div
                                class="block bg-gray-200 rounded-xl shadow-md hover:shadow-2xl transition overflow-hidden">

                                <div class="h-48 w-full">
                                    <img src="{{asset('storage/' . $group->image)}}" alt="{{$group->name}}"
                                         class="h-full w-full object-cover">
                                </div>
                                <div class="p-4 flex flex-col  justify-between">
                                    <a href="{{ route('groups.show', $group) }}"
                                       class="text-xl font-semibold text-gray-800 mb-1 ml-2 hover:underline">{{ $group->name }}</a>
                                    <p class=" text-gray-700 text-sm mt-2 ml-2 line-clamp-3">{{ $group->description }}</p>
                                    <a href="{{route('groups.show', $group)}}"
                                       class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Show
                                        group details</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

