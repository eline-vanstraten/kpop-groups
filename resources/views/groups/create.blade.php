<x-app-layout>
    <h1>Create group</h1>
    <form method="POST" action="{{route('groups.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{old('name')}}">
            @error('name')
            <div class="text-red-500 text-sm mt-1 italic">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="type_id">Group type</label>
            <select name="type_id">
                @foreach($types as $type)
                    {
                    <option
                        value="{{$type->id}}" {{old('type_id') == $type->id ? 'selected' : ''}}>{{$type->type}} </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="agency_id">Agency</label>
            <select name="agency_id">
                @foreach($agencies as $agency)
                    {
                    <option
                        value="{{$agency->id}}" {{old('agency_id') == $agency->id ? 'selected' : ''}}>{{$agency->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="debut_date">Debut date</label>
            <input type="date" id="debut_date" name="debut_date" value="{{old('debut_date')}}">
        </div>
        @error('debut_date')
        <div class="text-red-500 text-sm mt-1 italic">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="number_of_members">Number of Members</label>
            <input type="number" id="number_of_members" name="number_of_members" value="{{old('number_of_members')}}">
        </div>
        @error('number_of_members')
        <div class="text-red-500 text-sm mt-1 italic">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="name_of_members">Name of Members</label>
            <input type="text" id="name_of_members" name="name_of_members" value="{{old('name_of_members')}}">
        </div>
        @error('name_of_members')
        <div class="text-red-500 text-sm mt-1 italic">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" value="{{old('description')}}">
        </div>
        @error('description')
        <div class="text-red-500 text-sm mt-1 italic">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="image">Upload image</label>
            <input type="file" id="image" name="image" accept="image/" value="{{old('image')}}">
        </div>
        @error('image')
        <div class="text-red-500 text-sm mt-1 italic">
            {{ $message }}
        </div>
        @enderror
        <div>
            <a href="{{route('groups.index')}}">Cancel</a>
        </div>
        <div>
            <button type="submit" id="submit" name="submit">
                Submit
            </button>
        </div>
    </form>
</x-app-layout>

