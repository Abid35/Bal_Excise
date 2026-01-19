<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arrival extends Model
{
    use HasFactory;
    protected $table="arrival";
    public $timestamps= false;

    protected $fillable = [
        'eto_name_id', 'Jurisdiction_id', 'registration_no', 'arrival_province', 'book_serialNo', 'last_tax_paid', 'date_of_reporting', 'letter_no', 'letter_date', 'owner_type_id', 'title', 'name_', 'f_title', 'father_or_husband_name', 'ntn_no', 'house_no', 'Province_id', 'City_id', 'mobile_no', 'category_of_vehicle_id', 'class_of_vehicle_id', 'type_of_body', 'makers_name', 'maker_classification', 'year_of_manufacture', 'chassis_no', 'engine_no', 'number_of_cylinder', 'seating_capacity', 'engine_capacity', 'unladen_weight', 'color_of_vehicle_id', 'registration_serial_noo', 'registration_date', 'status', 'unladen_unit', 'trival_vehcle', 'tr_date', 'remarks', 'p_address', 'p_city_id', 'dates', 'eto_location_id', 'capacity_code', 'no_assign_type', 'vehicle_price', 'source_of_procurement_id', 'address', 'old_cnic_no', 'new_cnic_no', 'secondregistration_date', 'laden_weight', 'laden_unit', 'last_tax_date', 'fuel_type_id', 'wheelbox', 'vehicle_status', 'transfer_code', 'transfer_status', 'alter_code', 'alt_status', 'conversion_code', 'stolen_code', 'conversion_status', '231b(2)_year', '234_year', 'cancel_reg'    ];
}
