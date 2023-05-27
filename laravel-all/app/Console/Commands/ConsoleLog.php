<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConsoleLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '
    console:log
    {userId: Id of user to be fetched}
    {--verified: Gets count of verified users}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Simply console log';

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
        echo "Console Log";
    }
}
