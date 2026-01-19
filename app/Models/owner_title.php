<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class owner_title extends Model
{
    use HasFactory;
    protected $table="owner_title";
    public $timestamps= false;

    protected $fillable = [
        'owner_title'
            ];
}
