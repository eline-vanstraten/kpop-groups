{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <title>Groups</title>--}}
{{--</head>--}}
<x-app-layout>
    {{--<body>--}}
    <h1>Groups</h1>
    <ul>
        @foreach($groups as $group)
            <li><a href="{{ route('groups.show', $group) }}">{{ $group->name }}</a></li>
            <p>{{ $group->debut_date }}</p>
            <p>{{ $group->number_of_members }}</p>
            <p>{{ $group->name_of_members }}</p>
            <p>{{ $group->description }}</p>
            <p>{{ $group->image }}</p>
        @endforeach
    </ul>
</x-app-layout>
{{--</body>--}}

{{--</html>--}}

