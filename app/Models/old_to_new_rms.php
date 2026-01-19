<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class old_to_new_rms extends Model
{
    use HasFactory;
    protected $table="old_to_new_rms";
    public $timestamps= false;

    protected $fillable = [
        'user_id','old_eto_name_id', 'old_jurisdiction_id', 'old_reg_no', 'new_eto_name_id', 'new_jurisdiction_id', 'new_reg_no', 'reg_id', 'alteration_id','police_insp_date', 'exiseins_date', 'dates', 'eto_location_id'            ];

    public function getTableColumns() {
            return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
        }
}
