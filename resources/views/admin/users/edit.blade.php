@extends('layouts.app')

@section('navigation')
<h3><i class="fas fa-tachometer-alt"></i> Dashboard<small> Edit User</small></h3><hr>
<ol class="breadcrumb">
    <li><i class="fas fa-tachometer-alt"></i> dashboard</li>
    <li><a class="active">edit-user</a></li>
</ol>
@endsection
@section('content')
 
 <div class="row">
	<div class="col-md-9 col-md-offset-1">
		@include('admin.includes.message')
		<div class="text-center"><h3>Edit User</h3></div>

			<form method="post" action="{{route('user.update',$user->id)}}" class="forms-sample" enctype="multipart/form-data"> 
				{{csrf_field()}}
		    <div class="form-group">
				<label for="name">Name<span style='color:red'>*</span></label>
				<input type="text" class="form-control p-input" name="name" placeholder="name" value="{{$user->name}}"> 
			</div>
			<div class="form-group">
				<label for="price">Price<span style='color:red'>*</span></label>
				<input type="text" class="form-control p-input" name="email" placeholder="Email" value="{{$user->email}}"> 
			</div>
			<div class="form-group">
				<label>Upload file<span style='color:red'>*</span></label>
				<input type="file" class='form-control' class="form-control-file" name='image' id="exampleInputFile2" aria-describedby="fileHelp">
			</div>
		   <button type="submit" class="btn btn-success">Submit</button>
	</form>
	</div>
 </div>
@endsection
