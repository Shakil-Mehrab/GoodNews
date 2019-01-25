@extends('layouts.admin-app')


@section('navigation')
<h3><i class="fas fa-tachometer-alt"></i>Admin Dashboard<small> View Your Category</small></h3><hr>
<ol class="breadcrumb">
    <li><a href="#"><i class="fas fa-tachometer-alt"></i>admin dashboard</a></li>
    <li><a href="#" class="active">Category</a></li>
</ol>
@endsection
@section('content')
<div class="row">
        <div class="col-md-12">
            @include('admin.includes.message')
            <div class="content-wrap well text-center">
                <a href="#"><button class="btn btn-success" data-toggle="modal" data-target="#mymodal" > Add Category</button></a>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">   
            <ul class="nav navbar-nav">
                   <li><a href="#" class="navbr-rand">Categories =></a></li>
                   <section>
                        <div class="row">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="width:10%">id</th>
                                <th style="width:20%">Categories</th> 
                            @if(Auth::guard('admin'))
                                <th style="width:10%">Edit</th> 
                                <th style="width:10%">Delete</th> 
                            @endif 
                            </tr>                 
                            </thead>
                            <tbody>
                            @forelse($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>  
                                <td>{{$category->name}}</td> 
                                @if(Auth::guard('admin'))
                                <td><a href="#" ><span data-toggle="modal" data-target="#mymodal-{{$category->id}}"><i class="fas fa-pencil-alt"></i></span></a></td>
                                <td><a href="{{route('admin-category.delete',$category->id)}}"><span style="color:#DD4F43"><i class="fas fa-trash-alt"></i></span></a></td>       
                    
                                <div id="mymodal-{{$category->id}}" class="modal fade" tabindex="-1" role="dialog" >
                                    <div class="modal-dialog" role="document">
                                        <form method="post" action="{{route('admin-category.update',$category->id)}}" class="forms-sample" enctype="multipart/form-data"> 
                                            {{csrf_field()}}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Update Caegories</h4>
                                        </div>
                                        <div class="modal-body">
                                        <div class="form-group">
                                            <label for="Category">Caetgory<span style='color:red'>*</span></label>
                                            <input type="text" class="form-control p-input" name="name" placeholder="Caetgory" value="{{$category->name}}"> 
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update Category</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                        </form>
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                @endif
                            </tr> 
                            @empty
                            <tr>
                                <td></td>
                                <td>No News</td>  
                                <td></td>        
                                <td></td>
                            </tr>  
                            @endforelse                    
                            </tbody>
                        </table>
                    </div>
                    </section>
           </ul>
       </div>
 </div>     




<div id="mymodal" class="modal fade" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document">
              <form method="post" action="{{route('admin-categories.store')}}" class="forms-sample" enctype="multipart/form-data"> 
                  {{csrf_field()}}
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Add Caegories</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                  <label for="Category">Caetgory<span style='color:red'>*</span></label>
                  <input type="text" class="form-control p-input" name="name" placeholder="Caetgory" value="{{Request::old('name')}}"> 
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create Category</button>
            </div>
          </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->


    
@endsection
