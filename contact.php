<?php session_start(); ?>
<?php $nav_en_cours = 'page-contact'; ?>
<?php require "header.php"; ?>

</header>


<div class="contact-zone1">
    <img src="images/bg-contact.jpg">
    <div class="title-page">
        <h2 class="h2-title-page">Contact</h2>
    </div>
</div>

<div class="contact-zone2">
    <div class="container">
        <p class="texte-intro">Une question, une suggestion... Nous sommes à votre écoute</p>
    </div>
</div>

<div class="contact-zone3">
    <div class="container ">
        <div class="one-half column">
            <h2  class="h2-title-zone">Nous contacter</h2>
            <form action="contact.php">
                <ul>
                    <li>
                        <label>NOM :</label>
                        <input type="text" id="" class="" name="nom" size="30" placeholder="Daffy Duck">
                    </li>

                    <li>
                        <label>EMAIL :</label>
                        <input type="text" id="" class="" name="email" size="30" placeholder="daffy.duck@gmail.com">
                    </li>
                    <li>
                        <label>MESSAGE :</label>
                        <textarea rows="15" id="" class="" name="message" size="30" placeholder="Coin Coin Coin ..."></textarea>
                    </li>
                    <li>
                        <label></label>
                        <input type="submit" id="" class="" name="send" value="SEND">
                    </li>
                </ul>
            </form>
        </div>

        <div class="one-half column">
            <h2  class="h2-title-zone"> Notre adresse</h2>
            <p>DUCK CITY</p>
            <p>19, Duck Road</p>
            <p>79450 Looney Tunes</p>
            <p>DUCKLAND</p>

            <h2  class="h2-title-zone"> La carte</h2>
            <iframe class="carte"src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3641.3435363230296!2d-158.0507522536193!3d21.481122887498216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sfr!2sbe!4v1407356095375" width="458" height="355" frameborder="0" style="border:0"></iframe>		</div>
    </div>
</div>

<?php
require "footer.php";
?>

</body>
</html>