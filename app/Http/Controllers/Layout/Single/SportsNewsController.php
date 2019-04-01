<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;


class SportsNewsController extends Controller
{
      public function getSportsNews()
    {                   
      $sports_news_top=News::orderBY('id','desc')->where('category_id',6)->limit(1)->get(); 
      $sports_news=News::orderBY('id','desc')->where('category_id',6)->paginate(4);  
      return view('front.single.sports.sports',compact(['sports_news_top','sports_news']));
    }
}
