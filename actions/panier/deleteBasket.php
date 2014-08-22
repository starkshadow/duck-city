<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/actionconf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/User.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/Product.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/SelectedProduct.class.php';

$userModel = new User();

//vérification que l'utilisateur est connecté et que son compte existe
if (!(isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['user']['logged']) && $_SESSION['user']['logged'] === true) && $userModel->uexists($_SESSION['user']['id'])) {
    //redirection vers la homepage si l'utilisateur n'est pas connecté
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
    exit();
}

$model = new SelectedProduct();

//vérification que le panier n'est pas vide
if ($model->count('user_id', $_SESSION['user']['id'])) {
    //suppression
    $model->deleteBasket($_SESSION['user']['id']);
    $_SESSION['prompt'] = array(
        'class' => 'success',
        'msg' => 'Votre panier a &eacute;t&eacute; vid&eacute; !',
    );
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/panier/show.php');
    exit();
} else {
    $_SESSION['prompt'] = array(
        'class' => 'error',
        'msg' => 'Votre panier est d&eacute;j&agrave; vide',
    );
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/panier/show.php');
    exit();
}