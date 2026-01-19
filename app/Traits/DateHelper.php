<?php

namespace App\Traits;

use Carbon\Carbon;

trait DateHelper
{
    /**
     * Parse a raw date into Y-m-d format (handles multiple formats).
     *
     * @param  string|null  $rawDate
     * @return string|null
     */
    protected function parseFlexibleDate($rawDate): ?string
    {
        if (!$rawDate) {
            return null;
        }

        // ✅ Already Y-m-d
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $rawDate)) {
            return $rawDate;
        }

        // ✅ Full datetime Y-m-d H:i:s
        if (preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $rawDate)) {
            try {
                return Carbon::createFromFormat('Y-m-d H:i:s', $rawDate)->format('Y-m-d');
            } catch (\Exception $e) {
                return null;
            }
        }

        // Replace common delimiters
        $cleanedDate = str_replace([',', '-', '.'], '/', $rawDate);

        // ✅ Handle dd/mm/yy (e.g. 31/03/22)
        if (preg_match('/^(\d{2})\/(\d{2})\/(\d{2})$/', $cleanedDate, $matches)) {
            $day = $matches[1];
            $month = $matches[2];
            $year = (int) $matches[3];
            $year += ($year > 50) ? 1900 : 2000;

            try {
                return Carbon::createFromFormat('d/m/Y', "$day/$month/$year")->format('Y-m-d');
            } catch (\Exception $e) {
                return null;
            }
        }

        // ✅ Try common fallback formats
        $formats = [
            'm/d/Y h:i:s A',
            'm/d/Y',
            'd/m/Y',
            'd/m/Y H:i:s',
        ];

        foreach ($formats as $format) {
            try {
                return Carbon::createFromFormat($format, $cleanedDate)->format('Y-m-d');
            } catch (\Exception $e) {
                continue;
            }
        }

        return null;
    }
}
