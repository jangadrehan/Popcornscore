<?php
include ('../db_connection.php');
session_start(); // Starting session once at the top

// Geting data from login form
$email = $_POST['email'];
$password = $_POST['password'];

// Lookup user in database
$select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
$count = mysqli_num_rows($select);

if ($count > 0) {
    $row = $select->fetch_assoc();
    $hashed_password = $row['password'];

    if (password_verify($password, $hashed_password)) {
        // ✅ Store the user ID in session
        $_SESSION['user_id'] = $row['id'];
                if($row['admin'] == 0){
                    $_SESSION['message'] = 'Login Successful!!!';
                    $_SESSION['message_type'] = 'success';
        }else{
                     $_SESSION['message'] = 'Wellcome Admin!!!';
                     $_SESSION['message_type'] = 'success';

        }


        if($row['admin']==0){
            echo "<script>window.location.href='../index.php'</script>";
        }
        else{
            echo "<script>window.location.href='../admin/index.php'</script>";
        }
        exit;
    } else {
        $_SESSION['message'] = 'Invalid credentials!!!';
        $_SESSION['message_type'] = 'danger';
        echo "<script>window.location.href='../login.php'</script>";
        exit;
    }
} else {
    $_SESSION['message'] = 'User not Found!!!';
    $_SESSION['message_type'] = 'warning';
    echo "<script>window.location.href='../login.php'</script>";
    exit;
}
?>
