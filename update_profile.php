<?php
session_start();
include('db_connection.php');

// Make sure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Collect form data
$username =  $_POST['username'];
$email    =  $_POST['email'];
$password =  $_POST['password'];
$photo    =  $_FILES['photo'];

// Default query (without photo)
$sql = "UPDATE users SET username='$username', email='$email', password='$password' WHERE id='$user_id'";

// If new photo uploaded
if (!empty($photo['name'])) {
  $targetDir = "uploads/profilephotos/";


    // Create folder if it doesn't exist     
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $fileName = time() . "_" . basename($photo["name"]);
    $targetFilePath = $targetDir . $fileName;

    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    $hash = password_hash($password, PASSWORD_BCRYPT);

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($photo["tmp_name"], $targetFilePath)) {
            // Update query with photo
            $sql = "UPDATE users SET username='$username', email='$email', password='$hash', photo='$targetFilePath' WHERE id='$user_id'";
        } else {
            $_SESSION['error'] = "Failed to upload photo.";
            header("Location: profile.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Only JPG, JPEG, PNG & GIF files allowed.";
        header("Location: profile.php");
        exit;
    }
}

// Execute update
if ($conn->query($sql) === TRUE) {
    $_SESSION['success'] = "Profile updated successfully!";
} else {
    $_SESSION['error'] = "Error updating profile: " . $conn->error;
}

header("Location: profile.php");
exit;
?>
