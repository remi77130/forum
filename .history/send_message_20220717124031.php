<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');

?>
<?php
while($m = $msg->fetch()) {
    $p_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
    $p_exp->execute(array($m['id_expediteur']));
    $p_exp = $p_exp->fetch();
    $p_exp = $p_exp['pseudo'];

}
?>

<?= $p_exp ?></b> vous a envoyé un message<br />
