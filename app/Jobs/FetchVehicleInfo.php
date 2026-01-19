<?php

namespace App\Jobs;

use App\Models\register;
use App\Models\transfer_owner;
use App\Models\voucher_managment;
use App\Models\type_of_body;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class FetchVehicleInfo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $registrationNo;
    protected $districtID;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($registrationNo, $districtID)
    {
        $this->registrationNo = $registrationNo;
        $this->districtID = $districtID;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Fetch vehicle info
        $vehicleInfo = register::where('registration_no', $this->registrationNo)
            ->leftJoin('eto_location', 'register.eto_location_id', '=', 'eto_location.id')
            ->where('eto_location.id', $this->districtID)
            ->first(['register.*', 'eto_location.eto_location as eto_location_name']);

        if (!$vehicleInfo) {
            Cache::put("vehicle_info_{$this->registrationNo}_{$this->districtID}", ['message' => "Vehicle not found", 'status' => 404], 60);
            return;
        }

        // Fetch the latest transfer_owner info
        $transfer = transfer_owner::where('registration_no', $this->registrationNo)
            ->where('eto_location_id', $this->districtID)
            ->orderBy('transfer_code', 'desc')
            ->orderByRaw('STR_TO_DATE(dates, "%Y-%m-%d %H:%i:%s") DESC')
            ->orderByRaw('STR_TO_DATE(dates, "%m %d %Y %h:%i:%s %p") DESC')
            ->first();

        $owner_name = $transfer->name ?? $vehicleInfo->name_;
        $owner_address = $transfer->c_address ?? $vehicleInfo->address;

        // Fetch the type of body info
        $type_of_body = type_of_body::where('tob_code', $vehicleInfo->type_of_body)
            ->where('eto_location_id', $this->districtID)
            ->first();

        $voucher = voucher_managment::where('reg_no', $this->registrationNo)
            ->where('status_voucher','Paid')
            ->where('district_id', $this->districtID)
            ->orderBy('tax_app_year_to','Desc')->first();

        $data = [
            'registration_no' => $vehicleInfo->registration_no,
            'District' => $vehicleInfo->eto_location_name,
            'Owner Name' => $owner_name,
            'Address' => $owner_address,
            'Body Type' => $type_of_body ? $type_of_body->type_of_body : null,
            'Model Year' => $vehicleInfo->year_of_manufacture,
            'Engine Capacity' => $vehicleInfo->engine_capacity,
            'Engine Number' => $vehicleInfo->engine_no,
            'Seating Capacity' => $vehicleInfo->seating_capacity,
            'Last Tax Paid Upto' => $voucher ? $voucher->tax_app_year_to : null,
            'Registration Date' => $vehicleInfo->registration_date,
        ];

        Cache::put("vehicle_info_{$this->registrationNo}_{$this->districtID}", ['data' => $data, 'status' => 200], 60);
    }
}
