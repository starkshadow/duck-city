<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/viewconf.php'; ?>
<?php $nav_en_cours = 'page-connexion'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>



<div class="connexion-zone1">
    <img src="<?php echo WEBROOT . 'images/bg-connexion.jpg'; ?>">
    <div class="title-page">
        <h2 class="h2-title-page">Connexion</h2>
    </div>
</div>

<div class="connexion-zone2">
    <div class="container">
        <p class="texte-intro">Bienvenue chez Duck City</p>
    </div>
</div>



<div class="connexion-zone3">
    <div class="container">
        <div class="sixteen columns">
            <form class="connexion" method="POST" action="<?php echo WEBROOT . 'actions/users/connexion.php' ?>">
                <ul>
                    <h4>CONNEXION</h4>
                    <li>
                        <label>Email :</label></br>
                        <input type="text" id="" class="" name="email" size="30" placeholder="daffy.duck@gmail.com" value="<?php if (isset($vars['post_data']['email'])) echo $vars['post_data']['email']; ?>">
                        <?php if (isset($vars['errors']['email']) && !empty($vars['errors']['email'])): ?>
                            <span><?php echo $vars['errors']['email']; ?></span>
                        <?php endif; ?>
                    </li>
                    <li>
                        <label>Mot de passe :</label></br>
                        <input type="password" id="" class="" name="password" size="30" placeholder="* * * * * *">
                        <?php if (isset($vars['errors']['password']) && !empty($vars['errors']['password'])): ?>
                            <span><?php echo $vars['errors']['password']; ?></span>
                        <?php endif; ?>                        
                    </li>
                    <li>
                        <input type="submit" id="" class="" name="send" value="Se connecter">
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>