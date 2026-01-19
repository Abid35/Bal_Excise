<?php



namespace App\Http\Controllers;



use App\Models\transfer;
use App\Models\UnregisteredNumber;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;

use App\Models\eto_location;

use App\Models\eto_name;
use App\Models\government_departments;

use App\Models\type_of_body;

use App\Models\source_of_procurement;

use App\Models\route_permit;

use App\Models\register;

use App\Models\province;

use App\Models\owner_type;

use App\Models\old_to_new_rms;

use App\Models\new_owner;

use App\Models\manufacturer;

use App\Models\jurisdiction;

use App\Models\issuing_authority;

use App\Models\fuel_type;

use App\Models\colors;

use App\Models\class_of_vehicle;

use App\Models\cities;

use App\Models\category_of_vehicle;

use App\Models\capacity_unit;

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

use App\Models\procurement;

use App\Models\alteration;

use App\Models\fees;

use App\Models\duration;

use App\Models\voucher_managment;

use App\Models\fedral_tax;
use App\Models\calculation_type;

use App\Models\arreargov_type;

use App\Models\regowner;

use App\Models\transfer_owner;

use App\Models\conversion;

use App\Models\cancellation;

use App\Models\book_issue;

use App\Models\reason;

use App\Models\designation;

use App\Models\officer_name;
use App\Models\arrival;
use App\Models\arrival_other_details;
use App\Models\additional_trailer_arrival;
use App\Models\arrivalowner;
use App\Models\dependent;
use App\Models\multiconstant;
use App\Models\voucher_arrears;
use App\Models\vouchers_ids;
use App\Services\TransferOwnerService;
use App\Services\VoucherService;




use App\Models\reg_cunit;
use App\Models\reg_maker;

use DB;
use Carbon\Carbon;
use App\Traits\Taxes\Smartcard;



class GetDataController extends Controller

{
    use Smartcard;
    protected $transferOwnerService, $voucherService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(TransferOwnerService $transferOwnerService, VoucherService $voucherService)

    {

        $this->middleware('auth');
        $this->transferOwnerService = $transferOwnerService;
        $this->voucherService = $voucherService;

    }

    /**

     * Display a listing of the resource.

     *

     * @return Response

     */

