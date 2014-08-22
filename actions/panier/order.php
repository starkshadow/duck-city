<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/actionconf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/User.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/Product.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/SelectedProduct.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/BoughtProduct.class.php';

$userModel = new User();

//vérification que l'utilisateur est connecté et que son compte existe
if (!(isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['user']['logged']) && $_SESSION['user']['logged'] === true) && $userModel->uexists($_SESSION['user']['id'])) {
    //redirection vers la homepage si l'utilisateur n'est pas connecté
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
    exit();
}

$selectedModel = new SelectedProduct();

//vérification que le panier n'est pas vide
if ($selectedModel->count('user_id', $_SESSION['user']['id'])) {
    //récupération du panier
    $sproducts = $selectedModel->getBasket($_SESSION['user']['id']);

    if (isset($sproducts) && !empty($sproducts)) {
        $mail = $_SESSION['user']['email'];
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) { // On filtre les serveurs qui présentent des bogues.
            $passage_ligne = "\r\n";
        } else {
            $passage_ligne = "\n";
        }

        $message_html = "<html><head></head><body><b>Bonjour " . $_SESSION['user']['firstname'] . " " . $_SESSION['user']['lastname'] . "," . $passage_ligne . "Voici un récapitulatif de votre commande." . $passage_ligne;
        $message_html .= '<table><tr><th>Canard</th><th>Prix Unité</th><th>Quantité</th><th>Total</th></tr>';

        $total = 0;
        foreach ($sproducts as $sproduct) {
            $message_html .= '<tr><td>' . $sproduct['Product']['name'] . '</td>';
            $message_html .= '<td>' . $sproduct['Product']['price'] . '&euro;' . '</td>';
            $message_html .= '<td>' . ($sproduct['quantity'] * $sproduct['Product']['price']) . ' &euro;' . '</td>';
            $message_html .= '<td>' . $sproduct['Product']['name'] . '</td></tr>';
            $total = $total + ($sproduct['quantity'] * $sproduct['Product']['price']);
        }

        $message_html .= "</table>" . $passage_ligne . "Total : " . $total . " &euro;" . $passage_ligne . "Merci d'avoir pass&eacute; commande chez nous !</body></html>";

        $sujet = "Duck-City : Votre Commande";

        $header = "From: \"Duck Master\"<duckmaster@duck-city.com>" . $passage_ligne;
        $header.= "Reply-to: \"Duck Master\"<duckmaster@duck-city.com>" . $passage_ligne;
        $header.= "MIME-Version: 1.0" . $passage_ligne;
        $header .= 'Content-type: text/html; charset=utf-8' . $passage_ligne;

        //envoi email
        mail($mail, $sujet, $message_html, $header);

        //insertion DB dans archives
        $boughtModel = new BoughtProduct();
        foreach ($sproducts as $sproduct) {
            $bproduct = array(
                'product_id' => $sproduct['Product']['id'],
                'user_id' => $_SESSION['user']['id'],
                'user_email' => $_SESSION['user']['email'],
                'product_name' => $sproduct['Product']['name'],
                'product_price' => $sproduct['Product']['price'],
                'product_quantity' => $sproduct['quantity'],
            );
//            (var_dump($bproduct));
            $boughtModel->add($bproduct);
            $selectedModel->delete($sproduct['id']);
        }
//        die('END');

        //vider panier
       
//        $selectedModel->deleteBasket($_SESSION['user']['id']);

        $_SESSION['prompt'] = array(
            'class' => 'success',
            'msg' => 'Votre commande a &eacute;t&eacute; effectu&eacute;e',
        );

        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/actions/panier/show.php');
        exit();
    } else {
        
    }
} else {
    $_SESSION['prompt'] = array(
        'class' => 'error',
        'msg' => 'Votre panier est d&eacute;j&agrave; vide',
    );
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/panier/show.php');
    exit();
}