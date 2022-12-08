<?php
/**
 * Fichier d'API pour la gestion des images
 * url /api/images.php?action=mon_action
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
    case "delete": deleteAction();break;
    default: apiNotFoundAction();break;
}

//ACTIONS

/**
 * Action de suppression d'une carte
 * le paramètre GET id est obligatoire
 */
function deleteAction(){
    global $bdd;
    $imageId = isset($_GET['id'])?$_GET['id']:null;
    $image = getImageById($imageId);

    $reqimage = $bdd->prepare('DELETE FROM images WHERE `index` = ?');
    $reqimage->execute(array($image['index']));
    if(file_exists('../Images_album/' . $image["nom"])){
        unlink('../Images_album/' . $image["nom"]);
    }
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
 * Permet de centraliser la vérification de l'existence d'une image si on la demande.
 * @return : l'image trouvée
 * Sinon, renvoie une réponse avec un code 400 ou 404
 */
function getImageById($id){
    global $bdd;
    if($id == null){
        returnResponse("Bad request : Id non fournis", null, 400);
    }
    
    $reqimage = $bdd->prepare('SELECT * FROM images WHERE `index` = ?');
    $reqimage->execute(array($id));
    $image = $reqimage->fetch();

    if($image == null){
        returnResponse("Not found : Image non trouvée", null, 404);
    }
    if (isset($_SESSION['id']) && $image['id'] != $_SESSION['id']){
        returnResponse("Unauthorized : Vous ne pouvez pas supprimer cette image", null, 401);
    }
    return $image;

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