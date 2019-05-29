<?php

if (isConnected()) {
    if (isset($_POST['form-add-plant']) && isset($_POST['name']) && isset($_POST['category']) && isset($_POST['description']) && isset($_POST['content']) && isset($_POST['image']) && isset($_POST['flowering-period'])) {
        if (!empty($_POST['name']) && !empty($_POST['category']) && !empty($_POST['description']) && !empty($_POST['content']) && !empty($_POST['image']) && !empty($_POST['flowering-period'])) {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $floweringPeriod = $_POST['flowering-period'];

            $createPlant = Plants::addPlant($name, $category, $description, $content, $image, $floweringPeriod);

            if ($createPlant) {
                $successMessage = '<p class="success-message p-0 m-0">Félicitations ! Votre plante a été ajouté.</p>';
            }
            else {
                $errorMessage = '<p class="error-message p-0 m-0"><strong>Erreur :</strong> La plante existe déjà.</p>';
            }
        }
        else {
            $errorMessage = '<p class="error-message p-0 m-0"><strong>Erreur :</strong> Merci de remplir tous les champs.</p>';
        }
    }

    $allPlants = Plants::getPlants();
}
else {
    header('Location: ./?error=1');
}