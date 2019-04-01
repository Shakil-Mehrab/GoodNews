<?php

namespace App\Http\Controllers\Layout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Jobs\UserViwedNews;
use App\Model\Category;
use App\Model\News;
use App\Model\Like;
use App\Model\Comment;
use App\Model\Subscriber;
use Session;
session_start();

class FrontController extends Controller
{
    public function welcome()
    {                  
        $top_news=News::orderBY('id','desc')->latestTop();
        $latest_news=News::orderBY('id','desc')->latestLatest(); 
        $national_news=News::orderBY('id','desc')->latestNational();
        $interenational_news=News::orderBY('id','desc')->latestInternational();
        $science_technology_news=News::orderBY('id','desc')->latestTechnology(); 
        $sport_news=News::orderBY('id','desc')->latestSport();        
        $sport_latest_news=News::orderBY('id','desc')->latestLatestSport(); 
        $politics=News::orderBY('id','desc')->latestPolitics();  
        $education_news=News::orderBY('id','desc')->latestEducation();  
        $recreation_news=News::orderBY('id','desc')->latestRecreation(); 
        $final_news=News::orderBY('id','desc')->latestFinal(); 
       
        return view('welcome',compact(['top_news','national_news','interenational_news','latest_news','sport_news','sport_latest_news','science_technology_news','education_news','recreation_news','final_news','politics',]));
    }
    //single
    public function getSingleNews(Request $request,$id)
    {       

        $new=News::find($id);
         if($request->user()){
           dispatch(new UserViwedNews($request->user(),$new));  
        }
        $news=News::orderBY('id','desc')->limit(4)->get();
      return view('front.single.single_news',compact(['news','new']));
    }
    //imndex 
       
}
