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
use App\Models\class_of_vehicle_id;
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
use App\Models\procurement;
use App\Models\arrival;
use App\Models\arrival_other_details;
use App\Models\additional_trailer_arrival;
use App\Models\arrivalowner;
use Carbon\Carbon;


use App\Models\transfer_owner;
use Image;

class ArrivalController extends Controller
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
            $data= arrival::latest('id')->paginate(10);
            
            return view('Arrival.Arrival',['data'=>$data]);
        }
    
        /**
            * Show the form for creating a new resource.
            *
            * @return Response
            */
        public function create()
        {
            return view('Arrival.add_Arrival');
           
        }
    
        /**
            * Store a newly created resource in storage.
            *
            * @return Response
            */
        public function store(Request $request)
        {
            $name_=null;
            $ntn_no=null;
            $arr=$request->all();

         
            
           
            // if(isset($arr['Record_id']))
            // {
            // if($arr['Record_id']!="")
            // {
            //     $d=transfer_owner::find($arr['Record_id']);
            //     if($d!=null)
            //     {
                   
            //         $d->delete();
            //     }

            //     }
            // }

           

            


        
            $tr=$arr['IsTribleVeh'] ? 'Y' :"N";
           
            $OwnerTypeID=$arr['OwnerTypeID'];
 
         
         
             if ($OwnerTypeID == "2") {
         
                 $name_=$arr['OwnerName'];
                 
         
             }
             else if ($OwnerTypeID == "4") {
         
                 $name_=$arr['OwnerName'];
                 $ntn_no=$arr['NewCnic'];
         
             }
             else if ($OwnerTypeID == "3") {
                
                 if(!str_contains($arr['OwnerName'], ','))
                 {
                     
                     $name_= $arr['OwnerName'];
                     $father_or_husband_name=$arr['Guardian'];
                     $old_cnic_no=$arr['OldCnicNo'];
                     $new_cnic_no=$arr['NewCnic'];
                 }
             }
             else if ($OwnerTypeID == "1")
             {
                 $name_= $arr['OwnerName'];
                 $father_or_husband_name=$arr['Guardian'];
                 $old_cnic_no=$arr['OldCnicNo'];
                 $new_cnic_no=$arr['NewCnic'];
             
             }
 
             
              
             $data= arrival::create([
                'eto_name_id'=>$arr['ETO_CODE'], 
                'Jurisdiction_id'=>$arr['Division'], 
                'registration_no'=>$arr['RegistrationMarkID'], 
                'arrival_province'=>$arr['ArrivalProvinceID'], 
                'book_serialNo'=>$arr['BookSerialno'], 
                'last_tax_paid'=>$arr['LastTaxPaiddate'], 
                'date_of_reporting'=>$arr['ReportingDate'], 
                'letter_no'=>$arr['LetterNo'], 
                'letter_date'=>$arr['LetterDate'], 
                'owner_type_id'=>$arr['OwnerTypeID'], 
                'title'=>$arr['OwnerTitleID'], 
                'name_'=>$name_, 
                'f_title'=> 0 ,
                'father_or_husband_name'=> $father_or_husband_name,
                'ntn_no'=>$ntn_no, 
                'house_no'=>$arr['HouseNo'], 
                'Province_id'=>$arr['ArrivalProvinceID'], 
                'City_id'=>$arr['ArrivalCityID']==null ? 0 :$arr['ArrivalCityID'] , 
                'mobile_no'=>$arr['Mobile'], 
                'category_of_vehicle_id'=>$arr['CategoryID'], 
                'class_of_vehicle_id'=>$arr['ClassID'], 
                'type_of_body'=>$arr['BodyTypeID'], 
                'makers_name'=>$arr['ManuFacturerID'], 
                'maker_classification'=>$arr['MakerClassification'], 
                'year_of_manufacture'=>$arr['YearOfManufacture'], 
                'chassis_no'=>$arr['ChassisNo'], 
                'engine_no'=>$arr['EngineNo'], 
                'number_of_cylinder'=>$arr['NoofCylinder'], 
                'seating_capacity'=>$arr['SeatingCapacity'], 
                'engine_capacity'=>$arr['EngineCapacity'], 
                'unladen_weight'=>$arr['UnladenWeight']==null ? 0 : $arr['UnladenWeight'], 
                'color_of_vehicle_id'=>$arr['ColorID'], 
                'registration_serial_noo'=>$arr['RegNo'], 
                'registration_date'=>$arr['DateofRegistration'], 
                'status'=>1,
                'unladen_unit' =>$arr['Unit'], 
                'trival_vehcle'=> $tr, 
                'tr_date'=> Carbon::now(), 
                'remarks' => $arr['Remarks'], 
                'p_address'=> $arr['HouseNo'].' '.$arr['ProvinceID'].' '.$arr['CityID'], 
                'p_city_id' =>$arr['CityID']==null ? 0 :$arr['CityID'],
                'dates'=> Carbon::now(), 
                'eto_location_id'=>$arr['DivisionID'], 
                'capacity_code'=>$arr['EngineUnit'],
                'vehicle_price'=>$arr['VehiclePrice'],
                'old_cnic_no'=>$old_cnic_no, 
                'new_cnic_no'=>$new_cnic_no, 
                'fuel_type_id'=>$arr['FueltypeID'], 
                'wheelbox'=>$arr['wheelbox'], 
                 
             ]);
 
             if ($OwnerTypeID == "3") {
         
                 $OwnerName= explode (",", $arr['OwnerName']);
                 $OldCNIC= explode (",", $arr['OldCnicNo']);
                 $NewCNIC= explode (",", $arr['NewCnic']);
                 $FatherHusband= explode (",", $arr['Guardian']);
                 
                 for($i=0 ; $i < count($OwnerName) ; $i++)
                 {
                     $data4=arrivalowner::create([
                         'arrival_id'=> $data->id, 
                         'name'=>$OwnerName[$i], 
                         'old_cnic_no'=>$OldCNIC[$i]==null ? 0 : $OldCNIC[$i], 
                         'new_cnic_no'=>$NewCNIC[$i]==null ? 0 : $NewCNIC[$i], 
                         'father_or_husband_name'=>$FatherHusband[$i]==null ? 0 : $FatherHusband[$i], 
                         
                     ]);
                 }
                 
         
             }
             else if ($OwnerTypeID == "1") {
         
                 $data4=arrivalowner::create([
                     'arrival_id'=> $data->id, 
                     'name'=>$arr['OwnerName'], 
                     'old_cnic_no'=>$arr['OldCnicNo']==null ? 0 : $arr['OldCnicNo'], 
                     'new_cnic_no'=>$arr['NewCnic']==null ? 0 : $arr['NewCnic'], 
                     'father_or_husband_name'=>$arr['Guardian']==null ? 0 : $arr['Guardian'], 
                     
                 ]);
         
             }
 
 
 
             if($arr['IsTrailerVeh'])
             {
                additional_trailer_arrival::create([
                     'arrival_id'=> $data->id,
                     'eto_name_id'=>$arr['ETO_CODE'], 
                     'Jurisdiction_id'=>$arr['Division'], 
                     'reg_no'=>$arr['RegistrationMarkID'], 
                     'type_of_body'=> $arr['TrailerBodyID'], 
                     'unladen_weight'=> $arr['TrailerUnladenWeight']==null ? 0 : $arr['TrailerUnladenWeight'], 
                     'max_axle_weight'=> $arr['TrailerAxleWeight']==null ? 0 : $arr['TrailerAxleWeight'],
                     'unit_code'=> $arr['TrailerUnitID'],
                     'front_axle'=> $arr['TrailerFrontAxle'], 
                     'rear_axle'=> $arr['TrailerRearAxle'], 
                     'any_other_axle'=> $arr['TrailerOtherAxle'],
                     'max_laden_weight'=> $arr['TrailerMaxladenWeight']==null ? 0 : $arr['TrailerMaxladenWeight'], 
                     'eto_location_id'=>$arr['DivisionID'], 
                 ]);

                //  if($request->hasFile('upload'))
                //     {
                //         $img = time().'.' . $arr['upload']->getClientOriginalExtension();

                //         \Image::make($arr['upload'])->save(public_path('uploads/').$img);
                        
                //     }
                //     else
                //     {
                //         $img='N/A';

                //     }
                $img='N/A';
                 arrival_other_details::create([
                    'arrival_id' => $data->id, 
                    'designation'=> $arr['DesignationID']==null ? 0 : $arr['DesignationID'], 
                    'officer_name'=> $arr['OfficerName']==null ? 0 : $arr['OfficerName'], 
                    'inspection_date'=> $arr['InspectionDate'], 
                    'remarks'=> $arr['Remarks'], 
                    'verification_no'=> $arr['VerificationNo'], 
                    'verification_date'=> $arr['VerificationDate'], 
                    'document' => $img


                 ]);
 
                 

             }

            


            return response()->json(['Status'=> true ]);

        }
    
        /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function show($id)
        {
            //
        }
    
        /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function edit($id)
        {
            return view('Procurement.add_Procurement')->with('id',$id);
        }
    
        /**
            * Update the specified resource in storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function update($id , Request $request)
        {
            
        }
    
        /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function destroy($id)
        {
            $d=arrival::find($id);
            
            if($d!=null)
            {
                $at=additional_trailer_arrival::where('arrival_id',$id)->first();
                $aa=arrival_other_details::where('arrival_id',$id)->first();
                $ow=arrivalowner::where('arrival_id',$id)->get();
                
                if($at!=null)
                {
                    $at->delete();
                }
                if($aa!=null)
                {
                    $aa->delete();
                }
                if($ow!="[]")
                {
                   foreach($ow as $o)
                   {
                        $o->delete();
                   }
                    
                }
                $d->delete();
                
            }
            return redirect()->back();
        }
}
