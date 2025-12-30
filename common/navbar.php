
<!-- Navbar Start -->
 <?php $current_page = basename($_SERVER['PHP_SELF']); ?>


      <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar bg-black">
        <?php  include('common/message.php') ?>
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
            </button>
            <a href="index.php" class="navbar-brand"><img src="<?php echo BASE_URL; ?>public/frontend/img/my-logo.PNG" height="70" width="30" alt=""></a>
          </div>
          <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mx-auto ">
             <li class="nav-item <?= ($current_page == 'index.php') ? 'active' : '' ?>">
                <a class="nav-link" href="index.php">
                  📊Home
                </a>
              </li>
              <li class="nav-item <?= ($current_page == 'movies.php') ? 'active' : '' ?>">
                <a class="nav-link" href="movies.php">
                  🎬Movies
                </a>
              </li>
              <li class="nav-item <?= ($current_page == 'tvshow.php') ? 'active' : '' ?>">
                <a class="nav-link" href="tvshow.php">
                  📺Tv Shows
                </a>
              </li>
                <?php if (!isset($_SESSION['user_id'])): ?>
              <li class="nav-item <?= ($current_page == 'login.php') ? 'active' : '' ?>">
                <a class="nav-link" href="login.php">
                  Login
                </a>
              </li>
              <?php endif; ?> 
            </ul>
            <ul>
            <?php if (isset($_SESSION['user_id'])): ?>
            <li class="nav-item <?= ($current_page == 'auth_procces/logout.php') ? 'active' : '' ?>">
               <a class="nav-link" href="auth_procces/logout.php">
               <img src="public/frontend/img/logout.svg" width="35" height="35" alt="">       
                </a>
            </li>
            <?php endif; ?>
            </ul>
            <ul>
            <?php if (isset($_SESSION['user_id'])): ?>
              <li class="nav-item">
                <a class="nav-link" href="profile.php">
                 <img src="public/frontend/img/user.svg" width="35" height="35" alt="">
                 </a>
              </li>
            <?php endif; ?>
            </ul>
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="mobile-menu">
          <li>
            <a class="page-scrool" href="index.php">Home</a>
          </li>
          <li>
            <a class="page-scrool" href="movies.php">Movies</a>
          </li>
          <li>
             <a class="page-scroll" href="tvshow.php">TvShows</a>
          </li>
                <?php if (!isset($_SESSION['user_id'])): ?>
              <li class="nav-item">
                <a class="nav-link" href="login.php">
                  Login
                </a>
              </li>
              <?php endif; ?> 
          <li>
            <?php if (isset($_SESSION['user_id'])): ?>
            <a class="page-scroll" href="auth_procces/logout.php">
                <img src="public/frontend/img/logout.svg" width="35" height="35" alt="">
            </a>
          </li>
            <?php endif; ?>
          <li>
            <?php if (isset($_SESSION['user_id'])): ?>
            <a class="page-scroll" href="profile.php">
                 <img src="public/frontend/img/user.svg" width="35" height="35" alt="">
            </a>
          </li>
            <?php endif; ?>
        </ul>
        <!-- Mobile Menu End -->

      </nav>
      <!-- Navbar End -->
