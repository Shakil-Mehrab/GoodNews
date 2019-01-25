<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Category;
use App\News;
use App\Like;
use App\Comment;
use App\Subscriber;

use Session;
session_start();

class FrontController extends Controller
{
    public function welcome()
    {
        $comments=Comment::orderBy('id','desc')->limit(5)->get();        
        $recent_news=News::orderBy('id','desc')->limit(5)->get();
        $pop_news=News::orderBy('views','desc')->limit(5)->get();
        $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
        $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();                  

        $top_news=News::orderBY('id','desc')->where('category_id',6)->limit(1)->get();
        $national_news=News::orderBY('id','desc')->where('category_id',19)->limit(4)->get();
        $interenational_news=News::orderBY('id','desc')->where('category_id',18)->limit(4)->get();
        $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

        $latest_news=News::orderBY('id','desc')->where('category_id',20)->limit(2)->get(); 
        $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();        
        $sport_latest_news=News::orderBY('id','desc')->where('category_id',21)->limit(1)->get(); 
        $science_technology_news=News::orderBY('id','desc')->where('category_id',12)->limit(4)->get(); 
        $life_style_news=News::orderBY('id','desc')->where('category_id',9)->limit(6)->get();
        $healthfitness=News::orderBY('id','desc')->where('category_id',25)->limit(6)->get();   

        $education_news=News::orderBY('id','desc')->where('category_id',14)->limit(4)->get();  
        $art_literatures=News::orderBY('id','desc')->where('category_id',11)->limit(6)->get(); 
        $politics=News::orderBY('id','desc')->where('category_id',16)->limit(4)->get();  
        $district_news=News::orderBY('id','desc')->where('category_id',15)->limit(6)->get(); 
        $economics=News::orderBY('id','desc')->where('category_id',13)->limit(6)->get();  

        $recreation_news=News::orderBY('id','desc')->where('category_id',4)->limit(4)->get(); 
        $final_news=News::orderBY('id','desc')->where('category_id',22)->limit(4)->get(); 
       
        return view('welcome',compact(['comments','recent_news','pop_news','top_news','national_news','interenational_news','interenational_news_nav','latest_news','sport_news','sport_latest_news','science_technology_news','life_style_news','education_news','recreation_news','final_news','holidays','bussinesses','politics','art_literatures','district_news','economics','healthfitness']));
    }
    public function postSerchNews(Request $request)
    {
      $this->validate($request,[
        "tag"=>"required",             
     ]);
     $tag=$request['tag'];

        $comments=Comment::orderBy('id','desc')->limit(5)->get();        
        $recent_news=News::orderBy('id','desc')->where('heading','like','%'. $tag .'%')->limit(5)->get();
        $pop_news=News::orderBy('views','desc')->where('heading','like','%'.$tag.'%')->limit(5)->get();
        $holidays=News::orderBY('id','desc')->where('heading','like','%'.$tag.'%')->limit(4)->get();                  
        $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();                                       

        $top_news=News::orderBY('id','desc')->where('heading','like','%'.$tag.'%')->limit(1)->get();
        $latest_news=News::orderBY('id','desc')->where('heading','like','%'.$tag.'%')->limit(2)->get(); 
       
        $national_news=News::orderBY('id','desc')->where('category_id',19)->limit(4)->get();
        $interenational_news=News::orderBY('id','desc')->where('category_id',18)->limit(4)->get();
        $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

        $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();        
        $sport_latest_news=News::orderBY('id','desc')->where('category_id',21)->limit(1)->get(); 
        $science_technology_news=News::orderBY('id','desc')->where('category_id',12)->limit(4)->get(); 
        $life_style_news=News::orderBY('id','desc')->where('category_id',9)->limit(6)->get();
        $healthfitness=News::orderBY('id','desc')->where('category_id',25)->limit(6)->get();   

        $education_news=News::orderBY('id','desc')->where('category_id',14)->limit(4)->get();  
        $art_literatures=News::orderBY('id','desc')->where('category_id',11)->limit(6)->get(); 
        $politics=News::orderBY('id','desc')->where('category_id',16)->limit(4)->get();  
        $district_news=News::orderBY('id','desc')->where('category_id',15)->limit(6)->get(); 
        $economics=News::orderBY('id','desc')->where('category_id',13)->limit(6)->get();  

        $recreation_news=News::orderBY('id','desc')->where('category_id',4)->limit(4)->get(); 
        $final_news=News::orderBY('id','desc')->where('category_id',22)->limit(4)->get(); 
     
       
        return view('welcome',compact(['comments','recent_news','pop_news','top_news','national_news','interenational_news','interenational_news_nav','latest_news','sport_news','sport_latest_news','science_technology_news','life_style_news','education_news','recreation_news','final_news','holidays','bussinesses','politics','art_literatures','district_news','economics','healthfitness']));
    }
    //single
    public function getSingleNews($id)
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();                  
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();        
   