    public function data($type , Request $request)
    {
        if($type=="LoadETOLoction")

        {



            $data=eto_location::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadETO")

        {
//                if (auth()->user()->eto_location_id == 18){
//                    $eto_id = 6;
//                }
//                else
//                if (auth()->user()->eto_location_id == 24){
//                    $eto_id = 7;
//                }
//                else {
//                }

            $eto_id = auth()->user()->eto_location_id;
            $data=eto_name::where('eto_location_id', $eto_id)->orderBy('eto_name')->get();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadIssuingAuthority")

        {

            $data=issuing_authority::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadBodyType")

        {

            if(isset($_GET['CategoryID']))

            {

                if (in_array(auth()->user()->eto_location_id, [13, 15, 21, 20, 25, 22, 26, 23])) {
                    $category_id = 1;
                }
//                else if (auth()->user()->eto_location_id == 16){
//                    $category_id = 4;
//                }
                else if (auth()->user()->eto_location_id == 18){
                    $category_id = 6;
                }
//                else if (auth()->user()->eto_location_id == 24){
//                    $category_id = 7;
//                }
                else {
                    $category_id = auth()->user()->eto_location_id;
                }

                if($_GET['CategoryID']!=0)
                {
                    $cat=[];
                    $c=0;
                    $data=type_of_body::where('category_of_vehicle_id',$_GET['CategoryID'])->where('eto_location_id', $category_id)->get();

                    foreach($data as $d)
                    {
                        $cat[$c]['id']=$d->tob_code;
                        $cat[$c]['type_of_body']=$d->type_of_body;
                        $c++;
                    }
                }
                else
                {
                    $cat=[];
                    $c=0;
                    $data=type_of_body::where('eto_location_id', $category_id)->orderBy('type_of_body')->get();
                    foreach($data as $d)
                    {
                        $cat[$c]['id']=$d->tob_code;
                        $cat[$c]['type_of_body']=$d->type_of_body;
                        $c++;
                    }

                }


                $data=$cat;

                return response()->json(['Status'=> true , 'Data'=>$data]);

            }

            else

            {


                $cat=[];
                $c=0;
                $data=type_of_body::where('eto_location_id', auth()->user()->eto_location_id)->get();
                foreach($data as $d)
                {
                    $cat[$c]['id']=$d->tob_code;
                    $cat[$c]['type_of_body']=$d->type_of_body;
                    $c++;
                }

                return response()->json(['Status'=> true , 'Data'=>$data]);

            }

        }

        else if($type=="LoadDivisions")

        {

            $data=jurisdiction::where('eto_location_id', auth()->user()->eto_location_id)->get();
            $prov=[];
            $c=0;
            foreach($data as $d)
            {
                $prov[$c]['id']=$d->Jurisdiction_code;
                $prov[$c]['Jurisdiction']=$d->Jurisdiction;
                $c++;
            }
            return response()->json(['Status'=> true , 'Data'=>$prov]);

        }

        else if($type=="LoadGovernmentDepartment")

        {

            $data = government_departments::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadRoles")

        {

            $data=designation::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadUser")

        {

            $data=officer_name::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadRegistrationMark")

        {

            $data=registration_marks::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadOwnerType")

        {

            $data=owner_type::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadOwnerTitle")

        {

            $data=owner_title::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadCategory")

        {

            $cat=[];
            $c=0;

            if (in_array(auth()->user()->eto_location_id, [13, 15, 21, 20, 25, 22, 26, 23])) {
                $category_id = 1;
            }
            else if (auth()->user()->eto_location_id == 16){
                $category_id = 4;
            }
            else if (auth()->user()->eto_location_id == 18){
                $category_id = 6;
            }
//            else if (auth()->user()->eto_location_id == 24){
//                $category_id = 7;
//            }
            else {
                $category_id = auth()->user()->eto_location_id;
            }

            $data=category_of_vehicle::where('eto_location_id', $category_id)->get();
            foreach($data as $d)
            {
                $cat[$c]['id']=$d->categ_code;
                $cat[$c]['category_of_vehicle']=$d->category_of_vehicle;
                $c++;
            }

            return response()->json(['Status'=> true , 'Data'=>$cat]);

        }

        else if($type=="LoadManufacturer")

        {

            if (in_array(auth()->user()->eto_location_id, [13, 15, 21, 20, 25, 22, 26, 23])) {
                $manufacturer_id = 1;
            }
            else if (auth()->user()->eto_location_id == 16){
                $manufacturer_id = 4;
            }
            else if (auth()->user()->eto_location_id == 18){
                $manufacturer_id = 6;
            }
            else if (auth()->user()->eto_location_id == 13){
                $manufacturer_id = 12;
            }
//            else if (auth()->user()->eto_location_id == 24){
//                $manufacturer_id = 7;
//            }
            else {
                $manufacturer_id = auth()->user()->eto_location_id;
            }


            $data=manufacturer::where('eto_location_id', $manufacturer_id)->orderBy('manufacturer')->get();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadCCs")

        {

            $cat=[];
            $c=0;
            $data=capacity_unit::where('eto_location_id', auth()->user()->eto_location_id)->get();
            foreach($data as $d)
            {
                $cat[$c]['id']=$d->cunit_code;
                $cat[$c]['unit']=$d->cunit;
                $c++;
            }

            return response()->json(['Status'=> true , 'Data'=>$cat]);

        }

        else if($type=="LoadFuelType")

        {

            $data=fuel_type::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadVehicleClass")

        {

            $cat=[];
            $c=0;

            if (in_array(auth()->user()->eto_location_id, [13, 15, 21, 20, 25, 22, 26, 23])) {
                $vehicle_class_id = 1;
            }
            else if (auth()->user()->eto_location_id == 16){
                $vehicle_class_id = 4;
            }
            else if (auth()->user()->eto_location_id == 18){
                $vehicle_class_id = 6;
            }
//            else if (auth()->user()->eto_location_id == 24){
//                $vehicle_class_id = 7;
//            }
            else {
                $vehicle_class_id = auth()->user()->eto_location_id;
            }

            $data=class_of_vehicle::where('eto_location_id', $vehicle_class_id)->orderBy('class_of_vehicle')->get();
            foreach($data as $d)
            {
                $cat[$c]['id']=$d->cov_code;
                $cat[$c]['class_of_vehicle']=$d->class_of_vehicle;
                $c++;
            }
            return response()->json(['Status'=> true , 'Data'=>$cat]);

        }

        else if($type=="LoadColor")

        {

            $data=colors::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadTrailerBodyType")

        {

            $cat=[];
            $c=0;
            if (in_array(auth()->user()->eto_location_id, [13, 15, 21, 20, 25, 22, 26, 23])) {
                $TrailerBodyType_id = 1;
            }
//            else if (auth()->user()->eto_location_id == 16){
//                $TrailerBodyType_id = 4;
//            }
            else if (auth()->user()->eto_location_id == 18){
                $TrailerBodyType_id = 6;
            }
//            else if (auth()->user()->eto_location_id == 24){
//                $TrailerBodyType_id = 7;
//            }
            else {
                $TrailerBodyType_id = auth()->user()->eto_location_id;
            }

            $data=type_of_body::where('eto_location_id', $TrailerBodyType_id)->get();
            foreach($data as $d)
            {
                $cat[$c]['id']=$d->tob_code;
                $cat[$c]['type_of_body']=$d->type_of_body;
                $c++;
            }

            return response()->json(['Status'=> true , 'Data'=>$cat]);

        }

        else if($type=="LoadUnit")

        {

            $cat=[];
            $c=0;
            if (in_array(auth()->user()->eto_location_id, [13, 15, 21, 20, 25, 22, 26, 23])) {
                $unit_id = 1;
            }
            else if (auth()->user()->eto_location_id == 16){
                $unit_id = 4;
            }
            else if (auth()->user()->eto_location_id == 18){
                $unit_id = 6;
            }
//            else if (auth()->user()->eto_location_id == 24){
//                $unit_id = 7;
//            }
            else {
                $unit_id = auth()->user()->eto_location_id;
            }

            $data=units::where('eto_location_id', $unit_id)->get();
            foreach($data as $d)
            {
                $cat[$c]['id']=$d->unit_code;
                $cat[$c]['unit']=$d->unit;
                $c++;
            }
            return response()->json(['Status'=> true , 'Data'=>$cat]);

        }

        else if($type=="LoadReasons")

        {

            $data=reason::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadEUnit")

        {

            $cat=[];
            $c=0;

            if (in_array(auth()->user()->eto_location_id, [13, 15, 21, 20, 25, 22, 26, 23])) {
                $e_unit_id = 1;
            }
            else if (auth()->user()->eto_location_id == 16){
                $e_unit_id = 4;
            }
            else if (auth()->user()->eto_location_id == 18){
                $e_unit_id = 6;
            }
//            else if (auth()->user()->eto_location_id == 24){
//                $e_unit_id = 7;
//            }
            else {
                $e_unit_id = auth()->user()->eto_location_id;
            }

            $data=capacity_unit::where('eto_location_id', $e_unit_id)->get();
            foreach($data as $d)
            {
                $cat[$c]['id']=$d->cunit_code;
                $cat[$c]['unit']=$d->cunit;
                $c++;
            }

            return response()->json(['Status'=> true , 'Data'=>$cat]);

        }

        else if($type=="LoadRoles")

        {

            $data=eto_name::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadName")

        {

            $data=eto_name::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadYears")

        {

            $data=years::orderBy('id', 'desc')->get();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadProvince")

        {
            $prov=[];
            $c=0;

            if (in_array(auth()->user()->eto_location_id, [13, 15, 21, 20, 25, 22, 26, 23])) {
                $province_id = 1;
            }
            else if (auth()->user()->eto_location_id == 16){
                $province_id = 4;
            }
            else if (auth()->user()->eto_location_id == 18){
                $province_id = 6;
            }
//            else if (auth()->user()->eto_location_id == 24){
//                $province_id = 7;
//            }
            else {
                $province_id = auth()->user()->eto_location_id;
            }

            $data=province::where('eto_location_id', $province_id)->get();
            foreach($data as $d)
            {
                $prov[$c]['id']=$d->province_code;
                $prov[$c]['province']=$d->province;
                $c++;
            }

            return response()->json(['Status'=> true , 'Data'=>$prov]);

        }

        else if($type=="LoadCity")

        {

            if (in_array(auth()->user()->eto_location_id, [13, 15, 21, 20, 25, 22, 26, 23])) {
                $city_id = 1;
            }
            else if (auth()->user()->eto_location_id == 16){
                $city_id = 4;
            }
            else if (auth()->user()->eto_location_id == 18){
                $city_id = 6;
            }
//            else if (auth()->user()->eto_location_id == 24){
//                $city_id = 7;
//            }
            else {
                $city_id = auth()->user()->eto_location_id;
            }

            $data=cities::where('province_id',$_GET['ProvinceID'])->where('eto_location_id', $city_id)->get();



            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadProcurementSource")

        {



            $data=source_of_procurement::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadBank")

        {



            $data=bank::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadBookType")

        {



            $data=application_type::all();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="LoadBranches")

        {



            $data=bank_branch::where('bank_id',$_GET['bankID'])->get();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="TransferCheckC")

        {



            $data=register::where('eto_location_id',$_GET['DivisionID'])->where('registration_no',$_GET['Regno'])->select('transfer_code')->first();

            return response()->json(['Status'=> true , 'Data'=>$data]);

        }

        else if($type=="RegistrationCheckC")

        {

            $ch=0;

            $data2=register::where('Jurisdiction_id',$_GET['DivisionID'])->where('registration_no',$_GET['Regno'])->first();
            if($data2!=null)
            {
                $data=cancellation::where('reg_id',$data2->id)->first();

                if($data==null)
                {
                    $ch=0;
                }
                else
                {
                    $ch=1;
                }
            }


            return response()->json(['Status'=> true , 'Data'=>$ch]);

        }

        else if($type=="GetRegistrationData")

        {

            $data=register::where('registration_no',$_GET['ID'])->where('eto_location_id',$_GET['Dis'])->first();

            $data2=additional_trailer_vehicle::where('reg_no',$_GET['ID'])->where('eto_location_id',$_GET['Dis'])->first();

            $data3=additional_attachment_trailer::where('reg_no',$_GET['ID'])->where('eto_location_id',$_GET['Dis'])->first();

            $data4=regowner::where('reg_id',$data->id)->get();

            $data= $data->toArray();

            $tob=type_of_body::where('tob_code', $data['type_of_body'])->where('eto_location_id', $_GET['Dis'])->first();
            if($data['category_of_vehicle_id']!="" || $data['category_of_vehicle_id']!=0 || $data['category_of_vehicle_id']!=null)
            {
                if(!empty($tob)){
                    $data['category_of_vehicle_id']= $tob->category_of_vehicle_id;
                }
            }

            $data= (object) $data;

            if($data!=null)
            {
                // hassan update code
                $data = $this->transferOwnerService->processTransferOwnerData($data);

                $r = reg_maker::where('eto_location_id', $data->eto_location_id)->where('reg_no', $data->registration_no)->first();

                if($r!=null) {
                    $m= manufacturer::where('eto_location_id', $data->eto_location_id)->where('code',$r->maker_code)->first();
                    if($m!=null) {
                        $data->makers_name = $m->code;
                    }
                } else {
                    $m= manufacturer::where('eto_location_id', $data->eto_location_id)->where('code',$data->makers_name)->first();

                    if ($m!=null){
                        $data->makers_name = $m->code;
                    }
                }


//                if($data->makers_name !=null) {
//
//                    $m= manufacturer::where('eto_location_id', $data->eto_location_id)->where('code',$data->makers_name)->first();
//
//                    if ($m!=null){
//                        $data->makers_name = $m->manufacturer;
//                    }
//                }else{
//                    $r = reg_maker::where('eto_location_id', $data->eto_location_id)->where('reg_no', $data->registration_no)->first();
//                    if($r!=null) {
//                        $m= manufacturer::where('eto_location_id', $data->eto_location_id)->where('code',$r->maker_code)->first();
//                        if($m!=null) {
//                            $data->makers_name = $m->manufacturer;
//                        }
//                    }
//                }

                if($data->City_id!="")
                {
                    $city=cities::where('city_code', $data->City_id)->where('eto_location_id',$data->eto_location_id)->first();

                    $data->Province_id= $city!=null ? $city->province_id : null;
                }

//                if($data->name_ != "" )
//                {
//
//                    $data->owner_type_id=1;
//
//                }

                if($data->house_no == "" )
                {

                    $data->house_no=$data->address;

                }




                $alt = alteration::where('registration_no',$_GET['ID'])->where('eto_location_id',$data->eto_location_id)->get();

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



            $data5=reg_cunit::where('reg_id',$data->id)->first();
            if($data!=null)
            {

                // $data5=units::where('unit_code',$data->unladen_unit)->first();

                // if($data5!=null)
                // {
                //     $data5= $data5->unit;
                // }


                // $data6=capacity_unit::where('cunit_code',$data5->cunit)->first();
                if($data5!=null)
                {
                    $data6= $data5->cunit;
                }
                else
                {
                    $data6=null;
                }
            }
            else
            {
                $data5=null;
                $data6=null;
            }




            return response()->json(['Status'=> true , 'Data'=>$data , 'Data2'=> $data2 , 'Data3'=> $data3 , 'Data4'=> $data4 , 'lunit'=> $data5 , 'cunit'=> $data6 ]);

        }

        else if($type=="GetProcurementList")

        {


            $data=procurement::find($_GET['ID']);

            $data2=agreement1::where('procurement_id',$_GET['ID'])->first();

            $data3=agreement2::where('procurement_id',$_GET['ID'])->first();

            $data4=new_owner::where('procurement_id',$_GET['ID'])->get();

            return response()->json(['Status'=> true , 'Data'=>$data , 'Data2'=> $data2 , 'Data3'=> $data3, 'Data4'=> $data4]);

        }

        else if($type=="LoadcategoryTypeAgainstBody")

        {



            $data=type_of_body::find($_GET['BodyTypeID']);

            return response()->json(['Status'=> true , 'Data'=>$data ]);

        }

        else if($type=="CheckExist")

        {

            $IsCNICExists=0;

            $IsMobileExists=0;

            $IsEmailExists=0;

            if($_GET['tableName']=="Procurement")
            {

                $data=new_owner::where('new_cnic',$_GET['NewCNIC'])->first();

                $data2=procurement::where('mobile',$_GET['Mobile'])->first();

                $data3=procurement::where('email',$_GET['Email'])->first();
            }
            elseif($_GET['tableName']=="NewArrival")
            {
                $data=arrivalowner::where('new_cnic_no',$_GET['NewCNIC'])->first();

                $data2=arrival::where('mobile_no',$_GET['Mobile'])->first();

                $data3=0;
            }



            if($data!=null)

            {

                $IsCNICExists=1;

            }



            if($data2!=null)

            {

                $IsMobileExists=1;

            }

            if($data3!=null)

            {

                $IsEmailExists=1;

            }





            return response()->json(['Status'=> false , 'IsCNICExists'=>$IsCNICExists , 'IsMobileExists'=> $IsMobileExists , 'IsEmailExists'=> $IsEmailExists]);

        }

        else if($type=="getVehicleInfoagainstId")
        {

            $data=register::where('eto_name_id', $_GET['ETO_CODE'])->where('registration_no', $_GET['RegNo'])->where('eto_location_id', $_GET['DistrictID'])->first();

            if($data!=null)
            {
                if($data->City_id!="")
                {
                    $city=cities::where('city_code', $data->City_id)->where('eto_location_id',$data->eto_location_id)->first();
                    $data->Province_id= $city!=null ? $city->province_id : null;
                }

                if($data->house_no == "" )
                {
                    $data->house_no=$data->address;
                }

                // hassan update code
                $data = $this->transferOwnerService->processTransferOwnerData($data);

                $alt = alteration::where('registration_no',$_GET['RegNo'])->where('eto_location_id',$data->eto_location_id)->get();

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

            if($data==null)
            {
                $data= arrival::where('registration_no', $_GET['RegNo'])->where('eto_location_id', $_GET['DistrictID'])->first();
                $tableused="arrival";
            }

            if($data!=null)
            {
                if($data->cancel_reg==1 )
                {
                    return response()->json(['Status'=> false , 'msg'=> "Vehicle had been Cancelled"  ]);
                }
                else if ($data->cancel_reg==-1)
                {
                    return response()->json(['Status'=> false , 'msg'=> "Vehicle had been stolen" ]);
                }
                else if ($data->vehicle_status==0 && $_GET['type']!="close")
                {
                    return response()->json(['Status'=> false , 'msg'=> "All Transactions Closed on this vehicle" ]);
                }
                else if ($data->vehicle_status==-2 )
                {
                    return response()->json(['Status'=> false , 'msg'=> "All Transactions Closed on this vehicle becuase of NOC" ]);
                }

                if($_GET['type']=="Alter" )
                {
                    $e=eto_name::where('eto_code',$data->eto_name_id)->where('eto_location_id', $_GET['DistrictID'])->first();
                    $data->eto_name_id = $e!=null ? $e->eto_name : "Not Assigned";
                    $alt=null;
                    $data2=additional_trailer_vehicle::where('reg_no', $_GET['RegNo'] )->first();
                    $data3=additional_attachment_trailer::where('reg_no', $_GET['RegNo'] )->first();
                    $alter_c=intval ($data->alter_code)+1;
                }

                if($_GET['type']=="Transfer")
                {
                    $data= $data->toArray();
                    $tob=type_of_body::where('tob_code', $data['type_of_body'])->where('eto_location_id', $_GET['DistrictID'])->first();
                    if($data['category_of_vehicle_id']!="" || $data['category_of_vehicle_id']!=0 || $data['category_of_vehicle_id']!=null)
                    {

                        $data['category_of_vehicle_id']= $tob->category_of_vehicle_id;

                    }

                    if($data['conversion_code']=="")
                    {
                        $data['conversion_code']=0;
                    }

                    $unassigned = UnregisteredNumber::where(function ($q) use ($data) {
                        $q->where('owner_cnic', $data['new_cnic_no']);

                        if (!empty($data['ntn_no'])) {
                            $q->orWhere('owner_ntn', $data['ntn_no']);
                        }
                    })
                        ->where('is_assigned', false)
                        ->get();

                    $data= (object) $data;
                    $data2= (object) $unassigned;
                    $data3= null;
                    $alt=null;
                    $alter_c=null;
                }


                if($_GET['type']=="Conversion")
                {
                    $data= $data->toArray();
                    $tob=type_of_body::where('tob_code', $data['type_of_body'])->where('eto_location_id', $_GET['DistrictID'])->first();
                    if($data['category_of_vehicle_id']!="" || $data['category_of_vehicle_id']!=0 || $data['category_of_vehicle_id']!=null)
                    {
                        if (!empty($tob)){
                            $data['category_of_vehicle_id']= $tob->category_of_vehicle_id;
                        }
                    }

                    if($data['conversion_code']=="")
                    {
                        $data['conversion_code']=0;
                    }
                    $data= (object) $data;

                    $data2=null;
                    $data3=null;
                    $alt=null;
                    $alter_c=null;
                }


                if($_GET['type']=="Cancellation")
                {
                    $data= $data->toArray();
                    $tob=type_of_body::where('tob_code', $data['type_of_body'])->where('eto_location_id', $_GET['DistrictID'])->first();
                    if($data['category_of_vehicle_id']!="" || $data['category_of_vehicle_id']!=0 || $data['category_of_vehicle_id']!=null)
                    {

                        $data['category_of_vehicle_id']= $tob->category_of_vehicle_id;

                    }

                    $data= (object) $data;
                    $data2=null;
                    $data3=additional_trailer_vehicle::where('reg_id', $data->id )->first();
                    $alt=null;
                    $alter_c=null;
                }
                if($_GET['type']=="bookissue")
                {
                    $data= $data->toArray();
                    $tob=type_of_body::where('tob_code', $data['type_of_body'])->where('eto_location_id', $_GET['DistrictID'])->first();
                    if($data['category_of_vehicle_id']!="" || $data['category_of_vehicle_id']!=0 || $data['category_of_vehicle_id']!=null)
                    {

                        $data['category_of_vehicle_id']= $tob->category_of_vehicle_id;

                    }
                    $data= (object) $data;
                    $data2=null;
                    $data3=null;
                    $alt=null;
                    $alter_c=null;
                }
                if($_GET['type']=="close")
                {

                    $data2=null;
                    $data3=null;
                    $alt=null;
                    $alter_c=null;
                }
                $status=true;
            }
            else
            {
                $data2=null;
                $data3=null;
                $data4=null;
                $alt=null;
                $alter_c=null;
                $status=false;
            }

            return response()->json(['Status'=>  $status , 'Data'=>$data , 'Data2'=>$data2 , 'Data3'=>$data3 , 'alter_c'=> $alter_c, 'alt'=>$alt]);

        }

        else if($type=="AltCheckC")

        {
            //transfer work transfer code asend
            $data=0;

            return response()->json(['Status'=> true , 'Data'=>$data ]);

        }

        else if($type=="GetTaxTypeName")

        {

            $data=fees::where('gov_id',$_GET['ID'])->get();

            return response()->json(['Status'=> true , 'Data'=>$data ]);

        }

        else if($type=="getVehicleInfo")
        {
            $ProfessionalAmount=[];
            $FeeAmount=[];
            $count=0;
            $cc=0;
            $Status=true;
            $get_chec=[];
            $tok_=false;
            $tableused="reg";

//  $register = register::where('registration_no', $_GET['RegNo'])->first();
//              $voucherManagment = voucher_managment::where('registration_id', $register->id) // first priority
//     ->where('reg_no', $_GET['RegNo']) // second priority
//     ->where('status_voucher', 'Paid')
//     ->where('district_id', $_GET['DistrictID'])
//     ->orderBy('tax_app_year_to', 'Desc')
//     ->first();

            $voucherManagment = voucher_managment::where('reg_no', $_GET['RegNo'])
                ->where('status_voucher','Paid')
                ->where('district_id', $_GET['DistrictID'])
                ->orderBy('tax_app_year_to','Desc')->first();

//            $from_last_tax_date = '';
//            if (!empty($voucherManagment)){
//                if (!empty($voucherManagment->tax_app_year_to) && $voucherManagment->tax_app_year_to != null){
//                    $lastPaidYearDate = Carbon::createFromFormat('d/m/y', $voucherManagment->tax_app_year_to);
//                    $lastPaidYearDate->addDay();
//                    $from_last_tax_date = $lastPaidYearDate->format('d/m/y');
//                }
//            }

            $from_last_tax_date = '';
            if (!empty($voucherManagment)) {
                if (!empty($voucherManagment->tax_app_year_to) && $voucherManagment->tax_app_year_to != null) {
                    $lastPaidYearDate = Carbon::createFromFormat('d/m/y', $voucherManagment->tax_app_year_to);
                    if ($lastPaidYearDate !== false) {
                        $lastPaidYearDate->addDay();
                        $from_last_tax_date = $lastPaidYearDate->format('d/m/y');
                    } else {
                        $lastPaidYearDate = Carbon::createFromFormat('Y-m-d', $voucherManagment->tax_app_year_to);
                        if ($lastPaidYearDate !== false) {
                            $lastPaidYearDate->addDay();
                            $from_last_tax_date = $lastPaidYearDate->format('d/m/y');
                        }
                    }
                }
            }





            $data= register::where('registration_no', $_GET['RegNo'])->where('eto_location_id', $_GET['DistrictID'])->first();




            if($data!=null)
            {
                $data=$this->get_revised_transfer($data);


            }



            //  $data= register::where('registration_no', $_GET['RegNo'])->where('eto_location_id', $_GET['DistrictID'])->first();



            if($data==null) {
                $data= arrival::where('registration_no', $_GET['RegNo'])->where('eto_location_id', $_GET['DistrictID'])->first();
                $tableused="arrival";
            }
            else {
                if($data->cancel_reg==1) {
                    return response()->json(['Status'=> false , 'msg'=> "Vehicle had been Cancelled"  ]);

                }
                else if ($data->cancel_reg==-1) {
                    return response()->json(['Status'=> false , 'msg'=> "Vehicle had been stolen" ]);
                }
            }


            if($data!=null) {
                $data = ($this->get_revised_data($data , $tableused));

                $cat = $data[1];
                $data = $data[0];

                //get_chec
                $get_chec=$data;
                $data= (object) $data;


                if($data!=null) {
                    if($tableused!="arrival") {
                        $get=regowner::where('reg_id', $data->id)->first();
                    }
                    else {
                        $get=arrivalowner::where('arrival_id', $data->id)->first();
                    }
                }

                if($data!=null) {
                    $data2=voucher_managment::where('registration_id',$data->id)->where('status_voucher','Paid')->orderBy('last_paid_year','Desc')->first();
                }

                $fee=fees::all();
                $d=duration::all();

                $datauser=$get_chec;
                $total=0;
                $dtax=[];
                $test=[];
                $count=0;

                // register model object
                $product = new register;

                //get DB all coloums
                $columns = $product->getTableColumns();

                // define global arrays and variable
                $amm='';
                $ch=0;
                $ct=0;
                $check=true;
                $token=[];
                $index=0;
                $pasam=0;
                $token_ch=false;
                $ctax=[];
                $yearly=[];
                $yearly_ch=false;
                $ctax_ch=false;
                $ch_id=0;
                $fed=[];
                $cha=0;
                $capital=1;
                $fix=false;

                $electprice=env('ElectricVehiclePriceLimit');
                $date_reg = Carbon::parse($datauser['registration_date']);
                $now = Carbon::now();
                $diff_date = $date_reg->diffInYears($now);
                $datauser['234_year']= $diff_date;

                if(isset($_GET['taxes'])) {
                    //hassan
                    $todate = $_GET['todate'];
                    $fromdate = $_GET['fromdate'];
                    $to_Date = Carbon::parse($todate);
                    $from_Date = Carbon::parse($fromdate);
                    $months = $to_Date->diffInMonths($from_Date);


                    foreach($_GET['taxes'] as $x)
                    {
                        $h=1;
                        $excheck=true;
                        $dep=dependent::where('fees_id',$x)->get();
                        $r=fees::find($x);


                        // smartcard tax
                        if($x==27) {
                            $dtax = $this->setSmartCardData($dtax, $ct, $r, $x, $dep);
//                            $ct++;
                        }
                        if($x==24) {
                            if($_GET['ct']=="capital") {
                                if($datauser['engine_capacity'] > 1300 && $datauser['owner_type_id']!=2 && ($datauser['vehicle_price']!=0 || $datauser['vehicle_price']!="" )) {
                                    $dtax[$ct]['Name']=$r->title;
                                    $dtax[$ct]['id']=$x;
                                    $dtax[$ct]['type']=$r->type;
                                    $dtax[$ct]['Amount']= floatval ($datauser['vehicle_price']) * 0.01;
                                    $ct++;
                                }
                            }
                        }
                        //hassan
//                        if($x==14) {
//                            if($_GET['tax_dur14'] == 10){
//                                $dtax[$ct]['Name']=$r->title;
//                                $dtax[$ct]['id']=$x;
//                                $dtax[$ct]['type']=$r->type;
//                                $dtax[$ct]['Amount']= 100 ;
//                                $ct++;
//                            }elseif($_GET['tax_dur14'] == 13){
//                                $dtax[$ct]['Name']=$r->title;
//                                $dtax[$ct]['id']=$x;
//                                $dtax[$ct]['type']=$r->type;
//                                $dtax[$ct]['Amount']= 200 ;
//                                $ct++;
//                            }elseif($_GET['tax_dur14'] == 12){
//                                $dtax[$ct]['Name']=$r->title;
//                                $dtax[$ct]['id']=$x;
//                                $dtax[$ct]['type']=$r->type;
//                                $dtax[$ct]['Amount']= 300 ;
//                                $ct++;
//                            }elseif($_GET['tax_dur14'] == 11){
//                                $dtax[$ct]['Name']=$r->title;
//                                $dtax[$ct]['id']=$x;
//                                $dtax[$ct]['type']=$r->type;
//                                $dtax[$ct]['Amount']= 400 ;
//                                $ct++;
//                            }
//                        }


                        if($dep->count() > 0 ) {
                            // professional tax
                            if($x==25) {
                                $baseMultiplier = 1;
                                $multiplierIncrement = 1;
                                $maxTiers = 60;
                                foreach($dep as $y) {
                                    if($datauser['category_of_vehicle_id'] == 1 ) {
                                        $dtax[$ct]['Name']=$r->title;
                                        $dtax[$ct]['id']=$x;
                                        $dtax[$ct]['type']=$r->type;
                                        $tierIndex = $months >= 3 ? intdiv($months, 3) : 0;
                                        $tierIndex = min($tierIndex, $maxTiers - 1);
                                        $multiplier = $baseMultiplier + ($tierIndex * $multiplierIncrement);
                                        $dtax[$ct]['Amount']= $y->fixed_amount*$multiplier ;
                                        $ct++;
                                    }
                                }





//                                if ($months < 3){
//                                    foreach($dep as $y) {
//                                        if($datauser['category_of_vehicle_id'] == 1 ) {
//                                            $dtax[$ct]['Name']=$r->title;
//                                            $dtax[$ct]['id']=$x;
//                                            $dtax[$ct]['type']=$r->type;
//                                            $dtax[$ct]['Amount']= $y->fixed_amount*1 ;
//                                            $ct++;
//                                        }
//                                    }
//                                }elseif($months < 6){
//                                    foreach($dep as $y) {
//                                        if($datauser['category_of_vehicle_id'] == 1 ) {
//                                            $dtax[$ct]['Name']=$r->title;
//                                            $dtax[$ct]['id']=$x;
//                                            $dtax[$ct]['type']=$r->type;
//                                            $dtax[$ct]['Amount']= $y->fixed_amount*2 ;
//                                            $ct++;
//                                        }
//                                    }
//                                }elseif($months < 9){
//                                    foreach($dep as $y) {
//                                        if($datauser['category_of_vehicle_id'] == 1 ) {
//                                            $dtax[$ct]['Name']=$r->title;
//                                            $dtax[$ct]['id']=$x;
//                                            $dtax[$ct]['type']=$r->type;
//                                            $dtax[$ct]['Amount']= $y->fixed_amount*3 ;
//                                            $ct++;
//                                        }
//                                    }
//                                }elseif($months < 12){
//                                    foreach($dep as $y) {
//                                        if($datauser['category_of_vehicle_id'] == 1 ) {
//                                            $dtax[$ct]['Name']=$r->title;
//                                            $dtax[$ct]['id']=$x;
//                                            $dtax[$ct]['type']=$r->type;
//                                            $dtax[$ct]['Amount']= $y->fixed_amount*4 ;
//                                            $ct++;
//                                        }
//                                    }
//                                }

                            }
                            if($x==17) {
                                $dep=dependent::where('fees_id',$x)->where('type',$_GET['fillert'])->get();

                            }
                            if($x==21) {
                                $dep=dependent::where('fees_id',$x)->where('type2',$_GET['fillert'])->get();
                            }
                            if($x==22) {
                                $dep=dependent::where('fees_id',$x)->where('type2',$_GET['fillert'])->get();
                            }
                            if($x==23 && $_GET['opt']=='seat_cap') {

                                $str=$_GET['act'].'/'.$_GET['fillert'];
                                $dep=dependent::where('fees_id',$x)->where('type2',$str)->get();
                            }
                            if($x==23 && $_GET['opt']!='seat_cap') {
                                $dep=dependent::where('fees_id',$x)->where('type2',$_GET['fillert'])->get();
                            }
                            if($x==10) {
                                if($datauser['class_of_vehicle_id']==4 || $datauser['class_of_vehicle_id']==3) {
                                    $datauser["category_of_vehicle_id"]="";
                                } else {
                                    if($cat!=null) {
                                        $datauser["category_of_vehicle_id"]=$cat->categ_code;
                                    }
                                }
                            }


                            $i=0;
                            //Register Tax
                            foreach($dep as $d) {
                                if(str_contains($d->type, 'REG') && $this->getpara($d, $get_chec)) {
                                    $total=0;
                                    if(str_contains($d->dep_table_id, ',')) {
                                        $tab_id=explode(',',$d->dep_table_id);
                                    } elseif(str_contains($d->dep_table_id, '-')) {
                                        $tab_id=explode('-',$d->dep_table_id);
                                    }

                                    $tab_am=$d->fixed_amount;
                                    if($d->multiconstant_id !=0 ) {
                                        $ctax=[];
                                        $mul=multiconstant::find($d->multiconstant_id);

                                        $mulco=explode(',',$mul->title);

                                        foreach($mulco as $kkk=>$t) {
                                            $check=true;
                                            foreach($columns as $key=>$col) {
                                                if(str_contains($col, $t)) {
                                                    if(str_contains($mul->value, ',') ) {
                                                        $mul_vl=explode(',',$mul->value);

                                                        foreach(explode(';',$mul_vl[$kkk]) as $k=> $ids ) {
                                                            // $test[$ch]= $ids.'='.$amm[$k]."/";
                                                            // $ch++;
                                                            $index=$k;
                                                            if(str_contains($ids, '<') && str_contains($ids, '=')) {
                                                                if($datauser[$col]  <= str_ireplace( '<=', '', $ids) ) {
                                                                    $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                    $i++;
                                                                }
                                                            }elseif(str_contains($ids, '>') && str_contains($ids, '=')) {
                                                                if($datauser[$col]  >= str_ireplace( '>=', '', $ids) ) {
                                                                    $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                    $i++;
                                                                }
                                                            } elseif(str_contains($ids, '<')) {
                                                                if($datauser[$col]  < str_ireplace( '<', '', $ids) ) {
                                                                    $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                    $i++;
                                                                }
                                                            } elseif(str_contains($ids, '>')) {
                                                                if($datauser[$col]  > str_ireplace( '>', '', $ids) ) {
                                                                    $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                    $i++;
                                                                }
                                                            } elseif(str_contains($ids, '=')) {
                                                                if($datauser[$col]  == str_ireplace( '=', '', $ids) ) {
                                                                    $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                    $i++;
                                                                }
                                                            }
                                                        }
                                                    } elseif(str_contains($mul->value, ';') ) {
                                                        $mul_am=explode(';',$mul->value);
                                                        foreach($mul_am as $k=> $ids ) {
                                                            if(str_contains($ids, '<') && str_contains($ids, '=')) {
                                                                if($datauser[$col]  <= str_ireplace( '<=', '', $ids) ) {
                                                                    $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                    $i++;
                                                                }
                                                            }elseif(str_contains($ids, '>') && str_contains($ids, '=')) {
                                                                if($datauser[$col]  >= str_ireplace( '>=', '', $ids) ) {
                                                                    $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                    $i++;
                                                                }
                                                            } elseif(str_contains($ids, '<')) {
                                                                if($datauser[$col]  < str_ireplace( '<', '', $ids) ) {
                                                                    $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                    $i++;
                                                                }
                                                            } elseif(str_contains($ids, '>')) {
                                                                if($datauser[$col]  > str_ireplace( '>', '', $ids) ) {
                                                                    $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                    $i++;
                                                                }
                                                            } elseif(str_contains($ids, '=')) {
                                                                if(str_contains($ids, '-')) {
                                                                    $r=explode('-',str_ireplace( '=', '', $ids));
                                                                    if( $r[0] <= $datauser[$col] &&  $datauser[$col] <= $r[1] ) {
                                                                        $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                        $i++;
                                                                    }
                                                                } else {
                                                                    if($datauser[$col]  == str_ireplace( '=', '', $ids) ) {
                                                                        $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                        $i++;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        $amm=$mul->amount;
                                                        $ids=$mul->value;

                                                        if(str_contains($ids, '<=')) {
                                                            if($datauser[$col]  <= str_ireplace( '<=', ' ', $ids) ) {
                                                                $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                $i++;
                                                            }
                                                        }elseif(str_contains($ids, '>=')) {
                                                            if($datauser[$col]  >= str_ireplace( '>=', ' ', $ids) ) {
                                                                $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                $i++;
                                                            }
                                                        } elseif(str_contains($ids, '<')) {
                                                            if($datauser[$col]  < str_ireplace( '<', ' ', $ids)) {
                                                                $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                $i++;
                                                            }
                                                        }
                                                        elseif(str_contains($ids, '>')) {
                                                            if($datauser[$col]  > str_ireplace( '>', ' ', $ids) ) {
                                                                $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                $i++;
                                                            }
                                                        } elseif(str_contains($ids, '=')) {
                                                            if(str_contains($ids, '-')) {
                                                                $r=explode('-',str_ireplace( '=', '', $ids));
                                                                if( $r[0] <= $datauser[$col] &&  $datauser[$col] <= $r[1] ) {
                                                                    $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                    $i++;
                                                                }
                                                            } else {
                                                                if($datauser[$col]  == str_ireplace( '=', ' ', $ids) ) {
                                                                    $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                                                    $i++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {
                                        if($d->type2=="FIX") {
                                            $total=$total+( (float) $tab_am  );
                                        } else {
                                            $total=$total+( (float) $datauser['vehicle_price'] * ((float) $tab_am / (float) 100) );
                                        }
                                    }

                                    if($total!=0) {
                                        $r=fees::find($x);
                                        $test[$ch]= $d->id.'/'.$total.','.$datauser['vehicle_price'].','.$tab_am.','.$this->getpara($d, $get_chec);
                                        $ch++;
                                        // $test[$ch]= $d->id.'/'.$total.','.$datauser['vehicle_price'].','.$tab_am.','.$this->getpara($d, $get_chec);
                                        // $ch++;

                                        $dtax[$ct]['Name']=$r->title;
                                        $dtax[$ct]['id']=$x;
                                        $dtax[$ct]['type']=$r->type;
                                        $dtax[$ct]['Amount']=$total;
                                        $ct++;
                                    }
                                }
                            }

                            //Token Tax
                            // foreach($dep as $d)
                            //     {
                            //         $i=0;
                            //         $total=0;
                            //         $tab=explode(',',$d->dep_table);
                            //         if($x==16)
                            //         {
                            //             $test[$ch]= $d->id.'/'.$this->getpara($d, $get_chec);
                            //             $ch++;
                            //         }
                            //     }
                            // if($x==15)
                            // {
                            //     dd($dtax);

                            // }

                            if(!str_contains($d->type, 'REG')) {

                                foreach($dep as $d) {
                                    $i=0;
                                    $total=0;
                                    $tab=explode(',',$d->dep_table);
                                    if($d->multiconstant_id !=0 && !str_contains($d->amount, 'con')) {
                                        $ctax=[];
                                        $mul=multiconstant::find($d->multiconstant_id);
                                        //hassan
                                        if($mul!=null) {
                                            $mulco=explode(',',$mul->title);

                                            foreach($mulco as $kkk=>$t) {
                                                $check=true;
                                                foreach($columns as $key=>$col) {
                                                    if(str_contains($col, $t)) {

                                                        if(str_contains($mul->amount, ',') ) {

                                                            $mul_am=explode(',',$mul->amount);
                                                            $mul_vl=explode(',',$mul->value);

                                                            foreach(explode(';',$mul_vl[$kkk]) as $k=> $ids ) {
                                                                $amm=explode(';',$mul_am[$kkk]);
                                                                // $test[$ch]= $ids.'='.$amm[$k]."/";
                                                                // $ch++;
                                                                $index=$k;
                                                                if(str_contains($ids, '<') && str_contains($ids, '=')) {
                                                                    if($datauser[$col]  <= str_ireplace( '<=', '', $ids) ) {
                                                                        $total=$total+(float) $amm[$k];
                                                                        $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                        if($val['token_ch']) {
                                                                            $token=$val["token"];
                                                                            $token_ch=$val['token_ch'];
                                                                        }
                                                                        $total=$val["total"];
                                                                        if($x==23 && $total!=0 )
                                                                        {

                                                                            $test[$ch]=$d->id.'/1!'.$total;
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $ch++;
                                                                        }

                                                                        // $test[$ch]= $ids.'='.$amm[$k]."/".$datauser[$col].str_ireplace( '<=', '', $ids).$col ;
                                                                        // $ch++;
                                                                        $i++;

                                                                    }
                                                                }elseif(str_contains($ids, '>') && str_contains($ids, '='))
                                                                {
                                                                    if($datauser[$col]  >= str_ireplace( '>=', '', $ids) )
                                                                    {
                                                                        if($d->type=="PERWEIGHT/10"  )
                                                                        {   $l=explode('/',$d->type);

                                                                            if($datauser['234_year']<= $l[1])
                                                                            {
                                                                                $total=$total+((float) $d->fixed_amount * (float) $datauser['unladen_weight']);

                                                                            }
                                                                            else
                                                                            {
                                                                                $total=$total+(float) $amm[$k];
                                                                                $fed[$cha]=$total; $cha++;
                                                                                $fix=true;
                                                                                break;
                                                                            }

                                                                        }
                                                                        else
                                                                        {
                                                                            $total=$total+(float) $amm[$k];
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $fix=true;
                                                                            break;
                                                                        }
                                                                        $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                        if($val['token_ch'])
                                                                        {
                                                                            $token=$val["token"];
                                                                            $token_ch=$val['token_ch'];
                                                                        }
                                                                        $total=$val["total"];
                                                                        if($x==23 && $total!=0 )
                                                                        {
                                                                            $test[$ch]=$d->id.'/2!'.$total;
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $ch++;
                                                                        }
                                                                        // $test[$ch]= $ids.'='.$amm[$k]."/".$datauser[$col].str_ireplace( '<=', '', $ids).$col ;
                                                                        // $ch++;
                                                                        $i++;

                                                                    }
                                                                }
                                                                elseif(str_contains($ids, '<'))
                                                                {
                                                                    if($datauser[$col]  < str_ireplace( '<', '', $ids) )
                                                                    {

                                                                        $total=$total+(float) $amm[$k];
                                                                        $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                        if($val['token_ch'])
                                                                        {
                                                                            $token=$val["token"];
                                                                            $token_ch=$val['token_ch'];
                                                                        }
                                                                        $total=$val["total"];
                                                                        if($x==23 && $total!=0 )
                                                                        {
                                                                            $test[$ch]=$d->id.'/3!'.$total;
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $ch++;
                                                                        }
                                                                        // $test[$ch]= $ids.'='.$amm[$k]."/".$datauser[$col].str_ireplace( '<', '', $ids).$col ;
                                                                        // $ch++;
                                                                        $i++;

                                                                    }
                                                                }
                                                                elseif(str_contains($ids, '>'))
                                                                {
                                                                    if($datauser[$col]  > str_ireplace( '>', '', $ids) )
                                                                    {

                                                                        $total=$total+(float) $amm[$k];
                                                                        $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                        if($val['token_ch'])
                                                                        {
                                                                            $token=$val["token"];
                                                                            $token_ch=$val['token_ch'];
                                                                        }
                                                                        $total=$val["total"];
                                                                        if($x==23 && $total!=0 )
                                                                        {

                                                                            $test[$ch]=$d->id.'/4!'.$total;
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $ch++;
                                                                        }
                                                                        // $test[$ch]= $ids.'='.$amm[$k]."/".$datauser[$col].str_ireplace( '>', '', $ids).$col ;
                                                                        // $ch++;
                                                                        $i++;

                                                                    }
                                                                    else
                                                                    {
                                                                        if($d->type=="PERWEIGHT/10")
                                                                        {
                                                                            $total=$total+((float) $d->fixed_amount * (float) $datauser['unladen_weight']);
                                                                            $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                            if($val['token_ch'])
                                                                            {
                                                                                $token=$val["token"];
                                                                                $token_ch=$val['token_ch'];
                                                                            }
                                                                            $total=$val["total"];
                                                                            if($x==23)
                                                                            {
                                                                                $test[$ch]=$d->id.'/5!'.$total;
                                                                                $fed[$cha]=$total; $cha++;
                                                                                $ch++;
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                elseif(str_contains($ids, '='))
                                                                {
                                                                    if($datauser[$col]  == str_ireplace( '=', '', $ids) )
                                                                    {

                                                                        $total=$total+(float) $amm;
                                                                        $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                        if($val['token_ch'])
                                                                        {
                                                                            $token=$val["token"];
                                                                            $token_ch=$val['token_ch'];
                                                                        }
                                                                        $total=$val["total"];
                                                                        if($x==23 && $total!=0 )
                                                                        {
                                                                            $test[$ch]=$d->id.'/6!'.$total;
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $ch++;
                                                                        }
                                                                        // $test[$ch]= $ids.'='.$amm[$k]."/".$datauser[$col].str_ireplace( '=', '', $ids).$col ;
                                                                        // $ch++;
                                                                        $i++;

                                                                    }
                                                                }





                                                            }

                                                        }

                                                        elseif(str_contains($mul->amount, ';') )
                                                        {


                                                            $mul_am=explode(';',$mul->value);
                                                            $amm=explode(';',$mul->amount);

                                                            foreach($mul_am as $k=> $ids ) {

                                                                if(str_contains($ids, '<') && str_contains($ids, '=')) {

                                                                    //..hassan
                                                                    if($datauser[$col]  <= str_ireplace( '<=', '', $ids) )
                                                                    {

                                                                        $total=$total+(float) $amm[$k];
                                                                        $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                        if($val['token_ch'])
                                                                        {
                                                                            $token=$val["token"];
                                                                            $token_ch=$val['token_ch'];
                                                                        }
                                                                        $total=$val["total"];
                                                                        if($x==23 && $total!=0 )
                                                                        {
                                                                            $test[$ch]=$d->id.'/7!'.$total;
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $ch++;
                                                                        }
                                                                        // $test[$ch]= $ids.'='.$amm[$k]."/".$datauser[$col].str_ireplace( '<=', '', $ids).$col ;
                                                                        // $ch++;
                                                                        $i++;

                                                                    }
                                                                }
                                                                elseif(str_contains($ids, '>') && str_contains($ids, '=')) {

                                                                    if($datauser[$col]  >= str_ireplace( '>=', '', $ids) )
                                                                    {
                                                                        if($d->type=="PERWEIGHT/10"  )
                                                                        {   $l=explode('/',$d->type);

                                                                            if($datauser['234_year']<= $l[1])
                                                                            {

                                                                                $total=$total+((float) $d->fixed_amount * (float) $datauser['unladen_weight']);

                                                                            }
                                                                            else
                                                                            {
                                                                                $total=$total+(float) $amm[$k];
                                                                                $fed[$cha]=$total; $cha++;
                                                                                $fix=true;
                                                                                break;
                                                                            }

                                                                        }
                                                                        else
                                                                        {
                                                                            $total=$total+(float) $amm[$k];
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $fix=true;
                                                                            break;
                                                                        }

                                                                        $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                        if($val['token_ch'])
                                                                        {
                                                                            $token=$val["token"];
                                                                            $token_ch=$val['token_ch'];
                                                                        }
                                                                        $total=$val["total"];
                                                                        if($x==23 && $total!=0 )
                                                                        {
                                                                            $test[$ch]=$d->id.'/8!'.$total;
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $ch++;
                                                                        }
                                                                        // $test[$ch]= $ids.'='.$amm[$k]."/".$datauser[$col].str_ireplace( '<=', '', $ids).$col ;
                                                                        // $ch++;
                                                                        $i++;

                                                                    }
                                                                }
                                                                elseif(str_contains($ids, '<')) {
                                                                    if($datauser[$col]  < str_ireplace( '<', '', $ids) )
                                                                    {

                                                                        $total=$total+(float) $amm[$k];
                                                                        $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                        if($val['token_ch'])
                                                                        {
                                                                            $token=$val["token"];
                                                                            $token_ch=$val['token_ch'];
                                                                        }
                                                                        $total=$val["total"];
                                                                        if($x==23)
                                                                        {
                                                                            $test[$ch]=$d->id.'/9!'.$total;
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $ch++;
                                                                        }
                                                                        // $test[$ch]= $ids.'='.$amm[$k]."/".$datauser[$col].str_ireplace( '<', '', $ids).$col ;
                                                                        // $ch++;
                                                                        $i++;

                                                                    }
                                                                }
                                                                elseif(str_contains($ids, '>')) {

                                                                    if($datauser[$col]  > str_ireplace( '>', '', $ids) )
                                                                    {

                                                                        $total=$total+(float) $amm[$k];
                                                                        $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                        if($val['token_ch'])
                                                                        {
                                                                            $token=$val["token"];
                                                                            $token_ch=$val['token_ch'];
                                                                        }
                                                                        $total=$val["total"];
                                                                        if($x==23)
                                                                        {
                                                                            $test[$ch]=$d->id.'/10!'.$total;
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $ch++;
                                                                        }
                                                                        // $test[$ch]= $ids.'='.$amm[$k]."/".$datauser[$col].str_ireplace( '>', '', $ids).$col ;
                                                                        // $ch++;
                                                                        $i++;

                                                                    }
                                                                }
                                                                elseif(str_contains($ids, '=')) {


                                                                    if(str_contains($ids, '-')) {
                                                                        $r=explode('-',str_ireplace( '=', '', $ids));

                                                                        if( $r[0] <= $datauser[$col] &&  $datauser[$col] <= $r[1] ) {
                                                                            $total=$total+(float) $amm[$k];
                                                                            $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                            if($val['token_ch'])
                                                                            {
                                                                                $token=$val["token"];
                                                                                $token_ch=$val['token_ch'];
                                                                            }
                                                                            $total=$val["total"];
                                                                            if($x==23 && $total!=0 )
                                                                            {
                                                                                $test[$ch]=$d->id.'/11!'.$total;
                                                                                $fed[$cha]=$total; $cha++;
                                                                                $ch++;
                                                                            }
                                                                            // if($d->id==107)
                                                                            // {
                                                                            //     $test[$ch]= $r[0] .'-'. $r[1] . $amm[$k];
                                                                            //     $ch++;
                                                                            // }
                                                                            $i++;

                                                                        }
                                                                    } else {
                                                                        if($datauser[$col]  == str_ireplace( '=', '', $ids) )
                                                                        {
                                                                            // if($d->id==107)
                                                                            // {
                                                                            //     $test[$ch]= $ids.'='.$amm[$k]."/".$datauser[$col].str_ireplace( '=', '', $ids).$col.'//'.str_contains($ids, '=') ;
                                                                            //     $ch++;
                                                                            // }
                                                                            $total=$total+(float) $amm;
                                                                            $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                            if($val['token_ch'])
                                                                            {
                                                                                $token=$val["token"];
                                                                                $token_ch=$val['token_ch'];
                                                                            }
                                                                            $total=$val["total"];
                                                                            if($x==23 && $total!=0 )
                                                                            {
                                                                                $test[$ch]=$d->id.'/12!'.$total;
                                                                                $fed[$cha]=$total; $cha++;
                                                                                $ch++;
                                                                            }

                                                                            $i++;

                                                                        }
                                                                    }

                                                                } else {
                                                                    if($d->type=="PERWEIGHT/10")
                                                                    {
                                                                        $total=$total+((float) $d->fixed_amount * (float) $datauser['unladen_weight']);
                                                                        $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                        if($val['token_ch'])
                                                                        {
                                                                            $token=$val["token"];
                                                                            $token_ch=$val['token_ch'];
                                                                        }
                                                                        $total=$val["total"];
                                                                        if($x==23 && $total!=0 )
                                                                        {
                                                                            $test[$ch]=$d->id.'/13!'.$total;
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $ch++;
                                                                        }
                                                                    }
                                                                }




                                                            }

                                                        }
                                                        else
                                                        {
                                                            $amm=$mul->amount;
                                                            $ids=$mul->value;



                                                            if(str_contains($ids, '<='))
                                                            {

                                                                if($datauser[$col]  <= str_ireplace( '<=', ' ', $ids) )
                                                                {


                                                                    $total=$total+(float) $amm;

                                                                    $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                    if($val['token_ch'])
                                                                    {
                                                                        $token=$val["token"];
                                                                        $token_ch=$val['token_ch'];
                                                                    }
                                                                    $total=$val["total"];
                                                                    if($x==23 && $total!=0 )
                                                                    {
                                                                        $test[$ch]=$d->id.'/14!'.$total;
                                                                        $fed[$cha]=$total; $cha++;
                                                                        $ch++;
                                                                    }




                                                                    $i++;

                                                                }
                                                            }
                                                            elseif(str_contains($ids, '>='))
                                                            {

                                                                if($datauser[$col]  >= str_ireplace( '>=', ' ', $ids) )
                                                                {

                                                                    if($d->type=="PERWEIGHT/10"  )
                                                                    {   $l=explode('/',$d->type);
                                                                        //F3
                                                                        if($datauser['234_year']<= $l[1])
                                                                        {
                                                                            $total=$total+((float) $d->fixed_amount * (float) $datauser['unladen_weight']);

                                                                        }
                                                                        else
                                                                        {
                                                                            $total=$total+(float) $amm;
                                                                            $fed[$cha]=$total; $cha++;

                                                                            $fix=true;
                                                                            break;

                                                                        }



                                                                    }
                                                                    else
                                                                    {
                                                                        $total=$total+(float) $amm;
                                                                        $fed[$cha]=$total; $cha++;
                                                                        $fix=true;
                                                                        break;
                                                                    }

                                                                    // $test[$ch]= $ids.'='.$amm[$k];
                                                                    // $ch++;

                                                                    $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                    if($val['token_ch'])
                                                                    {
                                                                        $token=$val["token"];
                                                                        $token_ch=$val['token_ch'];
                                                                    }
                                                                    $total=$val["total"];
                                                                    if($x==23 && $total!=0 )
                                                                    {
                                                                        $test[$ch]=$d->id.'/15!'.$total;
                                                                        $fed[$cha]=$total; $cha++;
                                                                        $ch++;
                                                                    }


                                                                    $i++;

                                                                }
                                                                else
                                                                {
                                                                    if($d->id==111)
                                                                    {


                                                                        if($d->type=="PERWEIGHT/10"  )
                                                                        {   $l=explode('/',$d->type);

                                                                            if($datauser['234_year']<= $l[1])
                                                                            {
                                                                                $total=$total+((float) $d->fixed_amount * (float) $datauser['unladen_weight']);

                                                                            }
                                                                            else
                                                                            {
                                                                                $total=$total+(float) $amm;
                                                                                $fed[$cha]=$total; $cha++;
                                                                                $fix=true;
                                                                                break;
                                                                            }

                                                                        }
                                                                        else
                                                                        {
                                                                            $total=$total+(float) $amm;
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $fix=true;
                                                                            break;
                                                                        }
                                                                        $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                        if($val['token_ch'])
                                                                        {
                                                                            $token=$val["token"];
                                                                            $token_ch=$val['token_ch'];
                                                                        }
                                                                        $total=$val["total"];
                                                                        if($x==23 && $total!=0 )
                                                                        {
                                                                            $test[$ch]=$d->id.'/15!'.$total;
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $ch++;
                                                                        }


                                                                        $i++;
                                                                    }
                                                                }


                                                            }
                                                            elseif(str_contains($ids, '<'))
                                                            {
                                                                if($datauser[$col]  < str_ireplace( '<', ' ', $ids))
                                                                {

                                                                    $total=$total+(float) $amm;

                                                                    $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                    if($val['token_ch'])
                                                                    {
                                                                        $token=$val["token"];
                                                                        $token_ch=$val['token_ch'];
                                                                    }
                                                                    $total=$val["total"];
                                                                    if($x==23 && $total!=0 )
                                                                    {
                                                                        $test[$ch]=$d->id.'/16!'.$total;
                                                                        $fed[$cha]=$total; $cha++;
                                                                        $ch++;
                                                                    }

                                                                    $i++;

                                                                }
                                                            }
                                                            elseif(str_contains($ids, '>'))
                                                            {
                                                                if($datauser[$col]  > str_ireplace( '>', ' ', $ids) )
                                                                {

                                                                    $total=$total+(float) $amm;

                                                                    $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                    if($val['token_ch'])
                                                                    {
                                                                        $token=$val["token"];
                                                                        $token_ch=$val['token_ch'];
                                                                    }
                                                                    $total=$val["total"];
                                                                    if($x==23 && $total!=0 )
                                                                    {
                                                                        $test[$ch]=$d->id.'/17!'.$total;
                                                                        $fed[$cha]=$total; $cha++;
                                                                        $ch++;
                                                                    }

                                                                    $i++;

                                                                }

                                                            }
                                                            elseif(str_contains($ids, '='))
                                                            {
                                                                if(str_contains($ids, '-'))
                                                                {

                                                                    $r=explode('-',str_ireplace( '=', '', $ids));

                                                                    if( $r[0] <= $datauser[$col] &&  $datauser[$col] <= $r[1] )
                                                                    {

                                                                        $total=$total+(float) $amm;
                                                                        $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                        if($val['token_ch'])
                                                                        {
                                                                            $token=$val["token"];
                                                                            $token_ch=$val['token_ch'];
                                                                        }
                                                                        $total=$val["total"];
                                                                        if($x==23 && $total!=0 )
                                                                        {
                                                                            $test[$ch]=$d->id.'/19!'.$total;
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $ch++;
                                                                        }




                                                                        $i++;

                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    if($datauser[$col]  == str_ireplace( '=', ' ', $ids) )
                                                                    {

                                                                        $total=$total+(float) $amm;

                                                                        $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , $t , $_GET['tax_dur23'] );
                                                                        if($val['token_ch'])
                                                                        {
                                                                            $token=$val["token"];
                                                                            $token_ch=$val['token_ch'];
                                                                        }
                                                                        $total=$val["total"];
                                                                        if($x==23 && $total!=0 )
                                                                        {
                                                                            $test[$ch]=$d->id.'/20!'.$total;
                                                                            $fed[$cha]=$total; $cha++;
                                                                            $ch++;
                                                                        }

                                                                        $i++;

                                                                    }
                                                                }


                                                            }



                                                        }


                                                    }


                                                }


                                            }

                                        }


                                    }
                                    else if($d->multiconstant_id ==0 && !str_contains($d->amount, 'con'))
                                    {

                                        $val=$this->percc($x,$d, $get_chec , $total , $_GET['opt'] , 0 , $_GET['tax_dur23'] );
                                        if($val['token_ch'])
                                        {
                                            $token=$val["token"];
                                            $token_ch=$val['token_ch'];
                                        }
                                        $total=$val["total"];
                                        if($x==23 && $total!=0 )
                                        {
                                            $test[$ch]=$d->id.'/14!'.$total;
                                            $fed[$cha]=$total; $cha++;
                                            $ch++;
                                        }
                                        // if($x==4)
                                        // {
                                        //     dd($total);
                                        // }


                                    }


                                    if(isset($mulco)) {
                                        if(count($mulco)==($i)) {

                                            $r=fees::find($x);
                                            if($dep->count()==1  || $x==15) {
                                                $ctax[$r->title]=$total;
                                                break;
                                            }
                                            $ctax_ch=true;
                                        }
                                    }
                                    $h++;
                                }

                                if($x==23) {
                                    $r=fees::find($x);
                                    $ctax[$r->title]=0;

                                    // $pasam=$pasam+$total;

                                    foreach($fed as $f)
                                    {
                                        if($f!=0)
                                        {
                                            $ctax[$r->title]=$ctax[$r->title]+$f;

                                        }


                                    }


                                    if($fix==true)
                                    {
                                        $dtax[$ct]['Name']=$r->title;
                                        $dtax[$ct]['id']=$x;
                                        $dtax[$ct]['type']=$r->type;
                                        $dtax[$ct]['fix']=true;
                                        $dtax[$ct]['Amount']=$ctax[$r->title] ;
                                        $ct++;

                                    }



                                }





//                                hassan test
                                foreach($dep as $d) {
                                    $i=0;
                                    $total=0;

                                    if($d->dep_table!=0) {
                                        $tab=explode(',',$d->dep_table);

                                        if($d->ex_table!=0 && $d->ex_table!=null )
                                        {
                                            $extab=explode(',',$d->ex_table);
                                            foreach($extab as $kkk=>$t)
                                            {


                                                $check=true;
                                                foreach($columns as $key=>$col)
                                                {
                                                    if(str_contains($col, $t))
                                                    {
                                                        if(str_contains($d->ex_table_id, ','))
                                                        {
                                                            $extab_id=explode(',',$d->ex_table_id);

                                                        }
                                                        elseif(str_contains($d->ex_table_id, '-'))
                                                        {
                                                            $extab_id=explode('-',$d->ex_table_id);

                                                        }

                                                        if(str_contains($extab_id[$kkk], '-'))
                                                        {
                                                            foreach(explode('-',$extab_id[$kkk]) as $k=> $ids )

                                                            {
                                                                if($ids==$datauser[$col] )
                                                                {

                                                                    $excheck=false;

                                                                }
                                                            }
                                                        }
                                                        else
                                                        {
                                                            foreach($extab_id as $k=> $ids )

                                                            {
                                                                if($ids==$datauser[$col] )
                                                                {

                                                                    $excheck=false;

                                                                }
                                                            }
                                                        }

                                                    }
                                                }

                                            }
                                        }
                                    }

                                    $res=1;
                                    if($excheck)
                                    {

                                        if($x!=16 && $fix==false)
                                        {
                                            if($d->dep_table!=0)
                                            {
                                                $allow=false;
                                                foreach($tab as $kkk=>$t)
                                                {


                                                    $check=true;
                                                    foreach($columns as $key=>$col)
                                                    {

                                                        if(str_contains($col, $t))
                                                        {

                                                            if((str_contains($d->dep_table_id, ',') || str_contains($d->dep_table_id, '-') ) && $d->amount!=0 && $d->fixed_amount==0)
                                                            {



                                                                if(str_contains($d->dep_table_id, ','))
                                                                {
                                                                    $tab_id=explode(',',$d->dep_table_id);
                                                                    $tab_am=explode(',',$d->amount);
                                                                }
                                                                elseif(str_contains($d->dep_table_id, '-'))
                                                                {
                                                                    $tab_id=explode('-',$d->dep_table_id);
                                                                    $tab_am=explode('-',$d->amount);
                                                                }





                                                                if(str_contains($tab_id[$kkk], '-'))
                                                                {
                                                                    foreach(explode('-',$tab_id[$kkk]) as $k=> $ids )

                                                                    {

                                                                        if($tab_am[$kkk]=='con' && $k==$index)
                                                                        {
                                                                            if($datauser['type_of_body'] == $ids)
                                                                            {
                                                                                $l=explode('/',$d->type);

                                                                                if($x==23 && $datauser['234_year']<= $l[1])
                                                                                {

                                                                                    $total=$total+ 0;

                                                                                }
                                                                                else
                                                                                {
                                                                                    $r=fees::find($x);
                                                                                    $ctax[$r->title]=0;

                                                                                }
                                                                            }
                                                                        }
                                                                        else
                                                                        {
                                                                            if(str_contains($tab_am[$kkk], '-'))
                                                                            {
                                                                                $amm=explode('-',$tab_am[$kkk]);
                                                                            }


                                                                            if($ids==$datauser[$col] && $check)
                                                                            {
                                                                                // if($x==1 )
                                                                                // {
                                                                                //     // $test[$ch]= $ids.'/'.$datauser[$col].'/'.$col;
                                                                                //     $test[$ch]= $ids.'/'.$amm[$k].'if';

                                                                                //     $ch++;
                                                                                // }
                                                                                if(count($amm)==count(explode('-',$tab_id[$kkk])))
                                                                                {
                                                                                    if($d->multiconstant_id==0)
                                                                                    {
                                                                                        $total=(float) $amm[$k];
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $total=$total+(float) $amm[$k];
                                                                                    }

                                                                                }


                                                                                $allow=true;
                                                                                $i++;
                                                                                $check=false;
                                                                                $res=0;
                                                                            }
                                                                        }


                                                                        //   if($d->id==29 && $ids==2)
                                                                        //     {
                                                                        // $test[$ch]= $ids.'='.$datauser[$col].'/'.$col.$amm[$k].'id='.$d->id;
                                                                        // $ch++;
                                                                        // }

                                                                    }
                                                                }
                                                                else
                                                                {


                                                                    $amm=$tab_am;



                                                                    if(count($tab_id) >1 && $res)
                                                                    {
                                                                        foreach($tab_id as $k=> $ids )

                                                                        {

                                                                            if($ids==$datauser[$col] && $check)
                                                                            {
                                                                                // if($x==1 )
                                                                                // {
                                                                                //     // $test[$ch]= $ids.'/'.$datauser[$col].'/'.$col;
                                                                                //     $test[$ch]= $ids.'/'.$amm[$k].'else1';

                                                                                //     $ch++;
                                                                                // }
                                                                                if($d->multiconstant_id==0)
                                                                                {
                                                                                    $total=(float) $amm[$k];
                                                                                }
                                                                                else
                                                                                {
                                                                                    $total=$total+(float) $amm[$k];
                                                                                }


                                                                                $allow=true;
                                                                                $i++;
                                                                                $check=false;
                                                                            }
                                                                        }
                                                                    }
                                                                    else
                                                                    {
                                                                        if($tab_id[$kkk]==$datauser[$col] && $check)
                                                                        {
                                                                            // if($x==1 )
                                                                            // {
                                                                            //     // $test[$ch]= $ids.'/'.$datauser[$col].'/'.$col;
                                                                            //     $test[$ch]= $tab_id[$kkk].'/'.$amm[$kkk].'else2';

                                                                            //     $ch++;
                                                                            // }
                                                                            if($d->multiconstant_id==0)
                                                                            {
                                                                                $total=(float) $amm[$kkk];
                                                                            }
                                                                            else
                                                                            {
                                                                                $total=$total+(float) $amm[$kkk];
                                                                            }


                                                                            $allow=true;
                                                                            $i++;
                                                                            $check=false;
                                                                        }
                                                                    }





                                                                }


                                                            }
                                                            else if((str_contains($d->dep_table_id, ',') || str_contains($d->dep_table_id, '-') ) && $d->amount==0 && $d->fixed_amount!=0)
                                                            {
                                                                if(str_contains($d->dep_table_id, ','))
                                                                {
                                                                    $tab_id=explode(',',$d->dep_table_id);

                                                                }
                                                                elseif(str_contains($d->dep_table_id, '-'))
                                                                {
                                                                    $tab_id=explode('-',$d->dep_table_id);

                                                                }


                                                                $tab_am=$d->fixed_amount;



                                                                if(str_contains($d->type, 'PERWEIGHT') )
                                                                {
                                                                    if(str_contains($d->type, '/'))
                                                                    {
                                                                        $l=explode('/',$d->type);

                                                                        if($x==23 && $datauser['234_year']<= $l[1])
                                                                        {
                                                                            $r=fees::find($x);
                                                                            // $total=$total+ (float) $datauser['unladen_weight'] * (float) $tab_am ;
                                                                            $total=$ctax[$r->title];
                                                                            $ctax[$r->title]=0;
                                                                        }
                                                                    }
                                                                    $total=$total+( (float) $datauser['unladen_weight'] * (float) $tab_am  );
                                                                }
                                                                else if(str_contains($d->type, 'LIMIT'))
                                                                {
                                                                    $l=explode('/',$d->type);

                                                                    if($x==21 && $datauser['231b(2)_year']!= $l[1])
                                                                    {
                                                                        $r=fees::find($x);
                                                                        if($datauser['class_of_vehicle_id']==25 || $datauser['vehicle_price'] > $electprice)
                                                                        {
                                                                            if($d->type2=='F')
                                                                            {
                                                                                $total=$total + (20000.0 * ( (float) ($datauser['231b(2)_year']+1) * ((float) $tab_am / 100.0)  ));

                                                                            }
                                                                            else if($d->type2=='NF')
                                                                            {
                                                                                $total=$total + (60000.0 * ( (float) ($datauser['231b(2)_year']+1) * ((float) $tab_am / 100.0)  ));

                                                                            }

                                                                        }
                                                                        else
                                                                        {
                                                                            $total=$total+ $ctax[$r->title]*( (float) ($datauser['231b(2)_year']+1) * ((float) $tab_am / 100.0)  );

                                                                        }
                                                                        $ctax[$r->title]=0;
                                                                    }
                                                                    else if($x==23 && $datauser['234_year']<= $l[1] )
                                                                    {
                                                                        $total=$ctax[$r->title];
                                                                        $ctax[$r->title]=0;
                                                                    }
                                                                    // else if($x==23 && $datauser['234_year']!= $l[1] && $_GET['opt']=="cc_annual" && $datauser['category_of_vehicle_id']==2)
                                                                    // {

                                                                    //     $total=$ctax[$r->title];
                                                                    //     $ctax[$r->title]=0;
                                                                    // }
                                                                    else
                                                                    {
                                                                        $ctax[$r->title]=0;
                                                                    }

                                                                }
                                                                else if(str_contains($d->type, 'LT'))
                                                                {

                                                                    if($x==23 )
                                                                    {
                                                                        $total=$ctax[$r->title];

                                                                        $ctax[$r->title]=0;
                                                                    }


                                                                }
                                                                else
                                                                {
                                                                    $total=$total+((float) $tab_am  );
                                                                }

                                                                if(str_contains($tab_id[$kkk], '-'))
                                                                {
                                                                    foreach(explode('-',$tab_id[$kkk]) as $k=> $ids )

                                                                    {


                                                                        if($ids==$datauser[$col] && $check)
                                                                        {


                                                                            // $test[$ch]= $ids.'='.$amm[$k];
                                                                            // $ch++;
                                                                            $allow=true;
                                                                            $i++;
                                                                            $check=false;
                                                                            $res=0;
                                                                        }
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    if(count($tab_id) >1 && $res)
                                                                    {
                                                                        foreach($tab_id as $k=> $ids )

                                                                        {

                                                                            if($ids==$datauser[$col] && $check)
                                                                            {
                                                                                $allow=true;
                                                                                $i++;
                                                                                $check=false;
                                                                            }
                                                                        }
                                                                    }
                                                                    else
                                                                    {
                                                                        if($tab_id[$kkk]==$datauser[$col] && $check)
                                                                        {
                                                                            // if($x==6 )
                                                                            // {
                                                                            //     // $test[$ch]= $ids.'/'.$datauser[$col].'/'.$col;
                                                                            //     $test[$ch]= $tab_id[$kkk].'/'.$amm[$kkk];

                                                                            //     $ch++;
                                                                            // }


                                                                            $allow=true;
                                                                            $i++;
                                                                            $check=false;
                                                                        }
                                                                    }
                                                                    // foreach($tab_id as $k=> $ids )

                                                                    // {


                                                                    //     if($ids==$datauser[$col] && $check)
                                                                    //     {


                                                                    //         $i++;
                                                                    //         $check=false;
                                                                    //     }
                                                                    // }
                                                                }

                                                            }
                                                            else if((str_contains($d->dep_table_id, ',') || str_contains($d->dep_table_id, '-') ) && $d->amount==0 && $d->fixed_amount==0)
                                                            {
                                                                $tab_id=explode(',',$d->dep_table_id);
                                                                $tab_am=0;

                                                                if(str_contains($d->dep_table_id, ','))
                                                                {
                                                                    $tab_id=explode(',',$d->dep_table_id);

                                                                }
                                                                elseif(str_contains($d->dep_table_id, '-'))
                                                                {
                                                                    $tab_id=explode('-',$d->dep_table_id);

                                                                }


                                                                if(str_contains($d->type, 'PERWEIGHT') )
                                                                {
                                                                    if(str_contains($d->type, '/'))
                                                                    {
                                                                        $l=explode('/',$d->type);
                                                                        if($x==23 && $datauser['234_year']<= $l[1])
                                                                        {
                                                                            $r=fees::find($x);
                                                                            // $total=$total+ (float) $datauser['unladen_weight'] * (float) $tab_am ;
                                                                            $total=$ctax[$r->title];

                                                                            $ctax[$r->title]=0;
                                                                        }
                                                                    }
                                                                    $total=$total+( (float) $datauser['unladen_weight'] * (float) $tab_am  );
                                                                }
                                                                else if(str_contains($d->type, 'LIMIT'))
                                                                {
                                                                    $l=explode('/',$d->type);

                                                                    if($x==21 && $datauser['231b(2)_year']!= $l[1])
                                                                    {
                                                                        $r=fees::find($x);
                                                                        $total=$total+ $ctax[$r->title]*( (float) ($datauser['231b(2)_year']+1) * ((float) $tab_am / 100.0)  );
                                                                        $ctax[$r->title]=0;
                                                                    }
                                                                    else if($x==23 && $datauser['234_year']<= $l[1] )
                                                                    {
                                                                        $total=$ctax[$r->title];
                                                                        $ctax[$r->title]=0;
                                                                    }

                                                                    else
                                                                    {
                                                                        $ctax[$r->title]=0;
                                                                    }


                                                                }
                                                                else if(str_contains($d->type, 'LT'))
                                                                {

                                                                    if($x==23 && $datauser['234_year']<= $l[1])
                                                                    {
                                                                        $total=$ctax[$r->title];

                                                                        $ctax[$r->title]=0;
                                                                    }


                                                                }




                                                                if(str_contains($tab_id[$kkk], '-'))
                                                                {
                                                                    foreach(explode('-',$tab_id[$kkk]) as $k=> $ids )

                                                                    {


                                                                        if($ids==$datauser[$col] && $check)
                                                                        {


                                                                            $allow=true;
                                                                            $i++;
                                                                            $check=false;
                                                                            $res=0;
                                                                        }
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    if(count($tab_id) >1 && $res)
                                                                    {
                                                                        foreach($tab_id as $k=> $ids )

                                                                        {

                                                                            if($ids==$datauser[$col] && $check)
                                                                            {
                                                                                $allow=true;
                                                                                $i++;
                                                                                $check=false;
                                                                            }
                                                                        }
                                                                    }
                                                                    else
                                                                    {
                                                                        if($tab_id[$kkk]==$datauser[$col] && $check)
                                                                        {
                                                                            // if($x==6 )
                                                                            // {
                                                                            //     // $test[$ch]= $ids.'/'.$datauser[$col].'/'.$col;
                                                                            //     $test[$ch]= $tab_id[$kkk].'/'.$amm[$kkk];

                                                                            //     $ch++;
                                                                            // }


                                                                            $allow=true;
                                                                            $i++;
                                                                            $check=false;
                                                                        }
                                                                    }
                                                                    // foreach($tab_id as $k=> $ids )

                                                                    // {


                                                                    //     if($ids==$datauser[$col] && $check)
                                                                    //     {


                                                                    //         $i++;
                                                                    //         $check=false;
                                                                    //     }
                                                                    // }
                                                                }
                                                            }
                                                            else
                                                            {

                                                                $tab_id=$d->dep_table_id;
                                                                $tab_am=$d->amount;

                                                                if($tab_id==$datauser[$col])
                                                                {


                                                                    if(str_contains($d->type, 'PERWEIGHT') )
                                                                    {
                                                                        if(str_contains($d->type, '/'))
                                                                        {
                                                                            $l=explode('/',$d->type);
                                                                            if($x==23 && $datauser['234_year']<= $l[1])
                                                                            {
                                                                                $r=fees::find($x);
                                                                                // $total=$total+ (float) $datauser['unladen_weight'] * (float) $d->fixed_amount ;
                                                                                $total=$ctax[$r->title];


                                                                                $ctax[$r->title]=0;
                                                                            }
                                                                        }

                                                                    }
                                                                    else if(str_contains($d->type, 'LIMIT'))
                                                                    {

                                                                        $l=explode('/',$d->type);

                                                                        if($x==21 && $datauser['231b(2)_year']!= $l[1])
                                                                        {

                                                                            $r=fees::find($x);
                                                                            $total=$total+ ((float) $ctax[$r->title]*  ((float) $datauser['231b(2)_year']+ (float) 1) * ((float) $d->fixed_amount / 100.0)  );

                                                                            $ctax[$r->title]=0;
                                                                        }

                                                                        else if($x==23 && $datauser['234_year']<= $l[1] )
                                                                        {

                                                                            $total=$ctax[$r->title];

                                                                            $ctax[$r->title]=0;

                                                                        }
                                                                        else
                                                                        {
                                                                            $ctax[$r->title]=0;
                                                                        }


                                                                    }
                                                                    else if(str_contains($d->type, 'LT'))
                                                                    {




                                                                        if($x==23 )
                                                                        {
                                                                            $total=$ctax[$r->title];

                                                                            $ctax[$r->title]=0;
                                                                        }


                                                                    }
                                                                    else
                                                                    {
                                                                        if($d->multiconstant_id==0)
                                                                        {
                                                                            $total=(float) $tab_am;
                                                                        }
                                                                        else
                                                                        {
                                                                            $total=$total+(float) $tab_am;
                                                                        }


                                                                    }

                                                                    $i++;
                                                                    $allow=true;
                                                                }



                                                            }

                                                        }


                                                    }

                                                }

                                            }
                                            else
                                            {
                                                $total=$d->fixed_amount;




                                            }






                                            $r=fees::find($x);


                                            if($x==17 )
                                            {

                                                $dtax[$ct]['Name']=$r->title;
                                                $dtax[$ct]['id']=$x;
                                                $dtax[$ct]['type']=$r->type;

                                                // Electric Vehicle
                                                if($datauser['class_of_vehicle_id']==25 || $datauser['vehicle_price'] > $electprice)
                                                {
                                                    $dtax[$ct]['Amount']=$total+$ctax[$r->title];

                                                    if($d->type=='F')
                                                    {
                                                        $dtax[$ct]['Amount']=$dtax[$ct]['Amount'] *0.03;

                                                    }
                                                    else if($d->type=='NF')
                                                    {
                                                        $dtax[$ct]['Amount']=$dtax[$ct]['Amount'] *0.09;
                                                    }


                                                }
                                                else
                                                {
                                                    $dtax[$ct]['Amount']=$total+$ctax[$r->title];
                                                }

                                                $ct++;

                                            }
//                                            //surcharge
                                            if ($x == 13){
                                                $dtax[$ct]['Name']=$r->title;
                                                $dtax[$ct]['id']=$x;
                                                $dtax[$ct]['type']=$r->type;

                                                $baseMultiplier = 1;
                                                $multiplierIncrement = 1;
                                                $maxTiers = 60;

                                                $tierIndex = $months >= 3 ? intdiv($months, 3) : 0;
                                                $tierIndex = min($tierIndex, $maxTiers - 1);
                                                $multiplier = $baseMultiplier + ($tierIndex * $multiplierIncrement);
                                                $dtax[$ct]['Amount'] = $total * $multiplier;
                                                $ct++;
                                            }



                                            if(((count($tab)==($i) || $d->allow|| ($allow ?? false) ) ) && ($total!=0 || $ctax_ch) && $x!=17 && $x!=24 && $x!=25 && $x!=13)
                                            {
                                                $dtax[$ct]['Name']=$r->title;
                                                $dtax[$ct]['id']=$x;
                                                $dtax[$ct]['type']=$r->type;


                                                if(isset($ctax))
                                                {
                                                    if($ctax!=[])
                                                    {
                                                        $dtax[$ct]['Amount']=$total+$ctax[$r->title];
                                                    }
                                                    else
                                                    {
                                                        $dtax[$ct]['Amount']=$total;
                                                    }

                                                }
                                                else
                                                {

                                                    $dtax[$ct]['Amount']=$total;
                                                }

                                                $ct++;




                                                break;
                                            }

                                        }


                                    }
                                }
                            }






                            if($count == (count($_GET['taxes']) -1) ) {
                                break;
                            }
                            $count++;
                        }
                    }
                }
            } else {
                $Status=false;
                $data2=null;
                $dtax=null;
                $get=null;
                $token_ch=null;
                $token=null;
            }

//            dd($dtax);
//            echo "stop";
//            exit();

            //test response
            return response()->json([
                'from_last_tax_date'=> $from_last_tax_date ,
                'Status'=> $Status ,
                'Data'=>$data,
                'VehicleInfo'=>$data2 ,
                'FeeAmount'=> $dtax ,
                'Pdata'=> $get ,
                'token'=> $token ,
                'token_ch'=>$token_ch  ,
                'challan'=> rand()
            ]);
        }

        else if($type == "getVehicleInfo_test"){

            $validated = request()->validate([
                'RegNo' => 'required|string',
                'DistrictID' => 'required|integer',
                'taxes' => 'sometimes|array',
                'taxes.*' => 'integer',
                'fromdate' => 'sometimes',
                'todate' => 'sometimes',
                'ct' => 'sometimes|string',
                'opt' => 'sometimes|string',
                'fillert' => 'sometimes|string',
                'tax_dur23' => 'sometimes|string',
            ]);

            $regNo = $validated['RegNo'];
            $districtId = $validated['DistrictID'];
            $status = true;
            $tableUsed = 'reg';
            $taxes = [];
            $fromLastTaxDate = '';
            $token = [];
            $tokenCheck = false;
            $challan = rand();

            $voucher = voucher_managment::where('reg_no', $regNo)
                ->where('status_voucher', 'Paid')
                ->where('district_id', $districtId)
                ->orderByDesc('tax_app_year_to')
                ->first();

            if ($voucher && !empty($voucher->tax_app_year_to)) {
                $fromLastTaxDate = $this->voucherService->calculateLastTaxDate($voucher->tax_app_year_to);
            }

            $vehicle = register::where('registration_no', $regNo)
                ->where('eto_location_id', $districtId)
                ->first();

            if ($vehicle) {
                $vehicle = $this->voucherService->getRevisedTransfer($vehicle);
                if ($vehicle->cancel_reg == 1) {
                    return response()->json(['Status' => false, 'msg' => 'Vehicle has been cancelled']);
                }
                if ($vehicle->cancel_reg == -1) {
                    return response()->json(['Status' => false, 'msg' => 'Vehicle has been stolen']);
                }
            } else {
                $vehicle = arrival::where('registration_no', $regNo)
                    ->where('eto_location_id', $districtId)
                    ->first();
                $tableUsed = 'arrival';
            }

            if (!$vehicle) {
                return response()->json([
                    'Status' => false,
                    'msg' => 'Vehicle not found',
                    'from_last_tax_date' => $fromLastTaxDate,
                    'challan' => $challan,
                ]);
            }

            [$vehicleData, $category] = $this->voucherService->get_revised_transfer($vehicle, $tableUsed);

            $vehicleData = (object) $vehicleData;

            $owner = $tableUsed === 'reg'
                ? regowner::where('reg_id', $vehicleData->id)->first()
                : arrivalowner::where('arrival_id', $vehicleData->id)->first();

            $lastVoucher = voucher_managment::where('registration_id', $vehicleData->id)
                ->where('status_voucher', 'Paid')
                ->orderByDesc('last_paid_year')
                ->first();

            if (isset($validated['taxes'])) {
                $taxes = $this->voucherService->calculateTaxes($vehicleData, $category, $validated['taxes'], $validated);
            }

            return response()->json([
                'from_last_tax_date' => $fromLastTaxDate,
                'Status' => $status,
                'Data' => $vehicleData,
                'VehicleInfo' => $lastVoucher,
                'FeeAmount' => $taxes,
                'Pdata' => $owner,
                'token' => $token,
                'token_ch' => $tokenCheck,
                'challan' => $challan,
            ]);
        }

    }

    public function getpara($d, $datauser)
    {
        $product = new register;
        $columns = $product->getTableColumns();
        $tab=explode(',',$d->dep_table);
        $ch=0;
        $i=0;
        $mach=false;

        foreach($tab as $kkk=>$t)
        {
            foreach($columns as $key=>$col)
            {

                if(str_contains($col, $t))
                {


                    if((str_contains($d->dep_table_id, ',') || str_contains($d->dep_table_id, '-') ) )
                    {
                        if(str_contains($d->dep_table_id, ','))
                        {
                            $tab_id=explode(',',$d->dep_table_id);
                            $tab_am=$d->fixed_amount;
                            if(str_contains($tab_id[$kkk], '-'))
                            {
                                foreach(explode('-',$tab_id[$kkk]) as $k=> $ids )

                                {


                                    if($ids==$datauser[$col] )
                                    {


                                        $test[$ch]= 1;
                                        // $test[$ch]=$d->id.','.$ids.','.$datauser[$col].'/'.'1';
                                        $ch++;
                                        $i++;
                                        $mach=false;
                                        break;
                                    }
                                    else
                                    {
                                        $mach=true;

                                    }
                                }
                                if($mach)
                                {
                                    $test[$ch]= 0;
                                    // $test[$ch]=$d->id.','.$ids.','.$datauser[$col].'/'.'2';
                                    $ch++;
                                    $i++;
                                }


                            }
                            else
                            {

                                $tab_id=$tab_id[$kkk];



                                if($tab_id==$datauser[$col] )
                                {

                                    $test[$ch]=1;
                                    // $test[$ch]=$d->id.','.$tab_id.','.$datauser[$col].'/'.'3';
                                    $ch++;
                                    $i++;
                                    break;

                                }
                                else
                                {
                                    $test[$ch]= 0;
                                    // $test[$ch]=$d->id.','.$tab_id.','.$datauser[$col].'/'.'4';
                                    $ch++;
                                    $i++;
                                    break;
                                }


                            }

                        }
                        elseif(str_contains($d->dep_table_id, '-'))
                        {
                            $tab_id=explode('-',$d->dep_table_id);

                            foreach($tab_id as $k=> $ids )

                            {


                                if($ids==$datauser[$col] )
                                {


                                    $test[$ch]= 1;
                                    // $test[$ch]=$d->id.','.$ids.','.$datauser[$col].'/'.'1';
                                    $ch++;
                                    $i++;
                                    $mach=false;
                                    break;
                                }
                                else
                                {
                                    $mach=true;

                                }
                            }
                            if($mach)
                            {
                                $test[$ch]= 0;
                                // $test[$ch]=$d->id.','.$ids.','.$datauser[$col].'/'.'2';
                                $ch++;
                                $i++;
                            }





                        }









                    }

                    else
                    {

                        $tab_id=$d->dep_table_id;
                        $tab_am=$d->amount;


                        if($tab_id==$datauser[$col])
                        {


                            $test[$ch]= 1;
                            // $test[$ch]=$d->id.','.$tab_id.','.$datauser[$col].'/'.'5';
                            $ch++;




                            $i++;
                        }
                        else
                        {
                            $test[$ch]= 0;
                            // $test[$ch]= $d->id.','.$tab_id.','.$datauser[$col].'/'.'6';
                            $ch++;
                            $i++;
                        }
                        break;

                    }

                }


            }
        }
        // if($d->id==60)
        // {
        //     return $test;
        // }

        $chh=1;
        foreach($test as $t)
        {
            if($t==0)
            {
                $chh=0;
                break;
            }

        }

        return $chh;

    }

    public function percc($x,$d, $get_chec, $total , $opt , $t , $tax23)
    {
        $ch=0;

        $token=[];
        $test=[];
        $token_ch=false;

        if($x==16 && $this->getpara($d, $get_chec) && $d->type=="DEPCONSTANT")
        {
            $r=fees::find($x);
            $token['id']=$d->id;
            $token['Name']=$r->title;
            $token['type']=$d->type;


            $token['Amount']=$total;

            $token_ch=true;
        }
        else if($x==16 && $this->getpara($d, $get_chec) && $d->type!="DEPCONSTANT")
        {
            // if($d->id==75)
            //         {
            //             dd($this->getpara($d, $get_chec));
            //         }
            $total=0;

            if(str_contains($d->type, 'PERCC') )
            {

                $total=$total+((float) $d->fixed_amount * (float) $get_chec['seating_capacity'] );

                $r=fees::find($x);
                $token['id']=$d->id;
                $token['Name']=$r->title;
                $token['type']=$d->type;


                $token['Amount']=$total;

                $token_ch=true;
            }
            else
            {

                $total=$total+((float) $d->fixed_amount );

                $r=fees::find($x);
                $token['id']=$d->id;
                $token['Name']=$r->title;
                $token['type']=$d->type;


                $token['Amount']=$total;

                $token_ch=true;
            }

        }
        else if ($x==23)
        {

            if(!$this->getpara($d, $get_chec))
            {
                $total=0;
            }
            else
            {
                if($opt=="seat_cap")
                {
                    $total=$total * (float) $get_chec['seating_capacity'] ;

                }
                if($opt=="seat_cap" && $t!="seating_capacity"  )
                {
                    if(!($d->id==110))
                    {

                        $total=0;
                    }

                }
                if($opt=="max_lad" && $t!="unladen_weight" )
                {
                    if(!($d->id==111))
                    {

                        $total=0;
                    }

                }

                if($opt=="cc_annual" )
                {

                    if(!($d->id==113))
                    {

                        $total=0;
                    }

                }
                if($opt=="cc_lifetime" )
                {

                    if(!($d->id==114))
                    {

                        $total=0;
                    }

                }

                // if($opt=="cc_lifetime" && $tax23!=16 )
                //     {
                //         $total=0;
                //     }
            }



            // dd($total);




        }

        return ['token'=>$token , 'token_ch'=> $token_ch , 'total'=> $total ];
    }

    public function get_revised_data($data , $tableused)
    {
        $cat=null;
        $data= $data->toArray();
        $data['registration_date']= str_replace(",","/", $data['registration_date']);
        $cov= class_of_vehicle::where('cov_code', $data['class_of_vehicle_id'])->where('eto_location_id',$data['eto_location_id'] )->first();
        $jud=Jurisdiction::where('Jurisdiction_code', $data['Jurisdiction_id'])->where('eto_location_id', $data['eto_location_id'])->first();
        $tob=type_of_body::where('tob_code', $data['type_of_body'])->where('eto_location_id', $data['eto_location_id'])->first();
        $owner= owner_type::where('id', $data['owner_type_id'])->first();
        if($data['category_of_vehicle_id']!="" || $data['category_of_vehicle_id']!=0 || $data['category_of_vehicle_id']!=null)
        {
            if($tob==null)
            {
                $data['category_of_vehicle_id']= 0;

            }
            else
            {
                $data['category_of_vehicle_id']= $tob->category_of_vehicle_id;

            }
            if($data['category_of_vehicle_id']==1)
            {
                $data['category_of_vehicle']="Commercial";
            }
            else
            {
                $data['category_of_vehicle']="Non Commercial";
            }
            $cat=null;
        }
        else
        {
            $cat=category_of_vehicle::where('categ_code',$tob->category_of_vehicle_id)->where('eto_location_id', $data['eto_location_id'])->first();

        }
        $eto=eto_location::where('id', $data['eto_location_id'])->first();
        if($tableused=="arrival") {
            $max_lad=additional_trailer_arrival::where('arrival_id', $data['id'])->where('eto_location_id', $data['eto_location_id'])->first();
        } else {
            $max_lad=additional_attachment_trailer::where('reg_no', $data['registration_no'])->where('eto_location_id', $data['eto_location_id'])->first();
        }


        if($jud !=null) {
            $data['Jurisdiction']= $jud->Jurisdiction;
        } else {
            $data['Jurisdiction']= "Not Assigned";
        }

        if($max_lad !=null) {
            $data['laden_weight']= $max_lad->max_lan_weight;
            $data['unladen_weight']= $max_lad->max_lan_weight;
        } else {
            $data['unladen_weight']= 0;
        }

        if($cov !=null) {
            $data['class_of_vehicle']=$cov->class_of_vehicle;
            $data['class_of_vehicle_id']=$cov->tax_code;
        } else {
            $data['class_of_vehicle']= "Not Assigned";
        }
        if($eto !=null) {
            $data['eto_location']=$eto->eto_location;
        } else {
            $data['eto_location']= "Not Assigned";
        }
        if($cat !=null) {
            $data['category_of_vehicle']= $cat->category_of_vehicle;
            $data['category_of_vehicle_id']=$cat->categ_code;
        } else {
            if($data['category_of_vehicle_id']=="" || $data['category_of_vehicle_id']==0 || $data['category_of_vehicle_id']==null) {

                $data['category_of_vehicle']= "Not Assigned";
            }
        }
        if($tob !=null) {
            $data['tbo']= $tob->type_of_body;
            $data['type_of_body']= $tob->tax_code;
        }
        else {
            $data['tbo']= "Not Assigned";
        }
        if($owner !=null)
        {
            $data['owner_type']= $owner->owner_type;

        }
        else
        {
            $data['owner_type']= "Not Assigned";
        }

        return [$data, $cat];
    }

    public function  get_revised_transfer($data)
    {
        if($data->City_id!="") {
            $city=cities::where('city_code', $data->City_id)->where('eto_location_id',$data->eto_location_id)->first();
            $data->Province_id= $city!=null ? $city->province_id : null;
        }

        if($data->name_ != "" ) {
            $data->owner_type_id=1;
        }

        if($data->house_no == "" ) {
            $data->house_no=$data->address;
        }

        $data = $this->transferOwnerService->processTransferOwnerData($data);

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
        return $data;
    }

    public function CheckChassisNo()
    {
        $data = register::where('active_status', 'Active')->latest('id')->paginate(15);


        foreach($data as $d)
        {
            if($d->makers_name!=null) {

                $m= manufacturer::where('eto_location_id', $d->eto_location_id)->where('code',$d->makers_name)->first();

                if ($m!=null){
                    $d->makers_name = $m->manufacturer;
                }

//                $r = reg_maker::where('eto_location_id', $d->eto_location_id)->where('reg_no', $d->registration_no)->first();
//                if($r!=null) {
//                    $m= manufacturer::where('eto_location_id', $d->eto_location_id)->where('code',$r->maker_code)->first();
//                    if ($m) {
//                         $d->makers_name = $m->manufacturer;
//                    }
//
//                }else{
//
//                    $m= manufacturer::where('id', $d->makers_name)->first();
//                    if($m!=null) {
//                        $d->makers_name = $m->manufacturer;
//                    }
////                    $re = manufacturer::where('code', $d->makers_name)->where('eto_location_id', $d->eto_location_id)->first();
////                    if($re!=null) {
////                        $d->makers_name = $re->manufacturer;
////                    }
//                }
            }else{
                $r = reg_maker::where('eto_location_id', $d->eto_location_id)->where('reg_no', $d->registration_no)->first();
                if($r!=null) {
                    $m= manufacturer::where('eto_location_id', $d->eto_location_id)->where('code',$r->maker_code)->first();
                    if($m!=null) {
                        $d->makers_name = $m->manufacturer;
                    }

                }
            }
            if($d->eto_location_id!=null) {
                $eto = eto_location::find($d->eto_location_id);
                $d->eto_location= $eto->eto_location;
            }
            if($d->type_of_body!=null) {
                $eto = type_of_body::where('eto_location_id', $d->eto_location_id)->where('tob_code',$d->type_of_body)->first();
                if (!empty($eto)) {
                    $d->type_of_body= $eto->type_of_body;

                    if($eto->category_of_vehicle_id==1) {
                        $d->category_of_vehicle= "Commercial";
                    }
                    elseif($eto->category_of_vehicle_id==2) {
                        $d->category_of_vehicle= "Non Commercial";
                    }
                }

            }
        }


        return view('CheckChassisNo.list_CheckChassisNo')->with('data',$data);
    }

    //ultrasoft changes
    public function CheckCnic()
    {
        $data = register::where('active_status', 'Active')->latest('id')->paginate(15);

        foreach($data as $d)
        {
            if($d->makers_name!=null) {
                $m= manufacturer::where('eto_location_id', $d->eto_location_id)->where('code',$d->makers_name)->first();
                if ($m!=null){
                    $d->makers_name = $m->manufacturer;
                }

            }else{
                $r = reg_maker::where('eto_location_id', $d->eto_location_id)->where('reg_no', $d->registration_no)->first();
                if($r!=null) {
                    $m= manufacturer::where('eto_location_id', $d->eto_location_id)->where('code',$r->maker_code)->first();
                    if($m!=null) {
                        $d->makers_name = $m->manufacturer;
                    }
                }
            }

            if($d->eto_location_id!=null) {
                $eto = eto_location::find($d->eto_location_id);
                $d->eto_location= $eto->eto_location;
            }

            if($d->type_of_body!=null) {
                $eto = type_of_body::where('eto_location_id', $d->eto_location_id)->where('tob_code',$d->type_of_body)->first();
                if (!empty($eto)) {
                    $d->type_of_body= $eto->type_of_body;
                    if($eto->category_of_vehicle_id==1) {
                        $d->category_of_vehicle= "Commercial";
                    }
                    elseif($eto->category_of_vehicle_id==2) {
                        $d->category_of_vehicle= "Non Commercial";
                    }
                }
            }
        }

        return view('CheckCnic.list_CheckCnic')->with('data',$data);
    }

    public function conversion_get()
    {
        $arr=[];
        $co=0;
        $data= conversion::where('eto_location_id', auth()->user()->eto_location_id)->orderBy('id', 'DESC')->paginate(15);


        // foreach($data as $d)
        // {
        //     $reg= register:: where('registration_no', $d->reg_no)->first();
        //     $arr[$co]['id']=$d->id;
        //     $arr[$co]['name']=$reg->name_;
        //     $arr[$co]['Jurisdiction']= $d->Jurisdiction->Jurisdiction;
        //     $arr[$co]['type_of_body']= $d->type_of_body->type_of_body;
        //     $arr[$co]['category']= $d->category->category_of_vehicle;
        //     $arr[$co]['reg_no']= $d->reg_no;
        //     $co++;
        // }


        return view('Conversion.Conversion')->with('data',$data);
    }

    public function cancellation_get()
    {
        $data= cancellation::latest('id')->paginate(10);


        return view('Cancellation.Cancellation')->with('data',$data);
    }

    public function bank()
    {
        // $data= DB::table('cancellation')
        // ->join('register','register.id','=','cancellation.reg_id')
        // ->join('Jurisdiction','Jurisdiction.id','=','register.Jurisdiction_id')
        // ->select('cancellation.*' , 'register.registration_no', 'Jurisdiction.Jurisdiction')->get();


        return view('Bank.bank');
    }

    public function banksearch($registration_no)
    {
        $voucher= voucher_managment::where('challan_no', $registration_no)->first();
        if($voucher!=null)
        {
            $fees= vouchers_ids::where('voucher_id', $voucher->id)->get();
            $arrear= voucher_arrears::where('voucher_id', $voucher->id)->get();

            $data= register::where('id',$voucher->registration_id )->first();

            if($data!=null)
            {
                $data= $data->toArray();
                $data['registration_date']= str_replace(",","/", $data['registration_date']);
                $cov= class_of_vehicle::where('cov_code', $data['class_of_vehicle_id'])->where('eto_location_id', auth()->user()->eto_loaction_id)->first();
                $jud=Jurisdiction::where('Jurisdiction_code', $data['Jurisdiction_id'])->where('eto_location_id', auth()->user()->eto_loaction_id)->first();
                $tob=type_of_body::where('tob_code', $data['type_of_body'])->where('eto_location_id', auth()->user()->eto_loaction_id)->first();
                $owner= owner_type::where('id', $data['owner_type_id'])->first();
                $cat=category_of_vehicle::where('categ_code', $data['category_of_vehicle_id'])->first();
                $eto=eto_location::where('id', auth()->user()->eto_loaction_id)->first();
                $max_lad=additional_attachment_trailer::where('reg_no', $data['registration_no'])->where('eto_location_id', auth()->user()->eto_loaction_id)->first();



                if($jud !=null)
                {
                    $data['Jurisdiction']= $jud->Jurisdiction;
                }
                else
                {
                    $data['Jurisdiction']= "Not Assigned";
                }
                if($max_lad !=null)
                {
                    $data['unladen_weight']= $max_lad->max_lan_weight;
                }
                else
                {
                    $data['unladen_weight']= 0;
                }
                if($cov !=null)
                {
                    $data['class_of_vehicle']=$cov->class_of_vehicle;
                    $data['class_of_vehicle_id']=$cov->tax_code;
                }
                else
                {
                    $data['class_of_vehicle']= "Not Assigned";
                }
                if($eto !=null)
                {
                    $data['eto_location']=$eto->eto_location;

                }
                else
                {
                    $data['eto_location']= "Not Assigned";
                }
                if($cat !=null)
                {
                    $data['category_of_vehicle']= $cat->category_of_vehicle;

                }
                else
                {
                    $data['category_of_vehicle']= "Not Assigned";
                }
                if($tob !=null)
                {
                    $data['tbo']= $tob->type_of_body;
                    $data['type_of_body']= $tob->tax_code;

                }
                else
                {
                    $data['tbo']= "Not Assigned";
                }
                if($owner !=null)
                {
                    $data['owner_type']= $owner->owner_type;

                }
                else
                {
                    $data['owner_type']= "Not Assigned";
                }

            }

            else
            {
                $fees=null;
                $arrear=null;
            }
        }
        else
        {
            $data= null;
            $fees=null;
            $arrear=null;
            $voucher=null;
        }



        return response()->json(['data'=> $data , 'voucher'=> $voucher , 'fees'=> $fees , 'arrear'=> $arrear]);
    }


}

