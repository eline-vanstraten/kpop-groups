<x-app-layout>
    <h1>Edit group {{$group->name}}</h1>
    <form method="POST" action="{{route('groups.update', $group->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{$group->name}}">
            @error('name')
            <div class="text-red-500 text-sm mt-1 italic">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="type_id">Group type</label>
            <select name="type_id" id="type_id">
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
        <div>
            <label for="agency_id">Agency</label>
            <select name="agency_id" id="agency_id">
                @foreach($agencies as $agency)
                    <option
                        {{--zet id van voorheen gekozen type neer --}}
                        value="{{$agency->id}}"
                        {{--checkt of de gekozen type_id in group tabel gelijk is aan de id van de type tabel.
                        Waar--> de geselecteerde wordt laten zien dus die al voorheen gekozen is
                        Niet waar--> de standaard optie word laten zien--}}
                        {{$group->agency_id == $agency->id ? 'selected' : ''}}>{{$agency->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="debut_date">Debut date</label>
            <input type="date" id="debut_date" name="debut_date" value="{{$group->debut_date}}">
        </div>
        @error('debut_date')
        <div class="text-red-500 text-sm mt-1 italic">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="number_of_members">Number of Members</label>
            <input type="number" id="number_of_members" name="number_of_members" value="{{$group->number_of_members}}">
        </div>
        @error('number_of_members')
        <div class="text-red-500 text-sm mt-1 italic">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="name_of_members">Name of Members</label>
            <input type="text" id="name_of_members" name="name_of_members" value="{{$group->name_of_members}}">
        </div>
        @error('name_of_members')
        <div class="text-red-500 text-sm mt-1 italic">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" value="{{$group->description}}">
        </div>
        @error('description')
        <div class="text-red-500 text-sm mt-1 italic">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="image">Image</label>
            <input type="file" id="image" name="image" value="{{$group->image}}" accept="image/">
        </div>
        @error('image')
        <div class="text-red-500 text-sm mt-1 italic">
            {{ $message }}
        </div>
        @enderror
        <div>
            <a href="{{route('groups.show', $group->id)}}">Cancel</a>
        </div>
        <div>
            <button type="submit" id="submit" name="submit">Update</button>
        </div>
    </form>
</x-app-layout>
