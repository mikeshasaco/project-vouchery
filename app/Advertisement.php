<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = [
        'adname', 'adprice', 'prod_id'
    ];

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
