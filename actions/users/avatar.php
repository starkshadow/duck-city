<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/actionconf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/class.upload.php';

//vérification que l'utilisateur est connecté et donc a accès a la page de profil
if (!(isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['user']['logged']) && $_SESSION['user']['logged'] === true)) {
    //redirection vers la homepage si l'utilisateur n'est pas connecté
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
    exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/models/User.class.php';
$model = new User();

//si formulaire a été envoyé
if (isset($_POST) && !empty($_POST)) {
    //validation
    $handle = new upload($_FILES['avatar'], 'fr_FR');

    if ($handle->uploaded) {
        //le fichier est-il une image ?
        if ($handle->file_is_image) {
            //nom final de l'image
            $handle->file_new_name_body = 'avatar';
            //resize de l'image
            $handle->image_resize = true;
            $handle->image_x = 250;
            $handle->image_ratio_y = true;
            //écraser le fichier avatar s'il existe
            $handle->file_overwrite = true;
            //exécution resize et enregistrement
            $handle->process($_SERVER['DOCUMENT_ROOT'] . '/duck-city/data/users/' . $_SESSION['user']['id'] . '/');

            //si aucune erreur pour l'image
            if ($handle->processed) {
                $user = array(
                    'id' => $_SESSION['user']['id'],
                    'avatar' => stripslashes('/duck-city/data/users/' . $_SESSION['user']['id'] . '/' . $handle->file_dst_name),
                );
                //meme chose mais pour la thumbnail d'avatar
                $handle->file_new_name_body = 'avatar_thumb';
                $handle->file_overwrite = true;
                $handle->image_resize = true;
                $handle->image_x = 45;
                $handle->image_ratio_y = true;
//                $handle->image_crop = array('45px');
                //exécution resize et enregistrement
                $handle->process($_SERVER['DOCUMENT_ROOT'] . '/duck-city/data/users/' . $_SESSION['user']['id'] . '/');
                if ($handle->processed) {
                    $user['avatar_thumb'] = stripslashes('/duck-city/data/users/' . $_SESSION['user']['id'] . '/' . $handle->file_dst_name);
                }

                $handle->clean();

                //update en DB
                if ($model->update($user)) {
                    $_SESSION['prompt'] = array(
                        'class' => 'success',
                        'msg' => 'Avatar modifié !',
                    );
                    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/actions/users/profil.php');
                    exit();
                }
                //si erreur update DB
                else {
                    //suppression du fichier image avatar
                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $user['avatar'])) {
                        unlink($_SERVER['DOCUMENT_ROOT'] . $user['avatar']);
                    }
                    //suppression du fichier image avatar_thumb
                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $user['avatar_thumb'])) {
                        unlink($_SERVER['DOCUMENT_ROOT'] . $user['avatar']);
                    }

                    //mise à vide du champ avatar en DB
                    $user['avatar'] = '';
                    $user['avatar_thumb'] = '';
                    $model->update($user);

                    //bypass le système de forcer le refresh
                    $_SESSION['nav']['refreshed'] = true;
                    $_SESSION['prompt'] = array(
                        'class' => 'error',
                        'msg' => 'Erreur lors du changement d\'image. Veuillez recommencer',
                    );
                    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/actions/users/avatar.php');
                    exit();
                }
            }
            //sinon ==> retour sur la page de formulaire
            else {
                //bypass le système de forcer le refresh
                $_SESSION['nav']['refreshed'] = true;

                $_SESSION['prompt'] = array(
                    'class' => 'error',
                    'msg' => 'Erreur : ' . $handle->error,
                );
                header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/avatar.php');
                exit();
            }
        } else {
            //bypass le système de forcer le refresh
            $_SESSION['nav']['refreshed'] = true;

            $_SESSION['prompt'] = array(
                'class' => 'error',
                'msg' => 'Erreur : Le fichier envoyé n\'est pas une image',
            );
            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/avatar.php');
            exit();
        }
    } else {
        //bypass le système de forcer le refresh
        $_SESSION['nav']['refreshed'] = true;

        $_SESSION['viewvars']['post_data'] = $_POST;
        $_SESSION['prompt'] = array(
            'class' => 'error',
            'msg' => 'Erreur : ' . $handle->error,
        );
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/avatar.php');
        exit();
    }
}
//sinon récupérer les données utilisateurs et afficher le formulaire
else {
    //vérifier si l'utilisateur existe en DB
    if ($model->uexists($_SESSION['user']['id'])) {
        //récupérer les données utilisateur
        $user = $model->getone($_SESSION['user']['id']);
        if (isset($user) && !empty($user)) {
            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/views/users/avatar.php');
            exit();
        } else {
            $_SESSION['prompt'] = array(
                'class' => 'error',
                'msg' => 'Les donn&eacute;es de votre compte n\'ont pas pu &ecirc;tre retrouv&eacute;es',
            );
            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
            exit();
        }
    } else {
        $_SESSION['prompt'] = array(
            'class' => 'error',
            'msg' => 'Erreur : votre compte n\'existe plus',
        );
        //destruction des données de l'utilisateur en session
        unset($_SESSION['user']);
        //ré-initialisation des données de l'utilisateur en session
        $_SESSION['user'] = array('logged' => false);
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
        exit();
    }
}