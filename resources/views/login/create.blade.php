<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Iustitia</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Latest Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	 <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
	<!-- Meta tag Keywords -->

	<!-- css files -->
	<link rel="stylesheet" href="../login/css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="login/css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	 rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<div class="main-bg">
		<!-- title -->
		<a href="/"><h1>Iustitia</h1></a>
		<!-- //title -->
		<!-- content -->
		<div class="sub-main-w3">
			<div class="bg-content-w3pvt">
				<div class="top-content-style">
					<img src="images/user.jpg" alt="" />
				</div>
				<form action="{{route('logins.store')}}" method="POST">
				@csrf
					<p class="legend">Login Here<span class="fa fa-hand-o-down"></span></p>
					<div class="input">
						<input type="email" placeholder="Email" name="email" required />
						<span class="fa fa-envelope"></span>
					</div>
					<div class="input">
						<input type="password" placeholder="Password" name="password" required />
						<span class="fa fa-unlock"></span>
					</div>
					<button type="submit" class="btn submit">
						<span class="fa fa-sign-in"></span>
					</button>
				</form>
				<a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}	</a>			<!--  -->
			</div>
		</div>
		<!-- //content -->
		<!-- copyright -->
		<div class="copyright">
			<h2>&copy; 2019 All rights reserved | Design by
				Sulu Kurian</a>
			</h2>
		</div>
		<!-- //copyright -->
	</div>
</body>

</html>