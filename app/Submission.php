<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['title', 'description', 'current', 'new','user_id',
          'submissionprice', 'image', ];



    public function percentageoff()
    {
        $newpercentage =   $this->current - $this->new;

        $final = $newpercentage/ $this->current * 100;


        return sprintf("%.0f%%", $final);
    }
}
