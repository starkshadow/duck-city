<?php $nav_en_cours = 'page-connexion'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>

<?php
$errors = array();
$postdata = array();
//récupérer les données post pour remplir le formulaire en cas d'échec
if (isset($_SESSION['post_data']) && !empty($_SESSION['post_data'])) {
    $postdata = $_SESSION['post_data'];
    unset($_SESSION['post_data']);
}

//récupérer les messages d'erreur
if (isset($_SESSION['errors_form']) && !empty($_SESSION['errors_form'])):
    $errors = $_SESSION['errors_form'];
    unset($_SESSION['errors_form']);
endif;
?>




<div class="connexion-zone1">
    <img src="<?php echo WEBROOT . 'images/bg-contact.jpg'; ?>">
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
        <div class="one-half column">
            <form class="connexion" method="POST" action="<?php echo WEBROOT . 'actions/users/connexion.php' ?>">
                <ul>
                    <h4>CONNEXION</h4>
                    <li>
                        <label>Email :</label></br>
                        <input type="text" id="" class="" name="email" size="30" placeholder="daffy.duck@gmail.com" value="<?php if (isset($postdata['email'])) echo $postdata['email']; ?>">
                        <?php if (isset($errors['email']) && !empty($errors['email'])): ?>
                            <span><?php echo $errors['email']; ?></span>
                        <?php endif; ?>
                    </li>
                    <li>
                        <label>Mot de passe :</label></br>
                        <input type="password" id="" class="" name="password" size="30" placeholder="* * * * * *">
                        <?php if (isset($errors['password']) && !empty($errors['password'])): ?>
                            <span><?php echo $errors['password']; ?></span>
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