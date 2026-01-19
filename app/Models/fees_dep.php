<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fees_dep extends Model
{
    use HasFactory;
    protected $table="fees_dep";
    public $timestamps= false;

    protected $fillable = [
        'fee_id', 'amount', 'dep_id' 
            ];
}
