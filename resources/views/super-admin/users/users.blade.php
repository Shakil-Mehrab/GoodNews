@extends('layouts.admin-app')
@section('link')
<link rel="stylesheet" href="{{asset('style/admin/table/node_modules/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('style/admin/table/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
<link rel="stylesheet" href="{{asset('style/admin/table/node_modules/rickshaw/rickshaw.min.css')}}" />
<link rel="stylesheet" href="{{asset('style/admin/table/bower_components/chartist/dist/chartist.min.css')}}" />

@endsection

@section('navigation')
<h3><i class="fas fa-tachometer-alt"></i>Admin Dashboard<small> View Users</small></h3><hr>
<ol class="breadcrumb">
    <li><a href="#" ><i class="fas fa-tachometer-alt"></i>admin dashboard</a></li>
    <li><a href="#" class="active">users</a></li>
</ol>
@endsection
@section('content')   
    <div class="content-wrapper">
        	@include('admin.includes.message')
            <h3 class="page-title text-center">User's Table</h3><br>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <table id="order-listing" class="table table-striped" style="width:100%;">
                      <thead>
                        <tr>
                            <th>Product #</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Edit</th>
                            @if(Auth::guest('admin'))
                            <th>View</th>
                            <th>Delete</th>
                         @endif                            
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td><img src="{{URL::to($user->image)}}" width="60px" class="img-circle"></td>
                            <td>   
                                <ul class="nav navbar-nav">
                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{$user->author}} <span class="caret"></span></a>
                                  <ul class="dropdown-menu" role="menu">
                                  @if(Auth::guard('admin'))                                 
                                 @if($user->author=='admin') 
                                    <li><a href="{{route('admin-change-to-author',$user->id)}}"><i class="fas fa-pencil-alt"></i></span> Change to Author</a></li>
                                    @else
                                    <li><a href="{{route('author-change-to-admin',$user->id)}}"><i class="fas fa-pencil-alt"></i></span> Change to Admin</a></li>
                                      @endif
                                      @endif
                                   
                                  </ul>
                                </li>
                              </ul>
                            </td>
                            @if(Auth::guard('admin'))
                            <td> <a href="{{route('admin-user.show',$user->id)}}"><span style="color:green"><i class="far fa-eye"></i></span></a></td>
                            <td><a href="{{route('admin-user.destroy',$user->id)}}" id="delete" ><span style="color:#DD4F43"><i class="fas fa-trash-alt"></i></span></a></td>
                            @endif                       
                         </tr>
                        @empty
                        <tr>
                            <td><h4></h4></td>
                            <td><h4></h4></td>
                            <td><h4></h4></td>
                            <td><h4>No User</h4></td>
                            <td><h4></h4></td>
                            <td><h4></h4></td>
                            
                                                         
                    </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
   <!-- slide show-->
@endsection
@section('js')
<!-- table js-->	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('style/admin/table/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('style/admin/table/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('style/admin/table/js/data-table.js')}}"></script>
<!-- end table js -->
@endsection