<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class TransporterDashboardController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('dashboard.index', compact('vehicles'));
    }

    public function vehicles()
    {
        $vehicles = Vehicle::all();
        return view('dashboard.vehicles.index', compact('vehicles'));
    }

    public function createVehicle()
    {
        return view('dashboard.vehicles.create');
    }

    public function storeVehicle(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            // Add validation rules for other fields as needed
        ]);

        Vehicle::create($request->all());
        
        return redirect()->route('vehicles')->with('success', 'Vehicle added successfully.');
    }

    public function editVehicle($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('dashboard.vehicles.edit', compact('vehicle'));
    }

    public function updateVehicle(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            // Add validation rules for other fields as needed
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());

        return redirect()->route('vehicles')->with('success', 'Vehicle updated successfully.');
    }

    public function destroyVehicle($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->route('vehicles')->with('success', 'Vehicle deleted successfully.');
    }
}
