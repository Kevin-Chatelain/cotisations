<?php

class Login extends Dbh {

    private $nom;
    private $pwd;

    public function __construct($nom, $pwd) {
        $this->nom = $nom;
        $this->pwd = $pwd;
    }

    public function getUser() {
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE nom = ?;');

        if(!$stmt->execute(array($this->nom))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($this->pwd, $pwdHashed[0]["password"]);

        if($checkPwd == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }

        elseif($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE nom = ? AND password = ?;');

            if(!$stmt->execute(array($this->nom, $pwdHashed[0]["password"]))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["nom"] = $user[0]["nom"];
            $_SESSION["prenom"] = $user[0]["prenom"];
        }

        $stmt = null;
    }
}