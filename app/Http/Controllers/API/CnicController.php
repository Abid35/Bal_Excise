<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\register;
use App\Models\transfer;
use App\Models\manufacturer;
use App\Models\eto_location;
use App\Models\type_of_body;

class CnicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api'); // JWT Auth
    }

    public function searchCnic(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'search' => 'required|string|min:5|max:20'
        ]);

        $search = trim($validated['search']);

        // STEP 1: Registered Vehicles
        $registerData = register::where('active_status', 'Active')
            ->where(function ($q) use ($search) {
                $q->where('new_cnic_no', 'LIKE', "%{$search}%")
                  ->orWhere('old_cnic_no', 'LIKE', "%{$search}%")
                  ->orWhere('ntn_no', 'LIKE', "%{$search}%");
            })
            ->latest('id')
            ->get();

        // STEP 2: Transferred Vehicles
        $transferData = transfer::where(function ($q) use ($search) {
            $q->where('new_cnic_no', 'LIKE', "%{$search}%")
              ->orWhere('old_cnic_no', 'LIKE', "%{$search}%")
              ->orWhere('ntn_no', 'LIKE', "%{$search}%");
        })
        ->with('register')
        ->orderByDesc('transfer_code')
        ->get()
        ->groupBy('reg_id')
        ->map(fn($g) => $g->first())
        ->filter(fn($t) => $t->register && $t->register->active_status === 'Active')
        ->values();

        $transferredVehicles = $transferData->map(function ($t) {
            $v = $t->register;

            $v->name_ = $t->name ?? $v->name_;
            $v->father_or_husband_name = $t->f_name ?? $v->father_or_husband_name;
            $v->new_cnic_no = $t->new_cnic_no ?? $v->new_cnic_no;
            $v->old_cnic_no = $t->old_cnic_no ?? $v->old_cnic_no;
            $v->ntn_no = $t->ntn_no ?? $v->ntn_no;
            $v->address = $t->c_address ?? $t->p_address ?? $v->address;
            $v->mobile_no = $t->c_phone ?? $t->p_phone ?? $v->mobile_no;

            return $v;
        });

        // Merge registered + transferred
        $data = $registerData->merge($transferredVehicles)->unique('id')->values();

        if ($data->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No active vehicle found for this CNIC or NTN.',
                'data' => []
            ]);
        }

        // STEP 3: Load Additional Data safely
        foreach ($data as $d) {
            // Manufacturer
            if (!empty($d->makers_name) && !empty($d->eto_location_id)) {
                $m = manufacturer::where('eto_location_id', $d->eto_location_id)
                    ->where('code', $d->makers_name)
                    ->first();
                $d->makers_name = $m->manufacturer ?? $d->makers_name;
            }

            // ETO Location
            if (!empty($d->eto_location_id)) {
                $eto = eto_location::find($d->eto_location_id);
                $d->eto_location = $eto->eto_location ?? null;
            }

            // Type of Body
            if (!empty($d->type_of_body) && !empty($d->eto_location_id)) {
                $body = type_of_body::where('eto_location_id', $d->eto_location_id)
                    ->where('tob_code', $d->type_of_body)
                    ->first();

                $d->type_of_body = $body->type_of_body ?? $d->type_of_body;
                $d->category_of_vehicle = match($body->category_of_vehicle_id ?? null) {
                    1 => 'Commercial',
                    2 => 'Non Commercial',
                    default => null,
                };
            }
        }

        return response()->json([
            'status' => true,
            'count' => $data->count(),
            'data' => $data
        ]);
    }
}
