<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/tfe/duck-city/phpconf/actionconf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tfe/duck-city/models/User.class.php';
$model = new User();

//vérification que l'utilisateur est connecté et que son compte existe
if (!(isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['user']['logged']) && $_SESSION['user']['logged'] === true) && $model->uexists($_SESSION['user']['id'])) {
    //redirection vers la homepage si l'utilisateur n'est pas connecté
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/');
    exit();
}


//si formulaire a été envoyé
if (isset($_POST) && !empty($_POST)) {
    $user = array(
        'id' => $_SESSION['user']['id'],
        'password' => $_POST['password'],
        'oldpassword' => array('id' => $_SESSION['user']['id'], 'oldpassword' => $_POST['oldpassword']),
        'confirmpassword' => array('password' => $_POST['password'], 'confirm' => $_POST['confirmpassword']),
    );

    //validation
    $validation = $model->validate($user, 'update');
    if ($validation === true) {
        $user = array(
            'id' => $_SESSION['user']['id'],
            'password' => sha1($_POST['password']),
        );
        $user['email'] = $_POST['email'];
        //update en DB
        if ($model->update($user)) {
            $_SESSION['prompt'] = array(
                'class' => 'success',
                'msg' => 'Mot de passe modifié !',
            );
            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/actions/users/profil.php');
            exit();
        } else {
            //bypass le système de forcer le refresh
            $_SESSION['nav']['refreshed'] = true;
            $_SESSION['viewvars']['post_data'] = $_POST;
            $_SESSION['prompt'] = array(
                'class' => 'error',
                'msg' => 'Erreur lors de l\'enregistrement. R&eacute;essayez svp',
            );
            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/views/users/password.php');
            exit();
        }
    } else {
        //bypass le système de refresh forcé de la vue
        $_SESSION['nav']['refreshed'] = true;

        $_SESSION['viewvars']['post_data'] = $_POST;
        $_SESSION['viewvars']['errors'] = $validation;
        $_SESSION['prompt'] = array(
            'class' => 'error',
            'msg' => 'Des erreurs ont &eacute;t&eacute; trouv&eacute;es dans votre formulaire',
        );
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/views/users/password.php');
        exit();
    }
}
//sinon récupérer les données utilisateurs et afficher le formulaire
else {
    //vérifier si l'utilisateur existe en DB
    if ($model->uexists($_SESSION['user']['id'])) {
        //récupérer les données utilisateur
        $user = $model->getone($_SESSION['user']['id']);
        if (isset($user) && !empty($user)) {
            $_SESSION['viewvars']['user']['pseudo'] = $user['pseudo'];
            $_SESSION['viewvars']['post_data'] = $user;
            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/views/users/password.php');
            exit();
        } else {
            $_SESSION['prompt'] = array(
                'class' => 'error',
                'msg' => 'Les donn&eacute;es de votre compte n\'ont pas pu &ecirc;tre retrouv&eacute;es',
            );
            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/');
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
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/');
        exit();
    }
}