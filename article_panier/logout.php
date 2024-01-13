<?php
session_start();
session_destroy();
header('location: http://localhost/challenge/article_panier/article_panier/accueil.php');