<?php
include('../db_connection.php');

session_start();
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    die("<script>window.location.href='../login.php'</script>");
}

// Ensureing the movie ID is present in the URL
$ref_id = $_GET['id'] ?? null;
$ref_type = $_GET['type'] ?? null;
if (!$ref_id) {
    die("ID is missing.");

}

// Geting the posted rating
$rating = $_POST['rating'] ?? null;
if (!$rating || $rating < 1 || $rating > 10) {
    die("Invalid rating.");
}

$coments = $_POST['coments'] ?? '';

// Check if user already rated
$check_sql = "SELECT id FROM reviews WHERE ref_id = $ref_id AND user_id = $user_id";
$check_result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
    // Update existing review
    $update_sql = "UPDATE reviews 
                   SET rating = $rating, ref_type = '$ref_type', coments ='$coments' 
                   WHERE ref_id = $ref_id AND user_id = $user_id";
    mysqli_query($conn, $update_sql);
} else {
    // Insert new review
    $insert_sql = "INSERT INTO reviews (ref_id, user_id, rating, ref_type, coments) 
                   VALUES ($ref_id, $user_id, $rating, '$ref_type', '$coments')";
    mysqli_query($conn, $insert_sql);
}
if($ref_type == 'movie') 
{
    header("Location: ../details.php?id=$ref_id");
}
else
{
    header("Location: ../tvshow_details.php?id=$ref_id");
}
exit;
?>
