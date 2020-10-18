<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $guarded = [];

    public function Ads()
    {
        return $this->hasMany('App\Ad');
    }
}
