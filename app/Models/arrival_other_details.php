<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arrival_other_details extends Model
{
    use HasFactory;
    protected $table="arrival_other_details";
    public $timestamps= false;

    protected $fillable = [
       'arrival_id', 'designation', 'officer_name', 'inspection_date', 'remarks', 'verification_no', 'verification_date', 'document' 
    ];
}
