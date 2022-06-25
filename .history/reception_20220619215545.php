<?php 
session_start();
require('database.php');

if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {

$msg = $bdd->prepare('SELECT * FROM messages WHERE id_destintaire = ?');
$msg->execute(array($_SESSION['id']));

?>

<!DOCTYPE html>
<html lang="en">
    <title>Boite de reception</title>

<body>

<?php

while($m = $msg->fetch()){ 

    $p_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
    $p_exp->execute(array($m['id_expediteur']));
    $p_exp = $p_exp->fetch();
    $p_exp = $p_exp['pseudo'];
    ?>
    <b><?= $p_exp ?><b> Vous a envoyer : <br>
    <?= $m['message'] ?>


<?php } ?>

    
</body>
</html>

<?php   } ?>