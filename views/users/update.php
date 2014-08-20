<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/viewconf.php'; ?>
<?php $nav_en_cours = 'page-user-update'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>

<div class="profil-zone1">
    <img src="<?php echo WEBROOT . 'images/bg-contact.jpg'; ?>">
    <div class="title-page">
        <h2 class="h2-title-page">Paramètres</h2>
    </div>
</div>

<div class="profil-zone2">
    <div class="container">
        <img src="<?php echo WEBROOT . 'images/profil1.jpg'; ?>">
    </div>
</div>

<div class="profil-update-zone3">
    <div class="container">
       <!-- <div class="btn-modif">
            <ul id="invisible" class="nav-menu" >
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-profil') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/profil.php' ?>">Mon profil</a></li>
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-update') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/update.php' ?>">Paramètres</a></li>
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-password') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/password.php' ?>">Mot de passe</a></li>
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-delete') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/delete.php' ?>">Supprimer mon compte</a></li>
            </ul>
        </div>-->

        <h2  class="h2-title-zone">Modifier mon profil</h2>
        <form method="POST" action="<?php echo WEBROOT . 'actions/users/update.php'; ?>">
            <ul class="inscription-errors">                
                <li class="inscription-errors">
                    <label>Pseudo : *</label>
                    <input type="text" id="" class="" name="pseudo" size="30" placeholder="_Daffy89" value="<?php if (isset($vars['post_data']['pseudo'])) echo $vars['post_data']['pseudo']; ?>">
                    <?php if (isset($vars['errors']['pseudo']) && !empty($vars['errors']['pseudo'])): ?>
                        <span><?php echo $vars['errors']['pseudo']; ?></span>
                    <?php endif; ?>                            
                </li>
                <div class="clean"></div>
                <li class="inscription-errors">
                    <label>Email : *</label>
                    <input type="text" id="" class="" name="email" size="30" placeholder="daffy-duck@gmail.com" value="<?php if (isset($vars['post_data']['email'])) echo $vars['post_data']['email']; ?>">
                    <?php if (isset($vars['errors']['email']) && !empty($vars['errors']['email'])): ?>
                        <span><?php echo $vars['errors']['email']; ?></span>
                    <?php endif; ?>                            
                </li>
                <div class="clean"></div>
                <li class="inscription-errors">
                    <label>Nom : </label>
                    <input type="text" id="" class="" name="firstname" size="30" placeholder="Duck" value="<?php if (isset($vars['post_data']['firstname'])) echo $vars['post_data']['firstname']; ?>">
                </li>
                <div class="clean"></div>
                <li class="inscription-errors">
                    <label>Prénom : </label>
                    <input type="text" id="" class="" name="lastname" size="30" placeholder="Daffy" value="<?php if (isset($vars['post_data']['lastname'])) echo $vars['post_data']['lastname']; ?>">
                </li>
                <div class="clean"></div>
                <li class="inscription-errors">
                    <label>Adresse : *</label>
                    <input type="text" id="" class="numero" name="number" size="30" placeholder="4" value="<?php if (isset($vars['post_data']['number'])) echo $vars['post_data']['number']; ?>">
                    <input type="text" id="" class="rue" name="street" size="30" placeholder="Rue du Canard" value="<?php if (isset($vars['post_data']['street'])) echo $vars['post_data']['street']; ?>">
                    <?php if (isset($vars['errors']['number']) && !empty($vars['errors']['number'])): ?>
                        <span><?php echo $vars['errors']['number']; ?></span>
                    <?php endif; ?>
                    <?php if (isset($vars['errors']['street']) && !empty($vars['errors']['street'])): ?>
                        <span><?php echo $vars['errors']['street']; ?></span>
                    <?php endif; ?>                                
                </li>
                <div class="clean"></div>
                <li class="inscription-errors">
                    <label>Code postal : *</label>
                    <input type="text" id="" class="" name="postcode" size="30" placeholder="5000" value="<?php if (isset($vars['post_data']['postcode'])) echo $vars['post_data']['postcode']; ?>">
                    <?php if (isset($vars['errors']['postcode']) && !empty($vars['errors']['postcode'])): ?>
                        <span><?php echo $vars['errors']['postcode']; ?></span>
                    <?php endif; ?>                            
                </li>
                <div class="clean"></div>
                <li class="inscription-errors">
                    <label>Ville : *</label>
                    <input type="text" id="" class="" name="city" size="30" placeholder="Duckcity" value="<?php if (isset($vars['post_data']['city'])) echo $vars['post_data']['city']; ?>">
                    <?php if (isset($vars['errors']['city']) && !empty($vars['errors']['city'])): ?>
                        <span><?php echo $vars['errors']['city']; ?></span>
                    <?php endif; ?>                            
                </li>
                <div class="clean"></div>
                <li class="inscription-errors">
                    <label>Pays : *</label>
                    <input type="text" id="" class="" name="country" size="30" placeholder="Duckland" value="<?php if (isset($vars['post_data']['country'])) echo $vars['post_data']['country']; ?>">
                    <?php if (isset($vars['errors']['country']) && !empty($vars['errors']['country'])): ?>
                        <span><?php echo $vars['errors']['country']; ?></span>
                    <?php endif; ?>                            
                </li>
                <div class="clean"></div>
                <li class="btn-submit">
                    <label></label>
                    <input type="submit" id="" class="btn" name="send" value="Enregistrer les modifications" />
                </li>
                <div class="clean"></div>
            </ul>
        </form>

        <div class="btn-modif">
            <ul class="menu-profil" >
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-profil') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/profil.php' ?>">Mon profil</a></li>
                <!--<li><a class="btn" <?php if ($nav_en_cours == 'page-user-update') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/update.php' ?>">Paramètres</a></li>-->
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-password') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/password.php' ?>">Mot de passe</a></li>
                <li><a class="btn" <?php if ($nav_en_cours == 'page-user-delete') echo ' id="en-cours"'; ?> href="<?php echo WEBROOT . 'actions/users/delete.php' ?>">Supprimer mon compte</a></li>
            </ul>
        </div>

        <!--<p><?php echo 'Logo : ' . $vars['user']['logo']; ?></p>-->
    </div>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>