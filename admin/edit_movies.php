<!DOCTYPE html>

<html>
<?php include("common/header.php");?>
    <body class="theme-blue">

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<?php include("common/sidebar.php");?>

<?php
include('../db_connection.php');

$movie_id = $_GET['id'] ?? null;
if (!$movie_id) {
    die("No movie ID provided.");
}

$actors = [];
$sql = "SELECT * FROM cast WHERE ref_id = ? AND ref_type = 'movie'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $movie_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $actors[] = $row;
}

// Fetch movie details
$sql = "SELECT * FROM movie WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $movie_id);
$stmt->execute();
$result = $stmt->get_result();
$movie = $result->fetch_assoc();

if (!$movie) {
    die("Movie not found.");
}

// Fetch full actor details (id, name, image)
$cast_sql = "SELECT id, name, image FROM cast WHERE ref_id = ? AND ref_type = 'movie'";
$cast_stmt = $conn->prepare($cast_sql);
$cast_stmt->bind_param("i", $movie_id);
$cast_stmt->execute();
$cast_result = $cast_stmt->get_result();

$cast_list = [];
while ($row = $cast_result->fetch_assoc()) {
    $cast_list[] = $row;
}
?>

<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Edit Movie</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="listmovies.php">List Of Movies</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
        </div>
        <div class="card">
            <div class="body">
                <!-- Movie Edit Form -->
<form action="edit_moviesprocess.php?id=<?= $movie_id ?>" method="POST" enctype="multipart/form-data" class="col-md-12">
    <div class="form-group form-float">
        <div class="form-line focused">
            <input class="form-control" name="moviename" type="text" required value="<?= htmlspecialchars($movie['moviename']) ?>" autofocus/>
            <label class="form-label">Enter Movie Name</label>
        </div>
    </div>

    <div class="form-group form-float">
        <div class="form-line focused">
            <input class="form-control" name="director" type="text" required value="<?= htmlspecialchars($movie['director']) ?>" />
            <label class="form-label">Enter Director</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line focused">
            <input class="form-control" name="producer" type="text" required value="<?= htmlspecialchars($movie['producer']) ?>" />
            <label class="form-label">Enter Producer</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line focused">
            <textarea class="form-control" name="details" required><?= htmlspecialchars($movie['details']) ?></textarea>
            <label class="form-label">Enter Details</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line focused">
            <input class="form-control" name="trailer" type="text" required value="<?= htmlspecialchars($movie['trailer']) ?>" />
            <label class="form-label">Enter Url</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line focused">
            <input class="form-control" name="wiki" type="text" required value="<?= htmlspecialchars($movie['wiki']) ?>" />
            <label class="form-label">Enter Wikipidia Url</label>
        </div>
    </div>
    <div class="form-group form-float">
        <label>Current Poster</label>
        <?php if (!empty($movie['poster'])): ?>
            <img src="<?= $movie['poster'] ?>" width="150" alt="poster" style="margin: 10px 0;">
        <?php endif; ?>
    </div>
    <div class="form-group form-float">
        <label>Upload New Poster</label>
        <div class="custom-file">
        <input type="file" class="custom-file-input" name="poster" placeholder="Add File"  id="customFile" required>
        <label class="custom-file-label" for="customFile">Choose poster</label>
        </div>
    </div>
    <div id="actor-fields-wrapper">
        <?php foreach ($actors as $index => $actor): ?>
            <div class="form-group form-float">
                <div class="form-line focused">
                    <input type="hidden" name="cast_ids[]" value="<?= $actor['id'] ?>">
                    <input type="text" class="form-control" name="actors[]"  value="<?= htmlspecialchars($actor['name']) ?>" required>
                    <label class="form-label">Actor Name</label>
                </div>
                <?php if (!empty($actor['image'])): ?>
                    <img src="<?= $actor['image'] ?>" width="100" style="margin: 10px 0;">
                <?php endif; ?>
            </div>
            <input type="file" name="actor_images[]" class="form-control">
        <?php endforeach; ?>
    </div>

    
    <?php if (empty($cast_list)): ?>
        <div class="form-group">
            <label>Actor 1</label>
            <div class="form-line focused">
                <input type="text" class="form-control" name="actors[]"  required />
            </div>
            <input type="file" name="actor_images[]" class="form-control">
        </div>
    <?php endif; ?>

    <!-- Image Preview Section -->
    <div class="form-group">
        <label>Current Movie Poster</label><br>
        <?php if (!empty($movie['photo']) && file_exists($movie['photo'])): ?>
            <img src="<?= $movie['photo'] ?>" alt="Movie Poster" style="max-width: 200px; height: auto; border: 1px solid #ccc; margin-bottom: 10px;">
        <?php else: ?>
            <p>No image available.</p>
        <?php endif; ?>
    </div>

    <div class="form-group form-float">
        <div class="custom-file">
           <input type="file" class="custom-file-input" name="photo" placeholder="Add Poster"  id="customFile" required>
            <label class="custom-file-label" for="customFile">Choose Photo file</label>
        </div>
    </div>

    <button type="submit" name="submit" class="btn btn-primary btn-raised waves-effect">Update Movie</button>
</form> </div>
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