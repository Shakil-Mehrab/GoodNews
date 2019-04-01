<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name'];
    public function user()
	{	
	 return $this->belongsTo(User::class);
	}

	public function news()
	{	
	 return $this->hasMany(News::class)->latest();
	}
	public function limit_news()
	{	
	 return $this->hasMany(News::class)->limit(4)->latest();
	}
}
