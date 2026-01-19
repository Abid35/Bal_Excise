<?php

namespace App\Http\Controllers;

use App\Models\NumberPattern;
use App\Models\VanityPlate;
use Illuminate\Http\Request;
use App\Models\register;
use App\Models\new_owner;
use App\Models\regowner;
use App\Models\agreement1;
use App\Models\agreement2;
use App\Models\procurement;
use Carbon\Carbon;
use App\Models\transfer_owner;
use App\Models\UnregisteredNumber;
use App\Traits\VehicleNumberGenerate;

use Auth;

class TransferController extends Controller
{
    use VehicleNumberGenerate;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = transfer_owner::where('eto_location_id', auth()->user()->eto_location_id)->latest('id')->paginate(15);

        return view('Transfer.Transfer', ['data' => $data]);
    }

    public function create()
    {
        $patterns = NumberPattern::get();
        return view('Transfer.add_Transfer', compact('patterns'));

    }

    public function store(Request $request)
    {
        $arr = $request->all();

        // Convert RegNo to uppercase once
        if (isset($arr['RegNo'])) {
            $arr['RegNo'] = strtoupper($arr['RegNo']);
        }

        // Step 1: Find vehicle in register
        $data = register::where('registration_no', $arr['RegistrationNo'])
            ->where('eto_location_id', $arr['DivisionID'])
            ->first();

        $isUnregistered = false;
        $unregisterNumber = null;

        // Step 2: If not in register, check unregistered_numbers
        if (!$data) {
            $unregisterNumber = UnregisteredNumber::where('registration_no', $arr['RegistrationNo'])
                ->where('eto_name', Auth::user()->id)
                ->whereNull('expired_at')
                ->first();

            if ($unregisterNumber) {
                $isUnregistered = true;
            }
        }

        // Step 3: Vehicle not found anywhere
        if (!$data) {
            return response()->json([
                'Status' => false,
                'Message' => 'Vehicle not found in register or unregistered records.'
            ]);
        }

        // Step 4: Handle manual or auto registration
        if ($arr['reg_option'] == "manual") {

            $validator = Validator::make($request->all(), [
                'RegNo' => 'required',
                'DivisionID' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['Status' => false, 'errors' => $validator->errors()]);
            }

            // Check if number exists in vanity number plate or register
            $existsInVanity = VanityPlate::where('registration_no', $arr['RegNo'])->exists();
            $existsInRegister = register::where('registration_no', $arr['RegNo'])->exists();

            if ($existsInVanity || $existsInRegister) {
                return response()->json([
                    'Status' => false,
                    'Message' => 'Vanity number cannot be transferred. This registration number already exists.'
                ]);
            }

        } else {
            // Auto-generate number
            $nextNumber = $this->generate(
                $data->type_of_body,
                $data->eto_location_id,
                $arr['NewOwnerTypeID'],
            );

            if (!$nextNumber) {
                return response()->json([
                    'Status' => false,
                    'Message' => 'Unable to generate registration number.'
                ]);
            }

            $arr['RegNo'] = $nextNumber;
        }

        // Step 5: Prepare owner info
        $OwnerTypeID = $arr['NewOwnerTypeID'];
        $name_ = $arr['NewOwnerName'];
        $ntn = $arr['NewOwnerCnic'] ?? null;
        $father_or_husband_name = $arr['NewOwnerGuardian'] ?? null;
        $old_cnic_no = $arr['NewOwnerOldCnic'] ?? null;
        $new_cnic_no = $arr['NewOwnerCnic'] ?? null;

        // Joint ownership: take first owner for register table
        if (str_contains($arr['NewOwnerName'], ',') && $OwnerTypeID == "3") {
            $OwnerName = explode(",", $arr['NewOwnerName']);
            $OldCNIC = explode(",", $arr['NewOwnerOldCnic']);
            $NewCNIC = explode(",", $arr['NewOwnerCnic']);
            $FatherHusband = explode(",", $arr['NewOwnerGuardian']);

            $name_ = $OwnerName[0];
            $father_or_husband_name = $FatherHusband[0] ?? null;
            $old_cnic_no = $OldCNIC[0] ?? null;
            $new_cnic_no = $NewCNIC[0] ?? null;
        }

        // Find how many times this chassis was registered before
        $ownershipCount = register::where('chassis_no', $data->chassis_no)->count();
        $ownershipStatus = $ownershipCount + 1;


        // Step 6: Store new owner details directly into register
        register::create([
            'user_id' => Auth::user()->id,
            'eto_location_id' => $data->eto_location_id ?? $arr['DivisionID'],
            'eto_name_id' => $data->eto_name_id ?? null,
            'Jurisdiction_id' => $arr['DivisionID'],
            'no_assign_type' => $data->no_assign_type ?? null,
            'vehicle_price' => $data->vehicle_price ?? null,
            'book_serialNo' => $data->book_serialNo ?? null,
            'owner_type_id' => $OwnerTypeID,
            'title' => $arr['NewOwnerTitleID'] ?? $data->title,
            'name_' => $name_,
            'father_or_husband_name' => $father_or_husband_name,
            'old_cnic_no' => $old_cnic_no,
            'new_cnic_no' => $new_cnic_no,
            'ntn_no' => $ntn,
            'house_no' => $arr['NewOwnerHouseNo'] ?? $data->house_no,
            'Province_id' => $arr['NewOwnerProvinceID'] ?? $data->Province_id,
            'City_id' => $arr['NewOwnerCityID'] ?? $data->City_id,
            'category_of_vehicle_id' => $data->category_of_vehicle_id ?? null,
            'type_of_body' => $data->type_of_body ?? null,
            'class_of_vehicle_id' => $data->class_of_vehicle_id ?? null,
            'makers_name' => $data->makers_name ?? null,
            'year_of_manufacture' => $data->year_of_manufacture ?? null,
            'chassis_no' => $data->chassis_no ?? null,
            'engine_no' => $data->engine_no ?? null,
            'number_of_cylinder' => $data->number_of_cylinder ?? null,
            'seating_capacity' => $data->seating_capacity ?? null,
            'engine_capacity' => $data->engine_capacity ?? null,
            'unladen_weight' => $data->unladen_weight ?? null,
            'unladen_unit' => $data->unladen_unit ?? null,
            'laden_weight' => $data->laden_weight ?? null,
            'laden_unit' => $data->laden_unit ?? null,
            'color_of_vehicle_id' => $data->color_of_vehicle_id ?? null,
            'registration_no' => $arr['RegNo'],
            'ownership_status' => $ownershipStatus,
            'remarks' => $data->remarks ?? null,
            'secondregistration_date' => $data->secondregistration_date ?? null,
            'registration_date' => $data->registration_date ?? null,
            'fuel_type_id' => $data->fuel_type_id ?? null,
            'trailer_vehicle' => $data->trailer_vehicle ?? null,
            'wheelbox' => $data->wheelbox ?? null,
            'invoice_date' => $data->invoice_date ?? null,
            'government_department' => $data->government_department ?? null,
            'ac_type' => $data->ac_type ?? null,
            'active_status' => "InProcess",
            'dates' => Carbon::now(),
            'tr_date' => Carbon::now(),
        ]);

        // Step 7: Mark unregistered vehicle as assigned if applicable
        if ($isUnregistered && $unregisterNumber) {
            $unregisterNumber->update([
                'is_assigned' => true
            ]);
        }

        return response()->json([
            'Status' => true,
            'Message' => 'Transfer stored as new registration.'
        ]);
    }




    public function store2321(Request $request)
    {

        $OwnerName = [];
        $OldCNIC = [];
        $NewCNIC = [];
        $FatherHusband = [];
        $name_ = null;
        $ntn = null;
        $father_or_husband_name = null;
        $old_cnic_no = null;
        $new_cnic_no = null;

        $arr = $request->all();

        // ✅ STEP 1: Check if vehicle exists in register
        $data = register::where('registration_no', $arr['RegistrationNo'])
            ->where('eto_location_id', $arr['DivisionID'])
            ->first();

        $isUnregistered = false;

        // ✅ STEP 2: If not in register, check unregistered_numbers
        if (!$data) {
            $data = UnregisteredNumber::where('registration_no', $arr['RegistrationNo'])
                ->where('eto_name', \Illuminate\Support\Facades\Auth::user()->id)
                ->whereNull('expired_at')
                ->first();

            if ($data) {
                $isUnregistered = true;
            }
        }

        // ✅ STEP 3: If not found anywhere
        if (!$data) {
            return response()->json([
                'Status' => false,
                'Message' => 'Vehicle not found in register or unregistered records.'
            ]);
        }

        // ✅ STEP 4: Delete previous transfer if editing
        if (isset($arr['Record_id']) && $arr['Record_id'] != "") {
            $d = transfer_owner::find($arr['Record_id']);
            if ($d) $d->delete();
        }

        // ✅ STEP 5: Prepare owner info
        $OwnerTypeID = $arr['NewOwnerTypeID'];

        if ($OwnerTypeID == "2") {
            $name_ = $arr['NewOwnerName'];
        } elseif ($OwnerTypeID == "4") {
            $name_ = $arr['NewOwnerName'];
            $ntn = $arr['NewOwnerCnic'];
        } else {
            $name_ = $arr['NewOwnerName'];
            $father_or_husband_name = $arr['NewOwnerGuardian'] ?? $arr['FatherHusband'] ?? null;
            $old_cnic_no = $arr['NewOwnerOldCnic'];
            $new_cnic_no = $arr['NewOwnerCnic'];
        }

        // ✅ STEP 6: Handle joint ownership
        if (str_contains($arr['NewOwnerName'], ',')) {
            if ($OwnerTypeID == "3") {
                $OwnerName = explode(",", $arr['NewOwnerName']);
                $OldCNIC = explode(",", $arr['NewOwnerOldCnic']);
                $NewCNIC = explode(",", $arr['NewOwnerCnic']);
                $FatherHusband = explode(",", $arr['NewOwnerGuardian']);

                // Delete previous owners if vehicle registered
                if (!$isUnregistered) {
                    regowner::where('reg_id', $data->id)->delete();
                }

                $name_ = $OwnerName[0];
                $father_or_husband_name = $FatherHusband[0];
                $old_cnic_no = $OldCNIC[0];
                $new_cnic_no = $NewCNIC[0];

                foreach ($OwnerName as $i => $owner) {
                    if (!$isUnregistered) {
                        regowner::create([
                            'reg_id' => $data->id,
                            'name' => $owner,
                            'old_cnic_no' => $OldCNIC[$i] ?? null,
                            'new_cnic_no' => $NewCNIC[$i],
                            'father_or_husband_name' => $FatherHusband[$i],
                        ]);
                    }
                }
            }
        }

//        $dd( $isUnregistered ? null : $data->id);
        // ✅ STEP 7: Create transfer record
        $f = [
            'reg_id' => $data->id,
            'user_id' => Auth::user()->id,
            'eto_name_id' => $data->eto_name_id ?? null,
            'jurisdiction_id' => $arr['DivisionID'],
            'registration_no' => $arr['RegistrationNo'],
            'owner_type_id' => $arr['NewOwnerTypeID'] ?? null,
            'owner_title_id' => $arr['NewOwnerTitleID'] ?? null,
            'name' => $name_,
            'old_cnic_no' => $old_cnic_no,
            'new_cnic_no' => $new_cnic_no,
            'ntn_no' => $ntn,
            'f_name' => $father_or_husband_name,
            'p_address' => $arr['NewOwnerHouseNo'] ?? null,
            'p_province' => $arr['NewOwnerProvinceID'] ?? null,
            'p_city' => $arr['NewOwnerCityID'] ?? null,
            'p_phone' => $arr['NewOwnerMobile'] ?? null,
            'transfer_date' => $arr['TransferDate'],
            'transfer_code' => $arr['TranferCode'],
            'dates' => Carbon::now(),
            'eto_location_id' => $data->eto_location_id ?? $arr['DivisionID']
        ];

        $data4 = transfer_owner::create($f);

        // ✅ STEP 8: If unregistered vehicle transferred first time, mark as assigned
        if ($isUnregistered) {
            $data->update([
                'is_assigned' => true
            ]);
        } else {
            // If registered, mark transfer code/status
            $data->update([
                'transfer_code' => $arr['TranferCode'],
                'transfer_status' => 0
            ]);
        }

        return response()->json(['Status' => true]);
    }


    public function store_backup(Request $request)
    {
        $OwnerName = [];
        $OldCNIC = [];
        $NewCNIC = [];
        $FatherHusband = [];
        $name_ = null;
        $ntn = null;

        $father_or_husband_name = null;
        $old_cnic_no = null;
        $new_cnic_no = null;

        $arr = $request->all();

        $data = register::where('registration_no', $arr['RegistrationNo'])->where('eto_location_id', $arr['DivisionID'])->first();


        if (isset($arr['Record_id'])) {
            if ($arr['Record_id'] != "") {
                $d = transfer_owner::find($arr['Record_id']);
                if ($d != null) {

                    $d->delete();
                }

            }
        }


        $OwnerTypeID = $arr['NewOwnerTypeID'];


        if ($OwnerTypeID == "2") {

            $name_ = $arr['NewOwnerName'];


        } else if ($OwnerTypeID == "4") {

            $name_ = $arr['NewOwnerName'];
            $ntn = $arr['NewOwnerCnic'];

        } else if ($OwnerTypeID == "3") {

            if (!str_contains($arr['NewOwnerName'], ',')) {

                $name_ = $arr['NewOwnerName'];
                $father_or_husband_name = $arr['FatherHusband'];
                $old_cnic_no = $arr['NewOwnerOldCnic'];
                $new_cnic_no = $arr['NewOwnerCnic'];
            }
        } else if ($OwnerTypeID == "1") {
            $d = regowner::where('reg_id', $data->id)->get();
            if ($d != null) {
                foreach ($d as $x) {
                    $x->delete();
                }
            }
            $name_ = $arr['NewOwnerName'];
            $father_or_husband_name = $arr['NewOwnerGuardian'];
            $old_cnic_no = $arr['NewOwnerOldCnic'];
            $new_cnic_no = $arr['NewOwnerCnic'];

        } else {
            $d = regowner::where('reg_id', $data->id)->get();
            if ($d != null) {
                foreach ($d as $x) {
                    $x->delete();
                }
            }
            $name_ = $arr['NewOwnerName'];
            $father_or_husband_name = $arr['NewOwnerGuardian'];
            $old_cnic_no = $arr['NewOwnerOldCnic'];
            $new_cnic_no = $arr['NewOwnerCnic'];
        }


        if (str_contains($arr['NewOwnerName'], ',')) {

            if ($OwnerTypeID == "3") {


                $OwnerName = explode(",", $arr['NewOwnerName']);
                $OldCNIC = explode(",", $arr['NewOwnerOldCnic']);
                $NewCNIC = explode(",", $arr['NewOwnerCnic']);
                $FatherHusband = explode(",", $arr['NewOwnerGuardian']);


                $d = regowner::where('reg_id', $data->id)->get();
                if ($d != null) {
                    foreach ($d as $x) {
                        $x->delete();
                    }
                }

                $name_ = $OwnerName[0];
                $father_or_husband_name = $FatherHusband[0];
                $old_cnic_no = $OldCNIC[0];
                $new_cnic_no = $NewCNIC[0];


                for ($i = 0; $i < count($OwnerName); $i++) {


                    $data4 = regowner::create([
                        'reg_id' => $data->id,
                        'name' => $OwnerName[$i],
                        'old_cnic_no' => $OldCNIC[$i] == null ? null : $OldCNIC[$i],
                        'new_cnic_no' => $NewCNIC[$i],
                        'father_or_husband_name' => $FatherHusband[$i],

                    ]);
                }


            }
        }

        $f = [
            'reg_id' => $data->id,
            'user_id' => Auth::user()->id,
            'eto_name_id' => $data->eto_name_id,
            'jurisdiction_id' => $arr['DivisionID'],
            'registration_no' => $arr['RegistrationNo'],
            'owner_type_id' => $arr['NewOwnerTypeID'] == null ? null : $arr['NewOwnerTypeID'],
            'owner_title_id' => $arr['NewOwnerTitleID'] == null ? null : $arr['NewOwnerTitleID'],
            'name' => $name_ == null ? null : $name_,
            'old_cnic_no' => $arr['NewOwnerOldCnic'] == null ? null : $arr['NewOwnerOldCnic'],
            'new_cnic_no' => $arr['NewOwnerCnic'] == null ? null : $arr['NewOwnerCnic'],
            'ntn_no' => $ntn == null ? null : $ntn,
            'f_name' => $father_or_husband_name == null ? null : $father_or_husband_name,
            'p_address' => $arr['NewOwnerHouseNo'] == null ? null : $arr['NewOwnerHouseNo'],
            'p_province' => $arr['NewOwnerProvinceID'] == null ? null : $arr['NewOwnerProvinceID'],
            'p_city' => $arr['NewOwnerCityID'] == null ? null : $arr['NewOwnerCityID'],
            'p_phone' => $arr['NewOwnerMobile'] == null ? null : $arr['NewOwnerMobile'],
            'transfer_date' => $arr['TransferDate'],
            'transfer_code' => $arr['TranferCode'],
            'dates' => Carbon::now(),
            'eto_location_id' => $data->eto_location_id

        ];
        $data4 = transfer_owner::create($f);

        $data = register::where('registration_no', $arr['RegistrationNo'])->where('eto_location_id', $arr['DivisionID'])->first();


        $dd = [

            'transfer_code' => $arr['TranferCode'],
            'transfer_status' => 0
        ];

        $data->update($dd);


        return response()->json(['Status' => true]);

    }

    public function edit($id)
    {
        return view('Procurement.add_Procurement')->with('id', $id);
    }

    public function destroy($id)
    {
        $d = procurement::find($id);
        if ($d != null) {
            $at = agreement1::where('procurement_id', $id)->first();
            $aa = agreement2::where('procurement_id', $id)->first();
            $ow = new_owner::where('procurement_id', $id)->get();
            if ($at != null) {
                $at->delete();

            }
            if ($aa != null) {
                $aa->delete();
            }
            if ($ow != "[]") {
                foreach ($ow as $o) {
                    $o->delete();
                }

            }
            $d->delete();

        }
        return redirect()->back();
    }
}
