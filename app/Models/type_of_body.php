<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_of_body extends Model
{
    use HasFactory;
    protected $table="type_of_body";
    public $timestamps= false;
	

    protected $fillable = [
        'type_of_body', 'category_of_vehicle_id',
            ];
}
