<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class voucher_managment extends Model
{
    use HasFactory;
    protected $table="voucher_managment";
    public $timestamps= false;

    protected $fillable = [
        'user_id','registration_id', 'issue_date', 'district', 'total_amount', 'status', 'district_id', 'reg_no', 'tax_app_year_from', 'tax_app_year_to', 'last_paid_year', 'last_paid_amount', 'challan_no' , 'status_voucher' , 'old_record_status', 'bank_name', 'bank_branch', 'bank_payment_date'];

    // ultrasoft changes
    public function voucher_ids()
    {
        return $this->hasMany(vouchers_ids::class, 'voucher_id');
    }

    public function voucher_arrears()
    {
        return $this->hasMany(voucher_arrears::class, 'voucher_id');
    }

    public function registration()
    {
        return $this->belongsTo(register::class, 'registration_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function getLastPaidYearAttribute($value)
    {
        if($value instanceof Carbon)
        {
            return date('d/m/y', strtotime($value->format('Y-m-d H:i:s')));
        }

        if($value==null || $value==0)
        {
            return $value;
        }
        else
        {

            return date('d/m/y', strtotime($value));



        }
    }

    public function getTaxAppYearToAttribute($value)
    {
        if($value instanceof Carbon)
        {
            return date('d/m/y', strtotime($value->format('Y-m-d H:i:s')));
        }

        if($value==null || $value==0)
        {
            return $value;
        }
        else
        {

            return date('d/m/y', strtotime($value));



        }
    }

    public function getIssueDateAttribute($value)
    {
        if($value instanceof Carbon)
        {
            return date('d/m/y', strtotime($value->format('Y-m-d H:i:s')));
        }

        if($value==null || $value==0)
        {
            return $value;
        }
        else
        {

            return date('d/m/y', strtotime($value));



        }
    }


}

