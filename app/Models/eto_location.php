<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\register;


class eto_location extends Model
{
    use HasFactory;
    protected $table="eto_location";
    public $timestamps= false;

    protected $fillable = [
        'eto_location'
            ];

    public function registers()
    {
        return $this->hasMany(register::class, 'eto_location_id', 'id');
    }
}
