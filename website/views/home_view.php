<?php ob_start(); ?>

<div class="banner d-none d-md-block"></div>

<div class="container">
  <section id="presentation" class="my-5">
    <h2 class="display-4 text-success mb-5 text-center">Connected Flowers, votre plante connectée</h2>
    <div class="row">
      <div class="col-md-4 d-none d-md-block">
        <img src="./assets/images/plant.png" alt="Plante illustration" class="img-fluid">
      </div>
      <div class="col-md-8 align-self-center justify">
        <p>
          <strong>Connected Flowers</strong> est une jeune start-up bordelaise spécialisée dans la botanique. Vous pouvez y retrouver une liste complète de toutes les plantes de la région. Vous aurez aussi accès aux informations détaillées de vos propres plantes (température ambiante, humidité du sol, luminosité...).
        </p>
      </div>
    </div>

    <h2 class="display-4 my-5 text-center">Testez notre application sans plus attendre ;)</h2>
  </section>
</div>

<?php
$content = ob_get_clean();

require_once './views/includes/template.php';