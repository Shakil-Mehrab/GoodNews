<?php

namespace App\Http\Controllers\Layouts;

use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsShareRequest;
use App\Model\News;
use App\Mail\NewsShared;

class NewsShareController extends Controller
{
    public function  index($news_id)
    {    
      $new=News::find($news_id);
      $news=News::orderBY('id','desc')->where('category_id',$new->category_id)->where('id','!=',$new->id)->limit(4)->get();
    	return view('front.news.share.index',compact(['new','news']));  
    }
    public function  store(StoreNewsShareRequest $request,$news_id)
	{    
    $listing=News::find($news_id);
		collect(array_filter($request->emails))->each(function($email) use ($listing,$request){
 		  Mail::to($email)->queue(
          new NewsShared($listing,$request->user(),$request->message)
          );  
		}); 
        return redirect()->back()->withSuccess("Listing shared succesfully");
    }
}
