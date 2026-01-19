<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book_issue extends Model
{
    use HasFactory;
    protected $table="book_issue";
    public $timestamps= false;

    protected $fillable = [
        'registration_id','registration_no','eto_location_id', 'application_for_id', 'reason', 
        'circumstances', 'fir_no', 'fir_date', 'police_station', 
        'inspection_date', 'inspector', 'duplicate_book_no'
            ];
}

