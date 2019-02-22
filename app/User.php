<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Illuminate\Support\Facades\Storage;
// merchant is user
class User extends Authenticatable
{
    use Notifiable;
    use CanBeFollowed;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company', 'slug',
        'avatar', 'affiliate_id', 'referred_by',
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

}
