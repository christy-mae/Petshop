<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pet Details') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6 text-center">
        <h1 class="text-3xl font-bold">{{ $pet->name }}</h1>
        <div class="relative min-h-screen">
            <img src="{{ asset('images/' . $pet->image_url) }}" alt="{{ $pet->name }}" class="w-full h-full object-cover rounded-md">
            <div class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 rounded-md">
                
            </div>
        </div>
        <p class="text-gray-600 mt-4">{{ $pet->description }}</p>
        <p class="text-green-600 font-bold mt-2 text-xl">Price: ${{ number_format($pet->price, 2) }}</p>
        <div class="mt-4">
            <a href="{{ route('view.pets') }}" class="text-white bg-gray-500 px-4 py-2 rounded">
                Back to Pets
            </a>
        </div>
    </div>
</x-app-layout>
