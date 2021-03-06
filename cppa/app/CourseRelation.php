<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseRelation extends Model
{
    public $timestamps = true;
    protected $guarded = array();

    public function getPost()
    {
        return CoursePost::where('id',$this->post_id)->first();
    }
}
