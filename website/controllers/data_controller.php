<?php

if (isConnected() && isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    $idPlantUser = intval($_GET['id']);
    $idUser = $_SESSION['userID'];

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
else {
    header('Location: /?error=1');
    exit;
}