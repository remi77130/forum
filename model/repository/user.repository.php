<?php
require_once(__DIR__ . "/../dto/user.dto.php");
require_once(__DIR__ . "/../dto/department.dto.php");
require_once(__DIR__ . "/../dto/city.dto.php");
require_once(__DIR__ . "/../dto/desire.dto.php");
class UserRepository
{

    public static function findById($id, $joinDesire = false)
    {
        global $bdd;
        $sql = 'SELECT user.id, user.pseudo, user.mail, user.avatar, user.age, user.sexe, user.description_profil, user.last_connection, user.last_activity, user.confirme,
                        departement.departement_code, departement.departement_nom,
                        ville.ville_id, ville.ville_code_postal, ville.ville_nom_reel'
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

    public static function findUsers($conditions = null)
    {
        global $bdd;
        $sql = 'SELECT user.id, user.pseudo, user.mail, user.avatar, user.age, user.sexe, user.departement_nom, user.description_profil, user.last_connection, user.last_activity, user.confirme,
                        departement.departement_code, departement.departement_nom,
                        ville.ville_id, ville.ville_code_postal, ville.ville_nom_reel,
                        user.desire_id, user.desire_datetime, desire.text
                FROM membres as user
                LEFT JOIN departement ON user.departement_nom = departement.departement_code
                LEFT JOIN villes_france as ville ON user.ville_id = ville.ville_id
                LEFT JOIN desire ON desire.id = user.desire_id';
        if ($conditions) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }
        $sql .= ' ORDER BY user.last_connection DESC';
        $req = $bdd->prepare($sql);
        $req->execute();
        $user = $req->fetchAll(PDO::FETCH_ASSOC);

        return !$user ? null : self::getDtos($user, true);
    }

    public static function findByLoginPassword($login, $password)
    {
        global $bdd;
        $password = sha1($password);
        $sql = 'SELECT user.id, user.pseudo, user.mail, user.avatar, user.age, user.sexe, user.description_profil, user.last_connection, user.last_activity, user.confirme,
                        departement.departement_code, departement.departement_nom,
                        ville.ville_id, ville.ville_code_postal, ville.ville_nom_reel
                FROM membres as user
                LEFT JOIN departement ON user.departement_nom = departement.departement_code
                LEFT JOIN villes_france as ville ON user.ville_id = ville.ville_id';
        $sql .= ' WHERE user.pseudo = :user_login and user.mdp = :user_password LIMIT 1';
        $req = $bdd->prepare($sql);
        $req->bindParam(":user_login", $login, PDO::PARAM_STR);
        $req->bindParam(":user_password", $password, PDO::PARAM_STR);
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);
        return !$user ? null : self::getDto($user);
    }

    public static function findByKey($key)
    {
        global $bdd;
        $sql = 'SELECT user.id, user.pseudo, user.mail, user.avatar, user.age, user.sexe, user.description_profil, user.last_connection, user.last_activity, user.confirme,
                        departement.departement_code, departement.departement_nom,
                        ville.ville_id, ville.ville_code_postal, ville.ville_nom_reel
                FROM membres as user
                LEFT JOIN departement ON user.departement_nom = departement.departement_code
                LEFT JOIN villes_france as ville ON user.ville_id = ville.ville_id';
        $sql .= ' WHERE user.confirmkey = :key LIMIT 1';
        $req = $bdd->prepare($sql);
        $req->bindParam(":key", $key, PDO::PARAM_STR);
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);

        return !$user ? null : self::getDto($user);
    }

    public static function confirmAccount(UserDto $user)
    {
        global $bdd;
        $user_id = $user->getId();
        $sql = 'UPDATE membres SET membres.confirme=1 WHERE membres.id = :user_id';
        $req = $bdd->prepare($sql);
        $req->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $req->execute();
    }

    public static function findUsersWithDesire()
    {
        global $bdd;
        $sql = 'SELECT user.id, user.pseudo, user.mail, user.avatar, user.age, user.sexe, user.departement_nom, user.description_profil, user.last_connection, user.last_activity, user.confirme,
                        departement.departement_code, departement.departement_nom,
                        ville.ville_id, ville.ville_code_postal, ville.ville_nom_reel,
                        user.desire_id, user.desire_datetime, desire.text
                FROM membres as user
                LEFT JOIN departement ON user.departement_nom = departement.departement_code
                LEFT JOIN villes_france as ville ON user.ville_id = ville.ville_id
                LEFT JOIN desire ON desire.id = user.desire_id
                WHERE desire_id IS NOT NULL AND desire_datetime > DATE_SUB(UTC_TIMESTAMP, INTERVAL 30 MINUTE)
                ORDER BY user.last_connection DESC';
        $req = $bdd->prepare($sql);
        $req->execute();
        $user = $req->fetchAll(PDO::FETCH_ASSOC);

        return !$user ? null : self::getDtos($user, true);
    }

    public static function add(UserDto $user, $password, $confirmkey){
        global $bdd;
        $login = $user->getLogin();
        $mail = $user->getMail();
        $age = $user->getAge();
        $sexe = $user->getSexe();
        $avatar = $user->getAvatar();
        $departmentCode = $user->getDepartment()->getCode();
        $villeId = $user->getCity()->getId();
        $password = sha1($password);
        $sql = "INSERT INTO membres (pseudo, mail, confirmkey, mdp, age, sexe, avatar, departement_nom, ville_id)
                                    VALUES(?,?,?,?,?,?,?,?,?)";
        $req = $bdd->prepare($sql);
        $req->execute(array(
            $login,
            $mail,
            $confirmkey,
            $password,
            $age,
            $sexe,
            $avatar,
            $departmentCode,
            $villeId
        ));
    }

    public static function updateLastConnection($user_id)
    {
        global $bdd;
        $user = self::findById($user_id, true);
        if ($user) {
            $sql = "UPDATE membres SET last_connection = UTC_TIMESTAMP WHERE id=:user_id";
            $req = $bdd->prepare($sql);
            $req->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $req->execute();
        }
    }

    public static function updateLastActivity($user_id)
    {
        global $bdd;
        $user = self::findById($user_id, true);
        if ($user) {
            $sql = "UPDATE membres SET last_activity = UTC_TIMESTAMP WHERE id=:user_id";
            $req = $bdd->prepare($sql);
            $req->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $req->execute();
        }
    }

    public static function updateDesire($user_id, $desire_id)
    {
        global $bdd;
        $user = self::findById($user_id, true);
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
        $city = new CityDto($user['ville_id'], $user['ville_code_postal'], $user['ville_nom_reel']);
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
            $user['last_connection'],
            $user['last_activity'],
            $user['confirme']
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
