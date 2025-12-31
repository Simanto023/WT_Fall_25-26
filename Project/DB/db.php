<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "car_website";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database connection failed");
}
?>