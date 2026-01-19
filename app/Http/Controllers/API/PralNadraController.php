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
use App\Models\type_of_body;
use App\Models\vouchers_ids;
use App\Models\register;
use App\Models\cancellation;
use App\Models\reg_maker;
use App\Models\bill_transactions;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Jobs\FetchVehicleInfo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class PralNadraController extends Controller
{

    public function __construct()
    {
        $this->middleware('authbasic');
    }

    public function index(Request $request)
    {
        $email = $request->header('Email');
        $password = $request->header('Pwd');

        $emailset = "exice.job.pk@etanb.com";
        $passwordset = "7!&-p23t#nB";

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
                'start_date'   => 'required',
                'end_date' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            try {
                $startDate = $request->input('start_date');
                $endDate = $request->input('end_date');

                $formattedStartDate = Carbon::createFromFormat('m-d-Y', $startDate)->format('Y-m-d');
                $formattedEndDate = Carbon::createFromFormat('m-d-Y', $endDate)->format('Y-m-d');

                // Fetch distinct registration numbers within the given date range
                $vehicleInfos = register::whereBetween('registration_date', [$formattedStartDate, $formattedEndDate])
                    ->where('active_status', 'Active')
                    ->select('registration_no', 'eto_location_id')
                    ->distinct()
                    ->paginate(20);

                if ($vehicleInfos->isEmpty()) {
                    return response()->json(['message' => 'No vehicles found', 'status' => 404]);
                }

                $data = [];
                foreach ($vehicleInfos as $vehicleInfo) {
                    // Fetch full register data
                    $vehicle = register::where('registration_no', $vehicleInfo->registration_no)
                        ->where('eto_location_id', $vehicleInfo->eto_location_id)
                        ->first();

                    // Defaults
                    $owner_cnic = $vehicle->new_cnic_no ?? $vehicle->old_cnic_no;
                    $owner_name = $vehicle->name_;
                    $owner_address = $vehicle->address;
                    $owner_ntn_no = $vehicle->ntn_no;
                    $owner_cities = cities::where('city_code', $vehicle->City_id)->value('cities') ?? '';
                    $owner_owner_type = owner_type::where('id', $vehicle->owner_type_id)->value('owner_type') ?? '';


                    // Fetch eto_location separately
                    $eto_location_name = eto_location::where('id', $vehicle->eto_location_id)->value('eto_location') ?? '';

                    // Fetch fuel_type separately
                    $fuel_type = fuel_type::where('id', $vehicle->fuel_type_id)->value('id') ?? '';

                    // Fetch manufacturer separately
                    $makers_name = manufacturer::where('eto_location_id', $vehicle->eto_location_id)
                            ->where('code', $vehicle->makers_name)
                            ->value('manufacturer') ?? '';



                    // Fetch city separately
                    $city_name = cities::where('city_code', $vehicle->City_id)->value('cities') ?? '';

                    // Fetch owner type separately
                    $owner_type = owner_type::where('id', $vehicle->owner_type_id)->value('owner_type') ?? '';

                    // Fetch category of vehicle separately
                    $category_name = category_of_vehicle::where('categ_code', $vehicle->category_of_vehicle_id)
                            ->value('category_of_vehicle') ?? '';

                    // Fetch transfer owner data
                    $transfers = transfer_owner::leftJoin('owner_type', 'transfer.owner_type_id', '=', 'owner_type.id')
                        ->leftJoin('cities', 'transfer.p_city', '=', 'cities.city_code')
                        ->where(function ($query) use ($vehicle) {
                            $query->where('transfer.registration_no', $vehicle->registration_no)
                                ->orWhere('transfer.reg_id', $vehicle->reg_id);
                        })
                        ->where('transfer.eto_location_id', $vehicle->eto_location_id)
                        ->orderBy('transfer.transfer_code', 'desc')
                        ->get();

                    $transferData = [];

                    foreach ($transfers as $transfer) {
                        $transferData[] = [
                            'OwnerName' => $transfer->name,
                            'OwnerFatherName' => $transfer->f_name,
                            'OwnerAddress' => $transfer->p_address ?? $transfer->c_address,
                            'OwnerNTN' => $transfer->ntn_no,
                            'City' => $transfer->cities,
                            'OwnerType' => $transfer->owner_type,
                            'OwnerCNIC' => $transfer->new_cnic_no ?? $transfer->old_cnic_no,
                            'TransferDate' => $transfer->transfer_date ?? null,
                        ];
                    }

                    // Fetch type of body separately
                    $type_of_body = type_of_body::where('tob_code', $vehicle->type_of_body)
                            ->where('eto_location_id', $vehicle->eto_location_id)
                            ->value('type_of_body') ?? '';

                    $data[] = [
                        'OwnerCNIC' => $owner_cnic,
                        'OwnerName' => $owner_name,
                        'OwnerNTN' => $owner_ntn_no,
                        'OwnerAddress' => $owner_address,
                        'City' => $owner_cities,
                        'RegistrationNo' => $vehicle->registration_no,
                        'OwnershipDate' => $vehicle->registration_date,
                        'TransferDate' => $transfer->transfer_date ?? null,
                        'EngineNo' => $vehicle->engine_no,
                        'ChassisNo' => $vehicle->chassis_no,
                        'EngineCapacity' => $vehicle->engine_capacity,
                        'Model' => $vehicle->year_of_manufacture,
                        'Maker' => $makers_name,
                        'CategoryName' => $category_name,
                        'VehicleType' => $type_of_body,
                        "Transfers" => $transferData
                    ];
                }

                return response()->json(['data' => $data, 'status' => 200]);
            } catch (\Throwable $th) {
                return response()->json(['message' => $th->getMessage(), 'status' => 500]);
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
