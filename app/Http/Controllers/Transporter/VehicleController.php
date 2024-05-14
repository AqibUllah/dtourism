<?php

namespace App\Http\Controllers\Transporter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
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
        Vehicle::create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'vehicle_type' => $request->vehicle_type,
            'capacity' => $request->capacity,
            'price_per_km' => $request->price_per_km,
            'transporter_id' => Auth::guard('transporter')->id(),
        ]);
        return redirect()->route('transporter.vehicles.index');
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
        return redirect()->route('transporter.vehicles.index');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('transporter.vehicles.index');
    }
}
