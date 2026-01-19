<?php

namespace App\Http\Controllers;

use App\Models\eto_location;
use App\Models\type_of_body;
use App\Models\category_of_vehicle;
use Illuminate\Http\Request;

class CategoryOfVehicleController extends Controller {

    public function create() {

        $eto_location = eto_location::get();
        return view('CategoryOfVehicle.create',compact('eto_location'));
    }

    public function store(Request $request) {
        $location_id = $request->input('eto_location');

        $highest_eto_code = category_of_vehicle::where('eto_location_id', $location_id)
            ->max('categ_code');

        if ($highest_eto_code === null) {
            $eto_code = 1;
        } else {
            $eto_code = $highest_eto_code + 1;
        }

        $jurisdiction = new category_of_vehicle();
        $jurisdiction->categ_code = $eto_code;
        $jurisdiction->category_of_vehicle = $request->input('category_of_vehicle_id');
        $jurisdiction->eto_location_id = $location_id;
        $jurisdiction->tax_code = $eto_code;
        $jurisdiction->save();

        return redirect()->back()
            ->with('success', 'Category Of Vehicle created successfully.');
    }

}
