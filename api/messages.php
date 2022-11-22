<?php
include __DIR__ . '/../includes/init.php';
include  __DIR__ . '/../verif.php';
if (isset($_SESSION['id']) and !empty($_SESSION['id'])) {
    if(isset($_GET['action']) && !empty($_GET['action'])){
        if($_GET['action'] == "get"){
            return get_messages();
        }
    }
}

function get_messages(){
    global $bdd;
    
    $response = array("messages"=>null, "more"=>true, "limit_from"=>0, "limit_step"=>0);
    if(isset($_GET['id_expediteur']) && !empty($_GET['id_expediteur']) && isset($_GET['limit_from']) && isset($_GET['limit_step']) && !empty($_GET['limit_step'])){
        $p_exp_req = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');


        $msg = $bdd->prepare('SELECT * FROM messages WHERE (id_expediteur = :id_expediteur AND id_destinataire = :id_destinataire) OR (id_expediteur = :id_destinataire AND id_destinataire = :id_expediteur) ORDER by ID ASC LIMIT 1');
        $msg->bindParam(":id_expediteur", $_GET['id_expediteur'], PDO::PARAM_INT);
        $msg->bindParam(":id_destinataire", $_SESSION['id'], PDO::PARAM_INT);
        $msg->execute();
        $last_message = $msg->fetch();
        if($last_message){
            $msg = $bdd->prepare('SELECT * FROM messages WHERE (id_expediteur = :id_expediteur AND id_destinataire = :id_destinataire) OR (id_expediteur = :id_destinataire AND id_destinataire = :id_expediteur) ORDER by ID DESC LIMIT :limit_from,:limit_step');
            $msg->bindParam(":id_expediteur", $_GET['id_expediteur'], PDO::PARAM_INT);
            $msg->bindParam(":id_destinataire", $_SESSION['id'], PDO::PARAM_INT);
            $msg->bindParam(":limit_from", $_GET['limit_from'], PDO::PARAM_INT);
            $msg->bindParam(":limit_step", $_GET['limit_step'], PDO::PARAM_INT);
            $msg->execute();
            $messages = $msg->fetchAll();
            if(empty($messages)){
                $response['more'] = false;
            }
            foreach($messages as $key=>$m){
                
                $p_exp_req->execute(array($m['id_expediteur']));
                $p_exp = $p_exp_req->fetch();
                $messages[$key]["pseudo"] = $p_exp['pseudo'];
                if($last_message['id'] == $m['id']){
                    $response['more'] = false;
                }
            }
            if($response['more']){
                $response['limit_from'] = (int)$_GET['limit_from'] + (int)$_GET['limit_step'];
                $response['limit_step'] = (int)$_GET['limit_step'];
            }
            $response['messages'] = $messages;
        }
    }
    echo json_encode($response);
    return true;
}
?>