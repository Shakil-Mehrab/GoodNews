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
									<a href="#">Mustreads</a>
								</div>
								<span style="text-align:center"><h3>{{$new->heading}}</h3></span>
								<span style="text-align:justify"><p class="excerpt-entry">{{$new->description}}</p></span>
								
								<div class="post-meta">
									<span class="author">By <a href="#">{{$new->user->name}}</a></span>
								</div>

							@include('front.include.comment.sgl')

							
						</div><!-- /.content-left -->
					</div><!-- /.featured-posts -->
					
					<div class="editors-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
						<div class="gn-line"></div>
						<div class="section-title">
							<h4>Comments</h4>
						</div>
						<div class="post-wrap">
						@forelse($commented_news as $science_technology_new)
							<article class="post">
								<div class="thumb">
								<a href="{{URL::to($science_technology_new->user->image)}}">
									<img  src="{{URL::to($science_technology_new->user->image)}}" class="science" alt="img">
									</a>
								</div>
								<div class="content">
									<div class="cat">
										<a href="#">Mustreads</a>
									</div>
									<h3><a href="{{route('new.single',$science_technology_new->id)}}">{{$science_technology_new->user->name}}</a></h3>
								<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($science_technology_new->body,200) @endphp</p></span>
									
									
								</div>

							</article><!--  /.post -->
							@empty
							<article class="post">
								<div class="thumb">
									<a href="#">
									<img src="images/thumbs/" alt="img">
									</a>
								</div>
								<div class="cat">
									<a href="#">Not News</a>
								</div>
								<h3><a href="#">No News</a>
								<div class="activity">
									<span class="views">12</span><span class="comment"><a href="#">15</a></span>
								</div>
							</article><!--  /.post -->	
                      @endforelse
						</div><!-- /.post-wrap -->
					</div><!-- /.editors-posts -->
	@endsection
