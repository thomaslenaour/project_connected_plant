<?php
// echo '<div style="margin-top: 150px;"></div>';

if (isConnected()) {
    $idUser = $_SESSION['userID'];

    if (isset($_POST['form-add-plant-user']) && isset($_POST['plant-selected'])) {
        if (!empty($_POST['plant-selected'])) {
            $idPlant = intval($_POST['plant-selected']);

            $addPlantUser = Plants::addPlantUser($idPlant, $idUser);

            if ($addPlantUser) {
                $successMessage = '<p class="success-message p-0 m-0">La plante a bien été ajouté à votre liste personnel !</p>';
            }
            else {
                $errorMessage = '<p class="error-message p-0 m-0">Erreur lors de la requête. Merci de réessayer.</p>';
            }
        }
        else {
            $errorMessage = '<p class="error-message p-0 m-0">Merci de remplir les champs.</p>';
        }
    }

    $allPlants = Plants::getPlants();
    $plantsUser = Plants::getPlantsByUserId($idUser);
}
else {
    header('Location: ./?error=1');
    exit;
}