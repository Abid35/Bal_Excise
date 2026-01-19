<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateRegisterFromBackupSeeder extends Seeder
{
    public function run(): void
    {
        DB::beginTransaction();

        try {
            DB::table('BACKUP_register_2019_2024')->orderBy('id')->chunk(2000, function ($rows) {
                foreach ($rows as $key => $row) {
                    // Skip if registration_no or chassis_no is empty
                    if (empty($row->REG_RMA) || empty($row->CHASSIS_NO)) {
                        continue;
                    }

                    // Check if record already exists
                    $exists = DB::table('register')
                        ->where('registration_no', $row->REG_RMA)
                        ->where('chassis_no', $row->CHASSIS_NO)
                        ->exists();

                    if ($exists) {
                        continue;
                    }

                    // Insert into 'register' table
                    $registerId = DB::table('register')->insertGetId([
                        'eto_name_id' => $row->ETO_CODE ?? "",
                        'eto_location_id' => 2,
                        'Jurisdiction_id' => $row->JUD_CODE ?? "",
                        'registration_no' => $row->REG_RMA ?? "",
                        'owner_type_id' => 1 ?? "",
                        'title' => $row->OWNER_TITAL ?? "",
                        'name_' => $row->OWNER_NAME ?? "",
                        'father_or_husband_name' => $row->OWNER_FNAME ?? "",
                        'address' => $row->C_ADDRESS ?? "",
                        'City_id' => $row->C_CITY_CODE ?? "",
                        'ntn_no' => $row->NIC_NO ?? "",
                        'new_cnic_no' => $row->NEWNIC_NO ?? "",
                        'type_of_body' => $row->TOB_CODE ?? "",
                        'makers_name' => $row->MAKER_CODE ?? "",
                        'year_of_manufacture' => $row->M_YEAR ?? "",
                        'number_of_cylinder' => $row->NO_OF_CYLND ?? "",
                        'engine_capacity' => $row->ENG_CAPACITY ?? "",
                        'chassis_no' => $row->CHASSIS_NO ?? "",
                        'engine_no' => $row->ENGINE_NO ?? "",
                        'seating_capacity' => $row->SEATING_CAPACITY ?? "",
                        'unladen_unit' => 1,
                        'unladen_weight' => $row->UNLADEN_WGHT ?? "",
                        'laden_unit' => 1,
                        'laden_weight' => $row->LADEN_WGHT ?? "",
                        'book_serialNo' => $row->REGSR_NO ?? "",
                        'registration_date' => $row->RE_DATE ?? "",
                        'remarks' => $row->REMARKS ?? "",
                        'tr_date' => $row->T_DATE ?? "",
                        'category_of_vehicle_id' => $row->CATEGORY_CODE ?? "",
                        'secondregistration_date' => $row->CHANGEDATE ?? "",
                        'backup_data_status' => 1,
                    ]);

                    // Insert into 'additional_attachment_trailer' table
                    DB::table('additional_attachment_trailer')->insert([
                        'eto_location_id' => 2,
                        'eto_name_id' => $row->ETO_CODE ?? "",
                        'Jurisdiction_id' => $row->JUD_CODE ?? "",
                        'reg_no' => $row->REG_RMA ?? "",
                        'reg_id' => $registerId,
                        'max_lan_weight_unit' => 1,
                        'max_lan_weight' => $row->LADEN_WGHT ?? "",
                        'max_lan_weight_front_axle' => $row->TYRE_F_EXLE ?? "",
                        'max_lan_weight_rear_axle' => $row->TYRE_R_EXLE ?? "",
                        'max_lan_weight_any_other_axle' => $row->TYRE_O_EXLE ?? "",
                        'axleunit' => $row->AXE_UNIT_CODE ?? "",
                        'tyre_front_axle' => $row->AXEL_F_AXEL ?? "",
                        'tyre_rear_axle' => $row->AXE_R_AXEL ?? "",
                        'tyre_any_other_axle' => $row->AXEL_O_EXLE ?? "",
                        'dates' => $row->RE_DATE ?? "",
                        'tr_flag' => $row->TR_FLAG ?? "",
                    ]);

                    Log::info("Inserted row {$key}: REG = {$row->REG_RMA}, CHASSIS = {$row->CHASSIS_NO}");
                }
            });

            DB::commit();
            echo "Seeder completed successfully.\n";
        } catch (\Exception $e) {
            DB::rollBack();
            echo "Seeder failed: " . $e->getMessage() . "\n";
            Log::error("Seeder failed: " . $e->getMessage());
        }
    }
}
