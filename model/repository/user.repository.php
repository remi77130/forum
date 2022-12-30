<?php
require_once(__DIR__."/../dto/user.dto.php");
require_once(__DIR__."/../dto/desire.dto.php");
class UserRepository
{

    public static function findUser($id, $joinDesire = false)
    {
        global $bdd;
        $sql = 'SELECT user.id, user.pseudo, user.ville_id, user.mail, user.avatar, user.age, user.sexe, user.departement_nom' . ($joinDesire ? ', user.desire_id, user.desire_datetime, desire.text' : '') . '
                FROM membres as user';
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

    public static function findUsersWithDesire()
    {
        global $bdd;
        $sql = 'SELECT user.id, user.pseudo, user.ville_id, user.mail, user.avatar, user.age, user.sexe, user.departement_nom, user.desire_id, user.desire_datetime, desire.text
                FROM membres as user
                LEFT JOIN desire ON desire.id = user.desire_id
                WHERE desire_id IS NOT NULL AND desire_datetime > DATE_SUB(UTC_TIMESTAMP, INTERVAL 30 MINUTE)';
        $req = $bdd->prepare($sql);
        $req->execute();
        $user = $req->fetchAll(PDO::FETCH_ASSOC);

        return !$user ? null : self::getDtos($user, true);
    }

    public static function updateDesire($user_id, $desire_id){
        global $bdd;
        $user = self::findUser($user_id, true);
        if(!$user->getDesire()){
            $sql = "UPDATE membres SET desire_id = :desire_id, desire_datetime=UTC_TIMESTAMP WHERE id=:user_id";
            $req = $bdd->prepare($sql);
            $req->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $req->bindParam(":desire_id", $desire_id, PDO::PARAM_INT);
            $req->execute();
        }
    }

    private static function getDto($user, $joinDesire = false)
    {
        $desire = null;
        if (!$joinDesire || !$user['text']) {
            $user['desire_id'] = null;
            $user['desire_datetime'] = null;
            $user['text'] = null;
        }
        if($user['desire_id'] != null){
            $desire = new DesireDto($user['desire_id'], $user['text']);
        }
        return new UserDto(
            $user['id'],
            $user['pseudo'],
            $user['ville_id'],
            $user['mail'],
            $user['avatar'],
            $user['age'],
            $user['sexe'],
            $user['departement_nom'],
            $desire,
            $user['desire_datetime']
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
