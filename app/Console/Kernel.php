<?php

namespace App\Console;

use App\Jobs\ExpireUnregisteredNumbersJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // Run every day at 2 AM
//        $schedule->job(new \App\Jobs\FetchPralPsidDetailsJob)->dailyAt('02:00');

        $schedule->job(new \App\Jobs\FetchPralPsidDetailsJob)->everyMinute();
        $schedule->job(new ExpireUnregisteredNumbersJob)->daily();


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
