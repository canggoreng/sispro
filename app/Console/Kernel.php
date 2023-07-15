<?php

namespace App\Console;
use App\Models\RekapRegPerhari;
use App\Models\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
            Commands\DemoCron::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
            $schedule->call(function () {

            $connection = Connection::where('id_connection',1)->first();                
            $rand = date('Y-m-d');
            $sekarang = date('d-m-Y');
            $count_data_pasien =
                DB::connection($connection->connection)
                ->table('rsuhkhanza_real.reg_periksa') 
                ->where('tgl_registrasi','=',$rand)
                ->whereNotIn('stts', ['Batal'])
                ->count();
            $rekap_reg_perhari = new RekapRegPerhari;
            $rekap_reg_perhari->tgl_registrasi = $sekarang;
            $rekap_reg_perhari->jumlah = $count_data_pasien;
            $rekap_reg_perhari->save();       
        })
        // ->dailyAt('23:55');
        ->everyMinute();

        // $schedule->command('schedule:run')->everyMinute()->withoutOverlapping();
        // $schedule->command('demo:cron')
                //  ->dailyAt('23:55');
                //  ->everyMinute();
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
