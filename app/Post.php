<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // ユーザは複数の投稿をもつ
    public function getUser()
    {
        return $this->belongsTo('App\User');
    }
}
