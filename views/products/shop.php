<?php
/**
 * Vue pour afficher le listing des products
 * Correspond à duck-city/shop.php
 */
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/viewconf.php'; ?>
<?php $nav_en_cours = 'page-shop'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>
</header>


<div class="gallery-zone1">
    <img src="<?php echo WEBROOT . 'images/bg-shop.jpg'; ?>" />
    <div class="title-page">
        <h2 class="h2-title-page">shop</h2>
    </div>
</div>

</div>

<div class="gallery-zone2">
    <div class="container">
        <p class="texte-intro">Trouve le canard qui te correspond</p>
    </div>
</div>

<div class="gallery-zone3">    
    <div class="container">
        <?php if (isset($vars['products']) && !empty($vars['products']) && is_array($vars['products'])): ?>
            <?php foreach ($vars['products'] as $key => $product): ?>
        <?php if(file_exists($_SERVER['DOCUMENT_ROOT'] . $product['imgprofil'])): ?>
            <?php $img = $product['imgprofil'];?>
        <?php else: ?>
        <?php $img = DEFAULTDUCKIMG;?>
        <?php endif; ?>
                <div class="one-four column gallery-duck">
                    <h3 class="h3-nom-duck"><a class="btn" href="<?php echo WEBROOT . 'actions/products/details.php' ?>"><?php echo $product['name']; ?></a></h3>
                    <a href="<?php echo WEBROOT . 'actions/products/details.php' ?>"><img src="<?php echo $img; ?>" alt="Image Canard"/></a>
                    <a href="<?php echo WEBROOT . 'actions/products/details.php' ?>"><p><?php echo $product['price'] . '&euro;'; ?></p></a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="error">Aucun canard dans la boutique pour l'instant</div>
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