<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class token_rate extends Model
{
    use HasFactory;
    protected $table="token_rate";
    public $timestamps= false;

    protected $fillable = [
        'rate_year', 'lifetime', 'fees_id'
            ];
}
