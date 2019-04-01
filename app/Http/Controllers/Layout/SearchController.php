<?php

namespace App\Http\Controllers\Layout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchNewsRequest;
use App\Jobs\UserViwedNews;
use App\Model\Category;
use App\Model\News;
use App\Model\Comment;
use App\Model\Subscriber;


class SearchController extends Controller
{
     public function postSerchNews(SearchNewsRequest $request)
    {
     $tag=$request['tag'];
        $recent_news=News::orderBy('id','desc')->where('heading','like','%'. $tag .'%')->limit(5)->get();
        $pop_news=News::orderBy('id','desc')->where('heading','like','%'.$tag.'%')->limit(5)->get();
        $holidays=News::orderBY('id','desc')->where('heading','like','%'.$tag.'%')->limit(4)->get();                  
        $top_news=News::orderBY('id','desc')->where('heading','like','%'.$tag.'%')->limit(1)->get();
        $latest_news=News::orderBY('id','desc')->where('heading','like','%'.$tag.'%')->limit(2)->get(); 
       
        $national_news=News::orderBY('id','desc')->latestNational();
        $interenational_news=News::orderBY('id','desc')->latestInternational();
        $science_technology_news=News::orderBY('id','desc')->latestTechnology(); 
        $sport_news=News::orderBY('id','desc')->latestSport();        
        $sport_latest_news=News::orderBY('id','desc')->latestLatestSport();
        $politics=News::orderBY('id','desc')->latestPolitics();  
        $education_news=News::orderBY('id','desc')->latestEducation();  
        $recreation_news=News::orderBY('id','desc')->latestRecreation(); 
        $final_news=News::orderBY('id','desc')->latestFinal(); 
       
        return view('welcome',compact(['recent_news','pop_news','holidays','top_news','latest_news','national_news','interenational_news','science_technology_news','sport_news','sport_latest_news','politics','education_news','recreation_news','final_news']));
    }
}
