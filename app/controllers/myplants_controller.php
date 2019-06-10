<?php

if (isConnected()) {
    $idUser = $_SESSION['userID'];

    // Create
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

    // Delete
    if (isset($_GET['delete']) && !empty($_GET['delete']) && is_numeric($_GET['delete'])) {
        $idPlantUser = intval($_GET['delete']);
    
        $deletePlant = Plants::deletePlantUser($idPlantUser, $idUser);
    
        if ($deletePlant) {
            $successMessage = '<p class="success-message p-0 m-0">La plante a bien été supprimé de votre liste personnel !</p>';
        }
        else {
            $errorMessage = '<p class="error-message p-0 m-0">Erreur lors de la requête. Merci de réessayer.</p>';
        }
    }

    // Get
    $allPlants = Plants::getPlants();
    $plantsUser = Plants::getPlantsByUserId($idUser);
}
else {
    header('Location: ./?error=1');
    exit;
}