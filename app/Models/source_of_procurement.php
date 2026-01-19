<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class source_of_procurement extends Model
{
    use HasFactory;
    protected $table="source_of_procurement";
    public $timestamps= false;

    protected $fillable = [
        'source_of_procurement', 
            ];
    
}
