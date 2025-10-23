@props(['active' => false])

<div class="hidden sm:ml-6 sm:block">
    <div class="flex space-x-4">
        <a class="text-white block rounded-md px-3 py-2 hover:bg-white/5 hover:text-white @if($active)  bg-gray-900 text-base font-medium @endif" {{$attributes}}>
            {{ $slot }}
        </a>
    </div>
</div>


