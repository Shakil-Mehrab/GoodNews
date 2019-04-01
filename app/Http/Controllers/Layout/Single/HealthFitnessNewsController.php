<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;


class HealthFitnessNewsController extends Controller
{
    
    public function getHealthfitnesNews()
    { 
                  

      $fitness_news_top=News::orderBY('id','desc')->where('category_id',15)->limit(1)->get(); 
      $fitness_news=News::orderBY('id','desc')->where('category_id',15)->paginate(4);
      
      return view('front.single.recreation.fitness',compact(['fitness_news_top','fitness_news']));
    }
}
