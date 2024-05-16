<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Hotel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto p-4">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-6">
                        <x-nav-link href="{{ route('hotel_manager.hotels.index') }}" class="mb-4 font-bold">Go Back</x-nav-link>
                        <h1 class="text-sm text-gray-400 font-bold mb-2">Hotel Name</h1>
                        <p class="text-gray-700 text-lg mb-4">{{ $hotel->name }}</p>

                        <div class="flex items-center mb-4">
                            <div class="flex items-center">
                                <span class="text-yellow-500">
                                    ★★★★★
                                </span>
                                <span class="text-gray-600 ml-2">(4.5/5 based on 200 reviews)</span>
                            </div>
                        </div>

                        <p class="text-gray-600 mb-4">
                            {{ $hotel->description }}
                        </p>

                        <div class="mb-4">
                            <h2 class="text-sm text-gray-400 font-semibold mb-2">Hotel Type</h2>
                            <ul class="list-disc list-inside text-gray-700">
                                <li>{{ $hotel->room_type }}</li>
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h2 class="text-sm text-gray-400 font-semibold mb-2">Hotel Price</h2>
                            <ul class="list-disc list-inside text-gray-700">
                                <li>{{ $hotel->room_type }} : {{ $hotel->cost_per_day }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

