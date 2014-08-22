<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/viewconf.php'; ?>
<?php $nav_en_cours = 'page-collection'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>
</header>


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
                <a href="<?php echo WEBROOT . 'actions/products/details.php?id=' . $vars['lastproduct']['Product']['id']; ?>">
                    <img src="<?php echo $vars['lastproduct']['Product']['imgprofil']; ?>">
                </a>
            </div>
        </div>
        <div class="one-half column">
            <h2 class="h2-title-zone">Peut-être le futur canard de ta collection ?</h2>
            <h3 class="h3-nom-duck"><a href="<?php echo WEBROOT . 'actions/products/details.php?id=21'; ?>">Le duck royal guard</a></h3>
            <div class="duck">
                <a href="<?php echo WEBROOT . 'actions/products/details.php?id=21'; ?>"><img src="<?php echo '/duck-city/data/products/21/duck_royal_guard_p.png'; ?> "></a>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="h2-title-zone h2-creation">Tes derniers achats</h2>
        <?php if (isset($vars['boughtProducts']) && !empty($vars['boughtProducts'])): ?>
            <?php foreach ($vars['boughtProducts'] as $boughtProducts): ?>
                <div class="one-third column">
                    <h3 class="h3-nom-duck">
                        <a href="<?php echo WEBROOT . 'actions/products/details.php?id=' . $boughtProducts['Product']['id']; ?>">
                            <?php echo utf8_encode($boughtProducts['Product']['name']); ?>
                        </a>
                    </h3>
                    <div class="duck">
                        <a href="<?php echo WEBROOT . 'actions/products/details.php?id=' . $boughtProducts['Product']['id']; ?>">
                            <img src="<?php echo $boughtProducts['Product']['imgprofil']; ?>">
                        </a>
                    </div>
                    <?php $date = new DateTime($boughtProducts['created']); ?>
                    <div><?php echo $boughtProducts['product_quantity'] . ' exemplaire(s) acheté(s) le ' . date_format($date, 'd/m/Y à H:i'); ?></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>




<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>
