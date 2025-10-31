<x-app-layout>
    <div class="max-w-xl mx-auto mt-10 mb-10 p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit group: {{$group->name}}</h1>
        <form method="POST" action="{{route('groups.update', $group->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="flex flex-col mb-6">
                <label for="name" class="mb-1 font-medium">Name</label>
                <input type="text" id="name" name="name" value="{{$group->name}}" class="border rounded p-2">
                @error('name')
                <div class="text-red-500 text-sm mt-1 italic">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="flex flex-col mb-6">
                <label for="type_id" class="mb-1 font-medium">Group type</label>
                <select name="type_id" id="type_id" class="border rounded p-2">
                    @foreach($types as $type)
                        <option
                            {{--zet id van voorheen gekozen type neer --}}
                            value="{{$type->id}}"
                            {{--checkt of de gekozen type_id in group tabel gelijk is aan de id van de type tabel.
                            Waar--> de geselecteerde wordt laten zien dus die al voorheen gekozen is
                            Niet waar--> de standaard optie word laten zien--}}
                            {{$group->type_id == $type->id ? 'selected' : ''}}>{{$type->type}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-6">
                <label for="agency_id" class="mb-1 font-medium">Agency</label>
                <select name="agency_id" id="agency_id" class="border rounded p-2">
                    @foreach($agencies as $agency)
                        <option
                            value="{{$agency->id}}"
                            {{$group->agency_id == $agency->id ? 'selected' : ''}}>{{$agency->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-6">
                <label for="debut_date" class="mb-1 font-medium">Debut date</label>
                <input type="date" id="debut_date" name="debut_date" value="{{$group->debut_date}}"
                       class="border rounded p-2">
            </div>
            @error('debut_date')
            <div class="text-red-500 text-sm mt-1 italic">
                {{ $message }}
            </div>
            @enderror

            <div class="flex flex-col mb-6">
                <label for="number_of_members" class="mb-1 font-medium">Number of Members</label>
                <input type="number" id="number_of_members" name="number_of_members"
                       value="{{$group->number_of_members}}" class="border rounded p-2">
            </div>
            @error('number_of_members')
            <div class="text-red-500 text-sm mt-1 italic">
                {{ $message }}
            </div>
            @enderror

            <div class="flex flex-col mb-6">
                <label for="name_of_members" class="mb-1 font-medium">Name of Members</label>
                <input type="text" id="name_of_members" name="name_of_members" value="{{$group->name_of_members}}"
                       class="border rounded p-2">
            </div>
            @error('name_of_members')
            <div class="text-red-500 text-sm mt-1 italic">
                {{ $message }}
            </div>
            @enderror

            <div class="flex flex-col mb-6">
                <label for="description" class="mb-1 font-medium">Description</label>
                <textarea type="text" id="description" name="description" rows="5"
                          class="border rounded p-2">{{$group->description}}</textarea>
            </div>
            @error('description')
            <div class="text-red-500 text-sm mt-1 italic">
                {{ $message }}
            </div>
            @enderror

            @if($group->image)
                <div class="mb-6">
                    <label for="image" class="mb-1 font-medium">Current Image</label>
                    <img src="{{asset('storage/' . $group->image)}}" alt="Current image"
                         class="w-32 h-32 object-cover rounded">
                </div>

            @endif
            <div class="mb-6">
                <label for="image" class="mb-1 font-medium"> Change Image</label>
                <input type="file" id="image" name="image" accept="image/"
                >
            </div>
            @error('image')
            <div class="text-red-500 text-sm mt-1 italic">
                {{ $message }}
            </div>
            @enderror
            <div class="flex justify-start space-x-4 mt-4">
                <button type="submit" id="submit" name="submit"
                        class="px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800 transition">Update
                </button>

                <a href="{{route('groups.show', $group->id)}}" class="text-red-600 hover:underline hover:text-red-800">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
