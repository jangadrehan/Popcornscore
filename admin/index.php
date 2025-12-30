<?php session_start();
   if (!isset($_SESSION['user_id'])){
			echo "<script>window.location.href='../login.php'</script>";
		}
?>
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

<!-- main content -->
<section class="content home">
	<div class="container-fluid">
		<div class="block-header">
			<h2>Dashboard</h2>
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>			
				<li class="breadcrumb-item active">Dashboard</li>
			</ul>
		</div>
 <!-- 1st start -->
<?php
$conn = mysqli_connect("localhost", "root", "", "popcornscore");

// 1. Total Movies
$moviesQuery = "SELECT COUNT(*) AS total_movies FROM movie";
$moviesResult = $conn->query($moviesQuery);
$totalMovies = $moviesResult->fetch_assoc()['total_movies'];

// 2. Total TV Shows
$tvQuery = "SELECT COUNT(*) AS total_tvshows FROM tvshow";
$tvResult = $conn->query($tvQuery);
$totalTvShows = $tvResult->fetch_assoc()['total_tvshows'];

// 3. Total Reviews
$reviewQuery = "SELECT COUNT(*) AS total_reviews FROM reviews";
$reviewResult = $conn->query($reviewQuery);
$totalReviews = $reviewResult->fetch_assoc()['total_reviews'];

// 4. Total Users
$userQuery = "SELECT COUNT(*) AS total_users FROM users";
$userResult = $conn->query($userQuery);
$totalUsers = $userResult->fetch_assoc()['total_users'];

// Movies & TV Shows share same base (total content)
$totalContent = $totalMovies + $totalTvShows;
$movieProgress = $totalContent > 0 ? round(($totalMovies / $totalContent) * 100) : 0;
$tvProgress    = $totalContent > 0 ? round(($totalTvShows / $totalContent) * 100) : 0;

// Reviews per user (average % of reviews per user)
$reviewProgress = $totalUsers > 0 ? round(($totalReviews / $totalUsers) * 100) : 0;

// Users progress (let’s assume target = 1000 users for demo)
$targetUsers = 1000;
$userProgress = round(($totalUsers / $targetUsers) * 100);
if ($userProgress > 100) $userProgress = 100; // max cap
?>


		<div class="row clearfix">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="card">
					<a href="listmovies.php">
					<div class="body">
						<h3 class="m-t-0"><?= $totalMovies; ?></h3>
						<p class="text-muted">Total Movies</p>
						<div class="progress">
							<div class="progress-bar l-green" style="width: <?= $movieProgress; ?>%;"></div>
						</div>
						<small><?= $movieProgress; ?>% of total content</small>				
					</div>		
					</a>					
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="card">
					<a href="listtvshows.php">
					<div class="body">
						<h3 class="m-t-0"><?= $totalTvShows; ?></h3>
						<p class="text-muted">Total TV Shows</p>
						<div class="progress">
							<div class="progress-bar l-green" style="width: <?= $tvProgress; ?>%;"></div>
						</div>
						<small><?= $tvProgress; ?>% of total content</small>							
					</div>	
					</a>						
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="card">
					<a href="moviereviews.php">
					<div class="body">
						<h3 class="m-t-0"><?= $totalReviews; ?></h3>
						<p class="text-muted">Total Reviews</p>
						<div class="progress">
							<div class="progress-bar l-green" style="width: <?= $reviewProgress; ?>%;"></div>
						</div>
						<small><?= $reviewProgress; ?> reviews per 100 users</small>							
					</div>			
					</a>				
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="card">
					<a href="allusers.php">
					<div class="body">
						<h3 class="m-t-0"><?= $totalUsers; ?></h3>
						<p class="text-muted">Total Users</p>
						<div class="progress">
							<div class="progress-bar l-green" style="width: <?= $userProgress; ?>%;"></div>
						</div>
						<small><?= $userProgress; ?>% of <?= $targetUsers; ?> target</small>							
					</div>						
					</a>	
				</div>
			</div>
			<div class="col-md-12 col-lg-12">
 <!-- 1st end -->
 <!-- 2st start -->
    <div class="card visitors-map">
        <div class="header">
            <h2>Top Movies</h2>
        </div>

        <div class="blog-itrm">
            <div class="row"> <!-- keep row outside loop -->

                <?php
                $conn = mysqli_connect("localhost","root","","popcornscore");
                $sql = "SELECT * FROM movie WHERE id BETWEEN 76 AND 79";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="single-blog-post card border">
                            <div class="img-holder">
                                <div class="img-post">
              					  <a href="../details.php?id=<?= $row['id'];?>">
                                    <img src="<?= $row['photo']; ?>" alt="Awesome Image" class="img-fluid">
								  </a>
                                </div>
                            </div>
                            <div class="body">
                                <p><?= $row['moviename'];?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
 <!-- 2st end -->
 <!-- 3st start -->
<div class="col-md-12 col-lg-12">
    <div class="card visitors-map">
        <div class="header">
            <h2>Top TvShows</h2>
        </div>

        <div class="blog-itrm">
            <div class="row"> <!-- keep row outside loop -->

                <?php
                $conn = mysqli_connect("localhost","root","","popcornscore");
                $sql = "SELECT * FROM tvshow WHERE id BETWEEN 4 AND 8";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="single-blog-post card border">
                            <div class="img-holder">
                                <div class="img-post">
                				  <a href="../tvshow_details.php?id=<?= $row['id'];?>">
                                    <img src="<?= $row['photo']; ?>" alt="Awesome Image" class="img-fluid">
								  </a>
                                </div>
                            </div>
                            <div class="body">
                                <p><?= $row['showname'];?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
 <!-- 3st end -->

		</div>
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