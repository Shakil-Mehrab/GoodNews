<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;


class TopNewsController extends Controller
{
    public function getToplNews()
    {                   

      $top_news_top=News::orderBY('id','desc')->where('category_id',1)->limit(1)->get(); 
      $top_news=News::orderBY('id','desc')->where('category_id',1)->paginate(4);  
      return view('front.single.top.top_news',compact(['top_news','top_news_top']));
    }
}
