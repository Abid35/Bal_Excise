<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\conversion;
use App\Models\register; 
use App\Models\cancellation; 
use App\Models\book_issue;
use Carbon\Carbon;


class SendDataController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function conversion(Request $request)
    {
        $arr= $request->input();
        
        $data=register::where('registration_no', $arr['RegistrationNo'])->where('eto_location_id', $arr['DivisionID'])->first();
      

        $data3= conversion::create([
            'eto_name_id'=> $data->eto_name_id,
            'Jurisdiction_id'=>$data->Jurisdiction_id,
            'reg_no'=> $arr['RegistrationNo'],
            'category_id'=> $data->category_of_vehicle_id,
            'type_of_body_id'=> $data->type_of_body,
            'reg_id'=>$data->id, 
            'new_category_vehicle'=>$arr['NewCategoryID'], 
            'new_type_of_body'=>$arr['NewBodyType'], 
            'conversion_code'=>$arr['Conversion_code'],
            'coversion_date'=>$arr['ConvertionDate'],
            'dates'=>Carbon::now(),
            'eto_location_id'=>$arr['DivisionID']
        ]);

        $data2=register::find($data->id)->update([
            'category_of_vehicle_id'=> $arr['NewCategoryID']==null || $arr['NewCategoryID']==0 ? $data->category_of_vehicle_id : $arr['NewCategoryID'],
            'type_of_body'=> $arr['NewBodyType'] ==null || $arr['NewBodyType']==0 ? $data->type_of_body : $arr['NewBodyType'],
            'conversion_code'=>$arr['Conversion_code'],
            'conversion_status'=> 0
        ]);

        return response()->json(['Status'=> true  ]);

    }


    public function cancellation(Request $request)
    {
        $arr= $request->input();
        
        $data=register::where('registration_no', $arr['RegNo'])->where('eto_location_id', $arr['DivisionID'])->first();
        
        if($data!=null)
        {
            $data3= cancellation::create([
                'reg_id'=>$data->id, 
                'eto_name_id'=> $arr['ETO_CODE'],   
                'intimation_letter_no'=>$arr['IntimationLetterNo'], 
                'Iintimation_letter_date'=>$arr['IntimationDate'], 
                'reason'=>$arr['Reason'],
                'transaction_date'=>$arr['TransactionDate'],
                'remarks'=>$arr['Remarks'],
                'Jurisdiction_id'=> $data->Jurisdiction_id, 
                'reg_no'=> $arr['RegNo'], 
                'eto_location_id'=>  $arr['DivisionID'],
                'dates'=> Carbon::now()
            ]);

            $data2=register::find($data->id)->update([
                'cancel_reg'=> 1
            ]);
        
    
            return response()->json(['Status'=> true  ]);
        }
        else
        {
            return response()->json(['Status'=> false  ]);
        }
       

    }

    public function bookissue(Request $request)
    {
        $arr= $request->input();
        
        $data=register::where('registration_no', $arr['RegNo'])->where('Jurisdiction_id', $arr['DivisionID'])->first();
        

        $data3= book_issue::create([
            'registration_id'=>$data->id, 
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

        $data2=register::find($data->id)->update([
            'book_serialNo'=> $arr['DuplicateBook']==null || $arr['DuplicateBook']==0 ? $data->book_serialNo : $arr['DuplicateBook'],
        ]);

        return response()->json(['Status'=> true  ]);

    }

    public function AddCloseForTranscation(Request $request)
    {
        $set=1;
        $arr= $request->input();
        
        if($arr['TrancationCheck']=='o')
        {
            $set= 1;
        }
        else if($arr['TrancationCheck']=='c')
        {
            $set=0;
        }
        else if($arr['TrancationCheck']==false)
        {
            return response()->json(['Status'=> false , 'msg'=> 'Use Checkbox for open and close transaction' ]);
        }
        
        $data=register::where('registration_no', $arr['RegNo'])->where('eto_location_id', $arr['DivisionID'])->first();
        
        $data=register::where('registration_no', $arr['RegNo'])->where('eto_location_id', $arr['DivisionID'])->update([
            'vehicle_status'=> $set
        ]);
        

        return response()->json(['Status'=> true  ]);

    }


    public function senddata()
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load("books.xlsx");
        dd($spreadsheet);
        return view('senddata');
    }

   
}
