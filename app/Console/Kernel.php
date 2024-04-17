<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Http\Livewire\ScheduledMaintainences;
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
        $schedule->call('\App\Http\Livewire\ScheduledMaintainences@weeklySchedule')->weekly();
        $schedule->call('\App\Http\Livewire\ScheduledMaintainences@quarterlySchedule')->quarterly();
        $schedule->call('\App\Http\Livewire\ScheduledMaintainences@monthlySchedule')->monthly();
   
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
