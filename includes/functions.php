<?php 

// Obtenir le montant de la cagnotte
function getMoneyPot($dbh, $id) {
    $response = $dbh->connect()->prepare('SELECT value FROM montant WHERE id = ?;');
    $response->execute(array($id));
    $montant = $response->fetchAll(PDO::FETCH_ASSOC);
    return $montant;
}

//Faire un don
function donate($dbh, $amount, $id) {
    $montant = getMoneyPot($dbh, $id);
    $montant = $montant[0]['value'];
    $newMontant = $montant + $amount;
    $don = $dbh->connect()->prepare('UPDATE montant SET value = ? WHERE id = ?');
    $don->execute(array($newMontant, $id));
    header("Location: ./dashboard.php");
}
 
?>