<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/duck-city/phpconf/viewconf.php'; ?>
<?php $nav_en_cours = 'page-shop-details'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/duck-city/header.php'; ?>
</header>

<script src="<?php echo WEBROOT . 'scripts/panier.js'; ?>"></script>

<?php print_r($vars['sproducts']); ?>

<div>

    <?php if (isset($vars['sproducts']) && !empty($vars['sproducts'])): ?>
    <table>
        <tr>
            <th>Canard</th>
            <th>Prix Unité</th>
            <th>Quantité</th>
            <th>Total</th>
        </tr>
        
        <?php foreach ($vars['sproducts'] as $sproduct): ?>
        <tr>
            <td><?php echo utf8_encode($sproduct['Product']['name']); ?></td>
            <td><?php echo utf8_encode($sproduct['Product']['price']) . '&euro;'; ?></td>
            <td><?php echo utf8_encode($sproduct['quantity']); ?></td>
            <td><?php echo utf8_encode(($sproduct['quantity'] * $sproduct['Product']['price']) . '&euro;'); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <ul>
        <li><a>Commander</a></li>
        <li><a>Imprimer le Panier</a></li>
        <li><a>Vider le Panier</a></li>
    </ul>
    <?php else: ?>
        Aucun canard dans votre panier pour l'instant. Pourquoi ne pas faire un tour dans notre shop ?
    <?php endif; ?>
        
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . WEBROOT . 'footer.php'; ?>

</body>
</html>