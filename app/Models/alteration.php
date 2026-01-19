<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\eto_location;
use App\Models\register;

class alteration extends Model
{
    use HasFactory;
    protected $table="alteration";
    public $timestamps= false;

    protected $fillable = [
        'user_id','eto_name_id', 'jurisdiction_id', 'registration_no', 'alteration_code', 'name', 'chassis_no', 'new_cnic_no', 'color_of_vehicle_id', 'fuel_type_id', 'engine_no', 'engine_capacity','seating_capacity', 'front_axle', 'rear_axle', 'any_other_axle', 'class_of_vehicle_id', 'alteration_date' , 'tr_date', 'dates','eto_location_id'
            ];

    public function eto_location() {
            return $this->belongsTo(eto_location::class, 'eto_location_id', 'id');
        }
    public function register() {
            return $this->belongsTo(register::class, 'registration_no', 'registration_no');
        }
}
