
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('create Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <form id="bookingForm" method="POST" action="{{ route('customer.bookings.store') }}">
                    @csrf


                    <div id="hotelBooking" style="margin-bottom: 20px;">
                        <h3>Book Hotel</h3>
                        <x-input-label for="hotel_name" class="mt-2" :value="__('Hotel Name')" />
                        <x-text-input id="hotel_name" placeholder="hotel name" class="block mt-1 w-full" type="text" name="hotel_name" required />

                        <x-input-label for="hotel_check_in" class="mt-2" :value="__('Hotel Check In')" />
                        <x-text-input id="hotel_check_in" placeholder="hotel check in date" class="block mt-1 w-full" type="date" name="hotel_check_in" required />

                        <x-input-label for="hotel_check_out" class="mt-2" :value="__('hotel Check Out')" />
                        <x-text-input id="hotel_check_out" placeholder="hotel check out date" class="block mt-1 w-full" type="date" name="hotel_check_out" required  />

                    </div>


                    <div id="transportBooking" class="my-2" style="display: none;margin-top: 5px;">
                        <h3 class="my-2">Book Transport</h3>
                        <x-text-input id="transport_type" placeholder="transport type" class="block mt-1 w-full" type="text" name="transport_type"  required  />
                        <x-text-input id="transport_date" placeholder="transport date" class="block mt-1 w-full" type="date" name="transport_date"  required  />
                    </div>

                    <div id="tourGuideBooking" style="display: none;margin-top: 5px;">
                        <h3 class="my-2">Book Tour Guide</h3>
                        <x-text-input id="tour_guide_name" placeholder="Tour Guide Name" class="block mt-1 w-full" type="text" name="tour_guide_name" required  />
                        <x-text-input id="tour_guide_date" placeholder="Date" class="block mt-1 w-full" type="date" name="tour_guide_date" required  />
                    </div>

                    <div style="margin-bottom: 20px;display: flex;" class="w-100">
                        <x-danger-button class="ms-3" type="button" class="addMore" data-target="transportBooking">
                            {{ __('Add Transport') }}
                        </x-danger-button>
                        <x-secondary-button class="ms-3" type="button" class="addMore" data-target="tourGuideBooking">
                            {{ __('Add Tour Guide') }}
                        </x-secondary-button>

                        <x-primary-button class="ms-3" type="submit">
                            {{ __('Submit Booking') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addMoreButtons = document.querySelectorAll('.addMore');

            addMoreButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const targetSection = document.getElementById(targetId);
                    const newBooking = targetSection.cloneNode(true);
                    document.getElementById('bookingForm').appendChild(newBooking);
                    newBooking.style.display = 'block';
                });
            });
        });
    </script>
</x-app-layout>>
