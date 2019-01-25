@extends('layouts.admin-app')
@section('link')
<link rel="stylesheet" href="{{asset('style/admin/table/node_modules/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('style/admin/table/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
<link rel="stylesheet" href="{{asset('style/admin/table/node_modules/rickshaw/rickshaw.min.css')}}" />
<link rel="stylesheet" href="{{asset('style/admin/table/bower_components/chartist/dist/chartist.min.css')}}" />

@endsection

@section('navigation')
<h3><i class="fas fa-tachometer-alt"></i> sAdmin Dashboard<small> View Your News</small></h3><hr>
<ol class="breadcrumb">
    <li><a href="#"><i class="fas fa-tachometer-alt"></i> admin dashboard</a></li>
    <li><a href="#" class="active">news</a></li>
</ol>
@endsection
@section('content')
    @include('admin.includes.message')
    <div class="row">
        <div class="col-md-12">
            <div class="content-wrap well text-center">
                <a href="{{route('admin-news.create')}}"><button class="btn btn-success btn-small ">Add News</button></a>
            </div>
        </div>
    </div>
    
    <div class="content-wrapper">
            <h3 class="page-title text-center">News Table</h3><br>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <table id="order-listing" class="table table-striped" style="width:100%;">
                      <thead>
                        <tr>
                            <th>News #</th>
                            <th>Heading</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>User</th>
                            @if(Auth::guard('admin'))
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            @endif

                        </tr>
                      </thead>
                      <tbody>
                        @forelse($news as $new)
                        @if(!empty($new->user->id) and !empty($new->category->id))
                        <tr>
                            <td>{{$new->id}}</td>
                            <td>{{$new->heading}}</td>
                            <td>@php echo str_limit($new->description,300) @endphp</td>
                            <td><img src="{{URL::to($new->image)}}" width="60px"></td>
                            <td>{{$new->category->name}}</td>
                            <td>{{$new->user->name}}</td>
                            @if(Auth::guard('admin'))
                            <td> <a href="{{route('admin-news.show',$new->id)}}"><span style="color:green"><i class="far fa-eye"></i></span></a></td>
                            <td><a href="{{route('admin-news.edit',$new->id)}}" ><span style=""><i class="fas fa-pencil-alt"></i></span></a></td>
                            <td><a href="{{route('admin-news.delete',$new->id)}}" id="delete"><span style="color:#DD4F43"><i class="fas fa-trash-alt"></i></span></a></td>                     
                            @endif
                         </tr>
                         @endif
                        @empty
                        <tr>
                            <td><h4></h4></td>
                            <td><h4></h4></td>
                            <td><h4></h4></td>
                            <td><h4></h4></td>
                            <td><h4>No News</h4></td>
                            <td><h4></h4></td>
                            <td><h4></h4></td>
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