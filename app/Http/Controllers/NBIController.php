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

use App\Models\transfer_owner;
use DB;

class NBIController extends Controller
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
            $data= book_issue::latest('id')->paginate(10);
            
           
            return view('NewBookIssued.NBI')->with('data',$data);
        }
    
        /**
            * Show the form for creating a new resource.
            *
            * @return Response
            */
        public function create()
        {
            return view('NewBookIssued.add_NBI');
           
        }
    
        /**
            * Store a newly created resource in storage.
            *
            * @return Response
            */
        public function store(Request $request)
        {

            
           
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

           

            $arr= $request->input();

            $check=register::where('book_serialNo', $arr['DuplicateBook'])->first();

            if($check!=null)
            {
                return response()->json(['Status'=> false , 'msg'=> "Book Serial Number already taken"  ]);
            }

        
            $data=register::where('registration_no', $arr['RegNo'])->where('eto_location_id', $arr['DivisionID'])->first();
            
    
            $data3= book_issue::create([
                'registration_id'=>$data->id, 
                'registration_no'=>$arr['RegNo'],
                'eto_location_id'=>$arr['DivisionID'],
                'application_for_id'=>$arr['BookType'], 
                'reason'=>$arr['ReasonID'], 
                'circumstances'=>$arr['Circumstances'],
                'fir_no'=>$arr['FIR'],
                'fir_date'=>$arr['FIRDate'],
                'police_station'=>$arr['PoliceStationID'],
                'inspection_date'=>$arr['InspectionDate'],
                'inspector'=>$arr['Inspector'],
                'duplicate_book_no'=>$arr['DuplicateBook'],
    
            ]);


            register::where('id', $data->id)->update([ 
                'book_serialNo' => $arr['DuplicateBook'],
               
            ]);
    
            return response()->json(['Status'=> true  ]);

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
