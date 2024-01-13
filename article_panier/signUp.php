<?php

require("asset/config/init.php");
$errorMessage = "";
if(isset($_POST['connect'])){
    extract($_POST);
    echo '<pre>';
        print_r($_POST);
    echo '</pre>';
    if(!empty($_POST['pseudo']) && !empty($_POST['passwordTest']) && !empty($_POST['password'])){

        $insertUser = $pdo->prepare('INSERT INTO `users`(`id`, `pseudo`, `mdp`) VALUES (
            null,
            :pseudo,
            :mdp
        )');
        $insertUser->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
        $insertUser->bindValue(':mdp',password_hash($password,PASSWORD_DEFAULT),PDO::PARAM_STR);
        // echo var_dump($insertUser);
        $insertUser->execute(); 
        header('location : login.php');
        exit();
        // echo var_dump($insertUser);

    }
    else{
        $errorMessage .= "<div class='alert alert-danger' role='alert'>Veuillez remplir les champs obligatoires</div>";
    }
    
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="asset/css/styleLog.css">
</head>
<body>
    <?php
        if(isset($errorMessage)){ //si la variable $errorMessage est définie on affiche le message d'erreur
        echo '<p>'. $errorMessage. '</p>';
    }?>
    <div id="container">
        <h1>Sign up</h1>
        <form action="" method="post">
            <label for="">Pseudo</label>
            <input type="text" name="pseudo" placeholder="Entrez votre pseudo" value="<?= ($_POST['pseudo']) ?? null; ?>">

            <label for="">Veuillez entrée un mot de passe</label>
            <input type="password" name="passwordTest"  value="<?= ($_POST['passwordTest']) ?? null; ?>" >

            <label for="password">Vérifiez votre mot de passe</label>
            <input type="password" name="password"  value="<?= ($_POST['password']) ?? null; ?>" >

            <input type="submit" value="Se connecter" name="connect">
            <a href="login.php">Vous avez déjà un compte ?</a>
        </form>
    </div>
    
</body>
</html>