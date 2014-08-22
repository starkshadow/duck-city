<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/viewconf.php'; ?>
<?php $nav_en_cours = 'page-shop-details'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>
</header>


<?php print_r($vars['product']); ?>

<div class="gallery-zone1">
    <img src="<?php echo WEBROOT . 'images/bg-shop.jpg'; ?>" />
    <div class="title-page">
        <h2 class="h2-title-page">shop</h2>
    </div>
</div>

</div>


<!-- affichage description -->
<div><?php echo utf8_encode($vars['product']['description']); ?></div>

<!-- affichage nom accessoire -->
<div><?php echo utf8_encode($vars['product']['Accessory']['name']); ?></div>

<div class="gallery-zone3">    
    <div class="container">
        <?php if (isset($vars['product']) && !empty($vars['product'])): ?>
            <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . $vars['product']['imgprofil'])): ?>
                <?php $img = $vars['product']['imgprofil']; ?>
            <?php else: ?>
                <?php $img = DEFAULTDUCKIMG; ?>
            <?php endif; ?>
            <div class="one-four column gallery-duck">
                <h3 class="h3-nom-duck"><a class="btn" href="<?php echo WEBROOT . 'actions/products/details.php' ?>"><?php echo $vars['product']['name']; ?></a></h3>
                <a href="<?php echo WEBROOT . 'actions/products/details.php' ?>"><img src="<?php echo $img; ?>" alt="Image Canard"/></a>
                <a href="<?php echo WEBROOT . 'actions/products/details.php' ?>"><p><?php echo $vars['product']['price'] . '&euro;'; ?></p></a>
            </div>
        <?php else: ?>
            <div class="error">Les données du canards n'ont pas pu être retrouvées</div>
        <?php endif; ?>
    </div>
</div>



<div class="gallery-zone4">
    <div class="container">
        <p class="texte-intro">Tu n'as pas trouvé le canard qui te correspond ?  </p>
    </div>
</div>


<div class="gallery-zone5">
    <div class="container">
        <p>Ce n'est pas grave ! Viens créer ton canard unique en lui ajoutant des accessoires !</p>
        <a href="personnalisation.php" class="btn">Créer ton canard</a>
    </div>
</div>



<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>