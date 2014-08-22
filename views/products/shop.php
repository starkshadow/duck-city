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

<script src="<?php echo WEBROOT . 'scripts/panier.js'; ?>"></script>

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


<div name="div-sort">
    <caption>Tri</caption>    
    <ul>
        <li>
            <ul>
                <span class="<?php if (strpos($vars['current_sort'], 'name') !== false) echo 'sortonit' ?>">Nom</span>
                <li><a class="<?php if ($vars['current_sort'] == 'name.asc') echo 'sortonit' ?>" href="<?php echo WEBROOT . 'actions/products/shop.php?o=name&d=asc&l=15&p=1'; ?>">Nom &#x25B2;</a></li>
                <li><a class="<?php if ($vars['current_sort'] == 'name.desc') echo 'sortonit' ?>" href="<?php echo WEBROOT . 'actions/products/shop.php?o=name&d=desc&l=15&p=1'; ?>">Nom &#x25BC;</a></li>
            </ul>
        </li>
        <li>
            <ul>
                <span class="<?php if (strpos($vars['current_sort'], 'price') !== false) echo 'sortonit' ?>">Prix</span>
                <li><a class="<?php if ($vars['current_sort'] == 'price.asc') echo 'sortonit' ?>" href="<?php echo WEBROOT . 'actions/products/shop.php?o=price&d=asc&l=15&p=1'; ?>">Prix &#x25B2;</a></li>
                <li><a class="<?php if ($vars['current_sort'] == 'price.desc') echo 'sortonit' ?>" href="<?php echo WEBROOT . 'actions/products/shop.php?o=price&d=desc&l=15&p=1'; ?>">Prix &#x25BC;</a></li>
            </ul>
        </li>
        <li>
            <ul>
                <span class="<?php if (strpos($vars['current_sort'], 'created') !== false) echo 'sortonit' ?>">Création</span>
                <li><a class="<?php if ($vars['current_sort'] == 'created.asc') echo 'sortonit' ?>" href="<?php echo WEBROOT . 'actions/products/shop.php?o=created&d=asc&l=15&p=1'; ?>">Création &#x25B2;</a></li>
                <li><a class="<?php if ($vars['current_sort'] == 'created.desc') echo 'sortonit' ?>" href="<?php echo WEBROOT . 'actions/products/shop.php?o=created&d=desc&l=15&p=1'; ?>">Création &#x25BC;</a></li>
            </ul>
        </li>
        <li>
            <ul>
                <span class="<?php if (strpos($vars['current_sort'], 'modified') !== false) echo 'sortonit' ?>">Dernière modification</span>
                <li><a class="<?php if ($vars['current_sort'] == 'modified.asc') echo 'sortonit' ?>" href="<?php echo WEBROOT . 'actions/products/shop.php?o=modified&d=asc&l=15&p=1'; ?>">Dernière modification &#x25B2;</a></li>
                <li><a class="<?php if ($vars['current_sort'] == 'modified.desc') echo 'sortonit' ?>" href="<?php echo WEBROOT . 'actions/products/shop.php?o=modified&d=desc&l=15&p=1'; ?>">Dernière modification &#x25BC;</a></li>
            </ul>
        </li>
    </ul>
</div>


<div class="gallery-zone3">    
    <div class="container">
        <?php if (isset($vars['products']) && !empty($vars['products']) && is_array($vars['products'])): ?>
            <?php foreach ($vars['products'] as $key => $product): ?>
                <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . $product['imgprofil'])): ?>
                    <?php $img = $product['imgprofil']; ?>
                <?php else: ?>
                    <?php $img = DEFAULTDUCKIMG; ?>
                <?php endif; ?>
                <div class="one-four column gallery-duck">
                    <h3 class="h3-nom-duck"><a class="btn" href="<?php echo WEBROOT . 'actions/products/details.php?id=' . $product['id']; ?>"><?php echo $product['name']; ?></a></h3>
                    <a href="<?php echo WEBROOT . 'actions/products/details.php?id=' . $product['id']; ?>"><img src="<?php echo $img; ?>" alt="Image Canard"/></a>
                    <a href="<?php echo WEBROOT . 'actions/products/details.php?id=' . $product['id']; ?>"><p><?php echo $product['price'] . '&euro;'; ?></p></a>
                    <input placeholder="quantité" class="panier-add-quantity" type="number" />
                    <input class="panier-add-id" type="hidden" value="<?php echo $product['id']; ?>" />                    
                    <input url="<?php echo $_SERVER['SERVER_NAME'] . WEBROOT . 'actions/panier/add.php'; ?>" type="button" class="panier-add-button" value="Ajouter au Panier"/>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="error">Aucun canard dans la boutique pour l'instant</div>
        <?php endif; ?>   


        <div name="div-pagination" class="div-pagination">

            <?php if (isset($vars['products_countpages']) && !empty($vars['products_countpages'])): ?>
                <ul>
                    <?php //lien page précédente ?>
                    <?php if ($vars['current_page'] != 1): ?>
                        <?php $vars['GET']['p'] = $vars['current_page'] - 1; ?>
                        <li><a href="<?php echo WEBROOT . 'actions/products/shop.php?' . http_build_query($vars['GET'], '', '&') ?>">Page précédente</a></li>
                    <?php endif; ?><li> <span>Page :</span></li>
                    <?php //liste liens pages ?>
                    <?php for ($i = 1; $i <= $vars['products_countpages']; $i++): ?>

                        <li>
                            <?php if ($i == $vars['current_page']): ?>
                                <span><?php echo $i; ?></span>
                            <?php else: ?>
                                <?php $vars['GET']['p'] = $i; ?>
                                <a href="<?php echo WEBROOT . 'actions/products/shop.php?' . http_build_query($vars['GET'], '', '&') ?>"><?php echo $i; ?></a>
                            <?php endif; ?>
                        </li>
                    <?php endfor; ?>
                    <?php //lien page suivante ?>
                    <?php if ($vars['current_page'] != $vars['products_countpages']): ?>
                        <?php $vars['GET']['p'] = $vars['current_page'] + 1; ?>
                        <li><a href="<?php echo WEBROOT . 'actions/products/shop.php?' . http_build_query($vars['GET'], '', '&') ?>">Page suivante</a></li>
                    <?php endif; ?>                
                </ul>
            <?php endif; ?>
        </div>




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