<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\Comment;
use App\Reply;
use App\Category;
use App\Notifications\RepliedToProduct;



class ActionController extends Controller
{
    public function postSaveComment(Request $request,$comment_id)
    {  
        $this->validate($request,[
            "body"=>"required",
         ]);
        $news=News::where('id',$comment_id)->first();
        $comment=new Comment();
        $comment->body=$request['body'];
        $comment->news_id=$comment_id;
        $request->user()->comments()->save($comment);
        $news->user->notify(new RepliedToProduct($news)); 
        return back()->withMessage('Comment Create!');
    }
   
    public function getshowFrontComment($id)
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
        $commented_news=Comment::orderBY('id','desc')->where('news_id',$new->id)->limit(20)->get();

      return view('front.single.commented_news',compact(['comments','recent_news','pop_news','holidays','bussinesses','new','commented_news','interenational_news_nav','sport_news','healthfitness']));
    }



    public function getComments()
    {
        $comments=Comment::orderBy('id','desc')->get();
        return view('super-admin.news.all-comment',compact('comments'));
    }
    public function getCommentDelete($id)
    {
        $comment=Comment::find($id);
        if(Auth::guard('admin')){
        $comment->delete();
        return back()->withMessage('Comment Deleted!');
        }
        return back()->withMessage("You can't Delete");
    }
    public function getEditComment($id)
    {
        $categories=Category::all();
        $comment=Comment::find($id);
        return view('super-admin.news.action.comment_edit',compact(['comment','categories']));
    }
    public function postUpdateComment(Request $request,$id)
    {
        $this->validate($request,[
            "body"=>"required",
         ]);
        $comment=Comment::find($id);
        $comment->body=$request['body'];
        if(Auth::user()==$comment->user){
        $comment->update();
        return back()->withMessage('Comment Updated!');
        }
        return back()->withMessage("You can't Update!");
    }
}
