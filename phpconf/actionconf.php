<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

if (isset($_SESSION['nav']) && !empty($_SESSION['nav'])) {
//    die('in if');
    //vérif si la page précédente est la vue correspondant cette action et que la page doit subir un refresh
//    var_dump('STR_REPLACE ==> ' . str_replace('actions', 'views', $_SESSION['nav']['last_page']) == $_SERVER['PHP_SELF']);
//    var_dump('CONDITION ==> ' . str_replace('actions', 'views', $_SESSION['nav']['last_page']) == $_SERVER['PHP_SELF']);
//    die('END');
    if (isset($_SESSION['nav']['last_page']) && !empty($_SESSION['nav']['last_page']) && str_replace('actions', 'views', $_SESSION['nav']['last_page']) == $_SERVER['PHP_SELF']) {
        
        $_SESSION['nav']['refreshed'] = true;
    }
}else{
//    die('in else');
}