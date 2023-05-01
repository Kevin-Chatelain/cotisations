<?php
    session_start();
    include "../../classes/dbh.classes.php";
    include "../../includes/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/dashboard.css">
    <title>Crazy Looting</title>
</head>

<body class="accueil">

    <h1>Bonjour <?php echo $_SESSION["prenom"]; ?></h1>
    <a href="../../includes/logout.inc.php">Déconnexion</a>

    <?php 
        $dbh = new Dbh();
        $montant = getMoneyPot($dbh, 1);
    ?>
    <p>Montant de la cagnotte: <?php echo $montant[0]['value']; ?> €</p>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h2>Faire un don</h2>

        <input type="text" name="montant" id="montant" placeholder="montant">
        <input type="submit" name="donnation" value="Valider">

        <?php 

            if(isset($_POST['donnation'])) {
                $don = $_POST['montant'];
                donate($dbh ,$don, 1);
            }
    
        ?>
    
    </form>

    

</body>

</html>