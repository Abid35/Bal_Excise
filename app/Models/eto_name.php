<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eto_name extends Model
{
    use HasFactory;
    protected $table="eto_name";
    public $timestamps= false;

    protected $fillable = [
        'eto_name'
            ];
}
