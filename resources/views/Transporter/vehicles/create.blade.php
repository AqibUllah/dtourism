
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Vehicle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">

                <form action="{{ route('transporter.vehicles.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <x-text-input type="text" class="form-control w-full" id="company_name" name="company_name" placeholder="company name" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <x-text-input type="text" class="form-control w-full" id="email" name="email" placeholder="Enter email" />
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <x-text-input type="text" class="form-control w-full" id="phone" name="phone" placeholder="Enter phone" />
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <x-text-input type="text" class="form-control w-full" id="city" name="city" placeholder="Enter city" />
                    </div>
                    <div class="mb-3">
                        <label for="vehicle_type" class="form-label">Vehicle Type</label>
                        <x-text-input type="text" class="form-control w-full" id="vehicle_type" name="vehicle_type" placeholder="Enter type" />
                    </div>
                    <div class="mb-3">
                        <label for="capacity" class="form-label">Vehicle Capacity</label>
                        <x-text-input type="text" class="form-control w-full" id="capacity" name="capacity" placeholder="Enter capacity" />
                    </div>
                    <div class="mb-3">
                        <label for="price_per_km" class="form-label">Vehicle Price / KM</label>
                        <x-text-input type="text" class="form-control w-full" id="price_per_km" name="price_per_km" placeholder="Enter Price/Km" />
                    </div>
                    <!-- Add more input fields for other vehicle attributes as needed -->
                    <x-primary-button type="submit">Submit</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

