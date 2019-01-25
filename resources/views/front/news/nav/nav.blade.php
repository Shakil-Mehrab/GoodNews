  	<!-- Header -->
<header id="header" class="header" >
	   	<div class="top-wrap" style="background:#E8280B">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
		              	<div id="logo" class="logo">
							<a href="#" rel="home" title="home">
								<img src="{{asset('images/logo.svg')}}" alt="Good News" />
							</a>
		            	</div>
		            	<div class="follow-us">
			            	<div class="follow-title">
			            		Follow Us
			            	</div>
			            	<ul class="social-links">
			            		<li class="facebook"><a href="https://www.facebook.com/profile.php?id=100014002519180">Follow us on Facebook</a></li>
			            		<li class="twitter"><a href="https://twitter.com/Md_Shakil_Sard">Follow us on Twitter</a></li>
			            		
			            	</ul>
		            	</div>
		            </div><!-- /.col-md-6 -->
		            <div class="col-md-6">
		            	<div class="btn-menu"></div><!-- //mobile menu button -->
		            	<div class="member-area">
						@if (Route::has('login'))
                            @auth
							<span class="login-popup"><a href="{{ url('/home') }}">Dashboard</a></span>
							@else
		            		<span class="login-popup"><a href="{{route('signin-page')}}">Login</a></span>
		            		<span class="signup-popup"><a href="{{route('signup-page')}}">Sign Up</a></span>
							@endauth
                       @endif
					   <span class="login-popup" style='margin-left:10px'><a href="{{route('admin.dashboard')}}">Admin</a></span>					   
		            	</div>
		            </div><!-- /.col-md-6 -->
	            </div><!-- /.row -->
	         </div><!-- /.container -->
	   	</div><!-- /.top-wrap -->
		<div class="header-wrap">
		 <div class="container">
		    <div class="row">
				<div class="col-md-9">
					<nav id="mainnav" class="mainnav">
						<ul class="menu">
							<li><a class="active" href="{{url('/')}}">Home</a></li>
							<li><a href="{{route('national.index')}}">National</a></li>
							<li><a href="{{route('politics.index')}}"->Politics</a></li>
							
												
							<li class="gn-mega-menu"><a  href="{{route('international.index')}}">International</a>
								<div class="sub-menu">
									<div class="container">
									<div class="row">
									<div class="col-md-12">
										<div class="mega-item-wrap">
								    	@forelse($interenational_news_nav as $interenational_new_nav)

											<div class="mega-item">
											<img  src="{{URL::to($interenational_new_nav->image)}}" class="international-nav" alt="img">	
												<h5><a href="{{route('new.single',$interenational_new_nav->id)}}">{{$interenational_new_nav->heading}}</a></h5>
											</div>
											@empty
											<div class="mega-item">
												<img src="images/thumbs" alt="image">	
												<h5><a href="#">No News</a></h5>
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
							<li><a href="{{route('sports.index')}}">Sports</a></li>
							
							
							<li class="has-children"><a href="category.html">Category</a>
								<ul class="sub-menu">
									<li><a href="{{route('top.index')}}">Top News</a></li>
									<li><a href="{{route('latest.index')}}">Latest News</a></li>
									<li><a href="{{route('national.index')}}">National News</a></li>
									<li><a href="{{route('international.index')}}">International News</a></li>
									<li><a href="{{route('science.index')}}">Science & Technology News</a></li>
									<li><a href="{{route('sports.index')}}">Sports News</a></li>
									<li><a href="{{route('politics.index')}}">Politics News</a></li>
									<li><a href="{{route('education.index')}}">Edication News</a></li>
									<li><a href="{{route('recreation.index')}}">Recreation News</a></li>
									<li><a href="{{route('final.index')}}">Final News</a></li>

								</ul><!-- /.submenu -->
							</li>
						
						</ul><!-- /.menu -->
					</nav><!-- /nav -->
				</div><!-- /.col-md-9 -->
				<div class="col-md-3">
					<div class="search-wrap">
						<div class="search-icon"></div><!-- //mobile search button -->
						<form method="post" action="{{route('search.news')}}" id="searchform" class="search-form"  role="search">
						{{csrf_field()}}
							<input type="text" id="s" placeholder="Search" name="tag" class="search-field" value="{{Request::old('tag')}}">
							<input type="submit" value="&#xf002;" id="searchsubmit" class="search-submit">
							<a class="search-close" href="#"><i class="fa fa-times-circle"></i>hi</a>
						</form>
					</div><!-- /.search-wrap -->
				</div><!-- /.col-md-3 -->
		    </div><!-- /.row -->
		 </div><!-- /.container -->
		</div><!-- /.header-wrap -->
	</header>
