<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reg_cunit extends Model
{
    use HasFactory;
    protected $table="reg_cunit";
    public $timestamps= false;

    protected $fillable = [
        'reg_id','cunit'
            ];
}
