@extends('layouts.app')

@section('navigation')
<h3><i class="fas fa-tachometer-alt"></i> Dashboard<small> View Auth Profile</small></h3><hr>
<ol class="breadcrumb">
    <li><a href="#" ><i class="fas fa-tachometer-alt"></i> dashboard</a></li>
    <li><a href="#" class="active"> auth-profile</a></li>
</ol>
@endsection
@section('content')
          
            <div class="img text-center"> 
                    @include('admin.includes.message')
                <h3 class="card-title">User Info</h3><br>
              <div class="image">
                  <a href="{{URL::to($user->image)}}">
                      <img src="{{URL::to($user->image)}}" width="25%"></a>
                    
              </div>
              <div class="profile-text" style="font-size:18px">
              <p class="name">{{$user->name}}</p>
              <div class="email"><a class="email" href="#">Email: {{$user->email}}</a></div>
              <div class="password"><span>Authority:</span><a>{{$user->author}}</a></div>
              <br>
             <a href="{{route('user.edit',$user->id)}}"> <span class="label label-success">Edit Profile</span></a>

            </div>
          </div>

        @endsection