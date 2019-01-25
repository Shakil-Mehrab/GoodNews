@extends('layouts.master')
 @section('leftside')
	

				<div class="featured-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
						<div class="content">
						@forelse($sports_news_top as $national_new)
						<?php
						Session::put('sports_new_top_id',$national_new->id);
					   ?>
						<article class="post">
								<div class="thumb">
								<a href="{{URL::to($national_new->image)}}">
								<img  src="{{URL::to($national_new->image)}}" class="top" alt="img">
							
									</a>
								</div>
								<div class="cat">
									<a href="#">Mustreads</a>
								</div>
								<span style="text-align:center"><h3><a href="{{route('new.single',$national_new->id)}}">{{$national_new->heading}}</a></h3></span>
								<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($national_new->description,300) @endphp<a  href="{{route('new.single',$national_new->id)}}">Read more</a></p></span>
								
								<div class="post-meta">
									<span class="author">By <a href="#">{{$national_new->user->name}}</a></span>
								</div>

							@include('front.include.comment.national')

							</article><!--  /.post -->
                        @empty
							<a href="#"><img src="images/thumbs/" alt="img"></a>
							<h3><a href="#">No Top News</a></h3>
                      @endforelse
						</div><!-- /.content-left -->
					
					</div><!-- /.featured-posts -->


				<div class="highlights-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
						<div class="gn-line"></div>
						<div class="section-title">
							<h4><a href="{{route('national.index')}}">Sports</a></h4>
						</div>
					
						@forelse($sports_news_mid as $national_new)
						@if($national_new->id%2==0)
						<?php
						Session::put('sports_new_mid_id',$national_new->id);
					   ?>
						<article class="post">
							<div class="thumb">
							<a href="{{URL::to($national_new->image)}}">
									<img  src="{{URL::to($national_new->image)}}" class="national" alt="img">
									</a>
							</div>
							<div class="cat">
								<a href="#">{{$national_new->media}}</a>
							</div>
							<h3><a href="{{route('new.single',$national_new->id)}}">{{$national_new->heading}}</a></h3>
							<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($national_new->description,250) @endphp<a href="{{route('new.single',$national_new->id)}}">Read more</a></p></span>
							
							@include('front.include.comment.national')

						</article><!--  /.post -->
						@else
						<?php
						Session::put('sports_new_mid_id',$national_new->id);
					   ?>
						<article class="post last">
							<div class="thumb">
							<a href="{{URL::to($national_new->image)}}">
									<img  src="{{URL::to($national_new->image)}}" class="national" alt="img">
									</a>
							</div>
							<div class="cat">
							<a href="#">{{$national_new->media}}</a>
							</div>
							<h3><a href="{{route('new.single',$national_new->id)}}">{{$national_new->heading}}</a></h3>
							<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($national_new->description,250) @endphp<a href="{{route('new.single',$national_new->id)}}">Read more</a></p></span>
						
							@include('front.include.comment.national')

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
				
					<div class="editors-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
						<div class="gn-line"></div>
						<div class="section-title">

						</div>
						<div class="post-wrap">


 
							<div class="content-wrapper">
										
										<div class="card">
										<div class="card-body">
											<div class="row">
											<div class="col-12">
												<table id="order-listing" class="table table-striped" style="width:100%;">
												<thead>
													<tr>
														<th></th>
													
													</tr>
												</thead>
												<tbody>
													@forelse($sports_news as $national_new)
													<tr>
														<td>
														<article class="post">
															<div class="thumb">
															<a href="{{URL::to($national_new->image)}}">
																<img  src="{{URL::to($national_new->image)}}" class="science" alt="img">
																</a>
															</div>
															<div class="content">
																<div class="cat">
																	<a href="#">Mustreads</a>
																</div>
																<h3><a href="{{route('new.single',$national_new->id)}}">{{$national_new->heading}}</a></h3>
															<span style="text-align:justify"><p class="excerpt-entry">@php echo str_limit($national_new->description,200) @endphp <a href="{{route('new.single',$national_new->id)}}">Read more</a></p></span>
																
																<div class="post-meta">
																	<span class="author">By <a href="#">{{$national_new->user->name}}</a></span>
																	<span class="time"> - 16 hours ago</span>
																</div>
															</div>
															@include('front.include.comment.national')

														</article><!--  /.post -->	
														</td>																
													</tr>
												
													@empty
													<tr>
														<td><h4>No News</h4></td>
													
													</tr>
													@endforelse
												</tbody>
												</table>
											</div>
											</div>
										</div>
										</div>
									  </div>
									</div><!-- /.post-wrap -->
								</div><!-- /.editors-posts -->
	@endsection

