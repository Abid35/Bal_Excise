<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noc extends Model
{
    use HasFactory;
    protected $table="noc";
    public $timestamps= false;

    protected $fillable = [
        'eto_name_id', 'eto_location_id', 'old_record', 'Jurisdiction_id', 'registration_no', 'no_assign_type','source_of_procurement_id', 'vehicle_price', 'owner_type_id', 'title', 'name_', 'father_or_husband_name', 'address', 'ntn_no', 'house_no', 'Province_id', 'City_id', 'mobile_no', 'category_of_vehicle_id', 'type_of_body', 'class_of_vehicle_id', 'makers_name', 'year_of_manufacture', 'chassis_no', 'engine_no', 'old_cnic_no', 'new_cnic_no', 'number_of_cylinder', 'seating_capacity', 'engine_capacity', 'unladen_weight', 'color_of_vehicle_id', 'book_serialNo', 'remarks', 'secondregistration_date', 'registration_date', 'unladen_unit', 'laden_weight', 'laden_unit', 'last_tax_paid', 'last_tax_date', 'fuel_type_id', 'wheelbox', 'vehicle_status', 'status', 'transfer_code','transfer_status', 'alter_code','alt_status', 'conversion_code','conversion_status', 'trailer_vehicle', '231b(2)_year', '234_year' , 'cancel_reg'
            ];
}
