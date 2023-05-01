<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/index.css">
    <title>Gestion Cositations | Connexion ou inscription</title>
</head>
<body>

    <div class="global-container">
        <div class="container">
            <h1>Inscription</h1>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="nom" placeholder="Nom">
                <input type="text" name="prenom" placeholder="Prénom">
                <input type="text" name="role" placeholder="Rôle">
                <input type="password" name="pwd" placeholder="Mot de passe">
                <br>
                <button type="submit" name="submit">Inscription</button>
            </form>
        </div>

        <div class="container">
            <h1>Connexion</h1>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="nom" placeholder="Nom"> 
                <input type="password" name="pwd" placeholder="Mot de passe">
                <br>
                <button type="submit" name="submit">Connexion</button>
            </form>
        </div>
    </div>
    
    
</body>
</html>