<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{

    protected $fillable =  [ 'image', 'companyname', 'primarytext', 'secondarytext', 'category_id', 'adtype_id', 'gender_id'];

    public function Adtype()
    {
        return $this->belongsTo('App\Adtype');
    }

    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
