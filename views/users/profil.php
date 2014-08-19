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

        
    </div>
</div>

<div class="profil-zone3">
    <div class="container">
        <ul class="speudo-email-utilisateur">
            <li class="" id="" name="" ><?php echo $vars['user']['pseudo']; ?></li>
            <li class="" id="" name="" ><?php echo $vars['user']['email']; ?></li>
            <li><?php echo 'Créé le ' . date_format(date_create($vars['user']['created']), 'd/m/Y à G\hi'); ?></li>
        </ul>

        <h2  class="h2-title-zone">Mes coordonées</h2>
        <ul>

            <li class="" id="" name="" >
                <p>Nom :</p>
                <p><?php echo $vars['user']['lastname']; ?></p>
            </li>
            <div class="clean"></div>
            <li class="" id="" name="" >
                <p>Prénom :</p>
                <p><?php echo $vars['user']['firstname']; ?></p>
            </li>
            <div class="clean"></div>
            <li class="" id="" name="" >
                <p>Adresse :</p>
                <p><?php echo $vars['user']['number'] . ', ' . $vars['user']['street']; ?></p>
            </li>
             <div class="clean"></div>
            <li class="" id="" name="" >
                <p>Ville :</p>
                <p><?php echo $vars['user']['postcode'] . ', ' . $vars['user']['city']; ?></p>
            </li>
            <div class="clean"></div>
            <li class="" id="" name="" >
                <p>Pays :</p>
                <p><?php echo $vars['user']['country']; ?></p>
            </li>
            <div class="clean"></div>
        </ul>



        <div class="btn-modif">
            <a  class="btn" href="<?php echo WEBROOT . 'actions/users/update.php' ?>">Modifier mon profil</a>            
            <a  class="btn" href="<?php echo WEBROOT . 'actions/users/delete.php' ?>">Supprimer mon compte</a>  
                      
        </div>
        <p><?php echo 'Logo : ' . $vars['user']['logo']; ?></p>

        
    </div>
</div>


<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>