<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noc_cunit extends Model
{
    use HasFactory;
    protected $table="noc_cunit";
    public $timestamps= false;

    protected $fillable = [
        'reg_id','cunit'
            ];
}
