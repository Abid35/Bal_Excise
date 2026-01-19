<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arreargov_type extends Model
{
    use HasFactory;
    protected $table="arreargov_type";
    public $timestamps= false;

    protected $fillable = [
        'goverment' , 'gov_id'
            ];
}
