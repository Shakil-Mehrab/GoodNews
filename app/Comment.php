<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // use CommentableTrait;
    public function limit_replies(){
        return $this->hasMany(Reply::class)->limit(2)->latest();
    }
    public function replies(){
        return $this->hasMany(Reply::class)->latest();
    }
    public function news(){
        return $this->belongsTo(News::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
