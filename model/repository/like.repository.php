<?php
class LikeRepository
{
    public static function countLikeForUser($userId){
        global $bdd;
        $sql = 'SELECT count(id_member_to) as likes_counter
                FROM likes
                WHERE id_member_to = :user_id';
        $req = $bdd->prepare($sql);
        $req->bindParam(":user_id", $userId, PDO::PARAM_INT);
        $req->execute();
        $like = $req->fetch(PDO::FETCH_ASSOC);
        return $like["likes_counter"];
    }

    public static function hasLikeUser($userIdFrom, $userIdTo){
        global $bdd;
        $sql = 'SELECT id_member_to, id_member_from
                FROM likes
                WHERE id_member_from = :user_id_from
                AND  id_member_to = :user_id_to';
        $req = $bdd->prepare($sql);
        $req->bindParam(":user_id_from", $userIdFrom, PDO::PARAM_INT);
        $req->bindParam(":user_id_to", $userIdTo, PDO::PARAM_INT);
        $req->execute();
        $like = $req->fetch(PDO::FETCH_ASSOC);
        return !empty($like);
    }

    public static function addLike($userIdFrom, $userIdTo){
        global $bdd;
        if(!LikeRepository::hasLikeUser($userIdFrom, $userIdTo)){
            $sql = "INSERT INTO likes (id_member_from, id_member_to)
                                        VALUES(?,?)";
            $req = $bdd->prepare($sql);
            $req->execute(array(
                $userIdFrom,
                $userIdTo
            ));
        }
    }

    public static function removeLike($userIdFrom, $userIdTo){
        global $bdd;
        if(LikeRepository::hasLikeUser($userIdFrom, $userIdTo)){
            $sql = "DELETE FROM likes WHERE id_member_from=? AND id_member_to=?";
            $req = $bdd->prepare($sql);
            $req->execute(array(
                $userIdFrom,
                $userIdTo
            ));
        }
    }
}
