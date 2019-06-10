<?php

if (isConnected() && isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    $idPlantUser = intval($_GET['id']);
    $idUser = $_SESSION['userID'];

    if ($idPlantUser == 1 && $idUser == 1) {
        $plantName = Plants::getPlantName($idPlantUser);
        $dataHistory = Plants::getPlantData($idPlantUser, $idUser);

        if ($dataHistory[0]['floor_humidity'] == 2) {
            $humidity = 'Humide';
        }
        else {
            $humidity = 'Pas humide';
        }
    }
    else {
        $addData = Plants::addData($idPlantUser, $idUser);

        if (empty(array_filter($addData))) {
            $plantName = Plants::getPlantName($idPlantUser);
            $dataHistory = Plants::getPlantData($idPlantUser, $idUser);
    
            if (!$dataHistory) {
                header('Location: /myplants?error=2');
                exit;
            }
        }
        else {
            header('Location: /myplants?error=2');
            exit;
        }
    }
}
else {
    header('Location: /?error=1');
    exit;
}