<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tfe/duck-city/phpconf/viewconf.php'; ?>
<?php $nav_en_cours = 'page-user-avatar'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/tfe/duck-city/header.php'; ?>

<div class="profil-zone1">
    <img src="<?php echo WEBROOT . 'images/bg-avatar.jpg'; ?>">
    <div class="title-page">
        <h2 class="h2-title-page">Avatar</h2>
    </div>
</div>

<div class="profil-zone2">
    <div class="container">
        <div class="avatar">
            <?php if (!empty($_SESSION['user']) && isset($_SESSION['user']['avatar']) && !empty($_SESSION['user']['avatar'])): ?>
                <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . $_SESSION['user']['avatar'])): ?>
                    <?php $img = $_SESSION['user']['avatar']; ?>
                <?php else: ?>
                    <?php $img = DEFAULTAVATARIMG; ?>
                <?php endif; ?>
                <a href="<?php echo WEBROOT . 'actions/users/avatar.php' ?>">
                    <img alt="Avatar ici" src="<?php echo $img; ?>" />
                </a>
                <a href="<?php echo WEBROOT . 'actions/users/avatar.php' ?>" class="btn-avatar"> Changer votre avatar</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="profil-avatar-zone3">
    <div class="container">
        <h2  class="h2-title-zone">Changer mon image d'avatar</h2>
        <form method="POST" action="<?php echo WEBROOT . 'actions/users/avatar.php'; ?>" enctype="multipart/form-data">
            <ul class="inscription-errors">
                <li class="inscription-errors">
                    <label>Envoyer un fichier </label>
                    <span>(de préférence une image carrée)</span>
                    <input type="file" size="70" name="avatar" value="" accept="image/*" class="custom-file-input"/>                    
                    <?php if (isset($vars['errors']['avatar']) && !empty($vars['errors']['avatar'])): ?>
                        <span><?php echo $vars['errors']['avatar']; ?></span>
                    <?php endif; ?>                            
                </li>
                <div class="clean"></div>
                <li class="btn-submit">
                    <label></label>
                    <input type="submit" id="" class="btn" name="send" value="Sauvegarder" />
                </li>
                <div class="clean"></div>
            </ul>
        </form>

        <div class="btn-modif">
            <ul class="menu-profil" >
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-profil') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/profil.php' ?>">Mon profil</a></li>
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-update') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/update.php' ?>">Paramètres</a></li>
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-password') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/password.php' ?>">Mot de passe</a></li>
                <!--<li><a class="btn" <?php if ($nav_en_cours == 'page-user-avatar') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/avatar.php' ?>">Avatar</a></li>-->
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-delete') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/delete.php' ?>">Supprimer mon compte</a></li>
            </ul>
        </div>


    </div>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>