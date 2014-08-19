<?php $nav_en_cours = 'page-personnalisation'; ?>
<?php require "header.php"; ?>

</header>


	<div class="customisation-zone1">
			<img src="images/bg-personnalisation.jpg">
			<div class="title-page">
			<h2 class="h2-title-page">Personnalisation</h2>
			</div>
		

	</div>

	<div class="customisation-zone2">
		<div class="container">
			<p class="texte-intro">Customiser facilement votre canard en 3 étapes</p>
		</div>
	</div>

	<div class="customisation-zone3">
		<div class="container">
			<div class="one-third column etape">
				<h3>Choisie une couleur de peau pour ton duck</h3>

					<div id="slide2" class="scroll-img2">
						<ul>
							<li class="etape1-couleur">
								<div class="couleur jaune"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
							<li class="etape1-couleur">
								<div class="couleur rouge"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
							<li class="etape1-couleur">
								<div class="couleur bleu"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
							<li class="etape1-couleur">
								<div class="couleur rose"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
							<li class="etape1-couleur">
								<div class="couleur blanche"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
							<li class="etape1-couleur">
								<div class="couleur noire"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
						</ul>
					</div>
					<div id="slide2-btn" class="text-center">
			          <div class="btn-slide2" id="slide2-backward"><a><img src="images/fleche-gauche-slider.png"></a></div>
			          <div class="btn-slide2" id="slide2-forward"> <a><img src="images/fleche-droite-slider.png"></a></div>
			        </div>
			</div>

			<div class="one-third column etape">
				<h3>Choisie un ou des accesoires pour ton duck</h3>
					<div id="slide3" class="scroll-img3">
						<ul>
							<li class="etape2-accessoire">
								<div class="accessoire base"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
							<li class="etape2-accessoire">
								<div class="accessoire lunette-solaire"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
							<li class="etape2-accessoire">
								<div class="accessoire lunette-geek"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
							<li class="etape2-accessoire">
								<div class="accessoire corne"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
							<li class="etape2-accessoire">
								<div class="accessoire tatouage"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
							<li class="etape2-accessoire">
								<div class="accessoire trident"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
						</ul>
					</div>
					<div id="slide3-btn" class="text-center">
			          <div class="btn-slide3" id="slide3-backward"><a><img src="images/fleche-gauche-slider.png"></a></div>
			          <div class="btn-slide3" id="slide3-forward"> <a><img src="images/fleche-droite-slider.png"></a></div>
			        </div>
			</div>


			<div class="one-third column etape">
				<h3>Choisie un costume pour ton duck</h3>
					<div id="slide4" class="scroll-img4">
						<ul>
							<li class="etape3-costume">
								<div class="costume base"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
							<li class="etape3-costume">
								<div class="costume vacancier"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
							<li class="etape3-costume">
								<div class="costume class"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
							<li class="etape3-costume">
								<div class="costume chemise"></div>
								<a class="btn btn-etape" href="#">Choisir</a>
							</li>
						</ul>
					</div>
					<div id="slide4-btn" class="text-center">
			          <div class="btn-slide4" id="slide4-backward"><a><img src="images/fleche-gauche-slider.png"></a></div>
			          <div class="btn-slide4" id="slide4-forward"> <a><img src="images/fleche-droite-slider.png"></a></div>
			        </div>
					
			</div>

				<div class="box-duck-customiser">
					<img src="images/customisation/duck-vierge-profil.png">
					<img src="images/customisation/accessoire-corne-profil.png">
					<img src="images/customisation/costume-vacancier-profil.png">
				</div>
			

		</div>
	</div>


<script>
$(function () {
  $('#slide2').scrollbox({
    direction: 'h',
    distance: 96
  });
  $('#slide2-backward').click(function () {
    $('#slide2').trigger('backward');
  });
  $('#slide2-forward').click(function () {
    $('#slide2').trigger('forward');
  });

});

$(function () {
  $('#slide3').scrollbox({
    direction: 'h',
    distance: 96
  });
  $('#slide3-backward').click(function () {
    $('#slide3').trigger('backward');
  });
  $('#slide3-forward').click(function () {
    $('#slide3').trigger('forward');
  });

});

$(function () {
  $('#slide4').scrollbox({
    direction: 'h',
    distance: 96
  });
  $('#slide4-backward').click(function () {
    $('#slide4').trigger('backward');
  });
  $('#slide4-forward').click(function () {
    $('#slide4').trigger('forward');
  });

});
</script>





<?php

require "footer.php";

?>

</body>
</html>