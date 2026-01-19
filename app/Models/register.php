<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\eto_location;
use App\Models\fuel_type;
use App\Models\manufacturer;
use App\Models\cities;
use App\Models\owner_type;
use App\Models\category_of_vehicle;

class register extends Model
{
    use HasFactory;
    protected $table="register";
//    public $timestamps= false;

    protected $fillable = [
        'user_id', 'eto_name_id', 'eto_location_id', 'old_record', 'Jurisdiction_id',
        'registration_no', 'no_assign_type','source_of_procurement_id', 'vehicle_price',
        'owner_type_id', 'title', 'name_', 'father_or_husband_name', 'address', 'ntn_no',
        'house_no', 'Province_id', 'City_id', 'mobile_no', 'category_of_vehicle_id',
        'type_of_body', 'class_of_vehicle_id', 'makers_name', 'year_of_manufacture',
        'chassis_no', 'engine_no', 'old_cnic_no', 'new_cnic_no', 'number_of_cylinder',
        'seating_capacity', 'engine_capacity', 'unladen_weight', 'color_of_vehicle_id',
        'book_serialNo', 'remarks', 'secondregistration_date', 'registration_date',
        'unladen_unit', 'laden_weight', 'laden_unit', 'last_tax_paid', 'last_tax_date',
        'renew_date', 'fuel_type_id', 'wheelbox', 'vehicle_status', 'status', 'transfer_code',
        'transfer_status', 'alter_code','alt_status', 'conversion_code','conversion_status',
        'trailer_vehicle', '231b(2)_year', '234_year' , 'cancel_reg', 'dates', 'tr_date', 'invoice_date', 'government_department',
        'test_date', 'active_status', 'ac_type'
            ];

    public function getTableColumns() {
            return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
        }

    // Relationship with eto_location
    public function etoLocation()
    {
        return $this->belongsTo(eto_location::class, 'eto_location_id', 'id');
    }

    // Relationship with fuel_type
    public function fuelType()
    {
        return $this->belongsTo(fuel_type::class, 'fuel_type_id', 'id');
    }

    // Relationship with manufacturer
    public function manufacturer()
    {
        return $this->belongsTo(manufacturer::class, 'makers_name', 'code');
    }

    // Relationship with cities
    public function city()
    {
        return $this->belongsTo(cities::class, 'City_id', 'city_code');
    }

    // Relationship with owner_type
    public function ownerType()
    {
        return $this->belongsTo(owner_type::class, 'owner_type_id', 'id');
    }

    // Relationship with category_of_vehicle
    public function categoryOfVehicle()
    {
        return $this->belongsTo(category_of_vehicle::class, 'category_of_vehicle_id', 'categ_code');
    }

    // Relationship with type_of_body
    public function type_of_body()
    {
        return $this->belongsTo(type_of_body::class, 'type_of_body', 'tob_code');
    }

    public function transfers()
    {
        return $this->hasMany(\App\Models\transfer::class, 'reg_id', 'id');
    }    
   


}
