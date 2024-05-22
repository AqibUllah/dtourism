<?php

namespace App\Http\Controllers\Transporter;

use App\Http\Controllers\Controller;
use App\traits\Image;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    use Image;
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('transporter.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('transporter.vehicles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'phone' => 'required|string|min:6',
            'city' => 'required|string|max:255',
            'vehicle_type' => 'required|string|max:255',
            'capacity' => 'required|string|max:255',
            'price_per_km' => 'required|string|max:255',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        if($request->hasFile('picture'))
        {
            $picture = $this->uploadImage($request->file('picture'),'uploads/vehicles');
        }else{
            $picture = "";
        }

        Vehicle::create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'vehicle_type' => $request->vehicle_type,
            'picture' => $picture,
            'capacity' => $request->capacity,
            'price_per_km' => $request->price_per_km,
            'transporter_id' => Auth::guard('transporter')->id(),
        ]);
        return redirect()->route('transporter.vehicles.index')->with(['success' => 'New vehicle has been created']);
    }

    public function show(Vehicle $vehicle)
    {
        return view('transporter.vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('transporter.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());

        if($request->hasFile('picture')){
            $request->validate([
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);
            $this->deleteImage($vehicle->picture);
            $vehicle->picture = $this->uploadImage($request->file('picture'),'uploads/vehicles');
            $vehicle->save();
        }

        return redirect()->route('transporter.vehicles.index');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        $this->deleteImage($vehicle->picture);
        return redirect()->route('transporter.vehicles.index');
    }
}
