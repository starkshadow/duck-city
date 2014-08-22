<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/actionconf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/Product.class.php';
$model = new Product();

//récupérer les données utilisateur
//init paramètres par défaut
$params = array(
    'order' => '',
    'direction' => '',
    'limit' => 15,
    'page' => 1,
);
//récupération paramètres pour pagination
if (isset($_GET) && !empty($_GET)) {
    if (isset($_GET['o']) && !empty($_GET['o'])) {
        $params['order'] = $_GET['o'];
    }
    if (isset($_GET['d']) && !empty($_GET['d'])) {
        $params['direction'] = $_GET['d'];
    }
    if (isset($_GET['l']) && !empty($_GET['l'])) {
        $params['limit'] = $_GET['l'];
    }
    if (isset($_GET['p']) && !empty($_GET['p'])) {
        $params['page'] = $_GET['p'];
    }
    $_SESSION['viewvars']['GET'] = $_GET;
}



$products = $model->getall($params['order'], $params['direction'], $params['limit'], $params['page']);

//die(var_dump($products));

if (isset($products) && !empty($products)) {
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/products/shop.php';
    $_SESSION['viewvars']['products'] = $products;
    $_SESSION['viewvars']['current_page'] = $params['page'];
    
    $count = $model->count();
    if (isset($count) && (int) $count) {
        $nbpage = (int) ($count / $params['limit']);
        if ($count % $params['limit']) {
            $nbpage++;
        }
        $_SESSION['viewvars']['products_countpages'] = $nbpage;
    }

    $_SESSION['viewvars']['products_count'] = $count;


    if (isset($_GET) && !empty($_GET)) {
        $url .= '?' . http_build_query($_GET, '', '&');
    }
    header('Location: ' . $url);
    exit();
} else {
    $_SESSION['prompt'] = array(
        'class' => 'error',
        'msg' => 'Les canards n\'ont pas pu &ecirc;tre retrouv&eacute;s',
    );
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
    exit();
}
