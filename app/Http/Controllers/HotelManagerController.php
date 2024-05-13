<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelManager;
use Illuminate\Support\Facades\Auth;

class HotelManagerController extends Controller
{
    public function showRegistrationForm()
    {
        return view('hotelmanager.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:hotel_managers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $manager = HotelManager::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::guard('hotelmanager')->login($manager);

        return redirect()->route('home');
    }

    public function showLoginForm()
    {
        return view('hotelmanager.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('hotelmanager')->attempt($credentials)) {
            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('hotelmanager')->logout();

        return redirect()->route('home');
    }
    public function createHotel(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'hotelNo' => 'required|string|max:255',
            'phone_no' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'total_rooms' => 'required|integer',
            'available_rooms' => 'required|integer',
            'room_type' => 'required',
            'cost_per_day' => 'required|numeric',
        ]);

        $hotel = new Hotel([
            'name' => $request->name,
            'category' => $request->category,
            'city' => $request->city,
            'street' => $request->street,
            'hotelNo' => $request->hotelNo,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'total_rooms' => $request->total_rooms,
            'available_rooms' => $request->available_rooms,
            'room_type' => $request->room_type,
            'cost_per_day' => $request->cost_per_day,
            // Add more fields as needed
        ]);

        Auth::user()->hotels()->save($hotel);

        return redirect()->route('home')->with('success', 'Hotel added successfully.');
    }
    public function show($id)
    {
        // Find hotel by ID
        $hotel = Hotel::findOrFail($id);

        // Return view with hotel details
        return view('hotels.show', compact('hotel'));
    }

    // Show form for editing a hotel
    public function edit($id)
    {
        // Find hotel by ID
        $hotel = Hotel::findOrFail($id);

        // Return view with hotel details for editing
        return view('hotels.edit', compact('hotel'));
    }

    // Update a specific hotel
    public function update(Request $request, $id)
    {
        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|integer',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'hotelNo' => 'required|string|max:255',
            'phone_no' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'total_rooms' => 'required|integer',
            'available_rooms' => 'required|integer',
            'room_type' => 'required|integer',
            'cost_per_day' => 'required|numeric',
        ]);

        // Find hotel by ID
        $hotel = Hotel::findOrFail($id);

        // Update hotel details
        $hotel->fill($validatedData);
        $hotel->save();

        // Redirect with success message
        return redirect()->route('hotels.index')->with('success', 'Hotel updated successfully.');
    }

    // Delete a specific hotel
    public function destroy($id)
    {
        // Find hotel by ID and delete
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        // Redirect with success message
        return redirect()->route('hotels.index')->with('success', 'Hotel deleted successfully.');
    }
}
