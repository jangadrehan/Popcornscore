<?php
include('../db_connection.php');

$movie_id = $_GET['id'] ?? null;
if (!$movie_id) {
    die("No movie ID provided.");
}

if (isset($_POST['submit'])) {
    $moviename = mysqli_real_escape_string($conn, $_POST['moviename']);
    $details = $_POST['details'];
    $director = $_POST['director'];
    $trailer = $_POST['trailer'];
    $wiki = $_POST['wiki'];
    $producer = $_POST['producer'];
    $actors = $_POST['actors'];

    // Handle image if uploaded
    $photoUpdated = false;
    if (!empty($_FILES['photo']['name'])) {
        $imageName = $_FILES['photo']['name'];
        $imageTmp = $_FILES['photo']['tmp_name'];
        $uploadDir = __DIR__ . '/uploads/' . $moviename;

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $photoPath = "$uploadDir/$imageName";
        move_uploaded_file($imageTmp, $photoPath);
        $photoToSave = "uploads/$moviename/$imageName";
        $photoUpdated = true;
    }

        // ✅ Poster upload handling
    $poster_sql = "";  // will hold poster update part if needed
    $posterUpdated = false;
    if (!empty($_FILES['poster']['name'])) {
        $posterName   = basename($_FILES['poster']['name']);
        $uniquePoster = time() . "_" . $posterName;

        $movieFolder = __DIR__ . '/uploads/' . $moviename;
        if (!file_exists($movieFolder)) {
            mkdir($movieFolder, 0755, true);
        }

        $posterPath = 'uploads/' . $moviename . '/' . $uniquePoster;
        $posterFullPath = $movieFolder . '/' . $uniquePoster;
        $posterUpdated = true;

        $posterType = strtolower(pathinfo($posterPath, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg','jpeg','png','gif'];

        $checkPoster = getimagesize($_FILES['poster']['tmp_name']);
        if ($checkPoster !== false && in_array($posterType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['poster']['tmp_name'], $posterFullPath)) {
                $poster_sql = ", poster = '$posterPath'";
            }
        }
    }

    // Update movie
    if ($photoUpdated) {
        $sql = "UPDATE movie SET moviename=?, details=?, producer=?, trailer=?, wiki=?, director=?, photo=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $moviename, $details, $producer, $trailer, $wiki, $director, $photoToSave, $movie_id);
    } else if ($posterUpdated) {
        $sql = "UPDATE movie SET moviename=?, details=?, producer=?, trailer=?, wiki=?, poster=?, director=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $moviename, $details, $producer, $trailer, $wiki, $posterPath, $director, $movie_id);
    } else {
        $sql = "UPDATE movie SET moviename=?, details=?, producer=?, trailer=?, wiki=?, director=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $moviename, $details, $producer, $trailer, $wiki, $director, $movie_id);
    }

    $stmt->execute();

// Update or insert cast members
$cast_ids = $_POST['cast_ids'] ?? [];
$actors = $_POST['actors'] ?? [];
$actor_images = $_FILES['actor_images'] ?? [];

foreach ($actors as $index => $actor_name) {
    $actor_id = $cast_ids[$index] ?? null;
    $actor_name = trim($actor_name);
    $new_image = $actor_images['name'][$index];
    $tmp_image = $actor_images['tmp_name'][$index];
    $uploaded_path = '';

    // Set up directory for cast images
    $cast_folder = "uploads/" . $moviename . "/cast/";
    if (!file_exists($cast_folder)) {
        mkdir($cast_folder, 0777, true);
    }

    if (!empty($new_image)) {
        $filename = time() . "_$index_" . basename($new_image);
        $uploaded_path = $cast_folder . $filename;
        move_uploaded_file($tmp_image, $uploaded_path);
    }

    if ($actor_id) {
        // Update existing cast
        if ($uploaded_path) {
            $sql = "UPDATE cast SET name = ?, image = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $actor_name, $uploaded_path, $actor_id);
        } else {
            $sql = "UPDATE cast SET name = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $actor_name, $actor_id);
        }
    } else {
        // Insert new cast
        $sql = "INSERT INTO cast (name, image, ref_id, ref_type) VALUES (?, ?, ?, 'movie')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $actor_name, $uploaded_path, $movie_id);
    }

    $stmt->execute();
}
    echo "<script>alert('Movie updated successfully.'); window.location.href='listmovies.php';</script>";
}
