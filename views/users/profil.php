<?php session_start(); ?>
<?php echo 'IN PROFIL'; ?>
<?php die(var_dump($_SESSION)); ?>
<?php $nav_en_cours = 'page-inscription'; ?>
<?php require "header.php"; ?>

</header>
<?php if (isset($_GET['i']) && $_GET['i'] == 1): ?>
 <div>
     Vous êtes désormais inscrit!
</div>
<?php endif; ?>


<div class="profil-zone1">
    <img src="images/bg-contact.jpg">
    <div class="title-page">
        <h2 class="h2-title-page">Profil</h2>
    </div>
</div>

<div class="profil-zone2">
    <div class="container">
        <img src="images/profil1.jpg">
        <p class="texte-intro">Nom</p>
        <p class="texte-intro">Prénom</p>
    </div>
</div>

<div class="profil-zone3">
    <div class="container">
        <p>blabla</p>

    </div>
</div>




<?php
require "footer.php";
?>

</body>
</html>