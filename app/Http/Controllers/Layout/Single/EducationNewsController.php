<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;



class EducationNewsController extends Controller
{
     public function getEducationNews()
    {                   

      $education_news_top=News::orderBY('id','desc')->where('category_id',9)->limit(1)->get(); 
      $education_news=News::orderBY('id','desc')->where('category_id',9)->paginate(4); 
      return view('front.single.education.education',compact(['education_news_top','education_news']));
    }
}
