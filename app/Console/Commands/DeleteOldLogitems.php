<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Logitems;

class DeleteOldLogitems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:logitems';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete logitems 2 weeks old';

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
        Logitems::where('eventdatetime', '<', date('Y-m-d H:i:s', strtotime('today - 1 week')))->forceDelete();
    }
}
