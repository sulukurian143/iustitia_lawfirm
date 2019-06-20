<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Iustitia</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Awesome Register Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="../registration/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font --> 
<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i&amp;subset=latin-ext" rel="stylesheet">
<!-- //web font -->
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
</head>
<body>
	<!-- main -->
	<div data-vide-bg="../registration/video/awesome">
	<div class="main-w3layouts center-container">
		<a href="/"><h1>Iustitia</h1></a>
		<div class="main-agileinfo">
			<div class="agileits-top"> 
				<form action="{{route('registrations.store')}}" id="signup-form" enctype="multipart/form-data" method="post" > 
                @csrf
					<i class="fa fa-user-o" aria-hidden="true"></i>
					<input class="text" type="text" name="fname" placeholder="First name" required=""><br><br>
					<input class="text" type="text" name="lname" placeholder="Last name" required=""><br><br>
					<input class="text" type="text" name="address" placeholder="Address" required=""><br><br>
					 <b>Type</b><select name="type" required class="text">
                            <option value="sel"  disabled selected>Select your type</option>
                            <option value="Lawyer">Lawyer</option>
                            <option value="User">User</option>
                        </select><br><br><br>
					<b>Proof</b><input class="text" type="file" name="proof" placeholder="Proof" required=""><br><br><br>
                    <b>I am</b><select name="gender" required class="text">
                    <option value="sel"  disabled selected>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                  </select>
                    <br><br><br>
					<select id="country" required name="country" class="text"  >
						<option value="" selected disabled>Select Country</option>
						@foreach($countries as $key => $country)
						<option value="{{$key}}"> {{$country}}</option>
						@endforeach
					</select>
					<select name="state" required name="state" id="state" class="form-control">
                        <option >Select State</option>
                    </select>
					<select name="city" required id="city" class="form-control" >
                        <option >Select City</option>
                    </select>
                    <!-- <input class="text" type="text" name="fname" placeholder="First name" required=""> -->
					<input class="text email" type="email" name="email" placeholder="Email" required=""><br>
					 <input class="text" type="password" name="password" placeholder="Password" required=""><br><br>
                    <input class="text" type="text" name="phone" placeholder="Contact number" required=""><br>
					
					 <!--<input class="text w3lpass" type="password" name="password" placeholder="Confirm Password" required=""> 
					<div class="wthree-text">  
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span> 
						</label>  
						<div class="clear"> </div>
					</div>     -->
					<input type="submit" value="REGISTER">
				</form>
			</div>	 
		</div>	
		<!-- copyright -->
		<div class="w3copyright-agile">
			<h2>© All rights reserved | Design by Sulu Kurian</h2>
		</div>
		<!-- //copyright -->	
	</div>	
	</div>	
	<!-- //main --> 
	<!-- js -->
<script type="text/javascript" src="../registration/js/jquery-2.1.4.min.js"></script>
<script src="../registration/js/jquery.vide.min.js"></script>
<!-- //js -->
<script src="{{ asset('js/validate/jquery.js') }}"></script>
    <script src="{{ asset('js/validate/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validate/additional-methods.min.js') }}"></script>
	<script src="../registration/js/validations.js"></script> 
	<script type="text/javascript">
    $('#country').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('get-state-list')}}?country_id="+countryID,
           success:function(res){               
            if(res){
                $("#state").empty();
                $("#state").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });
    $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('get-city-list')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });
</script>
</body>
</html>