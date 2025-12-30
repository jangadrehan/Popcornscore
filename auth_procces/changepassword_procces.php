<?php

include ('../db_connection.php');

	if (isset($_POST['submit'])) 
	{
		$username = $_POST['username'];
		$oldpassword = $_POST['oldpassword'];
		$newpassword = $_POST['newpassword'];
        $hashed_password = password_hash($newpassword, PASSWORD_BCRYPT);

        $select1 = mysqli_query($conn,"SELECT * FROM users WHERE username='".$username."' " );

		$count  = mysqli_num_rows($select1);

		if ($count > 0) 
		{	    
       			session_start();
				$update =mysqli_query($conn,"UPDATE users  SET password='".$hashed_password."' WHERE  username='".$username."'");
			    $_SESSION['message'] ='Password Changed';
       			$_SESSION['message_type'] = 'success';
				echo "<script>window.location.href='../login.php'</script>";
		}
		else
		{
       			session_start();
				$_SESSION['message'] ='Enter Valid Username';
       			$_SESSION['message_type'] = 'warning';
				echo "<script>window.location.href='../changepass.php'</script>";
		}

	}

?>