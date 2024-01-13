<?php

$ajout = "";
$panier = "";
$connect = "";
// ----------- GEL DOUCHE ----------------------------------------------------------------

if(membreAccess() == true){ 
    $youId = $_SESSION['member']['id'];
}


if(isset($_POST['gelDouche']) && $_POST['gelDouche'] == 'Achetez' && membreAccess() == true){
    $panier .= ' du gel douche';

    $article = $pdo->prepare('INSERT INTO `article`(`name`, `price`, `image`, `id`) VALUES (
        "gelDouche",
        25.99,
        "gelDouche.avif",
        :id
    )');
    $ajout = $panier . ' a été ajouté à votre panier';
    $article->bindValue(':id',$youId,PDO::PARAM_INT);
    $article->execute();

// ------------------------------------------------------------------ PS5 ----------------------------------------------------------------

}elseif(isset($_POST['ps5']) && $_POST['ps5'] == 'Achetez' &&  membreAccess() == true){

    $panier .= ' une ps5';
    $article = $pdo->prepare('INSERT INTO `article`(`name`, `price`, `image`, `id`) VALUES (
        "ps5",
        200,
        "ps5.avif",
        :id
    )');
    $article->bindValue(':id',$youId,PDO::PARAM_STR);
    $article->execute();
    $ajout = $panier . ' a été ajouté à votre panier';
    
// ------------------------------------------------------------------ PLANTE ----------------------------------------------------------------

}elseif(isset($_POST['plante']) && $_POST['plante'] == 'Achetez'  &&  membreAccess() == true){

    $panier .= ' une plante';
    $article = $pdo->prepare('INSERT INTO `article`(`name`, `price`, `image`, `id`) VALUES (
        "plante",
        15.12,
        "plantePot.avif",
        :id
    )');
    $article->bindValue(':id',$youId,PDO::PARAM_STR);
    $article->execute();
    $ajout = $panier . ' a été ajouté à votre panier';

// ------------------------------------------------------------------ MOTO ----------------------------------------------------------------

}elseif(isset($_POST['moto']) && $_POST['moto'] == 'Achetez'  &&  membreAccess() == true){

    $panier .= ' une moto';
    $article = $pdo->prepare('INSERT INTO `article`(`name`, `price`, `image`, `id`) VALUES (
        "moto",
        999.99,
        "moto.avif",
        :id
    )');
    $article->bindValue(':id',$youId,PDO::PARAM_STR);
    $article->execute();
    $ajout = $panier . ' a été ajouté à votre panier';

// ------------------------------------------------------------------ NAIN ----------------------------------------------------------------

}elseif(isset($_POST['nain']) && $_POST['nain'] == 'Achetez'  &&  membreAccess() == true){

    $panier .= ' un nain';
    $article = $pdo->prepare('INSERT INTO `article`(`name`, `price`, `image`, `id`) VALUES (
        "nain",
        35.75,
        "nainGringe.avif",
        :id
    )');
    $article->bindValue(':id',$youId,PDO::PARAM_STR);
    $article->execute();
    $ajout = $panier . ' a été ajouté à votre panier';

// ------------------------------------------------------------------ TOILETTE ----------------------------------------------------------------

}elseif(isset($_POST['toilette']) && $_POST['toilette'] == 'Achetez'  &&  membreAccess() == true){

    $panier .= ' une toilette ';
    $article = $pdo->prepare('INSERT INTO `article`(`name`, `price`, `image`, `id`) VALUES (
        "toilette",
        10000,
        "toilette.avif",
        :id
    )');
    $article->bindValue(':id',$youId,PDO::PARAM_STR);
    $article->execute();
    $ajout = $panier . ' a été ajouté à votre panier';

}elseif(isset($_POST['toilette']) || isset($_POST['nain'])  || isset($_POST['moto']) || isset($_POST['plante']) || isset($_POST['ps5']) || isset($_POST['gelDouche']) && membreAccess() == false){
    $connect = 'connectez-vous pour ajouter des trucs à votre panier';
}

$message = 0;

$nameUser = "";

$product = 0;
if(membreAccess() == true){

    //  Faire le total des articles
    
    while($_SESSION['member']['id'] != $product){
        $product++;
    }
    $nbProduct = $pdo->prepare('SELECT COUNT(id) FROM `article` WHERE id =:product');
    $nbProduct->bindValue(':product',$product,PDO::PARAM_INT);
    $nbProduct->execute();
    $nbKeys = $nbProduct->fetchAll();
    foreach($nbKeys as $nbKey){
        $message = $nbKey['COUNT(id)'];
    }



    // Pour écrire le pseudo de l'user


    $memberId = 0;

    while($_SESSION['member']['id'] != $memberId){
        $memberId++;
    }
        $name = $pdo->prepare('SELECT pseudo FROM users WHERE id=:memberId'); 
        $name->bindValue('memberId',$memberId,PDO::PARAM_INT);
        $name->execute();

        $nameKeys = $name->fetchAll();
        foreach($nameKeys as $nameKey){
        $nameUser = $nameKey['pseudo'];
        }
}