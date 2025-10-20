<x-app-layout>
    <h1>Groups</h1>
    <a href="{{route('groups.create')}}">Create</a>

    <div>
        <form action="{{route('groups.index')}}" method="GET">
            <div>
                <label for="search" class="visually-hidden">Search term</label>
                <input type="text" name="search" id="search" value="{{request('search')}}" class="form-control"
                       placeholder="Search term">

                <select name="agency_id">
                    <option value="">All agencies</option>
                    @foreach($agencies as $agency)
                        {{--Kijkt of variabele gelijk is aan id, zo ja zet die op selected in de dropdown, zo niet doet die niets--}}
                        <option value="{{$agency->id}}" {{$agencyId == $agency->id ? 'selected' : ''}}>
                            {{$agency->name}}
                        </option>
                    @endforeach
                </select>

                <select name="type_id">
                    <option value="">All types</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}" {{$typeId == $type->id ? 'selected' : ''}}>
                            {{$type->type}}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-success text-black">Find!</button>
            </div>
        </form>
        <p> Groups found: {{$groups->count()}}</p>
        @if($groups->count())

            <ul>
                @foreach($groups as $group)
                    <li><a href="{{ route('groups.show', $group) }}">{{ $group->name }}</a></li>
                    <p>{{ $group->image }}</p>
                    <p>{{ $group->description }}</p>
                @endforeach
            </ul>

        @endif
    </div>


</x-app-layout>

