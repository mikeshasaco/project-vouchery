<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomerResetPasswordNotification;
use Laravel\Cashier\Billable;

class Customer extends Authenticatable
{

    use Notifiable;
    use CanFollow;
    use Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'customerslug', 'verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName()
    {
        return 'customerslug';
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetPasswordNotification($token));
    }

    public function clicks()
    {
        return $this->hasMany('App\Click');
    }

    public function getUsernameAttribute($value){
        return ucfirst($value);
    }

    public function verifyCustomer(){
        return $this->hasOne('App\VerifyCustomer');
    }

    // public function subscriptionByPlan($subscription = 'default', $plan = null) {
    //     if (!$plan)
    //         return $this->subscription($subscription);

    //     return $this->subscriptions->where('stripe_plan', $plan)->first();
    // }
    // public function subscribedByPlan($subscription = 'default', $plan = null) {
    //     $subscription = $this->subscriptionByPlan($subscription, $plan);
    //     if (is_null($subscription)) {
    //         return false;
    //     }

    //     if (is_null($plan)) {
    //         return $subscription->valid();
    //     }

    //     return $subscription->valid() &&
    //            $subscription->stripe_plan === $plan;
    // }
}
