<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class issuing_authority extends Model
{
    use HasFactory;
    protected $table="issuing_authority";
    public $timestamps= false;

    protected $fillable = [
        'authority'
            ];
}
