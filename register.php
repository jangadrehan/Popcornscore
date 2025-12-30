<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Popcorn Score</title>
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Custom Css -->
<link href="public/backend/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="public/backend/css/main.css" rel="stylesheet">
<link href="public/backend/css/authentication.css" rel="stylesheet">

<!-- choose a theme from css/themes instead of get all themes -->
<link href="public/backend/css/themes/all-themes.css" rel="stylesheet" />
</head>


<body class="theme-blue" id="authentication">
<div class="authentication">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xl-9 col-lg-8 col-md-12 p-l-0">
                <div class="l-detail">
                    <h5 class="position">Welcome</h5>
                    <h1 class="position">Popcorn Score<img src="public/backend/images/logo.svg" alt="profile img"></h1>
                    <h3 class="position">Sign in to start your session</h3>
                    <p class="position">The Popcorenscore is a place thaat you can review your favarotie movies & tvshows.</p>                            
                    <ul class="list-unstyled l-menu">
                        <li><a href="contactus.php">Contact Us</a></li>                                
                        <li><a href="aboutus.php">About Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 p-r-0">

                <div class="card">
  <?php  include('common/message.php') ?>

                    <h4 class="l-login">Register
                        <div class="msg">Register a new membership</div>
                    </h4>
                    <form action="auth_procces/registerrecord.php" class="col-md-12" id="" method="POST" onsubmit="return validatePassword()">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" required>
                                <label class="form-label">Enter Name</label>
                                <span id="UsernaeError" class="error"></span>

                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="email" class="form-control" name="email" required>
                                <label class="form-label">Email Address</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <span id="passwordError" class="d-block text-start"></span>
                                <input type="password" id="password" class="form-control" name="password" onkeyup= "validatePassword()" required>
                                <label class="form-label">Password</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <span id="confirmPasswordError" class="d-block text-start"></span>
                                <input type="password" id="cpassword" class="form-control" name="cpassword" onkeyup= "validatePassword()" required>
                                <label class="form-label">Confirm Password</label>
                            </div>


                        <div class="text-left"> 
                         <button type="submit" name="submit" class="btn btn-primary btn-raised waves-effect">Sign In</button>
                        </div>
                    </form>
                     <script>
      function validatePassword()  {

            var password = document.getElementById("password").value;
            var confirm_Password = document.getElementById("cpassword").value;
            
            var isValid = true;
            
            if(password){
              if (password.length < 8) {
                document.getElementById("passwordError").style.color = 'red';
                document.getElementById('passwordError').innerHTML = 'Must be 8 char';
                isValid = false;
              } else {
                document.getElementById('passwordError').innerHTML = '';
                isValid = true;
              }
  
              if (confirm_Password && confirm_Password !== password) {
                document.getElementById("confirmPasswordError").style.color = 'red';
                document.getElementById('confirmPasswordError').innerHTML = '☒ Passwords do not match';
                return isValid;
              } else {
                document.getElementById('confirmPasswordError').innerHTML = '';
                isValid = true;
              }
            }
    }        
    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js --> 
<script src="public/backend/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="public/backend/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="public/backend/plugins/sketch/sketch.min.js"></script><!-- sketch Animation Js --> 

<script src="public/backend/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
<script src="public/backend/js/pages/authentication/sketch.js"></script><!-- sketch Js --> 
</body>
</html>
