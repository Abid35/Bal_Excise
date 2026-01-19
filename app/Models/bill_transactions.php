<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill_transactions extends Model
{
    use HasFactory;
    protected $table="bill_transactions";
    public $timestamps= false;

    protected $fillable = [
        'consumer_number', 'eto_location_id', 'consumer_Detail', 'bill_status', 'due_date', 'amount_within_dueDate', 'amount_after_dueDate', 'billing_month',
        'date_paid', 'amount_paid', 'tran_auth_id', 'reserved', 'bank_mnemonic', 'tran_date', 'tran_time', 'transaction_amount', 'Identification_parameter'
    ];
}
