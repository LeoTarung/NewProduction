<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class belajarMembuatCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sg:belajar-membuat-cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hanya ingin belajar membuat cron';

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
        echo 'Cron kita sudah jalan!';
        Log::info('Cron kita sudah jalan!');
    }
}
