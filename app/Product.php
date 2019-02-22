<?php

namespace App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */

    protected $fillable = ['title', 'desc', 'currentprice', 'couponcode','user_id',
          'newprice', 'image', 'url', 'advertboolean', 'expired_date' ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function percentageoff()
    {
        $newpercentage =   $this->currentprice - $this->newprice;

        $final = $newpercentage/ $this->currentprice * 100;


        return sprintf("%.0f%%", $final);
    }

    public function clicks()
    {
        return $this->hasMany('App\Click');
    }

    public function advertisements()
    {
        return $this->hasMany('App\Advertisement');
    }

    public function getImageAttribute($value){
        return Storage::disk($value);
    }
    
    public function getTitleAttribute($value){
        return ucfirst($value);
    }

 
  
    
}
