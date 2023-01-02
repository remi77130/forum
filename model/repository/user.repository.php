<?php
require_once(__DIR__ . "/../dto/user.dto.php");
require_once(__DIR__ . "/../dto/department.dto.php");
require_once(__DIR__ . "/../dto/city.dto.php");
require_once(__DIR__ . "/../dto/desire.dto.php");
class UserRepository
{

    public static function findUser($id, $joinDesire = false)
    {
        global $bdd;
        $sql = 'SELECT user.id, user.pseudo, user.mail, user.avatar, user.age, user.sexe, user.description_profil, user.last_connection,
                        departement.departement_code, departement.departement_nom,
                        ville.ville_code_postal, ville.ville_nom_reel'
                        . ($joinDesire ? ', user.desire_id, user.desire_datetime, desire.text' : '') . '
                FROM membres as user
                LEFT JOIN departement ON user.departement_nom = departement.departement_code
                LEFT JOIN villes_france as ville ON user.ville_id = ville.ville_id';
        if ($joinDesire) {
            $sql .= ' LEFT JOIN desire ON desire.id = user.desire_id AND desire_datetime > DATE_SUB(UTC_TIMESTAMP , INTERVAL 30 MINUTE)';
        }
        $sql .= ' WHERE user.id = :user_id LIMIT 1';
        $req = $bdd->prepare($sql);
        $req->bindParam(":user_id", $id, PDO::PARAM_INT);
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);

        return !$user ? null : self::getDto($user, $joinDesire);
    }

    public static function findUsers($conditions=null)
    {
        global $bdd;
        $sql = 'SELECT user.id, user.pseudo, user.mail, user.avatar, user.age, user.sexe, user.departement_nom, user.description_profil, user.last_connection,
                        departement.departement_code, departement.departement_nom,
                        ville.ville_code_postal, ville.ville_nom_reel,
                        user.desire_id, user.desire_datetime, desire.text
                FROM membres as user
                LEFT JOIN departement ON user.departement_nom = departement.departement_code
                LEFT JOIN villes_france as ville ON user.ville_id = ville.ville_id
                LEFT JOIN desire ON desire.id = user.desire_id';
        if($conditions){
            $sql .= " WHERE ".implode(" AND ", $conditions);
        }
        $req = $bdd->prepare($sql);
        $req->execute();
        $user = $req->fetchAll(PDO::FETCH_ASSOC);

        return !$user ? null : self::getDtos($user, true);
    }

    public static function findUsersWithDesire()
    {
        global $bdd;
        $sql = 'SELECT user.id, user.pseudo, user.mail, user.avatar, user.age, user.sexe, user.departement_nom, user.description_profil, user.last_connection,
                        departement.departement_code, departement.departement_nom,
                        ville.ville_code_postal, ville.ville_nom_reel,
                        user.desire_id, user.desire_datetime, desire.text
                FROM membres as user
                LEFT JOIN departement ON user.departement_nom = departement.departement_code
                LEFT JOIN villes_france as ville ON user.ville_id = ville.ville_id
                LEFT JOIN desire ON desire.id = user.desire_id
                WHERE desire_id IS NOT NULL AND desire_datetime > DATE_SUB(UTC_TIMESTAMP, INTERVAL 30 MINUTE)';
        $req = $bdd->prepare($sql);
        $req->execute();
        $user = $req->fetchAll(PDO::FETCH_ASSOC);

        return !$user ? null : self::getDtos($user, true);
    }

    public static function updateLastConnection($user_id)
    {
        global $bdd;
        $user = self::findUser($user_id, true);
        if ($user) {
            $sql = "UPDATE membres SET last_connection = UTC_TIMESTAMP WHERE id=:user_id";
            $req = $bdd->prepare($sql);
            $req->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $req->execute();
        }
    }

    public static function updateDesire($user_id, $desire_id)
    {
        global $bdd;
        $user = self::findUser($user_id, true);
        if (!$user->getDesire()) {
            $sql = "UPDATE membres SET desire_id = :desire_id, desire_datetime=UTC_TIMESTAMP WHERE id=:user_id";
            $req = $bdd->prepare($sql);
            $req->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $req->bindParam(":desire_id", $desire_id, PDO::PARAM_INT);
            $req->execute();
        }
    }

    private static function getDto($user, $joinDesire = false)
    {
        $city = new CityDto($user['ville_code_postal'], $user['ville_nom_reel']);
        $department =  new DepartmentDto($user['departement_code'], $user['departement_nom']);
        $desire = null;

        if (!$joinDesire || !$user['text']) {
            $user['desire_id'] = null;
            $user['desire_datetime'] = null;
            $user['text'] = null;
        }
        if ($user['desire_id'] != null) {
            $desire = new DesireDto($user['desire_id'], $user['text']);
        }
        return new UserDto(
            $user['id'],
            $user['pseudo'],
            $user['mail'],
            $city,
            $department,
            $user['avatar'],
            $user['age'],
            $user['sexe'],
            $user['description_profil'],
            $desire,
            $user['desire_datetime'],
            $user['last_connection']
        );
    }

    private static function getDtos($users, $joinDesire = false)
    {
        $return = array();
        foreach ($users as $user) {
            $return[] = self::getDto($user, $joinDesire);
        }
        return $return;
    }
}
