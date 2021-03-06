<?php session_start(); ?>
<?php

//debug session
//var_dump('SESSION');
//var_dump($_SESSION);
//die('END');
//si historique de navigation n'existe pas en session => le créer
if (!isset($_SESSION['nav']) || empty($_SESSION['nav'])):
    $_SESSION['nav'] = array(
        'last_page' => '',
        'refreshed' => false, //définit si la page a subi un refresh et est passée par l'action correspondante        
    );
//s'il s'agit d'un refresh de la vue => rediriger vers l'action de la page --> exception s'il s'agit de la page d'accueil (vue que refresh la page d'accueil ne fait pas passer par un fichier php action)
elseif ($_SERVER['PHP_SELF'] !== '/tfe/duck-city/index.php' && isset($_SESSION['nav']['last_page']) && $_SESSION['nav']['last_page'] === $_SERVER['PHP_SELF'] && $_SESSION['nav']['refreshed'] === false):
    //enregistrement de last_page
    $_SESSION['nav']['last_page'] = $_SERVER['PHP_SELF'];
    //création de l'url de l'action correspondante en remplaçant le dossier 'views' par 'actions' dans l'url
    $redirect = str_replace('views', 'actions', $_SERVER['PHP_SELF']);
    if (isset($_GET) && !empty($_GET)) {
        $redirect .= '?' . http_build_query($_GET, '', '&');
    }
    //redirect
    header('Location: http://' . $_SERVER['SERVER_NAME'] . $redirect);
else:
    //enregistrement de last_page
    $_SESSION['nav']['last_page'] = $_SERVER['PHP_SELF'];
    $_SESSION['nav']['refreshed'] = false;
endif;

//récupération des données pour la vue
$vars = array();
if (isset($_SESSION['viewvars']) && !empty($_SESSION['viewvars'])):
    $vars = $_SESSION['viewvars'];
    unset($_SESSION['viewvars']);
endif;

//debug viewvars
//var_dump('VIEWVARS');
//var_dump($vars);