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
use App\Models\alteration;
use App\Models\transfer_owner;
use App\Models\fees;
use App\Models\fees_dep;
use App\Models\dependent;
use App\Models\multiconstant;
use App\Models\multideptax;
use App\Models\tax_disable;
use DB;
class TaxController extends Controller
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
        public function tax()
        {
            // 
            $table= DB::select('SHOW TABLES');
            $product = new register;
            $columns = $product->getTableColumns();
            unset($columns[0]);
            
            return view('tax.add_tax' , ['col'=> $columns, 'table'=> $table]);
        }

        public function get_para($table ,$valuee, $type)
        {
            
            $count=0;
            $side=0;
            $tablee= DB::select('SHOW TABLES');
            if(str_contains($table, 'ex'))
            {
                $appPrefix = 'App\\Models\\'. str_ireplace( 'ex', '', $table);
            }
            else
            {
                $appPrefix = 'App\\Models\\'.$table;
            }
          
            $t= new $appPrefix;
            $tab=[];
            $tab_id_key="";
            // $columns = $t->getTableColumns();

            if($type=="key")
            {    
                $data= $t->all()->ToArray();
                foreach($data[0] as $key=>$value )
                {
                   
                    if($key!="id")
                    {
                        $tab[$count]= $key;
                    }
                    $count++;
                }
            }
            elseif($type=="value")
            {
                $check=false;
                $data=$t->select('id',$valuee)->get()->ToArray();
                $dataa= $t->all()->ToArray();

                foreach($dataa[0] as $key=>$value )
                {
                   
                    foreach($tablee as $c)
                    {  
                        if($key!=$table)
                        {
                            if(str_contains($key, $c->Tables_in_kiccpk_deo))
                            {
                                $appPrefix = 'App\\Models\\'.$c->Tables_in_kiccpk_deo;
                                $t= new $appPrefix;
                                $d2=$t->all()->ToArray();
                                $check=true;
                                $tab_id_key=$key;
                                break;
                            }
                        }
                        
                    }

                  
                }
               
                if($check)
                {
                    foreach($dataa as $key=>$value )
                    {   $cc=0;
                        
                        // foreach( $value as $k=> $val)
                        // {
                           
                        //     if($k=="id")
                        //     {
                              
                                
                                foreach($d2 as $kk=>$d)
                                {
                                 
                                    if($d['id']==$value[$tab_id_key])
                                    {
                                         foreach($d as $rk=>$r)
                                         {
                                             if($rk!='id' && $rk!='date')
                                             {
                                                 $side=$r;
                                             }
                                         }
                                    }
                                    
                                }
                                
                                $tab[$count][$cc]= $value['id'];
                                $cc++;
                                $tab[$count][$cc]= $value[$valuee].'('.$side.')';
                                $cc++;
                            // }
                            // else
                            // {
                            //     $tab[$count][$cc]= $val[$tab_id_key].'('.$side.')';
                            //     $cc++;
                            // }
                            
                            
                        // }
                        $count++;
                        
                        
                        
                    }
                }
                else
                {
                    foreach($data as $key=>$value )
                    {   $cc=0;
                        
                        foreach( $value as $k=> $val)
                        {
                            if($k=="id")
                            {
                                $tab[$count][$cc]= $val;
                                $cc++;
                            }
                            else
                            {
                                $tab[$count][$cc]= $val;
                                $cc++;
                            }
                            
                            
                        }
                        $count++;
                        
                        
                        
                    }
                }
                

                
              
               
            }
           

            return response()->json($tab);
        }

        public function tax_val(Request $request)
        {
            $s=[];
            $sex=[];
            $am=[];
            $scon=[];
            $amcon=[];
            $count=0;
            $countex=0;
            $con_am=[];
            $check=false;
            $op= array("g"=>">", "l"=>"<", "ge"=>">=", "le"=>"<=", "f"=>"=");
            $co=0;
            $conn=0;
            $data= $request->input();
            
            if($data['type']==0)
            {
                if($data['taxname']!=null)
                {
                    $fees_id=fees::create([
                        'type'=> $data['taxname'],
                        'title'=> $data['taxname']
                    ]);
                    $f_id=$fees_id->id;
                    $f_id=$data['type'];

                if($data['pro_type']=="Ex")
                {
                    if(isset($data['tablelistsex']))
                    {
    
                        foreach($data['tablelistsex'] as $t)
                        {
                            $sex[$countex]=implode('-', $data['tablelistsex'.$t]);
                          
                            $countex++;
                        }
                    }
                    $ex=implode(',', $data['tablelistsex']);
                    $ex_id=implode(',', $sex);
                }
                else
                {
                    $ex=0;
                    $ex_id=0;
                }
                

                if(isset($data['tablelists']))
                {

                    foreach($data['tablelists'] as $t)
                    {
                        if($data['con_constant'.$t]==true)
                        {
                            $conn++;
                            
                        }
                        $s[$count]=implode('-', $data['tablelists'.$t]);
                        if(isset($data[$t.'am'])){
                            $am[$count]=implode('-', $data[$t.'am']);
                            $check=true;
                        }
                        else
                        {
                            
                            $check=false;
                        }
                        
                        
                        $count++;
                    }
                    if($conn>0)
                    {
                        for($i=0 ; $i< $conn ; $i++)
                        {
                            array_push($data['tablelists'],"con");
                        }
                        
                    }
                }

                if(isset($data['constant']))
                {

                    foreach($data['constant'] as $t)
                    {
                        
                        //if($data[$t]=="ma")
                        if(count($data[$t."v"])>1)
                        {
                            
                            for($i=0 ; $i< count($data[$t."f"]) ; $i++)
                            {
                                
                                
                                    $con_am[$co]= $op[$data[$t."f"][$i]].$data[$t."v"][$i];

                                
                                $co++;
                            }
                            
                        }
                        else
                        {
                            
                                $con_am[0]= $op[$data[$t."f"][0]].$data[$t."v"][0];

                            
                        }
                        
                        $scon[$count]=implode(';', $data[$t."am"]);
                        $amcon[$count]=implode(';', $con_am);
                        $count++;
                        

                    
                    }
                    $multiconstant_id=multiconstant::create([
                        'title'=>implode(',', $data['constant']),
                        'amount'=>implode(',', $scon),
                        'value'=>implode(',', $amcon)
                    ]);
                    $con_id=$multiconstant_id->id;
                }
                else
                {
                    $con_id=0;
                }

               if($check)
               {
                   $amm=implode(',', $am);
                   $famm=0;
               }
               else
               {
                    if($data['tabledet']=='fam')
                    {
                        $famm=$data['fam'];
                    }
                    else
                    {
                        
                        $famm=0;
                    }
                    $amm=0;
                   
               }

               if(isset($data["type_am"]))
                 {
                     if($data["type_am"]=='LIMIT')
                     {
                         if($data['limityear']!=null || $data['limityear']!=0)
                         {
                            $typ=$data["type_am"].'/'.$data['limityear'];
                         }
                         
                        
                     }
                     else
                     {
                        $typ=$data["type_am"];
                     }
                   

                }
                else
                {
                    $typ=0;
                }



                if(isset($data['tablelists']))
                {                
                    dependent::create([
                        'main_table'=>'multideptax',
                        'dep_table'=>  implode(',', $data['tablelists']),
                        'dep_table_id'=>implode(',', $s),
                        'ex_table'=>  $ex,
                        'ex_table_id'=>$ex_id,
                        'type'=>$typ,
                        'multiconstant_id'=>$con_id,
                        'amount'=>$amm,
                        'fixed_amount'=>$famm,
                        'fees_id'=>$f_id
                    ]);
                }
                
                }
                else
                {
                    $msg="Tax Name required";
                    return response()->json($msg);
                }
            }
            else
            {
                $f_id=$data['type'];

                if($data['pro_type']=="Ex")
                {
                    if(isset($data['tablelistsex']))
                    {
    
                        foreach($data['tablelistsex'] as $t)
                        {
                            $sex[$countex]=implode('-', $data['tablelistsex'.$t]);
                          
                            $countex++;
                        }
                    }
                    $ex=implode(',', $data['tablelistsex']);
                    $ex_id=implode(',', $sex);
                }
                else
                {
                    $ex=0;
                    $ex_id=0;
                }
                

                if(isset($data['tablelists']))
                {

                    foreach($data['tablelists'] as $t)
                    {
                        $s[$count]=implode('-', $data['tablelists'.$t]);
                        if(isset($data[$t.'am'])){
                            $am[$count]=implode('-', $data[$t.'am']);
                            $check=true;
                        }
                        else
                        {
                            
                            $check=false;
                        }
                        
                        
                        $count++;
                    }
                }

                if(isset($data['constant']))
                {

                    foreach($data['constant'] as $t)
                    {
                        
                        //if($data[$t]=="ma")
                        if(count($data[$t."v"])>1)
                        {
                            
                            for($i=0 ; $i< count($data[$t."f"]) ; $i++)
                            {
                                
                                
                                    $con_am[$co]= $op[$data[$t."f"][$i]].$data[$t."v"][$i];

                                
                                $co++;
                            }
                            
                        }
                        else
                        {
                            
                                $con_am[0]= $op[$data[$t."f"][0]].$data[$t."v"][0];

                            
                        }
                        
                        $scon[$count]=implode(';', $data[$t."am"]);
                        $amcon[$count]=implode(';', $con_am);
                        $count++;
                        

                    
                    }
                    $multiconstant_id=multiconstant::create([
                        'title'=>implode(',', $data['constant']),
                        'amount'=>implode(',', $scon),
                        'value'=>implode(',', $amcon)
                    ]);
                    $con_id=$multiconstant_id->id;
                }
                else
                {
                    $con_id=0;
                }

               if($check)
               {
                   $amm=implode(',', $am);
                   $famm=0;
               }
               else
               {
                    if($data['tabledet']=='fam')
                    {
                        $famm=$data['fam'];
                    }
                    else
                    {
                        
                        $famm=0;
                    }
                    $amm=0;
                   
               }

               if(isset($data["type_am"]))
                 {
                    $typ=$data["type_am"];

                }
                else
                {
                    $typ=0;
                }


                if(isset($data['tablelists']))
                { 

                
                dependent::create([
                    'main_table'=>'multideptax',
                    'dep_table'=>  implode(',', $data['tablelists']),
                    'dep_table_id'=>implode(',', $s),
                    'ex_table'=>  $ex,
                    'ex_table_id'=>$ex_id,
                    'type'=>$typ,
                    'multiconstant_id'=>$con_id,
                    'amount'=>$amm,
                    'fixed_amount'=>$famm,
                    'fees_id'=>$f_id
                ]);
                }
                else
                {
                    dependent::create([
                        'main_table'=>'multideptax',
                        'dep_table'=>  0,
                        'dep_table_id'=>0,
                        'ex_table'=>  $ex,
                        'ex_table_id'=>$ex_id,
                        'type'=>$typ,
                        'multiconstant_id'=>$con_id,
                        'amount'=>$amm,
                        'fixed_amount'=>$famm,
                        'fees_id'=>$f_id
                    ]);
                }
                
            }

            return redirect()->back();
        }

        public function tax_dis(Request $request)
        {
            $data= $request->input();
            tax_disable::create([
                'oncheck_tax'=>$data['ocheck'],
                'disabled_tax'=>$data['dis']
            ]);
            return redirect()->back();
        }

        public function exist()
        {
            $con=[];
            $c1=0;
            

            $mul=multiconstant::all();

            foreach($mul as $m)
            {
                
                foreach(explode(',',$m->title) as $k=>$t)
                {
                    $c2=0;
                    
                    
                       
                       
                        $con[$c1]['title'][$c2]=$t;
                        if($m->amount!=null && $m->amount!=0)
                        {
                           $am= explode(',',$m->amount);
                           $con[$c1]['amount'][$c2]=$am[$k];
                        }
                        $v= explode(',',$m->value);
                        $con[$c1]['value'][$c2]=$v[$k];
                        $c2++;
                    
                   

                    
                }
                
                $c1++; 
            }
            
            return response()->json($con);
        }
    

}
