
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Iustitia</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, 
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    /> -->
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="user/css/style_chgpwd.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="user/css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- /google fonts-->
    <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
</head>


<body>
    <h1>Iustitia</h1>
    <div class=" w3l-login-form">
        <h2>Login Here</h2>
        <form action="/changepwd" method="post" id="changepwd" name="changepwd">
        @csrf
        <input type="text" name="email" class="form-control" value="{{Session::get('email')}}" disabled>
            <div class=" w3l-form-group">
                <label>Current Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" name="cupass" class="form-control" placeholder="Your current password" required />
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>New Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" name="pass" class="form-control" placeholder="Your new password" required />
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Confirm Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" name="conpass" class="form-control" placeholder="Confirm password" required />
                </div>
            </div>
            <?php
//Session::get('email');
$sess=session()->get('email');

?>
            <input type="hidden" name="email" value="<?php echo $sess ?>"/>
            <button type="submit">Login</button>
        </form>
        
    </div>
    <footer>
        <p class="copyright-agileinfo"> All Rights Reserved | Design by Sulu Kurian</p>
    </footer>
    <script src="{{ asset('js/validate/jquery.js') }}"></script>
    <script src="{{ asset('js/validate/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validate/additional-methods.min.js') }}"></script>
	<script src="user/js/validations.js"></script> 
</body>

</html>