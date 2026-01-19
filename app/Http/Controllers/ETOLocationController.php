<?php



namespace App\Http\Controllers;

use App\Models\eto_location;
use App\Models\eto_name;
use Illuminate\Http\Request;

class ETOLocationController extends Controller {

    public function index() {

        $eto_location = eto_location::paginate(10);

        return view('ETO-location.index', compact('eto_location'));
    }

    public function create() {

        $eto_location = eto_location::get();
        return view('ETO-location.create',compact('eto_location'));
    }

    public function store(Request $request) {
        $location_id = $request->input('eto_location');

        $highest_eto_code = eto_name::where('eto_location_id', $location_id)
            ->max('eto_code');

        if ($highest_eto_code === null) {
            $eto_code = 1;
        } else {
            $eto_code = $highest_eto_code + 1;
        }

        $eto = new eto_name();
        $eto->eto_name = $request->input('eto_name');
        $eto->eto_location_id = $location_id;
        $eto->eto_code = $eto_code;
        $eto->date = now();
        $eto->save();

        return redirect()->back()
            ->with('success', 'ETO name created successfully.');
    }

}
