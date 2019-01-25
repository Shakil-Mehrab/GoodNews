@extends('layouts.admin-app')
@section('navigation')
<h3><i class="fas fa-tachometer-alt"></i>Admin Dashboard<small> Add Your Product</small></h3><hr>
<ol class="breadcrumb">
    <li><a href="#"><i class="fas fa-tachometer-alt"></i>admin dashboard</a></li>
	<li><a href="#">products</a></li>
    <li><a href="#" class="active">add-product</a></li>  	
</ol>
@endsection
@section('content')
 
 <div class="row">
	<div class="col-md-9 col-md-offset-1">
		@include('admin.includes.message')
		<div class="text-center"><h3>Add News</h3></div>

			<form method="post" action="{{route('admin-news.store')}}" class="forms-sample" enctype="multipart/form-data"> 
				{{csrf_field()}}
		    <div class="form-group">
				<label for="name">Heading<span style='color:red'>*</span></label>
				<input type="text" class="form-control p-input" name="heading" placeholder="name" value="{{Request::old('heading')}}"> 
			</div>
			<div class="form-group">
				<label for="name">Description<span style='color:red'>*</span></label>
				<textarea id="textarea" class="form-control p-input" name="description" rows="10" cols="5" placeholder="Description">{{Request::old('description')}}</textarea> 
			</div>
		
			<div class="form-group">
				<label for="category_id">Category <span style='color:red'>*</span></label>
				<select class='form-control' name="category_id" placeholder='Category' value="{{Request::old('category_id')}}">
					@forelse($categories as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
					@empty
					<option value="">No Category</option>
					@endforelse
				</select>
				<div class="form-group">
				<label for="name">Media<span style='color:red'>*</span></label>
				<input type="text" class="form-control p-input" name="media" placeholder="Media" value="{{Request::old('media')}}"> 
			</div>
		
			</div>
			<div class="form-group">
				<label>Upload file<span style='color:red'>*</span></label>
				<input type="file" class='form-control' class="form-control-file" name='image' id="exampleInputFile2" aria-describedby="fileHelp">
			</div>
			
		   <button type="submit" class="btn btn-success">Create</button>
	</form>
	</div>
 </div>
@endsection
