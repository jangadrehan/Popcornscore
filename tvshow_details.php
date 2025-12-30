<?php
session_start();
$user_id = $_SESSION['user_id'] ?? null; // null if guest

include('db_connection.php');
$ref_id = $_GET['id'] ?? null;
$current_user_id = $_SESSION['user_id'] ?? null; 


if (!$ref_id) {
    die("tvshow ID is missing.");
}

$ref_id = $_GET['id']; // tvshow id
$user_id = $_SESSION['user_id'] ?? null; // logged-in user
$ref_type = 'tvshow'; // adjust dynamically if needed

$sql = "SELECT * FROM reviews WHERE ref_id = ? AND ref_type = 'tvshow' AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $ref_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$review = $result->fetch_assoc();

// If user clicked "Update Review"
if (isset($_POST['update_review'])) {
    $rating = $_POST['rating'];
    $coments = $_POST['coments'];

    $sql = "UPDATE reviews SET rating = ?, coments = ? 
            WHERE user_id = ? AND ref_id = ? AND ref_type = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isiis", $rating, $coments, $user_id, $ref_id, $ref_type);

    if ($stmt->execute()) {
        header("Location: tvshow_details.php?id=" . $ref_id); // refresh with updated review
        exit;
    } else {
        echo "Error updating review: " . $stmt->error;
    }
}

// Fetch tvshow details
$stmt = $conn->prepare("SELECT * FROM tvshow WHERE id = ?");
$stmt->bind_param("i", $ref_id);
$stmt->execute();
$tvshow_result = $stmt->get_result();
$tvshow = $tvshow_result->fetch_assoc();

if (!$tvshow) {
    die("tvshow not found.");
}

// Fetch user's rating
$ref_type = 'tvshow'; // adjust dynamically if needed
$user_id = $_SESSION['user_id'] ?? null;
$user_rating = null;

if ($user_id) {
    $query = "SELECT rating FROM reviews WHERE user_id = $user_id AND ref_id = $ref_id LIMIT 1";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $user_rating = $row['rating'];
    }
}

// Fetch cast
$cast_stmt = $conn->prepare("SELECT * FROM cast WHERE ref_id = ? AND ref_type = 'tvshow'");
$cast_stmt->bind_param("i", $ref_id);
$cast_stmt->execute();
$cast_result = $cast_stmt->get_result();
$cast = $cast_result->fetch_all(MYSQLI_ASSOC);
?>

<html>
<?php include('common/header.php'); ?>

<body>
<?php include('common/navbar.php'); ?>
  <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
<!-- Main Carousel Section Start -->
<div id="main-slide" class="carousel slide mt-5" data-ride="carousel" data-interval="false">
  <ol class="carousel-indicators">
    <li data-target="#main-slide" data-slide-to="0" class="active"></li>
  </ol>
  <div class="carousel-inner">

    <!-- First Video -->
<div class="carousel-item active">
    <img src="admin/<?= $tvshow['poster']; ?>"
         alt="Tvshow Poster"
         class="d-block w-100 img-fluid">

    <div class="carousel-caption d-none d-md-block">
        <h1 class="wow fadeInDown heading" data-wow-delay=".4s">
            <?= htmlspecialchars($tvshow['showname']) ?>
        </h1>
        <a href="<?= htmlspecialchars($tvshow['trailer']) ?>"
           class="fadeInLeft wow btn btn-common btn-lg"
           data-wow-delay=".6s">Watch Trailer</a>
        <a href="<?= htmlspecialchars($tvshow['wiki']) ?>"
           class="fadeInRight wow btn btn-border btn-lg"
           data-wow-delay=".6s">Explore More</a>
    </div>
</div>
  </div>
</div>
<!-- Main Carousel Section End -->
 
<!-- JS to autoplay only the active video -->
    </header>
    <!-- Header Area wrapper End -->

<div class="container mt-5">
                 
    <!-- tvshow Info -->
    <div class="row">
        <div class="col-md-4">
            <?php if (!empty($tvshow['photo'])): ?>
                <img src="admin/<?= $tvshow['photo']; ?>" class="img-fluid rounded">
            <?php endif; ?>
        </div>
        <div class="col-md-8">
            <h2><?= htmlspecialchars($tvshow['showname']) ?></h2>
            <h5><strong>Directed by:</strong> <?= htmlspecialchars($tvshow['director']) ?></h5>
            <h5><strong>Produced by:</strong> <?= htmlspecialchars($tvshow['producer']) ?></h5>
            <h6><?= nl2br(htmlspecialchars($tvshow['details'])) ?></h6>
        </div>
    </div>

  <?php
include('db_connection.php');

$tvshow_id = $_GET['id']; // movie or tvshow ID

$star_counts = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0];
$total_reviews = 0;
$total_rating = 0;

// Fetch all reviews for this movie/tvshow
$query = "SELECT rating FROM reviews WHERE ref_id = '$tvshow_id'";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $rating = (int)$row['rating'];
        if ($rating >= 1 && $rating <= 10) {
            $star_counts[$rating]++;
            $total_reviews++;
            $total_rating += $rating;
        }
    }
}

