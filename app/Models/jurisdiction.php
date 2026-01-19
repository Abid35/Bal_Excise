<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurisdiction extends Model
{
    use HasFactory;
    protected $table="Jurisdiction";
    public $timestamps= false;

    protected $fillable = [
        'Jurisdiction'
            ];
}
