<?php
include ('asset/config/init.php');
require ('asset/config/fonctions.php');
require ('asset/config/achat.php');
// var_dump($_SESSION);
// echo '<pre>';
//     print_r($_SESSION['articlle']);
// echo '</pre>';
if(membreAccess() == false){
    header('location: http://localhost/challenge/article_panier/article_panier/accueil.php');
}
$memberId = 0;

while($_SESSION['member']['id'] != $memberId){
    $memberId++;
}
$total = 0;
$totalPrice = $pdo->prepare('SELECT ROUND(SUM(price),2) as total FROM `article` WHERE id =:memberId');
$totalPrice->bindValue(':memberId',$memberId,PDO::PARAM_INT);
$totalPrice->execute();
$priceKeys = $totalPrice->fetchAll();
foreach($priceKeys as $priceKey){
    $total = $priceKey['total'];
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style2.css">
    <title>Panier-vend-des-trucs.com</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="accueil.php">Accueil</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>
    <main>
        <h1>Votre panier</h1>
        <div id="panier">
            <table>
                <thead>
                    <tr id="legend">
                        <th>Photo</th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
// -----------------------------------VERIFICATION QUE L'ID APPARTIENT BIEN A L'USER----------------------------------------------------------------------------------------------

                    
                    // var_dump($memberId);
                     
                    $article = $pdo->prepare('SELECT * FROM article WHERE id =:memberId');
                    $article->bindValue('memberId',$memberId,PDO::PARAM_INT);
                    

                    $article->execute();
// ---------------------------------------INSERTION DES DONNEES DE LA BDD------------------------------------------------------------------------------------------

                        $cles = $article->fetchAll(); //fetchAll pour récuperer toute les informations de la BDD
                        foreach($cles as $cle){
                            echo '<tr>';
                            $img = $cle['image'];
                            echo '<td> <img src="asset/img/'.$img.'"></td>';
                            echo '<td>' . $cle['name'] . '</td>';
                            echo "<td>" . $cle['price'] . "</td>";

                            ?><td> <a href='delete.php?numId=<?= $cle['id_article']?>'><svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M49.7 32c-10.5 0-19.8 6.9-22.9 16.9L.9 133c-.6 2-.9 4.1-.9 6.1C0 150.7 9.3 160 20.9 160h94L140.5 32H49.7zM272 160V32H173.1L147.5 160H272zm32 0H428.5L402.9 32H304V160zm157.1 0h94c11.5 0 20.9-9.3 20.9-20.9c0-2.1-.3-4.1-.9-6.1L549.2 48.9C546.1 38.9 536.8 32 526.3 32H435.5l25.6 128zM32 192l4 32H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H44L64 448c0 17.7 14.3 32 32 32s32-14.3 32-32H448c0 17.7 14.3 32 32 32s32-14.3 32-32l20-160h12c17.7 0 32-14.3 32-32s-14.3-32-32-32h-4l4-32H32z"/></svg></a> </td> <?php
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="prix">
            <h3>Total : <?=$total?>€</h3>
            <button>Commander</button>
        </div>
    </main>
    <footer>
        <p>Copyright &copy; 2023</p>
    </footer>
</body>
</html>