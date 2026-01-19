<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application_type extends Model
{
    use HasFactory;
    protected $table="application_type";
    public $timestamps= false;

    protected $fillable = [
        'application_type'
            ];
}
