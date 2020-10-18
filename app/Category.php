<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categoriess';
    protected $fillable= ['categoryname'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ads()
    {
        return $this->hasMany('App\Ad');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getCategorynameAttribute($value)
    {
        return ucfirst($value);
    }
}
