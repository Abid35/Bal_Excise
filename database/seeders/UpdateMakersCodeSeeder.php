<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateMakersCodeSeeder extends Seeder
{
    public function run(): void
    {
        DB::beginTransaction();

        try {
            DB::table('BACKUP_register_chassis_no')
                ->orderBy('id')
                ->chunk(2000, function ($chassis_numbers) {
                    foreach ($chassis_numbers as $chassis_number) {
                        $updated = DB::table('register')
                            ->where('registration_no', $chassis_number->reg_no)
                            ->where('eto_location_id', 2)
                            ->update([
                                // Typo fixed: 'chassis_nmo' → 'chassis_no'
                                'chassis_no' => $chassis_number->chassis_nmo,
                                'engine_no'  => $chassis_number->engine_no,
                            ]);

//                        if ($updated) {
//                            Log::info("Updated record for reg_no: {$chassis_number->reg_no}");
//                        }
                    }
                });

            DB::commit();
            echo "Seeder completed successfully.\n";
        } catch (\Exception $e) {
            DB::rollBack();
            echo "Seeder failed: " . $e->getMessage() . "\n";
//            Log::error("Seeder failed: " . $e->getMessage());
        }
    }
}
