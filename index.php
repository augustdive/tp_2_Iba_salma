<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero_add = isset($_POST['num_add']) ? intval($_POST['num_add']) : 0;

    if ($numero_add <= 0) {
        header("Location: index.php");
        exit();
    }

    // Stocker le nombre d'adresses dans la session
    $_SESSION['num_addresses'] = $numero_add;

    // Redirection vers le formulaire d'adresse
    header("Location: index2.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Adresse</title>
</head>

<body>
    <div class="container">
        <form action="index.php" method="post">
            <label for="num_addresses">how many addresses do you have ?</label>
            <input type="number" name="num_add" required>
            <input type="submit" value="Suivant">
        </form>
    </div>
</body>

</html>