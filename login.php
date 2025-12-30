<?php session_start();?>
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

<!-- adminX You can choose a theme from css/themes instead of get all themes -->
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

                    <div class="card position">
  <?php  include('common/message.php') ?>

                        <h4 class="l-login">Login</h4>
                        <form action="auth_procces/loginrecord.php" class="col-md-12" id="sign_in" method="POST">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" name="email" class="form-control" required>
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" name="password" class="form-control" required>
                                    <label class="form-label">Password</label>
                                </div>
                            </div>
                            <div>
                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-cyan">
                                <label for="rememberme">Remember Me</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-raised waves-effect">Sign In</button>
                            <a href="register.php" class="btn btn-primary btn-raised waves-effect" title="">SIGN UP</a>
                            <div class="text-left"> <a href="changepass.php">Forgot Password?</a> </div>
                        </form>
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
