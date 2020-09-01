<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    // public function test() {
    //     return $this->hasOne('App\Test');
    // }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
