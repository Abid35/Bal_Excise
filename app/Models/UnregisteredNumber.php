<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnregisteredNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_no',
        'owner_cnic',
        'owner_ntn',
        'eto_location_id',
        'district_id',
        'is_assigned',
    ];

    // Optional scopes for cleaner queries
    public function scopeAvailable($query)
    {
        return $query->where('is_assigned', false);
    }

    public function scopeByCnic($query, $cnic)
    {
        return $query->where('owner_cnic', $cnic);
    }

    public function scopeByNtn($query, $ntn)
    {
        return $query->where('owner_ntn', $ntn);
    }
}
