<?php

namespace App\Http\Controllers;

use App\Models\category_of_vehicle;
use App\Models\NumberPattern;
use App\Models\eto_location;
use App\Models\type_of_body;
use App\Traits\VehicleNumberGenerate;
use Illuminate\Http\Request;
use App\Helpers\NumberGenerator;
use Illuminate\Support\Facades\Auth;


class NumberPatternController extends Controller
{
    use VehicleNumberGenerate;

    public function index()
    {
        $patterns = NumberPattern::with(['typeOfBody', 'district'])
            ->orderBy('id', 'desc')
            ->get();

        return view('NumberPatterns.index', compact('patterns'));
    }


    public function create()
    {
        $district = eto_location::all();
        $tob = type_of_body::where('eto_location_id', Auth::user()->eto_location_id)->get();

        return view('NumberPatterns.create', compact('tob', 'district'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        // Merge is_government
        $request->merge([
            'is_government' => $request->has('is_government') ? 1 : 0,
        ]);

        // Validate
        $request->validate([
            'start_prefix' => 'required|string|max:10',
            'end_prefix'   => 'required|string|max:10',
            'start_no'     => 'required|integer|min:1',
            'end_no'       => 'required|integer|gte:start_no',
            'type'         => $request->is_government ? 'nullable' : 'required',
            'district_id'  => $request->is_government ? 'nullable' : 'required',
            'is_active'    => 'boolean',
        ], [
            'type.required' => 'Please select a type of body.',
            'district_id.required' => 'Please select a district.',
        ]);

        NumberPattern::create($request->all());

        return redirect()->route('number_patterns.index')->with('success', 'Number pattern created successfully!');
    }



    public function edit($id)
    {
        $pattern = NumberPattern::findOrFail($id);
        $district = eto_location::all();
        $tob = type_of_body::where('eto_location_id', Auth::user()->eto_location_id)->get();

        return view('NumberPatterns.edit', compact('pattern', 'tob','district'));
    }

    public function update(Request $request, NumberPattern $number_pattern)
    {
        $request->merge([
            'is_government' => $request->has('is_government') ? 1 : 0,
        ]);

        // Validation
        $request->validate([
            'start_prefix' => 'required|string|max:10',
            'end_prefix'   => 'required|string|max:10',
            'start_no'     => 'required|integer|min:1',
            'end_no'       => 'required|integer|gte:start_no',
            'type' => $request->is_government
                ? 'nullable'
                : [
                    'required',
                    \Illuminate\Validation\Rule::unique('number_patterns')
                        ->ignore($number_pattern->id) // update ke case mein ignore current record
                        ->where(function ($query) use ($request) {
                            $query->where('district_id', $request->district_id);
                        }),
                ],

            'district_id'     => $request->is_government ? 'nullable' : 'required',
            'is_active'    => 'boolean',
        ], [
            'type.unique' => 'This type is already assigned to another number pattern.',
        ]);

        $number_pattern->update($request->all());

        return redirect()->route('number_patterns.index')->with('success', 'Number pattern updated successfully!');
    }


    public function destroy(NumberPattern $number_pattern)
    {
        $number_pattern->delete();
        return redirect()->route('number_patterns.index')->with('success', 'Number pattern deleted successfully!');
    }

    public function generateNumber($patternId)
    {
        $nextNumber = $this->generate($patternId);

        if (!$nextNumber) {
            return response()->json(['success' => false, 'message' => 'No available number in this range!']);
        }

        return response()->json(['success' => true, 'number' => $nextNumber]);
    }

    public function getTypeOfBody(Request $request)
    {
        $bodies = type_of_body::where('eto_location_id', $request->district_id)->get();
        return response()->json($bodies);
    }


}
