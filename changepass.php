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
  <?php  include('common/message.php') ?>

<div class="authentication">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xl-9 col-lg-8 col-md-12 p-l-0">
                <div class="l-detail">
                    <h5 class="position">Welcome</h5>
                    <h1 class="position">Popcorn Score<img src="public/backend/images/logo.svg" alt="profile img"></h1>
                    <h3 class="position">Sign in to start your session</h3>
                    <p class="position">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>                            
                    <ul class="list-unstyled l-social position">
                        <li><a href="#"><i class="zmdi zmdi-facebook-box"></i></a></li>                                
                        <li><a href="#"><i class="zmdi zmdi-linkedin-box"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-pinterest-box"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>                            
                        <li><a href="#"><i class="zmdi zmdi-google-plus-box"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-behance"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-dribbble"></i></a></li>                            
                    </ul>
                    <ul class="list-unstyled l-menu">
                        <li><a href="#">Contact Us</a></li>                                
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 p-r-0">
                <div class="card">
                    <h4 class="l-login">Change Password
                        <div class="msg">Register a new Password</div>
                    </h4>
                    <form action="auth_procces/changepassword_procces.php" class="col-md-12" id="" method="POST" onsubmit="return validatePassword()">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" required>
                                <label class="form-label">Userame</label>
                                <span id="UsernaeError" class="error"></span>

                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <span id="passwordError" class="d-block text-start"></span>
                                <input type="password" id="password" class="form-control" name="newpassword" onkeyup= "validatePassword()" required>
                                <label class="form-label">New Password</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <span id="confirmPasswordError" class="d-block text-start"></span>
                                <input type="password" id="cpassword" class="form-control" name="oldpassword" onkeyup= "validatePassword()" required>
                                <label class="form-label">Confirm Password</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                            <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                        </div>

                        <div class="text-left"> 
                         <button type="submit" name="submit" class="btn btn-primary btn-raised waves-effect">Change</button>
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
