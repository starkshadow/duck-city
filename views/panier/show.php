<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/viewconf.php'; ?>
<?php $nav_en_cours = 'page-shop-details'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>
</header>

<script src="<?php echo WEBROOT . 'scripts/panier.js'; ?>"></script>



<div class="panier-zone1">
    <img src="<?php echo WEBROOT . 'images/bg-panier.jpg'; ?>" alt="bg-panier"/>
    <div class="title-page">
        <h2 class="h2-title-page">Mon panier</h2>
    </div>
</div>



<div class="panier-zone2">
    <div class="container">
        <p class="texte-intro">Voici tous les canards que tu as mis dans ton panier</p>
    </div>
</div>

<div class="panier-zone3">
    <div class="container">
        <?php if (isset($vars['sproducts']) && !empty($vars['sproducts'])): ?>
            <h2 class="h2-title-zone">Ton panier</h2>
            <div class="title-tableau">
                <div class="column-product">
                    <h4>Le produit</h4>
                </div>
                <div class="column-quantity">
                    <h4>La quantité</h4>
                </div>
                <div class="column-price">
                    <h4>Le prix</h4>
                </div>
                <div class="column-total">
                    <h4>Le total</h4>
                </div>
            </div>
            <?php $total = 0; ?>
            <?php foreach ($vars['sproducts'] as $sproduct): ?>
                <div class="ligne-product">
                    <div class="column-product">
                        <div class="product">
                            <h4><?php echo utf8_encode($sproduct['Product']['name']); ?></h4>
                            <img src="<?php echo ($sproduct['Product']['imgprofil']); ?>" alt="image du duck ajouter au panier" />
                        </div>
                        <!--<div class="delete-product">
                            <a class="btn">&#xD7;</a>
                        </div>-->
                    </div>
                    <div class="column-quantity">
                        <div>
                            <p>-</p>
                            <p><?php echo utf8_encode($sproduct['quantity']); ?></p>
                            <p>+</p>
                        </div>
                    </div>
                    <div class="column-price">
                        <p><?php echo utf8_encode(($sproduct['Product']['price']) . '&euro;'); ?></p>
                    </div>
                    <div class="column-total">
                        <p><?php echo utf8_encode(($sproduct['quantity'] * $sproduct['Product']['price']) . '&euro;'); ?></p>
                    </div>
                </div>
                <?php $total = $total + ($sproduct['quantity'] * $sproduct['Product']['price']); ?>
            <?php endforeach; ?>

            <div class="ligne-total">
                <div class="title-ligne">
                    <h4>Total de la commande</h4>
                </div>
                <div class="prix-ligne">                    
                    <p> <?php echo $total . '&euro;'; ?></p>
                </div>
            </div>




            <div class="clean"></div>
            <div class="ligne-commander">
                <a href="<?php echo WEBROOT . 'actions/products/shop.php'; ?>" class="btn btn-continuer"> Continuer mes achats</a>
                <a href="<?php echo WEBROOT . 'actions/panier/order.php'; ?>" class="btn btn-commander"> Commander</a>
                <a id="empty-panier-btn" class="btn btn-commander" href="<?php echo WEBROOT . 'actions/panier/deleteBasket.php' ?>">Vider le Panier</a>
            </div>

        <?php else: ?>
            <div class="errors-panier">
                <p> Aucun canard dans votre panier pour l'instant. Pourquoi ne pas faire un tour dans notre shop ?</p>
                <a href="<?php echo WEBROOT . 'actions/products/shop.php'; ?>" class="btn "> Aller sur le shop</a>
            </div>
        <?php endif; ?>
    </div>
</div>


<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>