<?php
    session_start();
    include "../../classes/dbh.classes.php";
    include "../../includes/functions.php";
    $dbh = new Dbh();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faire un don</title>
</head>
<body>
    <h1>Faire un don</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="montant" id="montant" placeholder="montant">
        <input type="submit" name="donnation" value="Valider">
        <?php 
            if(isset($_POST['donnation'])) {
                $don = $_POST['montant'];
                donate($dbh ,$don, 1);
                echo "Merci pour votre don !";
            }
        ?>
    </form>

    <?php $montant = getMoneyPot($dbh, 1); ?>
    <p>Montant de la cagnotte: <?php echo $montant[0]['value']; ?> €</p>
    
</body>
</html>