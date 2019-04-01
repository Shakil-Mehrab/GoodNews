<hr>
<h3>Reviews For Costomer</h3>                              <!--Reviews-->
@forelse($new->comments as $comment)
<div class="row">
    <article class="review-box reply">
    <div class="col-md-3">
      <div class="thumb-box">
        <img class="thumb" src="{{asset($comment->user->image)}}" alt="{{$comment->user->name}}" style="max-height: 50px;min-height: 50px">
        <div><a class="label label-primary"><span  onclick="toggleCommnet('{{$comment->id}}')">Reply This Comment</span></a></div>
      </div>
    </div>
    <div class="col-md-8">
        <div class="content-box">
            <div class="name">{{$comment->user->name}}</div>
            <span class="date"><i class="la la-calendar"></i> {{$comment->created_at->diffForHumans()}}</span>
            <div class="text">{{$comment->body}}</div>

            <div class="comment-form-{{$comment->id}} hidden">    
              <div class="review-comment-form"> 
                <form method="post" action="{{route('reply.store',$comment->id)}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                             <textarea name="body" placeholder="Reply" class="form-control" required>{{Request::old('body')}}</textarea>
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-6">
                            <button class="btn btn-success" type="submit">Submit Now</button>
                        </div>
                    </div>
                </form>
            </div>
          </div> 
        </div>
    </div>
  </article>
</div>
                   
                <!--Replies-->
              @forelse($comment->replies as $reply)
            <div class="row">
                <article class="review-box reply">
                  <div class="col-md-3 col-md-offset-3">
                    <div class="thumb-box">
                        <img class="thumb" src="{{asset($reply->user->image)}}" alt="{{$reply->user->name}}">
                        <div><a class="label label-success"><span  onclick="toggleReply('{{$reply->id}}')">Reply This Reply</span></a></div>
                    </div>
                    </div>

                    <div class="col-md-6">
                        <div class="name">{{$reply->user->name}}</div>
                        <span class="date"><i class="la la-calendar"></i>{{$reply->created_at}} </span>
                        <div class="text">{{$reply->body}}</div>
                         <div class="reply-form-{{$reply->id}} hidden">    
                              <div class="review-comment-form"> 
                                <form method="post" action="{{route('reply.store',$reply->comment->id)}}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <textarea name="body" rows="3"placeholder="Reply" class="form-control" required>{{Request::old('body')}}</textarea>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                            <button class="btn btn-primary" type="submit">Submit now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                         </div> 
                    </div>
                </article>
            </div>
            <hr>
             @empty 
             <div class="col-md-offset-3">
              <article class="review-box reply">
                <h4>No Reply</h4>
             </article>
             </div>
             @endforelse          
     @empty
     <article class="review-box reply">
        <h3>No Comment</h3>
     </article>
        @endforelse

   
<form method="post" action="{{route('comment.store',$new->id)}}" class="forms-sample" enctype="multipart/form-data"> 
                {{csrf_field()}}
   <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
    <label for="body" class="control-label">Leave Your Connent</label>
    <textarea id="body" type="text" class="form-control" name="body" col="30" rows="5" placeholder="Write Your Comment" required>{{ old('body') }}</textarea>  
    @if ($errors->has('body'))
            <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif                      
    </div>
   <button type="submit" class="btn btn-success">Create</button>
</form>