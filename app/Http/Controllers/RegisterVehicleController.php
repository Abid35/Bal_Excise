<?php

namespace App\Http\Controllers;

use App\Models\NumberPattern;
use App\Models\UnregisteredNumber;
use App\Traits\VehicleNumberGenerate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
use App\Models\owner_title;
use App\Models\registration_marks;
use App\Models\units;
use App\Models\eunits;
use App\Models\application_type;
use App\Models\agreement1;
use App\Models\agreement2;
use App\Models\additional_trailer_vehicle;
use App\Models\additional_attachment_trailer;
use App\Models\regowner;
use App\Models\reg_cunit;
use Carbon\Carbon;
use App\Models\transfer_owner;
use App\Models\voucher_managment;
use App\Models\alteration;
use App\Models\reg_maker;
use App\Models\combine_data;
use Auth;
use DB;

use Validator;
use Illuminate\Validation\Rule;
use function Symfony\Component\Mime\Header\all;
use App\Services\TransferOwnerService;



class RegisterVehicleController extends Controller
{
    use VehicleNumberGenerate;

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
        $data= register::where('eto_location_id', auth()->user()->eto_location_id)->latest('id')->paginate(15);

        return view('register.registration',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function settrans()
    {
        // $t= transfer_owner::where('registration_no',"TKR034")->where('eto_location_id', 1)->get();
        // $data= register::where('registration_no',"TKR034")->where('eto_location_id', 1)->first();

        //     if($data->owner_type_id ==3)
        //     {
        //         $d=regowner::where('reg_id', $data->id)->get();

        //         if($d->count()> 0)
        //         {
        //             $i=0;
        //             $name= "";
        //             $old=  "";
        //             $new=  "";
        //             $f=  "";
        //             foreach($d as $c)
        //             {
        //                 if($i=0)
        //                 {
        //                     $name= $name . $c->name;
        //                     $old= $old . $c->old_cnic_no;
        //                     $new= $new .$c->new_cnic_no;
        //                     $f= $f .$c->father_or_husband_name;
        //                 }
        //                 else
        //                 {
        //                     $name= $name .','. $c->name;
        //                     $old= $old .','. $c->old_cnic_no;
        //                     $new= $new .','. $c->new_cnic_no;
        //                     $f= $f .','.$c->father_or_husband_name;
        //                 }

        //                 $i++;
        //             }

        //             $f=[
        //                 'reg_id'=> $data->id,
        //                 'eto_name_id'=>$data->eto_name_id,
        //                 'jurisdiction_id'=> $data->jurisdiction_id,
        //                 'registration_no'=> $data->registration_no,
        //                 'owner_type_id'=> $data->owner_type_id,
        //                 'owner_title_id'=> $data->title,
        //                 'name'=>$name,
        //                 'old_cnic_no'=>$old,
        //                 'new_cnic_no'=>$new,
        //                 'f_name'=>$f,
        //                 'house_no'=> $data->house_no,
        //                 'province_id'=> $data->Province_id,
        //                 'city_id'=> $data->City_id,
        //                 'mobile'=> $data->mobile_no,
        //                 'transfer_date'=>Carbon::now(),
        //                 'transfer_code'=>0,
        //                 'dates'=>Carbon::now(),
        //                 'eto_location_id'=>$data->eto_location_id

        //             ];
        //             $tra=transfer_owner::create($f);
        //         }
        //     }
        //     else
        //     {

        //         $f=[
        //             'reg_id'=> $data->id,
        //             'eto_name_id'=>$data->eto_name_id,
        //             'jurisdiction_id'=>  $data->jurisdiction_id,
        //             'registration_no'=> $data->registration_no,
        //             'owner_type_id'=> $data->owner_type_id,
        //             'owner_title_id'=> $data->title,
        //             'name'=>$data->name_,
        //             'old_cnic_no'=>$data->old_cnic_no,
        //             'new_cnic_no'=>$data->new_cnic_no,
        //             'f_name'=>$date->father_or_husband_name,
        //             'house_no'=> $data->house_no,
        //             'province_id'=> $data->Province_id,
        //             'city_id'=> $data->City_id,
        //             'mobile'=> $data->mobile_no,
        //             'transfer_date'=>Carbon::now(),
        //             'transfer_code'=>0,
        //             'dates'=>Carbon::now(),
        //             'eto_location_id'=>$data->eto_location_id

        //         ];
        //         $tra=transfer_owner::create($f);
        //     }










        // foreach($t as $v )
        // {
        //     if($t->transfer_code== $t->count())
        //     {

        //     }
        // }


        dd($t);
    }


    public function create()
    {
        $patterns = NumberPattern::get();
        return view('register.new_registration', compact('patterns'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $arr = $request->all();
            $name_ = null;
            $ntn_no = null;

            // ✅ Handle manual vs auto generate
            if ($arr['reg_option'] == "manual") {
                $validator = Validator::make($request->all(), [
                    'RegNo' => 'required',
                    'ETOLocation' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json(['Status' => false, 'errors' => $validator->errors()]);
                }
            } else {

                // ✅ Auto-generate number based on selected Body Type
                $nextNumber = $this->generate(
                    $arr['BodyTypeID'],
                    $arr['ETOLocation'],
                    $arr['OwnerTypeID']
                );

                if (!$nextNumber) {
                    return response()->json(['Status' => false, 'Message' => 'Unable to generate registration number.']);
                }

                $arr['RegNo'] = $nextNumber; // Set generated number
            }

            // ✅ Check if vehicle already registered
            $existing = register::where('registration_no', strtoupper($arr['RegNo']))
                ->where('eto_location_id', $arr['ETOLocation'])
                ->first();

            if ($existing) {
                return response()->json(['Status' => false, 'Message' => 'Vehicle already registered.']);
            }

            // ✅ Owner Info Logic
            $father_or_husband_name = null;
            $old_cnic_no = null;
            $new_cnic_no = null;

            $tr = $arr['IsTrailer'] ? 'Y' : 'N';
            $OwnerTypeID = $arr['OwnerTypeID'];

            if ($OwnerTypeID == "2") {
                $name_ = $arr['OwnerName'];
            } elseif ($OwnerTypeID == "4") {
                $name_ = $arr['OwnerName'];
                $ntn_no = $arr['NewCNIC'];
            } elseif ($OwnerTypeID == "3") {
                if (!str_contains($arr['OwnerName'], ',')) {
                    $name_ = $arr['OwnerName'];
                    $father_or_husband_name = $arr['FatherHusband'];
                    $old_cnic_no = $arr['OldCNIC'];
                    $new_cnic_no = $arr['NewCNIC'];
                } else {
                    $OwnerName = explode(",", $arr['OwnerName']);
                    $OldCNIC = explode(",", $arr['OldCNIC']);
                    $NewCNIC = explode(",", $arr['NewCNIC']);
                    $FatherHusband = explode(",", $arr['FatherHusband']);

                    $name_ = $OwnerName[0];
                    $father_or_husband_name = $FatherHusband[0];
                    $old_cnic_no = $OldCNIC[0];
                    $new_cnic_no = $NewCNIC[0];
                }
            } elseif ($OwnerTypeID == "1") {
                $name_ = $arr['OwnerName'];
                $father_or_husband_name = $arr['FatherHusband'];
                $old_cnic_no = $arr['OldCNIC'];
                $new_cnic_no = $arr['NewCNIC'];
            }

            // ✅ Check or insert Unregistered Number
            $unregistered = UnregisteredNumber::where('registration_no', strtoupper($arr['RegNo']))
                ->where('eto_name', Auth::user()->id)
                ->first();

            if ($unregistered) {
                $unregistered->update(['is_assigned' => true]);
            } else {
                UnregisteredNumber::create([
                    'registration_no' => strtoupper($arr['RegNo']),
                    'owner_cnic' => $arr['NewCNIC'] ?? $arr['OldCNIC'] ?? null,
                    'owner_ntn' => $arr['NTN'] ?? null,
                    'eto_name' => Auth::user()->id,
                    'district_id' => $arr['ETOLocation'],
                    'is_assigned' => true,
                ]);
            }

            // ✅ Prepare Register Data
            if (empty($arr['RegNo']) || strlen($arr['RegNo']) <= 4) {
                return response()->json(['Status' => false, 'Message' => 'Invalid Registration Number.']);
            }

            $f = [
                'user_id' => Auth::user()->id,
                'eto_location_id' => $arr['ETOLocation'],
                'eto_name_id' => $arr['ETO'],
                'Jurisdiction_id' => $arr['DivisionID'],
                'no_assign_type' => $arr['RegistrationMarkID'],
                'vehicle_price' => $arr['VehiclePrice'],
                'book_serialNo' => $arr['RegBookNo'],
                'owner_type_id' => $arr['OwnerTypeID'],
                'source_of_procurement_id' => isset($arr['sop']) ? (int) $arr['sop'] : null,
                'title' => $arr['OwnerTitle'],
                'name_' => $name_,
                'father_or_husband_name' => $father_or_husband_name,
                'ntn_no' => $ntn_no,
                'house_no' => $arr['HouseNo'],
                'Province_id' => $arr['ProvinceID'],
                'City_id' => $arr['CityID'],
                'mobile_no' => $arr['Mobile'],
                'category_of_vehicle_id' => $arr['CategoryID'],
                'type_of_body' => $arr['BodyTypeID'],
                'class_of_vehicle_id' => $arr['VehicleClassID'],
                'makers_name' => $arr['ManufacturerID'],
                'year_of_manufacture' => $arr['YearOfManufacture'],
                'chassis_no' => $arr['ChassisNo'],
                'engine_no' => $arr['EngineNo'],
                'old_cnic_no' => $old_cnic_no,
                'new_cnic_no' => $new_cnic_no,
                'number_of_cylinder' => $arr['NoOfCyliners'],
                'seating_capacity' => $arr['SeatingCapacity'],
                'engine_capacity' => $arr['EngineCapacity'],
                'unladen_weight' => $arr['UnladenWeight'],
                'unladen_unit' => $arr['LUnit'],
                'laden_weight' => $arr['ladenWeight'],
                'laden_unit' => $arr['LadUnit'],
                'color_of_vehicle_id' => $arr['ColorID'],
                'registration_no' => strtoupper($arr['RegNo']),
                'remarks' => $arr['Remarks'],
                'secondregistration_date' => $arr['SecondRegistrationDate'],
                'registration_date' => $arr['RegistrationDate'],
                'fuel_type_id' => $arr['FueltypeID'],
                'trailer_vehicle' => $tr,
                'wheelbox' => $arr['wheelbox'],
                'invoice_date' => $arr['invoiceDate'],
                'government_department' => $arr['govtDeprt'],
                'ac_type' => $arr['ac_type'],
                'active_status' => "InProcess",
                'dates' => Carbon::now(),
                'tr_date' => Carbon::now(),
            ];

            $data = register::create($f);

            // ✅ Related Data Inserts
            reg_cunit::create([
                'reg_id' => $data->id,
                'cunit' => $arr['EUnit']
            ]);

            // Multiple Owners
            if ($OwnerTypeID == "3") {
                $OwnerName = explode(",", $arr['OwnerName']);
                $OldCNIC = explode(",", $arr['OldCNIC']);
                $NewCNIC = explode(",", $arr['NewCNIC']);
                $FatherHusband = explode(",", $arr['FatherHusband']);

                for ($i = 0; $i < count($OwnerName); $i++) {
                    regowner::create([
                        'user_id' => Auth::user()->id,
                        'reg_id' => $data->id,
                        'name' => $OwnerName[$i],
                        'old_cnic_no' => $OldCNIC[$i] ?? null,
                        'new_cnic_no' => $NewCNIC[$i],
                        'father_or_husband_name' => $FatherHusband[$i],
                    ]);
                }
            }

            // ✅ Trailer Handling
            if (!empty($arr['IsTrailer'])) {
                additional_trailer_vehicle::create([
                    'user_id' => Auth::user()->id,
                    'eto_location_id' => $arr['ETOLocation'],
                    'eto_name_id' => $arr['ETO'],
                    'Jurisdiction_id' => $arr['DivisionID'],
                    'reg_no' => strtoupper($arr['RegNo']),
                    'unladen_weight' => $arr['UnladenWeight'],
                    'max_laden_weight' => $arr['MaxLadenWeight'],
                    'dates' => Carbon::now(),
                    'reg_id' => $data->id,
                    'type_of_body' => $arr['TrailerBodyTypeID'],
                    'unit_code' => $arr['UnitID'],
                    'front_axle' => $arr['FrontAxle'],
                    'rear_axle' => $arr['RearAxle'],
                    'any_other_axle' => $arr['AnyOtherAxle']
                ]);

                additional_attachment_trailer::create([
                    'user_id' => Auth::user()->id,
                    'eto_location_id' => $arr['ETOLocation'],
                    'eto_name_id' => $arr['ETO'],
                    'Jurisdiction_id' => $arr['DivisionID'],
                    'reg_no' => strtoupper($arr['RegNo']),
                    'reg_id' => $data->id,
                    'tr_flag' => 1,
                    'max_lan_weight' => $arr['MaxLadenWeight'],
                    'axleunit' => $arr['AxleUnit'],
                    'max_lan_weight_front_axle' => $arr['AxleFrontAxle'],
                    'max_lan_weight_rear_axle' => $arr['AxleRearAxle'],
                    'max_lan_weight_any_other_axle' => $arr['AxleOtherAxle'],
                    'tyre_front_axle' => $arr['TyresFrontAxle'],
                    'tyre_rear_axle' => $arr['TyresRearAxle'],
                    'tyre_any_other_axle' => $arr['TyreOtherAxle'],
                    'dates' => Carbon::now(),
                ]);
            }

            DB::commit();
            return response()->json(['Status' => true, 'Message' => 'Vehicle registered successfully.']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'Status' => false,
                'Message' => 'Something went wrong during registration.',
                'Error' => $e->getMessage()
            ], 500);
        }
    }



    public function store_backup(Request $request)
    {
        $name_=null;
        $ntn_no=null;
        $arr=$request->all();

        $validator = Validator::make($request->all(), [
            'RegNo' => 'required',
            'ETOLocation' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['Status'=> false , 'errors'=> $validator->errors() ]);
        }

        if($arr['Record_id']!="")
        {
            if($arr['IsNOC'])
            {
                $this->update($request);
                return response()->json(['Status'=> true , 'link'=>'new_registration' ]);
            }
            else
            {
                $che=register::where('registration_no' , strtoupper($arr['RegNo']))->where('eto_location_id', $arr['ETOLocation'])->first()->toArray();

                (new NOCController ())->store($che);
                $this->update($request);
                return response()->json(['Status'=> true  , 'link'=>'NOC']);
            }

        }

        $father_or_husband_name=null;
        $old_cnic_no=null;
        $new_cnic_no=null;

        $che=register::where('registration_no' , strtoupper($arr['RegNo']))->where('eto_location_id', $arr['ETOLocation'])->first();
        if($che!=null)
        {
            return response()->json(['Status'=> false , 'errors'=> null  ]);
        }
        // if($arr['Record_id']!="")
        // {
        //     $d=register::where('registration_no',$arr['Record_id'])->first();

        //     if($d!=null)
        //     {
        //         $at=additional_trailer_vehicle::where('reg_id',$d->id)->first();
        //         $aa=additional_attachment_trailer::where('reg_id',$d->id)->first();
        //         $reg=regowner::where('reg_id',$d->id)->get();

        //         if($at!=null)
        //         {
        //             $at->delete();

        //         }
        //         if($aa!=null)
        //         {
        //             $aa->delete();
        //         }
        //         if($reg->count()>0)
        //         {
        //             foreach($reg as $o)
        //             {
        //                 $o->delete();
        //             }

        //         }
        //         $d->delete();

        //     }
        // }

        $tr=$arr['IsTrailer'] ? 'Y' :"N";

        $OwnerTypeID=$arr['OwnerTypeID'];



        if ($OwnerTypeID == "2") {

            $name_=$arr['OwnerName'];


        }
        else if ($OwnerTypeID == "4") {

            $name_=$arr['OwnerName'];
            $ntn_no=$arr['NewCNIC'];

        }
        else if ($OwnerTypeID == "3") {

            if(!str_contains($arr['OwnerName'], ','))
            {

                $name_= $arr['OwnerName'];
                $father_or_husband_name=$arr['FatherHusband'];
                $old_cnic_no=$arr['OldCNIC'];
                $new_cnic_no=$arr['NewCNIC'];
            }
            else
            {
                $OwnerName= explode (",", $arr['OwnerName']);
                $OldCNIC= explode (",", $arr['OldCNIC']);
                $NewCNIC= explode (",", $arr['NewCNIC']);
                $FatherHusband= explode (",", $arr['FatherHusband']);

                $name_= $OwnerName[0];
                $father_or_husband_name=$FatherHusband[0] ;
                $old_cnic_no= $OldCNIC[0];
                $new_cnic_no=$NewCNIC[0];
            }
        }
        else if ($OwnerTypeID == "1")
        {
            $name_= $arr['OwnerName'];
            $father_or_husband_name=$arr['FatherHusband'];
            $old_cnic_no=$arr['OldCNIC'];
            $new_cnic_no=$arr['NewCNIC'];

        }

        if(strtoupper($arr['RegNo']) != "" || strtoupper($arr['RegNo']) != " " ||  strlen($arr['RegNo']) >4 )
        {
            $f=[
                'user_id'=> Auth::user()->id,
                'eto_location_id'=> $arr['ETOLocation'] ,
                'eto_name_id'=> $arr['ETO'],
                'Jurisdiction_id'=> $arr['DivisionID'],
                'no_assign_type'=> $arr['RegistrationMarkID'],
                'vehicle_price'=> $arr['VehiclePrice'],
                'book_serialNo'=> $arr['RegBookNo'],
                'owner_type_id'=> $arr['OwnerTypeID'],
                'source_of_procurement_id' => isset($arr['sop']) ? (int) $arr['sop'] : null,
                'title'=> $arr['OwnerTitle'],
                'name_'=> $name_,
                'father_or_husband_name'=>$father_or_husband_name,
                'ntn_no'=> $ntn_no,
                'house_no'=> $arr['HouseNo'],
                'Province_id'=> $arr['ProvinceID'],
                'City_id'=> $arr['CityID'],
                'mobile_no'=> $arr['Mobile'],
                'category_of_vehicle_id'=> $arr['CategoryID'],
                'type_of_body'=> $arr['BodyTypeID'],
                'class_of_vehicle_id'=> $arr['VehicleClassID'],
                'makers_name'=> $arr['ManufacturerID'],
                'year_of_manufacture'=> $arr['YearOfManufacture'],
                'chassis_no'=> $arr['ChassisNo'],
                'engine_no'=> $arr['EngineNo'],
                'old_cnic_no'=>$old_cnic_no,
                'new_cnic_no'=>$new_cnic_no,
                'number_of_cylinder'=> $arr['NoOfCyliners'],
                'seating_capacity'=> $arr['SeatingCapacity'],
                'engine_capacity'=> $arr['EngineCapacity'],
                'unladen_weight'=> $arr['UnladenWeight'],
                'unladen_unit'=> $arr['LUnit'],
                'laden_weight'=> $arr['ladenWeight'],
                'laden_unit'=> $arr['LadUnit'],
                'color_of_vehicle_id'=> $arr['ColorID'],
                'registration_no'=>strtoupper($arr['RegNo']),
                'remarks'=> $arr['Remarks'],
                'secondregistration_date'=> $arr['SecondRegistrationDate'],
                'registration_date'=> $arr['RegistrationDate'],
                'fuel_type_id'=> $arr['FueltypeID'],
                'trailer_vehicle'=>$tr,
                'wheelbox'=> $arr['wheelbox'],
                'invoice_date'=> $arr['invoiceDate'],
                'government_department'=> $arr['govtDeprt'],
                'ac_type'=> $arr['ac_type'],
//                'test_date'=> $arr['testDate'],
                'active_status'=> "InProcess",
                'dates'=>Carbon::now(),
                'tr_date'=>Carbon::now(),

            ];
        }
        else
        {
            return response()->json(['Status'=> false ]);
        }





        $data= register::create($f);

        if($data!=null)
        {
            $u=reg_cunit::create([
                'reg_id'=>$data->id,
                'cunit'=>$arr['EUnit']
            ]);
        }


        if ($OwnerTypeID == "3") {


            $OwnerName= explode (",", $arr['OwnerName']);
            $OldCNIC= explode (",", $arr['OldCNIC']);
            $NewCNIC= explode (",", $arr['NewCNIC']);
            $FatherHusband= explode (",", $arr['FatherHusband']);

            for($i=0 ; $i < count($OwnerName) ; $i++)
            {
                $data4=regowner::create([
                    'user_id' => Auth::user()->id,
                    'reg_id'=> $data->id,
                    'name'=>$OwnerName[$i],
                    'old_cnic_no'=>$OldCNIC[$i]==null ? null : $OldCNIC[$i],
                    'new_cnic_no'=>$NewCNIC[$i],
                    'father_or_husband_name'=>$FatherHusband[$i],

                ]);
            }


        }
        // else if ($OwnerTypeID == "1") {

        //     $data4=regowner::create([
        //         'reg_id'=> $data->id,
        //         'name'=>$arr['OwnerName'],
        //         'old_cnic_no'=>$arr['OldCNIC'],
        //         'new_cnic_no'=>$arr['NewCNIC'],
        //         'father_or_husband_name'=>$arr['FatherHusband'],

        //     ]);

        // }



        if($arr['IsTrailer'])
        {
            additional_trailer_vehicle::create([
                'user_id'=> Auth::user()->id,
                'eto_location_id'=> $arr['ETOLocation'] ,
                'eto_name_id'=> $arr['ETO'],
                'Jurisdiction_id'=> $arr['DivisionID'],
                'reg_no'=>$arr['RegNo'],
                'unladen_weight'=>$arr['UnladenWeight'],
                'max_laden_weight'=>$arr['MaxLadenWeight'],
                'dates'=>Carbon::now(),
                'reg_id'=> $data->id,
                'type_of_body'=> $arr['TrailerBodyTypeID'],
                'unit_code'=> $arr['UnitID'],
                'front_axle'=> $arr['FrontAxle'],
                'rear_axle'=> $arr['RearAxle'],
                'any_other_axle'=> $arr['AnyOtherAxle']
            ]);

            additional_attachment_trailer::create([
                'user_id'=> Auth::user()->id,
                'eto_location_id'=> $arr['ETOLocation'] ,
                'eto_name_id'=> $arr['ETO'],
                'Jurisdiction_id'=> $arr['DivisionID'],
                'reg_no'=>$arr['RegNo'],
                'reg_id'=> $data->id,
                'tr_flag'=>1,
                'max_lan_weight'=> $arr['MaxLadenWeight'],
                'axleunit'=>$arr['AxleUnit'],
                'max_lan_weight_front_axle'=> $arr['AxleFrontAxle'],
                'max_lan_weight_rear_axle'=> $arr['AxleRearAxle'],
                'max_lan_weight_any_other_axle'=> $arr['AxleOtherAxle'],
                'tyre_front_axle'=> $arr['TyresFrontAxle'],
                'tyre_rear_axle'=> $arr['TyresRearAxle'],
                'tyre_any_other_axle' => $arr['TyreOtherAxle'],
                'dates'=>Carbon::now(),
            ]);

        }

        return response()->json(['Status'=> true ]);

    }


    public function check_dup(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'eto_location_id' => 'required',
        //     'registration_no' =>  [
        //         'required',
        //         Rule::unique('register')->where(function ($query) use ($request) {
        //             return $query->where('id', '!=', $request->id)->where('eto_location_id', $request->input('eto_location_id'))->where('registration_no', $request->input('registration_no'));
        //         }),
        //     ],

        // ]);

        // if ($validator->fails()) {

        //     return response()->json($validator->errors());
        // }
        $district= $_GET['DivisionID'];
        $chassis= $_GET['chassisNo'];
        $engineNo=$_GET['engineNo'];
        $reg_id=$_GET['RegNo'];
        $bsn=$_GET['BookSerial'];
        $tit=['regNo', 'engineNo' ,'chassisNo' ,'RegBookNo'];
        $msg=[];
        $rem=[];
        $cou=0;
        $st=false;

        if($district!="" && $chassis!="" && $engineNo!="" && $reg_id!="" && $bsn!="")
        {
            $ch_chas= register::where('eto_location_id', $district)->where('chassis_no', $chassis)->exists();
            $ch_engineNo= register::where('eto_location_id', $district)->where('engine_no', $engineNo)->exists();
            // $ch_engineNo=null;
            $ch_regno= register::where('eto_location_id', $district)->where('registration_no', $reg_id)->exists();

            $book= register::where('eto_location_id', $district)->where('book_serialNo', $bsn)->exists();

            if($ch_chas)
            {
                $rem[$cou]="chassisNo";
                $msg[$cou]="Chassis No";
                $cou++;
                $st=true;
            }


            if($ch_regno)
            {
                $rem[$cou]="regNo";
                $msg[$cou]="Register No";
                $cou++;
                $st=true;
            }

            if($ch_engineNo)
            {
                $rem[$cou]="engineNo";
                $msg[$cou]="Engine No";
                $cou++;
                $st=true;
            }

            if($book)
            {
                $rem[$cou]="RegBookNo";
                $msg[$cou]="Book Serial No";
                $cou++;
                $st=true;
            }
        }



        return response()->json(['Status'=> $st , 'msg'=> $msg , 'tit'=>$tit , 'rem'=>$rem]);








    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('register.new_registration')->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {

        $name_=null;
        $ntn_no=null;
        $arr=$request->all();


        $father_or_husband_name=null;
        $old_cnic_no=null;
        $new_cnic_no=null;

        $che=register::where('registration_no' , strtoupper($arr['RegNo']))->where('eto_location_id', $arr['ETOLocation'])->first();
        if($che==null)
        {
            return response()->json(['Status'=> false ]);
        }
        // if($arr['Record_id']!="")
        // {

        // }

        $tr=$arr['IsTrailer'] ? 'Y' :"N";

        $OwnerTypeID=$arr['OwnerTypeID'];



        if ($OwnerTypeID == "2") {
            $name_=$arr['OwnerName'];

        } else if ($OwnerTypeID == "4") {

            $name_=$arr['OwnerName'];
            $ntn_no=$arr['NewCNIC'];

        } else if ($OwnerTypeID == "3") {

            if(!str_contains($arr['OwnerName'], ',')) {
                $name_= $arr['OwnerName'];
                $father_or_husband_name=$arr['FatherHusband'];
                $old_cnic_no=$arr['OldCNIC'];
                $new_cnic_no=$arr['NewCNIC'];
            }
        } else if ($OwnerTypeID == "1") {
            $name_= $arr['OwnerName'];
            $father_or_husband_name=$arr['FatherHusband'];
            $old_cnic_no=$arr['OldCNIC'];
            $new_cnic_no=$arr['NewCNIC'];
        }

        if(isset($arr['IsNOC'])) {
            if($arr['IsNOC']=="true") {
                $stat=-2;
            } else {
                $stat=1;
            }
        } else {
            $stat=1;
        }

        $f = collect([
            'eto_location_id' => $arr['ETOLocation'] ?? null,
            'eto_name_id' => $arr['ETO'] ?? null,
            'Jurisdiction_id' => $arr['DivisionID'] ?? null,
            'no_assign_type' => $arr['RegistrationMarkID'] ?? null,
            'vehicle_price' => $arr['VehiclePrice'] ?? null,
            'book_serialNo' => $arr['RegBookNo'] ?? null,
            'owner_type_id' => $arr['OwnerTypeID'] ?? null,
            'source_of_procurement_id' => isset($arr['sop']) ? (int)$arr['sop'] : null,
            'title' => $arr['OwnerTitle'] ?? null,
            'name_' => $name_ ?? null,
            'father_or_husband_name' => $father_or_husband_name ?? null,
            'ntn_no' => $ntn_no ?? null,
            'house_no' => $arr['HouseNo'] ?? null,
            'Province_id' => $arr['ProvinceID'] ?? null,
            'City_id' => $arr['CityID'] ?? null,
            'mobile_no' => $arr['Mobile'] ?? null,
            'category_of_vehicle_id' => $arr['CategoryID'] ?? null,
            'type_of_body' => $arr['BodyTypeID'] ?? null,
            'class_of_vehicle_id' => $arr['VehicleClassID'] ?? null,
            'makers_name' => $arr['ManufacturerID'] ?? null,
            'year_of_manufacture' => $arr['YearOfManufacture'] ?? null,
            'chassis_no' => $arr['ChassisNo'] ?? null,
            'engine_no' => $arr['EngineNo'] ?? null,
            'old_cnic_no' => $old_cnic_no ?? null,
            'new_cnic_no' => $new_cnic_no ?? null,
            'number_of_cylinder' => $arr['NoOfCyliners'] ?? null,
            'seating_capacity' => $arr['SeatingCapacity'] ?? null,
            'engine_capacity' => $arr['EngineCapacity'] ?? null,
            'unladen_weight' => $arr['UnladenWeight'] ?? null,
            'unladen_unit' => $arr['LUnit'] ?? null,
            'laden_weight' => $arr['ladenWeight'] ?? null,
            'laden_unit' => $arr['LadUnit'] ?? null,
            'color_of_vehicle_id' => $arr['ColorID'] ?? null,
            'registration_no' => isset($arr['RegNo']) ? strtoupper($arr['RegNo']) : null,
            'remarks' => $arr['Remarks'] ?? null,
            'secondregistration_date' => $arr['SecondRegistrationDate'] ?? null,
            'registration_date' => $arr['RegistrationDate'] ?? null,
            'fuel_type_id' => $arr['FueltypeID'] ?? null,
            'trailer_vehicle' => $tr ?? null,
            'wheelbox' => $arr['wheelbox'] ?? null,
            'vehicle_status' => $stat ?? null,
            'ac_type' => $arr['ac_type'] ?? null,
            'active_status' => $arr['active_status'] ?? null,
            'government_department' => $arr['govtDeprt'] ?? null,
        ])
            ->filter(function ($value) {
                return !is_null($value)
                    && strtolower(trim((string) $value)) !== 'undefined'
                    && strtolower(trim((string) $value)) !== 'null';
            })
            // ->filter(fn($value) => !is_null($value))
            ->toArray();

        $data = $che->update($f);


        $datat = transfer_owner::where(function ($query) use ($che) {
            $query->where('reg_id', $che->id)
                ->orWhere('registration_no', $che->registration_no);
        })
            ->where('eto_location_id', $arr['ETOLocation'])
            ->latest('transfer_code')
            ->latest(DB::raw('STR_TO_DATE(dates, "%Y-%m-%d %H:%i:%s")'))
            ->latest(DB::raw('STR_TO_DATE(dates, "%m %d %Y %h:%i:%s %p")'))
            ->first();

        if ($datat) {
            $datat->update([
                'owner_type_id'   => $arr['OwnerTypeID'],
                'owner_title_id'  => $arr['OwnerTitle'],
                'f_title'         => 0,
                'name'            => $name_,
                'old_cnic_no'     => $old_cnic_no,
                'new_cnic_no'     => $new_cnic_no,
                'f_name'          => $father_or_husband_name,
                'p_address'       => $arr['HouseNo'],
                'p_city'          => $arr['CityID'],
                'p_phone'         => $arr['Mobile'],
                'ntn_no'          => $ntn_no,
                'p_province'      => $arr['ProvinceID'],
                'remarks'         => $arr['Remarks'],
            ]);
        }



        if($data)
        {
            $data=register::where('registration_no' , strtoupper($arr['RegNo']))->where('eto_location_id', $arr['ETOLocation'])->first();

            $u=reg_cunit::where('reg_id',$data->id)->update([

                'cunit'=>$arr['EUnit']
            ]);
        }


        if ($OwnerTypeID == "3") {

            $reg=regowner::where('reg_id',$data->id)->get();


            if($reg->count()>0)
            {
                foreach($reg as $o)
                {
                    $o->delete();
                }

            }

            $OwnerName= explode (",", $arr['OwnerName']);
            $OldCNIC= explode (",", $arr['OldCNIC']);
            $NewCNIC= explode (",", $arr['NewCNIC']);
            $FatherHusband= explode (",", $arr['FatherHusband']);

            for($i=0 ; $i < count($OwnerName) ; $i++)
            {
                $data4=regowner::create([
                    'reg_id'=> $data->id,
                    'name'=>$OwnerName[$i],
                    'old_cnic_no'=>$OldCNIC[$i]==null ? null : $OldCNIC[$i],
                    'new_cnic_no'=>$NewCNIC[$i],
                    'father_or_husband_name'=>$FatherHusband[$i],

                ]);
            }


        }
        // else if ($OwnerTypeID == "1") {

        //     $data4=regowner::create([
        //         'reg_id'=> $data->id,
        //         'name'=>$arr['OwnerName'],
        //         'old_cnic_no'=>$arr['OldCNIC'],
        //         'new_cnic_no'=>$arr['NewCNIC'],
        //         'father_or_husband_name'=>$arr['FatherHusband'],

        //     ]);

        // }


//        dd(additional_attachment_trailer::where('reg_no',$arr['RegNo'])->where('eto_location_id', $arr['ETOLocation'])->first());
        if($arr['IsTrailer'])
        {
            additional_trailer_vehicle::updateOrCreate(
                [
                    'reg_no' => $arr['RegNo'], // Match conditions
                    'eto_location_id' => $arr['ETOLocation']
                ],
                [
                    'user_id'=> Auth::user()->id,
                    'eto_location_id' => $arr['ETOLocation'],
                    'eto_name_id' => $arr['ETO'],
                    'Jurisdiction_id' => $arr['DivisionID'],
                    'reg_no' => $arr['RegNo'],
                    'unladen_weight' => $arr['UnladenWeight'],
                    'max_laden_weight' => $arr['MaxLadenWeight'],
                    'dates' => Carbon::now(),
                    'reg_id' => $data->id,
                    'type_of_body' => $arr['TrailerBodyTypeID'],
                    'unit_code' => $arr['UnitID'],
                    'front_axle' => $arr['FrontAxle'],
                    'rear_axle' => $arr['RearAxle'],
                    'any_other_axle' => $arr['AnyOtherAxle']
                ]
            );


            additional_attachment_trailer::updateOrCreate(
                [
                    'reg_no' => $arr['RegNo'], // Match conditions
                    'eto_location_id' => $arr['ETOLocation']
                ],
                [
                    'user_id'=> Auth::user()->id,
                    'eto_location_id' => $arr['ETOLocation'],
                    'eto_name_id' => $arr['ETO'],
                    'Jurisdiction_id' => $arr['DivisionID'],
                    'reg_no' => $arr['RegNo'],
                    'reg_id' => $data->id,
                    'tr_flag' => 1,
                    'max_lan_weight' => $arr['MaxLadenWeight'],
                    'axleunit' => $arr['AxleUnit'],
                    'max_lan_weight_front_axle' => $arr['AxleFrontAxle'],
                    'max_lan_weight_rear_axle' => $arr['AxleRearAxle'],
                    'max_lan_weight_any_other_axle' => $arr['AxleOtherAxle'],
                    'tyre_front_axle' => $arr['TyresFrontAxle'],
                    'tyre_rear_axle' => $arr['TyresRearAxle'],
                    'tyre_any_other_axle' => $arr['TyreOtherAxle'],
                    'dates' => Carbon::now(),
                ]
            );


        }

        return response()->json(['Status'=> true ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $d=register::find($id);
        if($d!=null)
        {
            $at=additional_trailer_vehicle::where('reg_id',$id)->first();
            $aa=additional_attachment_trailer::where('reg_id',$id)->first();
            $reg=regowner::where('reg_id',$id)->get();
            $unit=reg_cunit::where('reg_id',$id)->first();




            if($at!=null)
            {
                $at->delete();

            }
            if($aa!=null)
            {
                $aa->delete();
            }
            if($unit!=null)
            {
                $unit->delete();

            }
            if($reg->count()>0)
            {
                foreach($reg as $o)
                {
                    $o->delete();
                }

            }
            $d->delete();

        }
        return redirect()->back();
    }



    public function combinedata()
    {
        $dat=register::paginate(5) ;


        if($dat!=null)
        {
            foreach($dat as $data)
            {
                $datat=transfer_owner::where('registration_no',$data->registration_no)->where('eto_location_id',$data->eto_location_id)->get();
                $co=1;
                if($datat->count()>0)
                {
                    foreach($datat as $x)
                    {

                        if($datat->count()== $co)
                        {
                            $data->father_or_husband_name= $x->f_name;
                            $data->name_= $x->name;


                            $data->new_cnic_no= $x->new_cnic_no;
                            if($x->owner_type_id!=null)
                            {
                                $data->owner_type_id = $x->owner_type_id;

                            }
                            if($data->owner_type_id==null)
                            {
                                $data->owner_type_id = 1;

                            }
                            if($x->ntn_no==null)
                            {
                                $data->old_cnic_no= $x->old_cnic_no;
                            }
                            else
                            {
                                $data->old_cnic_no= $x->ntn_no;
                                $data->owner_type_id = 4;
                            }

                            if($x->owner_title_id!=0)
                            {
                                $data->title = $x->owner_title_id;

                            }
                            if($data->title==0)
                            {
                                $data->title = 4;

                            }


                            $city=cities::where('city_code', $x->p_city)->where('eto_location_id',$data->eto_location_id)->first();
                            $data->name_ = $x->name;
                            $data->old_cnic_no=$x->old_cnic_no;
                            $data->new_cnic_no = $x->new_cnic_no;
                            $data->father_or_husband_name = $x->f_name;
                            $data->house_no = $x->p_address;
                            $data->Province_id = $city!=null ? $city->province_id : null;
                            $data->City_id = $x->p_city;
                            $data->mobile_no = $x->p_phone;
                        }
                        $co++;
                    }
                }

                $alt = alteration::where('registration_no',$data->registration_no)->where('eto_location_id',$data->eto_location_id)->get();

                if($alt!=null)
                {
                    foreach($alt as $a)
                    {
                        if($a->new_alteration!=null)
                        {
                            if($a->alteration_code==1)
                            {
                                $data->seating_capacity= $a->new_alteration;
                            }
                            else if($a->alteration_code==2)
                            {
                                $data->engine_capacity=$a->new_alteration;
                            }
                            else if($a->alteration_code==3)
                            {
                                $data->wheelbox=$a->new_alteration;
                            }
                        }
                    }

                }
            }

        }
        $data= $dat;
        if(count($data)>0)
        {
            foreach($data as $d)
            {

                if($d->makers_name==null)
                {

                    $r = reg_maker::where('eto_location_id', $d->eto_location_id)->where('reg_no', $d->registration_no)->first();



                    if($r!=null)
                    {

                        $d->makers_name = $r->maker_code;
                    }
                }

                if($d->eto_location_id!=null)
                {

                    $eto = eto_location::find($d->eto_location_id);

                    $d->eto_location= $eto->eto_location;

                }
                if($d->type_of_body!=null)
                {

                    $eto = type_of_body::where('eto_location_id', $d->eto_location_id)->where('tob_code',$d->type_of_body)->first();

                    $d->type_of_body= $eto->type_of_body;

                    if($eto->category_of_vehicle_id==1)
                    {
                        $d->category_of_vehicle= "Commercial";
                    }


                    elseif($eto->category_of_vehicle_id==2)
                    {
                        $d->category_of_vehicle= "Non Commercial";
                    }



                }

            }

            $data = $data->sortBy('type_of_body');


            return view('CheckChassisNo.list_CheckChassisNo')->with(['data'=>$data ,'ser'=>$val , 'pagi'=> true]);
        }



        // combine_data
        return $data;
    }




    public function Search(Request $request)
    {
        $val= $request->input('search');
        $table= $request->input('table');

        if($table=="register")
        {
            if($val!="")
            {
                $dat=register::where('chassis_no','LIKE', '%' .trim($val,''))
                    ->orWhere('registration_no', 'LIKE', '%' .trim($val,''))
                    ->paginate(15)
                    ->setpath('/CheckChassisNo');

                $dat->appends(array(
                    'search'=> $val
                ));

                if($dat!=null)
                {
                    foreach($dat as $data)
                    {
                        $transferOwnerService = new TransferOwnerService();
                        $data = $transferOwnerService->processTransferOwnerData($data);

                        $alt = alteration::where('registration_no',$data->registration_no)->where('eto_location_id',$data->eto_location_id)->get();

                        if($alt!=null) {
                            foreach($alt as $a) {
                                if($a->new_alteration!=null) {
                                    if($a->alteration_code==1) {
                                        $data->seating_capacity= $a->new_alteration;
                                    } else if($a->alteration_code==2) {
                                        $data->engine_capacity=$a->new_alteration;
                                    } else if($a->alteration_code==3) {
                                        $data->wheelbox=$a->new_alteration;
                                    }
                                }
                            }
                        }
                    }
                }
                $data= $dat;

                if(count($data)>0) {
                    foreach($data as $d) {

                        $r = reg_maker::where('eto_location_id', $d->eto_location_id)->where('reg_no', $d->registration_no)->first();

                        if($r!=null) {
                            $m= manufacturer::where('eto_location_id', $d->eto_location_id)->where('code',$r->maker_code)->first();
                            if($m!=null) {
                                $d->makers_name = $m->manufacturer;
                            }
                        } else {
                            $m= manufacturer::where('eto_location_id', $d->eto_location_id)->where('code',$d->makers_name)->first();

                            if ($m!=null){
                                $d->makers_name = $m->manufacturer;
                            }
                        }


//                        if($d->makers_name!=null) {
//                            $m= manufacturer::where('eto_location_id', $d->eto_location_id)->where('code',$d->makers_name)->first();
//
//                            if ($m!=null){
//                                $d->makers_name = $m->manufacturer;
//                            }
//                        }else{
//                            $r = reg_maker::where('eto_location_id', $d->eto_location_id)->where('reg_no', $d->registration_no)->first();
//
//                            if($r!=null) {
//                                $m= manufacturer::where('eto_location_id', $d->eto_location_id)->where('code',$r->maker_code)->first();
//                                if($m!=null) {
//                                    $d->makers_name = $m->manufacturer;
//                                }
//                            }
//                        }

                        if($d->eto_location_id!=null) {
                            $eto = eto_location::find($d->eto_location_id);
                            $d->eto_location= $eto->eto_location;
                        }
                        if($d->type_of_body!=null) {
                            $eto = type_of_body::where('eto_location_id', $d->eto_location_id)->where('tob_code',$d->type_of_body)->first();

                            if (!is_null($eto)){
                                $d->type_of_body= $eto->type_of_body;

                                if($eto->category_of_vehicle_id==1) {
                                    $d->category_of_vehicle= "Commercial";
                                } elseif($eto->category_of_vehicle_id==2) {
                                    $d->category_of_vehicle= "Non Commercial";
                                }
                            }

                        }
                    }

                    $data = $data->sortBy('type_of_body');


                    return view('CheckChassisNo.list_CheckChassisNo')->with(['data'=>$data ,'ser'=>$val , 'pagi'=> true]);
                }


                return view('CheckChassisNo.list_CheckChassisNo')->withMessage("No Records Found");
            }
            else
            {
                $data= register::orderBy('id', 'DESC')->paginate(15);
                return view('CheckChassisNo.list_CheckChassisNo')->with('data',$data);
            }
        }
        else if($table=="voucher")
        {
            if($val!="")
            {
                $dat=voucher_managment::where('challan_no','LIKE', '%' .trim($val,''))
                    ->orWhere('reg_no', 'LIKE', '%' .trim($val,''))
                    ->paginate(15)
                    ->setpath('/voucher');
                $dat->appends(array(
                    'search'=> $val
                ));

                if($dat!=null)
                {
                    foreach($dat as $data)
                    {
                        $datat=transfer_owner::where('registration_no',$data->registration_no)->where('eto_location_id',$data->eto_location_id)->get();
                        $co=1;
                        if($datat->count()>0)
                        {
                            foreach($datat as $x)
                            {

                                if($datat->count()== $co)
                                {
                                    $data->father_or_husband_name= $x->f_name;
                                    $data->name_= $x->name;


                                    $data->new_cnic_no= $x->new_cnic_no;
                                    if($x->owner_type_id!=null)
                                    {
                                        $data->owner_type_id = $x->owner_type_id;

                                    }
                                    if($data->owner_type_id==null)
                                    {
                                        $data->owner_type_id = 1;

                                    }
                                    if($x->ntn_no==null)
                                    {
                                        $data->old_cnic_no= $x->old_cnic_no;
                                    }
                                    else
                                    {
                                        $data->old_cnic_no= $x->ntn_no;
                                        $data->owner_type_id = 4;
                                    }

                                    if($x->owner_title_id!=0)
                                    {
                                        $data->title = $x->owner_title_id;

                                    }
                                    if($data->title==0)
                                    {
                                        $data->title = 4;

                                    }


                                    $city=cities::where('city_code', $x->p_city)->where('eto_location_id',$data->eto_location_id)->first();
                                    $data->name_ = $x->name;
                                    $data->old_cnic_no=$x->old_cnic_no;
                                    $data->new_cnic_no = $x->new_cnic_no;
                                    $data->father_or_husband_name = $x->f_name;
                                    $data->house_no = $x->p_address;
                                    $data->Province_id = $city!=null ? $city->province_id : null;
                                    $data->City_id = $x->p_city;
                                    $data->mobile_no = $x->p_phone;
                                }
                                $co++;
                            }
                        }

                        $alt = alteration::where('registration_no',$data->registration_no)->where('eto_location_id',$data->eto_location_id)->get();

                        if($alt!=null)
                        {
                            foreach($alt as $a)
                            {
                                if($a->new_alteration!=null)
                                {
                                    if($a->alteration_code==1)
                                    {
                                        $data->seating_capacity= $a->new_alteration;
                                    }
                                    else if($a->alteration_code==2)
                                    {
                                        $data->engine_capacity=$a->new_alteration;
                                    }
                                    else if($a->alteration_code==3)
                                    {
                                        $data->wheelbox=$a->new_alteration;
                                    }
                                }
                            }

                        }
                    }

                }
                $data= $dat;

                if(count($data)>0)
                {
                    return view('voucher_management.voucher')->with(['v'=>$data ,'ser'=>$val]);
                }
                else
                {
                    $data= voucher_managment::orderBy('id','desc')->paginate(15);
                    return view('voucher_management.voucher')->with(['v'=>$data ,'message'=>"No Records Found"]);

                }

            }
            else
            {
                $data= voucher_managment::orderBy('id','desc')->paginate(15);
                return view('voucher_management.voucher')->with('v',$data);
            }
        }

    }

    //ultrasoft changes
    public function SearchCnic(Request $request)
    {
        $search = trim($request->input('search'));

        if (empty($search)) {
            return redirect()->back()->with('message', 'Please enter CNIC or NTN number.');
        }

        $data = collect();

        $registerData = \App\Models\register::where('active_status', 'Active')->where(function($q) use ($search) {
            $q->where('new_cnic_no', 'LIKE', "%{$search}%")->orWhere('old_cnic_no', 'LIKE', "%{$search}%")->orWhere('ntn_no', 'LIKE', "%{$search}%");
        })->latest('id')->get();

        $transferData = \App\Models\transfer::where(function($q) use ($search) {
            $q->where('new_cnic_no', 'LIKE', "%{$search}%")->orWhere('old_cnic_no', 'LIKE', "%{$search}%")->orWhere('ntn_no', 'LIKE', "%{$search}%");
        })->with('register')->orderByDesc('transfer_code')->get()->groupBy('reg_id')->map(fn($grouped) => $grouped->first())
            ->filter(fn($transfer) => $transfer->register && $transfer->register->active_status == 'Active')->values();

        $transferredVehicles = $transferData->map(function($transfer) {
            $vehicle = $transfer->register;
            $vehicle->name_ = $transfer->name ?? $vehicle->name_;
            $vehicle->father_or_husband_name = $transfer->f_name ?? $vehicle->father_or_husband_name;
            $vehicle->new_cnic_no = $transfer->new_cnic_no ?? $vehicle->new_cnic_no;
            $vehicle->old_cnic_no = $transfer->old_cnic_no ?? $vehicle->old_cnic_no;
            $vehicle->ntn_no = $transfer->ntn_no ?? $vehicle->ntn_no;
            $vehicle->address = $transfer->c_address ?? $transfer->p_address ?? $vehicle->address;
            $vehicle->mobile_no = $transfer->c_phone ?? $transfer->p_phone ?? $vehicle->mobile_no;

            if ($transfer->transfer_date) {
                $vehicle->transfer_info = "Transferred on: " . $transfer->transfer_date;
            }
            return $vehicle;
        });

        $data = $registerData->merge($transferredVehicles)->unique('id')->values();

        foreach ($data as $d) {
            if (!empty($d->makers_name)) {
                $m = \App\Models\manufacturer::where('eto_location_id', $d->eto_location_id)->where('code', $d->makers_name)->first();
                if ($m) $d->makers_name = $m->manufacturer;
            }

            if (!empty($d->eto_location_id)) {
                $eto = \App\Models\eto_location::find($d->eto_location_id);
                if ($eto) $d->eto_location = $eto->eto_location;
            }

            if (!empty($d->type_of_body)) {
                $body = \App\Models\type_of_body::where('eto_location_id', $d->eto_location_id)
                    ->where('tob_code', $d->type_of_body)->first();
                if ($body) {
                    $d->type_of_body = $body->type_of_body;
                    $d->category_of_vehicle = $body->category_of_vehicle_id == 1 ? 'Commercial' : ($body->category_of_vehicle_id == 2 ? 'Non Commercial' : null);
                }
            }
        }

        if ($data->isEmpty()) {
            return view('CheckCnic.list_CheckCnic', [
                'message' => 'No active vehicle found for this CNIC or NTN.',
                'ser' => $search,
            ]);
        }

        $page = FacadeRequest::input('page', 1);
        $perPage = 15;
        $items = $data->slice(($page - 1) * $perPage, $perPage)->values();

        $paginatedData = new LengthAwarePaginator(
            $items,
            $data->count(),
            $perPage,
            $page,
            ['path' => url('SearchCnic'), 'query' => ['search' => $search]]
        );

        return view('CheckCnic.list_CheckCnic')->with('data', $paginatedData)->with('ser', $search)->with('pagi', false);
    }

}
