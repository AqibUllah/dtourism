<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehicles') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <x-nav-link href="{{ route('transporter.vehicles.create') }}" class="bg-blue-500 text-white mb-3 px-4 py-2 text-center rounded-md">Add Vehicle</x-nav-link>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                        <th scope="col" class="px-6 py-50">ID</th>
                        <th scope="col" class="px-6 py-50">Company Name</th>
                        <th scope="col" class="px-6 py-50">Email</th>
                        <th scope="col" class="px-6 py-50">Phone</th>
                        <th scope="col" class="px-6 py-50">City</th>
                        <th scope="col" class="px-6 py-50">Vehicle Type</th>
                        <th scope="col" class="px-6 py-50">Capacity</th>
                        <th scope="col" class="px-6 py-50">Price per KM</th>
                        <th scope="col" class="px-6 py-50">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($vehicles as $vehicle)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $vehicle->id }}</td>
                            <td class="px-6 py-4">{{ $vehicle->company_name }}</td>
                            <td class="px-6 py-4">{{ $vehicle->email }}</td>
                            <td class="px-6 py-4">{{ $vehicle->phone }}</td>
                            <td class="px-6 py-4">{{ $vehicle->city }}</td>
                            <td class="px-6 py-4">{{ $vehicle->vehicle_type }}</td>
                            <td class="px-6 py-4">{{ $vehicle->capacity }}</td>
                            <td class="px-6 py-4">{{ $vehicle->price_per_km }}</td>
                            <td class="px-6 py-4 flex gap-5 items-center">
                                <x-nav-link href="{{ route('transporter.vehicles.edit', $vehicle) }}" class="btn btn-sm btn-primary bg-purple-300 px-4 py-2 text-center rounded-md">Edit</x-nav-link>
                                <form action="{{ route('transporter.vehicles.destroy', $vehicle) }}" method="POST" style="display:inline">
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
