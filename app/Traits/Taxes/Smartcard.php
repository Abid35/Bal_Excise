<?php

namespace App\Traits\Taxes;

trait SmartCard
{
    /**
     * Set Smart Card Tax Data
     *
     * @param array $dtax
     * @param int $ct
     * @param object $r
     * @param int $x
     * @param array $dep
     * @return array Updated dtax with new record
     */
    public function setSmartCardData($dtax, $ct, $r, $x, $dep)
    {
        $dtax[$ct]['Name']   = $r->title ?? '';
        $dtax[$ct]['id']     = $x;
        $dtax[$ct]['type']   = $r->type ?? '';
        $dtax[$ct]['Amount'] = $dep[0]['fixed_amount'] ?? 0;

        return $dtax;
    }
}
