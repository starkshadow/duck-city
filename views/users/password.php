<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/viewconf.php'; ?>
<?php $nav_en_cours = 'page-user-password'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>


<div class="profil-zone2">
    <div class="container">
        <img src="<?php echo WEBROOT . 'images/profil1.jpg'; ?>">
    </div>
</div>

<div class="profil-zone3">
    <div class="container">
        <div class="btn-modif">
            <ul id="invisible" class="nav-menu" >
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-profil') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/profil.php' ?>">Mon profil</a></li>
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-update') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/update.php' ?>">Paramètres</a></li>
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-password') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/password.php' ?>">Mot de passe</a></li>
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-delete') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/delete.php' ?>">Supprimer mon compte</a></li>
            </ul>
        </div>

        <h2  class="h2-title-zone">Changer mon mot de passe</h2>
        <form method="POST" action="<?php echo WEBROOT . 'actions/users/password.php'; ?>">            
            <ul>
                <span>Rappel : le mot de passe doit comporter de 5 à 8 caractères alphanumériques, dont un chiffre minimum</span>
                <li class="inscription-errors">
                    <label>Mot de passe <span>Actuel</span> : *</label>
                    <input type="password" id="" class="" name="oldpassword" size="30" placeholder=" * * * * * ">

                    <?php if (isset($vars['errors']['oldpassword']) && !empty($vars['errors']['oldpassword'])): ?>
                        <span><?php echo $vars['errors']['oldpassword']; ?></span>
                    <?php endif; ?>
                </li>
                <li class="inscription-errors">
                    <label>Nouveau mot de passe : *</label>
                    <input type="password" id="" class="" name="password" size="30" placeholder=" * * * * * ">
                    <?php if (isset($vars['errors']['password']) && !empty($vars['errors']['password'])): ?>
                        <span><?php echo $vars['errors']['password']; ?></span>
                    <?php endif; ?>
                </li>
                <li class="inscription-errors">
                    <label>Confirmation mot de passe : *</label>
                    <input type="password" id="" class="" name="confirmpassword" size="30" placeholder=" * * * * * ">
                    <?php if (isset($vars['errors']['confirmpassword']) && !empty($vars['errors']['confirmpassword'])): ?>
                        <span><?php echo $vars['errors']['confirmpassword']; ?></span>
                    <?php endif; ?>                            
                </li>                

                <li>
                    <ul>
                        <li>
                            <label></label>
                            <input type="submit" id="" class="" name="send" value="Enregistrer les modifications" />
                        </li>
                    </ul>
                </li>
            </ul>
        </form>

        <!--<p><?php echo 'Logo : ' . $vars['user']['logo']; ?></p>-->
    </div>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>