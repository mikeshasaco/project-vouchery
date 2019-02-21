<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['weblink', 'image', ];

    public function getImageAttribute($value){
        return Storage::url($value);
    }

}
