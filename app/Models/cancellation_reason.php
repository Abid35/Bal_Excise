<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cancellation_reason extends Model
{
    use HasFactory;
    protected $table="cancellation_reason";
    public $timestamps= false;

    protected $fillable = [
        'reason', 'dates', 'tr_flag', 'eto_location_id'
            ];
}
