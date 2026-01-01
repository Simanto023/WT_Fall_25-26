<?php
include __DIR__ . "/../DB/db.php";

$carError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $brand           = $_POST["brand"];
    $model           = $_POST["model"];
    $color           = $_POST["color"];
    $engine_capacity = $_POST["engine_capacity"];
    $horsepower      = $_POST["horsepower"];
    $transmission    = $_POST["transmission"];
    $price           = $_POST["price"];
    $category        = $_POST["category"];

    //empty check
    if (
        empty($brand) || empty($model) || empty($color) ||
        empty($engine_capacity) || empty($horsepower) ||
        empty($transmission) || empty($price) || empty($category)
    ) {
        header("Location: ../manage_cars.php?error=1");
        exit;
    }

    //image empty for now 
    $image = "";

    //insert
    $sql = "INSERT INTO cars 
            (brand, model, color, engine_capacity, horsepower, transmission, price, category, image)
            VALUES 
            ('$brand', '$model', '$color', '$engine_capacity', '$horsepower',
             '$transmission', '$price', '$category', '$image')";

    if ($conn->query($sql)) {
        header("Location: ../manage_cars.php");
        exit;
    }
    header("Location: ../manage_cars.php?error=1");
    exit;
   
}
?>
