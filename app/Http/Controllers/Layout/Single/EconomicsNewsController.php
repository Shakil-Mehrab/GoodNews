<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;


class EconomicsNewsController extends Controller
{
    public function getEconomicsNews()
    {                   
      $economics_news_top=News::orderBY('id','desc')->where('category_id',11)->limit(1)->get(); 
      $economics_news=News::orderBY('id','desc')->where('category_id',11)->paginate(4);

      
      return view('front.single.education.economics',compact(['economics_news_top','economics_news']));
    }
}
