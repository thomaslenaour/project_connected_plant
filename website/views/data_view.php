<?php ob_start(); ?>

<div class="container">
	<h2 class="main-title">Données de votre plante : <?= $plantName['name'] ?></h2>

    <p class="lead">Les données sont classées par date (du plus récent au plus ancien).</p>

    <div class="row my-5">
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-body">
					<h4 class="card-title">Humidité du sol (%)</h4>
					<p class="display-4"><?= $dataHistory[0]['floor_humidity'] ?> %</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-body">
					<h4 class="card-title">Pression (Pa)</h4>
					<p class="display-4"><?= $dataHistory[0]['pressure'] ?> Pa</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-body">
					<h4 class="card-title">Luminosité (%)</h4>
					<p class="display-4"><?= $dataHistory[0]['luminosity'] ?> %</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-body">
					<h4 class="card-title">Température (°C)</h4>
					<p class="display-4"><?= $dataHistory[0]['temperature'] ?> °C</p>
				</div>
			</div>
		</div>
	</div>

    <table class="table table-sm text-center">
        <thead class="thead-light">
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Pression</th>
                <th scope="col">Température</th>
                <th scope="col">Humidité du sol</th>
                <th scope="col">Humidité de l'air</th>
                <th scope="col">Luminosité</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dataHistory as $index => $data) {
            ?>
                <tr>
                    <th width="15%"scope="row"><?= $data['date'] ?></th>
                    <td width="17%"><?= $data['pressure'] ?></td>
                    <td width="17%"><?= $data['temperature'] ?></td>
                    <td width="17%"><?= $data['floor_humidity'] ?></td>
                    <td width="17%"><?= $data['air_humidity'] ?></td>
                    <td width="17%"><?= $data['luminosity'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();

require './views/includes/template.php';