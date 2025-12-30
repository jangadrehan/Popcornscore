<?php session_start();?>
<html>
    <?php include('common/header.php'); 
    if (!isset($_SESSION['user_id'])){
			echo "<script>window.location.href='login.php'</script>";
		}
    $user_id = intval($_SESSION['user_id']);


// 1. Fetch user profile info
$conn = mysqli_connect("localhost","root","","popcornscore");
$user_sql = "SELECT id, username, email, photo, password
             FROM users 
             WHERE id = ?";
$stmt = $conn->prepare($user_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_result = $stmt->get_result();
$user = $user_result->fetch_assoc();

    ?>
<script>
function toggleEdit() {
  let view = document.getElementById("profile-view");
  let edit = document.getElementById("profile-edit");

  if (view.style.display === "none") {
    view.style.display = "block";
    edit.style.display = "none";
  } else {
    view.style.display = "none";
    edit.style.display = "block";
  }
}
</script>

   <body>
     <?php include('common/navbar.php'); ?>
     <?php  include('common/message.php') ?>
<hr>
    <!-- Event Slides Section Start -->
<section id="event-slides" class="section-padding">
  <!-- View Profile -->
  <div class="container" id="profile-view">
    <div class="row">
      <div class="col-12">
        <div class="section-title-header text-center">
          <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Your Profile</h1>
        </div>
      </div>

<div class="col-md-6 col-lg-6 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
  <div class="image text-center">
    <img class="img-fluid rounded-circle" 
         src="<?= htmlspecialchars($user['photo']) ?>" 
         alt="Profile Picture">
  </div>
</div>


      <div class="col-md-6 col-lg-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.3s">
        <h2 class="intro-title">Details :</h2>
        <ul class="list-specification">
          <li><h5><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></h5></li>
          <li><h5><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></h5></li>
          <li><h5><strong>Password:</strong> <?= htmlspecialchars($user['password']) ?></h5></li>
        </ul>
        <button class="btn btn-primary btn-raised waves-effect mt-3" onclick="toggleEdit()">Edit</button>
      </div>
    </div>
  </div>

  <!-- Edit Profile -->
  <div class="container" id="profile-edit" style="display:none;">
    <div class="row">
      <div class="col-12">
        <div class="section-title-header text-center">
          <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Edit Profile</h1>
        </div>
      </div>

      <div class="col-md-6 col-lg-6 col-xs-12">
        <div class="video">
          <img class="img-fluid" src="<?= htmlspecialchars($user['photo']) ?>" alt="Profile Picture">
        </div>
      </div>

      <div class="col-md-6 col-lg-6 col-xs-12">
        <form action="update_profile.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $user['id'] ?>">
        
          <div class="form-group">
            <label><strong>Username:</strong></label>
            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user['username']) ?>" required>
          </div>

          <div class="form-group">
            <label><strong>Email:</strong></label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
          </div>

          <div class="form-group">
            <label><strong>Password:</strong></label>
            <input type="password" name="password" class="form-control" value="<?= htmlspecialchars($user['password']) ?>" required>
          </div>

          <div class="form-group">
            <label><strong>Profile Picture:</strong></label>
            <input type="file" name="photo" class="form-control" >
          </div>

          <button type="submit" class="btn btn-success btn-raised waves-effect">Save</button>
          <button type="button" class="btn btn-secondary btn-raised waves-effect" onclick="toggleEdit()">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</section>
    <!-- Event Slides Section End -->

 <!-- content Section Start -->
    <section id="blog" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Your Movies Watchlist</h1>
              <p class="wow fadeInDown" data-wow-delay="0.2s">Global Grand Movies on Digital Design</p>
            </div>
          </div>
                  <?php
		          		$conn = mysqli_connect("localhost","root","","popcornscore");
			          	$sql = "SELECT 
                  w.user_id,
                  w.ref_id,
                  w.ref_type,
                  m.moviename,
                  m.photo,
                  m.details,
                  m.id,
                  m.director,
                  m.producer
                  FROM watchlist AS w
                  JOIN movie AS m
                  ON w.ref_id = m.id
                  WHERE w.user_id = $user_id
                  AND w.ref_type = 'movie'";
			          	$result=$conn->query($sql);
			          	while ($row=$result->fetch_assoc()){
			             ?>

          <div class="col-lg-3 col-md-6 col-xs-12 section wow fadeInDown" data-wow-delay="0.5s">
            <div class="blog-item">
              <div class="blog-image">
                <a href="details.php?id=<?= $row['id'];?>">
                  <img src="admin/<?= $row['photo']; ?>" height="300" width="300" alt=""  >
                </a>
              </div>
              <div class="descr">
                <div class="tag"><?= $row['moviename'];?></div>
                <h3 class="title">
                  <a href="single-blog.html">
                  </a>
                </h3>
                <div class="meta-tags">
                  <span class="comments">Directed BY| <?= $row['director'];?> </span>
                </div>
                <div class="meta-tags">
                  <span class="comments">Produced BY| <?= $row['producer'];?> </span>
                </div>
                <form action="auth_procces/delete_watchlist.php?ref_id=<?= $row['ref_id'] ?>&ref_type=<?= $row['ref_type'] ?>" method="POST"><button type="submit" class="btn btn-danger btn-raised waves-effect px-4" name="button">Remove</button></form>
              </div>
            </div>
          </div>
      	<?php }?>
    
        </div>
      </div>
    </section>
    <!-- movies Section End -->

     <!-- tvshows Section Start -->
    <section id="blog" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Your TvShows Watchlist</h1>
              <p class="wow fadeInDown" data-wow-delay="0.2s">Global Grand Movies on Digital Design</p>
            </div>
          </div>
                  <?php
		          		$conn = mysqli_connect("localhost","root","","popcornscore");
			          	$sql = "SELECT 
                  w.user_id,
                  w.ref_id,
                  w.ref_type,
                  t.showname,
                  t.photo,
                  t.details,
                  t.id,
                  t.director,
                  t.producer
                  FROM watchlist AS w
                  JOIN tvshow AS t
                  ON w.ref_id = t.id
                  WHERE w.user_id = $user_id
                  AND w.ref_type = 'tvshow'";
			          	$result=$conn->query($sql);
			          	while ($row=$result->fetch_assoc()){
			             ?>

          <div class="col-lg-3 col-md-6 col-xs-12 section wow fadeInDown" data-wow-delay="0.5s">
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
                  <span class="comments">Directed BY| <?= $row['director'];?> </span>
                </div>
                <div class="meta-tags">
                  <span class="comments">Produced BY| <?= $row['producer'];?> </span>
                </div>
                <form action="auth_procces/delete_watchlist.php?ref_id=<?= $row['ref_id'] ?>&ref_type=<?= $row['ref_type'] ?>" method="POST"><button type="submit" class="btn btn-danger btn-raised waves-effect px-4" name="button">Remove</button></form>
              </div>
            </div>
          </div>
      	<?php }?>
         
        </div>
      </div>
    </section>
    <!-- tvshows Section End -->
   
<?php include('common/footer.php'); ?>
</body>
</html>
