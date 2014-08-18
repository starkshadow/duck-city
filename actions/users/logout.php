<?php

session_start();

if (isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['user']['logged']) && !empty($_SESSION['user']['logged'])) {
    //destruction des données de l'utilisateur en session
    unset($_SESSION['user']);

    //ré-initialisation des données de l'utilisateur en session
    $_SESSION['user'] = array('logged' => false);

    $_SESSION['prompt'] = array(
        'class' => 'success',
        'msg' => 'D&eacute;connect&eacute;',
    );
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
    exit();
} else {
    $_SESSION['prompt'] = array(
        'class' => 'error',
        'msg' => 'Vous n\'&ecirc;tes pas connect&eacute;',
    );
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
    exit();
}