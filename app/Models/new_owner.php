<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class new_owner extends Model
{
    use HasFactory;
    protected $table="new_owner";
    public $timestamps= false;

    protected $fillable = [
        'procurement_id', 'name', 'old_cnic', 'new_cnic', 'father_or_husband_name'
            ];
}
