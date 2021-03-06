<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    
    protected $fillable = [
        'click_product_id',
        'click_auth_user_id',
        'click_product_user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // public function customer()
    // {
    //     return $this->belongsTo('App\Customer');
    // }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function percentageoff()
    {
        $newpercentage =   $this->currentprice - $this->newprice;

        $final = $newpercentage/ $this->currentprice * 100;


        return sprintf("%.0f%%", $final);
    }
}
