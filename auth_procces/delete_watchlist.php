<?php
session_start();
include('../db_connection.php');

if (isset($_GET['ref_id'], $_GET['ref_type']) && isset($_SESSION['user_id'])) {
    $ref_id   = intval($_GET['ref_id']);      // movie or tvshow id
    $ref_type = $_GET['ref_type'];            // 'movie' or 'tvshow'
    $user_id  = intval($_SESSION['user_id']); // logged in user

    // Prepared statement for safety
    $sql  = "DELETE FROM watchlist WHERE user_id = ? AND ref_id = ? AND ref_type = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iis", $user_id, $ref_id, $ref_type);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../profile.php");
        exit();
    } else {
        echo "Error deleting from watchlist.";
    }
} else {
    echo "Invalid request.";
}
?>
