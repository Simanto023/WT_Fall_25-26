<?php
include "../DB/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST["fullname"];
    $email    = $_POST["email"];
    $password = $_POST["password"];
    $confirm  = $_POST["confirm_password"];

    if ($fullname == "" || $email == "" || $password == "" || $confirm == "") {
        echo "All fields are required.";
    }
    elseif ($password != $confirm) {
        echo "Passwords do not match.";
    }
    else {

        $sql = "INSERT INTO users (full_name, email, password, role)
                VALUES ('$fullname', '$email', '$password', 'customer')";

        if ($conn->query($sql)) {
            echo "Registration successful.";
        } else {
            echo "Error occurred.";
        }
    }
}
?>
