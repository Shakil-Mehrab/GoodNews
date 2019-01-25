
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
														<li><a href="{{route('politics.index')}}">Politics</a></li>
													
													
														<li class="gn-mega-menu col-md-offset-4 col-sm-offset-3 col-xs-offset-3"><a href="{{route('district.index')}}">District News</a>
															<div class="sub-menu">
																<div class="container">
																<div class="row">
																<div class="col-md-12">
																	<div class="mega-item-wrap">
																	@forelse($district_news as $district_new)

																		<div class="mega-item">
																		<img  src="{{URL::to($district_new->image)}}" class="international-nav" alt="img">	
																			<h5><a href="{{route('new.single',$district_new->id)}}">{{$district_new->heading}}</a></h5>
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
						@forelse($politics as $politic)
						@if($i!=.06)
						<div class="one-fourth gn-animation" data-animation="fadeInUp" data-animation-delay="{{$i}}s" data-animation-offset="75%">
							<article class="post first">
								<div class="thumb">
								<a href="{{URL::to($politic->image)}}">
									<img  src="{{URL::to($politic->image)}}" class="life_style" alt="img">
									</a>
								</div>
								<span class="date">{{$politic->created_at}}</span>
								<h3><a href="{{route('new.single',$politic->id)}}">{{$politic->heading}}</a></h3>
								<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($politic->description,200) @endphp<a href="{{route('new.single',$politic->id)}}">Read more</a></p></span>
							
							@include('front.include.comment.politics')

							</article><!--  /.post -->
						</div>
						@else
						<div class="one-fourth last gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
							<article class="post first">
								<div class="thumb">
								<a href="{{URL::to($politic->image)}}">
									<img  src="{{URL::to($politic->image)}}" class="life_style" alt="img">
									</a>
								</div>
								<span class="date">{{$politic->created_at}}</span>
								<h3><a href="{{route('new.single',$politic->id)}}">{{$politic->heading}}</a></h3>
								<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($politic->description,200) @endphp<a href="{{route('new.single',$politic->id)}}">Read more</a></p></span>
							
							@include('front.include.comment.politics')
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