<?php

class Plants {

    public static function getPlants() {
        global $db;

        $req = $db->fetch('SELECT * FROM plants ORDER BY name', [], true);

        return $req;
    }

    public static function addPlant($name, $category, $description, $content, $image, $floweringPeriod) {
        global $db;

        $name = ucfirst(str_secur($name));
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

    public static function getPlantsByUserId($idUser) {
        global $db;

        $idUser = str_secur($idUser);

        $req = $db->fetch(
            'SELECT plants.id, plants.name, plants.description
            FROM plants
            JOIN plants_user
                ON plants_user.id_user = ?
                AND plants_user.id_plant = plants.id', 
            [$idUser], true);

        return $req;
    }
    
    public static function addPlantUser($idPlant, $idUser) {
        global $db;

        $idPlant = str_secur($idPlant);
        $idUser = str_secur($idUser);

        $req = $db->execute('INSERT INTO plants_user(id_plant, id_user, minutes) VALUES(?, ?, 0)', [$idPlant, $idUser]);

        return $req;
    }

    public static function getPlantById($id) {
        global $db;

        $id = str_secur($id);

        $req = $db->fetch('SELECT * FROM plants WHERE id = ?', [$id], false);

        return $req;
    }

    public static function deletePlant($id) {
        global $db;

        $id = str_secur($id);

        $req = $db->execute('DELETE FROM plants WHERE id = ?', [$id]);

        return $req;
    }

    public static function editPlant($name, $category, $description, $content, $image, $floweringPeriod, $id) {
        global $db;

        $name = ucfirst(str_secur($name));
        $category = str_secur($category);
        $description = str_secur($description);
        $content = str_secur($content);
        $image = str_secur($image);
        $floweringPeriod = str_secur($floweringPeriod);
        $id = str_secur($id);

        $req = $db->execute('UPDATE plants SET name = ?, category = ?, description = ?, content = ?, image = ?, flowering_period = ? WHERE id = ?', [$name, $category, $description, $content, $image, $floweringPeriod, $id]);

        return $req;
    }

}