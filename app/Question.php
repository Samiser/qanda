<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question'];

    // get the answers for this question
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
