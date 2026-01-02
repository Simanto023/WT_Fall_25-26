<?php
include __DIR__ . "/../DB/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM cars WHERE id = $id";
    $conn->query($sql);

    header("Location: ../manage_cars.php");
    exit;}
?>