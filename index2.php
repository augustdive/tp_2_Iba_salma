<?php
session_start();

// Récupérer le nombre d'adresses depuis la session
$numero_add = isset($_SESSION["num_addresses"]) ? $_SESSION["num_addresses"] : 0;

// Vérifier si le nombre d'adresses est valide
if ($numero_add <= 0) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Adresse Forum</title>
</head>
<body>
    <div class="container">
        <form action="index2.php" method="post">
            <?php for ($i = 1; $i <= $numero_add; $i++): ?>
                <div class="address-section">
                    <h2>Adresse <?php echo $i; ?></h2>
                    <label for="street_<?php echo $i; ?>">Rue:</label>
                    <input type="text" name="street_<?php echo $i; ?>" maxlength="50" required>

                    <label for="street_nb_<?php echo $i; ?>">Numéro de rue:</label>
                    <input type="number" name="street_nb_<?php echo $i; ?>" required>

                    <label for="type_<?php echo $i; ?>">Type:</label>
                    <select name="type_<?php echo $i; ?>" required>
                        <option value="delivery">Livraison</option>
                        <option value="billing">Facturation</option>
                        <option value="other">Autre</option>
                    </select>

                    <label for="city_<?php echo $i; ?>">Ville:</label>
                    <select name="city_<?php echo $i; ?>" required>
                        <option value="Montreal">Montréal</option>
                        <option value="Laval">Laval</option>
                        <option value="Toronto">Toronto</option>
                        <option value="Quebec">Québec</option>
                    </select>

                    <label for="zipcode_<?php echo $i; ?>">Code Postal:</label>
                    <input type="text" name="zipcode_<?php echo $i; ?>" maxlength="6" required>
                </div>
            <?php endfor; ?>
            <input type="submit" value="Confirmer">
        </form>
    </div>
</body>
</html>
