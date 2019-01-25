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
							<li><a href="{{route('recreation.index')}}">Recreation</a>
							
							</li>
							<li><a href="{{route('bandmusic.index')}}">Band Music</a>
								
							</li>
							<li class="gn-mega-menu"><a href="{{route('healthfitnes.index')}}">Health & Fitness</a>
								<div class="sub-menu">
									<div class="container">
									<div class="row">
									<div class="col-md-12">
										<div class="mega-item-wrap">
										@forelse($healthfitness as $healthfitnes)

											<div class="mega-item">
											<img  src="{{URL::to($healthfitnes->image)}}" class="international-nav" alt="img">	
												<h5><a href="{{route('new.single',$healthfitnes->id)}}">{{$healthfitnes->heading}}</a></h5>
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
							<li class="gn-mega-menu"><a href="{{route('lifestyle.index')}}">Life Style</a>
								<div class="sub-menu">
									<div class="container">
									<div class="row">
									<div class="col-md-12">
										<div class="mega-item-wrap">
										@forelse($life_style_news as $life_style_new)

											<div class="mega-item">
											<img  src="{{URL::to($life_style_new->image)}}" class="international-nav" alt="img">	
												<h5><a href="{{route('new.single',$life_style_new->id)}}">{{$life_style_new->heading}}</a></h5>
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
		@forelse($recreation_news as $recreation_new)
		@if($i!=.06)
		<div class="one-fourth gn-animation" data-animation="fadeInUp" data-animation-delay="{{$i}}s" data-animation-offset="75%">						
			<article class="post first">
				<div class="thumb">
				<a href="{{URL::to($recreation_new->image)}}">
					<img  src="{{URL::to($recreation_new->image)}}" class="recreation" alt="img">
					</a>
				</div>
				<span class="date">{{$recreation_new->created_at}}</span>
				<h3><a href="{{route('new.single',$recreation_new->id)}}">{{$recreation_new->heading}}</a></h3>
				<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($recreation_new->description,200) @endphp<a href="{{route('new.single',$recreation_new->id)}}">Read more</a></p></span>

			@include('front.include.comment.recreation')
			</article><!--  /.post -->
		</div>
		@else
		<div class="one-fourth last gn-animation" data-animation="fadeInUp" data-animation-delay="{{$i}}s" data-animation-offset="75%">						
			<article class="post first">
				<div class="thumb">
				<a href="{{URL::to($recreation_new->image)}}">
					<img  src="{{URL::to($recreation_new->image)}}" class="recreation" alt="img">
					</a>
				</div>
				<span class="date">{{$recreation_new->created_at}}</span>
				<h3><a href="{{route('new.single',$recreation_new->id)}}">{{$recreation_new->heading}}</a></h3>
				<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($recreation_new->description,200) @endphp<a href="{{route('new.single',$recreation_new->id)}}">Read more</a></p></span>
				
			@include('front.include.comment.recreation')
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
