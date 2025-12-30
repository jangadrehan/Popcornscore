<?php
// Get current file name
$current_page = basename($_SERVER['PHP_SELF']); 
?>

<!-- Top Bar -->
<nav class="navbar clearHeader">
	<div class="col-12">
		<div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="index.php">Popcornscore<img class="logo" src="<?php echo BASE_URL; ?>public/backend/images/logo.svg" alt="profile img"></a>  </div>
		
		<ul class="nav navbar-nav navbar-right">
<?php  include('common/message.php') ?>
			<li><a href="../auth_procces/logout.php" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a></li>
			<li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-sort-amount-desc"></i></a></li>
		</ul>
	</div>
</nav>
<!-- #Top Bar --> 
<!--Side menu and right menu -->
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar"> 
	<!-- Menu -->
	<div class="menu">
		<ul class="list">
			<li> 
				<!-- User Info -->
				<div class="user-info">
					<div class="admin-image"> <img src="<?php echo BASE_URL; ?>public/backend/images/sm/avatar1.jpg" alt="profile img"> </div>
					<div class="admin-action-info"> <span>Welcome</span>
						<h3>Admin</h3>
						<ul>
							<li><a data-placement="bottom" title="Go to Contact" href="../contactus.php"><i class="zmdi zmdi-email"></i></a></li>
							<li><a data-placement="bottom" title="Go to Profile" href="../profile.php"><i class="zmdi zmdi-account"></i></a></li>
							<li><a data-placement="bottom" title="Logout" href="../auth_procces/logout.php" ><i class="zmdi zmdi-sign-in"></i></a></li>
						</ul>
					</div>
				</div>
				<!-- #User Info --> 
			</li>
			<li class="header">MAIN NAVIGATION</li>
			<li  class="<?= ($current_page == 'index.php') ? 'active open' : '' ?>"> <a href="index.php" class="menu-toggle"><i class="zmdi zmdi-home"></i><span>Dashnoard</span> </a>
			</li>
			<li  class="<?= ($current_page == 'addmovie.php' || $current_page == 'listmovies.php') ? 'active open' : '' ?>"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-delicious"></i><span>Movies</span> </a>
				<ul class="ml-menu">
					<li  class="<?= ($current_page == 'addmovie.php') ? 'active' : '' ?>"><a href="addmovie.php">AddMovies</a></li>
					<li  class="<?= ($current_page == 'listmovies.php') ? 'active' : '' ?>"><a href="listmovies.php">List Movies</a></li>
				</ul>
			</li>
			<li  class="<?= ($current_page == 'addtvshow.php' || $current_page == 'listtvshows.php') ? 'active open' : '' ?>"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-delicious"></i><span>Tv Shows</span> </a>
				<ul class="ml-menu">
					<li  class="<?= ($current_page == 'addtvshow.php') ? 'active' : '' ?>"> <a href="addtvshow.php">Add TvShow</a></li>
					<li  class="<?= ($current_page == 'listtvshows.php') ? 'active' : '' ?>"> <a href="listtvshows.php">List Of TvShows</a></li>
				</ul>
			</li>
			<li class="<?= ($current_page == 'moviereviews.php' || $current_page == 'tvshowreviews.php') ? 'active open' : '' ?>"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-delicious"></i><span>Reviews</span> </a>
				<ul class="ml-menu">
					<li   class="<?= ($current_page == 'moviereviews.php') ? 'active' : '' ?>"> <a href="moviereviews.php">Movies Reviews</a></li>
					<li   class="<?= ($current_page == 'tvshowreviews.php') ? 'active' : '' ?>"> <a href="tvshowreviews.php">TvShows Reviews</a></li>
				</ul>
			</li>
			<li class="<?= ($current_page == 'allusers.php') ? 'active open' : '' ?>"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-delicious"></i><span>Users</span> </a>
				<ul class="ml-menu">
					<li   class="<?= ($current_page == 'allusers.php') ? 'active' : '' ?>"> <a href="allusers.php">All Users</a></li>
				</ul>
			</li>
			<li class="<?= ($current_page == 'contact_messages.php') ? 'active open' : '' ?>"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-delicious"></i><span>Feedbacks</span> </a>
				<ul class="ml-menu">
					<li   class="<?= ($current_page == 'contact_messages.php') ? 'active' : '' ?>"> <a href="contact_messages.php">All Messages</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- #Menu --> 
</aside>
<!-- #END# Left Sidebar --> 
<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane in active" id="settings">
            <div class="slim-scroll">
                <div class="card">
                    <div class="header">
                        <h2>Color OPTIONS</h2>
                    </div>
                    <div class="body">
                        <ul class="choose-skin m-b-0">
                            <li data-theme="purple">
                                <div class="purple"></div>
                            </li>
                            <li data-theme="blue" class="active">
                                <div class="blue"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                            </li>
                            <li data-theme="blush">
                                <div class="blush"></div>
                            </li>
                        </ul>
                        <ul class="list-unstyled m-b-0 theme-light-dark m-t-15">
                            <li>
                                <div class="t-dark">Dark</div>
                            </li>
                            <li>
                                <div class="t-light">Light</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<!-- #END# Right Sidebar --> 