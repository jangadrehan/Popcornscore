<?php

$conn = new mysqli ("localhost","root","","popcornscore");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>