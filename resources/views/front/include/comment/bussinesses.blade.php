<div class="activity">
@if (Route::has('login'))
    @auth

    <span class="views">{{$bussiness->views}}</span><span class="comment" onclick="toggleCommnet('{{$bussiness->id}}')"><a>{{$bussinesses->comments()->count()}}</a></span>
            <div class="comment-form-{{$bussiness->id}} hidden">
            <form  action="{{route('comment.store',$bussiness->id)}}" method="POST"  class="inline-it">
            {{csrf_field()}}  
            <div class="form-group">
            <label for="body"></label>
            <input type="text" class="form-control" name="body" id="exampleInputEmail1" placeholder="Type Your Comment" value="{{Request::old('body')}}">
            </div>
            <input type="submit" class="btn btn-primary btn-xs" value="Submit">
            </form>
        </div> 
    @else
            <span class="views">{{$bussiness->views}}</span><span class="comment" onclick="toggleCommnet('{{$bussiness->id}}')"><a>{{$bussiness->comments()->count()}}</a></span>
            <div class="comment-form-{{$bussiness->id}} hidden">
            <p><span class="label label-primary"><a href="{{route('login')}}">Please SignIn</a></span></p>	     	
        </div> 
    @endauth
    @endif
</div>