<!DOCTYPE html>
<html>

<?php include("common/header.php");?>

<body class="theme-blue">
<!-- Page Loader -->
<div class="page-loader-wrapper">
	<div class="loader">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<p>Please wait...</p>
	</div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<?php include("common/sidebar.php");?>

<section class="content home">
	<div class="container-fluid">
		<div class="block-header">
			<h2>List Of Movies</h2>
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="addmovie.php">Add Movie</a></li>			
				<li class="breadcrumb-item active">Dashboard</li>
			</ul>
		</div>
 <!-- Hover Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">
   
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>MOVIE NAME</th>
                                    <th>PHOTO</th>
									<th>DIRACTOR</th>
                                    <th>PRODUCER</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>                         		
							<?php
		          					$conn = mysqli_connect("localhost","root","","popcornscore");
			          				$sql="SELECT * FROM movie";
			          				$result=$conn->query($sql);
			          				while ($row=$result->fetch_assoc()){  
								 ?>	
                                <tr>
                                    <th scope="row"><?= $row['id'];?></th>
                                    <td><?= $row['moviename'];?></td>
                                    <td>                                              
                                        <a href="../details.php?id=<?= $row['id'];?>">
                                        <img src="<?= $row['photo'];?>" height="100" width="100" alt="profile picture"></a></td>
									<td><?= $row['director'];?> </td> 
                                    <td><?= $row['producer'];?></td>
                                    <td>
                                        <form action="edit_movies.php?id=<?= $row['id'];?>" method="POST">
                                            <button type="submit" name="button" class="badge-primary"><i class="fa fa-pencil-square-o"></i></button>
                                        </form>
                                        <form action="deletemovies.php?id=<?= $row['id'];?>" method="POST">
                                            <button type="submit" name="button" class="badge-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
						     <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Hover Rows --> 
	</div>
</section>

  
<!-- Jquery Core Js --> 
<script src="../public/backend/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="../public/backend/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js --> 

<script src="../public/backend/plugins/jquery-sparkline/jquery.sparkline.min.js"></script> <!-- Sparkline Plugin Js --> 
<script src="../public/backend/bundles/flotscripts.bundle.js"></script><!-- Flot Charts Plugin Js --> 
<script src="../public/backend/bundles/morrisscripts.bundle.js"></script><!-- Flot Charts Plugin Js --> 

<script src="../public/backend/plugins/jquery-knob/jquery.knob.min.js"></script> <!-- Jquery Knob Plugin Js --> 
<script src="../public/backend/bundles/jvectormapscripts.bundle.js"></script><!-- JVectorMap Plugin Js --> 

<script src="../public/backend/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
<script src="../public/backend/js/pages/index.js"></script> 
<script src="../public/backend/js/pages/charts/sparkline.js"></script> 
<script src="../public/backend/js/pages/maps/jvectormap.js"></script> 
<script src="../public/backend/js/pages/charts/jquery-knob.js"></script>
</body>
</html>