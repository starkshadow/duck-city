<?php
/**
 * define of global vars
 */
define('WEBROOT', '/duck-city/');
?>

<?php session_start(); ?>

<?php 
//debug des variables sessions
//var_dump($_SESSION); 
?>

<?php
//set la variable session de l'utilisateur si elle n'existe pas
if (!isset($_SESSION['user']) || empty($_SESSION['user'])):
    $_SESSION['user'] = array('logged' => false);
endif;
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>DUCK CITY</title>
        <link rel="icon" type="image/png" href="<?php echo WEBROOT . 'images/favicon.png'; ?>" />
        <link href="<?php echo WEBROOT . 'css/style.css'; ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo WEBROOT . 'css/grid.css'; ?>">
            <link rel="stylesheet" href="<?php echo WEBROOT . 'css/font.css'; ?>" type="text/css" charset="utf-8" />
            <link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,900,700,500' rel='stylesheet' type='text/css'>
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
                <script type="text/javascript" src="<?php echo WEBROOT . 'scripts/jquery.parallax-1.1.3.js'; ?>"></script>
                <script type="text/javascript" src="<?php echo WEBROOT . 'scripts/jquery.localscroll-1.2.7-min.js'; ?>"></script>
                <script type="text/javascript" src="<?php echo WEBROOT . 'scripts/jquery.scrollTo-1.4.2-min.js'; ?>"></script>
                <script src="<?php echo WEBROOT . 'scripts/jquery.scrollbox.js'; ?>"></script>
                <!-- Menu déroulant 
                <script type="text/javascript" src="scripts/afficheMenu.js"></script>-->
                <script>
                    function vaEtVient() {
                        if (document.getElementById('invisible').style.display == 'none') {
                            document.getElementById('invisible').style.display = 'block';
                        }
                        else {
                            document.getElementById('invisible').style.display = 'none';
                        }
                    }
                </script>



                <!--script pour le temp de monté de effet parralax-->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#nav').localScroll(800);
                        //.parallax(xPosition, speedFactor, outerHeight) options:
                        //xPosition - Horizontal position of the element
                        //inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
                        //outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
                        //$('#intro').parallax("50%", 0.1);
                        //$('#second').parallax("50%", 0.1);
                        $('.bg').parallax("50%", 0.4);
                        $('.bg2').parallax("50%", 0.2);
                        $('.bg3').parallax("50%", 0.8);

                    });
                </script>
                <!--boutton partage facebook-->
                <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>

                </head>

                <body>
                    <header>
                        <nav>
                            <div id="nav">
                                <div id="nav-logo">
                                    <a href="<?php echo WEBROOT; ?>">DUCK CITY</a>
                                </div>
                                <div id="menu-deroulant">

                                    <ul class="menu-ul">
                                        <li>
                                            <a href='javascript: vaEtVient()'  class="menu-deroulant">Menu <img src="<?php echo WEBROOT . 'images/fleche-connection.png'; ?>"></a>
                                            <ul id="invisible" class="nav-menu" >
                                                <li><a <?php if ($nav_en_cours == 'page-shop') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'shop.php'; ?>">Shop</a></li>
                                                <li><a <?php if ($nav_en_cours == 'page-personnalisation') echo ' id="en-cours"'; ?>href="<?php echo WEBROOT . 'personnalisation.php'; ?>">Personnalisation</a></li>
                                                <li><a <?php if ($nav_en_cours == 'page-collection') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'ma-collection.php'; ?>">Ma collection</a></li>
                                                <li><a <?php if ($nav_en_cours == 'page-contact') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'contact.php'; ?>">Contact</a></li>
                                                <li class="trait-separation">|</li>

                                                <li class="connexion">
                                                    <?php if (isset($_SESSION['user']['logged']) && $_SESSION['user']['logged'] === true): ?>                                                    
                                                    <a><?php echo 'Bonjour ' . $_SESSION['user']['pseudo']; ?></a>
                                                        <ul>
                                                            <li><a id="deconnection" href="" style="display:none;">Se déconnecter</a></li>
                                                            <li><a id="panier" href="<?php echo WEBROOT . 'panier.php'; ?>">Mon panier</a></li>
                                                            <li><a id="profil" href="<?php echo WEBROOT . 'profil.php'; ?>">Mon profil</a></li>
                                                        </ul>
                                                    <?php else: ?>
                                                        <a <?php if ($nav_en_cours == 'page-inscription') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'views/users/inscription.php'; ?>">Créer un compte</a>
                                                        <a <?php if ($nav_en_cours == 'page-connexion') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'views/users/connexion.php'; ?>">Connexion</a>
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <?php if (isset($_SESSION['prompt']) && !empty($_SESSION['prompt'])): ?>
                            <div id="prompt" class="<?php echo $_SESSION['prompt']['class']; ?>"><?php echo $_SESSION['prompt']['msg']; ?></div>
                            <?php unset($_SESSION['prompt']); ?>
                        <?php endif; ?>
                        <?php
                        //N'affichez que si page courante = homepage
                        if ($_SERVER['PHP_SELF'] == WEBROOT . 'index.php'):
                            ?>
                            <div id="bg-header">
                                <h1>DUCK CITY</h1>
                                <div class="bg"></div>
                                <div class="bg2"></div>
                                <div class="bg3"></div>
                            </div>
                        <?php endif; ?>
                    </header>





                    <!--<nav>
                            <div id="nav">
                                    <div id="nav-logo">
                                            <a href="index.php">DUCK CITY</a>
                                    </div>
                                    <div id="menu-deroulant"><img src=""><a>Menu <img src="images/fleche-connection.png"></a></div>
                                    <div id="nav-menu">
                                    <ul>
                                            <li class="shop">
                                                    <a <?php //if ($nav_en_cours == 'page-shop') {echo ' id="en-cours"';}                       ?>>Shop</a>
                                                    <ul class="">
                                                            <li><a href="gallery.php">Galerie</a></li>
                                                            <li><a href="customisation.php">Customisation</a></li>
                                                    </ul>
                                            </li>
                                            <li ><a <?php //if ($nav_en_cours == 'page-collection') {echo ' id="en-cours"';}                       ?> href="ma-collection.php">Ma collection</a></li>
                                            <li><a <?php //if ($nav_en_cours == 'page-contact') {echo ' id="en-cours"';}                       ?> href="contact.php">Contact</a></li>
                                            <li class="connexion">|</li>
                                            <li class="menu" id="menu1" onclick="afficheMenu(this)"><a>Connexion <img src="images/fleche-connection.png"></a>
                                                    <ul id="sousmenu1" style="display:none">
                                                            <li class="sousmenu"><a id="connection" href="">Se connecter</a></li>
                                                            <li class="sousmenu"><a href="">S'inscrire</a></li>
                                                            <li class="sousmenu"><a id="deconnection" href="">Se déconnecter</a></li>
                                                            <li class="sousmenu"><a id="panier" href="panier.php">Mon panier</a></li>
                                                            <li class="sousmenu"><a id="profil" href="">Mon profil</a></li>
                                                    </ul>
                                            </li>
                                    </ul>
                                    </div>
                            </div>
                    </nav>-->