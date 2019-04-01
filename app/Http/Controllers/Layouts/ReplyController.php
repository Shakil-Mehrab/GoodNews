<?php

namespace App\Http\Controllers\Layouts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplyRequest;
use Illuminate\Support\Facades\Auth;
use App\Notifications\RepliedToProduct;
use App\Model\News;
use App\Model\Comment;
use App\Model\Reply;
use App\Model\Category;

class ReplyController extends Controller
{
    public function postSaveReply(StoreReplyRequest $request,$comment_id)
    {  
        $comment=Comment::where('id',$comment_id)->first();
        $reply=new Reply();
        $reply->body=$request['body'];
        $reply->comment_id=$comment_id;
        $request->user()->replies()->save($reply);
        // $comment->user->notify(new RepliedToProduct($comment)); 
        return back()->withSuccess('Replies Created!');
    }
   
    public function getshowFrontComment($id)
    {
      // $comments=Comment::orderBy('id','desc')->limit(5)->get();        ;                       
        $new=News::find($id);
        $new->views=$new->views+1;
        $new->update();
        $commented_news=Comment::orderBY('id','desc')->where('news_id',$new->id)->limit(20)->get();

      return view('front.single.commented_news',compact(['commented_news','new']));
    }

    public function postUpdateComment(StoreCommentRequest $request,$id)
    {
        $this->validate($request,[
            "body"=>"required",
         ]);
        $comment=Comment::find($id);
        $comment->body=$request['body'];
        if(Auth::user()==$comment->user){
        $comment->update();
        return back()->withSuccess('Comment Updated!');
        }
        return back()->withError("You can't Update!");
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
  
}
