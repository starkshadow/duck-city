<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/tfe/duck-city/phpconf/actionconf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tfe/duck-city/models/User.class.php';
$model = new User();

//vérification que l'utilisateur est connecté et que son compte existe
if (!(isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['user']['logged']) && $_SESSION['user']['logged'] === true) && $model->uexists($_SESSION['user']['id'])) {
    //redirection vers la homepage si l'utilisateur n'est pas connecté
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city');
    exit();
}


//vérifier si l'utilisateur existe en DB
if ($model->uexists($_SESSION['user']['id'])) {
    //récupérer les données utilisateur
    $user = $model->getone($_SESSION['user']['id']);
    if (isset($user) && !empty($user)) {
        $_SESSION['viewvars']['user'] = $user;
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/views/users/profil.php');
        exit();
    } else {
        $_SESSION['prompt'] = array(
            'class' => 'error',
            'msg' => 'Les donn&eacute;es de votre compte n\'ont pas pu &ecirc;tre retrouv&eacute;es',
        );
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city');
        exit();
    }
} else {
    $_SESSION['prompt'] = array(
        'class' => 'error',
        'msg' => 'Erreur : votre compte n\'existe plus',
    );
    //destruction des données de l'utilisateur en session
    unset($_SESSION['user']);
    //ré-initialisation des données de l'utilisateur en session
    $_SESSION['user'] = array('logged' => false);
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city');
    exit();
}