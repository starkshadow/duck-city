<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/actionconf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/User.class.php';

$model = new User();

//vérification que l'utilisateur n'est pas déjà connecté
if (isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['user']['logged']) && $_SESSION['user']['logged'] === true && $model->uexists($_SESSION['user']['id'])) {
    //si oui ==> redirection sur sa page de profil
    $_SESSION['prompt'] = array(
        'class' => 'error',
        'msg' => 'Vous &ecirc;tes d&eacute;j&agrave; connect&eacute; !',
    );
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/actions/users/profil.php');
    exit();
}

if (isset($_POST) && !empty($_POST)) {


    if ($model->uexists('', $_POST['email'], sha1($_POST['password']))) {
        $user = $model->getone('', $_POST['email']);

        $_SESSION['user'] = $user;
        $_SESSION['user']['logged'] = true;

        //données à envoyer à la vue profil pour afficher remplir le formulaire d'update
        $_SESSION['viewvars']['user'] = $user;
        $_SESSION['prompt'] = array(
            'class' => 'success',
            'msg' => 'Connect&eacute;',
        );
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/profil.php');
        exit();
    } else {
        //bypass le système de refresh forcé de la vue
        $_SESSION['nav']['refreshed'] = true;
        $_SESSION['viewvars']['post_data'] = $_POST;
        $_SESSION['prompt'] = array(
            'class' => 'error',
            'msg' => 'Login ou mot de passe incorrect',
        );
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/connexion.php');
        exit();
    }
} else {
    $_SESSION['viewvars']['post_data'] = $_POST;
    $_SESSION['prompt'] = array(
        'class' => 'error',
        'msg' => 'Erreur de la tentative de connexion. R&eacute;essayez svp',
    );
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/connexion.php');
    exit();
}