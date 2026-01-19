<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class procurement extends Model
{
    use HasFactory;
    protected $table="procurement";
    public $timestamps= false;

    protected $fillable = [
        'eto_location_id', 
        'eto_name_id',
        'jurisdiction_id', 
        'registration_marks_id', 
        'source_of_procurement_id', 
        'house_no', 
        'province_id', 
        'city_id', 
        'telephone', 
        'mobile', 
        'email'
            ];
}

