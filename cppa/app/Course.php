<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = true;
    protected $guarded = array();

    public function getPosts()
    {
        return CourseRelation::where('course_id',$this->id)->orderBy('order')->get();
    }
}
