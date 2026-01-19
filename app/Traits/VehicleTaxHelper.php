<?php

namespace App\Traits;

use App\Models\pral_vehicle_taxes;
use App\Models\voucher_managment;
use Carbon\Carbon;
use App\Traits\DateHelper;


trait VehicleTaxHelper
{
    use DateHelper;

    /**
     * Get the latest paid tax date for a vehicle (PRAL → Voucher fallback).
     *
     * @param  string  $registrationNo
     * @param  int     $districtID
     * @return string|null
     */
    public function getLatestPaidTaxDate(string $registrationNo, int $districtID, int $vehicleInfoId)
    {
        // Check from PRAL first
        $pral_paymentTo = pral_vehicle_taxes::where('vehicleRegistrationNumber', $registrationNo)
            ->where('paymentStatus', 'Paid')
            ->where('districtCode', $districtID)
            ->latest('paymentTo')
            ->value('paymentTo');

        if ($pral_paymentTo) {
            return $this->parseFlexibleDate($pral_paymentTo);
        }

        // Fallback: check from Voucher
        $voucher = voucher_managment::where('registration_id', $vehicleInfoId)
            ->where('status_voucher', 'Paid')
            ->where('district_id', $districtID)
            ->latest('tax_app_year_to')
            ->first();

        return $this->parseFlexibleDate($voucher->tax_app_year_to ?? null);
    }

}
