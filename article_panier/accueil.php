<?php
include ('asset/config/init.php');
require ('asset/config/fonctions.php');
require ('asset/config/achat.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vend des trucs.com</title>
    <link rel="stylesheet" href="asset/css/style.css">  
</head>
<body>
    <div id="container">
    <nav>
            <ul>
                <li><a href="">accueil</a></li>
                <li><a href="#choix">article</a></li>
                <li><a href="#footer">contact</a></li>
                    <?php if(membreAccess() == true){ ?>
                <li><a href="logout.php">Se deconnecter</a></li>
                <?php }elseif(membreAccess() == false){?>
                <li><a href="login.php">Se connecter</a></li>
                <?php }?>
                <li ><div id="notif"><?=$message?></div><a href="panier.php"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M253.3 35.1c6.1-11.8 1.5-26.3-10.2-32.4s-26.3-1.5-32.4 10.2L117.6 192H32c-17.7 0-32 14.3-32 32s14.3 32 32 32L83.9 463.5C91 492 116.6 512 146 512H430c29.4 0 55-20 62.1-48.5L544 256c17.7 0 32-14.3 32-32s-14.3-32-32-32H458.4L365.3 12.9C359.2 1.2 344.7-3.4 332.9 2.7s-16.3 20.6-10.2 32.4L404.3 192H171.7L253.3 35.1zM192 304v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16s16 7.2 16 16zm96-16c8.8 0 16 7.2 16 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16zm128 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg></a>
            </ul>
        </nav>
        <div id="background">
            <header>
                <div class="center">
                    <h1>Bienvenue <?=$nameUser?> sur vendestrucs.com</h1>
                    <p>Découvrez nos nouveauté !</p>
                    <p>clicker pour voir les articles</p>
                    <form action="" method="post">
                        <input type="submit" href="#choix" value="voir les articles">
                    </form>
                    <div>
                        <?=$connect?>
                    </div>
                    </div>
                    <img src="asset/img/panther.jpg" alt=" Fleur violette">
                <!-- <p>vend des article . com et un site en ligne sécuriser ou vous pouvez mettre vos articles dans votre panier, ce site est un projet de groupe réaliser par charly planquette et sebastien maillard lors de notre première année de devellopement. Vous pouvez choisir les articles qui vous intéresse, joyeuse course !</p> -->
            </header>
            <main>
                <section id="choix">
                    <h2>premiers article</h2>
                <?=$ajout?>
                    <form action="" method="post">
                        <div id="article">
                            <div class="line">
                                <article>
                                    <table>
                                        <tr>
                                            <img src="asset/img/gelDouche.avif" alt="gel douche" width="100" height="100" name="">
                                            <input type="submit" value="Achetez" name="gelDouche">
                                        </tr>
                                        <tr>
                                            <td name="name">lot de 3 gel douche</td>
                                        </tr>
                                        <tr>
                                            <td name="price"><span class="large">25</span><sup>99</sup>€</td>
                                        </tr>
                                    </table>
                                </article>
                                <article>
                                    <table>
                                        <tr>
                                            <img src="asset/img/ps5.avif" alt="ps5" width="100" height="100" name="image">
                                            <input type="submit" value="Achetez" name="ps5">                            
                                        </tr>
                                        <tr>
                                            <td name="name">ps5</td>
                                        </tr>
                                        <tr>
                                            <td name="price"><span class="large">200</span><sup>00</sup>€</td>
                                        </tr>
                                    </table>
                                </article>
                                <article>
                                    <table>
                                        <tr>
                                            <img src="asset/img/plantePot.avif" alt="plante" width="100" height="100" name="image">
                                            <input type="submit" value="Achetez" name="plante">                            
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td name="name">plante</td>
                                        </tr>
                                        <tr>
                                        <td name="price"><span class="large">15</span><sup>12</sup>€</td>
                                        </tr>
                                    </table>
                                </article>

                            </div>
                            <div class="line">


                                <article>
                                    <table>
                                    <tr>
                                            <img src="asset/img/moto.avif" alt="moto" width="100" height="100" name="image">
                                            <input type="submit" value="Achetez" name="moto">                            
                                        </tr>
                                        <tr>
                                            <td name="name">moto</td>
                                        </tr>
                                        <tr>
                                            <td name="price"><span class="large">999</span><sup>99</sup>€</td>
                                        </tr>
                                    </table>
                                </article>
                                <article>
                                    <table>
                                    <tr>
                                            <img src="asset/img/nainGringe.avif" alt="nain" width="100" height="100" name="image">
                                            <input type="submit" value="Achetez" name="nain"> 
                                        </tr>
                                        <tr>
                                            <td name="name">Gringe</td>
                                        </tr>
                                        <tr>
                                            <td name="price"><span class="large">35</span><sup>75</sup>€</td>
                                        </tr>
                                    </table>
                                </article>
                                <article>
                                    <table>
                                    <tr>
                                            <img src="asset/img/toilette.avif" alt="toilette royal" width="100" height="100" name="image">
                                            <input type="submit" value="Achetez" name="toilette"> 
                                        </tr>
                                        <tr>
                                            <td name="name">Toilette</td>
                                        </tr>
                                        <tr>
                                            <td name="price"><span class="large">10 000</span><sup>00</sup>€</td>
                                        </tr>
                                    </table>
                                </article>
                            </div>
                        </div>
                    </form>
                </section>
            </main>
        </div>
        <footer id="footer">
            <div class="left">
                <p class="m-b">producteur : charly/seb</p>
                <p class="m-b">réalisateur : charly/seb</p>
                <p class="m-b">designeur : charly/seb</p>
            </div>
            <div class="right">
                <h3 class="m-b">coordonnées</h3>
                <p class="m-b">charly planquette : mail charlyplanquettepro@gmail.com</p>
                <p class="m-b">seb  : mail sebmlrd06@gmail.com</p>
                <p class="m-b">Copyright &copy; 2023</p>
            </div>
        </footer>
    </div>
</body>
</html>