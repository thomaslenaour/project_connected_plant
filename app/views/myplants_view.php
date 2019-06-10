<?php ob_start();

if (isset($_GET['error']) && !empty($_GET['error']) && is_numeric($_GET['error']) && intval($_GET['error']) == 2) {
    ?>
    <div class="log-error-message alert alert-danger mb-0">
        <div class="container">
            <p class="error-message m-0 p-0">La plante ne vous appartient pas, merci de réessayer.</p>
        </div>
    </div>
<?php
}
?>


<div class="container">
    <h2 class="main-title">Mes plantes</h2>

    <a href="" class="btn btn-success btn-block my-3" data-toggle="modal" data-target="#addPlantModal">
        <i class="fas fa-plus"></i> 
        Ajouter une plante
    </a>

    <p class="lead">Vos plantes sont classées par ordre alphabétique.</p>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de la plante</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($plantsUser as $index => $plant) {
            ?>
                <tr>
                    <th width="10%"scope="row"><?= $index + 1 ?></th>
                    <td width="20%"><?= $plant['name'] ?></td>
                    <td width="55%"><?= $plant['description'] ?></td>
                    <td width="15%">
                        <a href="/data/<?= $plant['id_plant_user'] ?>" class="btn btn-info btn-block"><i class="fas fa-eye"></i> Données</a>
                        <a href="./myplants?delete=<?= $plant['id_plant_user'] ?>" class="btn btn-danger btn-block btn-delete-plant"><i class="fas fa-times"></i> Supprimer</a>
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
                <form action="./myplants" method="post" id="form-add-plant-user">
                    <div class="form-group">
                        <label for="plant-select">Sélectionnez la plante que vous souhaitez ajouter</label>
                        <select name="plant-selected" id="plant-select" class="form-control">
                            <option selected disabled>Choisissez une plante</option>
                            <?php
                            foreach ($allPlants as $index => $plant) {
                                echo '<option value="' . $plant['id'] . '">' . $plant['name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" name="form-add-plant-user" id="form-add-plant-user" class="btn btn-success btn-block">
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

require './views/includes/template.php';