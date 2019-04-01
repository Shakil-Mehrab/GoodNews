<?php

namespace App\Model;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Eloquent\OrderableTrait;
use App\User;

class News extends Model
{
	use Searchable,OrderableTrait;
	public function searchableAs()
    {
        return 'news';
    }
     public function admin(){
        return $this->belongsTo('App\Admin');
    }
    public function user(){
		return $this->belongsTo('App\User');
	}
	public function category(){
		return $this->belongsTo(Category::class);
	}
	
	public function comments(){
        return $this->hasMany(Comment::class)->latest()->limit(4);
    }
    public function allcomments(){
        return $this->hasMany(Comment::class)->latest();
    }
     public function toSearchableArray()
    {
        $listins = $this->toArray();
        $listins['created_at_human']=$this->created_at->diffForHumans();
        $listins['user']=$this->user;
        $listins['category']=$this->category;
        $listins['news']=$this->news;
        return $listins;
    }
    public function viewedUsers(){
       return $this->belongsToMany(User::class ,'user_news_views')->withTimestamps()->withPivot(['count']);
    } 
    public function views(){
       return $this->viewedUsers()->sum('count');
       
    }
}
