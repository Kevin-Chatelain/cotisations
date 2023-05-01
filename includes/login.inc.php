<?php

if(isset($_POST["submit"])) {
    $nom = $_POST["nom"];
    $pwd = $_POST["pwd"];

    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    $login = new Login($nom, $pwd);

    $login->getUser();

    header("location: ../assets/html/dashboard.php");
}




?>