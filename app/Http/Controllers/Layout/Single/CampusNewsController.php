<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;


class CampusNewsController extends Controller
{
     public function getCampusNews()
    {                   

      $campus_news_top=News::orderBY('id','desc')->where('category_id',7)->limit(1)->get(); 
      $campus_news=News::orderBY('id','desc')->where('category_id',7)->paginate(4);
      return view('front.single.education.campus',compact(['campus_news_top','campus_news']));
    } 
}
