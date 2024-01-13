<?php
require('asset/config/init.php');
$content = "";
//on vérifie si la personne a cliqué sur le bouton connexion
if(isset($_POST['connect']) && $_POST['connect'] == "Se connecter")
{

        extract($_POST); 

        $pdoStatement = $pdo->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
        //j'associe le marqueur la saisie de l'utilisateur 
        $pdoStatement->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
        //j'exécute la requête
        $pdoStatement->execute();

        //vérificaation si le pseudo saisi existe : 
        echo $pdoStatement->rowCount();
        if($pdoStatement->rowCount() != 0){

                $displayUserInfo = $pdoStatement->fetch(PDO::FETCH_ASSOC); 
                //on vérifie si le mot passe hashé correspond au mot de passe saisi
                if(password_verify($password,$displayUserInfo['mdp']))
                {
                        //on fait une boucle sur les infos du membre
                        foreach($displayUserInfo as $key => $value)
                        {
                                if($key != "password")
                                {
                                        //on stocke les infos du membre dans une session intitulée membre
                                        //les $key sont les noms des clés
                                        //les $value sont les valeurs
                                        $_SESSION['member'][$key] = $value;
                                        //le membre et sa $key 
                                        //on récup les $key dans la session membre
                                }else{
                                        $_SESSION['member'] = false;
                                }
                        }

                        //redicrection sur la page profil : 
                        header('location: accueil.php');
                        exit();
                }else{
                        $content .= "<div>Le mot de passe est incorrect</div>";
                }

        }else{
                $content .= "<div>Le pseudo n'existe pas</div>";
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
        <div id="container">
            <h1>Login</h1>
        <?=$content?>
        <form action="" method="post">
            <label for="">Pseudo</label>
            <input type="text" name="pseudo" placeholder="Entrez votre pseudo">

            <label for="">Mot de passe</label>
            <input type="password" name="password">

            <input type="submit" value="Se connecter" name="connect">
            <a href="signUp.php">Vous n'avez pas encore de compte ?</a>
        </form>
    </div>
    
</body>
</html>