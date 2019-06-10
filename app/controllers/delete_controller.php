<?php

if (isConnected() && isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $deletePlant = Plants::deletePlant($id);

    if ($deletePlant) {
        header('Location: /plants?delete=1');
        exit;
    }
    else {
        header('Location: /plants?error=2');
        exit;
    }
}
else {
    header('Location: ./?error=1');
    exit;
}