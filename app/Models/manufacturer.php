<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manufacturer extends Model
{
    use HasFactory;
    protected $table="manufacturer";
    public $timestamps= false;

    protected $fillable = [
        'manufacturer'
            ];
}
