<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\eto_location;
use App\Models\eto_name;
use App\Models\type_of_body;
use App\Models\source_of_procurement;
use App\Models\route_permit;
use App\Models\register;
use App\Models\province;
use App\Models\owner_type;
use App\Models\new_owner;
use App\Models\manufacturer;
use App\Models\jurisdiction;
use App\Models\issuing_authority;
use App\Models\fuel_type;
use App\Models\colors;
use App\Models\class_of_vehicle;
use App\Models\cities;
use App\Models\category_of_vehicle;
use App\Models\book_issue;
use App\Models\bank_branch;
use App\Models\bank;
use App\Models\years;
use App\Models\fees;
use App\Models\owner_title;
use App\Models\registration_marks;
use App\Models\units;
use App\Models\eunits;
use App\Models\application_type;
use App\Models\agreement1;
use App\Models\agreement2;
use App\Models\additional_trailer_vehicle;
use App\Models\additional_attachment_trailer;
use App\Models\procurement;
use App\Models\voucher_managment;
use App\Models\vouchers_ids;
use App\Models\voucher_arrears;
use App\Models\transfer_owner;
use App\Models\bill_transactions;

use Auth;

use Carbon\Carbon;

class VoucherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $data = voucher_managment::orderBy('id', 'desc')->paginate(15);


        return view('voucher_management.voucher', ['v' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('voucher_management.addnew_voucher');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

//            dd($request->all());

        $arr = $request->all();
        $challanno = rand();
        $total = $arr['TotalAmount'];
        $data = voucher_managment::create([
            'user_id' => Auth::user()->id,
            'registration_id' => $arr['Reg_id'],
            'issue_date' => Carbon::Now(),
            'district' => $arr['District'],
            'total_amount' => $arr['TotalAmount'],
            'status' => $arr['status'],
            'district_id' => $arr['DistrictID'],
            'reg_no' => $arr['RegistrationNo'],
            'tax_app_year_from' => $arr['TaxApplicableYearsFrom'],
            'tax_app_year_to' => $arr['TaxApplicableYearsTo'],
            'last_paid_year' => $arr['LastPaidYear'],
            'last_paid_amount' => $arr['LastPaidAmount'],
            'challan_no' => $challanno


        ]);


        $re = register::find($data->registration_id);
        if ($re != null) {
            $re = app('App\Http\Controllers\GetDataController')->get_revised_transfer($re);


        }

        if ($re == null) {
            $re = arrival::where('registration_no', $re->registration_no)->where('eto_location_id', $re->eto_location_id)->first();
            $tableused = "arrival";
        } else {
            $tableused = "reg";
        }

        if ($re != null) {


            $re = app('App\Http\Controllers\GetDataController')->get_revised_data($re, $tableused);


            $cat = $re[1];
            $re = $re[0];

            $re = (object)$re;

        }


        if (isset($arr['Fees'])) {
            foreach ($arr['Fees'] as $t) {
                $name = $t['Name'];
                $amount = $t['Amount'];
                $id = $t['ID'];
                $from = null;
                $to = null;
                $dur = null;
                $opt = null;
                $type = null;
                if ($t['ID'] == 14) {

                    $dur = $t['Duration'];

                } else if ($t['ID'] == 6) {
                    $amount = (!is_null($t['Amount']) && !is_null($t['Duration'])) ? ($t['Amount'] * $t['Duration']) : 0;
                    $dur = !is_null($t['Duration']) ? $t['Duration'] : 0;

                } else if ($t['ID'] == 23) {

                    $dur = $t['Duration'];
                    $opt = $t['opt'];

                } else if ($t['ID'] == 16) {

                    $from = $t['From'];
                    $to = $t['To'];
                    $dur = $t['Duration'];


                }


                if ($amount != 0) {
                    $v = vouchers_ids::create([
                        'voucher_id' => $data->id,
                        'fees_id' => $id,
                        'title' => $name,
                        'amount' => $amount,
                        'duration' => $dur,
                        'from' => $from,
                        'to' => $to,
                        'option' => $opt
                    ]);
                    if ($v != null) {
                        if ($v->fees_id == 11) {
                            register::where('id', $arr['Reg_id'])->update(['alt_status' => 1]);
                        }
                    }

                }


            }
        }
        if (isset($arr['Arrears'])) {
            foreach ($arr['Arrears'] as $t) {
                if ($t['Type'] == "Provincial") {
                    $type = 1;
                } else if ($t['Type'] == "Federal") {
                    $type = 2;
                }
                $total += $t['Amount'];
                voucher_arrears::create([
                    'gov_type' => $type,
                    'title' => $t['Name'],
                    'tax_arrears_type' => $t['Type'],
                    'amount' => $t['Amount'],
                    'voucher_id' => $data->id,
                    'from_date' => $t['From'],
                    'to_date' => $t['To'],
                ]);
            }
        }

        // bill_transactions::create([
        //     'consumer_number'=> $data->reg_no,
        //     'eto_location_id'=> $re->eto_location_id,
        //     'consumer_Detail'=> $re->name_,
        //     'bill_status'=>'U',
        //     'due_date'=>,
        //     'amount_within_dueDate'=>,
        //     'amount_after_dueDate'=>,
        //     'billing_month'=>,
        //     'date_paid'=>,
        //     'amount_paid'=>,
        //     'bank_mnemonic'=>"",
        //     'Identification_parameter'=>$challanno
        // ]);

        $reg = register::find($arr['Reg_id']);
        $data->address = $reg->address;
        $datat = transfer_owner::where('registration_no', $reg->registration_no)->where('eto_location_id', $reg->eto_location_id)->get();

        if ($datat->count() > 0) {
            $co = 1;
            foreach ($datat as $x) {

                if ($datat->count() == $co) {
                    // $city=cities::where('city_code', $x->p_city)->where('eto_location_id',$reg->eto_location_id)->first();

                    $data->address = $x->p_address != null ? $x->p_address : 'N/A';

                }
                $co++;
            }
        }


        $data->book_serialNo = $reg->book_serialNo;


        //    $reg->update([ 'renew_date' => $arr['TaxApplicableYearsTo']]);

        return response()->json(['Status' => true, 'Data' => $data]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function old_record(Request $request)
    {
        $total = 0;
        $arr = $request->all();

        $dat = register::find($arr['Reg_id']);
        $dir = eto_location::find($dat->eto_location_id);
        if ($dat != null) {
            foreach ($arr as $key => $r) {
                if (str_contains($key, 'FeeType') && $r != null) {
                    $total = $total + $r;
                }
            }

            $data = voucher_managment::create([
                'user_id' => Auth::user()->id,
                'registration_id' => $arr['Reg_id'],
                'issue_date' => Carbon::Now(),
                'district' => $dir->eto_location,
                'total_amount' => $total,
                'status_voucher' => 'Pending',
                'district_id' => $dat->eto_location_id,
                'reg_no' => $dat->registration_no,
                'tax_app_year_from' => $arr['TaxApplicableYearsFrom'],
                'tax_app_year_to' => $arr['TaxApplicableYearsTo'],
                'last_paid_year' => $arr['LastPaidYear_'],
                'last_paid_amount' => $total,
                'challan_no' => $arr['challan'],
                'bank_name' => $arr['bank_name'],
                'bank_branch' => $arr['branch_name'],
                'bank_payment_date' => $arr['payment_date'],
                'status' => isset($arr['filer']) ? $arr['filer'] : null,
                'old_record_status' => 1,
            ]);

            // voucher ids
            foreach ($arr as $key => $r) {
                if (str_contains($key, 'FeeType') && $r != null) {

                    $sp = explode("FeeType", $key);
                    $fee = fees::find($sp[1]);
                    if ($sp[1] == 16) {
                        $v = vouchers_ids::create([
                            'voucher_id' => $data->id,
                            'fees_id' => $sp[1],
                            'title' => $fee->title,
                            'amount' => $r,
                            'duration' => $arr['CollectionType'],
                            'from' => $arr['TaxApplicableYearsFrom'],
                            'to' => $arr['TaxApplicableYearsTo'],
                        ]);
                    } else {
                        $v = vouchers_ids::create([
                            'voucher_id' => $data->id,
                            'fees_id' => $sp[1],
                            'title' => $fee->title,
                            'amount' => $r,
                        ]);
                    }
                }
            }

            // arrears
            if ($request->arrears_govt_type[0] != 0) {
                $v_total = 0;
                foreach ($request->arrears_govt_type as $key => $govtType) {
                    $govt_type = ($govtType == 1) ? 'Provincial' : 'Federal';

                    $voucherId = new voucher_arrears();

                    $voucherId->gov_type = $govtType;
                    $voucherId->voucher_id = $data->id;
                    $voucherId->title = $request->arrears_type[$key];
                    $voucherId->tax_arrears_type = $govt_type;
                    $voucherId->from_date = $request->arrears_from[$key];
                    $voucherId->to_date = $request->arrears_to[$key];
                    $voucherId->amount = $request->arrears_amount[$key];
                    $voucherId->save();

                    $v_total += $request->arrears_amount[$key];
                }

                // Update the last_paid_amount attribute in the voucher_managment
                $data = voucher_managment::where('id', $data->id)->first();
                $data->total_amount = $v_total + $total;
                $data->last_paid_amount = $v_total + $total;
                $data->save();

                register::where('id', $arr['Reg_id'])->update([
                    'last_tax_date' => $arr['LastPaidYear_'],
                    'last_tax_paid' => $total + $v_total
                ]);

            } else {
                register::where('id', $arr['Reg_id'])->update([
                    'last_tax_date' => $arr['LastPaidYear_'],
                    'last_tax_paid' => $total
                ]);
            }


        }

        return redirect()->back();


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('voucher_management.addnew_voucher')->with('id', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update($id, Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
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

    public function SaveExcludedTax(Request $request)
    {


        return response()->json(['Status' => true, 'Data' => $request->all()]);
    }

    public function paid($id)
    {
        $data = voucher_managment::find($id);
        $data->update([
            'last_paid_year' => Carbon::Now(),
            'last_paid_amount' => $data->total_amount,
            'status_voucher' => "Paid"
        ]);
        $datafees = vouchers_ids::where('voucher_id', $data->id)->get();

        foreach ($datafees as $d) {
            if ($d->fees_id == 11) {
                register::where('id', $data->registration_id)->update(['alt_status' => 1, 'conversion_status' => 1]);
            } else if ($d->fees_id == 6) {
                register::where('id', $data->registration_id)->update(['transfer_status' => 1]);

            } else // if ($d->fees_id==16)
            {
                register::where('id', $data->registration_id)->update([
                    'last_tax_paid' => $d->amount,
                    'last_tax_date' => Carbon::Now(),
                    'renew_date' => $data->tax_app_year_to
                ]);

            }

        }

        return redirect()->back();
    }

    public function new_voucher(){
        return view('voucher_management.voucher_new_role');
    }

    /**
     * Get voucher data for challan printing
     *
     * @param int $id
     * @return Response
     */
    //ultrasoft changes this controller function fetches data from database
    public function getChallanData($id)
    {
        try {
            $voucher = voucher_managment::find($id);

            if (!$voucher) {
                return response()->json(['Status' => false, 'msg' => 'Voucher not found']);
            }

            // Get registration details
            $reg = register::find($voucher->registration_id);

            if (!$reg) {
                return response()->json(['Status' => false, 'msg' => 'Registration not found']);
            }

            // Get transfer owner if exists (latest address)
            $transfer = transfer_owner::where('registration_no', $reg->registration_no)
                ->where('eto_location_id', $reg->eto_location_id)
                ->latest()
                ->first();

            // Get fees
            $fees = vouchers_ids::where('voucher_id', $id)->get();

            // Get arrears
            $arrears = voucher_arrears::where('voucher_id', $id)->get();

            // Get class of vehicle
            $cov = class_of_vehicle::where('cov_code', $reg->class_of_vehicle_id)
                ->where('eto_location_id', $reg->eto_location_id)
                ->first();

            // Get type of body
            $tob = type_of_body::where('tob_code', $reg->type_of_body)
                ->where('eto_location_id', $reg->eto_location_id)
                ->first();

            // Get category
            $cat = null;
            if ($tob != null) {
                $cat = category_of_vehicle::where('categ_code', $tob->category_of_vehicle_id)->first();
            }

            // Prepare response data
            $data = [
                'id' => $voucher->id,
                'challan_no' => $voucher->challan_no,
                'reg_no' => $voucher->reg_no,
                'district' => $voucher->district,
                'total_amount' => $voucher->total_amount,
                'issue_date' => $voucher->issue_date,
                'tax_app_year_from' => $voucher->tax_app_year_from,
                'tax_app_year_to' => $voucher->tax_app_year_to,
                'last_paid_year' => $voucher->last_paid_year,
                'last_paid_amount' => $voucher->last_paid_amount,
                'status' => $voucher->status ?? 'N/A',
                'book_serialNo' => $reg->book_serialNo ?? 'N/A',
                'address' => $transfer ? ($transfer->p_address ?? 'N/A') : ($reg->address ?? 'N/A'),

                // Registration details
                'registration_date' => $reg->registration_date ?? 'N/A',
                'second_registration_date' => $reg->secondregistration_date ?? '',
                'category' => $cat ? $cat->category_of_vehicle : 'N/A',
                'class' => $cov ? $cov->class_of_vehicle : 'N/A',
                'body_type' => $tob ? $tob->type_of_body : 'N/A',
                'owner_name' => $reg->name_ ?? 'N/A',
                'cnic' => $reg->new_cnic_no ?? $reg->old_cnic_no ?? 'N/A',
                'mobile' => $reg->mobile_no ?? 'N/A',
                'engine_cc' => $reg->engine_capacity ?? 'N/A',
                'chassis_no' => $reg->chassis_no ?? 'N/A',
                'model' => $reg->year_of_manufacture ?? 'N/A',
                'seating_capacity' => $reg->seating_capacity ?? 'N/A',
                'laden_weight' => $reg->laden_weight ?? 'N/A',
                'wheelbox' => $reg->wheelbox ?? 'N/A',
                'cost' => $reg->vehicle_price ?? 'N/A',

                // Fees and arrears
                'fees' => $fees,
                'arrears' => $arrears,

                // User who generated
                'generated_by' => Auth::user()->name
            ];

            return response()->json(['Status' => true, 'Data' => $data]);

        } catch (\Exception $e) {
            return response()->json(['Status' => false, 'msg' => 'Error: ' . $e->getMessage()]);
        }
    }

}
