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
			<h2>List Of Messages</h2>
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
                                    <th>NAME</th>
									<th>EMAIL ID</th>
									<th>SUBJECT</th>
									<th>MESSAGES</th>
									<th>TIME</th>
                                </tr>
                            </thead>
                            <tbody>                         		
                <?php
		          		$conn = mysqli_connect("localhost","root","","popcornscore");
			          	$sql="SELECT * FROM contact_messages";
			          	$result=$conn->query($sql);
			          	while ($row=$result->fetch_assoc()){
			     ?>
                                <tr>
                                    <th scope="row"><?= $row['id'];?></th>
                                    <td><?= $row['name'];?></td>
                                    <td><?= $row['email'];?></td>
									<td><?= $row['subject'];?> </td>
                                    <td><?= $row['message'];?></td>
                                    <td><?= $row['created_at'];?></td>
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