$average_rating = $total_reviews > 0 ? round($total_rating / $total_reviews, 1) : 0;
?>
<hr>
    <!-- Cast Section -->
    <h3>Cast</h3>
    <div class="row">
        <?php foreach ($cast as $actor): ?>
            <div class="col-md-3 text-center mb-4">
                <?php if (!empty($actor['image'])): ?>
                    <img src="admin/<?= $actor['image']; ?>" class="img-fluid rounded-circle" style="height:150px; width:150px; object-fit:cover;">
                <?php endif; ?>
                <p class="mt-2"><?= htmlspecialchars($actor['name']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
<hr>
<div class="rating-summary">
    <h3>⭐<?= $average_rating ?> / 10 </h3>

    <h6>Total Reviews: <?= $total_reviews ?></h6>
<details style="margin-top: 20px;">
    <summary style="cursor: pointer; font-weight: bold; font-size: 16px;">All votes</summary>
    
    <?php for ($i = 10; $i >= 1; $i--): ?>
        <div class="star-bar" style="display: flex; align-items: center; margin: 8px 0;">
            <strong style="width: 40px;"><?= $i ?>★</strong>
            <div class="bar-container" style="flex: 1; background-color: #ccc; height: 10px; border-radius: 4px; margin: 0 10px;">
                <div class="bar-fill" style="height: 10px; width: <?= $star_counts[$i] ?>%; background-color: gold; border-radius: 4px;"></div>
            </div>
            <span><?= $star_counts[$i] ?> votes</span>
        </div>
    <?php endfor; ?>
</details>

</div>
<hr>
<?php if (!$user_rating): ?>
    <h3>Rate this Movie</h3>
    <form action="auth_procces/addreview_process.php?id=<?=$ref_id?>&type=tvshow" method="POST" id="rating-form">
        <div class="star-rating">
                <?php for ($i = 10; $i >= 1; $i--): ?>
                <input type="radio" name="rating" id="star<?= $i ?>" value="<?= $i ?>">
                <label for="star<?= $i ?>">★</label>
            <?php endfor; ?>
        </div>
        <hr>
        <textarea class="form-control" name="coments" placeholder="Add Comment"></textarea>
        <button class="btn btn-primary btn-raised waves-effect" name="button" type="submit">Submit</button>
    </form>
<?php else: ?>
    <div class="review-display" id="review-display">
    <p><strong>Your Rating:</strong> <h2  style="color: #3f8efc;"> <?= htmlspecialchars($review['rating']) ?> ★</h2></p>
    <p><strong>Your Comment:</strong><h5  style="font-size: 24px; color: #3f8efc;"> <?= htmlspecialchars($review['coments']) ?></h5></p>
    <button onclick="toggleEdit()" class="btn btn-warning btn-raised waves-effect">Edit Review</button>
</div>

<!-- Hidden Edit Form -->
<div id="review-edit" style="display:none;">
    <form method="POST">
        <label for="rating">Rating:</label>
<?php echo $review['rating']; ?>
        <div class="star-rating">
            <?php for ($i = 10; $i >= 1; $i--): ?>
                <input type="radio" name="rating" id="star<?= $i ?>" value="<?= $i ?>" <?= ($i == $review['rating']) ? 'checked' : '' ?>>
                <label for="star<?= $i ?>">★</label>
            <?php endfor; ?>
        </div>
        <br>
        <textarea class="form-control" name="coments" required><?= htmlspecialchars($review['coments']) ?></textarea>
        <br>
        <button type="submit" name="update_review" class="btn btn-success btn-raised waves-effect">Update Review</button>
        <button type="button" onclick="toggleEdit()" class="btn btn-secondary btn-raised waves-effect">Cancel</button>
    </form>
</div>

<?php endif; ?>

<hr>
<?php
// Fetch comments
$sql = "SELECT r.coments, r.user_id, u.username
        FROM reviews r
        JOIN users u ON r.user_id = u.id
        WHERE r.ref_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ref_id);
$stmt->execute();
$result = $stmt->get_result();   
?>     
<div class="comments-section" style="margin-top:20px;">
    <h3>Comments</h3>
    <div class="comment-list">   
        <?php while ($row = $result->fetch_assoc()): ?>    
            <div class="comment-item" 
                 style="padding:10px; margin-bottom:8px; border-radius:8px;
                        background-color: <?= ($row['user_id'] == $current_user_id) ? '#21aff1ff' : '#f9f9f9' ?>;">
                <strong style="color:#333;"><?= htmlspecialchars($row['username']) ?></strong>
                <p style="margin:5px 0;"><?= nl2br(htmlspecialchars($row['coments'])) ?></p>

            </div>
        <?php endwhile; ?>
    </div>
</div>
<script>
function toggleEdit() {
    document.getElementById('review-display').style.display =
        document.getElementById('review-display').style.display === 'none' ? 'block' : 'none';
    document.getElementById('review-edit').style.display =
        document.getElementById('review-edit').style.display === 'none' ? 'block' : 'none';
}
</script>
<style>
 .review-display {
    margin-top: 20px;
    padding: 10px 15px;
    background-color: #f0f4ff;
    border-left: 4px solid #3f8efc;
    border-radius: 6px;
    font-family: Arial, sans-serif;
}
        .star-rating {
            direction: rtl;
            display: inline-flex;
            font-size: 2rem;
            user-select: none;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s;
        }
        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #f5c518;
        }
        .rating-summary {
    margin-top: 30px;
    background: #f5f5f5;
    padding: 15px;
    border-radius: 10px;
}
.star-bar {
    display: flex;
    align-items: center;
    margin: 5px 0;
}
.star-bar strong {
    width: 30px;
}
.bar-container {
    background: #ddd;
    height: 10px;
    width: 200px;
    margin: 0 10px;
    border-radius: 5px;
}
.bar-fill {
    background: #ffc107;
    height: 10px;
    border-radius: 5px;
}

    </style>

</div>

</body>
</html>
