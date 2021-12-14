<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RoutineScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scheduler:routine';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Routine appointment Reminded';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $patients = Appointment::select('email_address','surname','othernames','preferred_date')->where('preferred_date', '>', Carbon::now()->startOfWeek())
                ->where('preferred_date', '<', Carbon::now()->endOfWeek())
                ->get();
                foreach($patients as $patient){
                    $email = $patient->email_address;
                    $preferred_date = $patient->preferred_date;
                    $full_name = $patient->surname . ' ' . $patient->othernames;
                \Illuminate\Support\Facades\Mail::send(new \App\Mail\ReminderMail($email, $full_name,$preferred_date));
                }
            echo "running";
        return Command::SUCCESS;
    }
}
