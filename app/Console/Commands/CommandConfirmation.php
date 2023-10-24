<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CommandConfirmation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:confirmation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automate Confirm Agreement Task and Weekly Reprort';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        info("Cron Job running at " . now());
    }
}
