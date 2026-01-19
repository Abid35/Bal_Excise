<?php

namespace App\Http\Controllers;

use App\Models\eto_location;
use App\Models\VanityPlate;
use Illuminate\Http\Request;

class VanityPlateController extends Controller
{
    public function index()
    {
        $vanityPlates = VanityPlate::with('district')->latest()->paginate(10);
        $district = eto_location::all();

        return view('Vanity.index', compact('vanityPlates','district'));
    }


    public function create()
    {
        $district = eto_location::all();
        return view('Vanity.create', compact('district'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'owner_identifier' => 'required|numeric',
            'plate_number' => 'required|string|unique:vanity_plates,plate_number,NULL,id,district_id,' . $request->district_id,
            'vehicle_number' => 'nullable|string|unique:vanity_plates,vehicle_number,NULL,id,district_id,' . $request->district_id,
            'design_type' => 'nullable|string',
            'additional_requirements' => 'nullable|string',
            'cost' => 'nullable|numeric|min:0',
            'district_id' => 'required|exists:eto_location,id',
        ]);

        VanityPlate::create([
            'owner_identifier' => $request->owner_identifier,
            'plate_number' => strtoupper($request->plate_number),
            'vehicle_number' => strtoupper($request->vehicle_number),
            'design_type' => $request->design_type,
            'additional_requirements' => $request->additional_requirements,
            'cost' => $request->cost,
            'district_id' => $request->district_id,
            'status' => 'pending',
        ]);

        return redirect()->route('vanity.index')->with('success', 'Vanity plate created successfully.');
    }



    public function edit($id)
    {
        $plate = VanityPlate::findOrFail($id);
        $district = eto_location::all();
        return view('Vanity.edit', compact('plate', 'district'));
    }


    public function update(Request $request, VanityPlate $vanity)
    {
        $request->validate([
            'plate_number' => 'required|string|unique:vanity_plates,plate_number,' . $vanity->id . ',id,district_id,' . $request->district_id,
            'vehicle_number' => 'nullable|string|unique:vanity_plates,vehicle_number,' . $vanity->id . ',id,district_id,' . $request->district_id,
            'design_type' => 'nullable|string',
            'additional_requirements' => 'nullable|string',
            'cost' => 'nullable|numeric|min:0',
            'district_id' => 'required|exists:eto_location,id',
            'status' => 'nullable|in:pending,approved,rejected,issued',
        ]);

        $vanity->update([
            'plate_number' => strtoupper($request->plate_number),
            'vehicle_number' => strtoupper($request->vehicle_number),
            'design_type' => $request->design_type,
            'additional_requirements' => $request->additional_requirements,
            'cost' => $request->cost,
            'district_id' => $request->district_id,
            'status' => $request->status ?? $vanity->status,
        ]);

        return redirect()->route('vanity.index')->with('success', 'Vanity plate updated successfully.');
    }



    public function destroy(VanityPlate $vanity)
    {
        $vanity->delete();
        return redirect()->route('vanity.index')->with('success', 'Vanity plate deleted successfully.');
    }
}
