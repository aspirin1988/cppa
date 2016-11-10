<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    public $timestamps = true;

    protected $guarded = array();

    public function getCourse()
    {
        return Course::where('id',$this->course_id)->get();
    }
}
