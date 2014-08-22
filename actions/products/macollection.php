<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/actionconf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/Product.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/BoughtProduct.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/User.class.php';
$model = new User();

//vérification que l'utilisateur est connecté et que son compte existe
if (!(isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['user']['logged']) && $_SESSION['user']['logged'] === true) && $model->uexists($_SESSION['user']['id'])) {
    //redirection vers la homepage si l'utilisateur n'est pas connecté
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
    exit();
}

$boughtModel = new BoughtProduct();
$boughtProducts = $boughtModel->getall();

if (isset($boughtProducts) && !empty($boughtProducts)) {
    $_SESSION['viewvars']['boughtProducts'] = $boughtProducts;
}

$lastproduct = $boughtModel->getlast('user_id = ' . $_SESSION['user']['id']);
if (isset($lastproduct) && !empty($lastproduct)) {
    $_SESSION['viewvars']['lastproduct'] = $lastproduct;
}

header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/products/macollection.php');
exit();
