<?php

namespace App\Http\Controllers\HotelManager;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\traits\Image;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HotelController extends Controller
{
    use Image;
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $hotels = Hotel::all();
        return view('hotel_manager.hotels.index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('hotel_manager.hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string', 'max:255'],
            'category' => ['required'],
            'city' => ['required', 'string'],
            'street' => ['required', 'string'],
            'hotelNo' => ['required', 'numeric'],
            'phone_no' => ['required', 'string'],
            'email' => ['required', 'string','email'],
            'total_rooms' => ['required', 'numeric'],
            'available_rooms' => ['required', 'numeric'],
            'room_type' => ['required', 'string','max:255'],
            'cost_per_day' => ['required', 'string'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        if($request->hasFile('image'))
        {
            $image = $this->uploadImage($request->file('image'),'uploads/hotels');
        }else{
            $image = "";
        }

        Hotel::create([
            'name' => $request->name,
            'description' => $request->description,
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
            'image' => $image,
        ]);

        return redirect()->route('hotel_manager.hotels.index')->with(['success' => 'New hotel created!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hotel = Hotel::find($id);
        if(!$hotel){
            return redirect()->back()->with(['error' => 'Hotel Not Found']);
        }
        return view('hotel_manager.hotels.show',compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hotel = Hotel::find($id);
        if(!$hotel){
            return redirect()->back()->with(['error' => 'Hotel Not Found']);
        }

        return view('hotel_manager.hotels.edit',compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hotel = Hotel::find($id);
        if(!$hotel){
            return redirect()->back()->with(['error' => 'Hotel Not Found']);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string', 'max:255'],
            'category' => ['required'],
            'city' => ['required', 'string'],
            'street' => ['required', 'string'],
            'hotelNo' => ['required', 'numeric'],
            'phone_no' => ['required', 'string'],
            'email' => ['required', 'string','email'],
            'total_rooms' => ['required', 'numeric'],
            'available_rooms' => ['required', 'numeric'],
            'room_type' => ['required', 'string','max:255'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        $hotel->update($request->all());

        if($request->hasFile('image'))
        {
            $hotel->image = $this->uploadImage($request->file('image'),'uploads/hotels');
            $hotel->save();
        }

        return redirect()->route('hotel_manager.hotels.index')->with(['success' => 'Hotel has been updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel = Hotel::find($id);
        if(!$hotel){
            return redirect()->back()->with(['error' => 'Hotel Not Found']);
        }

        $hotel->delete();
        return redirect()->back()->with(['success' => 'Hotel has been deleted!']);
    }
}
