<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  stolen_vehicle extends Model
{
    use HasFactory;
    protected $table="stolen_vehicle";
    public $timestamps= false;

    protected $fillable = [
        'eto_name_id', 
        'Jurisdiction_id', 
        'reg_no', 
        'reg_id', 
        'application_for_id', 
        'no_of_time', 
        'reason', 
        'circumstances', 
        'fir_no', 
        'fir_date', 
        'police_station', 
        'dob_no', 
        'inspector', 
        'inspection_date', 
        'NO_OF_NUM_PLATE', 
        'TR_DATE', 
        'dates', 
        'eto_location_id'
            ];
}

