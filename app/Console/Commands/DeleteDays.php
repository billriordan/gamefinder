<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\Day;

class DeleteDays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:days';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete days before DATE::NOW()';

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
     * @return mixed
     */
    public function handle()
    {
        Day::deletePastDays();
    }
}
