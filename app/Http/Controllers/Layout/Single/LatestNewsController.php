<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;


class LatestNewsController extends Controller
{
     public function getLatestNews()
    {                   
      $latest_news_top=News::orderBY('id','desc')->where('category_id',2)->limit(1)->get(); 
      $latest_news=News::orderBY('id','desc')->where('category_id',2)->paginate(4); 

      return view('front.single.top.latest_news',compact(['latest_news','latest_news_top']));
    }
}
