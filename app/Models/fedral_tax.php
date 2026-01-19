<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fedral_tax extends Model
{
    use HasFactory;
    protected $table="fedral_tax";
    public $timestamps= false;

    protected $fillable = [
        'title', 'tax'            ];
}

