<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursePost extends Model
{
    public $timestamps = true;
    protected $guarded = array();

    public function getImageGallery()
    {
        return ImageGallery::where('parent_id',$this->id)->where('parent_type','course_post')->get();

    }
}
