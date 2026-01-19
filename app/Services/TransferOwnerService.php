<?php

namespace App\Services;

use App\Models\transfer_owner;
use App\Models\cities;
use App\Models\colors;
use App\Models\manufacturer;
use App\Models\eto_location;
use App\Models\reg_maker;

class TransferOwnerService
{
    /**
     * Fetch and process transfer owner data.
     *
     * @param object $data
     * @return object
     */
    public function processTransferOwnerData($data)
    {
        $checkTransferOwner = transfer_owner::where('reg_id', $data->id)
            ->where('eto_location_id', $data->eto_location_id)
            ->first();

        if ($checkTransferOwner) {
            $this->processExistingOwner($data);
        } else {
            $this->processNewOwner($data);
        }

        return $data;
    }

    /**
     * Process data for an existing transfer owner.
     *
     * @param object $data
     * @return void
     */
    private function processExistingOwner($data)
    {
        $maxTransferCode = transfer_owner::where('reg_id', $data->id)
            ->where('eto_location_id', $data->eto_location_id)
            ->orderBy('dates')
            ->max('transfer_code');

        $data2 = transfer_owner::where('reg_id', $data->id)
            ->where('eto_location_id', $data->eto_location_id)
            ->where('transfer_code', $maxTransferCode)
            ->orderByRaw('STR_TO_DATE(dates, "%Y-%m-%d %H:%i:%s") DESC')
            ->orderByRaw('STR_TO_DATE(dates, "%m %d %Y %h:%i:%s %p") DESC')
            ->first();

        if ($data2) {
            $this->updateDataFields($data, $data2);
        }
    }

    /**
     * Process data for a new transfer owner.
     *
     * @param object $data
     * @return void
     */
    private function processNewOwner($data)
    {
        $maxTransferCode = transfer_owner::where('registration_no', $data->registration_no)
            ->where('eto_location_id', $data->eto_location_id)
            ->orderBy('dates')
            ->max('transfer_code');

        $data2 = transfer_owner::where('registration_no', $data->registration_no)
            ->where('eto_location_id', $data->eto_location_id)
            ->where('transfer_code', $maxTransferCode)
            ->orderBy('dates')
            ->first();

        if ($data2) {
            $this->updateDataFields($data, $data2);
        }
    }

    /**
     * Update data fields based on transfer owner details.
     *
     * @param object $data
     * @param object $data2
     * @return void
     */
    private function updateDataFields(&$data, $data2)
    {
        $data->transfer_code = $data2->transfer_code ?? '';
        $data->father_or_husband_name = $data2->f_name;
        $data->name_ = $data2->name;
        $data->new_cnic_no = $data2->new_cnic_no;
        $data->ntn_no = $data2->ntn_no ?? $data->ntn_no;

        $data->owner_type_id = $data2->owner_type_id ?? $data->owner_type_id;

        if ($data2->ntn_no === null) {
            $data->old_cnic_no = $data2->old_cnic_no;
        } else {
            $data->old_cnic_no = $data2->ntn_no;
        }

        $data->title = $data2->owner_title_id != 0 ? $data2->owner_title_id : ($data->title ?? 4);

        $city = cities::where('city_code', $data2->p_city)
            ->where('eto_location_id', $data->eto_location_id)
            ->first();

        $data->house_no = $data2->p_address;
        $data->Province_id = $city ? $city->province_id : null;
        $data->City_id = $data2->p_city;
        $data->mobile_no = $data2->p_phone;

        // ✅ Get color name from colors table
        if (!empty($data->color_of_vehicle_id)) {
            $color = \App\Models\colors::find($data->color_of_vehicle_id);
            $data->color_name = $color ? $color->colors : null;
        } else {
            $data->color_name = null;
        }

        // ✅ Get maker name from related tables
        $r = reg_maker::where('eto_location_id', $data->eto_location_id)
            ->where('reg_no', $data->registration_no)
            ->first();

        if ($r) {
            $m = manufacturer::where('eto_location_id', $data->eto_location_id)
                ->where('code', $r->maker_code)
                ->first();
            if ($m) {
                $data->makers_name = $m->manufacturer;
            }
        } else {
            $m = manufacturer::where('eto_location_id', $data->eto_location_id)
                ->where('code', $data->makers_name)
                ->first();
            if ($m) {
                $data->makers_name = $m->manufacturer;
            }
        }

        // ✅ Get ETO Location name
        if (!empty($data->eto_location_id)) {
            $eto = eto_location::find($data->eto_location_id);
            $data->eto_location_name = $eto ? $eto->eto_location : null;
        } else {
            $data->eto_location_name = null;
        }
    }
}

