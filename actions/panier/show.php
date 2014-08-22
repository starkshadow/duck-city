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

    $handle = new upload($_FILES['image_field']);
    if ($handle->uploaded) {
        $handle->file_new_name_body = 'image_resized';
        $handle->image_resize = true;
        $handle->image_x = 100;
        $handle->image_ratio_y = true;
        $handle->process('/home/user/files/');
        if ($handle->processed) {
            echo 'image resized';
            $handle->clean();
        } else {
            echo 'error : ' . $handle->error;
        }
    }

    //validation
    $validation = $model->validate($user, 'update');
    if ($validation === true) {
        $user['email'] = $_POST['email'];
        //update en DB
        if ($model->update($user)) {
            $_SESSION['prompt'] = array(
                'class' => 'success',
                'msg' => 'Votre profil a été mis à jour !',
            );
            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/actions/users/profil.php');
            exit();
        } else {
            //bypass le système de forcer le refresh
            $_SESSION['nav']['refreshed'] = true;

            $_SESSION['viewvars']['post_data'] = $_POST;
            $_SESSION['prompt'] = array(
                'class' => 'error',
                'msg' => 'Erreur lors de l\'enregistrement. R&eacute;essayez svp',
            );
            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/update.php');
            exit();
        }
    } else {
        //bypass le système de forcer le refresh
        $_SESSION['nav']['refreshed'] = true;

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