<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/User.class.php';

if (isset($_POST) && !empty($_POST)) {
    $model = new User();
    $user = array(
        'pseudo' => $_POST['pseudo'],
        'email' => $_POST['email'],
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'password' => $_POST['password'],
        'confirmpassword' => array('password' => $_POST['password'], 'confirm' => $_POST['confirmpassword']),
        'number' => $_POST['number'],
        'street' => $_POST['street'],
        'postcode' => $_POST['postcode'],
        'city' => $_POST['city'],
        'country' => $_POST['country'],
    );


    //validation
    $validation = $model->validate($user, 'create');
    if ($validation === true) {
        //retirer champ confirmpassword pour DB
        unset($user['confirmpassword']);
        //password encryption 
        $user['password'] = sha1($user['password']);

        if ($model->add($user)) {
            $_SESSION['prompt'] = array(
                'class' => 'success',
                'msg' => 'Vous &ecirc;tes d&eacute;sormais inscrit !',
            );
            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
            exit();
        } else {
            $_SESSION['viewvars']['post_data'] = $_POST;
            $_SESSION['prompt'] = array(
                'class' => 'error',
                'msg' => 'Erreur lors de l\'inscription. R&eacute;essayez svp',
            );
            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/inscription.php');
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
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/inscription.php');
        exit();
    }
} else {
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/inscription.php');
    exit();
}