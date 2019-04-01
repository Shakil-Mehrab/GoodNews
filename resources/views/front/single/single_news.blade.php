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
  <span class="views">{{$new->views()}}</span>
  <span class="comment"><a>{{$new->comments()->count()}}</a></span>
</div>
				</div>
				<span style="text-align:center"><h3>{{$new->heading}}</h3></span>
				<span style="text-align:justify"><p class="excerpt-entry">{{$new->description}}</p></span>
				
				<div class="post-meta">
					<span class="author">By <a href="#">{{$new->user->name}}</a>| <a href="#">{{$new->created_at->diffForHumans()}}</a> | <a href="{{route('news.share.index',$new->id)}}">Share</a></span>

				</div>
			@include('front.include.comment.sgl')
		</div><!-- /.content-left -->
	</div><!-- /.featured-posts -->
 @endsection
			
 @section('lower')			
<div class="col-md-12">
   <div class="trending-posts">
	<div class="gn-line"></div>
	<div class="section-title">			
	<h4><a href="#">Related Post</a></h4>
		</div>
		@php 
		$i=0;
		@endphp
		@forelse($news as $new)
		@if($i!=.06)
		<div class="one-fourth gn-animation" data-animation="fadeInUp" data-animation-delay="{{$i}}s" data-animation-offset="75%">						
			<article class="post first">
				<div class="thumb">
				<a href="{{URL::to($new->image)}}">
					<img  src="{{URL::to($new->image)}}" class="recreation" alt="img">
					</a>
				</div>
				<span class="date">{{$new->created_at}}</span>
				<h3><a href="{{route('new.single',$new->id)}}">{{$new->heading}}</a></h3>
				<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($new->description,200) @endphp<a href="{{route('new.single',$new->id)}}">Read more</a></p></span>

			</article><!--  /.post -->
		</div>
		@else
		<div class="one-fourth last gn-animation" data-animation="fadeInUp" data-animation-delay="{{$i}}s" data-animation-offset="75%">						
			<article class="post first">
				<div class="thumb">
				<a href="{{URL::to($new->image)}}">
					<img  src="{{URL::to($new->image)}}" class="recreation" alt="img">
					</a>
				</div>
				<span class="date">{{$new->created_at}}</span>
				<h3><a href="{{route('new.single',$new->id)}}">{{$new->heading}}</a></h3>
				<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($new->description,200) @endphp<a href="{{route('new.single',$new->id)}}">Read more</a></p></span>
				
			</article><!--  /.post -->
		</div>
			@endif
		@php 
		$i=$i+.02;
		@endphp
		@empty
		<div class="one-fourth gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
			<article class="post first">
				<div class="thumb">
					<a href="#"><img src="images/thumbs/" alt="img"></a>
				</div>
				<span class="date"></span>
				<h3><a href="#">No News</a></h3>
			</article><!--  /.post -->
		</div>
		@endforelse
	</div><!-- /.trending-posts -->
	<div class="gn-line"></div>
</div><!-- /.col-md-12 -->
@endsection
