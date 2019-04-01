<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;

class NationalNewsController extends Controller
{
     public function getNationalNews()
    {     
      $national_news_top=News::orderBY('id','desc')->where('category_id',3)->limit(1)->get(); 
      $national_news=News::orderBY('id','desc')->where('category_id',3)->paginate(4);  
      return view('front.single.national.national',compact(['national_news','national_news_top']));
    }
}
