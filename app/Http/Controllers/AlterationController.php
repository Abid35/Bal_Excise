<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\eto_location;
use App\Models\eto_name;
use App\Models\type_of_body;
use App\Models\source_of_procurement;
use App\Models\route_permit;
use App\Models\register;
use App\Models\reg_maker;
use App\Models\province;
use App\Models\owner_type;
use App\Models\new_owner;
use App\Models\manufacturer;
use App\Models\jurisdiction;
use App\Models\issuing_authority;
use App\Models\fuel_type;
use App\Models\colors;
use App\Models\class_of_vehicle;
use App\Models\cities;
use App\Models\category_of_vehicle;
use App\Models\book_issue;
use App\Models\bank_branch;
use App\Models\bank;
use App\Models\years;
use App\Models\owner_title;
use App\Models\registration_marks;
use App\Models\units;
use App\Models\eunits;
use App\Models\application_type;
use App\Models\agreement1;
use App\Models\agreement2;
use App\Models\additional_trailer_vehicle;
use App\Models\additional_attachment_trailer;
use App\Models\procurement;
use App\Models\alteration;
use App\Models\old_to_new_rms;
use App\Services\TransferOwnerService;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AlterationController extends Controller
{
    protected $transferOwnerService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TransferOwnerService $transferOwnerService)
    {
        $this->middleware('auth');
        $this->transferOwnerService = $transferOwnerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {


        $data = alteration::where('eto_location_id', auth()->user()->eto_location_id)->latest('id')->paginate(15);

        return view('Alteration.Alteration', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return view('Alteration.add_alteration')->with('alter_c', "");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */


    public function store(Request $request)
    {
        $arr = $request->all();

        // Check if the registration number already exists
        $reg_check = register::where('eto_location_id', $arr['DivisionID'])
            ->where('registration_no', $arr['newNumber'])
            ->first();

        if ($reg_check) {
            return response()->json(['Status' => false, 'msg' => 'Register number already exists']);
        }

        DB::beginTransaction();

        try {
            // Create a new alteration record
            $alterationData = [
                'user_id' => Auth::id(),
                'eto_name_id' => $arr['ETO_CODE'],
                'jurisdiction_id' => $arr['Division'],
                'eto_location_id' => $arr['DivisionID'],
                'registration_no' => $arr['RegistrationNo'],
                'alteration_code' => $arr['ALT_CODE'],
                'chassis_no' => $arr['ChasisNo'],
                'color_of_vehicle_id' => $arr['NewColorID'],
                'fuel_type_id' => $arr['NewFuelID'],
                'engine_no' => $arr['NewEngineNo'],
                'engine_capacity' => $arr['newCC'],
                'seating_capacity' => $arr['NewSeatingID'],
                'class_of_vehicle_id' => $arr['NewClassID'] ?? null,
                'front_axle' => $arr['NewFrontAxle'],
                'rear_axle' => $arr['NewRearAxle'],
                'any_other_axle' => $arr['NewAnyOtherAxle'],
                'unladen_unit' => $arr['newunit'],
                'unladen_weight' => $arr['newladen'],
                'alteration_date' => $arr['AlterationDate'],
                'tr_date' => Carbon::now(),
                'dates' => Carbon::now(),
            ];

            $alteration = alteration::create($alterationData);

            // Create old-to-new RMS record
            if ($arr['NewETO'] || $arr['newDivision'] || $arr['newNumber']) {
                old_to_new_rms::create([
                    'user_id' => Auth::id(),
                    'alteration_id' => $alteration->id,
                    'old_eto_name_id' => $arr['ETO_CODE'],
                    'old_jurisdiction_id' => $arr['Division'],
                    'old_reg_no' => $arr['RegistrationNo'],
                    'new_eto_name_id' => $arr['NewETO'],
                    'new_jurisdiction_id' => $arr['newDivision'],
                    'new_reg_no' => $arr['newNumber'],
                    'reg_id' => $arr['reg_id'],
                    'dates' => Carbon::now(),
                    'eto_location_id' => $arr['DivisionID'],
                ]);
            }

            // Update the register table
            $register = register::find($arr['reg_id']);

            if ($register) {
                $data = $this->transferOwnerService->processTransferOwnerData($register);

                $reg_maker = reg_maker::where([
                    'reg_no' => $arr['RegistrationNo'],
                    'eto_location_id' => $arr['DivisionID']
                ])->first();

                unset($register->color_name);
                unset($register->eto_location_name);

                $register->update([
                    'color_of_vehicle_id' => $arr['NewColorID'] ?: $register->color_of_vehicle_id,
                    'fuel_type_id' => $arr['NewFuelID'] ?? $register->fuel_type_id,
                    'engine_no' => $arr['NewEngineNo'] ?? $register->engine_no,
                    'engine_capacity' => $arr['newCC'] ?? $register->engine_capacity,
                    'seating_capacity' => $arr['NewSeatingID'] ?? $register->seating_capacity,
                    'class_of_vehicle_id' => $arr['NewClassID'] ?? $register->class_of_vehicle_id,
                    'eto_name_id' => $arr['NewETO'] ?? $register->eto_name_id,
                    'jurisdiction_id' => $arr['newDivision'] ?? $register->jurisdiction_id,
                    'registration_no' => $arr['newNumber'] ?? $register->registration_no,
                    'name_' => $data['name_'],
                    'father_or_husband_name' => $data['father_or_husband_name'],
                    'alt_status' => 0,
                    'makers_name' => $reg_maker->maker_code ?? $register->makers_name,
                    'laden_unit' => $arr['newunit'] ?? $register->laden_unit,
                    'laden_weight' => $arr['newladen'] ?? $register->laden_weight,
                ]);

            }

            // Update additional trailer vehicle
            $trailerVehicle = additional_trailer_vehicle::where('reg_no', $arr['RegistrationNo'])
                ->where('eto_location_id', $arr['DivisionID'])
                ->first();

            if ($trailerVehicle) {
                $trailerVehicle->update([
                    'front_axle' => $arr['NewFrontAxle'] ?: $trailerVehicle->front_axle,
                    'rear_axle' => $arr['NewRearAxle'] ?: $trailerVehicle->rear_axle,
                    'any_other_axle' => $arr['NewAnyOtherAxle'] ?: $trailerVehicle->any_other_axle,
                ]);
            }

            // Update additional attachment trailer
            $attachmentTrailer = additional_attachment_trailer::where('reg_no', $arr['RegistrationNo'])
                ->where('eto_location_id', $arr['DivisionID'])
                ->first();

            if ($attachmentTrailer) {
                $attachmentTrailer->update([
                    'max_lan_weight_unit' => $arr['newunit'] ?: $attachmentTrailer->max_lan_weight_unit,
                    'max_lan_weight' => $arr['newladen'] ?: $attachmentTrailer->max_lan_weight,
                ]);
            }

            DB::commit();

            return response()->json(['Status' => true]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Alteration Store Error:', ['error' => $e->getMessage(), 'line' => $e->getLine()]);
            return response()->json(['Status' => false, 'msg' => 'Something went wrong, please try again later.']);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('Alteration.add_alteration')->with('id', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update($id, Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

        $d = alteration::find($id);

        if ($d != null) {
            $d->delete();

        }
        return redirect()->back();
    }
}
