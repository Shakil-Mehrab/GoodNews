@extends('layouts.master')
 @section('leftside')
    <div class="featured-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
        <div class="content">
        
        <article class="post">
                <div class="thumb">
                <a href="{{URL::to($new->image)}}">
                <img  src="{{URL::to($new->image)}}" class="top" alt="img">
            
                    </a>
                </div>
                <div class="cat">
<div class="activity">
  <span class="views">{{$new->views}}</span>
  <span class="comment"><a>{{$new->comments()->count()}}</a></span>
</div>
                </div>
                <span style="text-align:center"><h3>{{$new->heading}}</h3></span>
                <span style="text-align:justify"><p class="excerpt-entry">{{$new->description}}</p></span>
                
                <div class="post-meta">
                    <span class="author">By <a href="#">{{$new->user->name}}</a> <a href="{{route('news.share.index',$new->id)}}">Share</a></span>

                </div>
            @include('front.include.share.share')
        </div><!-- /.content-left -->
    </div><!-- /.featured-posts -->
 @endsection
            
 @section('lower')          

@endsection
