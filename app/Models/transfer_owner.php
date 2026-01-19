<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transfer_owner extends Model
{
    use HasFactory;
    protected $table="transfer";
//    public $timestamps= false;


    protected $fillable = [
        'user_id','eto_name_id', 'reg_id', 'transfer_code', 'registration_no', 'jurisdiction_id', 'name', 'owner_type_id', 'owner_title_id', 'f_title', 'f_name', 'old_cnic_no', 'new_cnic_no', 'ntn_no', 'c_address', 'c_city', 'c_phone', 'p_address','p_province', 'p_city', 'p_phone', 'transfer_date', 'app_date', 'remarks', 'dates', 'eto_location_id'            ];
}
