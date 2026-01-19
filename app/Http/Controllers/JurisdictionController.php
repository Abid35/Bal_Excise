<?php

namespace App\Http\Controllers;

use App\Models\eto_location;
use App\Models\jurisdiction;
use Illuminate\Http\Request;

class JurisdictionController extends Controller {

    public function create() {

        $eto_location = eto_location::get();
        return view('Jurisdiction.create',compact('eto_location'));
    }

    public function store(Request $request) {
        $location_id = $request->input('eto_location');

        $highest_eto_code = jurisdiction::where('eto_location_id', $location_id)
            ->max('Jurisdiction_code');

        if ($highest_eto_code === null) {
            $eto_code = 1;
        } else {
            $eto_code = $highest_eto_code + 1;
        }

        $jurisdiction = new jurisdiction();
        $jurisdiction->Jurisdiction_code = $eto_code;
        $jurisdiction->Jurisdiction = $request->input('jurisdiction_name');
        $jurisdiction->dates = now();
        $jurisdiction->tr_flag = 2;
        $jurisdiction->eto_location_id = $location_id;
        $jurisdiction->save();

        return redirect()->back()
            ->with('success', 'Jurisdiction name created successfully.');
    }

}
