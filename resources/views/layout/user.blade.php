<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Site Title -->
		<title>@yield('title')</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="/user/css/linearicons.css">
			<link rel="stylesheet" href="/user/css/font-awesome.min.css">
			<link rel="stylesheet" href="/user/css/bootstrap.css">
			<link rel="stylesheet" href="/user/css/magnific-popup.css">
			<link rel="stylesheet" href="/user/css/nice-select.css">					
			<link rel="stylesheet" href="/user/css/animate.min.css">
			<link rel="stylesheet" href="/user/css/owl.carousel.css">
			<link rel="stylesheet" href="/user/css/main.css">
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="{{ route('dashboard') }}">Home</a></li>
				          <li><a href="{{ route('biodata') }}">Profile</a></li>
				          <li><a href="contact.html">Contact</a></li>
						  @if (Sentinel::check())
							<li><b><a>Welcome {!! Sentinel::getUser()->first_name !!}</a></b></li>
							<li><a class="ticker-btn" href="{{ route('logout.user') }}">Logout</a></li>
							@else
				          <li><a class="ticker-btn" href="{{route('signup')}}">Signup</a></li>
				          <li><a class="ticker-btn" href="{{route('login')}}">Login</a></li>				          				          
						@endif
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->

@yield('content')

<!-- End footer Area -->		

<script src="/user/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="/user/https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="/user/js/vendor/bootstrap.min.js"></script>			
			<script type="/user/text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="/user/js/easing.min.js"></script>			
			<script src="/user/js/hoverIntent.js"></script>
			<script src="/user/js/superfish.min.js"></script>	
			<script src="/user/js/jquery.ajaxchimp.min.js"></script>
			<script src="/user/js/jquery.magnific-popup.min.js"></script>	
			<script src="/user/js/owl.carousel.min.js"></script>			
			<script src="/user/js/jquery.sticky.js"></script>
			<script src="/user/js/jquery.nice-select.min.js"></script>			
			<script src="/user/js/parallax.min.js"></script>		
			<script src="/user/js/mail-script.js"></script>	
			<script src="/user/js/main.js"></script>	
		</body>
	</html>
