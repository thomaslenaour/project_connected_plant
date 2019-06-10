<?php

if (isset($_GET['key']) && isset($_GET['pressure']) && isset($_GET['temperature']) && isset($_GET['floorhumidity']) && isset($_GET['airhumidity']) && isset($_GET['luminosity'])) {
    if (!empty($_GET['key']) && !empty($_GET['pressure']) && !empty($_GET['temperature']) && !empty($_GET['floorhumidity']) && !empty($_GET['airhumidity']) && !empty($_GET['luminosity'])) {
        if ($_GET['key'] == 'bb36efb806c00a3290e9518931bc2855') {
            if (is_numeric($_GET['pressure']) && is_numeric($_GET['temperature']) && is_numeric($_GET['floorhumidity']) && is_numeric($_GET['airhumidity']) && is_numeric($_GET['luminosity'])) {
                $pressure = floatval($_GET['pressure']);
                $temperature = floatval($_GET['temperature']);
                $floorHumidity = intval($_GET['floorhumidity']);
                $airHumidity = floatval($_GET['airhumidity']);
                $luminosity = floatval($_GET['luminosity']);

                $addRealData = Plants::addRealData(1, $pressure, $temperature, $floorHumidity, $airHumidity, $luminosity);

                if ($addRealData) {
                    header('Location: ./');
                    exit;
                }
                else {
                    header('Location: ./');
                    exit;
                }
            }
            else {
                header('Location: ./');
                exit;
            }
        }
        else {
            header('Location: ./');
            exit;
        }
    }
    else {
        header('Location: ./');
        exit;
    }
}
else {
    header('Location: ./');
    exit;
}