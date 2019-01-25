<div class="featured-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
						<div class="content-left">
						@forelse($top_news as $top_new)
						<article class="post">
								<div class="thumb">
								<a href="{{URL::to($top_new->image)}}">
								<img  src="{{URL::to($top_new->image)}}" class="top" alt="img">
									
									</a>
								</div>
								<div class="cat">
									<a href="#">Mustreads</a>
								</div>
								<span style="text-align:justify"><h3><a href="{{route('new.single',$top_new->id)}}">{{$top_new->heading}}</a></h3></span>
								<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($top_new->description,300) @endphp<a  href="{{route('new.single',$top_new->id)}}">Read more</a></p></span>
								
								<div class="post-meta">
									<span class="author">By <a href="#">{{$top_new->user->name}}</a></span>
								@include('front.include.comment.top')
								</div>
							</article><!--  /.post -->
                        @empty
							<a href="#"><img src="images/thumbs/" alt="img"></a>
							<h3><a href="#">No Top News</a></h3>
                      @endforelse
						</div><!-- /.content-left -->
						<div class="content-right">
						@forelse($latest_news as $latest_new)
							<article class="post">
								<div class="thumb">
								<a href="{{URL::to($latest_new->image)}}">
									<img  src="{{URL::to($latest_new->image)}}" class="latest-top" alt="img">
									</a>
								</div>
								<div class="cat">
									<a href="#">{{$latest_new->media}}</a>
								</div>
								<h3><a href="{{route('new.single',$latest_new->id)}}">{{$latest_new->heading}}</a></h3>     
								<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($latest_new->description,50) @endphp<a href="{{route('new.single',$latest_new->id)}}">Read more</a></p></span>

								@include('front.include.comment.latesttop')
								
							</article><!--  /.post -->	

							
                        
							@empty
							<article class="post">
								<div class="thumb">
									<a href="#">
									<img src="images/thumbs/" alt="img">
									</a>
								</div>
								<div class="cat">
									<a href="#">No News</a>
								</div>
                                <h3><a href="#">No News</a></h3>
								<div class="activity">
									<span class="views">12</span><span class="comment"><a href="#">15</a></span>
								</div>
							</article><!--  /.post -->	
                      @endforelse
						</div><!-- /.content-right -->
					</div><!-- /.featured-posts -->