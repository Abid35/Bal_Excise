<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class combine_data extends Model
{
    use HasFactory;
    protected $table="combine_data";
    public $timestamps= false;

    protected $fillable = [
        'Vehicle_Registration_Number', 'Owner_name', 'Engine_Number', 'Engine_Capacity', 'CNIC_Number', 'Make_Name', 'Years_of_Manufacture', 'Phone_number'            ];

   

    
}
