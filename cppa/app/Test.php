<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public $timestamps = true;

    protected $guarded = array();

    public function questions()
    {
        return $this->hasMany('App\QuestionRelation');
    }
}
