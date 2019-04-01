<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\News;

class User_news_views extends Model
{
    public function news(){
		return $this->belongsTo(News::class);
	}
}
