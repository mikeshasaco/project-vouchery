<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Carbon\Carbon;
use App\Notifications\CustomerResetPasswordNotification;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Laravel\Cashier\Billable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;
    use CanBeFollowed;
    use Notifiable;
    use CanFollow;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company', 'slug',
        'avatar', 'affiliate_id', 'referred_by', 'verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function categories()
    {
        return $this->hasMany('App\Category');
    }


    public function isAdmin()
    {
        return $this->admin;
    }

    public function account()
    {
        return $this->hasOne('App\Account');
    }

    public function recommends()
    {
        return $this->hasMany('App\Recommends');
    }

    public function percentageoff()
    {
        $newpercentage =   $this->currentprice - $this->newprice;

        $final = $newpercentage/ $this->currentprice * 100;


        return sprintf("%.0f%%", $final);
    }

    public function affiliates()
    {
        return $this->belongsTo('App\User', 'affiliate_id', 'referred_by');
    }

    public function clicks()
    {
        return $this->hasMany('App\Click');
    }
    public function getCompanyAttribute($value){
        return ucfirst($value);
    }
    // public function getAvatarAttribute($value){
    //     return Storage::url($value);
    // }

    public function verifyUser(){
        return $this->hasOne('App\VerifyUser');
    }

    
    public function subscriptionByPlan($subscription = 'default', $plan = null) {
        if (!$plan)
            return $this->subscription($subscription);

        return $this->subscriptions->where('stripe_plan', $plan)->first();
    }
    public function subscribedByPlan($subscription = 'default', $plan = null) {
        $subscription = $this->subscriptionByPlan($subscription, $plan);
        if (is_null($subscription)) {
            return false;
        }

        if (is_null($plan)) {
            return $subscription->valid();
        }

        return $subscription->valid() &&
               $subscription->stripe_plan === $plan;
    }

    public function subscribercount()
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $user = Auth::user();

  
        $subscriptions = \Stripe\Subscription::all(['plan' => $user->stripe_plan, 'status' => 'active'])->data;
        // so if not the current user
        if (!$user->stripe_plan || $subscriptions == []) {
            $subscription_customer = [];
        } else {
            foreach ($subscriptions as $subscription) {
                $subscription_customer[] = $subscription->customer;
            }
        }
       
        $customers = User::whereIn('stripe_id', $subscription_customer)->get();

      
            return  count($customers);


    }
}
