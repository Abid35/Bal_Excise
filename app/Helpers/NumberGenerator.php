<?php

namespace App\Helpers;

use App\Models\NumberPattern;
use App\Models\register;
use App\Models\UnregisteredNumber;
use App\Models\VanityPlate;

class NumberGenerator
{
    public static function getNextAvailable(NumberPattern $pattern, $etoLocationId, $ownerTypeId)
    {
        $startPrefix = strtoupper($pattern->start_prefix); // ✅ Force uppercase
        $endPrefix = strtoupper($pattern->end_prefix);     // ✅ Force uppercase
        $startNo = $pattern->start_no;
        $endNo = $pattern->end_no;

        $currentPrefix = strtoupper($pattern->last_generated_prefix ?? $startPrefix);
        $currentNo = $pattern->last_generated_no ?? $startNo;

        // 🛑 Numbers to skip
        $skipNumbers = [804, 440, 666, 999];

        for ($prefix = $currentPrefix; self::prefixCompare($prefix, $endPrefix) <= 0; $prefix = self::nextPrefix($prefix)) {
            for ($num = $currentNo; $num <= $endNo; $num++) {

                // 🚫 Skip unwanted numbers
                if (in_array($num, $skipNumbers)) {
                    continue;
                }

                // Try both formats (always uppercase)
                $regNoWithDash = strtoupper("{$prefix}-{$num}");
                $regNoWithoutDash = strtoupper("{$prefix}{$num}");

                if (!self::existsInAnyTable($regNoWithDash, $etoLocationId, $ownerTypeId) &&
                    !self::existsInAnyTable($regNoWithoutDash, $etoLocationId, $ownerTypeId)) {
                    // Update pattern
                    $pattern->update([
                        'last_generated_prefix' => $prefix,
                        'last_generated_no' => $num,
                    ]);
                    // Return format based on pattern
                    return $pattern->has_dash ? $regNoWithDash : $regNoWithoutDash;
                }
            }

            // reset number for next prefix
            $currentNo = $startNo;
        }

        return null;
    }

    // Compare two prefixes alphabetically
    private static function prefixCompare($a, $b)
    {
        return strcmp($a, $b);
    }

    // Generate next alphabetical prefix (e.g. ABC → ABD → ABE … → ABZ → ACA)
    private static function nextPrefix($prefix)
    {
        $chars = str_split(strtoupper($prefix));
        $i = count($chars) - 1;

        while ($i >= 0) {
            if ($chars[$i] !== 'Z') {
                $chars[$i] = chr(ord($chars[$i]) + 1);
                break;
            } else {
                $chars[$i] = 'A';
                $i--;
            }
        }

        if ($i < 0) {
            array_unshift($chars, 'A');
        }

        return implode('', $chars);
    }

    // Check if number exists in any table
    private static function existsInAnyTable($regNo, $etoLocationId, $ownerTypeId)
    {
        $regNo = strtoupper($regNo);

        // GOVERNMENT => global unique
        if ($ownerTypeId == 2) {
            return
                register::where('registration_no', $regNo)->exists() ||
                UnregisteredNumber::where('registration_no', $regNo)->exists() ||
                VanityPlate::where('plate_number', $regNo)->exists();
        }

        // PRIVATE => local (district) unique
        return
            register::where('registration_no', $regNo)
                ->where('eto_location_id', $etoLocationId)
                ->exists() ||

            UnregisteredNumber::where('registration_no', $regNo)
                ->where('district_id', $etoLocationId)
                ->exists() ||

            VanityPlate::where('plate_number', $regNo)
                ->where('district_id', $etoLocationId)
                ->exists();
    }
}
