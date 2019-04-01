<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;

class PoliticsNewsController extends Controller
{
     public function getPoliticsNews()
    {                   
      $politics_news_top=News::orderBY('id','desc')->where('category_id',7)->limit(1)->get(); 
      $politics_news=News::orderBY('id','desc')->where('category_id',7)->paginate(4); 
      return view('front.single.politics.politics',compact(['politics_news_top','politics_news']));
    }
}
