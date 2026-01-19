<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmartCardRequest extends Model
{
    protected $fillable = [
        'vehicle_id',
        'reg_no',
        'vehicle_snapshot',
        'district_id',
        'eto_id',
        'status',
        'remarks'
    ];

    protected $casts = [
        'vehicle_snapshot' => 'array'
    ];
}
