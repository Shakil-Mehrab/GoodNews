@php 
use App\Model\News;
$art_literatures=News::orderBY('id','desc')->where('category_id',12)->limit(6)->get();    
$economics=News::orderBY('id','desc')->where('category_id',11)->limit(6)->get();  
@endphp
<div class="col-md-12">
  <div class="trending-posts">
	<div class="gn-line"></div>
	<div class="section-title">						
	<header id="header" class="header">
	<div class="header-wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<nav id="mainnav" class="mainnav">
						<ul class="menu">
							<li><a href="{{route('education.index')}}">Education</a>
							
							</li>
							<li><a href="{{route('campus.index')}}">Campus</a>
							
							</li>												
							<li class="gn-mega-menu col-md-offset-2"><a href="{{route('economics.index')}}">Economics</a>
								<div class="sub-menu">
									<div class="container">
									<div class="row">
									<div class="col-md-12">
										<div class="mega-item-wrap">
								    	@forelse($economics as $economic)

											<div class="mega-item">
											<img  src="{{URL::to($economic->image)}}" class="international-nav" alt="img">	
												<h5><a href="{{route('new.single',$economic->id)}}">{{$economic->heading}}</a></h5>
											</div>
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
										</div>
										<div class="nav-mega-item">
											In this category:
											<a href="#">All</a>
											<a href="#">Tech</a>
											<a href="#">Apps</a>
											<a href="#">Dev&amp;Design</a>
											<a href="#">Dev&amp;Design</a>
											<a href="#">Gadget</a>
											<a href="#">Mobile</a>
										</div>
									</div>
									</div>
									</div>
								</div><!-- /.submenu -->
							</li>				
							<li class="gn-mega-menu"><a href="{{route('literature.index')}}">Art & Literature</a>
								<div class="sub-menu">
									<div class="container">
									<div class="row">
									<div class="col-md-12">
										<div class="mega-item-wrap">
								    	@forelse($art_literatures as $art_literature)

											<div class="mega-item">
											<img  src="{{URL::to($art_literature->image)}}" class="international-nav" alt="img">	
												<h5><a href="{{route('new.single',$art_literature->id)}}">{{$art_literature->heading}}</a></h5>
											</div>
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
										</div>
										<div class="nav-mega-item">
											In this category:
											<a href="#">All</a>
											<a href="#">Tech</a>
											<a href="#">Apps</a>
											<a href="#">Dev&amp;Design</a>
											<a href="#">Dev&amp;Design</a>
											<a href="#">Gadget</a>
											<a href="#">Mobile</a>
										</div>
									</div>
									</div>
									</div>
								</div><!-- /.submenu -->
							</li>
						</ul><!-- /.menu -->
					</nav><!-- /nav -->
				</div><!-- /.col-md-9 -->
			
			</div><!-- /.row -->
		</div><!-- /.container -->
		</div><!-- /.header-wrap -->
	</header>			
						</div>

		@php 
		$i=0;
		@endphp
		@forelse($education_news as $education_new)
		@if($i!=.06)
		<div class="one-fourth gn-animation" data-animation="fadeInUp" data-animation-delay="{{$i}}s" data-animation-offset="75%">

			<article class="post first">
				<div class="thumb">
				<a href="{{URL::to($education_new->image)}}">
					<img  src="{{URL::to($education_new->image)}}" class="education" alt="img">
					</a>
				</div>
				<span class="date">{{$education_new->created_at}}</span>
				<h3><a href="{{route('new.single',$education_new->id)}}">{{$education_new->heading}}</a></h3>
				<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($education_new->description,200) @endphp<a href="{{route('new.single',$education_new->id)}}">Read more</a></p></span>

<div class="activity">
  <span class="views">{{$education_new->views()}}</span>
  <span class="comment"><a>{{$education_new->comments()->count()}}</a></span>
</div>

			</article><!--  /.post -->
		</div>
		@else
		<div class="one-fourth last gn-animation" data-animation="fadeInUp" data-animation-delay="{{$i}}s" data-animation-offset="75%">

			<article class="post first">
				<div class="thumb">
				<a href="{{URL::to($education_new->image)}}">
					<img  src="{{URL::to($education_new->image)}}" class="education" alt="img">
					</a>
				</div>
				<span class="date">{{$education_new->created_at}}</span>
				<h3><a href="{{route('new.single',$education_new->id)}}">{{$education_new->heading}}</a></h3>
				<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($education_new->description,200) @endphp<a href="{{route('new.single',$education_new->id)}}">Read more</a></p></span>

<div class="activity">
  <span class="views">{{$education_new->views()}}</span>
  <span class="comment"><a>{{$education_new->comments()->count()}}</a></span>
</div>

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