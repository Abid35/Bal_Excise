<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nocowner extends Model
{
    use HasFactory;
    protected $table="nocowner";
    public $timestamps= false;

    protected $fillable = [
        'reg_id','name', 'old_cnic_no', 'new_cnic_no', 'father_or_husband_name'
            ];
}