<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnregisteredNumber;

class UnregisteredNumberController extends Controller
{
    public function index(Request $request)
    {
        $query = UnregisteredNumber::query();

        if ($request->filled('identifier')) {
            $identifier = $request->input('identifier');

            $query->where(function ($q) use ($identifier) {
                $q->where('owner_cnic', $identifier)
                    ->orWhere('owner_ntn', $identifier);
            });
        }

        $records = $query->get();

        return view('UnregisteredNumber.index', compact('records'));
    }

    public function searchByCnic(Request $request)
    {
        $cnic = $request->input('cnic');
        $unassigned = UnregisteredNumber::where(function ($q) use ($cnic) {
            $q->where('owner_cnic', $cnic);

//            if (!empty($data['ntn_no'])) {
//                $q->orWhere('owner_ntn', $data['ntn_no']);
//            }
        })
            ->where('is_assigned', false)
            ->get();

        return response()->json(['Data2' => $unassigned]);
    }

}
