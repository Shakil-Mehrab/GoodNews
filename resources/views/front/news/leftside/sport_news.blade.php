
					<div class="popular-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
						<div class="gn-line"></div>
						<div class="section-title">
							<h4><a href="{{route('sports.index')}}">Sports</a></h4>
						</div>	
						<div class="content-left">
						@forelse($sport_latest_news as $sport_latest_new)
							<article class="post">
								<div class="thumb">
								<a href="{{URL::to($sport_latest_new->image)}}">
									<img  src="{{URL::to($sport_latest_new->image)}}" class="sport" alt="img">
									</a>
								</div>
								<div class="cat">
									<a href="#">Mustreads</a>
								</div>
								<h3><a href="{{route('new.single',$sport_latest_new->id)}}">{{$sport_latest_new->heading}}</a></h3>
								<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($sport_latest_new->description,500) @endphp<a href="{{route('new.single',$sport_latest_new->id)}}">Read more</a></p></span>
								<div class="post-meta">
									<span class="author">By <a href="#">{{$sport_latest_new->user->name}}</a></span>
									@include('front.include.comment.latest_sports')

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
					  
						</div><!-- /.content-left -->
						<div class="content-right">
						@forelse($sport_news as $sport_new)
							<article class="post">
								<div class="thumb">
								<a href="{{URL::to($sport_new->image)}}">
									<img  src="{{URL::to($sport_new->image)}}" class="latest_sport"  alt="img">
									</a>
								</div>
								<div class="content">
									<h3><a href="{{route('new.single',$sport_new->id)}}">{{$sport_new->heading}}</a></h3>
									<span class="date">{{$sport_new->created_at}}</span>
								</div>
								@include('front.include.comment.sport')

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
						</div><!-- /.content-right -->
					</div><!-- /.popular-posts -->