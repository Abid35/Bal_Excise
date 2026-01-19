<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voucher_arrears extends Model
{
    use HasFactory;
    protected $table="voucher_arrears";
    public $timestamps= false;

    protected $fillable = [
        'gov_type', 'voucher_id', 'title','tax_arrears_type','from_date','to_date', 'amount'];

    // ultrasoft changes
    public function voucher()
    {
        return $this->belongsTo(voucher_managment::class, 'voucher_id');
    }
}

