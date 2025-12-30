<?php

include ('../db_connection.php');

if (isset($_POST['submit'])) {
    $details = $_POST['details'];
    $director = $_POST['director'];
    $producer = $_POST['producer'];
    $trailer = $_POST['trailer'];
    $wiki = $_POST['wiki'];
    $actorNames  = $_POST['actors'];
    $actorImages = $_FILES['image'];
    $showname = mysqli_real_escape_string($conn, $_POST['showname']);

    // Create movie folder
    $showPath = __DIR__ . '/uploads/' . $showname;
    if (!file_exists($showPath)) {
        mkdir($showPath, 0755, true);
    }
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'icon'];
 

    // Handle movie poster
$posterName = basename($_FILES["poster"]["name"]);
$uniquePoster = time() . "_" . $posterName;
$posterPath = 'uploads/' . $showname . '/' . $uniquePoster;
$posterFullPath = $showPath . '/' . $uniquePoster;

$posterFileType = strtolower(pathinfo($posterPath, PATHINFO_EXTENSION));
if (!empty($_FILES["poster"]["tmp_name"])) {
    $checkPoster = getimagesize($_FILES["poster"]["tmp_name"]);
    if ($checkPoster !== false && in_array($posterFileType, $allowedTypes)) {
        move_uploaded_file($_FILES["poster"]["tmp_name"], $posterFullPath);
    } else {
        $posterPath = ''; // fallback if invalid
    }
} else {
    $posterPath = '';
}

    // Handle movie photo
    $imageName = basename($_FILES["photo"]["name"]);
    $uniqueName = time() . "_" . $imageName;
    $showImagePath = 'uploads/' . $showname . '/' . $uniqueName;
    $showImageFullPath = $showPath . '/' . $uniqueName;

    $imageFileType = strtolower(pathinfo($showImagePath, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check !== false && in_array($imageFileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $showImageFullPath)) {

            // Insert movie
            $sql = "INSERT INTO tvshow (showname, photo, poster, director, producer, trailer, wiki, details) VALUES ('$showname', '$showImagePath', '$posterPath','$director','$producer','$trailer','$wiki','$details')";
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;

                // Create cast folder
                $castPath = $showPath . '/cast/';
                if (!file_exists($castPath)) {
                    mkdir($castPath, 0755, true);
                }

                // Loop through actors and insert
                for ($i = 0; $i < count($actorNames); $i++) {
                    $actorName = mysqli_real_escape_string($conn, $actorNames[$i]);

                    $actorImageName = basename($actorImages['name'][$i]);
                    $uniqueActorImage = time() . "_$i" . "_" . $actorImageName;
                    $actorImagePath = 'uploads/' . $showname . '/cast/' . $uniqueActorImage;
                    $actorImageFullPath = $castPath . $uniqueActorImage;

                    if (move_uploaded_file($actorImages['tmp_name'][$i], $actorImageFullPath)) {
                        $sql_cast = "INSERT INTO cast (ref_id, name, image,ref_type) VALUES ('$last_id', '$actorName', '$actorImagePath','tvshow')";
                        mysqli_query($conn, $sql_cast);
                    } else {
                        echo "Failed to upload actor image: $actorImageName<br>";
                    }
                }

                echo "<script>alert('TvShow Added')</script>";
                echo "<script>window.location.href='addtvshow.php'</script>";
            } else {
                echo "<script>alert('Database error: " . mysqli_error($conn) . "')</script>";
                echo "<script>window.location.href='addtvshow.php'</script>";
            }
        } else {
            echo "<script>alert('Error Uploading Image')</script>";
            echo "<script>window.location.href='addtvshow.php'</script>";
        }
    } else {
        echo "<script>alert('Invalid file type. Please upload a JPG, PNG, or GIF image')</script>";
        echo "<script>window.location.href='addtvshow.php'</script>";
    }

    mysqli_close($conn);
}
?>
