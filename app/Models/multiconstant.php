<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class multiconstant extends Model
{
    use HasFactory;
    protected $table="multiconstant";
    public $timestamps= false;

    protected $fillable = [
        'title', 'value','amount'
            ];
}
