<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agreement1 extends Model
{
    use HasFactory;
    protected $table="agreement1";
    public $timestamps= false;

    protected $fillable = [
        'procurement_id','bank_id', 'branch_id', 'sales_cer_no', 'agreement_no', 
        'bill_of_entry_no', 'letter_no', 'sales_date', 'agreement_date', 
        'bill_of_entry_date', 'letter_date'    ];
}
