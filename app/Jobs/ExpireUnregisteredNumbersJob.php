<?php

namespace App\Jobs;

use App\Models\UnregisteredNumber;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExpireUnregisteredNumbersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        // Fetch records unassigned for 2 years and not already expired
        $expiredCount = UnregisteredNumber::where('is_assigned', false)
            ->whereNull('expired_at')
            ->where('created_at', '<=', Carbon::now()->subYears(2))
            ->update(['expired_at' => Carbon::now()]);

        // Optional: log job activity
        if ($expiredCount > 0) {
            \Log::info("ExpireUnregisteredNumbersJob: {$expiredCount} unregistered numbers marked as expired.");
        }
    }
}
