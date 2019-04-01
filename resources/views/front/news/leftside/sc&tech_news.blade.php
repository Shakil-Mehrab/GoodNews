
<div class="editors-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
<div class="gn-line"></div>
<div class="section-title">
<h4><a href="{{route('science.index')}}">Science ans technology</a></h4>
</div>
<div class="post-wrap">
@forelse($science_technology_news as $science_technology_new)
<article class="post">
	<div class="thumb">
	<a href="{{URL::to($science_technology_new->image)}}">
		<img  src="{{URL::to($science_technology_new->image)}}" class="science" alt="img">
		</a>
	</div>
	<div class="content">
		<div class="cat">
			<a href="#">Mustreads</a>
		</div>
		<h3><a href="{{route('new.single',$science_technology_new->id)}}">{{$science_technology_new->heading}}</a></h3>
	<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($science_technology_new->description,200) @endphp <a href="{{route('new.single',$science_technology_new->id)}}">Read more</a></p></span>
		
		<div class="post-meta">
			<span class="author">By <a href="#">{{$science_technology_new->user->name}}</a></span>
			<span class="time"> - 16 hours ago</span>
		</div>
	</div>
	<div class="activity">
	  <span class="views">{{$science_technology_new->views()}}</span>
	  <span class="comment"><a>{{$science_technology_new->comments()->count()}}</a></span>
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