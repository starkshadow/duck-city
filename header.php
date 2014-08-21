<?php
/**
 * define of global vars
 */
define('WEBROOT', '/duck-city/');
define('DEFAULTAVATARIMG', '/duck-city/images/default_avatar.jpg');
define('DEFAULTDUCKIMG', '/duck-city/images/default_duck.png');
?>

<?php
//debug des variables sessions
//var_dump('SESSION');
//var_dump($_SESSION);
?>

<?php
//set la variable session de l'utilisateur si elle n'existe pas
if (!isset($_SESSION['user']) || empty($_SESSION['user'])):
    $_SESSION['user'] = array('logged' => false);
endif;
?>

<?php
header('Pragma: no-cache');
header('cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="<?php echo WEBROOT . 'scripts/jquery-1.11.1.min.js'; ?>"></script>
        <title>DUCK CITY</title>
        <link rel="icon" type="image/png" href="<?php echo WEBROOT . 'images/favicon.png'; ?>" />
        <link href="<?php echo WEBROOT . 'css/style.css'; ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo WEBROOT . 'css/grid.css'; ?>">
            <link rel="stylesheet" href="<?php echo WEBROOT . 'css/font.css'; ?>" type="text/css" charset="utf-8" />
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
            <!-- script pour les réactions communes à toutes les pages !-->
            <script src="<?php echo WEBROOT . '/scripts/common.js'; ?>"></script>


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
            <!--<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>-->

            <!--script pour trouver la hauteur de la fenetre-->
            <script type="text/javascript">
                function fitHeights() {
                    windowHeight = jQuery(window).height();
                    windowHeight = jQuery(window).height();
                    jQuery('.window-resize-margin-top-nr').css({"margin-top": windowHeight + 'px'});

                    jQuery('.window-resize-top-nr').css({"top": windowHeight + 'px'});
                    jQuery('.window-resize-min-height-nr').css({"min-height": windowHeight + 'px'});
                    jQuery('.window-resize-height-nr').css({"height": windowHeight + 'px'});
                    jQuery('.window-resize-line-height-nr').css({"line-height": windowHeight + 'px'});
                    if (windowHeight < 800)
                        windowHeight = 800;
                    jQuery('.window-resize-margin-top').css({"margin-top": windowHeight + 'px'});
                    jQuery('.window-resize-top').css({"top": windowHeight + 'px'});
                    jQuery('.window-resize-min-height').css({"min-height": windowHeight + 'px'});
                    jQuery('.window-resize-height').css({"height": windowHeight + 'px'});
                    jQuery('.window-resize-line-height').css({"line-height": windowHeight + 'px'});
                }
                function fitWidths() {
                    windowWidth = jQuery(window).width();
                    jQuery('.window-resize-width').css({"width": windowWidth + 'px'});
                }
                jQuery(function() {

                    fitHeights();
                    fitWidths();
                    jQuery(window).resize(function() {
                        fitHeights();
                        fitWidths();
                    });
                });

            </script>




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
                                    <li><a <?php if ($nav_en_cours == 'page-shop') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/products/shop.php'; ?>">Shop</a></li>
                                    <li><a <?php if ($nav_en_cours == 'page-personnalisation') echo ' id="en-cours"'; ?>href="<?php echo WEBROOT . 'personnalisation.php'; ?>">Personnalisation</a></li>                                                
                                    <li><a <?php if ($nav_en_cours == 'page-contact') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'contact.php'; ?>">Contact</a></li>
                                    <li class="trait-separation">|</li>
                                    <li class="image-profil">
                                        <?php if (isset($_SESSION['user']['avatar_thumb']) && file_exists($_SERVER['DOCUMENT_ROOT'] . $_SESSION['user']['avatar_thumb'])): ?>
                                            <?php $img = $_SESSION['user']['avatar_thumb']; ?>
                                        <?php else: ?>
                                            <?php $img = DEFAULTDUCKIMG; ?>
                                        <?php endif; ?>
                                        <a href="<?php echo WEBROOT . 'actions/users/profil.php'; ?>">
                                            <?php if (isset($_SESSION['user']['avatar_thumb']) && !empty($_SESSION['user']['avatar_thumb']) && file_exists($_SERVER['DOCUMENT_ROOT'] . $_SESSION['user']['avatar_thumb'])): ?>
                                                <img alt="Avatar photo de profil" src="<?php echo $img; ?>" />
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                    <li class="connexion">
                                        <?php if (isset($_SESSION['user']['logged']) && $_SESSION['user']['logged'] === true): ?>                                                    
                                            <a href="<?php echo WEBROOT . 'actions/users/profil.php'; ?>">
                                                <?php echo 'Bonjour ' . $_SESSION['user']['pseudo']; ?>
                                            </a>
                                            <ul>                                                            
                                                <li><a id="panier" href="<?php echo WEBROOT . 'views/products/panier.php'; ?>">Mon panier</a></li>
                                                <li><a id="profil" href="<?php echo WEBROOT . 'actions/users/profil.php'; ?>">Mon profil</a></li>
                                                <li><a <?php if ($nav_en_cours == 'page-collection') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'views/products/ma-collection.php'; ?>">Ma collection</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a id="deconnection" href="<?php echo WEBROOT . 'actions/users/logout.php' ?>">Se déconnecter</a>
                                        <?php else: ?>
                                            <li>
                                                <a <?php if ($nav_en_cours == 'page-inscription') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/inscription.php'; ?>">Créer un compte</a>
                                            </li>
                                            <li>
                                                <a <?php if ($nav_en_cours == 'page-connexion') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'views/users/connexion.php'; ?>">Connexion</a>
                                            </li>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
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

            <div class="box-prompt">
                <?php if (isset($_SESSION['prompt']) && !empty($_SESSION['prompt'])): ?>
                    <div id="prompt" class="<?php echo $_SESSION['prompt']['class']; ?>"><?php echo $_SESSION['prompt']['msg']; ?></div>
                    <?php unset($_SESSION['prompt']); ?>
                <?php endif; ?>  
            </div>

        </header>





