<div class="activity">
@if (Route::has('login'))
@auth

<span class="views">{{$commented_news->views}}</span><span class="comment" onclick="toggleCommnet('{{$commented_news->id}}')"><a>{{$commented_news->comments()->count()}}</a></span>
        <div class="comment-form-{{$commented_news->id}} hidden">
        <form  action="{{route('comment.store',$commented_news->id)}}" method="POST"  class="inline-it">
        {{csrf_field()}}  
        <div class="form-group">
        <label for="body"></label>
        <input type="text" class="form-control" name="body" id="exampleInputEmail1" placeholder="Type Your Comment" value="{{Request::old('body')}}">
        </div>
        <input type="submit" class="btn btn-primary btn-xs" value="Submit">
        </form>
    </div> 
@else
        <span class="views">{{$commented_news->views}}</span><span class="comment" onclick="toggleCommnet('{{$commented_news->id}}')"><a>{{$commented_news->comments()->count()}}</a></span>
        <div class="comment-form-{{$commented_news->id}} hidden">
        <p><span class="label label-primary"><a href="{{route('login')}}">Please SignIn</a></span></p>	     	
    </div> 
@endauth
@endif
</div>