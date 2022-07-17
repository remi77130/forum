<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');

?>
<?php



if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
    $msg = $bdd->prepare('SELECT * FROM messages WHERE id_destinataire = ? ORDER BY id DESC');
    $msg->execute(array($_SESSION['id']));
    $msg_nbr = $msg->rowCount();
}
    ?>


<?php
   if($msg_nbr == 0) { echo "Vous n'avez aucun message..."; }
   
   while($m = $msg->fetch()) {
      $p_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
      $p_exp->execute(array($m['id_expediteur']));
      $p_exp = $p_exp->fetch();
      $p_exp = $p_exp['pseudo'];}

      <?= $p_exp ?></b> vous a envoyé un message<br />
