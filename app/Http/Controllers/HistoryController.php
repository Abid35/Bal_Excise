<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;
use App\Models\old_to_new_rms;
use App\Models\transfer_owner;
use App\Models\eto_location;
use App\Models\type_of_body;
use App\Models\manufacturer;
use App\Models\reg_maker;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HistoryController extends Controller
{
    public function index()
    {
        $eto_location = eto_location::get();
        return view('History.index', compact('eto_location'));
    }

    public function store(Request $request)
    {
        try {
            $vehicle_no = strtoupper($request->input('vehicle_no'));
            $location = $request->input('location');

            $register = $this->getRegisterDetails($vehicle_no, $location);
            if (!$register) {
                return response()->json(['status' => false, 'message' => 'Vehicle not found.']);
            }

            $tob = $this->getBodyType($register->type_of_body, $location);
            $makers_name = $this->getMakersName($vehicle_no, $location, $register->makers_name);
            $current_owner = $this->getCurrentOwner($vehicle_no, $location);

            $vehicleInfo = [
                'vehicleNo'              => $register->registration_no,
                'ownerName'              => $current_owner->name ?? $register->name_,
                'address'                => $current_owner->address ?? $register->address,
                'bodyType'               => optional($tob)->type_of_body,
                'class'                  => $register->category_of_vehicle_name,
                'maker'                  => $makers_name,
                'yearOfManufacture'      => $register->year_of_manufacture,
                'chassisNo'              => $register->chassis_no,
                'engineNo'               => $register->engine_no,
                'seatCap'                => $register->seating_capacity,
                'engineCap'              => $register->engine_capacity,
                'dateOfRegister'         => $register->registration_date,
                'user_id'                => $register->user_id,
                'name_'                  => $register->name_,
                'father_or_husband_name'=> $register->father_or_husband_name,
                'address_'               => $register->address,
                'registration_date'      => $register->registration_date,
            ];

            $transfers = $this->getTransfers($register->id, $location);
            $owners = $this->getAllOwners($vehicle_no, $location);

            return response()->json([
                'vehicleInfo' => $vehicleInfo,
                'transfers'   => $transfers,
                'owners'      => $owners,
                'status'      => true,
            ]);

        } catch (\Exception $e) {
            \Log::error('Error in Vehicle History Fetch: ' . $e->getMessage());
            return response()->json(['status' => false, 'message' => 'An error occurred while fetching vehicle data.']);
        }
    }

    private function getRegisterDetails($vehicle_no, $location)
    {
        return register::query()
            ->join('category_of_vehicle', 'register.category_of_vehicle_id', '=', 'category_of_vehicle.categ_code')
            ->where([
                ['register.registration_no', $vehicle_no],
                ['register.eto_location_id', $location]
            ])
            ->select('register.*', 'category_of_vehicle.category_of_vehicle as category_of_vehicle_name')
            ->first();
    }

    private function getBodyType($type_code, $location)
    {
        return type_of_body::where([
            ['tob_code', $type_code],
            ['eto_location_id', $location]
        ])->first();
    }

    private function getMakersName($vehicle_no, $location, $fallbackMakerCode)
    {
        $maker = reg_maker::where('eto_location_id', $location)
            ->where('reg_no', $vehicle_no)
            ->first();

        $makerCode = $maker->maker_code ?? $fallbackMakerCode;

        return optional(
                manufacturer::where('eto_location_id', $location)
                    ->where('code', $makerCode)
                    ->first()
            )->manufacturer ?? '';
    }

    private function getCurrentOwner($vehicle_no, $location)
    {
        $maxTransferCode = transfer_owner::where([
            ['registration_no', $vehicle_no],
            ['eto_location_id', $location]
        ])->max('transfer_code');

        return transfer_owner::where([
            ['registration_no', $vehicle_no],
            ['eto_location_id', $location],
            ['transfer_code', $maxTransferCode]
        ])->latest('dates')->first();
    }

    private function getTransfers($register_id, $location)
    {
        return old_to_new_rms::where([
            ['reg_id', $register_id],
            ['eto_location_id', $location]
        ])->get();
    }

    private function getAllOwners($vehicle_no, $location)
    {
        return transfer_owner::where([
            ['registration_no', $vehicle_no],
            ['eto_location_id', $location]
        ])->orderBy('transfer_code')->get();
    }


//    public function store(Request $request)
//    {
//        try {
//            $vehicle_no = strtoupper($request->input('vehicle_no'));
//            $location = $request->input('location');
//
//            // Fetch vehicle details with joins
//            $register = register::query()
//                ->join('category_of_vehicle', 'register.category_of_vehicle_id', '=', 'category_of_vehicle.categ_code')
//                ->where([
//                    ['register.registration_no', $vehicle_no],
//                    ['register.eto_location_id', $location]
//                ])
//                ->select(
//                    'register.*',
//                    'category_of_vehicle.category_of_vehicle as category_of_vehicle_name'
//                )
//                ->first();
//
//
//            if (!$register) {
//                return response()->json(['status' => false, 'message' => 'Vehicle not found.']);
//            }
//
//            // Fetch tob
//            $tob = type_of_body::where([
//                ['tob_code', $register->type_of_body],
//                ['eto_location_id', $location]
//            ])->first();
//
//
//            $makers_name = '';
//            $r = reg_maker::where('eto_location_id', $location)->where('reg_no', $vehicle_no)->first();
//
//            if($r!=null) {
//                $m= manufacturer::where('eto_location_id', $location)->where('code',$r->maker_code)->first();
//                if($m!=null) {
//                    $makers_name = $m->manufacturer;
//                }
//            } else {
//                $m= manufacturer::where('eto_location_id', $location)->where('code',$register->makers_name)->first();
//
//                if ($m!=null){
//                    $makers_name = $m->manufacturer;
//                }
//            }
//
//
//            // Fetch latest owner details
//            $maxTransferCode = transfer_owner::where([
//                ['registration_no', $vehicle_no],
//                ['eto_location_id', $location]
//            ])
//                ->max('transfer_code');
//
//            $current_owner = transfer_owner::where([
//                ['registration_no', $vehicle_no],
//                ['eto_location_id', $location],
//                ['transfer_code', $maxTransferCode]
//            ])
//                ->latest('dates')
//                ->first();
//
//            // Assign owner details
//            $owner_name = optional($current_owner)->name ?? $register->name_;
//            $owner_address = optional($current_owner)->address ?? $register->address;
//
//            // Vehicle Information Array
//            $vehicleInfo = [
//                'vehicleNo'        => $register->registration_no,
//                'ownerName'        => $owner_name,
//                'address'          => $owner_address,
//                'bodyType'         => $tob->type_of_body,
//                'class'            => $register->category_of_vehicle_name,
//                'maker'            => $makers_name,
//                'yearOfManufacture'=> $register->year_of_manufacture,
//                'chassisNo'        => $register->chassis_no,
//                'engineNo'         => $register->engine_no,
//                'seatCap'          => $register->seating_capacity,
//                'engineCap'        => $register->engine_capacity,
//                'dateOfRegister'   => $register->registration_date,
//                'user_id'   => $register->user_id,
//                'name_'   => $register->name_,
//                'father_or_husband_name'   => $register->father_or_husband_name,
//                'address_'   => $register->address,
//                'registration_date'   => $register->registration_date,
//            ];
//
//            // Fetch Transfers & Owners
//            $transfers = old_to_new_rms::where([
//                ['reg_id', $register->id],
//                ['eto_location_id', $location]
//            ])
//
//                ->get();
//
//            $owners = transfer_owner::where([
//                ['registration_no', $vehicle_no],
//                ['eto_location_id', $location]
//            ])
//                ->orderBy('transfer_code', 'asc')
//                ->get();
//
//            return response()->json([
//                'vehicleInfo' => $vehicleInfo,
//                'transfers'   => $transfers,
//                'owners'      => $owners,
//                'status'      => true,
//            ]);
//
//        } catch (\Exception $e) {
//            \Log::error('Error in Vehicle History Fetch: ' . $e->getMessage());
//            return response()->json(['status' => false, 'message' => 'An error occurred while fetching vehicle data.']);
//        }
//    }

}
