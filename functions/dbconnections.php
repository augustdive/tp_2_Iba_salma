<?php

function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecom1_tp2";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("failed connection: " . mysqli_connect_error());
    }

    return $conn;
}
?>