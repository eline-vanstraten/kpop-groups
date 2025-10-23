<x-app-layout>
    <div class="max-w-xl mx-auto mt-10 mb-10 p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-center">Create group</h1>
        <form method="POST" action="{{route('groups.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="flex flex-col mb-6">
                <label for="name" class="mb-1 font-medium">Name</label>
                <input type="text" id="name" name="name" value="{{old('name')}}" class="border rounded p-2">
                @error('name')
                <div class="text-red-500 text-sm mt-1 italic">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="flex flex-col mb-6">
                <label for="type_id" class="mb-1 font-medium">Group type</label>
                <select name="type_id" class="border rounded p-2">
                    @foreach($types as $type)
                        {
                        <option
                            value="{{$type->id}}" {{old('type_id') == $type->id ? 'selected' : ''}}>{{$type->type}} </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-6">
                <label for="agency_id" class="mb-1 font-medium">Agency</label>
                <select name="agency_id" class="border rounded p-2">
                    @foreach($agencies as $agency)
                        {
                        <option
                            value="{{$agency->id}}" {{old('agency_id') == $agency->id ? 'selected' : ''}}>{{$agency->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-6">
                <label for="debut_date" class="mb-1 font-medium">Debut date</label>
                <input type="date" id="debut_date" name="debut_date" value="{{old('debut_date')}}"
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
                       value="{{old('number_of_members')}}" class="border rounded p-2">
            </div>
            @error('number_of_members')
            <div class="text-red-500 text-sm mt-1 italic">
                {{ $message }}
            </div>
            @enderror

            <div class="flex flex-col mb-6">
                <label for="name_of_members" class="mb-1 font-medium">Name of Members</label>
                <input type="text" id="name_of_members" name="name_of_members" value="{{old('name_of_members')}}"
                       class="border rounded p-2">
            </div>
            @error('name_of_members')
            <div class="text-red-500 text-sm mt-1 italic">
                {{ $message }}
            </div>
            @enderror

            <div class="flex flex-col mb-6">
                <label for="description" class="mb-1 font-medium">Description</label>
                <input type="text" id="description" name="description" value="{{old('description')}}"
                       class="border rounded p-2">
            </div>
            @error('description')
            <div class="text-red-500 text-sm mt-1 italic">
                {{ $message }}
            </div>
            @enderror

            <div class="mb-6">
                <label for="image" class="mb-1 font-medium">Upload image</label>
                <input type="file" id="image" name="image" accept="image/" value="{{old('image')}}"
                       class="border rounded p-2">
            </div>
            @error('image')
            <div class="text-red-500 text-sm mt-1 italic">
                {{ $message }}
            </div>
            @enderror

            <div class="flex justify-start space-x-4 mt-4">
                <button type="submit" id="submit" name="submit"
                        class="px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800 transition">
                    Submit
                </button>

                <a href="{{route('groups.index')}}" class="text-red-600 hover:underline hover:text-red-800">Cancel</a>
            </div>

        </form>
    </div>
</x-app-layout>

