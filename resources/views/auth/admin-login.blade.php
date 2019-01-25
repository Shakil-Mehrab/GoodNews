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
<body style="background:#808080">
<div id="signup-modal" class="popup" style="display">
        <a class="close-modal" href="#"></a>
        <div class="form-title">
            <h4>Admin Sign In</h4>
            <div class="signup">
                No Account Yet? <a href="{{route('signup-page')}}">Signup</a>
            </div>
        </div>
        <div class="login-by">
            <div class="log-face-w">
                <a class="log-facebook" href="#">Login with Facebook</a>
            </div>
            <div class="log-twit-w">
                <a class="log-twitter" href="#">Login with Twitter</a>
            </div>
        </div>
		@include('admin.includes.message')

		<form method="POST" action="{{ route('admin.login.submit') }}" aria-label="{{ __('Login') }}">
            @csrf
           
            <div class="email-wrap">
            <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            </div> 
            <div class="pass-wrap">
            <input id="user-pass2" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" placeholder="Password" required autofocus>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            </div> 
          
            <div class="option-login">
                <div class="remember">
                    <input type="checkbox" name="check4" id="check4" class="css-checkbox" checked="checked"/><label for="check4" class="css-label">Remember me</label>
                </div>
                <div class="forgot">
				<a class="btn btn-link" href="{{ route('admin.password.request') }}">I forgot my password</a>
                </div>
            </div>

            <div class="submit-login">
                <input type="submit" value="Sign In" class="submit" id="submit2" name="submit">
            </div>
        </form>
    </div>

	<!-- Javascript -->
	<script type="text/javascript" src="javascript/jquery.min.js"></script>
	<script type="text/javascript" src="javascript/bootstrap.min.js"></script>
	<script type="text/javascript" src="javascript/jquery.easing.js"></script>
	<script type="text/javascript" src="javascript/matchMedia.js"></script>
	<script type="text/javascript" src="javascript/jquery-waypoints.js"></script>
	<script type="text/javascript" src="javascript/jquery.flexslider.js"></script>
	<script type="text/javascript" src="javascript/jquery.transit.js"></script>
	<script type="text/javascript" src="javascript/jquery.leanModal.min.js"></script>
	<script type="text/javascript" src="javascript/jquery.tweet.min.js"></script>
	<script type="text/javascript" src="javascript/jquery.cookie.js"></script>
	<script type="text/javascript" src="javascript/switcher.js"></script>
	<script type="text/javascript" src="javascript/jquery.doubletaptogo.js"></script>
	<script type="text/javascript" src="javascript/smoothscroll.js"></script>
	<script type="text/javascript" src="javascript/main.js"></script>
</body>


<!-- Mirrored from www.rollthemes.com/demo/html/goodnews/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Jul 2018 16:32:57 GMT -->
</html>
