<?php session_start();?>
<html>
 <?php include('common/header.php'); 
 
  
    ?>
<body>
  
    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
<?php include('common/navbar.php'); ?>

     <!-- Main Carousel Section Start -->
<div id="main-slide" class="carousel slide mt-5" data-ride="carousel" data-interval="false">
  <ol class="carousel-indicators">
    <li data-target="#main-slide" data-slide-to="0" class="active"></li>
    <li data-target="#main-slide" data-slide-to="1"></li>
    <li data-target="#main-slide" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">

    <!-- First Video -->
    <div class="carousel-item active">
      <div class="embed-responsive embed-responsive-16by9">
        <video class="embed-responsive-item" loop="true" autoplay="true" controls muted>
        <source src="public/frontend/img/bat.mp4" type="video/mp4" />
        </video>
      </div>
      <div class="carousel-caption d-none d-md-block">
              <h1 class="wow fadeInDown heading" data-wow-delay=".4s">The Batman</h1>
              <a href="https://www.youtube.com/embed/mqqft2x_Aa4?autoplay=1&mute=1&loop=1&playlist=mqqft2x_Aa4" class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s">Watch Trailer</a>
              <a href="https://en.wikipedia.org/wiki/The_Batman_(film)" class="fadeInRight wow btn btn-border btn-lg" data-wow-delay=".6s">Explore More</a>
      </div>
    </div>

    <!-- Second Video -->
    <div class="carousel-item">
      <div class="embed-responsive embed-responsive-16by9">
        <video class="embed-responsive-item" loop="true" autoplay="true" controls muted>
        <source src="public/frontend/img/onepiece.mp4" type="video/mp4" />
        </video>
      </div>
      <div class="carousel-caption d-none d-md-block">
              <h1 class="wow fadeInDown heading" data-wow-delay=".4s">One Peiece</h1>
              <a href="https://www.youtube.com/embed/yfeCCnOPqrA?autoplay=1&mute=1&loop=1&playlist=yfeCCnOPqrA" class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s">Watch Trailer</a>
              <a href="https://en.wikipedia.org/wiki/One_Piece_(2023_TV_series)" class="fadeInRight wow btn btn-border btn-lg" data-wow-delay=".6s">Explore More</a>
      </div>
    </div>

    <!-- Third Video -->
    <div class="carousel-item">
      <div class="embed-responsive embed-responsive-16by9">
        <video class="embed-responsive-item" loop="true" autoplay="true" controls muted>
        <source src="public/frontend/img/f1.mp4" type="video/mp4" />
        </video>
      </div>
      <div class="carousel-caption d-none d-md-block">
              <h1 class="wow fadeInDown heading" data-wow-delay=".4s">F1</h1>
              <a href="https://www.youtube.com/embed/KsBNOAAXiCY?autoplay=1&mute=1&loop=1&playlist=KsBNOAAXiCY" class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s">Watch Trailer</a>
              <a href="https://en.wikipedia.org/wiki/F1_(film)" class="fadeInRight wow btn btn-border btn-lg" data-wow-delay=".6s">Explore More</a>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="carousel-control-prev" href="#main-slide" role="button" data-slide="prev">
    <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"></i></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#main-slide" role="button" data-slide="next">
    <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"></i></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- Main Carousel Section End -->

<!-- JS to autoplay only the active video -->
<script>
  var carousel = $('#main-slide');

  carousel.on('slid.bs.carousel', function () {
    carousel.find('iframe').each(function () {
      this.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
    });
    var activeIframe = carousel.find('.carousel-item.active iframe')[0];
    activeIframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
  });

  $(document).ready(function () {
    var firstIframe = carousel.find('.carousel-item.active iframe')[0];
    firstIframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
  });
</script>

    </header>
    <!-- Header Area wrapper End -->

    <!-- content Section Start -->
    <section id="blog" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Our Latest TvShows</h1>
              <p class="wow fadeInDown" data-wow-delay="0.2s">Global Grand Movies on Digital Design</p>
            </div>
          </div>
                          			<?php
		          		$conn = mysqli_connect("localhost","root","","popcornscore");
			          	$sql="SELECT * FROM tvshow";
			          	$result=$conn->query($sql);
			          	while ($row=$result->fetch_assoc()){
			             ?>

          <div class="col-lg-4 col-md-6 col-xs-12 section wow fadeInDown" data-wow-delay="0.4s">
            <div class="blog-item">
              <div class="blog-image">
                <a href="tvshow_details.php?id=<?= $row['id'];?>">
                  <img src="admin/<?= $row['photo']; ?>" height="300" width="300" alt=""  >
                </a>
              </div>
              <div class="descr">
                <div class="tag"><?= $row['showname'];?></div>
                <h3 class="title">
                  <a href="single-blog.html">
                  </a>
                </h3>
                <div class="meta-tags">
                  <form action="auth_procces/watchlist_process.php?id=<?= $row['id'];?>&type=tvshow" method="POST"><button type="submit" class="btn btn-danger btn-raised waves-effect px-4" name="button">Add to Watchlist</button></form>
                  <span class="comments">BY| <?= $row['director'];?> </span>
                </div>
              </div>
            </div>
          </div>
      	<?php }?>
         
        </div>
      </div>
    </section>
    <!-- content Section End -->
     
<?php include('common/footer.php'); ?>
</body>
</html>
