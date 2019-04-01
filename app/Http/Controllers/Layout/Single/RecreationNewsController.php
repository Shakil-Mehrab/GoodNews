<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;


class RecreationNewsController extends Controller
{
    public function getRecreationNews()
    {                   

      $recreation_news_top=News::orderBY('id','desc')->where('category_id',13)->limit(1)->get(); 
      $recreation_news=News::orderBY('id','desc')->where('category_id',13)->paginate(4);

      
      return view('front.single.recreation.recreation',compact(['recreation_news_top','recreation_news']));
    }
}
