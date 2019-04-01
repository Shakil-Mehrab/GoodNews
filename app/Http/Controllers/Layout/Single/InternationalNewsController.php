<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;

class InternationalNewsController extends Controller
{
 public function getInternationalNews()
  {                   
  $international_news_top=News::orderBY('id','desc')->where('category_id',4)->limit(1)->get(); 
  $international_news=News::orderBY('id','desc')->where('category_id',4)->paginate(4); 
  return view('front.single.international.international',compact(['international_news_top','international_news']));
  }
}
