<?php

namespace App\Traits;

trait PralCategoryOfVehicleCode
{
    /**
     * Determine the vehicle category based on PRAL tax code and category_of_vehicle.
     *
     * @param int $pral_tax_code
     * @param string $category_of_vehicle
     * @return int
     */
    public function getVehicleCategoryCode($pral_tax_code, $category_of_vehicle)
    {
        // Normalize input
        $normalizedCategory = strtolower(trim(preg_replace('/\s+/', ' ', $category_of_vehicle)));

        // Case 1: Non-commercial vehicles
        if ($normalizedCategory === 'non-commercial') {
            return 1; // Private / personal vehicles
        }

        // Case 2: Commercial PRAL tax codes
        $commercialCodes = [2, 3, 5, 6, 7, 8, 9, 17];
        if (in_array($pral_tax_code, $commercialCodes)) {
            return 3; // Heavy / commercial
        }

        // Default: Semi-commercial / Others
        return 2;
    }
}
