<?php
include ('../db_connection.php');

		if(isset($_POST['button'])) 
		{
			$id = $_GET['id'];
			//echo "hello";

			$delete = mysqli_query($conn,"DELETE FROM `movie` WHERE id='".$id."'");

			echo "<script>window.location.href='listmovies.php'</script>";
		}

?>