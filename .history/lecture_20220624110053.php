<?php 
session_start();
require('database.php');

if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {

$msg = $bdd->prepare('SELECT * FROM messages WHERE id_destinataire = ?');
$msg->execute(array($_SESSION['id']));
$msg_nbr = $msg->rowCount()

?>

<!DOCTYPE html>
<html lang="en">
    <title>Lecture du message #id</title>

<body>
    <a href="profil.php?id=<?=$_SESSION['id'] ?>">Profil</a>&nbsp;&nbsp;&nbsp;
    <a href="envoi.php">Nouveau message</a> <br> <br>

    <h3>Boite de reception</h3>

<?php
if($msg_nbr == 0){
    echo "vous n'avvez aucun message...";


}

while($m = $msg->fetch()){ 

    $p_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
    $p_exp->execute(array($m['id_expediteur']));


    $p_exp = $p_exp->fetch();
    $p_exp = $p_exp['pseudo'];
    

    ?>

    <?= $p_exp ?> Vous a envoyer un message <br>
    ----------------

<?php } ?>
<br><br>


</body>
</html>

<?php   } ?>