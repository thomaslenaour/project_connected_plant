<?php ob_start(); ?>

<div class="container">
    <a href="#editPlantModal" class="btn-margin btn btn-primary btn-block" data-toggle="modal" data-target="#editPlantModal">
        <i class="fas fa-edit"></i> 
        Modifier la plante
    </a>
    <a href="/delete/<?= $dataPlant['id'] ?>" class="btn-delete-plant btn btn-danger btn-block mb-2">
        <i class="fas fa-times"></i> 
        Supprimer la plante
    </a>

    <div class="row">
        <div class="col-md-4">
            <h2 class="main-title"><?= $dataPlant['name'] ?></h2>
            <p class=""><?= $dataPlant['description'] ?></p>
            <p><strong>Période de floraison : </strong><?= $dataPlant['flowering_period'] ?></p>
        </div>
        <div class="col-md-8 d-none d-md-block mt-5">
            <img src="<?= $dataPlant['image'] ?>" alt="Image de la plante" class="img-fluid img-plant" >
        </div>
    </div>

    <div class="row py-5">
        <div class="col">
            <p>
                <?= $dataPlant['content'] ?>
            </p>
        </div>
    </div>
</div>

<div class="modal fade" id="editPlantModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modifier la plante <?= $dataPlant['name'] ?></h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/plant/<?= $dataPlant['id'] ?>" method="post" id="form-edit-plant">
                    <div class="form-group">
                        <input type="text" value="<?= $dataPlant['name'] ?>" name="name" class="form-control" placeholder="Nom de la plante" required>
                    </div>
                    <div class="form-group">
                        <input type="text" value="<?= $dataPlant['category'] ?>" name="category" class="form-control" placeholder="Catégorie de la plante" required>
                    </div>
                    <div class="form-group">
                        <input type="text" value="<?= $dataPlant['description'] ?>" name="description" class="form-control" placeholder="Description de la plante" required>
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" placeholder="Présentation de la plante" required><?= $dataPlant['content'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" value="<?= $dataPlant['image'] ?>" name="image" class="form-control" placeholder="URL de l'image (500x500)" required>
                    </div>
                    <div class="form-group">
                        <input type="text" value="<?= $dataPlant['flowering_period'] ?>" name="flowering-period" class="form-control" placeholder="Période de floraison" required>
                    </div>

                    <input type="hidden" name="id" value="<?= $dataPlant['id'] ?>" required>

                    <button type="submit" name="form-edit-plant" id="form-edit-plant" class="btn btn-success btn-block">
                        <i class="fas fa-plus"></i> 
                        Modifier la plante
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

require './views/includes/template_user.php';