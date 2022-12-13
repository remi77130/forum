<?php
/**
 * Fichier d'API pour la gestion des commentaires
 * url /api/comments.php?action=mon_action
 */

include '../includes/init.php';

include '../verif.php'; // BDD AND SESSION

    global $bdd;
//Initialisation
$action = isset($_POST['action'])?$_POST['action']:null;
if($action == null){
    $action = isset($_GET['action'])?$_GET['action']:null;
}

//On vérifie quelle action est effectuée, et on l'exécute
switch($action){
    case "report": reportAction();break;
    default: apiNotFoundAction();break;
}

//ACTIONS

/**
 * Action de report d'un commentaire
 * le paramètre GET id est obligatoire
 */
function reportAction(){
    global $bdd;
    $commentId = isset($_GET['id'])?$_GET['id']:null;
    $comment = getCommentById($commentId);

    $reqimage = $bdd->prepare('UPDATE commentaires SET reported=1 WHERE id = ?');
    $reqimage->execute(array($comment['id']));
    returnResponse("Succès");
}

//FONCTIONS UTILITAIRES

/**
 * Exception si on demande une API qui n'est pas codée
 */
function apiNotFoundAction(){
    returnResponse("Page introuvable", null, 404);

}

/**
 * Permet de centraliser la vérification de l'existence d'un commentaire si on le demande.
 * @return : le commentaire trouvée
 * Sinon, renvoie une réponse avec un code 400 ou 404
 */
function getCommentById($id){
    global $bdd;
    if($id == null){
        returnResponse("Bad request : Id non fournis", null, 400);
    }
    
    $req = $bdd->prepare('SELECT * FROM commentaires WHERE id = ?');
    $req->execute(array($id));
    $comment = $req->fetch();

    if($comment == null){
        returnResponse("Not found : Commentaire non trouvée", null, 404);
    }
    if (isset($_SESSION['id']) && $comment['idMembre'] != $_SESSION['id']){
        returnResponse("Unauthorized : Vous ne pouvez pas signaler ce commentaire", null, 401);
    }
    return $comment;

}

/**
 * Permet de centraliser la manière dont l'API renverra une réponse.
 */
function returnResponse($message, $datas=null, $code=200){
    $response = array("message"=>$message, "datas"=>$datas);
    http_response_code($code);
    echo json_encode($response);
    exit;
}
?>