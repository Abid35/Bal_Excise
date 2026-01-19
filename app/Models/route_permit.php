<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class route_permit extends Model
{
    use HasFactory;
    protected $table="route_permit";
    public $timestamps= false;

    protected $fillable = [
        'eto_name_id', 'Jurisdiction_id', 'reg_no', 'reg_id', 'issue_date', 'issue_authority_id', 'route_permit_no', 'expiry_date', 'transaction_date', 'dates', 'eto_location_id'            ];
}
