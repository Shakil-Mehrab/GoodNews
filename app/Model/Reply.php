<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Comment;
use App\User;


class Reply extends Model
{
   public function comment(){
        return $this->belongsTo(Comment::class)->latest();
    }
     public function user(){
        return $this->belongsTo(User::class)->latest();
    }
}
