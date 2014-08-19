<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/actionconf.php';

//vérification que l'utilisateur est connecté et donc a accès a la page de profil
if (!(isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['user']['logged']) && $_SESSION['user']['logged'] === true)) {
    //redirection vers la homepage si l'utilisateur n'est pas connecté
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
    exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/User.class.php';
$model = new User();

//si formulaire a été envoyé
if (isset($_POST) && !empty($_POST)) {
    $model = new User();
    $user = array(
        'id' => $_SESSION['user']['id'],
        'pseudo' => $_POST['pseudo'],
        'email' => array('id' => $_SESSION['user']['id'], 'email' => $_POST['email']),
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'number' => $_POST['number'],
        'street' => $_POST['street'],
        'postcode' => $_POST['postcode'],
        'city' => $_POST['city'],
        'country' => $_POST['country'],
    );


    //validation
    $validation = $model->validate($user, 'update');
    if ($validation === true) {
        $user['email'] = $_POST['email'];
        if ($model->update($user)) {
            $_SESSION['prompt'] = array(
                'class' => 'success',
                'msg' => 'Profil mis à jour !',
            );
            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/actions/users/profil.php');
            exit();
        } else {
            $_SESSION['viewvars']['post_data'] = $_POST;
            $_SESSION['prompt'] = array(
                'class' => 'error',
                'msg' => 'Erreur lors de l\'enregistrement. R&eacute;essayez svp',
            );
        }
    } else {
        $_SESSION['viewvars']['post_data'] = $_POST;
        $_SESSION['viewvars']['errors'] = $validation;
        $_SESSION['prompt'] = array(
            'class' => 'error',
            'msg' => 'Des erreurs ont &eacute;t&eacute; trouv&eacute;es dans votre formulaire',
        );
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/update.php');
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
            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/update.php');
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
}