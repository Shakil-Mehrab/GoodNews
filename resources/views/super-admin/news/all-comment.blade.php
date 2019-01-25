@extends('layouts.admin-app')
@section('link')
<link rel="stylesheet" href="{{asset('style/admin/table/node_modules/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('style/admin/table/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
<link rel="stylesheet" href="{{asset('style/admin/table/node_modules/rickshaw/rickshaw.min.css')}}" />
<link rel="stylesheet" href="{{asset('style/admin/table/bower_components/chartist/dist/chartist.min.css')}}" />

@endsection

@section('navigation')
<h3><i class="fas fa-tachometer-alt"></i>Admin Dashboard<small> View All Comment</small></h3><hr>
<ol class="breadcrumb">
    <li><a href="#"><i class="fas fa-tachometer-alt"></i>admin dashboard</a></li>
    <li><a href="#" class="active">comment</a></li>
</ol>
@endsection
@section('content')
    @include('admin.includes.message')  
    <div class="content-wrapper">
            <h3 class="page-title text-center">Comments Table</h3><br>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <table id="order-listing" class="table table-striped" style="width:100%;">
                      <thead>
                        <tr>
                            <th>ID #</th>
                            <th>News Heading</th>
                            <th>Comment</th>
                            <th>User</th>
                            @if(Auth::guard('admin'))
                            <th>Update</th>
                            <th>Delete</th>
                        @endif
                            
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($comments as $comment)
                        @if(!empty($comment->news->id) and !empty($comment->user->id))
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>{{$comment->news->heading}}</td>
                            <td>{{str_limit($comment->body,50)}}</td>
                            <td>{{$comment->user->name}}</td>
                            @if(Auth::guard('admin'))
                            <td> <a href="{{route('admin-comment.edit',$comment->id)}}"><span style="color:green"><i class="fas fa-pencil-alt"></i></i></span></a></td>
                            <td><a href="{{route('admin-comment.delete',$comment->id)}}" id="delete"><span style="color:#DD4F43"><i class="fas fa-trash-alt"></i></span></a></td>
                        @endif                            
                        </tr>
                        @endif
                        @empty
                        <tr>
                            <td><h4></h4></td>
                            <td><h4></h4></td>
                            <td><h4></h4></td>
                            <td><h4>No Comment</h4></td>
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
@endsection
@section('js')
<!-- table js-->	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('style/admin/table/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('style/admin/table/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('style/admin/table/js/data-table.js')}}"></script>
<!-- end table js -->
@endsection