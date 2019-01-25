<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->

<!-- Mirrored from www.rollthemes.com/demo/html/goodnews/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Jul 2018 16:30:54 GMT -->
<head>
	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<title>Good News — News &amp; Magazine Template</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link href="{{asset('style/front/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('style/front-style.css')}}" rel="stylesheet">
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Bootstrap  -->

	<!-- Theme Style -->
	<link  type="text/css" href="{{asset('stylesheets/style.css')}}"  rel="stylesheet">

	<!-- Colors -->
	<link  type="text/css" href="{{asset('stylesheets/colors/color1.css')}}" id="colors" rel="stylesheet">
   
	<!-- Animation Style -->
	<link  type="text/css" href="{{asset('stylesheets/animate.css')}}" rel="stylesheet">

	<!-- Google Fonts 
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>-->

	<!-- Favicon and touch icons  -->
	<link href="{{asset('icon/apple-touch-icon-144-precomposed.png')}}" rel="apple-touch-icon-precomposed" sizes="144x144">
	<link href="{{asset('icon/apple-touch-icon-114-precomposed.png')}}" rel="apple-touch-icon-precomposed" sizes="114x114">
	<link href="{{asset('icon/apple-touch-icon-72-precomposed.png')}}" rel="apple-touch-icon-precomposed" sizes="72x72">
	<link href="{{asset('icon/apple-touch-icon-57-precomposed.png')}}" rel="apple-touch-icon-precomposed">
	<link href="{{asset('icon/favicon.png')}}" rel="shortcut icon">
	<!--[if lt IE 9]>
		<script src="javascript/html5shiv.js"></script>
		<script src="javascript/respond.min.js"></script>
	<![endif]-->
    @yield('flink')
</head>
<body>
@include('front.news.nav.nav')	
	<!-- Main -->
	<!-- Main -->
	<section id="main">
		<div class="container">
			<div class="row">	
                   @yield('carousel')
                    <!-- col-md-8 -->
                    <div class="col-md-8">
                    @yield('leftside')
                    </div><!-- /.col-md-8 -->

                    <!-- col-md-4 -->
                    <div class="col-md-4">
                    <div class="sidebar-widget-1">
                    @include('front.news.rightside.sidebar')
                    </div><!-- /.sidebar -->
                </div><!-- /.col-md-4 -->
                
                    <!-- col-md-12 -->
                    @yield('lower')
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>
	<!-- Footer -->
	<footer id="footer">
		<div class="footer-widgets">
			<div class="container">
				<div class="row">
					<div class="col-md-4 gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
						<div class="widget widget-brand">
							<div class="logo logo-footer">
								<a href="#"><img src="images/logo-footer.svg" alt="Good News"></a>
							</div>
							<p>This pays especially well in technology, where you earn a premium for working fast.</p>
						</div><!-- /.widget-brand -->
						<div class="widget widget-social">
							<h5 class="widget-title">Follow Us</h5>
							<div class="social-list">
								<a href="#"><img src="images/facebook.svg" alt="image"></a>
								<a href="#"><img src="images/twitter.svg" alt="image"></a>
								<a href="#"><img src="images/youtube.svg" alt="image"></a>
								<a href="#"><img src="images/dribbble.svg" alt="image"></a>
							</div>
							<a class="email" href="#">hello@youraddress.com</a>
						</div><!-- /.widget-social -->
					</div><!-- /.col-md-4 -->
					<div class="col-md-4 gn-animation" data-animation="fadeInUp" data-animation-delay="0.2s" data-animation-offset="75%">
						<div class="widget widget-twitter">
							<h5 class="widget-title">Twitter</h5>
							<div class="latest-tweets" data-number="3" data-username="envato" data-modpath="twitter/index.html"></div>
						</div><!-- /.widget-twitter -->
					</div><!-- /.col-md-4 -->
					<div class="col-md-2 gn-animation" data-animation="fadeInUp" data-animation-delay="0.4s" data-animation-offset="75%">
						<div class="widget widget-list">
							<h5 class="widget-title">Main</h5>
							<ul class="links-list">
								<li><a href="#">Mustreads</a></li>
								<li><a href="#">Tech</a></li>
								<li><a href="#">Business</a></li>
								<li><a href="#">Entertainment</a></li>
								<li><a href="#">Social Media</a></li>
							</ul>
						</div><!-- /.widget-list -->
					</div><!-- /.col-md-2 -->
					<div class="col-md-2 gn-animation" data-animation="fadeInUp" data-animation-delay="0.6s" data-animation-offset="75%">
						<div class="widget widget-list">
							<h5 class="widget-title">About Us</h5>
							<ul class="links-list">
								<li><a href="#">About Us</a></li>
								<li><a href="#">Our Team</a></li>
								<li><a href="#">Careers </a></li>
								<li><a href="#">Advertise</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div><!-- /.widget-list -->
					</div><!-- /.col-md-2 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.footer-widgets -->
		<div class="footer-copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						&copy; 2014 Good News, Inc.
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div>
	</footer>
   <!-- Go Top -->
	<a class="go-top">
		<i class="fa fa-chevron-up"></i>
	</a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('style/admin/table/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('style/admin/table/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('style/admin/table/js/data-table.js')}}"></script>
    <!-- Javascript -->
	<script type="text/javascript" src="{{asset('javascript/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('javascript/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('javascript/jquery.easing.js')}}"></script>
	<script type="text/javascript" src="{{asset('javascript/matchMedia.js')}}"></script>
	<script type="text/javascript" src="{{asset('javascript/jquery-waypoints.js')}}"></script>
	<script type="text/javascript" src="{{asset('javascript/jquery.flexslider.js')}}"></script>
	<script type="text/javascript" src="{{asset('javascript/jquery.transit.js')}}"></script>
	<script type="text/javascript" src="{{asset('javascript/jquery.leanModal.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('javascript/jquery.tweet.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('javascript/jquery.cookie.js')}}"></script>
	<script type="text/javascript" src="{{asset('javascript/switcher.js')}}"></script>
	<script type="text/javascript" src="{{asset('javascript/jquery.doubletaptogo.js')}}"></script>
	<script type="text/javascript" src="{{asset('javascript/smoothscroll.js')}}"></script>
	<script type="text/javascript" src="{{asset('javascript/main.js')}}"></script>	
<script src="{{asset('style/admin/table/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('style/admin/table/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('style/admin/table/js/data-table.js')}}"></script>
<script src="{{asset('/js/main.js')}}"></script>
@yield('fjs')

<script>
function toggleCommnet(productId){
  $('.comment-form-'+productId).toggleClass('hidden');
        }
function toggleReply(commentId){
  $('.reply-form-'+commentId).toggleClass('hidden');
}
</script>
</body>
<!-- Mirrored from www.rollthemes.com/demo/html/goodnews/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Jul 2018 16:32:57 GMT -->
</html>
