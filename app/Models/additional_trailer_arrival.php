<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class additional_trailer_arrival extends Model
{
    use HasFactory;
    protected $table="additional_trailer_arrival";
    public $timestamps= false;

    protected $fillable = [
        'eto_name_id', 'Jurisdiction_id', 'reg_no', 'arrival_id', 'type_of_body', 'unladen_weight', 'front_axle', 'rear_axle', 'any_other_axle', 'max_laden_weight', 'unit_code', 'dates', 'eto_location_id'
    ];
}
