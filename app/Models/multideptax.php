<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class multideptax extends Model
{
    use HasFactory;
    protected $table="multideptax";
    public $timestamps= false;

    protected $fillable = [
        'percentage', 'fixed_amount', 'fees_id'
            ];
}
