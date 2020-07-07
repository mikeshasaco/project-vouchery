<?php

namespace App\Console\Commands;
use App\Monthlyearning;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Deleteearning extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthlyearning:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command removes monthly earning history of merchants';

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
        Monthlyearning::where('created_at', '<', Carbon::now()->subMonths(1))->delete();
    }
}
