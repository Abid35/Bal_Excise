<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
use App\Traits\VehicleTaxHelper;


class APIController extends Controller
{
    use VehicleTaxHelper;

    public function __construct()
    {
        $this->middleware('authbasic');
    }
    public function inquiry( Request $request)
    {
        $data=[];
        $validator = Validator::make($request->all(), [
            'consumer_number'   => 'required|max:24',
            'bank_mnemonic'     => 'required|max:8',
        ]);

        if ($validator->fails()) {

           return response()->json($validator->errors(), 400);
        }

        try {

            $data  =  bill_transactions::where('consumer_number', $request->input('consumer_number'))
            ->select('consumer_Detail', 'bill_status','due_date','amount_within_dueDate', 'amount_after_dueDate','billing_month' , 'date_paid' , 'amount_paid' , 'tran_auth_Id' ,'reserved' )
            ->first();


            if($data!=null)
            {
                $data->toArray();

                $data->response_Code= "00";
                $res= 200;

            }
            else
            {
                $data=[];
                $data['response_Code']= "01";
                $res= 404;
            }



        } catch (\Throwable $th) {
                $data['response_Code']= "03";
                $res= 500;
        }


        return response()->json( $data , $res);
    }

    public function payment( Request $request)
    {
        $data=[];


        $validator = Validator::make($request->all(), [
            'consumer_number'   => 'required|max:24',
            'tran_auth_id'      =>'required|max:6',
            'transaction_amount' =>'required|max:13',
            'tran_date'         =>'required|max:8',
            'tran_time'         =>'required|max:6',
            'bank_mnemonic'     => 'required|max:8',
        ]);

        if ($validator->fails()) {

            return response()->json($validator->errors(), 400);
         }

         try {

            $value= $request->all();
            $data = bill_transactions::where('consumer_number' , $request->input('consumer_number'))
            ->where('tran_auth_id', $request->input('tran_auth_id'))
            ->where('tran_date', $request->input('tran_date'))
            ->where('tran_time' , $request->input('tran_time'))->first();

            if($data==null)
            {
                $save = bill_transactions::where('consumer_number' , $request->input('consumer_number'))->where('bill_status' , 'U')
                        ->first();

                if($save==null)
                {
                    $data=[];
                    $data['response_Code']= "01";
                    $res= 404;
                }
                else
                {
                    if($save->tran_auth_id==null)
                    {
                        $val=$request->all();
                        $val->bill_status="P";
                        $save->update($val);
                        $data=$save->toArray();
                        $data=[
                            'response_Code'=> "00",
                            'Identification_parameter'=> $data['Identification_parameter'],
                            'reserved'=> $data['reserved']
                        ];
                        $res=200;
                    }

                }


            }
            else
            {
                $data=[];
                $data['response_Code']= "03";
                $res= 400;
            }



        } catch (\Throwable $th) {
                $data['response_Code']= "02";
                $res= 500;
        }


        return response()->json( $data , $res);


    }

    public function bank_challan( Request $request)
    {
        $data=[];
        $validator = Validator::make($request->all(), [
            'challan_no'   => 'required|max:24',
        ]);

        if ($validator->fails()) {

            return response()->json($validator->errors(), 400);
        }

        try {

            $voucher =  voucher_managment::where('challan_no', $request->input('challan_no'))->first();

            if (!empty($voucher)){
                $taxes  =  vouchers_ids::where('voucher_id', $voucher->id)->get();
                $amount  =  vouchers_ids::where('voucher_id', $voucher->id)->sum('amount');
                $voucher->taxes = $taxes;
                $voucher->total_amount = $amount;
                if($voucher!=null)
                {
                    $data['data'] = $voucher;
                    $data['response_Code']= "00";
                    $data['status']= 200;

                }
                else
                {
                    $data=[];
                    $data['response_Code']= "01";
                    $data['status']= 404;
                }

            }else{
                $data=[];
                $data['response_Code']= "02";
                $data['message']= "Voucher no does not exist!";
                $data['status']= 404;
            }

        } catch (\Throwable $th) {
//            $data['response_Code']= "03";
            $data['status']= 500;
        }

        return response()->json($data);
    }

