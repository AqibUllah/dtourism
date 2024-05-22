<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hotels') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4">
                @if(session()->has('success'))
                    <x-Alertify::info title="Success" body="{{ session('success') }}" />
                @endif
            </div>
            <div class="container">
                <x-nav-link href="{{ route('hotel_manager.hotels.create') }}" class="bg-blue-500  mb-3 px-4 py-2 text-center rounded-md">Add Hotel</x-nav-link>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                        <th scope="col" class="px-6 py-50">ID</th>
                        <th scope="col" class="px-6 py-50">Image</th>
                        <th scope="col" class="px-6 py-50">Name</th>
                        <th scope="col" class="px-6 py-50">Category</th>
                        <th scope="col" class="px-6 py-50">Room Type</th>
                        <th scope="col" class="px-6 py-50">Price / Day</th>
                        <th scope="col" class="px-6 py-50">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($hotels as $hotel)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $hotel->id }}</td>
                            <td class="px-6 py-4">
                                <img src="{{ file_exists($hotel->image) ? $hotel->image : asset('storage/uploads/default/no-image.png') }}" alt="hotel image" width="100%" height="100%" style="height: 50px;width: 50px;">
                            </td>
                            <td class="px-6 py-4">{{ $hotel->name }}</td>
                            <td class="px-6 py-4">{{ $hotel->category }}</td>
                            <td class="px-6 py-4">{{ $hotel->room_type }}</td>
                            <td class="px-6 py-4">{{ $hotel->cost_per_day }}</td>
                            <td class="px-6 py-4 flex gap-5 items-center">
                                <x-nav-link href="{{ route('hotel_manager.hotels.show', $hotel->id) }}" class=" bg-purple-300 px-4 py-2 text-center rounded-md">View</x-nav-link>
                                <x-nav-link href="{{ route('hotel_manager.hotels.edit', $hotel->id) }}" class=" bg-purple-300 px-4 py-2 text-center rounded-md">Edit</x-nav-link>
                                <form action="{{ route('hotel_manager.hotels.destroy', $hotel->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</x-danger-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
