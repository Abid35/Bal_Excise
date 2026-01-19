<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\eto_location;

use App\Models\eto_name;

use App\Models\type_of_body;

use App\Models\source_of_procurement;

use App\Models\route_permit;

use App\Models\register;

use App\Models\province;

use App\Models\owner_type;

use App\Models\old_to_new_rms;

use App\Models\new_owner;

use App\Models\manufacturer;

use App\Models\jurisdiction;

use App\Models\issuing_authority;

use App\Models\fuel_type;

use App\Models\colors;

use App\Models\class_of_vehicle;

use App\Models\cities;

use App\Models\category_of_vehicle;

use App\Models\capacity_unit;

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

use App\Models\fees;

use App\Models\duration;

use App\Models\voucher_managment;

use App\Models\fedral_tax;
use App\Models\calculation_type;

use App\Models\arreargov_type;

use App\Models\regowner;

use App\Models\transfer_owner;

use App\Models\conversion;

use App\Models\cancellation;

use App\Models\book_issue;

use App\Models\reason;

use App\Models\designation;

use App\Models\officer_name;
use App\Models\arrival;
use App\Models\arrival_other_details;
use App\Models\additional_trailer_arrival;
use App\Models\arrivalowner;
use App\Models\dependent;
use App\Models\multiconstant;
use App\Models\voucher_arrears;
use App\Models\vouchers_ids;

use App\Models\reg_cunit;

class conversion extends Model
{
    use HasFactory;
    protected $table="conversion";
    public $timestamps= false;

    protected $fillable = [
        'eto_name_id', 'Jurisdiction_id', 'reg_no', 'reg_id', 'category_id', 'type_of_body_id', 'new_category_vehicle', 'new_type_of_body', 'conversion_code', 'coversion_date', 'tr_date', 'dates', 'eto_location_id'
            ];


    public function register() {
        return $this->belongsTo(register::class, 'reg_no', 'registration_no');
    }
    public function Jurisdiction() {
        return $this->belongsTo(jurisdiction::class, 'Jurisdiction_id', 'Jurisdiction_code');
    }


    public function eto_name() {
        return $this->belongsTo(eto_name::class, 'eto_name_id', 'id');
    }
}
