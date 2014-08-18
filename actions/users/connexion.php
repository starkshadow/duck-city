<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/User.class.php';

if (isset($_POST) && !empty($_POST)) {
    $model = new User();

    if ($model->exists('', $_POST['email'], sha1($_POST['password']))) {
        $user = $model->getone($_POST['email']);


        $_SESSION['user'] = array(
            'id' => (int) $user['id'],
            'pseudo' => $user['pseudo'],
            'email' => $user['email'],
            'isadmin' => (int) $user['isadmin'],
            'logged' => true,
        );

        //données à envoyer à la vue profil pour afficher remplir le formulaire d'update
        $_SESSION['viewvars']['user'] = array(
            'id' => (int) $user['id'],
            'pseudo' => $user['pseudo'],
            'email' => $user['email'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'logo' => $user['logo'],
            'number' => $user['number'],
            'street' => $user['street'],
            'postcode' => (int) $user['postcode'],
            'city' => $user['city'],
            'country' => $user['country'],
        );
        $_SESSION['prompt'] = array(
            'class' => 'success',
            'msg' => 'Connect&eacute;',
        );
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/profil.php');
        exit();
    } else {
        $_SESSION['viewvars']['post_data'] = $_POST;
        $_SESSION['viewvars']['errors_form'] = $validation;
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