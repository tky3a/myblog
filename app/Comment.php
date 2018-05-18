<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //protected $fillable: データの挿入ができる様に設定
  protected $fillable = ['body'];

  // 1対多の関係(postとcomments )
  public function post() {
    return $this->belongsTo('App\Post');
  }
}
