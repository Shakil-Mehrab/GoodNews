<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;


class LiteratureNewsController extends Controller
{
     public function getLiteratureNews()
    {                   

      $literature_news_top=News::orderBY('id','desc')->where('category_id',12)->limit(1)->get(); 
      $literature_news=News::orderBY('id','desc')->where('category_id',12)->paginate(4);
      
      return view('front.single.education.literature',compact(['literature_news_top','literature_news']));
    }
}
