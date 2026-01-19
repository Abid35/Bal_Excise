<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noc_additional_attachment extends Model
{
    use HasFactory;
    protected $table="additional_attachment_noc";
    public $timestamps= false;

    protected $fillable = [
        'eto_name_id', 'Jurisdiction_id', 'reg_no', 'reg_id', 'max_lan_weight','max_lan_weight_unit', 'max_lan_weight_front_axle', 'max_lan_weight_rear_axle', 'max_lan_weight_any_other_axle', 'axleunit', 'tyre_front_axle', 'tyre_rear_axle', 'tyre_any_other_axle', 'dates', 'tr_flag', 'eto_location_id'
    ];
}
