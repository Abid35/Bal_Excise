<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bank_branch extends Model
{
    use HasFactory;
    protected $table="bank_branch";
    public $timestamps= false;

    protected $fillable = [
        'bank_id', 'branch'            ];
}

?>