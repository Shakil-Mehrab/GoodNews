<?php

namespace App\Http\Controllers\Layouts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\RepliedToProduct;
use App\Jobs\UserViwedNews;
use App\Model\News;
use App\Model\Comment;
use App\Model\Reply;
use App\Model\Category;
use App\Http\Requests\StoreCommentRequest;


class ActionController extends Controller
{
    public function postSaveComment(StoreCommentRequest $request,$news_id)
    {  
        $news=News::where('id',$news_id)->first();
        $comment=new Comment();
        $comment->body=$request['body'];
        $comment->news_id=$news_id;
        $request->user()->comments()->save($comment);
        $news->user->notify(new RepliedToProduct($news)); 
        return back()->withSuccess('Comment Create!');
    }
   
    public function getshowFrontComment(Request $request,$id)
    {
      
        $new=News::find($id);
         if($request->user()){
           dispatch(new UserViwedNews($request->user(),$new));  
        }
        $news=News::orderBY('id','desc')->limit(4)->get();
      return view('front.single.comment.commented-news',compact(['news','new']));
    }

   

    public function getComments()
    {
        $comments=Comment::orderBy('id','desc')->get();
        return view('admin.news.all-comment',compact('comments'));
    }
    public function getCommentDelete($id)
    {
        $comment=Comment::find($id);
        if(Auth::user()->author=='admin'){
        $comment->delete();
        return back()->withSuccess('Comment Deleted!');
        }
        return back()->withError("You can't Delete");
    }
    public function getEditComment($id)
    {
        $categories=Category::all();
        $comment=Comment::find($id);
        return view('admin.news.action.comment_edit',compact(['comment','categories']));
    }

 public function postUpdateComment(StoreCommentRequest $request,$id)
    {
      
        $comment=Comment::find($id);
        $comment->body=$request['body'];
        if(Auth::user()==$comment->user){
        $comment->update();
        return back()->withSuccess('Comment Updated!');
        }
        return back()->withError("You can't Update!");
    }

    //

    
}
