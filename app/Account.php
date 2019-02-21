<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    
    protected $fillable = [ 'accountinfo', 'websitelink', 'user_id' ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
