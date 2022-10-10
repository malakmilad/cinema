<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteReservation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:reservation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete reservation for this user after 7days';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
