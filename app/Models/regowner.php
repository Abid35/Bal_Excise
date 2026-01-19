<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regowner extends Model
{
    use HasFactory;
    protected $table="regowner";
    public $timestamps= false;

    protected $fillable = [
        'user_id','reg_id','name', 'old_cnic_no', 'new_cnic_no', 'father_or_husband_name'
            ];
}