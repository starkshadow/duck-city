<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/User.class.php';

if (isset($_POST) && !empty($_POST)) {
    $_SESSION['post_data'] = $_POST;
    $model = new User();

    if ($model->exists('', $_POST['email'], sha1($_POST['password']))) {
        $_SESSION['user'] = $model->getone($_POST['email']);

        $_SESSION['prompt'] = array(
            'class' => 'success',
            'msg' => 'Connect&eacute;',
        );
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/profil.php');
        exit();
    } else {
        $_SESSION['errors_form'] = $validation;
        $_SESSION['prompt'] = array(
            'class' => 'error',
            'msg' => 'Login ou mot de passe incorrect',
        );
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/connexion.php');
        exit();
    }
} else {
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/connexion.php');
    exit();
}