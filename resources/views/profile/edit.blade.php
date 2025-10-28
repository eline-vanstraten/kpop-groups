<x-app-layout>
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">
            Profile
        </h1>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1 space-y-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">
                        My groups
                    </h2>
                    <div class="space-y-4">
                        @foreach($groups as $group)
                            <div
                                class="block bg-gray-200 rounded-xl shadow-md hover:shadow-2xl transition overflow-hidden">

                                <div class=" h-32 w-full">
                                    <img src="{{asset('storage/' . $group->image)}}" alt="{{$group->name}}"
                                         class="h-full w-full object-cover object-top">
                                </div>
                                <div class="p-4">
                                    <a href="{{ route('groups.show', $group) }}"
                                       class="text-lg font-semibold text-gray-800 hover:underline">{{ $group->name }}</a>
                                    <p class=" text-gray-700 text-sm mt-1 line-clamp-2">{{ $group->description }}</p>
                                    <a href="{{route('groups.show', $group)}}"
                                       class="mt-3 inline-block px-3 py-1 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700 transition">Show
                                        group details</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
