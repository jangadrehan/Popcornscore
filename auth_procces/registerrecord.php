<?php
include ('../db_connection.php');

if (isset ($_POST['submit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    $select1 = mysqli_query($conn,"SELECT * FROM users WHERE username='".$username."' " );
    $select2 = mysqli_query($conn,"SELECT * FROM users WHERE email='".$email."' " );

  
    $count= mysqli_num_rows($select1);
    $count2= mysqli_num_rows($select2);
    if ($count > 0)
    {
         session_start();
         echo"<script> window.location.href='../register.php'</script>";
         $_SESSION['message'] ='Username Already Taken';
         $_SESSION['message_type'] = 'danger';
    }
    elseif($count2 > 0)
    {   
        session_start();
        $_SESSION['message'] ='Email Already Taken';
        $_SESSION['message_type'] = 'warning';
        echo"<script> window.location.href='../register.php'</script>";

    }
    
    else
    {
        if ($password== $cpassword)
        {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $insert_data=mysqli_query($conn,"INSERT INTO users (username,email,password)
            VALUES ('".$username."','".$email."','".$hash."')");
            echo"<script> window.location.href='../login.php'</script>";
        } 
    }
}
?>