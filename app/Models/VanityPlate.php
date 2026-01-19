<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VanityPlate extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_identifier',
        'plate_number',
        'vehicle_number',
        'design_type',
        'additional_requirements',
        'cost',
        'status',
        'district_id',
    ];

    public function district()
    {
        return $this->belongsTo(eto_location::class, 'district_id', 'id');
    }



}
