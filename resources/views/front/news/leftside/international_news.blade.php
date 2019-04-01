<div class="highlights-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
	<div class="gn-line"></div>
	<div class="section-title">
		<h4><a href="{{route('international.index')}}">International</a></h4>
	</div>

	@forelse($interenational_news as $international_new)
	@if($international_new->id%2==0)
	<article class="post">
		<div class="thumb">
		<a href="{{URL::to($international_new->image)}}">
				<img  src="{{URL::to($international_new->image)}}" class="international thumbnail" alt="img">
				</a>
		</div>
		<div class="cat">
			<a href="#">{{$international_new->media}}</a>
		</div>
		<h3><a href="{{route('new.single',$international_new->id)}}">{{$international_new->heading}}</a></h3>
		<span style="text-align:justify;padding-right:5px"><p class="excerpt-entry">@php echo str_limit($international_new->description,250) @endphp<a href="{{route('new.single',$international_new->id)}}">Read more</a></p></span>

<div class="activity">
  <span class="views">{{$international_new->views()}}</span>
  <span class="comment"><a>{{$international_new->comments()->count()}}</a></span>
</div>

</article><!--  /.post -->
@else
<article class="post last">
	<div class="thumb">
	<a href="{{URL::to($international_new->image)}}">
			<img  src="{{URL::to($international_new->image)}}" class="national thumbnail" alt="img">
			</a>
	</div>
	<div class="cat">
	<a href="#">{{$international_new->media}}</a>
	</div>
	<h3><a href="{{route('new.single',$international_new->id)}}">{{$international_new->heading}}</a></h3>
	<span style="text-align:justify:20px;padding-left:5px"><p class="excerpt-entry">@php echo str_limit($international_new->description,250) @endphp<a href="{{route('new.single',$international_new->id)}}">Read more</a></p></span>

<div class="activity">
  <span class="views">{{$international_new->views()}}</span>
  <span class="comment"><a>{{$international_new->comments()->count()}}</a></span>
</div>

	</article><!--  /.post -->
	@endif
	@empty
	<article class="post">
		<div class="thumb">
			<a href="#"><img src="images/thumbs/" alt="img"></a>
		</div>
		<div class="cat">
			<a href="#"></a>
		</div>
		<h3><a href="#">No News</a></h3>
		<div class="activity">
			<span class="views">12</span><span class="comment"><a href="#">0</a></span>
		</div>
	</article><!--  /.post -->
  @endforelse
</div><!-- /.highlights-posts -->