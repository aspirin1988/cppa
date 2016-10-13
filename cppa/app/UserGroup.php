<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    public $timestamps = true;

    protected $fillable = ['name','slug','description','access_level','access_edit'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
