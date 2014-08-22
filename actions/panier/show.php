<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/actionconf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/User.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/Product.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/SelectedProduct.class.php';
$model = new User();

//vérification que l'utilisateur est connecté et que son compte existe
if (!(isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['user']['logged']) && $_SESSION['user']['logged'] === true) && $model->uexists($_SESSION['user']['id'])) {
    //redirection vers la homepage si l'utilisateur n'est pas connecté
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
    exit();
}


//si formulaire a été envoyé
if (isset($_POST) && !empty($_POST)) {
    
}
//sinon récupérer les données du panier et afficher le formulaire
else {
    $selectedProductModel = new SelectedProduct();
    $sproducts = $selectedProductModel->getBasket($_SESSION['user']['id']);

    if (isset($sproducts) && !empty($sproducts)) {
        $_SESSION['viewvars']['sproducts'] = $sproducts;
    } else {
        $_SESSION['prompt'] = array(
            'class' => 'error',
            'msg' => 'Votre panier est vide',
        );
    }
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/panier/show.php');
    exit();
}