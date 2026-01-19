<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchPralPsidDetailsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $url = "https://gw.fbr.gov.pk/beto/v1/PsidGeneration/GetPSIDDetails";

        $payload = [
            "paymentStatusCode"     => 4,
            "paymentProcessingDate" => now()->format('Y-m-d'),
        ];

        $response = Http::withHeaders([
            "Authorization" => "Bearer " . env("FBR_API_TOKEN"),
            "Content-Type"  => "application/json",
            "Cookie"        => env("FBR_API_COOKIES"),
        ])->post($url, $payload);

        if ($response->successful()) {
            $data = $response->json();

            foreach ($data as $item) {
                DB::table('pral_vehicle_taxes')->updateOrInsert(
                    ['psiD_NUMBER' => $item['psiD_NUMBER']], // unique check
                    [
                        'vehicleRegistrationNumber' => $item['vehicleRegistrationNumber'],
                        'ownerName' => $item['ownerName'],
                        'districtName' => $item['districtName'],
                        'districtCode' => $item['districtCode'],
                        'provincialTax' => $item['provincialTax'],
                        'federalTax' => $item['federalTax'],
                        'provincialArrears' => $item['provincialArrears'],
                        'provincialPlenty' => $item['provincialPlenty'],
                        'federalArrears' => $item['federalArrears'],
                        'federalPlenty' => $item['federalPlenty'],
                        'professionalTax' => $item['professionalTax'],
                        'surcharge' => $item['surcharge'],
                        'totalTax' => $item['totalTax'],
                        'paymentStatusCode' => $item['paymentStatusCode'],
                        'paymentStatus' => $item['paymentStatus'],
                        'paymentProcessingDate' => $item['paymentProcessingDate'],
                        'paymentFrom' => $item['paymentFrom'],
                        'paymentTo' => $item['paymentTo'],
                        'filingStatus' => $item['filingStatus'],
                        'updated_at' => now(),
                    ]
                );

                // Update register table last_tax_date where registration_no matches
                if (!empty($item['vehicleRegistrationNumber']) && !empty($item['paymentTo'])) {
                    DB::table('register')
                        ->where('registration_no', $item['vehicleRegistrationNumber'])
                        ->where('eto_location_id', $item['districtCode'])
                        ->update(['last_tax_date' => $item['paymentTo']]);
                }
            }

            \Log::info("✅ PSID API data inserted/updated successfully", ['count' => count($data)]);
        } else {
            \Log::error("❌ PSID API Error: " . $response->status() . " - " . $response->body());
        }
    }
}
