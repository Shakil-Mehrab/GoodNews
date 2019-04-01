<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;

class DistrictNewsController extends Controller
{
     public function getDistrictNews()
    {                   
      $district_news_top=News::orderBY('id','desc')->where('category_id',10)->limit(1)->get(); 
      $district_news=News::orderBY('id','desc')->where('category_id',10)->paginate(4); 
      
      return view('front.single.politics.district',compact(['district_news_top','district_news']));
    }
}
