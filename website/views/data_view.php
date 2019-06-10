<?php ob_start(); ?>

<div class="container">
	<h2 class="main-title">Données de votre plante : <?= $plantName['name'] ?></h2>

    <p class="lead">Les données sont classées par date (du plus récent au plus ancien).</p>

    <div class="row my-5">
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-body">
					<h4 class="card-title">Humidité du sol</h4>
					<p class="display-4"><?php echo is_null($dataHistory[0]['floor_humidity']) ? 'N/A' : $dataHistory[0]['floor_humidity'] ?></p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-body">
					<h4 class="card-title">Pression (hPa)</h4>
					<p class="display-4"><?php echo is_null($dataHistory[0]['pressure']) ? 'N/A' : $dataHistory[0]['pressure'] ?></p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-body">
					<h4 class="card-title">Luminosité (lux)</h4>
					<p class="display-4"><?php echo is_null($dataHistory[0]['luminosity']) ? 'N/A' : $dataHistory[0]['luminosity'] ?></p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-body">
					<h4 class="card-title">Température (°C)</h4>
					<p class="display-4"><?php echo is_null($dataHistory[0]['temperature']) ? 'N/A' : $dataHistory[0]['temperature'] ?></p>
				</div>
			</div>
		</div>
	</div>

    <table class="table table-sm text-center">
        <thead class="thead-light">
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Pression (hPa)</th>
                <th scope="col">Température (°C)</th>
                <th scope="col">Humidité du sol</th>
                <th scope="col">Humidité de l'air (%)</th>
                <th scope="col">Luminosité (lux)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dataHistory as $index => $data) {
				if ($data['floor_humidity'] == '2') {
					$data['floor_humidity'] = 'Humide';
				}
				else {
					$data['floor_humidity'] = 'Pas humide';
				}
            ?>
                <tr>
                    <th width="15%"scope="row"><?= $data['date'] ?></th>
                    <td width="17%">
						<?php echo is_null($data['pressure']) ? 'N/A' : $data['pressure']; ?>
					</td>
                    <td width="17%">
						<?php echo is_null($data['temperature']) ? 'N/A' : $data['temperature']; ?>
					</td>
                    <td width="17%">
						<?php echo is_null($data['floor_humidity']) ? 'N/A' : $data['floor_humidity']; ?>
					</td>
                    <td width="17%">
						<?php echo is_null($data['air_humidity']) ? 'N/A' : $data['air_humidity']; ?>
					</td>
                    <td width="17%">
						<?php echo is_null($data['luminosity']) ? 'N/A' : $data['luminosity']; ?>
					</td>
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