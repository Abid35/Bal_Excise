<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cancellation extends Model
{
    use HasFactory;
    protected $table="cancellation";
    public $timestamps= false;

    protected $fillable = [
        'reg_id', 
        'eto_name_id', 
        'Jurisdiction_id', 
        'reg_no', 
        'intimation_letter_no', 
        'Iintimation_letter_date', 
        'reason', 
        'transaction_date', 
        'remarks', 
        'dates', 
        'eto_location_id'
            ];
}
