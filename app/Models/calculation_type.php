<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calculation_type extends Model
{
    use HasFactory;
    protected $table="calculation_type";
    public $timestamps= false;

    protected $fillable = [
        'calculation_type_name','calculation_type'
            ];
}

