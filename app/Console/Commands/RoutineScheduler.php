<?php

namespace App\Console\Commands;

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
        return redirect('/send/reminder');
        return Command::SUCCESS;
    }
}
