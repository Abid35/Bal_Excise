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
use App\Models\regowner;
use App\Models\nocowner;
use App\Models\noc;
use App\Models\reg_cunit;
use App\Models\noc_cunit;
use App\Models\additional_trailer_noc;
use App\Models\noc_additional_attachment;
use Auth;

class NOCController extends Controller
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
            $data= noc::where('eto_location_id', auth()->user()->eto_location_id)->orderBy('id', 'DESC')->paginate(15);


            return view('NOC.NOC',['data'=>$data]);
        }

        /**
            * Show the form for creating a new resource.
            *
            * @return Response
            */
        public function create()
        {
            return view('NOC.addNOC');

        }

        /**
            * Store a newly created resource in storage.
            *
            * @return Response
            */
        public function store($arr)
        {


            $arr['user_id'] = Auth::user()->id;
            $data= noc::create($arr);

             if($data!=null)
             {
                $unit = reg_cunit::where('reg_id',$arr['id'])->get();


                if($unit->count() > 0)
                {
                    foreach($unit as $ow)
                    {
                            $data4=noc_cunit::create($ow->toArray());
                    }
                }



                $owner = regowner::where('reg_id',$arr['id'])->get();

                if($owner->count() > 0)
                {
                    foreach($owner as $ow)
                    {
                            $data4=nocowner::create($ow->toArray());
                    }
                }



                $add = additional_trailer_noc::where('reg_no',$arr['registration_no'])->get();

                if($add->count() > 0)
                {
                    foreach($add as $ow)
                    {
                            $data4=additional_trailer_noc::create($ow->toArray());
                    }
                }

                $addn = noc_additional_attachment::where('reg_no',$arr['registration_no'])->get();

                if($addn->count() > 0)
                {
                    foreach($addn as $ow)
                    {
                            $data4=noc_additional_attachment::create($ow->toArray());
                    }
                }
            }



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
            return view('nocister.new_nocistration')->with('id',$id);
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
            $d=noc::find($id);
            if($d!=null)
            {
                $at=additional_trailer_noc::where('reg_id',$id)->first();
                $aa=noc_additional_attachment::where('reg_id',$id)->first();
                $reg=nocowner::where('reg_id',$id)->get();
                $unit=noc_cunit::where('reg_id',$id)->first();
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
}
