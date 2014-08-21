<!--<?php //require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/viewconf.php'; ?>-->
<?php $nav_en_cours = 'page-connexion'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>

<div class="achat-zone1">
    <img src="<?php echo WEBROOT . 'images/bg-contact.jpg'; ?>">
    <div class="title-page">
        <h2 class="h2-title-page">Tout tes achats</h2>
    </div>
</div>

<div class="achat-zone2">
    <div class="container">
        <p class="texte-intro">Voici touts les canards que tu as acheté sur duck city</p>
    </div>
</div>



<div class="achat-zone3">
		<div class="container">

			

			<div class="one-four column achat-duck">
				
					<h3 class="h3-nom-duck"><a class="btn" href="fiche-duck.php">Duck army</a></h3>
					<a href="fiche-duck.php"><img src="images/shop-galerie/duck-army-p.png"></a>
				
			</div>
			<div class="one-four column achat-duck">
				
					<h3 class="h3-nom-duck"><a class="btn" href="">Duck princesse</a></h3>
					<a href=""><img src="images/shop-galerie/duck-princesse-p.png"></a>
				
			</div>
			<div class="one-four column achat-duck">
				
					<h3 class="h3-nom-duck"><a class="btn" href="">Duck cowboy</a></h3>
					<a href=""><img src="images/shop-galerie/duck-cowboy-p.png"></a>
				
			</div>
			<div class="one-four column achat-duck">
				
					<h3 class="h3-nom-duck"><a class="btn" href="">Duck disco</a></h3>
					<a href=""><img src="images/shop-galerie/duck-disco-p.png"></a>
				
			</div>
			<div class="one-four column achat-duck">
				
					<h3 class="h3-nom-duck"><a class="btn" href="">Duck diva</a></h3>
					<a href=""><img src="images/shop-galerie/duck-diva-p.png"></a>
				
			</div>
		</div>
</div>



<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>