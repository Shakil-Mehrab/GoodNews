
				<div class="col-md-12">
					<div class="social-media-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
						<div class="section-title">
							<h4><a href="{{route('final.index')}}">Final News</a></h4>
						</div>
						@forelse($final_news as $final_new)
						<article class="post">
							<div class="thumb">
							<a href="{{URL::to($final_new->image)}}">
									<img src="{{URL::to($final_new->image)}}" class="final" alt="img">
									</a>
							</div>
							<div class="content">
								<div class="cat">
									<a href="#">Mustreads</a>
								</div>
								<h3><a href="{{route('new.single',$final_new->id)}}">{{$final_new->heading}}</a></h3>
								<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($final_new->description,350) @endphp<a href="{{route('new.single',$final_new->id)}}">Read more</a></p></span>								
								@include('front.include.comment.final')

							</div>
						</article><!--  /.post -->
						@empty
						<article class="post">
							<div class="thumb">
								<a href="#"><img src="images/thumbs/" alt="img"></a>
							</div>
							<div class="content">
								<div class="cat">
									<a href="#">Mustreads</a>
								</div>
								<h3><a href="#"></a></h3>
								<p class="excerpt-entry">No News</p>
								<div class="activity">
									<span class="views"></span><span class="comment"><a href="#"></a></span>
								</div>
							</div>
						</article><!--  /.post -->
                      @endforelse
					</div><!-- /.social-media-posts -->
				</div><!-- /.col-md-8 -->