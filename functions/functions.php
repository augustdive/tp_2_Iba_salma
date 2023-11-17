<?php

require_once("dbconnection.php");

function addAddy($addr) {
    $conn = connectDB();

    $sql = "INSERT INTO address (street, street_nb, type, city, zipcode) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        die("Error executing the request: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sisss", $street, $street_nb, $type, $city, $zipcode);

    foreach ($addr as $addresses) {
        $street = $addresses['street'];
        $street_nb = $addresses['street_nb'];
        $type = $addresses['type'];
        $city = $addresses['city'];
        $zipcode = $addresses['zipcode'];

        
        $result = mysqli_stmt_execute($stmt);

        
        if (!$result) {
            die("Error executing the request: " . mysqli_error($conn));
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return true; 
}
?>