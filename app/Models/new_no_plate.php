<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class new_no_plate extends Model
{
    use HasFactory;
    protected $table="new_no_plate";
    public $timestamps= false;

    protected $fillable = [
        'registration_mark_id','assigned_type','registration_no', 'eto_location_id', 'application_for_id', 'reg_id' , 'newregistration_no'   ];
}
