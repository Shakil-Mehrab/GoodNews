@extends('layouts.admin-app')

@section('navigation')
<h3><i class="fas fa-tachometer-alt"></i>Admin Dashboard<small> Edit Your Comment</small></h3><hr>
<ol class="breadcrumb">
    <li><a href="#"><i class="fas fa-tachometer-alt"></i>Admin dashboard</a></li>
	<li><a href="#">comment</a></li>
    <li><a href="#" class="active">edit-comment</a></li>	
</ol>
@endsection
@section('content') 
 <div class="row">
	<div class="col-md-9 col-md-offset-1">
		@include('admin.includes.message')
		<div class="text-center"><h3>Edit Comment</h3></div><br>

			<form method="post" action="{{route('admin-comment.update',$comment->id)}}" class="forms-sample" enctype="multipart/form-data"> 
				{{csrf_field()}} 
			<div class="form-group">
					<label for="body">Body<span style='color:red'>*</span></label>
					<textarea id="textarea" class="form-control p-input" name="body" rows="10" closedir='5' placeholder="Type Your Comment">{{$comment->body}} </textarea> 
				</div>			
		   <button type="submit" class="btn btn-success">Update</button>
	</form>
	</div>
 </div>
@endsection
