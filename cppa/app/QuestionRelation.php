<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionRelation extends Model
{

    public $timestamps = true;

    protected $guarded = array();

    public function data()
    {
        return $this->belongsTo('App\Question','id');
    }

}
