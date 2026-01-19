<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class government_departments extends Model
{
    use HasFactory;
    protected $table="government_departments";
    public $timestamps= false;

    protected $fillable = [
        'department_name'
    ];
}
