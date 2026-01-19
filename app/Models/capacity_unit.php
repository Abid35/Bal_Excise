<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class capacity_unit extends Model
{
    use HasFactory;
    protected $table="capacity_unit";
    public $timestamps= false;

    protected $fillable = [
        'cunit','eto_location','cunit_code'
            ];
}
