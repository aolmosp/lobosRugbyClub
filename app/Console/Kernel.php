<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:generate_monthy_payments')->timezone('America/Santiago')->monthlyOn(28, '15:00');
        $schedule->command('app:generate_monthy_payments')->timezone('America/Santiago')->dailyAt('02:24');
        $schedule->command('app:generate_monthy_payments')->timezone('America/Santiago')->dailyAt('02:25');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
