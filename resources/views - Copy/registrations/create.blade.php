<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="../registration/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../registration/css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <img src="images/signup-bg.jpg" alt="">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="{{route('registrations.store')}}">
                    @csrf
                    
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                           Name <input type="text" class="form-input" name="name" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            Address<input type="text" class="form-input" name="address" id="address" placeholder="Address"/>
                        </div>
                        <div class="form-group">
                        Type<select name="type">
                            <option value="sel"  disabled selected>Select your type</option>
                            <option value="Lawyer">Lawyer</option>
                            <option value="User">User</option>
                        </select></div>
                        <div class="form-group">
                            Email<input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            Password<input type="password" class="form-input" name="password" id="password" placeholder="Enter your password"/>
                        </div>
                        
                        
                        <div class="form-group">
                            Phone number<input type="text" class="form-input" name="phone" id="phone" placeholder="Phone Number"/>
                        </div>
                        

                        <!-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div> -->
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="login" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>


    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   -->
    <script src="{{ asset('js/validate/jquery.js') }}"></script>
    <script src="{{ asset('js/validate/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validate/additional-methods.min.js') }}"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->
    <script src="../registration/js/validations.js"></script> 
    <!-- <script src="../registration/vendor/jquery/jquery.min.js"></script>
    <script src="../registration/js/main.js"></script> -->










    <!-- JS -->
    
    
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>




