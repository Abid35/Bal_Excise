<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    use HasFactory;
    protected $table="cities";
    public $timestamps= false;

    protected $fillable = [
        'cities', 'province_id'
            ];
}
