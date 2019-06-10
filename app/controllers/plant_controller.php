<?php

if (isConnected() && isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    if (isset($_POST['form-edit-plant']) && isset($_POST['name']) && isset($_POST['category']) && isset($_POST['description']) && isset($_POST['content']) && isset($_POST['image']) && isset($_POST['flowering-period']) && isset($_POST['id'])) {
        if (!empty($_POST['name']) && !empty($_POST['category']) && !empty($_POST['description']) && !empty($_POST['content']) && !empty($_POST['image']) && !empty($_POST['flowering-period']) && !empty($_POST['id'])) {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $floweringPeriod = $_POST['flowering-period'];
            $plantId = $_POST['id'];

            $editPlant = Plants::editPlant($name, $category, $description, $content, $image, $floweringPeriod, $plantId);

            if ($editPlant) {
                $successMessage = '<p class="success-message p-0 m-0">Félicitations ! Votre plante a été modifiée.</p>';
            }
            else {
                $errorMessage = '<p class="error-message p-0 m-0"><strong>Erreur :</strong> La plante n\'a pas pu être modifiée.</p>';
            }
        }
        else {
            $errorMessage = '<p class="error-message p-0 m-0"><strong>Erreur :</strong> Merci de remplir tous les champs.</p>';
        }
    }

    $dataPlant = Plants::getPlantById($id);
}
else {
    header('Location: ./?error=1');
    exit;
}