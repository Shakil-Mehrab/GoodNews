<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Like;
use App\Model\Comment;
use App\Model\Reply;
use App\Model\News;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function categories(){
		return $this->hasMany('App\Model\Category');
    }
    public function news()
	{	
	 return $this->hasMany('App\Model\News');
    }
    public function likes()
	{	
	 return $this->hasMany(Like::class);
    }
    public function comments()
	{	
	 return $this->hasMany(Comment::class);
    }
    public function replies()
	{	
	 return $this->hasMany(Reply::class);
	}
    public function viewedListings(){
       return $this->belongsToMany(News::class ,'user_news_views')->withTimestamps()->withPivot(['count','id']);
    } 
 
}



