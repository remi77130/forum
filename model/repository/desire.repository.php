<?php
require_once(__DIR__ . "/../dto/user.dto.php");
require_once(__DIR__ . "/../dto/desire.dto.php");
class DesireRepository
{

    public static function findAll(){
        global $bdd;
        $sql = 'SELECT desire.id, desire.text, desire.color
                FROM desire';
        $req = $bdd->prepare($sql);
        $req->execute();
        $desire = $req->fetchAll(PDO::FETCH_ASSOC);

        return !$desire ? null : self::getDtos($desire);
    }

    public static function findById($id){
        global $bdd;
        $sql = 'SELECT desire.id, desire.text, desire.color
                FROM desire
                WHERE desire.id = :desire_id LIMIT 1';
        $req = $bdd->prepare($sql);
        $req->bindParam(":desire_id", $id, PDO::PARAM_INT);
        $req->execute();
        $desire = $req->fetch(PDO::FETCH_ASSOC);

        return !$desire ? null : self::getDto($desire);
    }

    public static function getForUser($user_id)
    {
        global $bdd;
        $sql = 'SELECT user.id as user_id, user.desire_datetime, desire.id, desire.text, desire.color
                FROM membres as user
                LEFT JOIN desire ON desire.id = user.desire_id AND desire_datetime > DATE_SUB(UTC_TIMESTAMP , INTERVAL 30 MINUTE)
                WHERE user.id = :user_id LIMIT 1';
        $req = $bdd->prepare($sql);
        $req->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);

        return !$user ? null : self::getDto($user);
    }

    private static function getDto($desire)
    {
        return !$desire['text'] ? null : new DesireDto($desire['id'], $desire['text'], $desire['color']);
    }

    private static function getDtos($desires)
    {
        $return = array();
        foreach ($desires as $desire) {
            $return[] = self::getDto($desire);
        }
        return $return;
    }
}
