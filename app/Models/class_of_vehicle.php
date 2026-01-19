<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_of_vehicle extends Model
{
    use HasFactory;
    protected $table="class_of_vehicle";
    public $timestamps= false;

    protected $fillable = [
        'class_of_vehicle'
            ];
}
