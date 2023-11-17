<?php
session_start();
require_once "functions/functions.php";

// Récupérer les adresses de la session
$addr = isset($_SESSION['addr']) ? $_SESSION['addr'] : array();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Confirmation des Adresses</title>
</head>

<body>
    <div class="container">
        <?php if (!empty($addr)) : ?>
            <h2>adresse confirmation</h2>

            <?php foreach ($addr as $index => $addy) : ?>
                <p><strong>Adresse <?= $index + 1; ?> :</strong></p>
                <p><strong>Rue:</strong> <?= $addy['street']; ?></p>
                <p><strong>Numéro de Rue:</strong> <?= $addy['street_nb']; ?></p>
                <p><strong>Type:</strong> <?= $addy['type']; ?></p>
                <p><strong>Ville:</strong> <?= $addy['city']; ?></p>
                <p><strong>Code Postal:</strong> <?= $addy['zipcode']; ?></p>
                <hr>
            <?php endforeach; ?>

            
            <form action="confirmations.php" method="post">
                <input type="submit" name="conf" value="Confirm">
            </form>
                                          
           
                <a href="index2.php"><input type="button" name="return" value="go back"></a>
            /*bd connection */

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) :
                $success = addAddy($addr);

                if ($success) :
                    echo "@ added succefully to the Database >_< ";
                    unset($_SESSION['addresses']);
                else :
                    echo "error -_-";
                endif;
            endif;
            ?>
        <?php else : ?>
            no adresse found <br>
        <?php endif; ?>
    </div>
</body>

</html>
