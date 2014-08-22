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


//si formulaire a été envoyé
if (isset($_POST) && !empty($_POST)) {
    $vars = array(
        'product_id' => $_POST['product_id'],
        'quantity' => $_POST['quantity'],
    );

    $productModel = new Product();
    if ($productModel->exists($vars['product_id'])) {
        $selectedProductModel = new SelectedProduct();
        $selectedProduct = array(
            'user_id' => $_SESSION['user']['id'],
            'product_id' => $vars['product_id'],
            'quantity' => $vars['quantity'],
        );

        if ($selectedProductModel->validate($selectedProduct, 'create')) {
            if ($selectedProductModel->add($selectedProduct)) {
                echo 'Canard ajouté au panier !';
            } else {
                echo 'Problème lors de l\'ajout du canard !';
            }
        } else {
            echo 'Problème lors de l\'ajout du canard !';
        }
    } else {
        echo 'Problème lors de l\'ajout du canard !';
    }
}