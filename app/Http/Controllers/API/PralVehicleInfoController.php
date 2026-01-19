<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\conversion;
use App\Models\voucher_managment;
use App\Models\transfer_owner;
use App\Models\eto_location;
use App\Models\fuel_type;
use App\Models\manufacturer;
use App\Models\cities;
use App\Models\owner_type;
use App\Models\category_of_vehicle;
use App\Models\class_of_vehicle;
use App\Models\type_of_body;
use App\Models\vouchers_ids;
use App\Models\register;
use App\Models\cancellation;
use App\Models\reg_maker;
use App\Models\bill_transactions;
use App\Models\pral_vehicle_taxes;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Jobs\FetchVehicleInfo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Traits\VehicleTaxHelper;
use App\Traits\DateHelper;
use App\Traits\PralCategoryOfVehicleCode;


class PralVehicleInfoController extends Controller
{

    use VehicleTaxHelper, DateHelper, PralCategoryOfVehicleCode;

    public function __construct()
    {
        $this->middleware('authbasic');
    }

    public function betoVehicleInfo(Request $request)
    {
        // Get email and password from request headers
        $email = $request->header('Email');
        $password = $request->header('Pwd');

        // Predefined email and password
        $emailset = "exice.job.pk@etanb.com";
        $passwordset = "7?.id@Z[eH";

        // Check if email and password headers are present
        if (empty($email) || empty($password)) {
            // Headers are missing, return an "Unauthorized" response
            return response()->json([
                'message' => "Unauthorized",
                'status'  => 401,
            ]);
        }

        // Check if email and password from headers match predefined values
        if ($email === $emailset && $password === $passwordset) {
            $validator = Validator::make($request->all(), [
                'RegNo'      => 'required|string|exists:register,registration_no',
                'DistrictID' => 'required|integer|exists:eto_location,id',
            ],
                [
                    'RegNo.required'      => 'Registration number is required.',
                    'RegNo.string'        => 'Registration number must be a valid string.',
                    'RegNo.exists'        => 'This registration number does not exist for the selected district.',
                    'DistrictID.required' => 'District ID is required.',
                    'DistrictID.integer'  => 'District ID must be a number.',
                    'DistrictID.exists'   => 'The selected district does not exist in the system.',
                ]
            );

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            try {
                $registrationNo = $request->input('RegNo');
                $districtID = $request->input('DistrictID');

                // Fetch vehicle info
                $vehicleInfo = register::where('registration_no', $registrationNo)
                    ->leftJoin('eto_location', 'register.eto_location_id', '=', 'eto_location.id')
                    ->leftJoin('fuel_type', 'register.fuel_type_id', '=', 'fuel_type.id')
                    ->leftJoin('manufacturer', 'register.makers_name', '=', 'manufacturer.code')
                    ->leftJoin('owner_type', 'register.owner_type_id', '=', 'owner_type.id')
                    ->leftJoin('category_of_vehicle', 'register.category_of_vehicle_id', '=', 'category_of_vehicle.categ_code')
                    ->leftJoin('class_of_vehicle', 'register.class_of_vehicle_id', '=', 'class_of_vehicle.cov_code')
                    ->leftJoin('additional_attachment_trailer', 'register.registration_no', '=', 'additional_attachment_trailer.reg_no')
                    ->where('eto_location.id', $districtID)
                    ->first(['register.*', 'owner_type.owner_type', 'eto_location.eto_location as eto_location_name',
                        'fuel_type.id as fuel_type','fuel_type.fuel_type as fuel_type_name', 'category_of_vehicle.category_of_vehicle', 'manufacturer.manufacturer',
                        'class_of_vehicle.cov_code', 'class_of_vehicle.class_of_vehicle','additional_attachment_trailer.max_lan_weight']);

                if (!$vehicleInfo) {
                    return response()->json(['message' => "Vehicle not found", 'status' => 404]);
                }

                $makers_name = '';
                $r = reg_maker::where('eto_location_id', $vehicleInfo->eto_location_id)->where('reg_no', $vehicleInfo->registration_no)->first();
                if($r!=null) {
                    $m= manufacturer::where('eto_location_id', $vehicleInfo->eto_location_id)->where('code',$r->maker_code)->first();
                    if($m!=null) {
                        $makers_name = $m->manufacturer;
                    }
                } else {
                    $m= manufacturer::where('eto_location_id', $vehicleInfo->eto_location_id)->where('code',$vehicleInfo->makers_name)->first();

                    if ($m!=null){
                        $makers_name = $m->manufacturer;
                    }
                }

                // Fetch the latest transfer_owner info
                $transfer = transfer_owner::where('registration_no', $registrationNo)
                    ->where('eto_location_id', $districtID)
                    ->orderBy('transfer_code', 'desc')
                    ->orderByRaw('STR_TO_DATE(dates, "%Y-%m-%d %H:%i:%s") DESC')
                    ->orderByRaw('STR_TO_DATE(dates, "%m %d %Y %h:%i:%s %p") DESC')
                    ->first();

                $owner_name = $transfer->name ?? $vehicleInfo->name_;
                $owner_address = $transfer->c_address ?? $vehicleInfo->address;

                if ($transfer) {
                    if ($transfer->owner_type_id == 4) {
                        // Company: Prefer NTN, else fallback to CNICs
                        $owner_nic_or_ntn = !empty($transfer->ntn_no)
                            ? $transfer->ntn_no
                            : (!empty($transfer->new_cnic_no)
                                ? $transfer->new_cnic_no
                                : (!empty($transfer->old_cnic_no)
                                    ? $transfer->old_cnic_no
                                    : null));
                    } else {
                        // Individual: Prefer CNICs, fallback to null
                        $owner_nic_or_ntn = !empty($transfer->new_cnic_no)
                            ? $transfer->new_cnic_no
                            : (!empty($transfer->old_cnic_no)
                                ? $transfer->old_cnic_no
                                : null);
                    }
                } else {
                    if ($vehicleInfo->owner_type_id == 4) {
                        // Company: Prefer NTN, else fallback to CNICs
                        $owner_nic_or_ntn = !empty($vehicleInfo->ntn_no)
                            ? $vehicleInfo->ntn_no
                            : (!empty($vehicleInfo->new_cnic_no)
                                ? $vehicleInfo->new_cnic_no
                                : (!empty($vehicleInfo->old_cnic_no)
                                    ? $vehicleInfo->old_cnic_no
                                    : null));
                    } else {
                        // Individual: Prefer CNICs, fallback to null
                        $owner_nic_or_ntn = !empty($vehicleInfo->new_cnic_no)
                            ? $vehicleInfo->new_cnic_no
                            : (!empty($vehicleInfo->old_cnic_no)
                                ? $vehicleInfo->old_cnic_no
                                : null);
                    }
                }

                // Fetch the type of body info
                $type_of_body = type_of_body::where('tob_code', $vehicleInfo->type_of_body)->where('eto_location_id', $districtID)->first();

                $VehicleCategory = $this->getVehicleCategoryCode($type_of_body->pral_tax_code, $vehicleInfo->category_of_vehicle);
                $latestTaxDate = $this->getLatestPaidTaxDate($registrationNo, $districtID, $vehicleInfo->id);
//                $latestTaxDate = $this->parseFlexibleDate($vehicleInfo->last_tax_date ?? null);
                $registration_date = $this->parseFlexibleDate($vehicleInfo->registration_date ?? null);
                $invoiceDate = $this->parseFlexibleDate($vehicleInfo->invoice_date ?? null);


                $data = [
                    'RegId' => $vehicleInfo->id,
                    'VehicleSubType' => $VehicleCategory,
                    'Registration_no' => $vehicleInfo->registration_no,
                    'District' => $vehicleInfo->eto_location_name,
                    'DistrictCode' => $vehicleInfo->eto_location_id,
                    'VehiclePrice' => $vehicleInfo->vehicle_price ?? null,
                    'OwnerType' => $vehicleInfo->owner_type ?? null,
                    'OwnerName' => $owner_name,
                    'Address' => $owner_address,
                    'CategoryOfVehicle' => $vehicleInfo->category_of_vehicle,
                    'CategoryOfVehicleCode' => $vehicleInfo->category_of_vehicle == "COMMERCIAL" ? "1" : "2",
                    'ClassofVehicle' => $vehicleInfo->class_of_vehicle ?? null,
                    'ClassofVehicleCode' => $vehicleInfo->cov_code ?? null,
                    'FuelType' => $vehicleInfo->fuel_type,
                    'FuelTypeName' => $vehicleInfo->fuel_type_name,
                    'ACType' => $vehicleInfo->ac_type === 'AC' ? 1 : 0,
                    'BodyType' => $type_of_body ? $type_of_body->type_of_body : null,
                    'TOB_CODE' => $type_of_body ? $type_of_body->pral_tax_code : null,
                    'LadenWeight' => $vehicleInfo->laden_weight ?? $vehicleInfo->max_lan_weight,
                    'Make' => $makers_name,
                    'ModelYear' => $vehicleInfo->year_of_manufacture,
                    'EngineCC' => $vehicleInfo->engine_capacity,
                    'CNIC' => preg_replace('/\D/', '', $owner_nic_or_ntn),
                    'EngineNumber' => $vehicleInfo->engine_no,
                    'SeatingCapacity' => $vehicleInfo->seating_capacity,
                    'YearOfManufacture' => $vehicleInfo->year_of_manufacture,
                    'LastTaxPaidUpto' => $latestTaxDate,
                    'RegistrationDate' => $registration_date,
                    'InvoiceDate' => $invoiceDate,
                ];

                return response()->json([
                    'data' => $data,
                    'message' => "Vehicle Info",
                    'status' => 200,
                ]);
            } catch (\Throwable $th) {
                return response()->json(['status' => 500]);
            }
        } else {
            // Unauthorized because email and password don't match
            return response()->json([
                'message' => "Unauthorized: Invalid email or password",
                'status'  => 401,
            ]);
        }

    }
}
