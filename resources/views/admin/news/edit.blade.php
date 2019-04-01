@extends('layouts.app')
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
		@include('super-admin.includes.message')
		<div class="text-center"><h3>Edit News</h3></div>

			<form method="post" action="{{route('news.update',$new->id)}}" class="forms-sample" enctype="multipart/form-data"> 
				{{csrf_field()}}
			<div class="form-group{{ $errors->has('heading') ? ' has-error' : '' }}">
	            <label for="heading" class="control-label">Heading</label>
	            <input id="heading" type="text" class="form-control" name="heading" placeholder="Heading" value="{{$new->heading}}" required>

	                @if ($errors->has('heading'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('heading') }}</strong>
	                    </span>
	                @endif
	        </div>
			   <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="control-label">Description</label>
                <textarea id="description" type="text" class="form-control" name="description" col="30" rows="8">{{$new->description}}</textarea>  
                @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif                      
            </div>
            @include('super-admin.news.form.edit-select')
			<div class="form-group">
				<label>Upload file<span style='color:red'>*</span></label>
				<input type="file" class='form-control' class="form-control-file" name='image' id="exampleInputFile2" aria-describedby="fileHelp">
			</div>
			
		   <button type="submit" class="btn btn-success">Create</button>
	</form>
	</div>
 </div>
@endsection
