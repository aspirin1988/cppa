<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $timestamps = true;

    protected $fillable = ['title','slug','date_end'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
