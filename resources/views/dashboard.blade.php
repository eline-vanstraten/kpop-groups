<x-app-layout>
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Admin dashboard</h1>
        
        <div class="py-12 flex justify-center">
            <div class="max-w-md w-full">
                <a href="{{ route('admin.groups.index') }}"
                   class="block bg-blue-500 hover:bg-blue-600 transition-shadow shadow-md hover:shadow-lg rounded-lg p-6 text-center text-white">
                    <div class="text-2xl font-bold">
                        K-Pop Groups overview
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>


