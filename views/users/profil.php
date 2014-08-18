<?php session_start(); ?>
<?php
//vérification que l'utilisateur est connecté et donc a accès a la page de profil
if (!(isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['user']['logged']) && $_SESSION['user']['logged'] === true)):
    //redirection vers la homepage si l'utilisateur n'est pas connecté
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/duck-city/');
    exit();
endif;

//récupération des données pour la vue
$vars = array();
if (isset($_SESSION['viewvars']) && !empty($_SESSION['viewvars'])):
    $vars = $_SESSION['viewvars'];
    unset($_SESSION['viewvars']);
endif;
?>
<?php $nav_en_cours = 'page-inscription'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>

<div class="profil-zone1">
    <img src="<?php echo WEBROOT . 'images/bg-contact.jpg'; ?>">
    <div class="title-page">
        <h2 class="h2-title-page">Mon Profil</h2>
    </div>
</div>

<div class="profil-zone2">
    <div class="container">
        <img src="<?php echo WEBROOT . 'images/profil1.jpg'; ?>">
        <p class="texte-intro">Nom</p>
        <p class="texte-intro">Prénom</p>
    </div>
</div>

<div class="profil-zone3">
    <div class="container">
    </div>
</div>



<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>