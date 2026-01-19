<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vouchers_ids extends Model
{
    use HasFactory;
    protected $table="voucher_ids";
    public $timestamps= false;

    protected $fillable = [
        'voucher_id','fees_id', 'title', 'amount', 'duration', 'from', 'to', 'option'];


    // ultrasoft changes
    public function fee()
    {
        return $this->belongsTo(fees::class, 'fees_id');
    }

    public function voucher()
    {
        return $this->belongsTo(voucher_managment::class, 'voucher_id');
    }
}

