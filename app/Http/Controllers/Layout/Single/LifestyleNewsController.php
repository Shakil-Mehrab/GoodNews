<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;


class LifestyleNewsController extends Controller
{
    public function getLifestyleNews()
    { 
                  

      $life_style_news_top=News::orderBY('id','desc')->where('category_id',16)->limit(1)->get(); 
      $life_style_news=News::orderBY('id','desc')->where('category_id',16)->paginate(4); 

      
      return view('front.single.recreation.life_style',compact(['life_style_news_top','life_style_news']));
    }
}
