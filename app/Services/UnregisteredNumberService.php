<?php

namespace App\Services;

use App\Models\UnregisteredNumber;

class UnregisteredNumberService
{
    /**
     * Get available unregistered numbers by CNIC or NTN
     *
     * @param  string|null  $cnic
     * @param  string|null  $ntn
     * @return \Illuminate\Support\Collection
     */
    public function getAvailableNumbers(?string $cnic = null, ?string $ntn = null)
    {
        $query = UnregisteredNumber::query()->where('is_assigned', false);

        if ($cnic) {
            $query->where('owner_cnic', $cnic);
        }

        if ($ntn) {
            $query->orWhere('owner_ntn', $ntn);
        }

        return $query->get(['id', 'registration_no', 'owner_cnic']);
    }

    /**
     * Assign an unregistered number (mark as used)
     *
     * @param  string  $registrationNo
     * @return bool
     */
    public function markAsAssigned(string $registrationNo): bool
    {
        $record = UnregisteredNumber::where('registration_no', $registrationNo)->first();

        if ($record) {
            $record->update(['is_assigned' => true]);
            return true;
        }

        return false;
    }
}
