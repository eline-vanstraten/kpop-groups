<x-app-layout></x-app-layout>
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">K-Pop Groups overview</h1>

    <div class="overflow-x-auto flex justify-center">
        <table class="min-w-[800px] bg-white shadow-md rounded-lg overflow-hidden text-center">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
            <tr>
                <th class="py-3 px-5">ID</th>
                <th class="py-3 px-5">Name</th>
                <th class="py-3 px-5">User</th>
                <th class="py-3 px-5">Created At</th>
                <th class="py-3 px-5">Updated At</th>
                <th class="py-3 px-5">Status</th>
                <th class="py-3 px-5"></th>
                <th class="py-3 px-5"></th>
            </tr>
            </thead>

            <tbody class="text-gray-800 text-m divide-y divide-gray-200">
            @foreach ($groups as $group)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-3 px-5">{{ $group->id }}</td>
                    <td>{{ $group->name }}</td>
                    <td class="py-3 px-5 font-medium">{{ $group->user->name ?? 'Unknown' }}</td>
                    <td class="py-3 px-5">{{ $group->created_at }}</td>
                    <td class="py-3 px-5">{{ $group->updated_at }}</td>
                    <td class="py-3 px-5">
                        <form method="POST" action="{{ route('admin.groups.status', $group->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                    class=" px-4 py-2 rounded font-semibold transition {{ $group->active ? 'bg-blue-500 text-white hover:bg-blue-600' : 'bg-blue-200 text-gray-800 hover:bg-blue-300' }}">
                                {{ $group->active ? 'Unpublish' : 'Publish' }}
                            </button>
                        </form>
                    </td>
                    <td class="py-3 px-5">
                        @can('edit-group', $group)
                            <a href="{{route('groups.edit', $group->id)}}"
                               class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition font-semibold">Edit </a>
                        @endcan
                    </td>
                    <td class="py-3 px-5">
                        @can('edit-group', $group)
                            <form method="POST" action="{{ route('groups.destroy', $group->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition font-semibold">
                                    Delete
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
