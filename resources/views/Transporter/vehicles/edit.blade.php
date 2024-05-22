
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Vehicle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container bg-white p-5 shadow-md">
                <form action="{{ route('transporter.vehicles.update',$vehicle) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 w-full">
                        <label for="company_name" class="form-label">Company Name</label>
                        <x-text-input type="text" class="form-control w-full" id="company_name" name="company_name" value="{{ $vehicle->company_name }}" />
                        <x-input-error clss="mb-4" :messages="$errors->get('company_name')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <x-text-input type="text" class="form-control w-full" id="email" name="email" placeholder="Enter email" value="{{ $vehicle->email }}" />
                        <x-input-error clss="mb-4" :messages="$errors->get('email')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <x-text-input type="text" class="form-control  w-full" id="phone" name="phone" placeholder="Enter phone" value="{{ $vehicle->phone }}" />
                        <x-input-error clss="mb-4" :messages="$errors->get('phone')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <x-text-input type="text" class="form-control  w-full" id="city" name="city" placeholder="Enter city" value="{{ $vehicle->city }}" />
                        <x-input-error clss="mb-4" :messages="$errors->get('city')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <label for="vehicle_type" class="form-label">Vehicle Type</label>
                        <x-select-input
                            name="vehicle_type"
                            :options="['bus' => 'Bus', 'car' => 'Car']"
                            selected="{{ $vehicle->vehicle_type }}"
                            placeholder="select vehicle type"
                            required
                        />
                        <x-input-error clss="mb-4" :messages="$errors->get('vehicle_type')" class="mt-1 mb-4" />

                    </div>
                    <div class="mb-3">
                        <label for="capacity" class="form-label">Capacity</label>
                        <x-text-input type="text" class="form-control  w-full" id="capacity" name="capacity" placeholder="Enter capacity" value="{{ $vehicle->capacity }}" />
                        <x-input-error clss="mb-4" :messages="$errors->get('capacity')" class="mt-1 mb-4" />

                    </div>
                    <div class="mb-3">
                        <label for="price_per_km" class="form-label">Price Per 50 km*</label>
                        <x-text-input type="text" class="form-control  w-full" id="price_per_km" name="price_per_km" placeholder="Enter Price/Km" value="{{ $vehicle->price_per_km }}" />
                        <x-input-error clss="mb-4" :messages="$errors->get('price_per_km')" class="mt-1 mb-4" />

                    </div>
                    <div class="mb-3">
                        <x-input-label for="company_name" class="mt-2" value="{{ __('Vehicle Picture*') }}" />
                        <x-text-input type="file" class="form-control w-full mt-1" id="picture" name="picture" accept="image/jpg, image/jpeg, image/png" />
                        <x-input-error clss="mb-4" :messages="$errors->get('picture')" class="mt-1 mb-4" />
                    </div>
                    <!-- Add more input fields for other vehicle attributes as needed -->
                    <x-primary-button type="submit">Submit</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

