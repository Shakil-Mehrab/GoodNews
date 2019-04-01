<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;


class ScienceNewsController extends Controller
{
    public function getScienceNews()
    {                   
      $science_news_top=News::orderBY('id','desc')->where('category_id',5)->limit(1)->get(); 
      $science_news=News::orderBY('id','desc')->where('category_id',5)->paginate(4); 

      return view('front.single.science.science',compact(['science_news_top','science_news']));
    }
}
