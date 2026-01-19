<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tax_disable extends Model
{
    use HasFactory;
    protected $table="tax_disable";
    public $timestamps= false;

    protected $fillable = [
        'oncheck_tax', 'disabled_tax'
            ];
}
