<?php

namespace App\Console\Commands;
use App\Product;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteCoupons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:coupon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command removes coupons of merchants';

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
        Product::where('created_at' ,'<=', Carbon::now()->subDay(7))->delete();
        //Product::where('created_at','<=',  Carbon::now()->subDay(7))->delete();

    }
}
