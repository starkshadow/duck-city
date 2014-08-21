<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/viewconf.php'; ?>
<?php $nav_en_cours = 'page-user-delete'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>

<!-- script prompt confirm form !-->
<script>
    $(window).load(function() {
        $('#delete-form').submit(function(e) {
            if (!confirm("Oublier mes canards pour toujours ?")) {
                e.preventDefault();
                return;
            }
        });
    });
</script>

<div class="profil-zone1">
    <img src="<?php echo WEBROOT . 'images/bg-contact.jpg'; ?>">
    <div class="title-page">
        <h2 class="h2-title-page">Supprimer mon compte</h2>
    </div>
</div>

<div class="profil-zone2">
    <div class="container">
        <p>
            <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . $_SESSION['user']['avatar'])): ?>
                <img alt="Avatar ici" src="<?php echo $_SESSION['user']['avatar']; ?>" />
            <?php endif; ?>
        </p>
    </div>
</div>

<div class="profil-password-zone3">
    <div class="container">
        <h2  class="h2-title-zone">Supprimer mon compte</h2>
        <form id="delete-form" method="POST" action="<?php echo WEBROOT . 'actions/users/delete.php'; ?>">            
            <ul class="inscription-errors">
                <span>ATTENTION : cette action va supprimer votre compte et vous déconnecter !</span>

                <li class="inscription-errors">
                    <label>Mot de passe : *</label>
                    <input type="password" id="" class="" name="password" size="30" placeholder=" * * * * * ">
                </li>
                <div class="clean"></div>
                <?php if (isset($vars['errors']['password']) && !empty($vars['errors']['password'])): ?>
                    <span><?php echo $vars['errors']['password']; ?></span>
                <?php endif; ?>               
                <div class="clean"></div>                
                <li class="inscription-errors">
                    <label>Confirmation mot de passe : *</label>
                    <input type="password" id="" class="" name="confirmpassword" size="30" placeholder=" * * * * * ">
                </li>    
                <div class="clean"></div>
                <?php if (isset($vars['errors']['confirmpassword']) && !empty($vars['errors']['confirmpassword'])): ?>
                    <span><?php echo $vars['errors']['confirmpassword']; ?></span>
                <?php endif; ?>  

                <li class="btn-submit">
                    <label></label>
                    <input type="submit" id="delete-submit" class="btn" name="send" value="Terminer" />
                </li>
            </ul>
        </form>

        <div class="btn-modif">
            <ul class="menu-profil" >
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-profil') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/profil.php' ?>">Mon profil</a></li>
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-update') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/update.php' ?>">Paramètres</a></li>
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-password') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/password.php' ?>">Mot de passe</a></li>
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-avatar') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/avatar.php' ?>">Avatar</a></li>
                <!--<li><a class="btn" <?php if ($nav_en_cours == 'page-user-delete') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/delete.php' ?>">Supprimer mon compte</a></li>-->
            </ul>
        </div>

        <!--<p><?php echo 'Logo : ' . $vars['user']['logo']; ?></p>-->
    </div>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>