<?php $nav_en_cours = 'page-inscription'; ?>
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

<div class="inscription-zone1">
    <img src="<?php echo WEBROOT . 'images/bg-contact.jpg'; ?>">
    <div class="title-page">
        <h2 class="h2-title-page">Inscription</h2>
    </div>
</div>

<div class="inscription-zone2">
    <div class="container">
        <p class="texte-intro">Bienvenue dans la nouvelle communauté de Duck City</p>
    </div>
</div>

<div class="inscription-zone3">
    <div class="container">
        <form method="POST" action="<?php echo WEBROOT . 'actions/users/inscription.php'; ?>">
            <ul>
                <h4>Inscription</h4>
                <li>
                    <ul>
                        <li>
                            <label>Pseudo : *</label>
                            <input type="text" id="" class="" name="pseudo" size="30" placeholder="_Daffy89" value="<?php if (isset($postdata['pseudo'])) echo $postdata['pseudo']; ?>">
                            <?php if (isset($errors['pseudo']) && !empty($errors['pseudo'])): ?>
                                <span><?php echo $errors['pseudo']; ?></span>
                            <?php endif; ?>                            
                        </li>
                        <li>
                            <label>Email : *</label>
                            <input type="text" id="" class="" name="email" size="30" placeholder="daffy-duck@gmail.com" value="<?php if (isset($postdata['email'])) echo $postdata['email']; ?>">
                            <?php if (isset($errors['email']) && !empty($errors['email'])): ?>
                                <span><?php echo $errors['email']; ?></span>
                            <?php endif; ?>                            
                        </li>
                        <li>
                            <label>Mot de passe : *</label>
                            <span>(entre 5 et 8 caractères alphanumériques, minimum un chiffre)</span>
                            <input type="password" id="" class="" name="password" size="30" placeholder=" * * * * * ">
                            <?php if (isset($errors['password']) && !empty($errors['password'])): ?>
                                <span><?php echo $errors['password']; ?></span>
                            <?php endif; ?>
                        </li>
                        <li>
                            <label>Verification mot de passe : *</label>
                            <input type="password" id="" class="" name="confirmpassword" size="30" placeholder=" * * * * * ">
                            <?php if (isset($errors['confirmpassword']) && !empty($errors['confirmpassword'])): ?>
                                <span><?php echo $errors['confirmpassword']; ?></span>
                            <?php endif; ?>                            
                        </li>
                    </ul>
                </li>                
                <li>
                    <ul>
                        <li>
                            <label>Nom : </label>
                            <input type="text" id="" class="" name="firstname" size="30" placeholder="Duck" value="<?php if (isset($postdata['firstname'])) echo $postdata['firstname']; ?>">
                        </li>
                        <li>
                            <label>Prénom : </label>
                            <input type="text" id="" class="" name="lastname" size="30" placeholder="Daffy" value="<?php if (isset($postdata['lastname'])) echo $postdata['lastname']; ?>">
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <label>Adresse : *</label>
                            <input type="text" id="" class="numero" name="number" size="30" placeholder="4" value="<?php if (isset($postdata['number'])) echo $postdata['number']; ?>">
                            <input type="text" id="" class="rue" name="street" size="30" placeholder="Rue du Canard" value="<?php if (isset($postdata['street'])) echo $postdata['street']; ?>">
                            <?php if (isset($errors['number']) && !empty($errors['number'])): ?>
                                <span><?php echo $errors['number']; ?></span>
                            <?php endif; ?>
                            <?php if (isset($errors['street']) && !empty($errors['street'])): ?>
                                <span><?php echo $errors['street']; ?></span>
                            <?php endif; ?>                                
                        </li>
                        <li>
                            <label>Code postal : </label>
                            <input type="text" id="" class="" name="postcode" size="30" placeholder="5000" value="<?php if (isset($postdata['postcode'])) echo $postdata['postcode']; ?>">
                            <?php if (isset($errors['postcode']) && !empty($errors['postcode'])): ?>
                                <span><?php echo $errors['postcode']; ?></span>
                            <?php endif; ?>                            
                        </li>
                        <li>
                            <label>Ville : </label>
                            <input type="text" id="" class="" name="city" size="30" placeholder="Duckcity" value="<?php if (isset($postdata['city'])) echo $postdata['city']; ?>">
                            <?php if (isset($errors['city']) && !empty($errors['city'])): ?>
                                <span><?php echo $errors['city']; ?></span>
                            <?php endif; ?>                            
                        </li>
                        <li>
                            <label>Pays : </label>
                            <input type="text" id="" class="" name="country" size="30" placeholder="Duckland" value="<?php if (isset($postdata['country'])) echo $postdata['country']; ?>">
                            <?php if (isset($errors['country']) && !empty($errors['country'])): ?>
                                <span><?php echo $errors['country']; ?></span>
                            <?php endif; ?>                            
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <label></label>
                            <input type="submit" id="" class="" name="send" value="Créer un compte">
                        </li>
                    </ul>
                </li>
            </ul>
        </form>
    </div>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>