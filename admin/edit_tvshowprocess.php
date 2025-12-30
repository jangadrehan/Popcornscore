<?php
include('../db_connection.php');

$tvshow_id = $_GET['id'] ?? null;
if (!$tvshow_id) {
    die("No tvshow ID provided.");
}

if (isset($_POST['submit'])) {
    $showname = mysqli_real_escape_string($conn, $_POST['showname']);
    $details = $_POST['details'];
    $director = $_POST['director'];
    $producer = $_POST['producer'];
    $trailer = $_POST['trailer'];
    $wiki = $_POST['wiki'];
    $actors = $_POST['actors'];


    // Handle image if uploaded
    $photoUpdated = false;
    if (!empty($_FILES['photo']['name'])) {
        $imageName = $_FILES['photo']['name'];
        $imageTmp = $_FILES['photo']['tmp_name'];
        $uploadDir = __DIR__ . '/uploads/' . $showname;

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $photoPath = "$uploadDir/$imageName";
        move_uploaded_file($imageTmp, $photoPath);
        $photoToSave = "uploads/$showname/$imageName";
        $photoUpdated = true;
    }

            // ✅ Poster upload handling
    $poster_sql = "";  // will hold poster update part if needed
    $posterUpdated = false;
    if (!empty($_FILES['poster']['name'])) {
        $posterName   = basename($_FILES['poster']['name']);
        $uniquePoster = time() . "_" . $posterName;

        $showFolder = __DIR__ . '/uploads/' . $showname;
        if (!file_exists($showFolder)) {
            mkdir($showFolder, 0755, true);
        }

        $posterPath = 'uploads/' . $showname . '/' . $uniquePoster;
        $posterFullPath = $showFolder . '/' . $uniquePoster;
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

    // Update tvshow
    if ($photoUpdated) {
        $sql = "UPDATE tvshow SET showname=?, details=?, producer=?, trailer=?, wiki=?, director=?, photo=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $showname, $details, $producer, $trailer, $wiki, $director, $photoToSave, $tvshow_id);
    } else if ($posterUpdated) {
        $sql = "UPDATE tvshow SET showname=?, details=?, producer=?, trailer=?, wiki=?, poster=?, director=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $showname, $details, $producer, $trailer, $wiki, $posterPath, $director, $tvshow_id);
    }  else {
        $sql = "UPDATE tvshow SET showname=?, details=?, producer=?, trailer=?, wiki=?, director=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $showname, $details, $producer, $trailer, $wiki, $director, $tvshow_id);
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
    $cast_folder = "uploads/" . $showname . "/cast/";
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
        $sql = "INSERT INTO cast (name, image, ref_id, ref_type) VALUES (?, ?, ?, 'tvshow')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $actor_name, $uploaded_path, $tvshow_id);
    }

    $stmt->execute();
}
    echo "<script>alert('Tvshow updated successfully.'); window.location.href='listtvshows.php';</script>";
}
