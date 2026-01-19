<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arrivalowner extends Model
{
    use HasFactory;
    protected $table="arrivalowner";
    public $timestamps= false;

    protected $fillable = [
        'arrival_id','name', 'old_cnic_no', 'new_cnic_no', 'father_or_husband_name'
            ];
}