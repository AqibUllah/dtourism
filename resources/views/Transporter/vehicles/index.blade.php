<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehicles') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <x-nav-link href="{{ route('transporter.vehicles.create') }}" class="btn btn-primary">Add Vehicle</x-nav-link>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="table mt-3 w-full text-sm text-left rtl:text-right">
                    <thead class="p-5 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                        <tr>
                            <td>{{ $vehicle->id }}</td>
                            <td>{{ $vehicle->company_name }}</td>
                            <td>{{ $vehicle->email }}</td>
                            <td>{{ $vehicle->phone }}</td>
                            <td>{{ $vehicle->city }}</td>
                            <td>{{ $vehicle->vehicle_type }}</td>
                            <td>{{ $vehicle->capacity }}</td>
                            <td>{{ $vehicle->price_per_km }}</td>
                            <td>
                                <a href="{{ route('transporter.vehicles.edit', $vehicle->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
