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


class ParallelTaxSyncController extends Controller
{

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
                'RegNo'   => 'required|string',
                'DistrictID' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            try {
                $registrationNo = $request->input('RegNo');


                return response()->json([
//                    'data' => $data,
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
