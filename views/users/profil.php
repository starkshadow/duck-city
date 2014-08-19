<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/viewconf.php'; ?>
<?php $nav_en_cours = 'page-profil'; ?>
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
        <p class="texte-intro"><?php echo $vars['user']['pseudo']; ?></p>
    </div>
</div>

<div class="profil-zone3">
    <div class="container">
        <div>
            <a href="<?php echo WEBROOT . 'actions/users/update.php' ?>">Modifier mon profil</a>            
            <a href="<?php echo WEBROOT . 'actions/users/delete.php' ?>">Supprimer mon compte</a>            
        </div>
        <div><?php echo 'Créé le ' . date_format(date_create($vars['user']['created']), 'd/m/Y à G\hi'); ?></div>
        <ul>
            <li class="" id="" name="" ><?php echo 'Pseudo : ' . $vars['user']['pseudo']; ?></li>
            <li class="" id="" name="" ><?php echo 'Email : ' . $vars['user']['email']; ?></li>
            <li class="" id="" name="" ><?php echo 'Prénom : ' . $vars['user']['firstname']; ?></li>
            <li class="" id="" name="" ><?php echo 'Nom : ' . $vars['user']['lastname']; ?></li>
            <li class="" id="" name="" ><?php echo 'Logo : ' . $vars['user']['logo']; ?></li>
            <li class="" id="" name="" ><?php echo 'Adresse : ' . $vars['user']['number'] . ', ' . $vars['user']['street'] . '<br/>' . $vars['user']['postcode'] . ' ' . $vars['user']['city'] . '<br/>' . $vars['user']['country']; ?></li>
        </ul>
    </div>
</div>


<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>