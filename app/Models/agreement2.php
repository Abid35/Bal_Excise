<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agreement2 extends Model
{
    use HasFactory;
    protected $table="agreement2";
    public $timestamps= false;

    protected $fillable = [
        'procurement_id','aggrement_id', 'pta_nco_no', 'pta_nco_date', 'sale_cer_no', 'sales_date', 'document', 
        'owner_type', 'owner_title'
            ];
}

