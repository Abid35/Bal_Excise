<?php

namespace App\Http\Controllers;

use App\Models\eto_location;
use App\Models\type_of_body;
use App\Models\category_of_vehicle;
use Illuminate\Http\Request;

class TypeofBodyController extends Controller {

    public function create() {

        $eto_location = eto_location::get();
        $category_of_vehicle = category_of_vehicle::get();
        return view('TypeofBody.create',compact('eto_location', 'category_of_vehicle'));
    }

    public function store(Request $request) {
        $location_id = $request->input('eto_location');

        $highest_eto_code = type_of_body::where('eto_location_id', $location_id)
            ->max('tob_code');

        if ($highest_eto_code === null) {
            $eto_code = 1;
        } else {
            $eto_code = $highest_eto_code + 1;
        }

        $jurisdiction = new type_of_body();
        $jurisdiction->tob_code = $eto_code;
        $jurisdiction->type_of_body = $request->input('type_of_body');
        $jurisdiction->category_of_vehicle_id = $request->input('category_of_vehicle_id');
        $jurisdiction->eto_location_id = $location_id;
        $jurisdiction->tax_code = 0;
        $jurisdiction->save();

        return redirect()->back()
            ->with('success', 'Type Of Body created successfully.');
    }

}
