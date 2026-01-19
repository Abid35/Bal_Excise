<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration_marks extends Model
{
    use HasFactory;
    protected $table="registration_marks";
    public $timestamps= false;

    protected $fillable = [
        "registration_mark"
    ];
}
