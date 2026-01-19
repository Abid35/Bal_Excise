<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reg_maker extends Model
{
    use HasFactory;
    protected $table="reg_maker";
    public $timestamps= false;

    protected $fillable = [
        'id',
        'maker_code',
        'eto_location',
        'reg_no'
            ];
}
