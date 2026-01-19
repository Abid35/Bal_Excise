<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RegisterDataUpload extends Seeder
{
    public function run()
    {
        $csvFilePath = database_path('TR_REG_GDATA.csv');

        // Check if the file exists
        if (!File::exists($csvFilePath)) {
            echo "File not found: " . $csvFilePath;
            return;
        }

        // Open the CSV file
        $csvFile = fopen($csvFilePath, 'r');

        // Get the header row
        $header = fgetcsv($csvFile);

        // Determine the indexes of REG_RMA, NIC_NO, and NEWNIC_NO
        $regRmaIndex = array_search('REG_RMA', $header);
        $nicIndex = array_search('NIC_NO', $header);
        $newNicIndex = array_search('NEWNIC_NO', $header);

        if ($regRmaIndex === false || $nicIndex === false || $newNicIndex === false) {
            echo "REG_RMA, NIC_NO, or NEWNIC_NO column not found in the CSV file.";
            fclose($csvFile);
            return;
        }

        // Loop through the remaining rows
        while (($row = fgetcsv($csvFile)) !== false) {
            $reg_rma = $row[$regRmaIndex];
            $nic_no = $row[$nicIndex];
            $newnic_no = $row[$newNicIndex];

            dd($nic_no);
            // Find the record in the 'register' table
//            $registerRecord = DB::table('register')->where('registration_no', $reg_rma)->first();
//
//            if ($registerRecord && (empty($registerRecord->NIC_NO) || empty($registerRecord->NEWNIC_NO))) {
//                // Update the record with the values from the CSV file if NIC_NO and NEWNIC_NO are empty
//                DB::table('register')
//                    ->where('registration_no', $reg_rma)
//                    ->update([
//                        'NIC_NO' => $nic_no,
//                        'NEWNIC_NO' => $newnic_no,
//                    ]);
//            }
        }

        // Close the file
        fclose($csvFile);

        echo "Data has been successfully updated.";
    }
}