        $new=News::find($id);
        $new->views=$new->views+1;
        $new->update();
        $news=News::orderBY('id','desc')->where('category_id',$new->category_id)->where('id','!=',$new->id)->limit(4)->get();
      return view('front.single..single_news',compact(['comments','recent_news','pop_news','holidays','bussinesses','new','news','interenational_news_nav','sport_news','healthfitness']));
    }
    //imndex
    public function getToplNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();     

      $top_new_top_id=Session::get('top_new_top_id');
      $top_new_mid_id=Session::get('top_new_mid_id');
      $top_news_top=News::orderBY('id','desc')->where('category_id',6)->limit(1)->get(); 
      $top_news_mid=News::orderBY('id','desc')->where('category_id',6)->where('id','!=',$top_new_top_id)->limit(4)->get();  
      $topl_news=News::orderBY('id','desc')->where('category_id',6)->where('id','<',$top_new_mid_id)->get();  

      return view('front.single.top.top_news',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','topl_news','top_news_mid','top_news_top']));
    }
    public function getLatestNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();     

      $latest_new_top_id=Session::get('latest_new_top_id');
      $latest_new_mid_id=Session::get('latest_new_mid_id');
      $latest_news_top=News::orderBY('id','desc')->where('category_id',21)->limit(1)->get(); 
      $latest_news_mid=News::orderBY('id','desc')->where('category_id',21)->where('id','!=',$latest_new_top_id)->limit(4)->get();  
      $latest_news=News::orderBY('id','desc')->where('category_id',21)->where('id','<',$latest_new_mid_id)->get();  

      return view('front.single.top.latest_news',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','latest_news','latest_news_mid','latest_news_top']));
    }
   

    public function getNationalNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();     

      $national_new_top_id=Session::get('national_new_top_id');
      $national_new_mid_id=Session::get('national_new_mid_id');
      $national_news_top=News::orderBY('id','desc')->where('category_id',19)->limit(1)->get(); 
      $national_news_mid=News::orderBY('id','desc')->where('category_id',19)->where('id','!=',$national_new_top_id)->limit(4)->get();  
      $national_news=News::orderBY('id','desc')->where('category_id',19)->where('id','!> or =',$national_new_mid_id)->get();  

      return view('front.single.national.national',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news','national_news_mid','national_news_top']));
    }
   

    public function getInternationalNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();  
      $national_news=News::orderBY('id','desc')->where('category_id',19)->get();  
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

      $international_new_top_id=Session::get('international_new_top_id');
      $international_new_mid_id=Session::get('international_new_mid_id');
      $international_news_top=News::orderBY('id','desc')->where('category_id',18)->limit(1)->get(); 
      $international_news_mid=News::orderBY('id','desc')->where('category_id',18)->where('id','!=',$international_new_top_id)->limit(4)->get(); 
      $international_news=News::orderBY('id','desc')->where('category_id',18)->where('id','!> or =',$international_new_mid_id)->get();  

      
      return view('front.single.international.international',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news','international_news_mid','international_news_top','international_news']));
    }
    public function getPoliticsNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();  
      $national_news=News::orderBY('id','desc')->where('category_id',19)->get();  
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

      $politics_new_top_id=Session::get('politics_new_top_id');
      $politics_new_mid_id=Session::get('politics_new_mid_id');
      $politics_news_top=News::orderBY('id','desc')->where('category_id',16)->limit(1)->get(); 
      $politics_news_mid=News::orderBY('id','desc')->where('category_id',16)->where('id','!=',$politics_new_top_id)->limit(4)->get(); 
      $politics_news=News::orderBY('id','desc')->where('category_id',16)->where('id','!> or =',$politics_new_mid_id)->get();  

      
      return view('front.single.politics.politics',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news','politics_news_mid','politics_news_top','politics_news']));
    }
    public function getSportsNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();  
      $national_news=News::orderBY('id','desc')->where('category_id',19)->get();  
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

      $sports_new_top_id=Session::get('sports_new_top_id');
      $sports_new_mid_id=Session::get('sports_new_mid_id');
      $sports_news_top=News::orderBY('id','desc')->where('category_id',17)->limit(1)->get(); 
      $sports_news_mid=News::orderBY('id','desc')->where('category_id',17)->where('id','!=',$sports_new_top_id)->limit(4)->get(); 
      $sports_news=News::orderBY('id','desc')->where('category_id',17)->where('id','!> or =',$sports_new_mid_id)->get();  

      
      return view('front.single.sports.sports',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news','sports_news_mid','sports_news_top','sports_news']));
    }
    public function getScienceNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();  
      $national_news=News::orderBY('id','desc')->where('category_id',19)->get();  
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

      $science_new_top_id=Session::get('science_new_top_id');
      $science_new_mid_id=Session::get('science_new_mid_id');
      $science_news_top=News::orderBY('id','desc')->where('category_id',12)->limit(1)->get(); 
      $science_news_mid=News::orderBY('id','desc')->where('category_id',12)->where('id','!=',$science_new_top_id)->limit(4)->get(); 
      $science_news=News::orderBY('id','desc')->where('category_id',12)->where('id','!> or =',$science_new_mid_id)->get();  

      
      return view('front.single.science.science',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news','science_news_mid','science_news_top','science_news']));
    }
    public function getDistrictNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();  
      $national_news=News::orderBY('id','desc')->where('category_id',19)->get();  
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

      $district_new_top_id=Session::get('district_new_top_id');
      $district_new_mid_id=Session::get('district_new_mid_id');
      $district_news_top=News::orderBY('id','desc')->where('category_id',15)->limit(1)->get(); 
      $district_news_mid=News::orderBY('id','desc')->where('category_id',15)->where('id','!=',$district_new_top_id)->limit(4)->get(); 
      $district_news=News::orderBY('id','desc')->where('category_id',15)->where('id','!> or =',$district_new_mid_id)->get();  

      
      return view('front.single.politics.district',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news','district_news_mid','district_news_top','district_news']));
    }
    public function getEducationNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();  
      $national_news=News::orderBY('id','desc')->where('category_id',19)->get();  
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

      $education_new_top_id=Session::get('education_new_top_id');
      $education_new_mid_id=Session::get('education_new_mid_id');
      $education_news_top=News::orderBY('id','desc')->where('category_id',14)->limit(1)->get(); 
      $education_news_mid=News::orderBY('id','desc')->where('category_id',14)->where('id','!=',$education_new_top_id)->limit(4)->get(); 
      $education_news=News::orderBY('id','desc')->where('category_id',14)->where('id','!> or =',$education_new_mid_id)->get();  

      
      return view('front.single.education.education',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news','education_news_mid','education_news_top','education_news']));
    }
    public function getCampusNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();  
      $national_news=News::orderBY('id','desc')->where('category_id',19)->get();  
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

      $campus_new_top_id=Session::get('campus_new_top_id');
      $campus_new_mid_id=Session::get('campus_new_mid_id');
      $campus_news_top=News::orderBY('id','desc')->where('category_id',7)->limit(1)->get(); 
      $campus_news_mid=News::orderBY('id','desc')->where('category_id',7)->where('id','!=',$campus_new_top_id)->limit(4)->get(); 
      $campus_news=News::orderBY('id','desc')->where('category_id',7)->where('id','!> or =',$campus_new_mid_id)->get();  

      
      return view('front.single.education.campus',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news','campus_news_mid','campus_news_top','campus_news']));
    } 
    public function getEconomicsNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();  
      $national_news=News::orderBY('id','desc')->where('category_id',19)->get();  
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

      $economics_new_top_id=Session::get('economics_new_top_id');
      $economics_new_mid_id=Session::get('economics_new_mid_id');
      $economics_news_top=News::orderBY('id','desc')->where('category_id',13)->limit(1)->get(); 
      $educa_news_mid=News::orderBY('id','desc')->where('category_id',13)->where('id','!=',$economics_new_top_id)->limit(4)->get(); 
      $education_news=News::orderBY('id','desc')->where('category_id',13)->where('id','!> or =',$economics_new_mid_id)->get();  

      
      return view('front.single.education.economics',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news','educa_news_mid','economics_news_top','education_news']));
    }
    public function getLiteratureNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();  
      $national_news=News::orderBY('id','desc')->where('category_id',19)->get();  
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

      $literature_new_top_id=Session::get('literature_new_top_id');
      $literature_new_mid_id=Session::get('literature_new_mid_id');
      $literature_news_top=News::orderBY('id','desc')->where('category_id',11)->limit(1)->get(); 
      $literature_news_mid=News::orderBY('id','desc')->where('category_id',11)->where('id','!=',$literature_new_top_id)->limit(4)->get(); 
      $literature_news=News::orderBY('id','desc')->where('category_id',11)->where('id','!> or =',$literature_new_mid_id)->get();  

      
      return view('front.single.education.literature',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news','literature_news_mid','literature_news_top','literature_news']));
    }
    
    public function getRecreationNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();  
      $national_news=News::orderBY('id','desc')->where('category_id',19)->get();  
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

      $recreation_new_top_id=Session::get('recreation_new_top_id');
      $recreation_new_mid_id=Session::get('recreation_new_mid_id');
      $recreation_news_top=News::orderBY('id','desc')->where('category_id',4)->limit(1)->get(); 
      $recreation_news_mid=News::orderBY('id','desc')->where('category_id',4)->where('id','!=',$recreation_new_top_id)->limit(4)->get(); 
      $recreation_news=News::orderBY('id','desc')->where('category_id',4)->where('id','!> or =',$recreation_new_mid_id)->get();  

      
      return view('front.single.recreation.recreation',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news','recreation_news_mid','recreation_news_top','recreation_news']));
    }
    public function geBandmusictNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();  
      $national_news=News::orderBY('id','desc')->where('category_id',19)->get();  
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

      $music_new_top_id=Session::get('music_new_top_id');
      $music_new_mid_id=Session::get('music_new_mid_id');
      $music_news_top=News::orderBY('id','desc')->where('category_id',8)->limit(1)->get(); 
      $music_news_mid=News::orderBY('id','desc')->where('category_id',8)->where('id','!=',$music_new_top_id)->limit(4)->get(); 
      $music_news=News::orderBY('id','desc')->where('category_id',8)->where('id','!> or =',$music_new_mid_id)->get();  

      
      return view('front.single.recreation.music',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news','music_news_mid','music_news_top','music_news']));
    }
    public function getHealthfitnesNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();  
      $national_news=News::orderBY('id','desc')->where('category_id',19)->get();  
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

      $fitness_new_top_id=Session::get('fitness_new_top_id');
      $fitness_new_mid_id=Session::get('fitness_new_mid_id');
      $fitness_news_top=News::orderBY('id','desc')->where('category_id',25)->limit(1)->get(); 
      $fitness_news_mid=News::orderBY('id','desc')->where('category_id',25)->where('id','!=',$fitness_new_top_id)->limit(4)->get(); 
      $fitness_news=News::orderBY('id','desc')->where('category_id',25)->where('id','!> or =',$fitness_new_mid_id)->get();  

      
      return view('front.single.recreation.fitness',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news','fitness_news_mid','fitness_news_top','fitness_news']));
    }
    public function getLifestyleNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();  
      $national_news=News::orderBY('id','desc')->where('category_id',19)->get();  
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

      $life_style_new_top_id=Session::get('life_style_new_top_id');
      $life_style_new_mid_id=Session::get('life_style_new_mid_id');
      $life_style_news_top=News::orderBY('id','desc')->where('category_id',9)->limit(1)->get(); 
      $life_style_news_mid=News::orderBY('id','desc')->where('category_id',9)->where('id','!=',$life_style_new_top_id)->limit(4)->get(); 
      $life_style_news=News::orderBY('id','desc')->where('category_id',9)->where('id','!> or =',$life_style_new_mid_id)->get();  

      
      return view('front.single.recreation.life_style',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news','life_style_news_mid','life_style_news_top','life_style_news']));
    }
    public function getFinalNews()
    { 
      $comments=Comment::orderBy('id','desc')->limit(5)->get();        
      $recent_news=News::orderBy('id','desc')->limit(5)->get();
      $pop_news=News::orderBy('views','desc')->limit(5)->get();
      $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
      $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();   
      $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();  
      $national_news=News::orderBY('id','desc')->where('category_id',19)->get();  
      $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();

      $final_new_top_id=Session::get('final_new_top_id');
      $final_new_mid_id=Session::get('final_new_mid_id');
      $final_news_top=News::orderBY('id','desc')->where('category_id',22)->limit(1)->get(); 
      $final_news_mid=News::orderBY('id','desc')->where('category_id',22)->where('id','!=',$final_new_top_id)->limit(4)->get(); 
      $final_news=News::orderBY('id','desc')->where('category_id',22)->where('id','!> or =',$final_new_mid_id)->get();  

      
      return view('front.single.final.final',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news','final_news_mid','final_news_top','final_news']));
    }
    public function postSaveSubscriber(Request $request)
    {  
        $this->validate($request,[
            "email"=>"required",
         ]);
        
        $subscriber=new Subscriber();
        $subscriber->email=$request['email'];
        if($subscriber->save()){
            return back()->withMessage('Thank you');
        }
        
        return back()->withMessage('Sorry.Try again');
    }
   
}
