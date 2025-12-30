<?php
session_start();
include('../db_connection.php'); // DB connection file

// Checking if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("<script>window.location.href='../login.php'</script>");
}

$user_id = $_SESSION['user_id'];
$ref_id = $_GET['id'] ?? null;
$ref_type = $_GET['type'] ?? null;

if ($ref_id <= 0) {
    die("Location: tvshow_details.php?id=" . $ref_id);
}

// Checking if movie already in watchlist
$check_sql = "SELECT * FROM watchlist WHERE user_id = ? AND ref_id = ?";
$stmt = $conn->prepare($check_sql);
$stmt->bind_param("ii", $user_id, $ref_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
        $_SESSION['message'] = 'Already in your watchlist  !!!';
        $_SESSION['message_type'] = 'danger';
         header("Location: ../index.php");
} else {
    $insert_data=mysqli_query($conn,"INSERT INTO watchlist (user_id, ref_id, ref_type) VALUES ('$user_id', '$ref_id', '$ref_type')");

    if ($insert_data) {
        $_SESSION['message'] = 'Added Successfull!!!';
        $_SESSION['message_type'] = 'success';
         header("Location: ../index.php");

    } else {
        $_SESSION['message'] = 'Error to Adding !!!';
        $_SESSION['message_type'] = 'danger';
         header("Location: ../index.php");
    }
}

$stmt->close();
$conn->close();
?>
