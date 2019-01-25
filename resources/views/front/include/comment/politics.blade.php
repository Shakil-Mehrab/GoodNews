<div class="activity">
@if (Route::has('login'))
@auth

<span class="views">{{$politic->views}}</span><span class="comment" onclick="toggleCommnet('{{$politic->id}}')"><a>{{$politic->comments()->count()}}</a></span>
        <div class="comment-form-{{$politic->id}} hidden">
        <form  action="{{route('comment.store',$politic->id)}}" method="POST"  class="inline-it">
        {{csrf_field()}}  
        <div class="form-group">
        <label for="body"></label>
        <input type="text" class="form-control" name="body" id="exampleInputEmail1" placeholder="Type Your Comment" value="{{Request::old('body')}}">
        </div>
        <input type="submit" class="btn btn-primary btn-xs" value="Submit">
        </form>
    </div> 
@else
        <span class="views">{{$politic->views}}</span><span class="comment" onclick="toggleCommnet('{{$politic->id}}')"><a>{{$politic->comments()->count()}}</a></span>
        <div class="comment-form-{{$politic->id}} hidden">
        <p><span class="label label-primary"><a href="{{route('login')}}">Please SignIn</a></span></p>	     	
    </div> 
@endauth
@endif
</div>