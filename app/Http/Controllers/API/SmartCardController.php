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
use App\Models\colors;
use App\Models\type_of_body;
use App\Models\vouchers_ids;
use App\Models\register;
use App\Models\cancellation;
use App\Models\reg_maker;
use App\Models\bill_transactions;
use App\Models\SmartCardRequest;
use App\Models\class_of_vehicle;
use App\Models\additional_attachment_trailer;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Jobs\FetchVehicleInfo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Services\TransferOwnerService;



class SmartCardController extends Controller
{

    protected $transferOwnerService, $voucherService;

    public function __construct(TransferOwnerService $transferOwnerService,)
    {
        $this->middleware('authbasic');
         $this->transferOwnerService = $transferOwnerService;
    }

    public function index(Request $request)
    {
        // Get email and password from request headers
        $email = $request->header('Email');
        $password = $request->header('Pwd');

        // Predefined credentials
        $emailset = "exice.job.pk@etanb.com";
        $passwordset = "1_0&^f*&tL";

        // Check headers
        if (empty($email) || empty($password)) {
            return response()->json(['message' => "Unauthorized", 'status' => 401]);
        }

        // Verify credentials
        if ($email !== $emailset || $password !== $passwordset) {
            return response()->json(['message' => "Unauthorized: Invalid email or password", 'status' => 401]);
        }

        // Validate inputs
        $validator = Validator::make($request->all(), [
            'RegNo'      => 'required|string',
            'DistrictID' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $registrationNo = $request->input('RegNo');
            $districtID     = $request->input('DistrictID');

            // Fetch vehicle
            $vehicleInfos = register::where('registration_no', $registrationNo)
                ->where('eto_location_id', $districtID)
                ->select(
                    'id','registration_no','eto_location_id','fuel_type_id','class_of_vehicle_id',
                    'makers_name','City_id','owner_type_id','category_of_vehicle_id',
                    'type_of_body','engine_no','chassis_no','engine_capacity',
                    'year_of_manufacture','vehicle_price','new_cnic_no','old_cnic_no',
                    'name_','address','ntn_no','registration_date',
                    'number_of_cylinder','seating_capacity','laden_weight','color_of_vehicle_id',
                    'father_or_husband_name', 'house_no'
                )
                ->first();

            if (!$vehicleInfos) {
                return response()->json(['message' => 'No vehicles found', 'status' => 404]);
            }

            // Related data (optimized)
            $makers_name   = manufacturer::where('eto_location_id', $vehicleInfos->eto_location_id)
                    ->where('code', $vehicleInfos->makers_name)
                    ->value('manufacturer') ?? '';
                    
                     $r = reg_maker::where('eto_location_id', $vehicleInfos->eto_location_id)
            ->where('reg_no', $vehicleInfos->registration_no)
            ->first();

        if ($r) {
            $m = manufacturer::where('eto_location_id', $vehicleInfos->eto_location_id)
                ->where('code', $r->maker_code)
                ->first();
            if ($m) {
                $vehicleInfos->makers_name2 = $m->manufacturer;
            }
        } else {
            $m = manufacturer::where('eto_location_id', $vehicleInfos->eto_location_id)
                ->where('code', $vehicleInfos->makers_name)
                ->first();
            if ($m) {
                $vehicleInfos->makers_name2 = $m->manufacturer;
            }
        }
        

            $city_name     = cities::where('city_code', $vehicleInfos->City_id)->value('cities') ?? '';
            $color_name    = colors::where('id', $vehicleInfos->color_of_vehicle_id)->value('colors') ?? '';
            $owner_type    = owner_type::where('id', $vehicleInfos->owner_type_id)->value('owner_type') ?? '';

            $transfer = transfer_owner::leftJoin('owner_type', 'transfer.owner_type_id', '=', 'owner_type.id')
                ->leftJoin('cities', 'transfer.p_city', '=', 'cities.city_code')
                ->where('transfer.registration_no', $vehicleInfos->registration_no)
                ->where('transfer.eto_location_id', $vehicleInfos->eto_location_id)
                ->orderByDesc('transfer.transfer_code')
                ->first(['transfer.*','owner_type.owner_type','cities.cities']);

// Owner fields with fallback
            $owner_name        = $transfer ? ($transfer->name ?? null) : ($vehicleInfos->name_ ?? null);
            $owner_f_name      = $transfer ? ($transfer->f_name ?? null) : ($vehicleInfos->father_or_husband_name ?? null);
            $owner_address     = $transfer ? ($transfer->c_address ?? $transfer->p_address ?? null) : ($vehicleInfos->house_no ?? $vehicleInfos->address ?? null);
            $owner_ntn_no      = $transfer ? ($transfer->ntn_no ?? null) : ($vehicleInfos->ntn_no ?? null);
            $owner_cities      = $transfer ? ($transfer->cities ?? null) : ($city_name ?? null);
            $owner_owner_type  = $transfer ? ($transfer->owner_type ?? null) : ($owner_type ?? null);
            $owner_cnic        = $transfer
                ? ($transfer->new_cnic_no ?? $transfer->old_cnic_no ?? null)
                : ($vehicleInfos->new_cnic_no ?? $vehicleInfos->old_cnic_no ?? null);


            $type_of_body    = type_of_body::where('tob_code', $vehicleInfos->type_of_body)
                    ->where('eto_location_id', $vehicleInfos->eto_location_id)
                    ->value('type_of_body') ?? '';

            $category_of_vehicle = category_of_vehicle::where([
                    'categ_code'     => $vehicleInfos->category_of_vehicle_id,
                    'eto_location_id'=> $vehicleInfos->eto_location_id
                ])->value('category_of_vehicle') ?? '';

            $vehicle_type = $category_of_vehicle === "COMMERCIAL" ? 1 : 2;

            $eto_location  = eto_location::where('id', $vehicleInfos->eto_location_id)->value('eto_location') ?? null;
            $class_of_vehicle = class_of_vehicle::where([
                    'cov_code'       => $vehicleInfos->class_of_vehicle_id,
                    'eto_location_id'=> $vehicleInfos->eto_location_id
                ])->value('class_of_vehicle') ?? null;

           $additional_attachment_trailer = \App\Models\additional_attachment_trailer::where([
    'reg_no' => $vehicleInfos->registration_no,
    'eto_location_id' => $vehicleInfos->eto_location_id
])->first();

if (!$additional_attachment_trailer) {
    $additional_attachment_trailer = \App\Models\additional_attachment_trailer::where([
        'reg_id' => $vehicleInfos->id,
        'eto_location_id' => $vehicleInfos->eto_location_id
    ])->first();
}


            // Response data
            $data = [
                'id'                    => $vehicleInfos->id,
                'vehicle_type'          => $category_of_vehicle,
                'vehicle_type_id'       => $vehicle_type,
                'owner_name'            => $owner_name,
                'father_name'           => $owner_f_name,
                'cnic'                  => $owner_cnic,
                'ntn_number'            => $owner_ntn_no,
                'registration_number'   => $vehicleInfos->registration_no,
                'district_id'           => $vehicleInfos->eto_location_id,
                'district'              => $eto_location,
                'date_of_registration'  => $vehicleInfos->registration_date,
                'address'               => $owner_address,
                'type_of_body'          => $type_of_body,
                'chassis_number'        => $vehicleInfos->chassis_no,
                'engine_number'         => $vehicleInfos->engine_no,
                'number_of_cylinder'    => $vehicleInfos->number_of_cylinder,
                'class_of_vehicle'      => $class_of_vehicle,
                'seating_capacity'      => $vehicleInfos->seating_capacity,
                'maker'                 => $vehicleInfos->makers_name2,
                'model'                 => $vehicleInfos->year_of_manufacture,
                'laden_weight'          => $vehicleInfos->laden_weight,
                'engine_capacity'       => $vehicleInfos->engine_capacity,
                'year_of_manufacture'   => $vehicleInfos->year_of_manufacture,
                'color'                 => $color_name,
                // trailer attachment
                'max_lan_weight'        => $additional_attachment_trailer->max_lan_weight ?? null,
                'max_lan_weight_front_axle'  => $additional_attachment_trailer->max_lan_weight_front_axle ?? null,
                'max_lan_weight_rear_axle'   => $additional_attachment_trailer->max_lan_weight_rear_axle ?? null,
                'max_lan_weight_any_other_axle' => $additional_attachment_trailer->max_lan_weight_any_other_axle ?? null,
                'tyre_front_axle'       => $additional_attachment_trailer->tyre_front_axle ?? null,
                'tyre_rear_axle'        => $additional_attachment_trailer->tyre_rear_axle ?? null,
                'tyre_any_other_axle'   => $additional_attachment_trailer->tyre_any_other_axle ?? null,
            ];

            return response()->json(['data' => $data, 'status' => 200]);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'status' => 500]);
        }
    }

    public function fetchSmartCardFeePaidVehicles(Request $request)
    {
        $email = $request->header('Email');
        $password = $request->header('Pwd');

        $emailset = "exice.job.pk@etanb.com";
        $passwordset = "1_0&^f*&tL";

        // ✅ Basic Authorization
        if (empty($email) || empty($password)) {
            return response()->json([
                'message' => "Unauthorized",
                'status'  => 401,
            ]);
        }

        if ($email !== $emailset || $password !== $passwordset) {
            return response()->json([
                'message' => "Unauthorized: Invalid email or password",
                'status'  => 401,
            ]);
        }

        try {
            $perPage = $request->get('per_page', 50);
            $page = $request->get('page', 1);
            $districtId = $request->get('DistrictID'); // optional filter
            $userId = $request->get('EtoId');             // optional filter

            $query = DB::table('register')
                ->join('voucher_managment', 'register.registration_no', '=', 'voucher_managment.reg_no')
                ->join('voucher_ids', 'voucher_managment.id', '=', 'voucher_ids.voucher_id')
                ->where('voucher_managment.status_voucher', 'Paid')
                ->where('voucher_ids.fees_id', 27)
                ->where('register.is_smart_card', '!=', 1)
                ->select(
                    'register.registration_no as RegistrationNo',
                    'voucher_managment.user_id as EtoId',
                    'register.eto_location_id as DistricId',
                    'voucher_managment.challan_no as PSID',
                    'voucher_managment.date as Date'
                )
                ->distinct();

            // ✅ Apply optional filters
            if (!empty($districtId)) {
                $query->where('register.eto_location_id', $districtId);
            }

            if (!empty($userId)) {
                $query->where('voucher_managment.user_id', $userId);
            }

            // ✅ Pagination
            $vehicles = $query->paginate($perPage, ['*'], 'page', $page);

            if ($vehicles->isEmpty()) {
                return response()->json([
                    'message' => 'No vehicles found matching the criteria.',
                    'status' => 404,
                ]);
            }

            return response()->json([
                'message' => 'Smart card vehicles list retrieved successfully.',
                'status' => 200,
                'data' => $vehicles->items(),
                'pagination' => [
                    'current_page' => $vehicles->currentPage(),
                    'last_page' => $vehicles->lastPage(),
                    'per_page' => $vehicles->perPage(),
                    'total' => $vehicles->total(),
                ],
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Server error',
                'status' => 500,
                'error' => $th->getMessage(),
            ]);
        }
    }

    public function updateSmartCardStatus(Request $request)
    {
        $email = $request->header('Email');
        $password = $request->header('Pwd');

        $emailset = "exice.job.pk@etanb.com";
        $passwordset = "1_0&^f*&tL";

        if (empty($email) || empty($password)) {
            return response()->json([
                'message' => "Unauthorized",
                'status'  => 401,
            ]);
        }

        if ($email !== $emailset || $password !== $passwordset) {
            return response()->json([
                'message' => "Unauthorized: Invalid email or password",
                'status'  => 401,
            ]);
        }

        $registrationNo = $request->get('registration_no');
        $districId = $request->get('district_id');

        if (empty($registrationNo)) {
            return response()->json([
                'message' => 'Registration number is required.',
                'status' => 400,
            ]);
        }

        try {
            $updated = DB::table('register')
                ->where('registration_no', $registrationNo)
                ->where('eto_location_id', $districId)
                ->update(['is_smart_card' => 1]);

            if ($updated) {
                return response()->json([
                    'message' => 'Smart card status updated successfully.',
                    'status' => 200,
                    'registration_no' => $registrationNo,
                ]);
            }

            return response()->json([
                'message' => 'Vehicle not found or already updated.',
                'status' => 404,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Server error',
                'status' => 500,
                'error' => $th->getMessage(),
            ]);
        }
    }

    public function smartCards(Request $request)
    {
        $email = $request->header('Email');
        $password = $request->header('Pwd');

        $emailset = "exice.job.pk@etanb.com";
        $passwordset = "1_0&^f*&tL";

        if (empty($email) || empty($password)) {
            return response()->json([
                'message' => "Unauthorized",
                'status'  => 401,
            ]);
        }

        if ($email !== $emailset || $password !== $passwordset) {
            return response()->json([
                'message' => "Unauthorized: Invalid email or password",
                'status'  => 401,
            ]);
        }

        try {
            $pendingRequests = \DB::table('smart_card_requests as scr')
                ->join('register as v', 'scr.vehicle_id', '=', 'v.id')
                ->join('eto_location as e', 'scr.district_id', '=', 'e.id')
                ->where('scr.status', 'pending')
                ->select(
                    'scr.id as request_id',
                    'scr.reg_no',
                    'scr.status',
                    'scr.created_at as request_date',
//                    'e.eto_location',
//                    'v.chassis_no',
//                    'v.engine_no',
//                    'v.year_of_manufacture',
                    'scr.vehicle_snapshot'
                )
                ->orderBy('scr.created_at', 'desc')
                ->get();

            if ($pendingRequests->isEmpty()) {
                return response()->json([
                    'message' => 'No pending smart card requests found',
                    'status'  => 404
                ]);
            }

            return response()->json([
                'data'   => $pendingRequests,
                'status' => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status'  => 500
            ]);
        }
    }

    public function updateSmartCardRequestStatus(Request $request)
    {
        // --- Authorization ---
        $email = $request->header('Email');
        $password = $request->header('Pwd');

        $emailset = "exice.job.pk@etanb.com";
        $passwordset = "1_0&^f*&tL";

        if (empty($email) || empty($password)) {
            return response()->json([
                'message' => "Unauthorized",
                'status'  => 401,
            ]);
        }

        if ($email !== $emailset || $password !== $passwordset) {
            return response()->json([
                'message' => "Unauthorized: Invalid email or password",
                'status'  => 401,
            ]);
        }

        // --- Validation ---
        $validator = \Validator::make($request->all(), [
            'request_id' => 'required|integer|exists:smart_card_requests,id',
            'status'     => 'required|string|in:complete',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $updated = \DB::table('smart_card_requests')
                ->where('id', $request->request_id)
                ->update([
                    'status' => 'complete',
                    'updated_at' => now()
                ]);

            if (!$updated) {
                return response()->json([
                    'message' => 'No record updated',
                    'status'  => 404
                ]);
            }

            return response()->json([
                'message' => 'Smart card request marked as complete',
                'status'  => 200
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status'  => 500
            ]);
        }
    }

}
