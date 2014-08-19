<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/viewconf.php'; ?>
<?php $nav_en_cours = 'page-user-profil'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>

<div class="profil-zone1">
    <img src="<?php echo WEBROOT . 'images/bg-contact.jpg'; ?>">
    <div class="title-page">
        <h2 class="h2-title-page">Mon Profil</h2>
    </div>
</div>

<div class="profil-zone2">
    <div class="container">
        <!--<img src="<?php echo WEBROOT . 'images/profil1.jpg'; ?>">-->
        <p class="texte-intro"><?php echo $vars['user']['pseudo']; ?></p>
    </div>
</div>

<div class="profil-zone3">
    <div class="container" id="profil-div">        
        <div>
            <ul id="invisible" class="nav-menu" >
                <li><a <?php if ($nav_en_cours == 'page-user-profil') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/profil.php' ?>">Mon profil</a></li>
                <li><a <?php if ($nav_en_cours == 'page-user-update') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/update.php' ?>">Paramètres</a></li>
                <li><a <?php if ($nav_en_cours == 'page-user-password') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/password.php' ?>">Mot de passe</a></li>
                <li><a <?php if ($nav_en_cours == 'page-user-delete') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/delete.php' ?>">Supprimer mon compte</a></li>
            </ul>
        </div>
        <h4>Mon Profil</h4>
        <div><?php echo 'Créé le ' . date_format(date_create($vars['user']['created']), 'd/m/Y à G\hi'); ?></div>
        <ul>
            <li class="" id="" name="" ><?php echo 'Pseudo : ' . $vars['user']['pseudo']; ?></li>
            <li class="" id="" name="" ><?php echo 'Email : ' . $vars['user']['email']; ?></li>
            <li class="" id="" name="" ><?php echo 'Prénom : ' . $vars['user']['firstname']; ?></li>
            <li class="" id="" name="" ><?php echo 'Nom : ' . $vars['user']['lastname']; ?></li>
            <li class="" id="" name="" ><?php echo 'Logo : ' . $vars['user']['logo']; ?></li>
            <li class="" id="" name="" >
                <?php echo 'Adresse : ' . $vars['user']['number'] . ', ' . $vars['user']['street'] . '<br/>' . $vars['user']['postcode'] . ' ' . $vars['user']['city'] . '<br/>' . $vars['user']['country']; ?>
            </li>
        </ul>
    </div>
</div>


<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>