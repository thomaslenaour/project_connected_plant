<?php

/**
 * Class Plants
 */
class Plants {

    /**
     * Get all plants
     *
     * @return array
     */
    public static function getPlants() {
        global $db;

        $req = $db->fetch('SELECT * FROM plants ORDER BY name', [], true);

        return $req;
    }

    /**
     * Get all plants of a specific user
     *
     * @param int $idUser
     * @return array
     */
    public static function getPlantsByUserId($idUser) {
        global $db;

        $idUser = str_secur($idUser);

        $req = $db->fetch(
            'SELECT plants.id, plants.name, plants.description, plants_user.id AS id_plant_user
            FROM plants
            JOIN plants_user
                ON plants_user.id_user = ?
                AND plants_user.id_plant = plants.id', 
            [$idUser], true);

        return $req;
    }

    /**
     * Get plant name according to a specific user
     *
     * @param int $idPlantUser
     * @return array
     */
    public static function getPlantName($idPlantUser) {
        global $db;

        $idPlantUser = intval(str_secur($idPlantUser));

        $req = $db->fetch(
            'SELECT name
            FROM plants
            WHERE id = (
                SELECT id_plant
                FROM plants_user
                WHERE id = ?
            )', 
            [$idPlantUser], false);

        return $req;
    }

    /**
     * Get all plants data according a specific user
     *
     * @param int $idPlantUser
     * @param int $idUser
     * @return array
     */
    public static function getPlantData($idPlantUser, $idUser) {
        global $db;

        $idPlantUser = intval(str_secur($idPlantUser));
        $idUser = str_secur($idUser);

        // On récupère toutes les plantes de l'utiisateur
        $tablePlants = [];
        $userPlants = $db->fetch('SELECT id FROM plants_user WHERE id_user = ?', [$idUser], true);
        foreach ($userPlants as $index => $plant) {
            array_push($tablePlants, intval($plant['id']));
        }

        if (in_array($idPlantUser, $tablePlants)) {
            $req = $db->fetch(
                'SELECT *
                FROM plants_data
                WHERE id_plant_user = ?
                ORDER BY id DESC
                LIMIT 30',
                [$idPlantUser], true);
    
            return $req;
        }
        else {
            return false;
        }
    }

    /**
     * Get plant according ID
     *
     * @param int $id
     * @return array
     */
    public static function getPlantById($id) {
        global $db;

        $id = str_secur($id);

        $req = $db->fetch('SELECT * FROM plants WHERE id = ?', [$id], false);

        return $req;
    }

    /**
     * Add plant in DataBase
     *
     * @param string $name
     * @param string $category
     * @param string $description
     * @param string $content
     * @param string $image
     * @param string $floweringPeriod
     * @return boolean
     */
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
    
    /**
     * Add plant user in DataBase
     *
     * @param int $idPlant
     * @param int $idUser
     * @return boolean
     */
    public static function addPlantUser($idPlant, $idUser) {
        global $db;

        $idPlant = str_secur($idPlant);
        $idUser = str_secur($idUser);

        $req = $db->execute('INSERT INTO plants_user(id_plant, id_user) VALUES(?, ?)', [$idPlant, $idUser]);

        return $req;
    }

    public static function isHisPlant($idUser, $idPlant) {
        global $db;

        $idPlant = intval(str_secur($idPlant));
        $idUser = intval(str_secur($idUser));

        $req = $db->fetch('SELECT * FROM plants_user WHERE id_user = ? AND id = ?', [$idUser, $idPlant], false);

        return $req;
    }

    public static function addData($idPlant, $idUser) {
        global $db;

        $idPlant = intval(str_secur($idPlant));
        $idUser = intval(str_secur($idUser));

        $isHisPlant = self::isHisPlant($idUser, $idPlant);

        if ($isHisPlant) {
            $req = $db->fetch(
                'INSERT INTO plants_data(pressure, temperature, floor_humidity, air_humidity, luminosity, date, id_plant_user)
                VALUES(NULL, NULL, NULL, NULL, NULL, DATE_ADD(NOW(), INTERVAL 2 HOUR), ?)', 
                [$idPlant]);
    
            return $req;
        }
        else {
            return false;
        }
    }

    /**
     * Add data user for Thomas
     *
     * @param int $idPlantUser
     * @param float $pressure
     * @param float $temperature
     * @param float $floorHumidity
     * @param float $airHumidity
     * @param float $luminosity
     * @return void
     */
    public static function addRealData($idPlantUser, $pressure, $temperature, $floorHumidity, $airHumidity, $luminosity) {
        global $db;

        $idPlantUser = intval(str_secur($idPlantUser));
        $pressure = floatval(str_secur($pressure));
        $temperature = floatval(str_secur($temperature));
        $floorHumidity = intval(str_secur($floorHumidity));
        $airHumidity = floatval(str_secur($airHumidity));
        $luminosity = floatval(str_secur($luminosity));

        $req = $db->execute(
            'INSERT INTO plants_data(pressure, temperature, floor_humidity, air_humidity, luminosity, date, id_plant_user)
            VALUES(?, ?, ?, ?, ?, DATE_ADD(NOW(), INTERVAL 2 HOUR), ?)', 
            [$pressure, $temperature, $floorHumidity, $airHumidity, $luminosity, $idPlantUser]);

        return $req;
    }

    /**
     * Delete plant according ID
     *
     * @param int $id
     * @return boolean
     */
    public static function deletePlant($id) {
        global $db;

        $id = intval(str_secur($id));

        $isPlantExist = self::getPlantById($id);

        if ($isPlantExist) {
            $req = $db->execute('DELETE FROM plants WHERE id = ?', [$id]);

            return $req;
        }
        else {
            return false;
        }
    }

    /**
     * Delete plant user acording plant ID and user ID
     *
     * @param int $idPlantUser
     * @param int $idUser
     * @return boolean
     */
    public static function deletePlantUser($idPlantUser, $idUser) {
        global $db;

        $idPlantUser = intval(str_secur($idPlantUser));
        $idUser = intval(str_secur($idUser));

        $isHisPlant = self::isHisPlant($idUser, $idPlantUser);

        if ($isHisPlant) {
            $req = $db->execute('DELETE FROM plants_user WHERE id = ? AND id_user = ?', [$idPlantUser, $idUser]);

            return $req;
        }
        else {
            return false;
        }
    }

    /**
     * Edit plant according ID
     *
     * @param string $name
     * @param string $category
     * @param string $description
     * @param string $content
     * @param string $image
     * @param string $floweringPeriod
     * @param int $id
     * @return boolean
     */
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