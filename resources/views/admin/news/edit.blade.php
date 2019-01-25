@extends('layouts.app')

@section('navigation')
<h3><i class="fas fa-tachometer-alt"></i> Dashboard<small> Edit Your Product</small></h3><hr>
<ol class="breadcrumb">
    <li><a href="#"><i class="fas fa-tachometer-alt"></i> dashboard</a></li>
	<li><a href="#">products</a></li>
    <li><a href="#" class="active">edit-product</a></li>	
</ol>
@endsection
@section('content')
 
 <div class="row">
	<div class="col-md-9 col-md-offset-1">
		@include('admin.includes.message')
		<div class="text-center"><h3>Edit product</h3></div><br>

			<form method="post" action="{{route('news.update',$new->id)}}" class="forms-sample" enctype="multipart/form-data"> 
				{{csrf_field()}}
		    <div class="form-group">
				<label for="name">Name<span style='color:red'>*</span></label>
				<input type="text" class="form-control p-input" name="heading" placeholder="name" value="{{$new->heading}}"> 
			</div>
			<div class="form-group">
					<label for="name">Description<span style='color:red'>*</span></label>
					<textarea id="textarea" class="form-control p-input" name="description" rows="10" closedir='5' placeholder="Description">{{$new->description}} </textarea> 
				</div>
			{{-- <div class="form-group">
				<label for="size">Size<span style='color:red'>*</span></label>
				<select class='form-control' name="size">
					<option value=" ">Select One</option>
					<option value="Different" {{$new->size=='Different'?"selected":" "}}>Different</option>					
					<option value="Small"  {{$new->size=='Small'?"selected":" "}}>Small</option>					
					<option value="Medium" {{$new->size=='Medium'?"selected":" "}} >Medium</option>
					<option value="Large"  {{$new->size=='Large'?"selected":" "}}>Large</option>					
				</select>
			</div> --}}
			<?php 
			use App\category;
			$categories=Category::all();
			?>
			<div class="form-group">
				<label for="category_id">Category <span style='color:red'>*</span></label>
				<select class='form-control' name="category_id" placeholder='Category'> 
					@forelse($categories as $category)
					<option value="{{$category->id}}" {{$category->id==$new->category_id?'selected':''}}>{{$category->name}}</option>
					@empty
					<option value="">No Category</option>
					@endforelse
					
				</select>
			
			</div>
			<div class="form-group">
					<label for="name">Media<span style='color:red'>*</span></label>
					<textarea id="textarea" class="form-control p-input" name="media" placeholder="Media">{{$new->media}} </textarea> 
				</div>
			<div class="form-group">
				<label>Upload file<span style='color:red'>*</span></label>
				<input type="file" class='form-control' class="form-control-file" name='image' id="exampleInputFile2" aria-describedby="fileHelp">
			</div>
			
		   <button type="submit" class="btn btn-success">Update</button>
	</form>
	</div>
 </div>
@endsection
