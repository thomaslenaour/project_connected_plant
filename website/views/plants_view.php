<?php ob_start(); ?>

<div class="container">
	<h2 class="main-title">Liste des plantes</h2>

    <a href="/add" class="btn btn-success btn-block my-3" data-toggle="modal" data-target="#addPlantModal">
        <i class="fas fa-plus"></i> 
        Ajouter une plante
    </a>

    <p class="lead">Les plantes sont classées par ordre alphabétique.</p>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de la plante</th>
                <th scope="col">Description</th>
                <th scope="col">Consulter</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($allPlants as $index => $plant) {
            ?>
                <tr>
                    <th width="10%"scope="row"><?= $index + 1 ?></th>
                    <td width="20%"><?= $plant['name'] ?></td>
                    <td width="55%"><?= $plant['description'] ?></td>
                    <td width="15%">
                        <a href="/plant/<?= $plant['id'] ?>" class="btn btn-primary btn-block">Consulter</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="addPlantModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ajouter une plante</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./plants" method="post" id="form-add-plant">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nom de la plante" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="category" class="form-control" placeholder="Catégorie de la plante" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" class="form-control" placeholder="Description de la plante" required>
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" placeholder="Présentation de la plante" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="image" class="form-control" placeholder="URL de l'image (500x500)" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="flowering-period" class="form-control" placeholder="Période de floraison" required>
                    </div>

                    <button type="submit" name="form-add-plant" id="form-add-plant" class="btn btn-success btn-block">
                        <i class="fas fa-plus"></i> 
                        Ajouter la plante
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

require './views/includes/template_user.php';