
<?php require "header.php"; ?>

</header>


	<div class="panier-zone1">
		<img src="images/bg-panier.jpg">
			<div class="title-page">
			<h2 class="h2-title-page">Mon panier</h2>
			</div>
		</div>

	</div>

	<div class="panier-zone2">
		<div class="container">
			<p class="texte-intro">Voici tout les canards que tu as mit dans ton panier</p>
		</div>
	</div>

	<div class="panier-zone3">
		<div class="container">
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

			<div class="ligne-product">
				<div class="column-product">
					<div class="product">
						<h4>Duck cowboy</h4>
						<img src="images/shop-galerie/duck-cowboy-p.png">
					</div>
					<div class="delete-product">
						<a class="btn">Supprimer</a>
					</div>
				</div>
				<div class="column-quantity">
					<div>
						<p>-</p>
						<p>1</p>
						<p>+</p>
					</div>
				</div>
				<div class="column-price">
					<p>12,99€</p>
				</div>
				<div class="column-total">
					<p>12,99€</p>
				</div>
			</div>

			<div class="ligne-product">
				<div class="column-product">
					<div class="product">
						<h4>Duck queen</h4>
						<img src="images/shop-galerie/duck-queen-p.png">
					</div>
					<div class="delete-product">
						<a class="btn">Supprimer</a>
					</div>
				</div>
				<div class="column-quantity">
					<div>
						<p>-</p>
						<p>1</p>
						<p>+</p>
					</div>
				</div>
				<div class="column-price">
					<p>12,99€</p>
				</div>
				<div class="column-total">
					<p>12,99€</p>
				</div>
			</div>

			<div class="ligne-product">
				<div class="column-product">
					<div class="product">
						<h4>Duck Rock</h4>
						<img src="images/shop-galerie/duck-rock-p.png">
					</div>
					<div class="delete-product">
						<a class="btn">Supprimer</a>
					</div>
				</div>
				<div class="column-quantity">
					<div>
						<p>-</p>
						<p>1</p>
						<p>+</p>
					</div>
				</div>
				<div class="column-price">
					<p>12,99€</p>
				</div>
				<div class="column-total">
					<p>12,99€</p>
				</div>
			</div>


			<div class="ligne-total">
				<div class="title-ligne">
					<h4>Frais de port</h4>
					<h4>Totale de la commande</h4>
				</div>
				<div class="prix-ligne">
					<p>6,90€</p>
					<p> ... , ... €</p>
				</div>
			</div>
			
			<div class="clean"></div>
			<div class="ligne-commander">
				<a href="" class="btn btn-continuer"> Continuer mes achats</a>
				<a href="" class="btn btn-commander"> Commander</a>
			</div>
		</div>
	</div>







</body>

<?php

require "footer.php";

?>