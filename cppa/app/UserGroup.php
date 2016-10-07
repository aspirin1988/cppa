<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $fillable = ['name','slug','description'=>'','access_level','access_edit'];
}
