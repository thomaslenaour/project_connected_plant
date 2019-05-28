<?php ob_start(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-6 align-self-center">
			<h2>Bonjour <?= $_SESSION['userFirstName'] . ' ' . $_SESSION['userLastName'] ?>, heureux de vous revoir</h2>
			<p class="lead text-justify">
				Bienvenue dans votre espace membre ! Dans cet espace, vous avez accès à une panoplie d'informations sur différentes plantes. Bien sûr, vous pouvez également consulter les données de votre plante connectée en temps réel. Ainsi, vous pourrez gérer au mieux l'alimentation de votre plante.
			</p>
		</div>
		<div class="col-md-6">
			<img src="./assets/images/women-plant.png" alt="Illustration femme en train d'arroser des plantes" class="img-fluid">
		</div>
	</div>

	<h2>Les données de votre plante connectée</h2>

	<div class="row my-5">
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-body">
					<h4 class="card-title">Humidité (%)</h4>
					<p class="display-4">60 %</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-body">
					<h4 class="card-title">Pression (Pa)</h4>
					<p class="display-4">8 Pa</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-body">
					<h4 class="card-title">Luminosité (%)</h4>
					<p class="display-4">79 %</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-body">
					<h4 class="card-title">Température (°C)</h4>
					<p class="display-4">22 °C</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$content = ob_get_clean();

require './views/includes/template_user.php';