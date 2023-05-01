<?php

if(isset($_POST["submit"])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $role = $_POST["role"];
    $pwd = $_POST["pwd"];


    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    $signup = new Signup($nom, $prenom, $role, $pwd);

    if(!$signup->checkUser()) {
        header("location: ../index.php?error=accountAlreadyExisting");
    }

    else {
        $signup->setUser();
    }

    header("location: ../assets/html/dashboard.php");
}




?>