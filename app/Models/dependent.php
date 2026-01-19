<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dependent extends Model
{
    use HasFactory;
    protected $table="dependent";
    public $timestamps= false;

    protected $fillable = [
        'main_table', 'dep_table', 'dep_table_id', 'multiconstant_id','amount','fixed_amount','fees_id','type','ex_table', 'ex_table_id'
            ];
}
