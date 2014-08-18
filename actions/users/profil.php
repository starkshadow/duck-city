<?php

session_start();

//vérification que l'utilisateur est connecté et donc a accès a la page de profil
if (!(isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['user']['logged']) && $_SESSION['user']['logged'] === true)) {
    //redirection vers la homepage si l'utilisateur n'est pas connecté
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
    exit();
}

require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/User.class.php';

$model = new User();

//vérifier si l'utilisateur existe en DB
if ($model->exists($_SESSION['user']['id'])) {
    //récupérer les données utilisateur
    $user = $model->getone($_SESSION['user']['id']);
    if (isset($user) && !empty($user)) {
        $_SESSION['viewvars']['user'] = array(
            'id' => $user['id'],
            'pseudo' => $user['pseudo'],
            'email' => $user['email'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'logo' => $user['logo'],
            'number' => (int) $user['number'],
            'street' => $user['street'],
            'postcode' => (int) $user['postcode'],
            'city' => $user['city'],
            'country' => $user['country'],
            'created' => $user['created'],
        );
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/profil.php');
        exit();
    } else {
        $_SESSION['prompt'] = array(
            'class' => 'error',
            'msg' => 'Les donn&eacute;es de votre compte n\'ont pas pu &ecirc;tre retrouv&eacute;es',
        );
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
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
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
    exit();
}