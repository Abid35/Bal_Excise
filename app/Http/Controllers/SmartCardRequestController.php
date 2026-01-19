<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SmartCardRequest;
use App\Models\category_of_vehicle;
use App\Models\type_of_body;
use App\Models\class_of_vehicle;
use App\Models\additional_attachment_trailer;
use App\Models\register;
use App\Models\eto_location;
use Illuminate\Support\Facades\DB;
use App\Services\TransferOwnerService;


class SmartCardRequestController extends Controller
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
     * Get list of smart card requests (with optional status filter)
     */
    public function index(Request $request)
    {
        $query = SmartCardRequest::query();

        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $smartCardRequests = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('SmartCardRequest.index', compact('smartCardRequests'));
    }

    /**
     * Get data for create form
     */
    public function create()
    {
        $districts = eto_location::all();
        return view('SmartCardRequest.create', compact('districts'));
    }

    /**
     * Get data for edit form
     */
    public function edit($id)
    {
        $smartCardRequest = SmartCardRequest::find($id);

        if (!$smartCardRequest) {
            return response()->json([
                'message' => 'Smart card request not found'
            ], 404);
        }

        $data = [
            'request' => $smartCardRequest,
            'vehicles' => register::select('id', 'reg_no')->get(),
            'districts' => DB::table('districts')->select('id', 'name')->get(),
            'eto_locations' => DB::table('eto_locations')->select('id', 'eto_location')->get(),
            'statuses' => ['pending', 'in_process', 'complete']
        ];

        return view('SmartCardRequest.edit', $data);
    }

    /**
     * Create a new smart card request
     */
    public function store(Request $request)
    {
        // Decode the JSON string into an array
        $request->merge([
            'vehicle_data' => json_decode($request->vehicle_data, true)
        ]);

        $validated = $request->validate([
            'vehicle_id'    => 'required|exists:register,id',
            'reg_no'        => 'required|string|max:50',
            'district_id'   => 'required|exists:eto_location,id',
            'remarks'       => 'nullable|string',
            'vehicle_data'  => 'required|array',
        ]);

        $validated['vehicle_snapshot'] = $validated['vehicle_data'];
        $validated['status'] = 'pending';
        $validated['eto_id'] = Auth()->id();

        $smartCardRequest = SmartCardRequest::create($validated);

        return redirect()
            ->route('smart-cards.create')
            ->with('success', 'Smart card request created successfully');
    }


    /**
     * Update an existing smart card request
     */
    public function update(Request $request, $id)
    {
        $smartCardRequest = SmartCardRequest::findOrFail($id);

        $validated = $request->validate([
            'vehicle_id' => 'sometimes|exists:vehicles,id',
            'reg_no' => 'sometimes|string|max:50',
            'district_id' => 'sometimes|exists:districts,id',
            'eto_id' => 'sometimes|exists:eto_locations,id',
            'status' => 'sometimes|in:pending,in_process,complete',
            'remarks' => 'nullable|string',
        ]);

        if (isset($validated['vehicle_id'])) {
            $vehicle = register::find($validated['vehicle_id']);
            $validated['vehicle_snapshot'] = json_encode($vehicle);
        }

        $smartCardRequest->update($validated);

        return response()->json([
            'message' => 'Smart card request updated successfully',
            'data' => $smartCardRequest
        ]);
    }

    /**
     * Delete a smart card request
     */
    public function destroy($id)
    {
        $smartCardRequest = SmartCardRequest::findOrFail($id);
        $smartCardRequest->delete();


        return redirect()
            ->route('smart-cards.index')
            ->with('success', 'Smart card request deleted successfully');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'reg_no'      => 'required|string',
            'district_id' => 'required|exists:eto_location,id',
        ]);

        // Check if smart card request already exists
        $exists = SmartCardRequest::where('reg_no', $request->reg_no)
            ->where('district_id', $request->district_id)
            ->exists();

        if ($exists) {
            return response()->json([
                'status'  => 'error',
                'message' => 'A smart card request already exists for this vehicle.'
            ], 409);
        }

        // Find vehicle in DB
        $vehicle = register::where('registration_no', $request->reg_no)
            ->where('eto_location_id', $request->district_id)
            ->first();



        if (!$vehicle) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Vehicle not found.'
            ], 404);
        }

        $data = $this->transferOwnerService->processTransferOwnerData($vehicle);


        $category_of_vehicle = category_of_vehicle::where(['categ_code' =>  $vehicle->category_of_vehicle_id, 'eto_location_id' =>  $vehicle->eto_location_id,])->first()->value('category_of_vehicle');
        $vehicle_type = 2;
        if($category_of_vehicle === "COMMERCIAL"){
            $vehicle_type = 1;
        }

        $type_of_body = type_of_body::where(['tob_code' =>  $vehicle->type_of_body, 'eto_location_id' =>  $vehicle->eto_location_id,])->first()->value('type_of_body');
        $class_of_vehicle = class_of_vehicle::where(['cov_code' =>  $vehicle->class_of_vehicle_id, 'eto_location_id' =>  $vehicle->eto_location_id,])->first()->value('class_of_vehicle');
        $additional_attachment_trailer = additional_attachment_trailer::where([
            'reg_no' =>  $vehicle->registration_no,
            'eto_location_id' =>  $vehicle->eto_location_id
        ])->orWhere([
            'reg_id'=> $vehicle->id,
            'eto_location_id' =>  $vehicle->eto_location_id
        ])->first();

        // Return vehicle data in JSON
        return response()->json([
            'status'  => 'success',
            'message' => 'Vehicle found.',
            'vehicle' => [
                'id'              => $data['id'] ?? null,
                'vehicle_type'              => $category_of_vehicle ?? null,
                'vehicle_type_id'              => $vehicle_type ?? null,
                'owner_name'          => $data['name_'] ?? null,
                'father_name'          => $data['father_or_husband_name'] ?? null,
                'cnic'                 => $data['new_cnic_no'] ?? null,
                'ntn_number'              => $data['ntn_no'] ?? null,
                'registration_number'              => $data['registration_no'] ?? null,
                'district_id'         => $request->district_id,
                'district'            => $data['eto_location_name'] ?? null,
                'date_of_registration'                 => $data['registration_date'] ?? null,
                'address'                 => $data['address'] ?? null,
                'type_of_body'                 => $type_of_body ?? null,
                'chassis_number'          => $data['chassis_no'] ?? null,
                'engine_number'           => $data['engine_no'] ?? null,
                'number_of_cylinder'                 => $data['number_of_cylinder'] ?? null,
                'class_of_vehicle'                 => $class_of_vehicle ?? null,
                'seating_capacity'                 => $data['seating_capacity'] ?? null,
                'make'               => $data['makers_name'] ?? null,
                'model'               => $data['model'] ?? null,
                'laden_weight'                 => $data['laden_weight'] ?? null,
                'engine_capacity'                 => $data['engine_capacity'] ?? null,
                'year_of_manufacture' => $data['year_of_manufacture'] ?? null,
                'color'               => $data['color_name'] ?? null,
                'max_lan_weight'               => $additional_attachment_trailer['max_lan_weight'] ?? null,
                'max_lan_weight_front_axle'               => $additional_attachment_trailer['max_lan_weight_front_axle'] ?? null,
                'max_lan_weight_rear_axle'               => $additional_attachment_trailer['max_lan_weight_rear_axle'] ?? null,
                'max_lan_weight_any_other_axle'               => $additional_attachment_trailer['max_lan_weight_any_other_axle'] ?? null,
                'tyre_front_axle'               => $additional_attachment_trailer['tyre_front_axle'] ?? null,
                'tyre_rear_axle'               => $additional_attachment_trailer['tyre_rear_axle'] ?? null,
                'tyre_any_other_axle'               => $additional_attachment_trailer['tyre_any_other_axle'] ?? null,
            ]
        ]);
    }

}
