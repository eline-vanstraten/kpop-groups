<x-app-layout>
    <h1>Create group</h1>
    <form method="POST" action="{{route('groups.store')}}">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
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
                    <option value="{{$type->id}}">{{$type->type}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="agency_id">Agency</label>
            <select name="agency_id">
                @foreach($agencies as $agency)
                    {
                    <option value="{{$agency->id}}">{{$agency->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="debut_date">Debut date</label>
            <input type="date" id="debut_date" name="debut_date">
        </div>
        @error('debut_date')
        <div class="text-red-500 text-sm mt-1 italic">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="number_of_members">Number of Members</label>
            <input type="number" id="number_of_members" name="number_of_members">
        </div>
        @error('number_of_members')
        <div class="text-red-500 text-sm mt-1 italic">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="name_of_members">Name of Members</label>
            <input type="text" id="name_of_members" name="name_of_members">
        </div>
        @error('name_of_members')
        <div class="text-red-500 text-sm mt-1 italic">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description">
        </div>
        @error('description')
        <div class="text-red-500 text-sm mt-1 italic">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="image">Image</label>
            <input type="text" id="image" name="image">
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
            {{--            <input type="submit" id="submit" name="submit">--}}
        </div>
    </form>
</x-app-layout>

