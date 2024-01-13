<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,//on affiche les erreurs. En prod, on met ERRMODE_SILENT
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',//on définit le charset
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,//on récupère les données sous forme de tableau associatif
];

define('CONNECTBDD',array(
    'type'=>'mysql',
    'host'=>'localhost',
    'user'=>'root',
    'pass'=>'',
    'database' => 'shop'
));

try{
    $pdo = new PDO(CONNECTBDD['type'].':host='.CONNECTBDD['host'].';dbname='.CONNECTBDD['database'],CONNECTBDD['user'],CONNECTBDD['pass'],$options);
}catch(PDOException $e){
    die('<p>Erreur lors de la connexion à la base de données : '.$e->getMessage() . '</p>');
}