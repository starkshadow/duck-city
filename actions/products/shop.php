<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/actionconf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/Product.class.php';
$model = new Product();


//récupérer les données utilisateur
$products = $model->getall();
//die(var_dump($products));

if (isset($products) && !empty($products)) {
    $_SESSION['viewvars']['products'] = $products;
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/products/shop.php');
    exit();
} else {
    $_SESSION['prompt'] = array(
        'class' => 'error',
        'msg' => 'Les canards n\'ont pas pu &ecirc;tre retrouv&eacute;s',
    );
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
    exit();
}
