<!DOCTYPE HTML>
<!--
	Spatial by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Spatial by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<h1><strong><a href="index.html">Spatial</a></strong> by Templated</h1>
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="{{ route('home.login') }}">Login</a></li>
						<li><a href="elements.html">Elements</a></li>
					</ul>
				</nav>
			</header>

			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Banner -->
			<section id="banner">
				<h2>Complete Your Hosting Order at BossHostBD</h2>
				<p>The Most Affordable WordPress Hosting Platform in Bangladesh</p>
				<ul class="actions">
					<li><a href="#order" class="button special big">Get Started</a></li>
				</ul>
			</section>

			<!-- Main -->

			<section id="main" class="wrapper">
				<div class="container">
						</br>
						<h2><a name="order">Hosting Order Form</a></h2>
						</br>

					

<form action="" class="form-horizontal" method="POST">
{{ csrf_field() }}
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-6">
  <input id="name" name="name" type="text" placeholder="Your name" class="form-control input-md" required="" pattern="^([a-zA-Z\s'-]+\.)*[a-zA-Z\s'-]+$">
  <span class="help-block">Enter your name</span>  
  </div>
</div>
<div class="form-group">
	<label>Enter your New Password</label>
	<input type="password" class="form-control" id="sub-input" placeholder="Enter Your New password" name="password" value="">
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Email">Email</label>  
  <div class="col-md-6">
  <input id="Email" name="email" type="text" placeholder="Your email" class="form-control input-md" required="" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~.-]+@[a-z0-9-]+(\.[a-z0-9-]+)*">
  <span class="help-block">Enter your email</span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="hostingpackage">Select Hosting Plan</label>
  <div class="col-md-6">
    <select id="hostingpackage" name="hostingpackage" class="form-control">
      <option value="1">Cloud Hosting</option>
      <option value="2">Shared Hosting</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="domain">Domain Name</label>  
  <div class="col-md-5">
  <input name="domain" type="text" placeholder="Enter your domain name" class="form-control input-md" required="" pattern="(?:[a-z0-9](?:[a-z0-9-]{0,61}[a-z0-9])?\.)+[a-z0-9][a-z0-9-]{0,61}[a-z0-9]">
  <span class="help-block">Enter full domain name</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone">Phone No</label>  
  <div class="col-md-6">
  <input id="phone" name="phone" type="text" placeholder="Enter your phone no" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Your Address</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="address" name="address">Enter your address</textarea>
  </div>
</div>


<input type="submit" class="button special big">
</form>



				</div>
			</section>


			@if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('message'))
              <div class="error">{{ session('message') }}</div>
			@endif
			

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook"></a></li>
						<li><a href="#" class="icon fa-twitter"></a></li>
						<li><a href="#" class="icon fa-instagram"></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled</li>
						<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
						<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>