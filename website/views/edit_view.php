<?php ob_start(); ?>

<div class="container">
    <h2>Modifier la plante <?= $dataPlant['name'] ?></h2>

    <form action="/edit/<?= $dataPlant['id'] ?>" method="post" id="form-edit-plant">
        <div class="fo-group">
            <input type="text" class="form-control">
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();

require '/views/includes/template_user.php';