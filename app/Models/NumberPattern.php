<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class NumberPattern extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_prefix',
        'end_prefix',
        'start_no',
        'end_no',
        'last_generated_prefix',
        'last_generated_no',
        'is_active',
        'district_id',
        'type',
        'is_government',
    ];


    public function typeOfBody()
    {
        return $this->belongsTo(type_of_body::class, 'type', 'tob_code');
    }

    public function district()
    {
        return $this->belongsTo(eto_location::class, 'district_id', 'id');
    }

}
