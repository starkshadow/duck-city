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
//    (var_dump($_POST));
    $user = array(
        'id' => $_SESSION['user']['id'],
        'password' => array('id' => $_SESSION['user']['id'], 'password' => $_POST['password']),
        'confirmpassword' => array('password' => $_POST['password'], 'confirm' => $_POST['confirmpassword']),
    );

    //validation
    $validation = $model->validate($user, 'delete');
    var_dump($validation);
    if ($validation === true) {
        $user = $model->getone($_SESSION['user']['id']);

        if (isset($user) && !empty($user)) {
            //suppression des fichiers de l'utilisateur
            $userdir = $_SERVER['DOCUMENT_ROOT'] . '/tfe/duck-city/data/users/' . $_SESSION['user']['id'];

            if (file_exists($userdir) && is_dir($userdir)) {
                //parcours le dossier utilisateur
                $files = scandir($userdir);
                foreach ($files as $file) {
                    unlink($userdir . '/' . $file);
                }
                //suppression dossier vide
                rmdir($userdir);
            }

            /**
             * Suppression des data user en DB :
             * table user
             */
            $model->delete($_SESSION['user']['id']);
        }
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/actions/users/logout.php');
        exit();
    } else {
        //bypass le système de refresh forcé de la vue
        $_SESSION['nav']['refreshed'] = true;

        $_SESSION['viewvars']['post_data'] = $_POST;
        $_SESSION['viewvars']['errors'] = $validation;
        $_SESSION['prompt'] = array(
            'class' => 'error',
            'msg' => 'Des erreurs ont &eacute;t&eacute; trouv&eacute;es dans votre formulaire',
        );
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/views/users/delete.php');
        exit();
    }
}
//sinon récupérer les données utilisateurs et afficher le formulaire
else {
    //vérifier si l'utilisateur existe en DB
    if ($model->uexists($_SESSION['user']['id'])) {
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/views/users/delete.php');
        exit();
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