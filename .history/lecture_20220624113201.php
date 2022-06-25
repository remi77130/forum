<?php 
session_start();
require('database.php');

if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {

    if(isset($_GET['id']) AND !empty($_GET['id'])){  // SI USERS CONNECT

        $id_message = intval($_GET['id']); // INTVAL DE GET ID POUR CONVERTIR EN CHIFFRE POUR SECURITE ANTI INJECTION

        $msg = $bdd->prepare('SELECT * FROM messages WHERE id = ? AND id_destinataire = ?');
        $msg->execute(array($_GET['id'],$_SESSION['id']));
        $msg_nbr = $msg->rowCount();

        $m = $msg->fetch();

?>

<!DOCTYPE html>
<html lang="en">
    <title>Lecture du message #<?= $id_message ?></title>

<body>
    <a href="profil.php?id=<?=$_SESSION['id'] ?>">Profil</a>&nbsp;&nbsp;&nbsp;
    <a href="envoi.php">Nouveau message</a> <br> <br>

    <h3>Lecture du message <?= $id_message ?></h3>

<?php


    $p_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
    $p_exp->execute(array($m['id_expediteur']));
    $p_exp = $p_exp->fetch();
    $p_exp = $p_exp['pseudo'];
    

    ?>

<div>
    <?= $p_exp ?> Vous a envoyer un message <br>
    ----------------

  <?php   if($msg_nbr == 0){
    echo "vous n'avez aucun message...";
}?>

</div>

<br><br>


</body>
</html>

<?php   
} 
}

?>