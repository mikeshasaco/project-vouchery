<?php

namespace App\Console\Commands;
use App\User;
use App\Monthlyearning;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Addearning extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthlyearning:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command add monthly earning of merchants';

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
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $users = User::all();
        foreach($users as $user){
            $monthlyearning = new Monthlyearning;
            $subscriptions = \Stripe\Subscription::all(['plan'=>$user->stripe_plan,'status'=>'active'])->data;
            $month = Carbon::now()->firstOfMonth()->subMonth(1)->format('F, Y');
            $count = count($subscriptions);
            $monthlyearning->user_id = $user->id;
            $monthlyearning->month = $month;
            $monthlyearning->earning = $user->subscription_price*$count;
            $monthlyearning->save();
        }
    }
}
