<?php

class Plants {

    public static function getPlants() {
        global $db;

        $req = $db->fetch('SELECT * FROM plants ORDER BY name', [], true);

        return $req;
    }

    public static function addPlant($name, $category, $description, $content, $image, $floweringPeriod) {
        global $db;

        $name = str_secur($name);
        $category = str_secur($category);
        $description = str_secur($description);
        $content = str_secur($content);
        $image = str_secur($image);
        $floweringPeriod = str_secur($floweringPeriod);

        $plantIsExist = $db->fetch('SELECT LOWER(name) FROM plants WHERE name = ?', [strtolower($name)], false);

        if (!$plantIsExist) {
            $req = $db->execute('INSERT INTO plants(name, category, description, content, image, flowering_period) VALUES(?, ?, ?, ?, ?, ?)', [$name, $category, $description, $content, $image, $floweringPeriod]);

            return $req;
        }
        else {
            return false;
        }
    }

}