<?php
session_start();
// Database connection 
include ('../db_connection.php');

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to add to watchlist.");
}
// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Geting POST values 
$name    = $_POST['name'];
$email   = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Inserting into database
$sql = "INSERT INTO contact_messages (name, email, subject, message, created_at) 
        VALUES ('$name', '$email', '$subject', '$message', NOW())";

if ($conn->query($sql) === TRUE) {
    // Optional: send email notification to admin
    $to = "jangadrehan@gmail.com";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $emailBody = "New Contact Message:\n\n";
    $emailBody .= "Name: $name\n";
    $emailBody .= "Email: $email\n";
    $emailBody .= "Subject: $subject\n";
    $emailBody .= "Message:\n$message\n";

    mail($to, "New Contact Form Submission - $subject", $emailBody, $headers);

    echo "<script>alert('Thank you! Your message has been sent.'); window.location='../contactus.php';</script>";
} else {
    echo "<script>alert('Oops! Something went wrong.'); window.location='../contactus.php';</script>";
}

$conn->close();
?> 
