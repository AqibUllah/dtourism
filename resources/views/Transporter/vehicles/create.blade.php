
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
                        <x-input-label for="company_name" value="{{ __('Company Name*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="company_name" name="company_name" required value="{{ old('company_name') }}" placeholder="company name" />
                        <x-input-error clss="mb-4" :messages="$errors->get('company_name')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="company_name" class="mt-2" value="{{ __('Email*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="email" name="email" required value="{{ old('email') }}" placeholder="Enter email" />
                        <x-input-error clss="mb-4" :messages="$errors->get('email')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="company_name" class="mt-2" value="{{ __('Phone*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="phone" name="phone" required value="{{ old('phone') }}"  placeholder="Enter phone" />
                        <x-input-error clss="mb-4" :messages="$errors->get('phone')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="company_name" class="mt-2" value="{{ __('City*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="city" name="city" required value="{{ old('city') }}" placeholder="Enter city" />
                        <x-input-error clss="mb-4" :messages="$errors->get('city')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="company_name" class="mt-2" value="{{ __('EmaVehicle Type*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="vehicle_type" name="vehicle_type" required value="{{ old('vehicle_type') }}" placeholder="Enter type" />
                        <x-input-error clss="mb-4" :messages="$errors->get('vehicle_type')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="company_name" class="mt-2" value="{{ __('Vehicle Capacity*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="capacity" name="capacity" required value="{{ old('capacity') }}" placeholder="Enter capacity" />
                        <x-input-error clss="mb-4" :messages="$errors->get('capacity')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="company_name" class="mt-2" value="{{ __('Vehicle Price / KM*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="price_per_km" name="price_per_km" required value="{{ old('price_per_km') }}" placeholder="Enter Price/Km" />
                        <x-input-error clss="mb-4" :messages="$errors->get('price_per_km')" class="mt-1 mb-4" />
                    </div>
                    <!-- Add more input fields for other vehicle attributes as needed -->
                    <x-primary-button class="mt-4" type="submit">Submit</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

