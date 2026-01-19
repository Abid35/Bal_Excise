<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class owner_type extends Model
{
    use HasFactory;
    protected $table="owner_type";
    public $timestamps= false;

    protected $fillable = [
        'owner_type', 
            ];
}
