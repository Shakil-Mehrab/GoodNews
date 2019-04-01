<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;


class FinalNewsController extends Controller
{
     public function getFinalNews()
    {                   

      $final_news_top=News::orderBY('id','desc')->where('category_id',17)->limit(1)->get(); 
      $final_news=News::orderBY('id','desc')->where('category_id',17)->paginate(4);
      
      return view('front.single.final.final',compact(['final_news_top','final_news']));
    }
}
