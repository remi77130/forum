<?php
include 'verif.php'; // BDD AND SESSION

if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
    if(isset($_GET['id_expediteur']) AND !empty($_GET['id_expediteur'])) {
       $id_expediteur = intval($_GET['id_expediteur']);
       $msg = $bdd->prepare('DELETE FROM messages WHERE (id_expediteur = :id_expediteur AND id_destinataire = :id_destinataire) OR  (id_expediteur = :id_destinataire AND id_destinataire = :id_expediteur)');
       $msg->bindParam(":id_expediteur", $_GET['id_expediteur'], PDO::PARAM_INT);
       $msg->bindParam(":id_destinataire", $_SESSION['id'], PDO::PARAM_INT);
       $msg->execute();
       
       header('Location:reception.php');
    }
 } 
 ?>