<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [ 'accountinfo', 'user_id', 'websitelink' ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