    public function customerVoucher(Request $request)
    {
        // Get email and password from request headers
        $email = $request->header('Email');
        $password = $request->header('Pwd');

        // Predefined email and password
        $emailset = "admin@etanb.com";
        $passwordset = "etanb123";

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
            // Email and password match, you can proceed with your logic here
            $validator = Validator::make($request->all(), [
                'psid'   => 'required|max:24',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            try {
                $voucher = voucher_managment::where('challan_no', $request->input('psid'))->first();

                if (!$voucher) {
                    return response()->json([
                        'message' => "Voucher no does not exist!",
                        'status'  => 404,
                    ]);
                }

                $taxes  =  vouchers_ids::where('voucher_id', $voucher->id)->get();
                $amount  =  vouchers_ids::where('voucher_id', $voucher->id)->sum('amount');
                $voucher->taxes = $taxes;
                $voucher->total_amount = $amount;

                return response()->json([
                    'data'    => $voucher,
                    'status'  => 200,
                ]);
            } catch (\Throwable $th) {
                return response()->json(['status' => 500]);
            }
        } else {
            // Unauthorized because email and password don't match
            return response()->json([
                'message' => "Unauthorized",
                'status'  => 401,
            ]);
        }
    }

    public function customerVoucherStatus(Request $request)
    {
        // Get email and password from request headers
        $email = $request->header('Email');
        $password = $request->header('Pwd');

        // Predefined email and password
        $emailset = "admin@etanb.com";
        $passwordset = "etanb123";

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
            // Email and password match, you can proceed with your logic here
            $validator = Validator::make($request->all(), [
                'psid'   => 'required|max:24',
                'status' => ['required', 'max:24', Rule::in(['Paid'])],

            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            try {
                $voucher = voucher_managment::where('challan_no', $request->input('psid'))->first();

                if (!$voucher) {
                    return response()->json([
                        'message' => "Voucher no does not exist!",
                        'status'  => 404,
                    ]);
                }

                if ($voucher->status_voucher == 'Paid'){
                    return response()->json([
                        'message' => "This voucher already paid!",
                        'status'  => 201,
                    ]);
                }

                // Update the status
                $voucher->status_voucher = $request->input('status');
                $voucher->save();

                return response()->json([
                    'data'    => $voucher,
                    'message' => "Voucher status updated successfully",
                    'status'  => 200,
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

    public function vehicleInfo1(Request $request)
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
                'RegNo' => 'required|string',
                'DistrictID' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $registrationNo = $request->input('RegNo');
            $districtID = $request->input('DistrictID');

            // Dispatch the job
            FetchVehicleInfo::dispatch($registrationNo, $districtID);

            // Wait for the job to process and retrieve the data from cache
            // In a real-world scenario, you might need to implement a polling mechanism or websockets
            // Here, we use a simple sleep to wait for demonstration purposes
            sleep(5); // Adjust the sleep time as necessary

            $cacheKey = "vehicle_info_{$registrationNo}_{$districtID}";
            $vehicleInfo = Cache::get($cacheKey);

            if (!$vehicleInfo) {
                return response()->json(['message' => "Vehicle info not found", 'status' => 202]);
            }

            return response()->json($vehicleInfo);
        } else {
            // Unauthorized because email and password don't match
            return response()->json([
                'message' => "Unauthorized: Invalid email or password",
                'status'  => 401,
            ]);
        }

    }

    public function vehicleInfo(Request $request)
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
                $districtID = $request->input('DistrictID');

                // Fetch vehicle info
                $vehicleInfo = Register::where('registration_no', $registrationNo)
                    ->leftJoin('eto_location', 'register.eto_location_id', '=', 'eto_location.id')
                    ->where('eto_location.id', $districtID)
                    ->first(['register.*', 'eto_location.eto_location as eto_location_name']);


                if (!$vehicleInfo) {
                    return response()->json(['message' => "Vehicle not found", 'status' => 404]);
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

                // Fetch the type of body info
                $type_of_body = type_of_body::where('tob_code', $vehicleInfo->type_of_body)
                    ->where('eto_location_id', $districtID)
                    ->first();

                // Fetch the tax app year to
                $latestTaxDate = $this->getLatestPaidTaxDate($registrationNo, $districtID);

                $data = [
                    'registration_no' => $vehicleInfo->registration_no,
                    'District' => $vehicleInfo->eto_location_name,
                    'Owner Name' => $owner_name,
                    'Address' => $owner_address,
                    'Body Type' => $type_of_body ? $type_of_body->type_of_body : null,
                    'Model Year' => $vehicleInfo->year_of_manufacture,
                    'Engine Capacity' => $vehicleInfo->engine_capacity,
                    'Engine Number' => $vehicleInfo->engine_no,
                    'Seating Capacity' => $vehicleInfo->seating_capacity,
                    'Last Tax Paid Upto' => $latestTaxDate,
                    'Registration Date' => $vehicleInfo->registration_date,
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

    public function customerDetail(Request $request)
    {
        // Get email and password from request headers
        $email = $request->header('Email');
        $password = $request->header('Pwd');

        // Predefined email and password
        $emailset = "exice.job.pk@etanb.com";
        $passwordset = "7?.id@Z[eH";

        // Check if email and password headers are present
        if (empty($email) || empty($password)) {
            return response()->json([
                'message' => "Unauthorized",
                'status'  => 401,
            ]);
        }

        // Check if provided credentials match
        if ($email !== $emailset || $password !== $passwordset) {
            return response()->json([
                'message' => "Unauthorized: Invalid email or password",
                'status'  => 401,
            ]);
        }

        // Validate input to ensure at least one parameter is provided
        if (!$request->hasAny(['NIC', 'Registration_no', 'Chassis_no', 'Engine_no'])) {
            return response()->json([
                'message' => 'At least one of NIC, Registration_no, Chassis_no, or Engine_no is required.',
                'status'  => 400,
            ]);
        }

        try {
            // Retrieve input values
            $nic = $request->input('NIC');
            $registrationNo = $request->input('Registration_no');
            $chassisNo = $request->input('Chassis_no');
            $engineNo = $request->input('Engine_no');

            // Retrieve vehicles based on provided parameters
            $vehicleInfo = register::leftJoin('eto_location', 'register.eto_location_id', '=', 'eto_location.id')
                ->when($nic, function ($query, $nic) {
                    return $query->where('new_cnic_no', $nic)->orWhere('old_cnic_no', $nic);
                })
                ->when($registrationNo, function ($query, $registrationNo) {
                    return $query->orWhere('register.registration_no', $registrationNo);
                })
                ->when($chassisNo, function ($query, $chassisNo) {
                    return $query->orWhere('register.chassis_no', $chassisNo);
                })
                ->when($engineNo, function ($query, $engineNo) {
                    return $query->orWhere('register.engine_no', $engineNo);
                })
                ->get(['register.*', 'eto_location.eto_location as eto_location_name']);

            if ($vehicleInfo->isEmpty()) {
                return response()->json([
                    'message' => "Vehicle not found",
                    'status'  => 404
                ]);
            }

            $dataList = [];

            // Process each vehicle record
            foreach ($vehicleInfo as $vehicle) {
                $registrationNo = $vehicle->registration_no;
                $districtID = $vehicle->eto_location_id;

                // Fetch the latest transfer_owner record for the vehicle
                $transfer = transfer_owner::where('registration_no', $registrationNo)
                    ->where('eto_location_id', $districtID)
                    ->orderBy('transfer_code', 'desc')
                    ->orderByRaw('STR_TO_DATE(dates, "%Y-%m-%d %H:%i:%s") DESC')
                    ->orderByRaw('STR_TO_DATE(dates, "%m %d %Y %h:%i:%s %p") DESC')
                    ->first();

                // Determine owner details from transfer record if available, otherwise fallback to vehicle info
                $owner_name = $transfer->name ?? $vehicle->name_;
                $owner_address = $transfer->c_address ?? $vehicle->address;

                // Fetch type_of_body information
                $type_of_body = type_of_body::where('tob_code', $vehicle->type_of_body)
                    ->where('eto_location_id', $districtID)
                    ->first();

                // Fetch the voucher record (latest tax information)
                $voucher = voucher_managment::where('reg_no', $registrationNo)
                    ->where('status_voucher', 'Paid')
                    ->where('district_id', $districtID)
                    ->orderBy('tax_app_year_to', 'desc')
                    ->first();

                // Prepare data for this vehicle
                $dataList[] = [
                    'Registration No'   => $registrationNo,
                    'District'          => $vehicle->eto_location_name,
                    'Owner Name'        => $owner_name,
                    'Address'           => $owner_address,
                    'Body Type'         => $type_of_body ? $type_of_body->type_of_body : null,
                    'Model Year'        => $vehicle->year_of_manufacture,
                    'Engine Capacity'   => $vehicle->engine_capacity,
                    'Chassis No'   => $vehicle->chassis_no,
                    'Engine Number'     => $vehicle->engine_no,
                    'Seating Capacity'  => $vehicle->seating_capacity,
                    'Last Tax Paid Upto'=> $voucher ? $voucher->tax_app_year_to : null,
                    'Registration Date' => $vehicle->registration_date,
                ];
            }

            return response()->json([
                'data'    => $dataList,
                'message' => "Vehicle Info",
                'status'  => 200,
            ]);
        } catch (\Throwable $th) {
            // Optionally log the error: Log::error($th);
            return response()->json([
                'status'  => 500,
                'message' => 'Internal Server Error'
            ]);
        }
    }

}
