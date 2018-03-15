<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Eloquentによるnameカラムへの代入を許可
    protected $fillable= array('name');

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
