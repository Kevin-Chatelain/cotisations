<?php

class Signup extends Dbh {

    private $nom;
    private $prenom;
    private $role;
    private $pwd;

    public function __construct($nom, $prenom, $role, $pwd) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->role = $role;
        $this->pwd = $pwd;
    }

    public function setUser() {
        $stmt = $this->connect()->prepare('INSERT INTO users (nom, prenom, role, password) VALUES (?, ?, ?, ?);');

	    $hashedPwd = password_hash($this->pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($this->nom, $this->prenom, $this->role, $hashedPwd))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;

        session_start();
        $_SESSION["nom"] = $this->nom;
        $_SESSION["prenom"] = $this->prenom;
    }

    public function checkUser() {
        $stmt = $this->connect()->prepare('SELECT nom FROM users WHERE nom = ?;');

        if(!$stmt->execute(array($this->nom))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }

        else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
}