<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/tfe/duck-city/phpconf/actionconf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tfe/duck-city/models/Product.class.php';
$model = new Product();


//récupération paramètres pour pagination
if (isset($_GET) && !empty($_GET) && isset($_GET['id']) && !empty($_GET['id']) && (int) $_GET['id']) {
    $_SESSION['viewvars']['GET'] = $_GET;
    $product = $model->getone($_GET['id']);

    if (isset($product) && !empty($product)) {
        $_SESSION['viewvars']['product'] = $product;
        $url = 'http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/views/products/details.php?' . http_build_query($_GET, '', '&');
        header('Location: ' . $url);
        exit();
    } else {
        $_SESSION['prompt'] = array(
            'class' => 'error',
            'msg' => 'Le canard que vous cherchez n\'existe plus',
        );
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/actions/products/shop.php');
        exit();
        exit();
    }
} else {
    $_SESSION['prompt'] = array(
        'class' => 'error',
        'msg' => 'Une erreur s\'est produite. Veuillez recommencer.',
    );
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/tfe/duck-city/actions/products/shop.php');
    exit();
}