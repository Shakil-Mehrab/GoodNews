@extends('layouts.admin-app')
@section('navigation')
<h3><i class="fas fa-tachometer-alt"></i>Admin Dashboard<small> View Your Products</small></h3><hr>
<ol class="breadcrumb">
    <li><a class="active"><i class="fas fa-tachometer-alt"></i>admin dashboard</a></li>
    <li><a href="#">products</a></li>
    <li><a href="#" class="active">view-product</a></li>
</ol>
@endsection
@section('content')

         <div class="products-table">
                  <h3 class="card-title text-center">News Detail</h3>
                      @include('admin.includes.message')
                   <table class="table center-aligned-table table-striped table-bordered" style="width:100%" >
                          <div class="text-center">
                            <a href="{{URL::to($new->image)}}"><span class="border border-danger"> 
                              <img src="{{URL::to($new->image)}}" class="img-thumbnail" alt="nice.jpg">
                            </span></a>         
                            </div>
                            <br>
                        <thead>  
                           <tr>
                              <th style="width:10%;font-size:16px;color:red">Heading</th>
                              <th style="width:8%;font-size:16px;color:indigo;text-align:center">Description</th>
                              <th style="width:10%;font-size:16px;color:green">Category</th>
                             
                            </tr>
                             
                        </thead>
                        <tbody>
                        <td style="width:10%">{{$new->heading}}</td>
                        <td style="width:80%">{{$new->description}}</td>
                        <td style="width:10%">{{$new->category->name}}</td>
                        
                        </tbody>
	    	          </table>
                </div>
              
        
@endsection