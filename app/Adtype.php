<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adtype extends Model
{

    public $table = "adtypes";

    protected $fillable = ['name'];

    public function Adtypes()
    {
       return $this->hasMany('App\Ad');
    }
}
