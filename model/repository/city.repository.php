<?php
require_once(__DIR__ . "/../dto/user.dto.php");
require_once(__DIR__ . "/../dto/department.dto.php");
require_once(__DIR__ . "/../dto/city.dto.php");
require_once(__DIR__ . "/../dto/desire.dto.php");
class CityRepository
{

    public static function findById($id)
    {
        global $bdd;
        $sql = 'SELECT ville_id, ville_code_postal, ville_nom_reel
                FROM villes_france as city
                WHERE city.ville_id = :city_id LIMIT 1';
        $req = $bdd->prepare($sql);
        $req->bindParam(":city_id", $id, PDO::PARAM_INT);
        $req->execute();
        $city = $req->fetch(PDO::FETCH_ASSOC);

        return !$city ? null : self::getDto($city);
    }

    private static function getDto($city)
    {
        return new CityDto($city['ville_id'], $city['ville_code_postal'], $city['ville_nom_reel']);
    }

    private static function getDtos($cities)
    {
        $return = array();
        foreach ($cities as $city) {
            $return[] = self::getDto($city);
        }
        return $return;
    }
}
