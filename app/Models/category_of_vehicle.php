<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_of_vehicle extends Model
{
    use HasFactory;
    protected $table="category_of_vehicle";
    public $timestamps= false;

    protected $fillable = [
        'category_of_vehicle'
            ];
}
