<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fuel_type extends Model
{
    use HasFactory;
    protected $table="fuel_type";
    public $timestamps= false;

    protected $fillable = [
        'fuel_type'
            ];
}
