<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'body'];

    #　1対多の関係(postとcomments )
    public function comments() {
      return $this->hasMany('App\Comment');
    }
}
