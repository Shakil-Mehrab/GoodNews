<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;


class BandMusicNewsController extends Controller
{
   
    public function geBandmusictNews()
    {                   

      $music_news_top=News::orderBY('id','desc')->where('category_id',14)->limit(1)->get(); 
      $music_news=News::orderBY('id','desc')->where('category_id',14)->paginate(4);
      
      return view('front.single.recreation.music',compact(['music_news_top','music_news']));
    }
}
