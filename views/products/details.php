<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/viewconf.php'; ?>
<?php $nav_en_cours = 'page-shop-details'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>
</header>


    <div class="gallery-zone1">
        <img src="<?php echo WEBROOT . 'images/bg-details.jpg'; ?>" />
        <div class="title-page">
            <h2 class="h2-title-page"><?php echo utf8_encode($vars['product']['name']); ?></h2>
        </div>
    </div>

    <div class="fiche-zone2">
        <div class="container">
            <p class="texte-intro"> <?php echo utf8_encode($vars['product']['theme']); ?></p>
            
        </div>
    </div>

    <div class="fiche-zone3">
        <div class="container">
            <div class="one-half column">
                <h2  class="h2-title-zone"><?php echo utf8_encode($vars['product']['name']); ?></h2>
                <img src="<?php echo ($vars['product']['imgprofil']); ?>"/>
            </div>

            <div class="one-half column"> 
                <h4>Déscription:</h4>
                <p><?php echo utf8_encode($vars['product']['description']); ?></p>
                <h4>Dimention:</h4>
                <ul>
                    <li>Hauteur : <?php echo utf8_encode($vars['product']['hauteur']) . ' '; ?>cm</li>
                    <li>Largeur : <?php echo utf8_encode($vars['product']['largeur']). ' '; ?>cm</li>
                    <li>Longueur : <?php echo utf8_encode($vars['product']['longueur']). ' '; ?>cm</li>
                </ul>
                <h4>Prix:</h4>
                <p><?php echo utf8_encode($vars['product']['price']); ?>&euro;</p>
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