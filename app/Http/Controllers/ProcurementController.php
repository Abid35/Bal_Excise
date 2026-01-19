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
use Image;

class ProcurementController extends Controller
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
            $data= procurement::latest('id')->paginate(10);
            
            return view('Procurement.Procurement',['data'=>$data]);
        }
    
        /**
            * Show the form for creating a new resource.
            *
            * @return Response
            */
        public function create()
        {
            return view('Procurement.add_Procurement');
           
        }
    
        /**
            * Store a newly created resource in storage.
            *
            * @return Response
            */
        public function store(Request $request)
        {

            
            $arr=$request->all();
           
            
            if(isset($arr['Record_id']))
            {
            if($arr['Record_id']!="")
            {
                $d=procurement::find($arr['Record_id']);
                if($d!=null)
                {
                    $at=agreement1::where('procurement_id',$arr['Record_id'])->first();
                    $aa=agreement2::where('procurement_id',$arr['Record_id'])->first();
                    $ow=new_owner::where('procurement_id',$arr['Record_id'])->get();
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

                }
            }
         
            $data= procurement::create([
                'eto_location_id'=> $arr['DistrictID'], 
                'eto_name_id'=> $arr['ETO_CODE'], 
                'jurisdiction_id'=> $arr['JurisdictionID'],  
                'registration_marks_id'=> $arr['RegistrationMarkID'], 
                'source_of_procurement_id'=> $arr['ProcurementSourceID'], 
                'house_no'=> $arr['HouseNo'], 
                'province_id'=> $arr['ProvinceID'], 
                'city_id'=> $arr['CityID'], 
                'telephone'=> $arr['Telephone'], 
                'mobile'=> $arr['Mobile'], 
                'email'=> $arr['Email']
            ]);
            
            $data2= agreement1::create([
                'procurement_id' => $data->id,
                'bank_id'=> $arr['BankID'], 
                'branch_id'=> $arr['BranchID'], 
                'sales_cer_no'=> $arr['SalesCertificateNo'], 
                'agreement_no'=> $arr['AgreementNo'], 
                'bill_of_entry_no'=> $arr['EntryBillNo'], 
                'letter_no'=> $arr['LetterNo'], 
                'sales_date'=> $arr['SalesDate1'], 
                'agreement_date'=> $arr['AgreementDate'], 
                'bill_of_entry_date'=> $arr['EntryDateBill'], 
                'letter_date'=> $arr['LetterDate']
            ]);

            // if($request->hasFile('upload'))
            // {
               

            //         $img = time().'.' . $arr['upload']->getClientOriginalExtension();

            //         \Image::make($arr['upload'])->save(public_path('procurement_uploads/').$img);

                
               
                
            // }

            // if($request->hasFile('upload'))
            // {
            //     //get file name and extension
            //     $filenamewithex=$request->file('upload')->getClientOriginalName();
            //     //get filename
            //     $file_name=pathinfo($filenamewithex,PATHINFO_FILENAME);
            //     //get extention
            //     $extention=$request->file('upload')->getClientOriginalExtension();
            //     $fileNameToStore=$file_name."_".time().".".$extention;
            //     $path=$request->file('upload')->storeAs('public/procurement_uploads',$fileNameToStore); 
            // }
            
            $data3= agreement2::create([
                'procurement_id'=> $data->id, 
                'aggrement_id'=> $arr['AgreementId'],
                'pta_nco_no'=> $arr['PtaNcoNo'], 
                'pta_nco_date'=> $arr['PtaNcoDate'], 
                'sale_cer_no'=> $arr['SalesCertificateNo2'], 
                'sales_date'=> $arr['SalesDate2'], 
                'document'=> $img, 
                'owner_type'=> $arr['OwnerTypeID'], 
                'owner_title'=> $arr['OwnerTitleID']

            ]);

            


            $OwnerName= explode (",", $arr['OwnerName']);
            $OldCNIC= explode (",", $arr['OldCNIC']);
            $NewCNIC= explode (",", $arr['NewCNIC']);
            $FatherHusband= explode (",", $arr['FatherHusband']);
            
            for($i=0 ; $i < count($OwnerName) ; $i++)
            {
                $data4=new_owner::create([
                    'procurement_id'=> $data->id, 
                    'name'=>$OwnerName[$i], 
                    'old_cnic'=>$OldCNIC[$i], 
                    'new_cnic'=>$NewCNIC[$i], 
                    'father_or_husband_name'=>$FatherHusband[$i], 
                    
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
            $d=procurement::find($id);
            if($d!=null)
            {
                $at=agreement1::where('procurement_id',$id)->first();
                $aa=agreement2::where('procurement_id',$id)->first();
                $ow=new_owner::where('procurement_id',$id)->get();
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
