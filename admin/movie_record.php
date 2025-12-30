<?php

include ('../db_connection.php');

if (isset($_POST['submit'])) {
    $details = $_POST['details'];
    $director = $_POST['director'];
    $trailer = $_POST['trailer'];
    $wiki = $_POST['wiki'];
    $producer = $_POST['producer'];
    $actorNames  = $_POST['actors'];
    $actorImages = $_FILES['image'];
    $moviename = mysqli_real_escape_string($conn, $_POST['moviename']);

    // Create movie folder
    $moviePath = __DIR__ . '/uploads/' . $moviename;
    if (!file_exists($moviePath)) {
        mkdir($moviePath, 0755, true);
    }
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'icon'];

// Handle movie poster
    $posterName = basename($_FILES["poster"]["name"]);
    $uniquePoster = time() . "_" . $posterName;
    $posterPath = 'uploads/' . $moviename . '/' . $uniquePoster;
    $posterFullPath = $moviePath . '/' . $uniquePoster;

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
    $movieImagePath = 'uploads/' . $moviename . '/' . $uniqueName;
    $movieImageFullPath = $moviePath . '/' . $uniqueName;

    $imageFileType = strtolower(pathinfo($movieImagePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'icon'];

    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check !== false && in_array($imageFileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $movieImageFullPath)) {

            // Insert movie
            $sql = "INSERT INTO movie (moviename, photo, poster, director, producer, trailer, wiki, details) VALUES ('$moviename', '$movieImagePath', '$posterPath', '$director','$producer','$trailer','$wiki','$details')";
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;

                // Create cast folder
                $castPath = $moviePath . '/cast/';
                if (!file_exists($castPath)) {
                    mkdir($castPath, 0755, true);
                }

                // Loop through actors and insert
                for ($i = 0; $i < count($actorNames); $i++) {
                    $actorName = mysqli_real_escape_string($conn, $actorNames[$i]);

                    $actorImageName = basename($actorImages['name'][$i]);
                    $uniqueActorImage = time() . "_$i" . "_" . $actorImageName;
                    $actorImagePath = 'uploads/' . $moviename . '/cast/' . $uniqueActorImage;
                    $actorImageFullPath = $castPath . $uniqueActorImage;

                    if (move_uploaded_file($actorImages['tmp_name'][$i], $actorImageFullPath)) {
                        $sql_cast = "INSERT INTO cast (ref_id, name, image,ref_type) VALUES ('$last_id', '$actorName', '$actorImagePath','movie')";
                        mysqli_query($conn, $sql_cast);
                    } else {
                        echo "Failed to upload actor image: $actorImageName<br>";
                    }
                }

                echo "<script>alert('Movie Added')</script>";
                echo "<script>window.location.href='addmovie.php'</script>";
            } else {
                echo "<script>alert('Database error: " . mysqli_error($conn) . "')</script>";
                echo "<script>window.location.href='addmovie.php'</script>";
            }
        } else {
            echo "<script>alert('Error Uploading Image')</script>";
            echo "<script>window.location.href='addmovie.php'</script>";
        }
    } else {
        echo "<script>alert('Invalid file type. Please upload a JPG, PNG, or GIF image')</script>";
        echo "<script>window.location.href='addmovie.php'</script>";
    }

    mysqli_close($conn);
}
?>
