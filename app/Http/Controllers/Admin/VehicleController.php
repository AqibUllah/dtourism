<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{


    public function create()
    {
        return view('admin.vehicles.create');
    }


    public function store(Request $request)
    {

        $vehicle = new Vehicle();
        $vehicle->fill($request->all());
        $vehicle->save();


        return redirect()->route('transporter.dashboard')->with('success', 'Vehicle added successfully.');
    }


    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.vehicles.edit', compact('vehicle'));
    }


    public function update(Request $request, $id)
    {


        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());


        return redirect()->route('transporter.dashboard')->with('success', 'Vehicle updated successfully.');
    }


    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();


        return redirect()->route('transporter.dashboard')->with('success', 'Vehicle deleted successfully.');
    }
}
