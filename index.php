<?php $nav_en_cours = ''; ?>
<?php require "header.php"; ?>


<!--<div id="bg-header">
    <h1>DUCK CITY</h1>
    <div class="bg"></div>
    <div class="bg2"></div>
    <div class="bg3"></div>

</div> #second

</header>-->


<div class="container index-zone2">
    <div class="sixteen columns text-intro">
        <h2  class="h2-title-zone">DUCK CITY C'EST QUOI ?</h2>
        <img class="logo-duck"src="images/logo-duck1.png">
        <p>Vous avez certainement déjà remarquer ses voitures avec un canard en plastique accrocher 
            à l'arriére. Il n'existe pas vraiment d'explication à cette mode qui nous viens du Japon :</br> le  TOW HOOK CHARM. <p>

            Grâce à Duck City vous allez pouvoir trouver le canard qui vous correspond. Soit à travers une galerie de canards 
            ou soit en customisant un canard avec des accesoires.</p>
    </div>
    <div class="one-half column">
        <a  class="btn"href="gallery.php">Accéder à la galerie</a>
    </div>
    <div class="one-half column">
        <a  class="btn"href="customisation.php">Customiser un canard</a>
    </div>





</div>
<div class="index-zone3">
    <img src="images/image1-2.jpg">

</div>

<div class="index-zone4">
    <div class="container">
        <h2  class="h2-title-zone">Le duck du mois d'août : Duck space </h2>
        <div class="one-half column">
            <img src="images/shop-galerie/duck-space-f.png">
            <a href="" class="btn">Acheter le duck space</a>
        </div>
        <div class="one-half column box-promo">
            <div class="promo"> 
                <p>Promo</p>
                <p>10,99€</p>
                <p>12,99€</p>
            </div>
            <div class="nom-duck"><p>Duck Space</p></div>
            <div class="dure-promo">
                <p>J-10</p>
                <p>pour en profiter</p>
            </div>
        </div>

        <div class="promo-newsletter">
            <h2  class="h2-title-zone">Abonnez-vous à la newsletter</h2>
            <p>Pour ne plus ratter aucune promo, abonnez-vous à notre newsletter</p>

            <div class="box-newsletter">
                <label>
                    <input class="newsletter email"type="email" name="courriel" value="Entre ton email"/>
                </label>
                <label>
                    <input class="newsletter"type="submit" value="Envoyer" />
                </label>
            </div>
        </div>

    </div>
</div>


<div class="index-zone5">
    <div class="container">
        <h2  class="h2-title-zone">Les meilleurs ventes</h2>
        <div id="slide1" class="scroll-img1">
            <ul>
                <li>
                    <a href="fiche-duck.php"><img src="images/shop-galerie/duck-army-p.png"></a>
                    <p>12,99€</p>
                    <a class="btn" href="fiche-duck.php"><p>En savoir plus</p></a>
                </li>
                <li>
                    <a href="fiche-duck.php"><img src="images/shop-galerie/duck-cowboy-p.png"></a>
                    <p>12,99€</p>
                    <a class="btn" href="fiche-duck.php"><p>En savoir plus</p></a>
                </li>
                <li>
                    <a href="fiche-duck.php"><img src="images/shop-galerie/duck-disco-p.png"></a>
                    <p>12,99€</p>
                    <a class="btn" href="fiche-duck.php"><p>En savoir plus</p></a>
                </li>
                <li>
                    <a href="fiche-duck.php"><img src="images/shop-galerie/duck-diva-p.png"></a>
                    <p>12,99€</p>
                    <a class="btn" href="fiche-duck.php"><p>En savoir plus</p></a>
                </li>
                <li>
                    <a href="fiche-duck.php"><img src="images/shop-galerie/duck-dj-p.png"></a>
                    <p>12,99€</p>
                    <a class="btn" href="fiche-duck.php"><p>En savoir plus</p></a>
                </li>
                <li>
                    <a href="fiche-duck.php"><img src="images/shop-galerie/duck-indien-p.png"></a>
                    <p>12,99€</p>
                    <a class="btn" href="fiche-duck.php"><p>En savoir plus</p></a>
                </li>
                <!--<li>
                        <a href="fiche-duck.php"><img src="images/shop-galerie/duck-paparazzi-p.png"></a>
                        <p>12,99€</p>
                        <a class="btn" href="fiche-duck.php"><p>En savoir plus</p></a>
                </li>
                <li>
                        <a href="fiche-duck.php"><img src="images/shop-galerie/duck-princesse-p.png"></a>
                        <p>12,99€</p>
                        <a class="btn" href="fiche-duck.php"><p>En savoir plus</p></a>
                </li>
                <li>
                        <a href="fiche-duck.php"><img src="images/shop-galerie/duck-queen-p.png"></a>
                        <p>12,99€</p>
                        <a class="btn" href="fiche-duck.php"><p>En savoir plus</p></a>
                </li>
                <li>
                        <a href="fiche-duck.php"><img src="images/shop-galerie/duck-punk-p.png"></a>
                        <p>12,99€</p>
                        <a class="btn" href="fiche-duck.php"><p>En savoir plus</p></a>
                </li>
                <li>
                        <a href="fiche-duck.php"><img src="images/shop-galerie/duck-rock-p.png"></a>
                        <p>12,99€</p>
                        <a class="btn" href="fiche-duck.php"><p>En savoir plus</p></a>
                </li>
                <li>
                        <a href="fiche-duck.php"><img src="images/shop-galerie/duck-royal-guard-p.png"></a>
                        <p>12,99€</p>
                        <a class="btn" href="fiche-duck.php"><p>En savoir plus</p></a>
                </li>-->

            </ul>

        </div>

        <div id="slide1-btn" class="text-center">
            <div class="btn-slide" id="slide1-backward"><a><img src="images/fleche-gauche-slider.png"></a></div>
            <div class="btn-slide" id="slide1-forward"> <a><img src="images/fleche-droite-slider.png"></a></div>
        </div>
    </div>
</div>



<script>
    $(function() {
        $('#slide1').scrollbox({
            direction: 'h',
            distance: 310
        });
        $('#slide1-backward').click(function() {
            $('#slide1').trigger('backward');
        });
        $('#slide1-forward').click(function() {
            $('#slide1').trigger('forward');
        });

    });
</script>


<?php
require "footer.php";
?>

</body>
</html>
