<x-app-layout>
    {{-- Optional header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    {{-- Page content goes here --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            Your content here
        </div>
    </div>
</x-app-layout>