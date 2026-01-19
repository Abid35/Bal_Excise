<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class UpdateCnicInRegisterTableSeeder extends Seeder
{
    public function run()
    {
        $totalUpdated = 0;

        DB::table('TRANSFERED_hub')
            ->orderBy('id')
            ->chunk(4000, function ($records) use (&$totalUpdated) {
                foreach ($records as $record) {
                    $ecode = $record->ECode;
                    $name = $record->Name;
                    $cnic = $record->CNIC;

                    if (empty($cnic)) {
                        continue;
                    }

                    try {
                        // Try to update transfer table
                        $updated = DB::table('transfer')
                            ->where('registration_no', $ecode)
                            ->where('name', $name)
                            ->update(['new_cnic_no' => $cnic]);

                        if ($updated) {
                            Log::info("✔ Updated TRANSFER: Reg#: {$ecode}, CNIC: {$cnic}");
                            $totalUpdated++;
                            continue;
                        }

                        // If not found in transfer, try register
                        $updated = DB::table('register')
                            ->where('registration_no', $ecode)
                            ->where('name_', $name)
                            ->where(function ($query) {
                                $query->whereNotNull('new_cnic_no')
                                    ->orWhere('new_cnic_no', '!=', '');
                            })
                            ->update(['new_cnic_no' => $cnic]);

                        if ($updated) {
                            Log::info("✔ Updated REGISTER: Reg#: {$ecode}, CNIC: {$cnic}");
                            $totalUpdated++;
                        }

                    } catch (Throwable $e) {
                        Log::error("❌ Error: Reg#: {$ecode}, Name: {$name} — " . $e->getMessage());
                    }
                }
            });

        $this->command->info("✅ Seeder completed. {$totalUpdated} records updated.");
        $this->command->info("📄 Check logs: storage/logs/laravel.log");
    }
}



//
//namespace Database\Seeders;
//
//use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Log;
//use Throwable;
//
//class UpdateCnicInRegisterTableSeeder extends Seeder
//{
//    protected $dryRun = false; // Set to true for dry run testing
//
//    public function run()
//    {
//        $batchSize = 5000;
//        $totalUpdated = 0;
//
//        DB::table('TRANSFERED_hub')
//            ->orderBy('id')
//            ->chunkById($batchSize, function ($records) use (&$totalUpdated) {
//                $transferUpdates = [];
//                $registerUpdates = [];
//
//                foreach ($records as $record) {
//                    $ecode = $record->ECode;
//                    $name = $record->Name;
//                    $cnic = trim($record->CNIC);
//
//                    if (empty($cnic)) {
//                        continue;
//                    }
//
//                    try {
//                        $matchedTransfer = DB::table('transfer')
//                            ->where('registration_no', $ecode)
//                            ->where('name', $name)
//                            ->first();
//
//                        if ($matchedTransfer) {
//                            $transferUpdates[] = [
//                                'id' => $matchedTransfer->id,
//                                'new_cnic_no' => $cnic
//                            ];
//                            Log::info("Will update TRANSFER table: ID {$matchedTransfer->id}, Reg#: {$ecode}, CNIC: {$cnic}");
//                            $totalUpdated++;
//                            continue;
//                        }
//
//                        $matchedRegister = DB::table('register')
//                            ->where('registration_no', $ecode)
//                            ->where('name_', $name)
//                            ->whereNotNull('new_cnic_no')
//                            ->where('new_cnic_no', '!=', '')
//                            ->first();
//
//                        if ($matchedRegister) {
//                            $registerUpdates[] = [
//                                'id' => $matchedRegister->id,
//                                'new_cnic_no' => $cnic
//                            ];
//                            Log::info("Will update REGISTER table: ID {$matchedRegister->id}, Reg#: {$ecode}, CNIC: {$cnic}");
//                            $totalUpdated++;
//                        }
//
//                    } catch (Throwable $e) {
//                        Log::error("❌ Error processing Reg#: {$ecode}, Name: {$name} — " . $e->getMessage());
//                    }
//                }
//
//                if (!$this->dryRun) {
//                    try {
//                        if (!empty($transferUpdates)) {
//                            $ids = collect($transferUpdates)->pluck('id')->toArray();
//                            $cases = '';
//                            foreach ($transferUpdates as $update) {
//                                $cases .= "WHEN {$update['id']} THEN '{$update['new_cnic_no']}' ";
//                            }
//                            $idsStr = implode(',', $ids);
//                            DB::statement("
//                                UPDATE transfer
//                                SET new_cnic_no = CASE id
//                                    $cases
//                                END
//                                WHERE id IN ($idsStr)
//                            ");
//                        }
//
//                        if (!empty($registerUpdates)) {
//                            $ids = collect($registerUpdates)->pluck('id')->toArray();
//                            $cases = '';
//                            foreach ($registerUpdates as $update) {
//                                $cases .= "WHEN {$update['id']} THEN '{$update['new_cnic_no']}' ";
//                            }
//                            $idsStr = implode(',', $ids);
//                            DB::statement("
//                                UPDATE register
//                                SET new_cnic_no = CASE id
//                                    $cases
//                                END
//                                WHERE id IN ($idsStr)
//                            ");
//                        }
//                    } catch (Throwable $e) {
//                        Log::error("❌ Error during bulk update — " . $e->getMessage());
//                    }
//                }
//            });
//
//        if ($this->dryRun) {
//            $this->command->info("✅ Dry run complete. {$totalUpdated} records WOULD be updated.");
//        } else {
//            $this->command->info("✅ Seeder complete. {$totalUpdated} records were updated.");
//        }
//
//        $this->command->info("📄 Log saved to: storage/logs/laravel.log");
//    }
//}
