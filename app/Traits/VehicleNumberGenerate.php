<?php

namespace App\Traits;

use App\Helpers\NumberGenerator;
use App\Models\NumberPattern;

trait VehicleNumberGenerate
{
//    protected function generate($bodyTypeId): ?string
//    {
//        // Find pattern based on vehicle body type
//        $pattern = NumberPattern::where('type', $bodyTypeId)
//            ->orderBy('id', 'asc') // in case multiple patterns exist
//            ->first();
//
//        if (!$pattern) {
//            return response()->json(['Status' => false, 'Message' => 'No pattern found for selected body type.']);
//        }
//
//        $nextNumber = NumberGenerator::getNextAvailable($pattern);
//
//        return $nextNumber;
//    }

    protected function generate($bodyTypeId, $etoLocationId, $ownerTypeId): ?string
    {
        if ($ownerTypeId == 2) {
            // Govt vehicles
            $pattern = NumberPattern::where('is_government', 1)->first();
        } else {
            $pattern = NumberPattern::where('type', $bodyTypeId)
                ->where('district_id', $etoLocationId)
                ->first();
        }

        if (!$pattern) {
            return null;
        }

        return NumberGenerator::getNextAvailable($pattern, $etoLocationId, $ownerTypeId);
    }

}
