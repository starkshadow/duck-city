<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/viewconf.php'; ?>
<?php $nav_en_cours = 'page-shop-details'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>
</header>




<div class="gallery-zone1">
    <img src="<?php echo WEBROOT . 'images/bg-shop.jpg'; ?>" />
    <div class="title-page">
        <h2 class="h2-title-page"><?php echo utf8_encode($vars['product']['name']); ?></h2>
    </div>
</div>

</div>


<!-- affichage description -->
<div><?php echo utf8_encode($vars['product']['description']); ?></div>

<!-- affichage nom accessoire -->
<div><?php echo utf8_encode($vars['product']['Accessory']['name']); ?></div>




    <div class="fiche-zone2">
        <div class="container">
            <p class="texte-intro"> Phrase marrant par rapport au theme du canard</p>
            <?php print_r($vars['product']); ?>
        </div>
    </div>

    <div class="fiche-zone3">
        <div class="container">
            <div class="one-half column">
                <h2  class="h2-title-zone">Duck army</h2>
                <img src="images/shop-galerie/duck-army-p.png"/>
            </div>

            <div class="one-half column"> 
                <h4>Déscription:</h4>
                <p>Minions ipsum chasy para tú uuuhhh. Me want bananaaa! me want 
                    bananaaa! Gelatooo wiiiii hahaha. Poulet tikka masala tulaliloo 
                    hana dul sae butt baboiii uuuhhh tú butt. Chasy gelatooo tank yuuu!
                </p>
                <h4>Dimention:</h4>
                <ul>
                    <li>Hauteur : 10cm</li>
                    <li>Largeur : 8cm</li>
                    <li>Longeur : 11cm</li>
                </ul>
                <h4>Quantité:</h4>
                <p>4 en Stock</p>
                <h4>Prix:</h4>
                <p>12,99€</p>
                <a href="" class="btn">Ajouter au panier</a>
            </div>

            <h2  class="h2-title-zone suggestion">Suggestion de duck</h2>
            <div class="one-third column suggestion-duck">
                    <h3 class="h3-nom-duck"><a class="btn" href="fiche-duck.php">Duck Disco</a></h3>
                    <a href="fiche-duck.php"><img src="images/shop-galerie/duck-disco-p.png"></a>
            </div>
            <div class="one-third column suggestion-duck">
                    <h3 class="h3-nom-duck"><a class="btn" href="">Duck princesse</a></h3>
                    <a href=""><img src="images/shop-galerie/duck-princesse-p.png"></a>
            </div>
            <div class="one-third column suggestion-duck">
                    <h3 class="h3-nom-duck"><a class="btn" href="">Duck cowboy</a></h3>
                    <a href=""><img src="images/shop-galerie/duck-cowboy-p.png"></a>
            </div>
        </div>

    </div>





<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>