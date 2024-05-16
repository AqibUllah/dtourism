
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Hotel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">

                <form action="{{ route('hotel_manager.hotels.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <x-input-label for="name" value="{{ __('Name*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="name" name="name" required value="{{ old('name') }}" placeholder="name" />
                        <x-input-error clss="mb-4" :messages="$errors->get('name')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="description" value="{{ __('Description') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="description" name="description" value="{{ old('description') }}" placeholder="description" />
                        <x-input-error clss="mb-4" :messages="$errors->get('description')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="category" class="mt-2" value="{{ __('Category*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="category" name="category" required value="{{ old('category') }}" placeholder="Enter category" />
                        <x-input-error clss="mb-4" :messages="$errors->get('category')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="city" class="mt-2" value="{{ __('City*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="city" name="city" required value="{{ old('city') }}"  placeholder="Enter city" />
                        <x-input-error clss="mb-4" :messages="$errors->get('city')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="street" class="mt-2" value="{{ __('Street*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="street" name="street" required value="{{ old('street') }}" placeholder="Enter street" />
                        <x-input-error clss="mb-4" :messages="$errors->get('street')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="hotelNo" class="mt-2" value="{{ __('Hotel No*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="hotelNo" name="hotelNo" required value="{{ old('hotelNo') }}" placeholder="Enter Hotel #" />
                        <x-input-error clss="mb-4" :messages="$errors->get('hotelNo')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="phone_no" class="mt-2" value="{{ __('Phone') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="phone_no" name="phone_no" value="{{ old('phone_no') }}" placeholder="Enter phone #" />
                        <x-input-error clss="mb-4" :messages="$errors->get('phone_no')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="email" class="mt-2" value="{{ __('email') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="email" name="email" required value="{{ old('email') }}" placeholder="Enter email" />
                        <x-input-error clss="mb-4" :messages="$errors->get('email')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="total_rooms" class="mt-2" value="{{ __('Total Rooms*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="total_rooms" name="total_rooms" required value="{{ old('total_rooms') }}" placeholder="Enter total rooms" />
                        <x-input-error clss="mb-4" :messages="$errors->get('total_rooms')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="available_rooms" class="mt-2" value="{{ __('Available Rooms*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="available_rooms" name="available_rooms" required value="{{ old('available_rooms') }}" placeholder="Enter available rooms" />
                        <x-input-error clss="mb-4" :messages="$errors->get('available_rooms')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="room_type" class="mt-2" value="{{ __('Room Type*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="room_type" name="room_type" required value="{{ old('room_type') }}" placeholder="Enter room type" />
                        <x-input-error clss="mb-4" :messages="$errors->get('room_type')" class="mt-1 mb-4" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="cost_per_day" class="mt-2" value="{{ __('cost_per_day*') }}" />
                        <x-text-input type="text" class="form-control w-full mt-1" id="cost_per_day" name="cost_per_day" required value="{{ old('cost_per_day') }}" placeholder="Enter cost / day" />
                        <x-input-error clss="mb-4" :messages="$errors->get('cost_per_day')" class="mt-1 mb-4" />
                    </div>
                    <!-- Add more input fields for other vehicle attributes as needed -->
                    <x-primary-button class="mt-4" type="submit">Submit</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

