@extends('layouts.admin-app')

@section('navigation')
<h3><i class="fas fa-tachometer-alt"></i> Dashboard<small> View User</small></h3><hr>
<ol class="breadcrumb">
    <li><a href="#"><i class="fas fa-tachometer-alt"></i> dashboard</a></li>
    <li><a href="#" class="active">view-user</a></li>
</ol>
@endsection
@section('content')

         
          <div class="row user-profile position">
            <div class="col-lg-12 side-left">
              <div class="card mb-6">
                <div class="card-body avatar">
                  <h3 class="card-title text-center">User Detail</h3><br>
                      @include('admin.includes.message')
                   <table class="table center-aligned-table table-striped table-bordered" style="width:100%" >
                     
             
                          <div class="text-center">
                            <a href="{{URL::to($user->image)}}"><span class="border border-danger"> 
                              <img src="{{URL::to($user->image)}}" width="25%" height="25%" style="border-radius:50%" class="img-thumbnail">
                            </span></a>         
                            </div>
                            <br>
                        <thead>  
                           <tr>
                              <th style="width:20%;font-size:16px;color:blue">User Name</th>
                              <th style="width:30%;">{{$user->name}}</th>
                              <th style="width:20%;font-size:16px;color:blue">User Authority</th>
                              <th style="width:30%;">{{$user->email}}</th>
                            </tr>
                            <tr>
                              <th style="width:20%;font-size:16px;color:blue">Password</th>
                              <th style="width:30%;">{{$user->author}} </th>
                         
                              <th style="width:20%;font-size:16px;color:blue">Password</th>
                              <th style="width:30%;">****** </th>
                            </tr>
                        </thead>
	    	          </table>
                </div>
              </div>
            </div>
          </div>
        
@endsection