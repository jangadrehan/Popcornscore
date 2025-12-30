<?php
session_start();
include('../db_connection.php');

// Make sure admin is logged in (optional)
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Get user ID from query
$user_id = $_GET['id'] ?? null;
if (!$user_id) {
    $_SESSION['error'] = "No user ID provided.";
    header("Location: allusers.php");
    exit;
}

// Collect form data
$username = $_POST['username'];
$email    = $_POST['email'];
$role     = $_POST['role'];
if($role=="user")
{
    $r=0;
}
else
{
    $r=1;
}
$password = $_POST['password'] ?? ""; // optional
$photo    = $_FILES['photo'];

// Start default SQL (without photo & password)
$sql = "UPDATE users SET username='$username', email='$email',  admin='$r' WHERE id='$user_id'";

// If password provided, hash it
if (!empty($password)) {
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $sql = "UPDATE users SET username='$username', email='$email', admin='$r', password='$hash' WHERE id='$user_id'";
}

// If new photo uploaded
if (!empty($photo['name'])) {
    $targetDir = "../uploads/profilephotos/";

    // Create folder if it doesn't exist
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = time() . "_" . basename($photo["name"]);
    $targetFilePath = $targetDir . $fileName;

    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($photo["tmp_name"], $targetFilePath)) {
            $dbPath = "uploads/profilephotos/" . $fileName;

            if (!empty($password)) {
                $sql = "UPDATE users SET username='$username', email='$email', admin='$role', password='$hash', photo='$dbPath' WHERE id='$user_id'";
            } else {
                $sql = "UPDATE users SET username='$username', email='$email',  admin='$role', photo='$dbPath' WHERE id='$user_id'";
            }
        } else {
            $_SESSION['error'] = "Failed to upload photo.";
            header("Location: allusers.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Only JPG, JPEG, PNG & GIF files allowed.";
        header("Location: allusers.php");
        exit;
    }
}

// Execute update
if ($conn->query($sql) === TRUE) {
    $_SESSION['success'] = "User updated successfully!";
} else {
    $_SESSION['error'] = "Error updating user: " . $conn->error;
}

header("Location: allusers.php");
exit;
?>
