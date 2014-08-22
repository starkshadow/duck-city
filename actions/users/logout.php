<?php

session_start();

if (isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['user']['logged']) && $_SESSION['user']['logged'] === true) {
    //destruction des données de l'utilisateur en session
    session_destroy();
    session_start();
    $_SESSION = array();
    $_SESSION['prompt'] = array(
        'class' => 'success',
        'msg' => 'Au revoir !',
    );
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/');
    exit();
} else {
    $_SESSION['prompt'] = array(
        'class' => 'error',
        'msg' => 'Vous n\'&ecirc;tes pas connect&eacute;',
    );
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/');
    exit();
}