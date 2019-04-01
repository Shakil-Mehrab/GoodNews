<?php

namespace App\Http\Controllers\Layouts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewPostNotify;
use App\Http\Requests\StoreNewsRequest;
use App\Model\Category;
use App\Model\News;
use App\Model\Comment;
use App\Model\Subscriber;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=News::orderBy('id','desc')->get();
        return view('admin.news.news',compact('news'));
    }
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $categories=Category::all();
        return view('admin.news.create',compact('categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "heading"=>"required|max:100",           
            "description"=>"required|min:3",
            "category_id"=>"required|integer",   
            "media"=>"required",           
                     
         ]);
         $subscribers= Subscriber::all();
       
         $product=new News();
         $product->heading=$request['heading'];        
         $product->description=$request['description'];
         $product->category_id=$request['category_id']; 
         $product->media=$request['media'];                                     
         
         $image=$request->file("image");
         if($image){
            $image_full_name=$image->getClientOriginalName();
             $upload_path="images/";
             $image_url=$upload_path.$image_full_name;
             $success=$image->move($upload_path,$image_full_name);
            if($success){
              $product->image=$image_url;
              $request->user()->news()->save($product);
            }
        }
        $request->user()->news()->save($product);

        foreach($subscribers as $subscriber){
            Notification::route('mail', $subscriber->email)->notify(new  NewPostNotify($product));

        }
        return redirect()->route('news.index')->withMessage("Product Created !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $new=News::find($id);
        return view('admin.news.show',compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new=News::find($id);
        if(Auth::user()==$new->user or  Auth::user()->author=='admin'){
        return view('admin.news.edit',compact('new'));
       }
        return redirect()->back()->withError("You can't edit !");
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
   public function postUpdateProduct(StoreNewsRequest $request, $id)
    { 
         $product=News::find($id);
         $product->heading=$request['heading'];        
         $product->description=$request['description'];
         $product->category_id=$request['category_id'];  
         $product->media=$request['media'];                                     
         $image=$request->file("image"); 
         if($image){
            $image_full_name=$image->getClientOriginalName();
             $upload_path="images/";
             $image_url=$upload_path.$image_full_name;
             $success=$image->move($upload_path,$image_full_name);
            if($success){
              $product->image=$image_url;
              $product->update();
            }
        }
         if(Auth::user()==$product->user or  Auth::user()->author=='admin'){          
            $product->update();
            $products=News::all();
            return redirect()->back()->withSuccess("News Udated !");
        }
            return redirect()->back()->withError("You can't edit !");
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDeleteProduct($id)
    {
        $product=News::find($id);
        if(Auth::user()==$product->user or  Auth::user()->author=='admin'){
        $product->delete();
        return back()->withSuccess("News Deleted !");
    }
    return redirect()->back()->withError("You can't Delete !");
  }
  public function getNews()
  { 
    $comments=Comment::orderBy('id','desc')->limit(5)->get();        
    $recent_news=News::orderBy('id','desc')->limit(5)->get();
    $pop_news=News::orderBy('views','desc')->limit(5)->get();
    $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
    $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();                  
    $national_news=News::orderBY('id','desc')->where('category_id',19)->limit(4)->get();  
    $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();
    $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();        

      
      return view('front.single.national.national',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news']));
  }
  public function getSingleNews()
  { 
    $comments=Comment::orderBy('id','desc')->limit(5)->get();        
    $recent_news=News::orderBy('id','desc')->limit(5)->get();
    $pop_news=News::orderBy('views','desc')->limit(5)->get();
    $holidays=News::orderBY('id','desc')->where('category_id',23)->limit(4)->get();                  
    $bussinesses=News::orderBY('id','desc')->where('category_id',24)->limit(4)->get();                  
    $national_news=News::orderBY('id','desc')->where('category_id',19)->limit(4)->get();  
    $interenational_news_nav=News::orderBY('id','desc')->where('category_id',18)->limit(6)->get();
    $sport_news=News::orderBY('id','desc')->where('category_id',17)->limit(5)->get();        

      
      return view('front.single.international.sgl_international',compact(['comments','recent_news','pop_news','holidays','bussinesses','national_news','interenational_news_nav','sport_news']));
  }
}

