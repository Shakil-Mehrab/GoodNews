@extends('layouts.app')

@section('navigation')
<h3><i class="fas fa-tachometer-alt"></i> Dashboard<small> Edit Your Comment</small></h3><hr>
<ol class="breadcrumb">
    <li><a href="#"><i class="fas fa-tachometer-alt"></i> dashboard</a></li>
	<li><a href="#">comment</a></li>
    <li><a href="#" class="active">edit-comment</a></li>	
</ol>
@endsection
@section('content') 
 <div class="row">
	<div class="col-md-9 col-md-offset-1">
		@include('admin.includes.message')
		<div class="text-center"><h3>Edit Comment</h3></div><br>

			<form method="post" action="{{route('admin.comment.update',$comment->id)}}" class="forms-sample" enctype="multipart/form-data"> 
				{{csrf_field()}} 
			<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                <label for="body" class="control-label">Comment</label>
                <textarea id="body" type="text" class="form-control" name="body" col="30" rows="8">{{$comment->body}}</textarea>  
                @if ($errors->has('body'))
                        <span class="help-block">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                    @endif                      
            </div>		
		   <button type="submit" class="btn btn-success">Update</button>
	</form>
	</div>
 </div>
@endsection
