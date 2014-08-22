<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/viewconf.php'; ?>
<?php $nav_en_cours = 'page-collection'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>
</header>

<?php print_r($vars['boughtProducts']); ?>


<div class="ma-collection-zone1">
    <img src="<?php echo WEBROOT . 'images/bg-collection.jpg'; ?>">
    <div class="title-page">
        <h2 class="h2-title-page">Ma collection</h2>
    </div>
</div>

<div class="ma-collection-zone3 ">
    <div class="container">
        <div class="one-half column">
            <h2 class="h2-title-zone">Le dernier canard arrivé </br>dans ta collection</h2>
            <h3 class="h3-nom-duck">
                <a href="<?php echo WEBROOT . 'actions/products/details.php?id=' . $vars['lastproduct']['Product']['id']; ?>">
                    <?php echo utf8_encode($vars['lastproduct']['Product']['name']); ?>
                </a>
            </h3>

            <div class="duck">
                <img src="<?php echo WEBROOT . 'images/shop-galerie/duck-cowboy-p.png'; ?>">
            </div>

        </div>
        <div class="one-half column">
            <h2 class="h2-title-zone">Peut-être le futur canard de ta collection ?</h2>
            <h3 class="h3-nom-duck"><a href="#">Le duck royal guard</a></h3>
            <div class="duck">
                <img src="<?php echo WEBROOT . 'images/shop-galerie/duck-royal-guard-p.png'; ?> ">
            </div>
            <div class="btn-ma-collection">
                <a class="btn" href="">Acheter</a>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="h2-title-zone h2-creation">Tes achats</h2>
        <div class="one-third column">
            <h3 class="h3-nom-duck"></h3>
            <div class="duck">
                <img src="<?php echo $boughtProducts['Product']['imgprofil']; ?>">
            </div>

        </div>

    </div>

</div>




<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>
