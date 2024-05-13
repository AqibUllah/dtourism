<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class BookingController extends Controller
{

    public function create():View
    {
        return view('customer.bookings.create');
    }

    public function store(Request $request)
    {
        return $request->all();
    }
    public function bookHotel(Request $request, Hotel $hotel)
    {
        $validatedData = $request->validate([
        ]);

        $booking = new Booking();
        $booking->customer_id = auth()->user()->id;
        $booking->bookable_type = 'App\Models\Hotel';
        $booking->bookable_id = $hotel->id;
        $booking->booking_date = now();
        $booking->save();


    }

    public function bookTransport(Request $request, Transport $transport)
    {
        $validatedData = $request->validate([
          ]);

         $booking = new Booking();
        $booking->customer_id = auth()->user()->id;
        $booking->bookable_type = 'App\Models\Transport';
        $booking->bookable_id = $transport->id;
        $booking->booking_date = now();
        $booking->save();

        // Redirect or return response
    }

    public function bookTourGuide(Request $request, TourGuide $tourGuide)
    {
        $validatedData = $request->validate([
            ]);

        $booking = new Booking();
        $booking->customer_id = auth()->user()->id;
        $booking->bookable_type = 'App\Models\TourGuide';
        $booking->bookable_id = $tourGuide->id;
        $booking->booking_date = now();
        $booking->save();

        // Redirect or return response
    }
}
